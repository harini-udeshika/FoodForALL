<?php
class Reply_reviews extends Controller
{
    function index()
    {

        $comment = new Comments();

        if (count($_POST) > 0) {
            $id = $_GET['id'];
            $reply = $_POST['reply'];
            // $arr['reply'] = $_POST['reply'];
            // print_r($arr);
            // die;
            $query = "UPDATE comments SET reply=:reply where comment_id=:id";
            $arr2['id']=$id;
            $arr2['reply']=$reply;
            // print_r($arr2);
            // die;
            $result = $comment->query($query, $arr2);
            $this->redirect('reply_reviews');  
        } else {
            // echo "hello error";
            // die;
        }

        if (!isset($id)) {
            $query = "SELECT comments.comment,comments.comment_id,comments.date_time,comments.event_name,comments.user_type,comments.star_rate,comments.reply,user.first_name,user.profile_pic
            FROM comments
            INNER JOIN user ON comments.id=user.id WHERE comments.gov_reg_no= :org_id ORDER BY comments.comment_id";
            $arr = [
                'org_id' => $_SESSION['USER']->gov_reg_no,

            ];

            $comment_data = $comment->query($query, $arr);

            $data = $comment->where('gov_reg_no', $_SESSION['USER']->gov_reg_no);
            $this->view('reply_reviews.view', ['allcoms' => $data, 'comment_data' => $comment_data]);
        }
    }
}
