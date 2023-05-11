<?php
class Profile_areacoordinator extends Controller
{
    function index(){
        
        $user =new AreaCoordinator();
        
        $data = $user->where('email',Auth::getemail());   
        
        if(!Auth::getusertype() == 'areacoordinator'){
            $this->redirect('home');
        }
        
        $data = $data[0];
        $this->view('profile_areacoordinator',['rows'=>$data]);
    }
}