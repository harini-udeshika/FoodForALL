<?php
class Events extends Controller
{

    public function index()
    {

        $user = new User();
        $event = new Event();

        $data = $user->where('id', Auth::getid());

        if (!Auth::logged_in()) {
            $this->redirect('home');
        }

        if (isset($_GET['find'])) {

            $find = '%' . $_GET['find'] . '%';
            $query = "SELECT event.event_id ,event.name, event.date,event.thumbnail_pic, event.total_amount, event.no_of_volunteers, COUNT(volunteer.user_id) as volunteers, SUM(donate.amount) as total_donated
            FROM event
            LEFT JOIN donate ON event.event_id = donate.event_id
            LEFT JOIN volunteer ON event.event_id = volunteer.event_id
            WHERE event.name like :find && event.date>CURRENT_DATE && event.approved=1
            GROUP BY event.event_id";
            //$query = "select * from event where name like :find && date> CURRENT_DATE && approved=1";
            $arr = ['find' => $find];
            $search_data = $event->query($query, $arr);
            $this->view('events', ['rows' => $search_data]);
        } else if (isset($_GET['date']) && isset($_GET['location'])) {

            $date = $_GET['date'];
            $location = $_GET['location'];

            if (!$date && $location != "default") {
                $query = "SELECT event.event_id ,event.name, event.date,event.thumbnail_pic, event.total_amount, event.no_of_volunteers, COUNT(volunteer.user_id) as volunteers, SUM(donate.amount) as total_donated
                FROM event
                LEFT JOIN donate ON event.event_id = donate.event_id
                LEFT JOIN volunteer ON event.event_id = volunteer.event_id
                WHERE event.location= :location && event.date>CURRENT_DATE && event.approved=1
                GROUP BY event.event_id";
                //$query = "select * from event where location= :location && date> CURRENT_DATE && approved=1";
                $arr = ['location' => $location];
                $search_data = $event->query($query, $arr);
                $this->view('events', ['rows' => $search_data]);
            } else if ($date) {
                $query = "SELECT event.event_id ,event.name, event.date,event.thumbnail_pic, event.total_amount, event.no_of_volunteers, COUNT(volunteer.user_id) as volunteers, SUM(donate.amount) as total_donated
        FROM event
        LEFT JOIN donate ON event.event_id = donate.event_id
        LEFT JOIN volunteer ON event.event_id = volunteer.event_id
        WHERE event.date= :date && event.date>CURRENT_DATE && event.approved=1
        GROUP BY event.event_id";
                $arr = ['date' => $date];
                $filter_data = $event->query($query, $arr);
                //$filter_data = $event->filter($date, $location, 'date', 'location');
                $this->view('events', ['rows' => $filter_data]);
            } else if ($date && $location) {
                $query = "SELECT event.event_id ,event.name, event.date,event.thumbnail_pic, event.total_amount, event.no_of_volunteers, COUNT(volunteer.user_id) as volunteers, SUM(donate.amount) as total_donated
        FROM event
        LEFT JOIN donate ON event.event_id = donate.event_id
        LEFT JOIN volunteer ON event.event_id = volunteer.event_id
        WHERE event.date= :date,event.location = :location event.date>CURRENT_DATE && event.approved=1
        GROUP BY event.event_id";
                $arr = ['date' => $date,
                    'location' => $location];
                $filter_data = $event->query($query, $arr);
                //$filter_data = $event->filter($date, $location, 'date', 'location');
                $this->view('events', ['rows' => $filter_data]);
            } else {

                $query = "SELECT event.event_id ,event.name, event.date,event.thumbnail_pic, event.total_amount, event.no_of_volunteers, COUNT(volunteer.user_id) as volunteers, SUM(donate.amount) as total_donated
        FROM event
        LEFT JOIN donate ON event.event_id = donate.event_id
        LEFT JOIN volunteer ON event.event_id = volunteer.event_id
        WHERE event.date>CURRENT_DATE && event.approved=1
        GROUP BY event.event_id";
                $data = $event->query($query);
                $this->view('events', ['rows' => $data]);
            }
        } else {

            $query = "SELECT event.event_id ,event.name, event.date,event.thumbnail_pic, event.total_amount, event.no_of_volunteers, COUNT(volunteer.user_id) as volunteers, SUM(donate.amount) as total_donated
        FROM event
        LEFT JOIN donate ON event.event_id = donate.event_id
        LEFT JOIN volunteer ON event.event_id = volunteer.event_id
        WHERE event.date>CURRENT_DATE && event.approved=1
        GROUP BY event.event_id";
            $data = $event->query($query);
            //print_r($data);
            $this->view('events', ['rows' => $data]);
        }

    }
    // function index(){

    //     $event=load_model('events');

    //     // $data = $event->where('id',Auth::getid());

    //     // if(!Auth::logged_in()){
    //     //     $this->redirect('home');
    //     // }

    //     // $data = $data[0];
    //     $data=$event->find_all();
    //     print_r($data);
    //     $this->view('events');
    // }
}
