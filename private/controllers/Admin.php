<?php
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
            'name' => $name,
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
                    $this->redirect('admin/current_password');
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
            'error' => $errors
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


        $this->view('tmpindex');
    }

    public function temp6()
    {
        $admin = new Admins();


        $this->view('shop_org.view');
    }

    public function temp4()
    {
        $this->autherize_admin();
        $admin = new Admins();


        $this->view('add_managers.view');
    }

    public function temp5()
    {
        $this->autherize_admin();
        $admin = new Admins();

        $this->view('section');
    }

    public function temp8($param)
    {
        echo ($param);
    }

    // event page
    public function events($page_name = "")
    {
        $this->autherize_admin();

        $page_name = strtolower($page_name);
        $event_model = new Admin_events_model();
        $path = "../private/views/admin.events.$page_name.php";
        $html = "";

        if($page_name == ""){
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

        echo (json_encode($html));
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

        $data = json_encode($data);
        echo $data;
    }
}
