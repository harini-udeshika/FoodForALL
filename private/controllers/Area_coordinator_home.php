<?php
class Area_coordinator_home extends Controller
{
    function index(){
        // $user = new User();
        // $data = $user->findAll();
        $area_coordinator = new AreaCoordinator();
        
        $data = $area_coordinator->where('email',Auth::getemail());
        $data = $data[0];
        $this->view('area_coordinator_view',['rows'=>$data]);
        
    }
}
