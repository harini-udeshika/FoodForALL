<?php
class Organizationpage extends Controller
{
   function index(){
      $id = $_GET['id'];
      
      $org=new Organization();
      if($id){
          $org_data = $org->where("gov_reg_no", $id);
          $this->view('organizationpage',['org'=>$org_data[0]]);
      }
     // $data=$event->findAll();
     else{
       $this->view('404');
     }
      
   }
   
}
