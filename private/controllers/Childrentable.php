<?php
class Childrentable extends Controller
{
    function index(){
        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'area_coordinator')) {
            $this->redirect('home');
        }

        $user=new Childrenhome();

       //cannot delete selected childrenhomes
        $query10="SELECT childrenhome.id AS id from childrenhome INNER JOIN select_details ON select_details.detail_id=childrenhome.id
        LEFT JOIN event ON event.event_id=select_details.event_name WHERE (
        (approved = 1 AND budget = 1 AND launch = 0 AND date > CURDATE()) OR   /*still not launch>*/
        (approved=0 AND budget=1 And launch=0  AND date > CURDATE()) OR /* Approve pending- financial actor */
        (approved=0 AND budget=2 And launch=0  AND date > CURDATE()) OR /* budget  created still draft does not send to the financial actor*/
        (approved=3 AND budget=1 And launch=0  AND date > CURDATE()) OR /*request to modify*/ 
        (approved=1 AND budget=1 AND launch=1 AND date >= CURDATE())) /* ongoing*/
        AND select_details.catagory='childrenhome'
        AND select_details.detail_id=childrenhome.id "; 

        $data10=$user->query($query10);

        if(isset($_GET['find1'],$_GET['find2'])){
            // $find1=trim($_GET['find1']," ");
            $find1 = $_GET['find1'];
            $find2 = $_GET['find2'];
            $find1 = str_replace("'", "''", $find1);
            $find2 = str_replace("'", "''", $find2);
            if(!$find1){
                if(!$find2){
                    $query = "SELECT * FROM childrenhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                }else{
                    $new2=$find2;
                    $query = "SELECT * FROM childrenhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND address LIKE '%$new2%' ORDER BY id ASC";
                    // print($new2);
                    $data = $user->query($query);
                    // print($query);
                    $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                }
                
            }else{
                $new=$find1;
                if(!$find2){
                    $query = "SELECT * FROM childrenhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                }else{
                    $new2=$find2;
                    $query = "SELECT * FROM childrenhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' AND address LIKE '%$new2%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                }
            } 
        }
        elseif(isset($_GET['memberMin'],$_GET['memberMax'],$_GET['less_one_childrenMin'],$_GET['less_one_childrenMax'],$_GET['less_five_childrenMin'],$_GET['less_five_childrenMax'],$_GET['higher_five_childrenMin'],$_GET['higher_five_childrenMax'])){
            $memberMin=(int)($_GET['memberMin']);
            $memberMax=(int)($_GET['memberMax']);
            $less_one_childrenMin=(int)($_GET['less_one_childrenMin']);
            $less_one_childrenMax=(int)($_GET['less_one_childrenMax']);
            $less_five_childrenMin=(int)($_GET['less_five_childrenMin']);
            $less_five_childrenMax=(int)($_GET['less_five_childrenMax']);
            $higher_five_childrenMin=(int)($_GET['higher_five_childrenMin']);
            $higher_five_childrenMax=(int)($_GET['higher_five_childrenMax']);

            if($memberMax && $memberMin >0){
                if($less_one_childrenMax && $less_one_childrenMin >0){
                    if($less_five_childrenMax && $less_five_childrenMin >0){
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }
                    }else{
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND 
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) )  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }
                    }
            
                }else{
                    if($less_five_childrenMax && $less_five_childrenMin >0){
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }
                    }else{
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }
                    }
                }
            }else{
                if($less_one_childrenMax && $less_one_childrenMin >0){
                    if($less_five_childrenMax && $less_five_childrenMin >0){
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }
                    }else{
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND 
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) )  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }
                    }
            
                }else{
                    if($less_five_childrenMax && $less_five_childrenMin >0){
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }
                    }else{
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}'  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
                        }
                    }
                }
            }
            
        }
        else{
            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
            $data = $user->query($query);
            // print($query);
            $this->view('childrentable',['row'=>$data,'row10'=>$data10]);
        }

        
    }

    public function delete(){
        $delete=$_GET['deleteid'];
        $delete_family=new Childrenhome();
        $delete_family->delete($delete);

        $this->redirect('childrentable');
    }
}