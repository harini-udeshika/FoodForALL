<?php
class Requests extends Controller
{
    public function index()
    {
        $vol_req = new Volunteer_request();
        $user_id = Auth::getid();
        //get volunteer request details
        $query = "SELECT event.name, event.location,volunteer_request.id,volunteer_request.event_id, volunteer_request.volunteer_type, volunteer_request.date_time, volunteer_request.message
       from volunteer_request INNER JOIN event ON volunteer_request.event_id=event.event_id
       WHERE volunteer_request.id=:id order by volunteer_request.date_time desc";
    
        $arr = ['id' => $user_id];
        $data = $vol_req->query($query, $arr);
   
        // set rejected for pending requests with past event dates 
        foreach($data as $req){
            if($req->date_time<date('Y-m-d H:i:s') && $req->message=='pending'){
               
               $date=$req->date_time;
                $query="update volunteer_request set message='rejected' where date_time= :date";
                $vol_req->query($query,['date' => $date]);
            }
         
        }
       
        $this->view('requests', ['data' => $data]);

    }

}
