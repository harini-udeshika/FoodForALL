<?php
class Area_coordinator_home extends Controller
{
    function index(){
        $user = new AreaCoordinator();
        // $data = $user->findAll();
        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'area_coordinator')) {
            $this->redirect('home');
        }
        $query1 = "SELECT COUNT(family.id) AS fnum, area_coodinator.name, area_coodinator.district,area_coodinator.email,area_coodinator.area
        FROM  area_coodinator
        INNER JOIN family ON  area_coodinator.email=family.area_coodinator_email
        WHERE  area_coodinator.email='{$_SESSION["USER"]->email}'";

        $query2 = "SELECT COUNT(elderhome.id) AS enum 
        FROM  area_coodinator
        INNER JOIN elderhome ON  area_coodinator.email=elderhome.areacoordinator_email
        WHERE  area_coodinator.email='{$_SESSION["USER"]->email}'";

        $query3 = "SELECT COUNT( childrenhome.id) AS cnum 
        FROM  area_coodinator
        INNER JOIN  childrenhome ON  area_coodinator.email= childrenhome.areacoordinator_email
        WHERE  area_coodinator.email='{$_SESSION["USER"]->email}'";
        
        $data1 = $user->query($query1);
        $data2 = $user->query($query2);
        $data3= $user->query($query3);
        $this->view('Area_coordinator_home', (['rows1' => $data1,'rows2'=>$data2,'rows3'=>$data3]));
        
        
    }
   
}

