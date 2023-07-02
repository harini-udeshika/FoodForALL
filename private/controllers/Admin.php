<?php

use LDAP\Result;

class Admin extends Controller
{
    function index()
    {
        // $user = new User();
        // $data = $user->findAll();
        $admin = new Admins();

        $data = $admin->where('email', Auth::getemail());
        $data = $data[0];
        $this->view('admin', ['rows' => $data]);
    }

    public function autherize_admin()
    {
        if (!Auth::isuser('admin')) {
            $this->redirect('login');
        }
    }

    public function home()
    {
        $this->autherize_admin();

        $name = "this is name";
        $result = "this is ressult";

        $admin_model = new Admins();
        $site_data = $admin_model->homepage_data();

        $this->view('admin.home.view', [
            // 'name' => $name,
            'result' => $result,
            'site_data' => $site_data,
        ]);
    }

    public function current_password()
    {
        $this->autherize_admin();
        $errors = array();

        if ($_POST) {
            if ($_POST['password'] != '') {
                if (password_verify($_POST['password'], $_SESSION['USER']->password_hash)) {
                    $session_id = uniqid();
                    $_SESSION['USER']->change_password_session_id = $session_id;
                    $this->redirect("admin/change_password/$session_id");
                } else {
                    $errors['err'] = 'password does not match';
                }
            }
        }

        $name_object = new stdClass();
        $name_object->first_name = "Admin";


        $temp['first_name'] = "admin";
        $this->view('current_password', [
            'rows' => $name_object,
            'error' => $errors
        ]);
    }

    public function change_password($session_id = '')
    {
        $this->autherize_admin();

        if (!isset($_SESSION['USER']->change_password_session_id)) {
            $this->redirect('admin/current_password');
        }

        if (!$session_id == $_SESSION['USER']->change_password_session_id) {
            $this->redirect('admin/current_password');
        }

        $errors = array();

        if ($_POST) {
            if ($_POST['password'] == $_POST['password_check']) {
                $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $user_mail = $_SESSION['USER']->email;

                $query = "UPDATE admin SET password_hash = '$password_hash' WHERE email = '$user_mail'";

                $admin_model = new Admins();

                $result = $admin_model->query($query);

                if ($result == NULL) {
                    $_SESSION['USER']->password_hash = $password_hash;
                    unset($_SESSION['USER']->change_password_session_id);
                    $this->redirect('admin/home');
                }
            } else {
                $errors['error'] = 'Re-entered password does not match!';
            }
        }

        $name_object = new stdClass();
        $name_object->first_name = "Admin";


        $temp['first_name'] = "admin";
        $this->view('change_password', [
            'rows' => $name_object,
            'errors' => $errors
        ]);
    }

    public function update_successfully($link = '')
    {
        $this->autherize_admin();

        $this->view('update.success.view', ['link' => $link]);
    }

    public function password_success()
    {
        $this->autherize_admin();

        $this->view('password.change.success.view');
    }

    public function temp()
    {
        $admin = new Admins();

        $data = $admin->homepage_data();

        $this->view('finance_manager.home.view');
    }

    public function temp2()
    {
        $admin = new Admins();


        $today_date = date('y-m-d');
        // $today_date = '23-01-01';
        // echo($ongoing_date);
        $query = "SELECT * FROM event WHERE date < '$today_date'";
        $data = $admin->query($query);

        print_r($data);
    }

    public function temp3()
    {
        $admin = new Admins();


        $this->view('admin.view');
    }

    public function temp6()
    {
        $admin = new Admins();


        $this->view('admin.ask.yesorno');
    }

    public function temp4()
    {
        $this->autherize_admin();
        $admin = new Admins();


        $this->view('add_managers.view');
    }

    public function temp5()
    {
        // $this->autherize_admin();

        $event_model = new Admin_events_model();
        $path = "../private/views/admin.events.upcoming.php";
        $html = "";

        $ongoing_events = $event_model->selectOngoing();
        if ($ongoing_events == NULL) {
            $ongoing_events = array();
        }
        ob_start();
        include("../private/views/mail.newsletter.php");
        $html = ob_get_clean();

        // echo $html;
        // $this->view("mail.newsletter",[
        //     "ongoing_events"=>$ongoing_events
        // ]);

        $mail_model = new Mail();
        echo ($mail_model->send_mail("anjunaserasingha@gmail.com", "test mail 1", $html));
    }

