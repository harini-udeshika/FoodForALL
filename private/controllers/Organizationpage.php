<?php
class Organizationpage extends Controller
{
    public function index()
    {
        if(Auth::logged_in()){
            $id = $_GET['id'];
            $user_id = Auth::getid();
            $org = new Organization();
            $event = new Event();
            $comment = new Comments();
            // $errors="";
            if (isset($_POST['comment']) && isset($_POST['event']) && isset($_POST['rate']) && isset($_POST['user_type'])) {
    
                $arr = array();
                $arr['comment'] = $_POST['comment'];
                $arr['id'] = Auth::getid();
                $arr['gov_reg_no'] = $id;
                $arr['user_type'] = $_POST['user_type'];
                $arr['event_name']=$_POST['event'];
                $arr['star_rate'] = $_POST['rate'];
                $data = $comment->insert($arr);
                //print_r($data);
    
            } else if (isset($_POST['comment'])) {
            //    echo ("Please enter the details properly");
            }
    
            if ($id) {
                $query = "SELECT * FROM event WHERE date<CURRENT_DATE && org_gov_reg_no= :id && approved=1";
                $arr = ['id' => $id];
                $completed = $event->query($query, $arr);
                //  print_r($completed);
                $query = "SELECT event.event_id ,event.name, event.date,event.thumbnail_pic, event.total_amount, event.no_of_volunteers, COUNT(volunteer.user_id) as volunteers, SUM(donate.amount) as total_donated
                FROM event
                LEFT JOIN donate ON event.event_id = donate.event_id
                LEFT JOIN volunteer ON event.event_id = volunteer.event_id
                WHERE event.org_gov_reg_no = :id && event.date>CURRENT_DATE && event.approved=1
                GROUP BY event.event_id";
                $arr = ['id' => $id];
                $ongoing = $event->query($query, $arr);
                //  print_r($ongoing);
                $org_data = $org->where("gov_reg_no", $id);
    
                $query = "SELECT comments.comment,comments.reply,comments.date_time,comments.event_name,comments.user_type,comments.star_rate,user.first_name,user.profile_pic
                FROM comments
                INNER JOIN user ON comments.id=user.id WHERE comments.gov_reg_no= :org_id ORDER BY comments.star_rate DESC";
                $arr = [
                    'org_id' => $id,
    
                ];
    
                $comment_data = $comment->query($query, $arr);
                // print_r($comment_data);
    
                $query = "SELECT event.name
               FROM event
               INNER JOIN organization ON event.org_gov_reg_no=organization.gov_reg_no
               INNER JOIN donate ON donate.event_id=event.event_id
               where donate.donor_id= :user_id && organization.gov_reg_no= :org_id && event.date>CURRENT_DATE ";
                $arr = [
                    'user_id' => $user_id,
                    'org_id' => $id,
    
                ];
    
                $d_event_name = $org->query($query, $arr);
    
                $query = "SELECT event.name
               FROM event
               INNER JOIN organization ON event.org_gov_reg_no=organization.gov_reg_no
               INNER JOIN volunteer ON volunteer.event_id=event.event_id
               where volunteer.user_id= :user_id && organization.gov_reg_no= :org_id && event.date>CURRENT_DATE";
                $arr = [
                    'user_id' => $user_id,
                    'org_id' => $id,
    
                ];
                $v_event_name = $org->query($query, $arr);
               // print_r(($v_event_name));
                $this->view('organizationpage', ['org' => $org_data[0], 'ongoing' => $ongoing,
                    'completed' => $completed, 'comment_data' => $comment_data, 'v_event_name' => $v_event_name, 'd_event_name' => $d_event_name]);
    
            }
            // $data=$event->findAll();
            else {
                $this->view('404');
            }

        }
        else{
            $this->redirect('home');
        }
       


    }

}
