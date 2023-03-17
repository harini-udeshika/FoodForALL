<?php
class Eldertable extends Controller
{
    function index(){
        if(!Auth::logged_in()){
            $this->redirect('login');
        }

        $user=new Elderhome();
        if(isset($_GET['find1'],$_GET['find2'])){
            // $find1=trim($_GET['find1']," ");
            if(!$_GET['find1']){
                if(!$_GET['find2']){
                    $query = "SELECT * FROM elderhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('eldertable',['row'=>$data]);
                }else{
                    $new2=$_GET["find2"];
                    $query = "SELECT * FROM elderhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND address LIKE '%$new2%' ORDER BY id ASC";
                    // print($new2);
                    $data = $user->query($query);
                    // print($query);
                    $this->view('eldertable',['row'=>$data]);
                }
                
            }else{
                $new=$_GET['find1'];
                if(!$_GET['find2']){
                    $query = "SELECT * FROM elderhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('eldertable',['row'=>$data]);
                }else{
                    $new2=$_GET["find2"];
                    $query = "SELECT * FROM elderhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' AND address LIKE '%$new2%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('eldertable',['row'=>$data]);
                }
            } 
        }
        elseif(isset($_GET['memberMin'],$_GET['memberMax'],$_GET['healthyadultsMin'],$_GET['healthyadultsMax'],$_GET['diabetesMin'],$_GET['diabetesMax'],$_GET['cholesterolMin'],$_GET['cholesterolMax'])){
            $memberMin=(int)($_GET['memberMin']);
            $memberMax=(int)($_GET['memberMax']);
            $healthyadultsMin=(int)($_GET['healthyadultsMin']);
            $healthyadultsMax=(int)($_GET['healthyadultsMax']);
            $diabetesMin= (int)($_GET['diabetesMin']);
            $diabetesMax=(int)($_GET['diabetesMax']);
            $cholesterolMin=(int)($_GET['cholesterolMin']);
            $cholesterolMax= (int)($_GET['cholesterolMax']);

            if(($memberMax && $memberMin  && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)>0 ){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMax AND $memberMin) AND
                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)   ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(($memberMax && $memberMin  && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin)>0 && ($cholesterolMax && $cholesterolMin)==0){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMax AND $memberMin) AND
                 (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(($memberMax && $memberMin  && $healthyadultsMax && $healthyadultsMin && $cholesterolMax && $cholesterolMin)>0 && ($diabetesMax && $diabetesMin)==0){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMax AND $memberMin) AND
                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)  ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(($memberMax && $memberMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)>0 && ($healthyadultsMax && $healthyadultsMin)==0 ){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMax AND $memberMin) AND
                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)  AND 
                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)   ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(($healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)>0 && ($memberMax && $memberMin)==0 ){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}'  AND
                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)   ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(($memberMax && $memberMin  && $healthyadultsMax && $healthyadultsMin)>0 &&($diabetesMax && $diabetesMin&&$cholesterolMax && $cholesterolMin)==0){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMax AND $memberMin) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)  ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(($memberMax && $memberMin && $diabetesMax && $diabetesMin )>0 &&($healthyadultsMax && $healthyadultsMin &&$cholesterolMax && $cholesterolMin==0) ){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMax AND $memberMin) AND
                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(($memberMax && $memberMin &&$cholesterolMax && $cholesterolMin)>0 && ($healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin )==0 ){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMax AND $memberMin) AND
                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(( $healthyadultsMax && $healthyadultsMin  &&$cholesterolMax && $cholesterolMin)>0 &&($memberMax && $memberMin && $diabetesMax && $diabetesMin)==0 ){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}'  AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)   ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(( $healthyadultsMax && $healthyadultsMin  &&$cholesterolMax && $cholesterolMin)>0 && ($diabetesMax && $diabetesMin && $memberMax && $memberMin)==0){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}'  AND
                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(($diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)>0 &&($memberMax && $memberMin  && $healthyadultsMax && $healthyadultsMin)==0){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}'  AND
                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(($memberMax && $memberMin)>0 &&($healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMax AND $memberMin) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(($healthyadultsMax && $healthyadultsMin )>0 &&($memberMax && $memberMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0 ){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)   ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(( $diabetesMax && $diabetesMin )>0 && ($memberMax && $memberMin  && $healthyadultsMax && $healthyadultsMin &&$cholesterolMax && $cholesterolMin)==0){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}'  AND
                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)   ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
            elseif(($cholesterolMax && $cholesterolMin)>0 &&($memberMax && $memberMin  && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin)==0){
                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}'  AND
                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)  ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('eldertable',['row'=>$data]);
            }
        }
        
        else{
            $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
            $data = $user->query($query);
            // print($query);
            $this->view('eldertable',['row'=>$data]);
        }
    }


    public function delete(){
        $delete=$_GET['deleteid'];
        $delete_elderhome=new Elderhome();
        $delete_elderhome->delete($delete);

        $this->redirect('eldertable');
    }
}