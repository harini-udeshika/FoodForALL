<?php
class Requests extends Controller
{
    public function index()
    {
        $vol_req = new Volunteer_request();
        $user_id = Auth::getid();
        $query = "SELECT event.name, event.location, volunteer_request.volunteer_type, volunteer_request.date_time, volunteer_request.message
       from volunteer_request INNER JOIN event ON volunteer_request.event_id=event.event_id
       WHERE volunteer_request.id=:id";
        $arr = ['id' => $user_id];
        $data = $vol_req->query($query, $arr);
        // print_r($data);
        $this->view('requests', ['data' => $data]);

    }

}
