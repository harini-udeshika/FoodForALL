<?php
class Home extends Controller{
    function index(){
        $user = new User();
        $event=new Event();

        $org=new Organization();
        $query = "SELECT profile_pic from organization  order by rand() LIMIT 9 ";
        $pics=$org->query($query);
        //print_r($pics);
        $query = "SELECT * FROM event WHERE date>CURRENT_DATE && approved=1 ORDER BY date DESC LIMIT 4";
        $event_data = $event->query($query);
        //print_r($event_data);
        $data = $user->findAll();
        if(Auth::getusertype()=='reg_user'){
            $id=Auth::getid();
            $event=new Event();
            //getting events user participating within this week
            $query='SELECT event.*
            FROM event
            INNER JOIN volunteer ON event.event_id = volunteer.event_id
            WHERE volunteer.user_id = :id
            AND event.date BETWEEN DATE_ADD(CURDATE(), INTERVAL(1-DAYOFWEEK(CURDATE())) DAY) 
            AND DATE_ADD(CURDATE(), INTERVAL(7-DAYOFWEEK(CURDATE())) DAY)';
            $data=$event->query($query,['id'=>$id]);
            $notify_data=$data;
        }
        if(!$notify_data){
            $notify_data=array();
        }
        $this->view('home', ['rows' => $data,'event_data'=>$event_data,'pics'=>$pics,'notify_data'=>$notify_data]);

    } 
   
}
