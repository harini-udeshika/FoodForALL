<?php
class Childrentable extends Controller
{
    function index(){
        if(!Auth::logged_in()){
            $this->redirect('login');
        }

        $user=new Childrenhome();
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
                    $this->view('childrentable',['row'=>$data]);
                }else{
                    $new2=$find2;
                    $query = "SELECT * FROM childrenhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND address LIKE '%$new2%' ORDER BY id ASC";
                    // print($new2);
                    $data = $user->query($query);
                    // print($query);
                    $this->view('childrentable',['row'=>$data]);
                }
                
            }else{
                $new=$find1;
                if(!$find2){
                    $query = "SELECT * FROM childrenhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('childrentable',['row'=>$data]);
                }else{
                    $new2=$find2;
                    $query = "SELECT * FROM childrenhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' AND address LIKE '%$new2%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('childrentable',['row'=>$data]);
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
                            $this->view('childrentable',['row'=>$data]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
                        }
                    }else{
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND 
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) )  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
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
                            $this->view('childrentable',['row'=>$data]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
                        }
                    }else{
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
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
                            $this->view('childrentable',['row'=>$data]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
                        }
                    }else{
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND 
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) )  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
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
                            $this->view('childrentable',['row'=>$data]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
                        }
                    }else{
                        if($higher_five_childrenMax && $higher_five_childrenMin>0){
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                            (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
                        }else{
                            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}'  ORDER BY id ASC";
                            $data = $user->query($query);
                            // print($query);
                            $this->view('childrentable',['row'=>$data]);
                        }
                    }
                }
            }
            
        }
        else{
            $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
            $data = $user->query($query);
            // print($query);
            $this->view('childrentable',['row'=>$data]);
        }

        
    }

    public function delete(){
        $delete=$_GET['deleteid'];
        $delete_family=new Childrenhome();
        $delete_family->delete($delete);

        $this->redirect('childrentable');
    }
}