<?php
class Login extends Controller
{
    public function index()
    {

        $errors = array();
        $is_verified = true;

        if (count($_POST) > 0) {
            $user = new User();
            $admin =new Admins();
            $org = new Organization();
            $area_coordinator=new AreaCoordinator();
            // $p=password_hash("admin@123",PASSWORD_DEFAULT);
            // echo ($p);
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
                else{
                    $is_verified = false;
                }

            }
            else if ($row = $admin->where('email', $_POST['email'])) {

                $row = $row[0];
                
                if (password_verify($_POST['password'], $row->password_hash)) {

                    Auth::authenticate($row);
                    
                    
                             $this->redirect('/admin');
                    
                       
                    
                }

            }
            else if ($row = $org->where('email', $_POST['email'])) {

                $row = $row[0];

                if (password_verify($_POST['password'], $row->password)) {

                    Auth::authenticate($row);
                    if (Auth::check_verified()) {
                        // if($row->usertype=="reg_user"){
                             $this->redirect('/home_org');
                        //}
                       
                    } else {
                        $this->redirect('/email_verify');
                    }
                }

            }
            else if ($row = $area_coordinator->where('email', $_POST['email'])) {

                $row = $row[0];
                
                if (password_verify($_POST['password'], $row->password)) {
                print_r($row);
                    Auth::authenticate($row);
                    
                    
                             $this->redirect('/area_coordinator_view');
                    
                       
                    
                }
                else{
                    echo ("wrong password");
                }

            }
            $errors['email'] = "Incorrect email or password";
        }

        $this->view('login', [
            'is_verified' => $is_verified,
        ]);
    }
}
