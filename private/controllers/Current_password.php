<?php
class Current_password extends Controller
{
    public function index()
    {
        $user=new User();
        $data = $user->where('id', Auth::getid());
        $data = $data[0];
        if($_POST){
            $password_entered = $_POST['password'];
            $password_hash=$data->password_hash;
            if(password_verify($password_entered,$password_hash)){
                $this->redirect('change_password');
            }
            else{
                echo ("Incorrect password");
            }
        }

        $this->view('current_password',['rows'=>$data]);
    }
}