    public function temp8()
    {
        $this->view('mail.subscription_notice');
    }

    // upcomng events
    public function upcoming()
    {
        $this->autherize_admin();

        $event_model = new Admin_events_model();
        $path = "../private/views/admin.events.upcoming.php";
        $html = "";

        $ongoing_events = $event_model->selectOngoing();
        if ($ongoing_events == NULL) {
            $ongoing_events = array();
        }

        ob_start();
        include $path;
        $html = ob_get_clean();

        echo ($html);
    }

    //completed event page
    public function completed()
    {
        $this->autherize_admin();

        $event_model = new Admin_events_model();
        $path = "../private/views/admin.events.completed.php";
        $html = "";

        $completed_events = $event_model->selectCompleted();
        if ($completed_events == NULL) {
            $completed_events = array();
        }
        ob_start();
        include $path;
        $html = ob_get_clean();

        echo ($html);
    }

    public function events($page_name = "")
    {
        $this->autherize_admin();

        $page_name = strtolower($page_name);
        $event_model = new Admin_events_model();
        $path = "../private/views/admin.events.$page_name.php";
        $html = "";

        if ($page_name == "") {
            $this->view('admin.events');
            die;
        }

        if ($page_name == "upcoming") {
            $ongoing_events = $event_model->selectOngoing();
            if ($ongoing_events == NULL) {
                $ongoing_events = array();
            }
            ob_start();
            include $path;
            $html = ob_get_clean();
        } elseif ($page_name == "completed") {
            $completed_events = $event_model->selectCompleted();
            if ($completed_events == NULL) {
                $completed_events = array();
            }
            ob_start();
            include $path;
            $html = ob_get_clean();
        }

        echo ($html);
    }
    // search event
    function searchEvent($keyword = "")
    {
        if (Auth::isuser('admin')) {
            $data = array();

            if ($keyword != "") {
                $admin_model = new Admins();
                $keyword = addslashes($keyword);

                $query = "SELECT * FROM event WHERE event_id LIKE '%$keyword%' OR name LIKE '%$keyword%' OR location LIKE '%$keyword%'";

                $data = $admin_model->query($query);

                if ($data == null) {
                    $data = array();
                }
            }
        } else {
            $data = "redirect";
        }
        echo (json_encode($data));
    }

    // home/dashboard page
    public function dashboard()
    {
        $this->autherize_admin();
        $path = "../private/views/admin.home.view2.php";

        $name = "this is name";
        $result = "this is ressult";

        $admin_model = new Admins();
        $site_data = $admin_model->homepage_data();

        ob_start();
        include $path;
        $html = ob_get_clean();

        echo ($html);
    }

    public function temp15()
    {
        // echo("called");
        $this->view("temp4");
    }

    public function temp16()
    {
        if (isset($_POST)) {
            $result =  json_encode($_POST);
            echo ($result);
        } else {
            echo (json_encode("no post"));
        }
    }

    // -------------------------organizations-------------------------------
    public function organizations()
    {
        $this->autherize_admin();
        $this->view('admin.organization');
    }

    public function org_data()
    {
        $this->autherize_admin();
        $admin_model = new Admins();
        $organizations = $admin_model->orgRequests();

        $path = "../private/views/admin.organization.data.php";

        ob_start();
        include($path);
        $html = ob_get_clean();
        echo ($html);
    }

    public function org_requests()
    {
        $this->autherize_admin();
        $admin_model = new Admins();
        $organizations = $admin_model->orgRequests();

        $path = "../private/views/admin.organization.requests.php";

        ob_start();
        include($path);
        $html = ob_get_clean();
        echo ($html);
    }
    public function org_search()
    {
        $this->autherize_admin();
        $admin_model = new Admins();
        // $defaults=array();
        $results = $admin_model->select_orgs_bydate();
        $results['result_type'] = 'recent';

        $path = "../private/views/admin.organization.search.php";

        ob_start();
        include($path);
        $html = ob_get_clean();
        echo ($html);
    }

