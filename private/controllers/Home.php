<?php
class Home extends Controller{
    function index(){
        $user = new User();
        $event=new Event();
        $query = "SELECT * FROM event WHERE date>CURRENT_DATE ORDER BY date ASC LIMIT 4";
        $event_data = $event->query($query);
        //print_r($event_data);
        $data = $user->findAll();
        $this->view('home', ['rows' => $data,'event_data'=>$event_data]);
    }
   
}
