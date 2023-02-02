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
            $user=new User();
            $org = new Organization();
            $email = $_SESSION['email'];
            if($user->where('email', $email)){
                $arr['password_hash']=password_hash($_POST["password"],PASSWORD_DEFAULT);
                $data=$user->where('email',$email);
                $user->update($data[0]->id, $arr);
            }elseif($org->where('email', $email)){
                $arr['password']=password_hash($_POST["password"],PASSWORD_DEFAULT);
                $data=$org->where('email',$email);
                $org->update($data[0]->email, $arr);
            }
            
            $this->redirect('login');
            }
          
        }
        $this->view('change_password');
    }
}
