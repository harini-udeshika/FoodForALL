<?php
class Finance_manager extends Controller
{
    function index()
    {
        $this->autherize_finance_manager();
        // $user = new User();
        // $data = $user->findAll();
        $admin = new Admins();

        // $data = $admin->where('email', Auth::getemail());
        $data = array();
        $this->view('finance_manager.home.view', ['rows' => $data]);
    }

    public function home()
    {
        if (Auth::isuser('admin')) {
            $name = "this is name";
            $result = "this is ressult";

            $admin_model = new Admins();
            $site_data = $admin_model->homepage_data();

            $this->view('admin.home.view', [
                'name' => $name,
                'result' => $result,
                'site_data' => $site_data,
            ]);
        } else {
            $this->redirect('login');
        }
    }

    public function autherize_finance_manager()
    {
        if (!Auth::isuser('finance_manager')) {
            $this->redirect('login');
        }
    }

    public function current_password()
    {
        $this->autherize_finance_manager();
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
        if (!Auth::isuser('admin')) {
            $this->redirect('login');
        }

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
        if (Auth::isuser('admin')) {
            $this->view('update.success.view', ['link' => $link]);
        }
    }

    public function password_success()
    {
        if (Auth::isuser('admin')) {
            $this->view('password.change.success.view');
        }
    }

    public function temp()
    {
        $admin = new Admins();

        $data = $admin->homepage_data();

        $this->view('temp');
    }

    public function temp5()
    {
        $f_manager = new Finance_managers();
        $f_manager->budget_details();
    }

    public function temp2()
    {
        $admin = new Admins();
        // $name = $_GET("id");
    }

    // load budgets
    public function budeget_requests()
    {
        $this->autherize_finance_manager();
        $f_manager_model = new Finance_managers();
        $budget_type = 0;
        $path =  "../private/views/finance_manager.budget.pending.view.php";

        if (isset($_GET['id'])) {
            if ($_GET['id'] == "rejected") {
                $budget_type = -1;
                $path =  "../private/views/finance_manager.budget.rejected.view.php";
            } else if ($_GET['id'] == "accepted") {
                $budget_type = 1;
                $path =  "../private/views/finance_manager.budget.accepted.view.php";
            }
        }

        $budgets = $f_manager_model->budget_details($budget_type);
        ob_start();
        include($path);
        $html = ob_get_clean();
        echo ($html);
    }

    // approve budgets
    public function approve_budget()
    {
        $this->autherize_finance_manager();
        $f_manager_model = new Finance_managers();
        if (isset($_GET['id'])) {
            $f_manager_model->approveBudget($_GET['id']);
        }
        $this->redirect("finance_manager");
        $this->view('admin');
    }

    // reject budgets
    public function reject_budget()
    {
        $this->autherize_finance_manager();
        $f_manager_model = new Finance_managers();
        if (isset($_GET['id'])) {
            $f_manager_model->rejectBudget($_GET['id']);
        }
        $this->redirect("finance_manager");
        // $this->view('admin');
    }

    // modify budgets
    public function modify_budget()
    {
        $this->autherize_finance_manager();
        $f_manager_model = new Finance_managers();
        if (isset($_GET['id'])) {
            $f_manager_model->rejectBudget($_GET['id']);
        }
        $this->redirect("finance_manager");
        // $this->view('admin');
    }

    public function send_rejected_mail()
    {
    }

    public function temp12()
    {
       print_r($_SESSION['USER']);
    }

    // // undo reject
    // public function undo_reject()
    // {
    //     $this->autherize_finance_manager();
    //     $f_manager_model = new Finance_managers();
    //     if (isset($_GET['id'])) {
    //         $f_manager_model->undoReject($_GET['id']);
    //     }
    //     $this->redirect("finance_manager");
    // }
}
