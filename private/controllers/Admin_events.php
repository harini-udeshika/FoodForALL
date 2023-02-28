<?php
class Admin_events extends Controller
{
    function index()
    {
        $user = new Admin_events();
        $event_model = new Admin_events_model();

        $ongoing_events = $event_model->selectOngoing();
        if($ongoing_events==NULL){
            $ongoing_events=array();
        }

        $completed_events = $event_model->selectCompleted();
        if($completed_events==NULL){
            $completed_events=array();
        }

        if (Auth::isuser('admin')) {
            $user->view('admin.events', 
                ['ongoing_events' => $ongoing_events],
                ['completed_events' => $completed_events],
        );
        } else {
            $this->redirect('login');
        }
    }
}
