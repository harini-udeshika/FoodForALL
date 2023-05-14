<?php
class Certificate_validate extends Controller
{
   public function index(){

    if (!Auth::logged_in()) {
        $this->redirect('event_budget');
    } elseif (Auth::logged_in() && !(Auth::getusertype() == 'eventmanager')) {
        $this->redirect('home');
    }
   
        $cert=new Certificate();
        if(isset($_GET['event_id'])){
         
            if(isset($_GET['cert_id'])){
              
                if(isset($_GET['approve'])=='true'){
                    $query="update certificates set status = 1 where id = :id";
                    $cert->query($query,['id'=>$_GET['cert_id']]);
                    
                } 
                else if(isset($_GET['reject'])=='true'){
                    $query="update certificates set status = 2 where id = :id";
                    $cert->query($query,['id'=>$_GET['cert_id']]);
                  
                }
            }
           
            $id=$_GET['event_id'];
         
            $query="SELECT event.name ,certificates.* ,concat(user.first_name,' ',user.last_name) as fullname from event 
            inner join certificates on certificates.event_id = event.event_id inner join user on user.id=certificates.user_id 
            where certificates.event_id= :event_id";
            $data=$cert->query($query,['event_id'=>$id]);
          

           

            $this->view('certificate_validate',['data'=>$data]);
        }
       
        else{
            $this->view('404');
        }


    
   }
}