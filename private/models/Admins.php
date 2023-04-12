<?php
class Admins extends Model
{
    protected $table = "admin";

    public function change_table($table_name)
    {
        $this->table = $table_name;
    }

    public function validate_Acoordinator($DATA)
    {

        $this->errors = array();

        // validate name
        if (empty($DATA['name']) || !preg_match('/^[a-zA-Z]+$/', $DATA['name'])) {
            $this->errors['name'] = "An error in name";
        }

        //validate email
        if (empty($DATA['email']) || !filter_var($DATA['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "An error in Email";
        }

        //validate email exists
        if ($this->where('email', $DATA['email'])) {
            $this->errors['email_exists'] = "An error in email";
        }

        //validate password
        if (empty($DATA['password']) || $DATA['password'] !== $DATA['password2']) {
            $this->errors['password'] = "An error in Passwords";
        }

        //validate for password length
        if (strlen($DATA['password']) < 8) {
            $this->errors['password'] = "An error in Password";
        }

        // validate phone number
        if (empty($DATA['phone_no'])) {
            $this->errors['phone_no'] = "An error in phone number";
        }

        // validate NIC
        if (empty($DATA['nic'])) {
            $this->errors['nic'] = "An error in NIC";
        }

        //validate district
        if (empty($DATA['district'])) {
            $this->errors['district'] = "An error in district";
        }

        //validate area
        if (empty($DATA['area'])) {
            $this->errors['area'] = "An error in area";
        }

        //validate for usertype
        if (empty($DATA['usertype']) != 'area_coordinator') {
            $this->errors['usertype'] = "An error in usertype";
        }


        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }

    public function select_orgs_bydate()
    {
        $query = "SELECT * FROM  organization  ORDER BY sub_fee_paid_date DESC";
        $data = $this->query($query);
        return $data;
    }

    public function search_in_org($keyword)
    {
        $keyword=addslashes($keyword);
        $query = "SELECT * FROM organization WHERE name LIKE '%$keyword%' OR gov_reg_no LIKE '%$keyword%'";
        $data = $this->query($query);
        return $data;
    }

    public function select_users_bydate()
    {
        $query = "SELECT * FROM user ORDER BY id DESC LIMIT 4";
        $data = $this->query($query);
        return $data;
    }

    public function search_in_users($keyword)
    {
        $keyword=addslashes($keyword);

        $query = "SELECT * FROM user WHERE first_name LIKE '%$keyword%' OR last_name LIKE '%$keyword%' OR email LIKE '%$keyword%' OR nic LIKE '%$keyword%' OR id LIKE '%$keyword%'";
        
        $data = $this->query($query);
        return $data;
    }

    public function delete_org($id)
    {
        $query = "delete from $this->table where gov_reg_no = :id";
        $data['id'] = $id;
        return $this->query($query, $data);
    }

    public function select_areacoords_bydate()
    {
        $query = "SELECT * FROM area_coodinator  ORDER BY id DESC LIMIT 4";
        $data = $this->query($query);
        return $data;
    }

    public function search_in_areacoords($keyword){
        $keyword=addslashes($keyword);

        $query = "SELECT * FROM area_coodinator WHERE name LIKE '%$keyword%' OR email LIKE '%$keyword%' OR nic LIKE '%$keyword%' OR id LIKE '%$keyword%'";
        
        $data = $this->query($query);
        return $data;
    }

    public function homepage_data()
    {
        $data = array();

        $data['update_time'] = date('Y-m-d H:i:s');

        $current_year = (new DateTime())->format('Y');
        $current_month = date('m');
        $current_date = date('y-m-d');
        $month_text = date("F", mktime(0, 0, 0, $current_month, 1));

        $data['month'] = $month_text;
        $data['year'] = $current_year;


        // calculate ongoing events
        $query = "SELECT date FROM event WHERE MONTH(date) = '$current_month' AND date >= '$current_date'";
        $events = $this->query($query);

        if ($events == false) {
            $events = array();
        }
        $data['ongoing_events'] = count($events);


        // calculate completed events
        $query = "SELECT date FROM event WHERE MONTH(date) = '$current_month' AND date < '$current_date'";
        $completed_events = $this->query($query);

        if ($completed_events == false) {
            $completed_events = array();
        }
        $data['completed_events'] = count($completed_events);


        // calculate organization count
        $query = "SELECT gov_reg_no from organization";
        $organizations = $this->query($query);

        if ($organizations == false) {
            $organizations = array();
        }
        $data['organizations'] = count($organizations);


        // calculate registered user count
        $query = "SELECT id from user";
        $users = $this->query($query);

        if ($users == false) {
            $users = array();
        }
        $data['users'] = count($users);


        // calculate donations
        $query = "SELECT amount FROM donate WHERE MONTH(date_time) = '$current_month'";
        $donations = $this->query($query);

        if ($donations == false) {
            $donations = array();
        }
        $donation_sum = 0;

        foreach ($donations as $donation) {
            $donation_sum += $donation->amount;
        }

        $donation_sum = number_format($donation_sum, 0, '.', ',');

        $data['donations'] = $donation_sum;


        // calcucalte data for chart 1 - most donated organizations
        $query = "SELECT o.name, SUM(d.amount) AS total_donations FROM donate d JOIN event e ON d.event_id = e.event_id JOIN organization o ON e.org_gov_reg_no = o.gov_reg_no GROUP BY o.name ORDER BY total_donations DESC";

        $org_donations = $this->query($query);

        if ($org_donations == false) {
            $org_donations = array();
        }

        if (count($org_donations) < 5) {
            $data['chart_1'] = $org_donations;
        } else {
            $other_donations = 0;

            for ($x = 5; $x < count($org_donations); $x++) {
                $other_donations += $org_donations[$x]->total_donations;
                unset($org_donations[$x]);
            }

            $org_donations["other"]->name = "Other";
            $org_donations["other"]->total_donations = $other_donations;
        }


        // calculate data for chart 2

        $donations_by_month = array();

        for ($x = 1; $x <= 12; $x++) {
            $query = "SELECT MONTH(date_time) as month, SUM(amount) as total_amount FROM donate WHERE YEAR(date_time) = '$current_year' AND MONTH(date_time) = '$x'";
            $monthly_donations = $this->query($query);


            if (gettype($monthly_donations[0]->total_amount)=='NULL') {
                $monthly_donations[0]->total_amount = 0;
            }

            $donations_by_month[date("F", mktime(0, 0, 0, $x, 1))] = $monthly_donations[0]->total_amount;
        }
        $data["chart_2"] = $donations_by_month;

        return $data;
    }
}
