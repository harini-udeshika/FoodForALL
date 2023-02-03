<?php
class Organizationpage extends Controller
{
    public function index()
    {
        $id = $_GET['id'];
       
        $org = new Organization();
        $event = new Event();
        $comment=new Comments();

        if ($id) {
            $query = "SELECT * FROM event WHERE date<CURRENT_DATE && org_gov_reg_no= :id";
            $arr = ['id' => $id];
            $completed = $event->query($query, $arr);
            //  print_r($completed);
            $query = "SELECT * FROM event WHERE date>CURRENT_DATE && org_gov_reg_no= :id";
            $arr = ['id' => $id];
            $ongoing = $event->query($query, $arr);
            //  print_r($ongoing);
            $org_data = $org->where("gov_reg_no", $id);

            $query = "SELECT comments.comment,comments.date_time,user.first_name,user.profile_pic
            FROM comments
            INNER JOIN user ON comments.id=user.id WHERE comments.gov_reg_no= :org_id";
            $arr = [
                'org_id' => $id,
    
            ];
            $comment_data=$comment->query($query, $arr);
           // print_r($comment_data);
            $this->view('organizationpage', ['org' => $org_data[0], 'ongoing' => $ongoing, 'completed' => $completed,'comment_data'=>$comment_data]);


        }
        // $data=$event->findAll();
        else {
            $this->view('404');
        }
       
        
        if (isset($_POST['comment'])) {
         
            $arr = array();
            $arr['comment'] = $_POST['comment'];
            $arr['id'] = Auth::getid();
            $arr['gov_reg_no'] = $id;
            $data = $comment->insert($arr);
            print_r($data);

        }

    }

}
