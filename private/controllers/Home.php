<?php
class Home extends Controller{
    function index(){
        $user = new User();
        $event=new Event();

        $org=new Organization();
        $query = "SELECT profile_pic from organization";
        $pics=$org->query($query);
        //print_r($pics);
        $query = "SELECT * FROM event WHERE date>CURRENT_DATE && approved=1 ORDER BY date DESC LIMIT 4";
        $event_data = $event->query($query);
        //print_r($event_data);
        $data = $user->findAll();
        $this->view('home', ['rows' => $data,'event_data'=>$event_data,'pics'=>$pics]);

    }
   
}
