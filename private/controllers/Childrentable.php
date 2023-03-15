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
            if(!$_GET['find1']){
                if(!$_GET['find2']){
                    $query = "SELECT * FROM childrenhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('childrentable',['row'=>$data]);
                }else{
                    $new2=$_GET["find2"];
                    $query = "SELECT * FROM childrenhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND address LIKE '%$new2%' ORDER BY id ASC";
                    // print($new2);
                    $data = $user->query($query);
                    // print($query);
                    $this->view('childrentable',['row'=>$data]);
                }
                
            }else{
                $new=$_GET['find1'];
                if(!$_GET['find2']){
                    $query = "SELECT * FROM childrenhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('childrentable',['row'=>$data]);
                }else{
                    $new2=$_GET["find2"];
                    $query = "SELECT * FROM childrenhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' AND address LIKE '%$new2%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('childrentable',['row'=>$data]);
                }
            } 
        }
        elseif(isset($_GET['memberMin'],$_GET['memberMax'],$_GET['healthychildrenMin'],$_GET['healthychildrenMax'],$_GET['malchildrenMin'],$_GET['malchildrenMax'])){
            $memberMin=(int)($_GET['memberMin']);
            $memberMax=(int)($_GET['memberMax']);
            $healthychildrenMin=(int)($_GET['healthychildrenMin']);
            $healthychildrenMax=(int)($_GET['healthychildrenMax']);
            $malchildrenMin=(int)($_GET['malchildrenMin']);
            $malchildrenMax=(int)($_GET['malchildrenMax']);

            if(($memberMax && $memberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin)>0 ){
                $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax ) AND 
                (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ))  ORDER BY id ASC";
                // or healthy_children=$healthychildrenMax && $healthychildrenMin OR malnutritioned_children=$malchildrenMax&&$malchildrenMin OR healthy_adults=$helthyadults OR diabetes_patients=$diabetesMax && $diabetesMin OR cholesterol_patients=$cholesterolMax && $cholesterolMin
                $data = $user->query($query);
                print($query);
                $this->view('childrentable',['row'=>$data]);
            }
            elseif(($memberMax && $memberMin && $healthychildrenMax && $healthychildrenMin  )>0 && ($malchildrenMax&&$malchildrenMin)==0 ){
                $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax)  AND 
                (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ))  ORDER BY id ASC";
                // or healthy_children=$healthychildrenMax && $healthychildrenMin OR malnutritioned_children=$malchildrenMax&&$malchildrenMin OR healthy_adults=$helthyadults OR diabetes_patients=$diabetesMax && $diabetesMin OR cholesterol_patients=$cholesterolMax && $cholesterolMin
                $data = $user->query($query);
                print($query);
                $this->view('childrentable',['row'=>$data]);
            }
            elseif((($memberMax && $memberMin &&  $malchildrenMax&&$malchildrenMin)>0) && ($healthychildrenMax && $healthychildrenMin)==0 ){
                $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax )  ORDER BY id ASC";
                // or healthy_children=$healthychildrenMax && $healthychildrenMin OR malnutritioned_children=$malchildrenMax&&$malchildrenMin OR healthy_adults=$helthyadults OR diabetes_patients=$diabetesMax && $diabetesMin OR cholesterol_patients=$cholesterolMax && $cholesterolMin
                $data = $user->query($query);
                print($query);
                $this->view('childrentable',['row'=>$data]);
            }
            elseif((($healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin)>0) && ($memberMax && $memberMin)==0  ){
                $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) AND
                (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax ) AND 
                (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ))  ORDER BY id ASC";
                // or healthy_children=$healthychildrenMax && $healthychildrenMin OR malnutritioned_children=$malchildrenMax&&$malchildrenMin OR healthy_adults=$helthyadults OR diabetes_patients=$diabetesMax && $diabetesMin OR cholesterol_patients=$cholesterolMax && $cholesterolMin
                $data = $user->query($query);
                print($query);
                $this->view('childrentable',['row'=>$data]);
            }
            elseif(($memberMax && $memberMin  )>0 && ($malchildrenMax&&$malchildrenMin && $healthychildrenMax && $healthychildrenMin )==0 ){
                $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((children_num BETWEEN $memberMin AND $memberMax) )  ORDER BY id ASC";
                // or healthy_children=$healthychildrenMax && $healthychildrenMin OR malnutritioned_children=$malchildrenMax&&$malchildrenMin OR healthy_adults=$helthyadults OR diabetes_patients=$diabetesMax && $diabetesMin OR cholesterol_patients=$cholesterolMax && $cholesterolMin
                $data = $user->query($query);
                print($query);
                $this->view('childrentable',['row'=>$data]);
            }
            elseif(( $healthychildrenMax && $healthychildrenMin  )>0 && ($memberMax && $memberMin &&$malchildrenMax&&$malchildrenMin)==0 ){
                $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ))  ORDER BY id ASC";
                // or healthy_children=$healthychildrenMax && $healthychildrenMin OR malnutritioned_children=$malchildrenMax&&$malchildrenMin OR healthy_adults=$helthyadults OR diabetes_patients=$diabetesMax && $diabetesMin OR cholesterol_patients=$cholesterolMax && $cholesterolMin
                $data = $user->query($query);
                print($query);
                $this->view('childrentable',['row'=>$data]);
            }
            elseif((( $malchildrenMax&&$malchildrenMin)>0) && ($healthychildrenMax && $healthychildrenMin &&$memberMax && $memberMin)==0  ){
                $query = "SELECT * FROM childrenhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax ) )  ORDER BY id ASC";
                // or healthy_children=$healthychildrenMax && $healthychildrenMin OR malnutritioned_children=$malchildrenMax&&$malchildrenMin OR healthy_adults=$helthyadults OR diabetes_patients=$diabetesMax && $diabetesMin OR cholesterol_patients=$cholesterolMax && $cholesterolMin
                $data = $user->query($query);
                print($query);
                $this->view('childrentable',['row'=>$data]);
            }
            else{
                $query = "SELECT * FROM childrenhome  WHERE areacoordinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('childrentable',['row'=>$data]);
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