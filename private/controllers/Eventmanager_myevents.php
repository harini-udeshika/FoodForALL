<?php
class Eventmanager_myevents extends Controller
{
    function index(){

        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'eventmanager')) {
            $this->redirect('home');
        }
        $user = new Eventmanager();
        $event = new Event();
        // $data = $user->findAll();
        // $query1 = "SELECT * FROM event WHERE event_manager_email ='{$_SESSION["USER"]->email}' AND approved=1 AND budget=1 And launch=0 AND date > CAST( GETDATE() AS Date) ORDER BY date ASC";//Approved events have to launch
        $query1 = "SELECT * FROM event WHERE event_manager_email = '{$_SESSION["USER"]->email}'AND approved = 1 AND budget = 1 AND launch = 0 AND date > CURDATE()ORDER BY date ASC";
        $query2 = "SELECT * FROM event WHERE event_manager_email ='{$_SESSION["USER"]->email}' AND approved=0 AND budget=1 And launch=0  AND date > CURDATE() ORDER BY date ASC";//Approve pending- financial actor
        $query3 = "SELECT * FROM event WHERE event_manager_email ='{$_SESSION["USER"]->email}' AND approved=0 AND budget=0 And launch=0  AND date > CURDATE() ORDER BY date ASC";//budget not created
        $query4 = "SELECT * FROM event WHERE event_manager_email ='{$_SESSION["USER"]->email}' AND approved=0 AND budget=2 And launch=0  AND date > CURDATE() ORDER BY date ASC";//budget  created still draft does not send to the financial actor
        $query5 = "SELECT * FROM event WHERE event_manager_email ='{$_SESSION["USER"]->email}' AND approved=2 AND budget=1 And launch=0  AND date < CURDATE() ORDER BY date ASC";//rejected events
        $query6 = "SELECT * FROM event WHERE event_manager_email ='{$_SESSION["USER"]->email}' AND approved=3 AND budget=1 And launch=0  AND date < CURDATE() ORDER BY date ASC";//rejected events automatically after do not get action to the change request
        $query7= "SELECT * FROM event WHERE event_manager_email ='{$_SESSION["USER"]->email}' AND approved=3 AND budget=1 And launch=0  AND date > CURDATE() ORDER BY date ASC";//request to modify
        $data1 = $user->query($query1);
        $data2 = $user->query($query2);
        $data3 = $user->query($query3);
        $data4 = $user->query($query4);
        $data5 = $user->query($query5);
        $data6 = $user->query($query6);
        $data7 = $user->query($query7);
        // print($query1);
        // print($query2);
        // print($query3);
        // print($query4);
        
        if (count($_POST)>0) {
            $event_id=$_POST['launch_eventid'];
            $arr['launch']=$_POST['launch-event'];
            $event->update_event($event_id,$arr);
            $this->redirect('Eventmanager_events');  
        }

        $this->view('eventmanager_myevents', ['rows1' => $data1, 'rows2' => $data2, 'rows3' => $data3,'rows4' => $data4,'rows5' => $data5,'rows6' => $data6,'rows7' => $data7]);
        
        
        
    }
   
}