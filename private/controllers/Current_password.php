<?php
class Current_password extends Controller
{
    public function index()
    {
        $user=new User();
        $data = $user->where('id', Auth::getid());
        $data = $data[0];
        $error = false;
        if($_POST){
            $password_entered = $_POST['password'];
            $password_hash=$data->password_hash;
            if(password_verify($password_entered,$password_hash)){
                $this->redirect('change_password');
            }
            else{
               $error=true;
            }
        }

        $this->view('current_password',['rows'=>$data,'error'=>$error]);
    }
}
