<?php
class Eventmanager_events extends Controller
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
        $data1 = $user->query($query1);
        $data2 = $user->query($query2);
        // print($query1);
        // print($query2);

        $this->view('eventmanager_events', ['rows1' => $data1, 'rows2' => $data2]);
        
        
        
    }
   
}