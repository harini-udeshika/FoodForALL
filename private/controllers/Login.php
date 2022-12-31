<?php
class Login extends Controller
{
    function index(){ 
        
        $errors=array();

        if (count($_POST) > 0) {
            $user = new User();

            if($row = $user->where('email', $_POST['email'])){
                
                $row = $row[0];
                
                if(password_verify($_POST['password'], $row->password_hash)){
                    
                    Auth::authenticate($row);
                    $this->redirect('/profile');
                   
                }
                
               
            }
            $errors['email'] = "Incorrect email or password";
        }

        $this->view('login',[
            'errors'=>$errors,
        ]);
    }
}
