<?php
class Login extends Controller
{
    public function index()
    {

        $errors = array();

        if (count($_POST) > 0) {
            $user = new User();

            if ($row = $user->where('email', $_POST['email'])) {

                $row = $row[0];
                // print_r($row) ;
                if (password_verify($_POST['password'], $row->password_hash)) {

                    Auth::authenticate($row);
                    if (Auth::check_verified()) {
                        // if($row->usertype=="reg_user"){
                             $this->redirect('/profile');
                        //}
                       
                    } else {
                        $this->redirect('/email_verify');
                    }

                }

            }
            $errors['email'] = "Incorrect email or password";
        }

        $this->view('login', [
            'errors' => $errors,
        ]);
    }
}
