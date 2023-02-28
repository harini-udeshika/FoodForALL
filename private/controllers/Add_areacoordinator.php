<?php
class Add_areacoordinator extends Controller
{
    function index()
    {
        // $user = new User();
        // $data = $user->findAll();
        $user = new Add_areacoordinator();

        if (Auth::isuser('admin')) {
            $user->view('addareacoordinator');
        } else {
            echo ("You have no access right");
        }
    }

    function addacoordinator()
    {
        // check wether user admin or not
        if (!Auth::isuser('admin')) {
            echo ("You have no access right");
            die;
        }

        $errors = array();

        // check post's empty or not and the name of form
        if (count($_POST) != 10 || !array_key_exists("add", $_POST)) {
            // redirect to add area coordinator
            echo ("There were some errors!</br>");
            echo ('<a href="' . ROOT . '/Add_areacoordinator" >Go back to prevoius page</button>');
            die;
        }

        // crate new admin model
        $admin_model = new Admins();

        // change table name
        $admin_model->change_table("area_coodinator");

        // validate inputs
        if (!$admin_model->validate_Acoordinator($_POST)) {
            $errors = $admin_model->errors;
            $this->view('addareacoordinator', [
                'errors' => $errors,
            ]);
            die;
        }

        // modify post
        $_POST['usertype'] = "area_coordinator";
        unset($_POST['password2']);
        unset($_POST['add']);
        $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $admin_model->insert($_POST);

        // redirect to previous page
        echo ("New Area coordinator added successfullty!</br>");
        echo ('<a href="' . ROOT . '/Add_areacoordinator">Go back to prevoius page</button>');
    }
}
