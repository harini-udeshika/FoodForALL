<?php
class Profile_eventmanager extends Controller
{
    function index(){
        $email= Auth::getemail();
        $user =new EventManager();
        $query="SELECT eventmanager.email,eventmanager.full_name,eventmanager.profile_pic,eventmanager.nic, organization.name FROM eventmanager 
        LEFT JOIN  organization ON  organization.gov_reg_no =eventmanager.org_gov_reg_no
        WHERE eventmanager.email='$email'";
        $data = $user->query($query);  
        $data = $data[0];
        
        if(!Auth::getusertype() == 'eventmanager'){
            $this->redirect('home');
        }
        if($_POST){
            $arr["full_name"]=$_POST["name"];
            $data=$user->update_U_email($email, $arr);
            $this->redirect('profile_eventmanager');
        }
        
        $this->view('profile_eventmanager',['rows'=>$data]);
    }
}