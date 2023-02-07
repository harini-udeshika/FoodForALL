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
            $query = "select * from event where name like :find && date> CURRENT_DATE";
            $arr = ['find' => $find];
            $search_data = $event->query($query,$arr);
            $this->view('events', ['rows' => $search_data]);
        } else if (isset($_GET['date']) && isset($_GET['location'])) {

            $date = $_GET['date'];
            $location = $_GET['location'];

            if (!$date && $location != "default") {
                $query = "select * from event where location= :location && date> CURRENT_DATE";
                $arr = ['location' => $location];
                $search_data = $event->query($query,$arr);
                $this->view('events', ['rows' => $search_data]);
            } else if ($date) {
                $filter_data = $event->filter($date, $location, 'date', 'location');
                $this->view('events', ['rows' => $filter_data]);
            } else if ($date && $location) {
                $filter_data = $event->filter($date, $location, 'date', 'location');
                $this->view('events', ['rows' => $filter_data]);
            } else {
               
                $query = "SELECT * FROM event WHERE date > CURRENT_DATE";
                $data = $event->query($query);
                $this->view('events', ['rows' => $data]);
            }
        } else {
           
            $query = "SELECT * FROM event WHERE date > CURRENT_DATE";
            $data = $event->query($query);

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
