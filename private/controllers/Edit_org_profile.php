<?php
class Edit_org_profile extends Controller
{
    function index(){
        
        $user =new Organization();
        
        if(!Auth::logged_in()){
            $this->redirect('home');
        }
        if($_POST){
            $id=Auth::getid();
            $arr['name'] = $_POST["name"];
            $arr['city'] = $_POST["city"];
            $arr['tel'] = $_POST["tel"];
            $arr['email'] = $_POST["email"];
            $arr['about'] = $_POST["about"];
            $arr['gov_reg_no'] = $_POST["gov_no"];
            $user->update($id,$arr);
            $this->redirect('edit_org_profile');   
        }
        else{
            // echo "no post";
            // die;
        }

      
        $data = $user->where('id',Auth::getid());    
        // print_r ($data);
        // echo ($data[0]->id);
        $data = $data[0];
        $this->view('edit_org_profile.view',['rows'=>$data]);
       
        
        

    }
    
}