    public function search_in_org($keyword)
    {
        $this->autherize_admin();
        if (Auth::isuser('admin')) {
            $data = array();

            if ($keyword != "") {
                $admin_model = new Admins();
                $keyword = addslashes($keyword);

                $query = "SELECT * FROM organization WHERE gov_reg_no LIKE '%$keyword%' OR name LIKE '%$keyword%'";

                $data = $admin_model->query($query);

                if ($data == null) {
                    $data = array();
                }
            }
        } else {
            $data = "redirect";
        }
        echo (json_encode($data));
    }

    public function ask_blacklist_org()
    {
        $this->autherize_admin();
        $admin_model = new Admins();

        if (isset($_GET['id'])) {
            $org_id = $_GET['id'];

            $query = "select * from organization where gov_reg_no ='$org_id'";
            $result=$admin_model->query($query);
            
            if($result == false){
                $this->redirect('admin/organizations');
                die;
            }

            $result = $result[0];
            $this->view('admin.blacklist.org', [
                "row" => $result
            ]);
        } else {
            $this->redirect('admin/organizations');
        }
    }

    public function blacklist_org()
    {
        print_r($_GET['id']);
        $this->autherize_admin();
        $admin_model = new Admins();
        if (isset($_GET['id'])) {
            $message = "";
            
            
            $org_id = $_GET['id'];
            $current_date = date('Y-m-d');
            
            $query = "select * from event where org_gov_reg_no = '$org_id' and date>='$current_date' ";
            $result = $admin_model->query($query);

            
            $query = "select * from organization where gov_reg_no ='$org_id'";
            $org=$admin_model->query($query);
            
            if($org == false){
                $this->redirect('admin/organizations');
                die;
            }
            $org = $org[0];
            
            if ($result == false) {
                // blacklist
                $query = "update organization set approve = 3 where gov_reg_no =  $org_id";
                $admin_model->query($query);
                $org->error = "organization Blacklisted.";
                $this->view("admin.blacklist.org.done",[
                    "row"=>$org
                ]);

            } else {
                $org->error = "This organization has ongoing events!";
                $this->view("admin.blacklist.org.err",[
                    "row"=>$org
                ]);
            }
        }else{
            $this->redirect('admin/organizations');
        }
    }
    // -----------------------organizations : END----------------------------

    // new organizations
    // public function org_requests()
    // {
    //     $this->autherize_admin();
    //     $admin_model = new Admins();
    //     $organizations = $admin_model->orgRequests();

    //     $this->view("temp4", [
    //         "organizations" => $organizations
    //     ]);
    // }

    // accept organizations
    public function accept_org()
    {
        $this->autherize_admin();
        if (!isset($_GET['id'])) {
            $this->redirect('admin/org_requests');
        }

        $org_id = $_GET['id'];

        $admin_model = new Admins();
        $organization = $admin_model->acceptOrg($org_id);

        if ($organization) {
            $mail_model = new Mail();

            ob_start();
            include('../private/views/mail.org.accept.php');

            $recipient = "anjunaserasingha@gmail.com";
            // $recipient = $organization->email;
            $html_mail = ob_get_clean();
            $subject = "Registration Accepted";

            $mail_model->send_mail($recipient, $subject, $html_mail);
        }
        $this->redirect('admin/org_requests');
    }

    // reject organizations
    public function rejectOrg()
    {
        $this->autherize_admin();
        if (!isset($_GET['id'])) {
            $this->redirect('admin/org_requests');
        }

        $org_id = $_GET['id'];

        $admin_model = new Admins();
        $organization = $admin_model->rejectOrg($org_id);

        if ($organization) {
            $mail_model = new Mail();
            print_r($organization->name);

            ob_start();
            include('../private/views/mail.org.reject.php');

            // $recipient = $organization->email;
            $recipient = "anjunaserasingha@gmail.com";
            $html_mail = ob_get_clean();
            $subject = "Registration Rejected";

            if ($mail_model->send_mail($recipient, $subject, $html_mail)) {
                echo ("mail sent");
            } else {
                echo ("mail sent");
            }
        }
        $this->redirect('admin/org_requests');
    }
    public function reset_org_table()
    {
        $query = "select * from organization";
        $admin = new Admins();

        $orgs = $admin->query($query);

        foreach ($orgs as $org) {
            $query = "update organization set approve =0 where gov_reg_no = '$org->gov_reg_no'";
            $orgs = $admin->query($query);
        }
    }
}
