<?php
class Charts extends Controller
{
    public function index()
    {
        if((Auth::logged_in()) && (Auth::getusertype()=="reg_user" || Auth::getusertype()=="admin")){
            $volunteer = new Volunteer();
            $data = $volunteer->where('user_id', Auth::getid());
           
           
            //$user=new User();
            $volunteer_count = $volunteer->count("user_id","user_id",Auth::getid());
            // $volunteer_count=($volunteer_count[0]->count);
        //    print_r ($volunteer_count[0]->count);
    
         
            
            $this->view('charts', ['rows' => $data]);
            
        }
      
        else if (!Auth::logged_in()) {
            $this->redirect('home');
        }else{
            $this->redirect('404');
        }

       
    }

    public function get_stats(){
        $volunteer = new Volunteer();
        $donor=new Donate();
        $id=Auth::getid();
        $query="select count(volunteer.event_id) as count , month(event.date) as month from volunteer 
        INNER JOIN event on event.event_id=volunteer.event_id 
        where YEAR( event.date ) = YEAR( CURDATE() )  && volunteer.attendance=1 && volunteer.user_id= :id 
        group by month(event.date)";
        $arr=['id'=>$id];
        $volunteer_yearly=$volunteer->query($query,$arr);

        $query="select sum(donate.amount) as amount , month(donate.date_time) as month from donate 
        INNER JOIN event on event.event_id=donate.event_id 
        where YEAR( event.date ) = YEAR( CURDATE() ) && donate.donor_id= :id 
        group by month(donate.date_time)";
        $arr=['id'=>$id];
        $donate_yearly=$donor->query($query,$arr);
        // print_r($donate_yearly);

        $volunteer_count = $volunteer->count("user_id","user_id",Auth::getid());
        $donor_count=$donor->count("donor_id","donor_id",Auth::getid());
        $arr=[$volunteer_count,$donor_count,$volunteer_yearly,$donate_yearly];
        // $data = $volunteer->where('user_id', Auth::getid());
         echo json_encode($arr);
        // echo json_encode($donor_count);
        // echo json_encode($volunteer_count);
    }

}
 