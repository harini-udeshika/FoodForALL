<?php
class Eventpage extends Controller
{
   
    function index(){

        $id = $_GET['id'];
        $event = new Event();
        $org=new Organization();
        if($id){
            $data = $event->where("event_id", $id);
            $org_data = $org->where("gov_reg_no", $data[0]->org_gov_reg_no);
            $this->view('eventpage',['rows'=>$data[0],'org'=>$org_data[0]]);
        }
       // $data=$event->findAll();
       else{
         $this->view('404');
       }
       
    }
}
