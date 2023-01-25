<?php
class Single_event extends Controller
{
    function index(){
        $event = new Event();
        $data=$event->findAll();
        $this->view('single_event',['rows' => $data]);
    }
}
