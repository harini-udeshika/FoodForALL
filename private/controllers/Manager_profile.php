<?php
class Manager_profile extends Controller
{
    function index()
    {

        $org = new Organization();
        $manager = new EventManager();
        $email = $_GET["id"];
        // echo $email;
        // die;

        if (!Auth::logged_in()) {
            $this->redirect('home');
        }
        if ($_POST) {
            $id = Auth::getid();
            $arr['name'] = $_POST["name"];
            $arr['city'] = $_POST["city"];
            $arr['tel'] = $_POST["tel"];
            $arr['email'] = $_POST["email"];
            $arr['about'] = $_POST["about"];
            $arr['gov_reg_no'] = $_POST["gov_no"];
            // $user->update($id,$arr);
            $this->redirect('manager_profile');
        } else {
            // echo "no post";
            // die;
        }

        $event = new Event();

        $data = $manager->where('email', $email);

        $query = "SELECT * FROM event WHERE event_manager_email= :id && date>=CURRENT_DATE";
        $arr = ['id' => $email];
        $ongoing = $event->query($query, $arr);

        $query = "SELECT * FROM event WHERE event_manager_email= :id && approved!=0 && date<CURRENT_DATE";
        $arr = ['id' => $email];
        $past = $event->query($query, $arr);

        // print_r ($data);
        // echo ($data[0]->id);
        $data = $data[0];

        $allmanagers = $manager->where('org_gov_reg_no', $data->org_gov_reg_no);
        // echo "<pre>";
        // print_r ($allmanagers);
        // die;
        $this->view('manager_profile.view', ['manager' => $data, 'ongoing' => $ongoing, 'past' => $past, 'allmanagers' => $allmanagers]);
    }

    public function change()
    {
        $id = $_GET["id"];
        $event = new Event();
        if ($_POST) {
            $manager = $_POST["manager"];

            $data = $event->where('event_id', $id);
            $data = $data[0];
            $old_manager = $data->event_manager_email;
            // echo $manager;
            // die;

            if ($manager != "not_selected") {
                $query = "UPDATE event SET event_manager_email= :manager WHERE event_id= :id";
                $arr = ['manager' => $manager, 'id' => $id];
                $result = $event->query($query, $arr);
            }

            // $data = $event->where('event_id',$id);
            // $data = $data[0];
            // print_r($data);
            // echo $old_manager;

            // die;
            $this->redirect('manager_profile?id=' . $old_manager);
        } else {
            $data = $event->where('event_id', $id);
            $data = $data[0];
            $old_manager = $data->event_manager_email;
            $this->redirect('manager_profile?id=' . $old_manager);
        }
    }
}
