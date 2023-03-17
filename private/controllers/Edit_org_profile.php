<?php
class Edit_org_profile extends Controller
{
    function index()
    {

        $user = new Organization();

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
            $user->update($id, $arr);
            $this->redirect('edit_org_profile');
        } else {
            // echo "no post";
            // die;
        }


        $data = $user->where('id', Auth::getid());
        // print_r ($data);
        // echo ($data[0]->id);
        $data = $data[0];
        $reg_no = $data->gov_reg_no;

        $event = new Event();

        // $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0 && date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) && date < CURDATE()";
        // $arr = ['id' => $reg_no];
        // $lastmonth = $->query($query, $arr);
        $lastmonth = $user->selectLastmonth($reg_no);

        $query = "SELECT name FROM event WHERE org_gov_reg_no= :id && approved!=0 && date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) && date < CURDATE()";
        $arr = ['id' => $reg_no];
        $lables = $event->query($query, $arr);

        $query = "SELECT event_id FROM event WHERE org_gov_reg_no= :id && approved!=0 && date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) && date < CURDATE()";
        $arr = ['id' => $reg_no];
        $event_ids = $event->query($query, $arr);

        // echo Auth::getid();
        // echo $reg_no;
        // echo "hello <pre>";
        // print_r($lastmonth);
        // print_r($lables);
        // die;

        $org_images = $user->get_images(Auth::getid());

        $this->view('edit_org_profile.view', ['rows' => $data, 'lastmonth' => $lastmonth, 'lables' => $lables, 'event_ids' => $event_ids, 'org_images' => $org_images]);
    }

    function add_images()
    {

        if (Auth::getusertype() == 'organization') {
            // echo "hello 2";
            // die;
            $org = new Organization();

            if (count($_FILES['images']) > 0) {
                // echo count($_FILES['images']);

                $org_images = $org->add_images(Auth::getid());

                // echo "<pre>";
                // echo "hello";
                // print_r($org_images);
                // die;

                $arr['images'] = $org_images;
                $org->update(Auth::getid(), $arr);
            }
            $this->redirect('edit_org_profile');
        } else {
            $this->redirect('home');
        }
    }

    function delete_pic()
    {

        if (Auth::getusertype() == 'organization') {

            $org = new Organization();
            // echo Auth::getid();
            // die;

            $query = "UPDATE organization SET profile_pic = NULL WHERE id=:id";
            $arr = ['id' => Auth::getid()];
            $org->query($query, $arr);

            $this->redirect('edit_org_profile');
        } else {
            $this->redirect('home');
        }
    }
}
