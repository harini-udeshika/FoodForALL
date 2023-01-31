<?php
class Change_password extends Controller
{
    public function index()
    {
        if (isset($_POST['password'])) {
            
            if($_POST['password'] != $_POST['password_check']){
                echo ("Passwords do not match");
            }
            else{
            $arr['password_hash']=password_hash($_POST["password"],PASSWORD_DEFAULT);
            $user=new User();
            $email = $_SESSION['email'];
            $data=$user->where('email',$email);
            $user->update($data[0]->id, $arr);
            $this->redirect('login');
            }
          
        }
        $this->view('change_password');
    }
}
