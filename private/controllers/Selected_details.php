<?php
class Selected_details extends Controller{
    function index(){
        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'eventmanager')) {
            $this->redirect('home');
        }
        $event=$_GET['eid'];
        $select_detail = new Select_details();
        $query1 = "SELECT select_details.detail_id,select_details.catagory,select_details.event_name,ROW_NUMBER() OVER (ORDER BY select_details.id) AS  dcount from select_details WHERE select_details.event_name=$event order by select_details.catagory Asc ";
        // $query2 = "SELECT select_details.detail_id,select_details.catagory,select_details.event_name,ROW_NUMBER() OVER (ORDER BY select_details.id) AS  dcount from select_details WHERE select_details.catagory='childrenhome'";
        $data1 = $select_detail->query($query1);
        // print($query1);
        $this->view('selected_details', ['row' => $data1]);

    }

    public function delete(){
        $delete=$_GET['deleteid'];
        $event=$_GET['eid'];
        $delete_details=new Select_details();
        $delete_details->delete($delete);

        $this->redirect('selected_details?eid='. urlencode($event));
    }
   
}
