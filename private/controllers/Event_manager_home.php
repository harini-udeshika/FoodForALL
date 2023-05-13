<?php
class Event_manager_home extends Controller
{
    function index(){
        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'eventmanager')) {
            $this->redirect('home');
        }
        $user = new Eventmanager();
        $query1 = "SELECT * FROM event WHERE event_manager_email ='{$_SESSION["USER"]->email}' AND approved=1 AND budget=1 AND launch=1 AND date >= CURDATE()  ORDER BY date ASC"; //ongoing
        $query2 = "SELECT * FROM event WHERE event_manager_email ='{$_SESSION["USER"]->email}' AND approved=1 AND budget=1 AND launch=1 AND date < CURDATE()   ORDER BY date ASC"; //completed
        $query3 = "SELECT * FROM event WHERE event_manager_email = '{$_SESSION["USER"]->email}'AND approved = 1 AND budget = 1 AND launch = 0 AND date > CURDATE()ORDER BY date ASC"; //still not lanunch
        $query4="SELECT *
        FROM event
        LEFT JOIN select_details ON select_details.event_name=event.event_id 
        LEFT JOIN family ON select_details.detail_id=family.id 
        WHERE event_manager_email = '{$_SESSION["USER"]->email}' AND approved = 1 AND budget = 1 AND launch = 1 AND date < CURDATE() AND select_details.catagory = 'family'; ";

        $query5="SELECT *
        FROM event
        LEFT JOIN select_details ON select_details.event_name=event.event_id 
        LEFT JOIN childrenhome ON select_details.detail_id=childrenhome.id 
        WHERE event_manager_email = '{$_SESSION["USER"]->email}' AND approved = 1 AND budget = 1 AND launch = 1 AND date < CURDATE() AND select_details.catagory = 'childrenhome'; ";

        $query6="SELECT *
        FROM event
        LEFT JOIN select_details ON select_details.event_name=event.event_id 
        LEFT JOIN elderhome ON select_details.detail_id=elderhome.id 
        WHERE event_manager_email = '{$_SESSION["USER"]->email}' AND approved = 1 AND budget = 1 AND launch = 1 AND date < CURDATE() AND select_details.catagory = 'elderhome'; ";
        $data1 = $user->query($query1);
        $data2 = $user->query($query2);
        $data3 = $user->query($query3);
        $data4 = $user->query($query4);
        $data5 = $user->query($query5);
        $data6 = $user->query($query6);
        // print($query1);
        // print($query2);
        // print($query3);
        // print($query4);

   
        $this->view('Event_manager_home', ['rows1' => $data1, 'rows2' => $data2,'rows3' => $data3,'rows4' => $data4,'rows5' => $data5,'rows6' => $data6]);
        
        
        
    }
   
}