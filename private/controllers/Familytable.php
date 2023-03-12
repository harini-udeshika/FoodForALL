<?php
class Familytable extends Controller
{
    function index(){
        if(!Auth::logged_in()){
            $this->redirect('login');
        }

        $user=new Family();
        // $data=$user->where('area_coodinator_email',$_SESSION['USER']->email);

        if(isset($_GET['find1'],$_GET['find2'])){
            // $find1=trim($_GET['find1']," ");
            if(!$_GET['find1']){
                if(!$_GET['find2']){
                    $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('familytable',['row'=>$data]);
                }else{
                    $new2=$_GET["find2"];
                    $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND address LIKE '%$new2%' ORDER BY id ASC";
                    // print($new2);
                    $data = $user->query($query);
                    // print($query);
                    $this->view('familytable',['row'=>$data]);
                }
                
            }else{
                $new=$_GET['find1'];
                if(!$_GET['find2']){
                    $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND CONCAT(FullName,Iname) LIKE '%$new%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('familytable',['row'=>$data]);
                }else{
                    $new2=$_GET["find2"];
                    $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND CONCAT(FullName,Iname) LIKE '%$new%' AND address LIKE '%$new2%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('familytable',['row'=>$data]);
                }
            } 
        }
        elseif(isset($_GET['familymemberMin'],$_GET['familymemberMax'],$_GET['healthychildrenMin'],$_GET['healthychildrenMax'],$_GET['malchildrenMin'],$_GET['malchildrenMax'],$_GET['healthyadultsMin'],$_GET['healthyadultsMax'],$_GET['diabetesMin'],$_GET['diabetesMax'],$_GET['cholesterolMin'],$_GET['cholesterolMax'])){
            $familymemberMin=(int)($_GET['familymemberMin']);
            $familymemberMax=(int)($_GET['familymemberMax']);
            $healthychildrenMin=(int)($_GET['healthychildrenMin']);
            $healthychildrenMax=(int)($_GET['healthychildrenMax']);
            $malchildrenMin=(int)($_GET['malchildrenMin']);
            $malchildrenMax=(int)($_GET['malchildrenMax']);
            $healthyadultsMin=(int)($_GET['healthyadultsMin']);
            $healthyadultsMax=(int)($_GET['healthyadultsMax']);
            $diabetesMin= (int)($_GET['diabetesMin']);
            $diabetesMax=(int)($_GET['diabetesMax']);
            $cholesterolMin=(int)($_GET['cholesterolMin']);
            $cholesterolMax= (int)($_GET['cholesterolMax']);
            // print($_GET['healthychildrenMin']);
            // print($_GET['healthychildrenMax']);

            if(($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)>0 ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax ) AND
                (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ))  ORDER BY id ASC";
                // or healthy_children=$healthychildrenMax && $healthychildrenMin OR malnutritioned_children=$malchildrenMax&&$malchildrenMin OR healthy_adults=$helthyadults OR diabetes_patients=$diabetesMax && $diabetesMin OR cholesterol_patients=$cholesterolMax && $cholesterolMin
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            /////
            elseif((( $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin &&  $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)>0) && (($familymemberMax && $familymemberMin  )==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            /////
            elseif((($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin)>0) && (($cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax ) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin && $cholesterolMax && $cholesterolMin)>0) && (($diabetesMax && $diabetesMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax ) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            ////
            elseif((($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin)>0) && (( $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax ) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin && $diabetesMax && $diabetesMin)>0) && (($healthyadultsMax && $healthyadultsMin  &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax ) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin &&$cholesterolMax && $cholesterolMin)>0) && (($healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin )==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax ) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)  ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            ////
            elseif((( $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin &&  $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin)>0) && (($familymemberMax && $familymemberMin  &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((( $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin &&  $healthyadultsMax && $healthyadultsMin && $cholesterolMax && $cholesterolMin)>0) && (($familymemberMax && $familymemberMin  && $diabetesMax && $diabetesMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            ////
            elseif((($malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin )>0) && (($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin  )==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND  (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            ///
            elseif((($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin)>0) && (($healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $healthyadultsMax && $healthyadultsMin)>0) && (($malchildrenMax&&$malchildrenMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $diabetesMax && $diabetesMin )>0) && (($malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin  &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND ((diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $cholesterolMax && $cholesterolMin )>0) && (($malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin  &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            ///
            elseif((($familymemberMax && $familymemberMin && $malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin)>0) && (($healthychildrenMax && $healthychildrenMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $malchildrenMax&&$malchildrenMin && $diabetesMax && $diabetesMin)>0) && (($healthychildrenMax && $healthychildrenMin && $healthyadultsMax && $healthyadultsMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $malchildrenMax&&$malchildrenMin && $cholesterolMax && $cholesterolMin)>0) && (($healthychildrenMax && $healthychildrenMin && $healthyadultsMax && $healthyadultsMin &&$diabetesMax && $diabetesMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $healthyadultsMax && $healthyadultsMin  && $diabetesMax && $diabetesMin)>0) && (($healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin && $cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $healthyadultsMax && $healthyadultsMin  &&  $cholesterolMax && $cholesterolMin)>0) && (($healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin && $diabetesMax && $diabetesMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            ///
            elseif((($familymemberMax && $familymemberMin &&$diabetesMax && $diabetesMin && $cholesterolMax && $cholesterolMin)>0) && (($healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin  && $healthyadultsMax && $healthyadultsMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((( $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin &&  $healthyadultsMax && $healthyadultsMin)>0) && (($familymemberMax && $familymemberMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((( $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin && $diabetesMax && $diabetesMin )>0) && (($familymemberMax && $familymemberMin && $healthyadultsMax && $healthyadultsMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND ((diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((( $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin && $cholesterolMax && $cholesterolMin )>0) && (($familymemberMax && $familymemberMin && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            ///
            elseif((( $healthychildrenMax && $healthychildrenMin && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin)>0) && (($familymemberMax && $familymemberMin && $malchildrenMax&&$malchildrenMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND ((diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((( $healthychildrenMax && $healthychildrenMin && $healthyadultsMax && $healthyadultsMin && $cholesterolMax && $cholesterolMin)>0) && (($familymemberMax && $familymemberMin && $malchildrenMax&&$malchildrenMin && $diabetesMax && $diabetesMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            ///
            elseif((( $healthychildrenMax && $healthychildrenMin && $diabetesMax && $diabetesMin && $cholesterolMax && $cholesterolMin)>0) && (($familymemberMax && $familymemberMin && $malchildrenMax&&$malchildrenMin  && $healthyadultsMax && $healthyadultsMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            ///
            elseif((($malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin )>0) && (($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin  &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND  (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin && $cholesterolMax && $cholesterolMin)>0) && (($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $diabetesMax && $diabetesMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND  (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            ///
            elseif((($malchildrenMax&&$malchildrenMin && $diabetesMax && $diabetesMin && $cholesterolMax && $cholesterolMin)>0) && (($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $healthyadultsMax && $healthyadultsMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            ///
            elseif((($healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin && $cholesterolMax && $cholesterolMin )>0) && (($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            //
            elseif((($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin)>0) && (($malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $malchildrenMax&&$malchildrenMin)>0) && (($healthychildrenMax && $healthychildrenMin && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $healthyadultsMax && $healthyadultsMin)>0) && (($healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin  && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin &&$diabetesMax && $diabetesMin)>0) && (($healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin  && $healthyadultsMax && $healthyadultsMin  &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($familymemberMax && $familymemberMin && $cholesterolMax && $cholesterolMin)>0) && (($healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin  && $healthyadultsMax && $healthyadultsMin  && $diabetesMax && $diabetesMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((( $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin)>0) && (($familymemberMax && $familymemberMin && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            elseif((( $healthychildrenMax && $healthychildrenMin && $healthyadultsMax && $healthyadultsMin)>0) && (($familymemberMax && $familymemberMin && $malchildrenMax&&$malchildrenMin  && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            elseif((( $healthychildrenMax && $healthychildrenMin && $diabetesMax && $diabetesMin)>0) && (($familymemberMax && $familymemberMin && $malchildrenMax&&$malchildrenMin  && $healthyadultsMax && $healthyadultsMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            elseif((( $healthychildrenMax && $healthychildrenMin && $cholesterolMax && $cholesterolMin)>0) && (($familymemberMax && $familymemberMin && $malchildrenMax&&$malchildrenMin  && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax ) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin )>0) && (($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND  (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($malchildrenMax&&$malchildrenMin && $diabetesMax && $diabetesMin )>0) && (($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $healthyadultsMax && $healthyadultsMin  &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($malchildrenMax&&$malchildrenMin && $cholesterolMax && $cholesterolMin )>0) && (($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $healthyadultsMax && $healthyadultsMin  &&$diabetesMax && $diabetesMin )==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            ///
            elseif((($healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin )>0) && (($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin &&$cholesterolMax && $cholesterolMin )==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            elseif((($healthyadultsMax && $healthyadultsMin && $cholesterolMax && $cholesterolMin)>0) && (($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin  &&$diabetesMax && $diabetesMin )==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }

            //
            elseif((($diabetesMax && $diabetesMin && $cholesterolMax && $cholesterolMin)>0) && (($familymemberMax && $familymemberMin && $healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin )==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            ////
            

            elseif(($familymemberMax && $familymemberMin)>0 && (($healthychildrenMax && $healthychildrenMin && $malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax))  ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            elseif(($healthychildrenMax && $healthychildrenMin)>0 && (( $familymemberMax && $familymemberMin&& $malchildrenMax&&$malchildrenMin && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_children BETWEEN $healthychildrenMin AND $healthychildrenMax)  ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            elseif(($malchildrenMax&&$malchildrenMin)>0 && (( $familymemberMax && $familymemberMin&&$healthychildrenMax && $healthychildrenMin  && $healthyadultsMax && $healthyadultsMin && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}'  AND  (malnutritioned_children BETWEEN $malchildrenMin AND $malchildrenMax)  ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            elseif(($healthyadultsMax && $healthyadultsMin)>0 && (( $familymemberMax && $familymemberMin&&$healthychildrenMax && $healthychildrenMin  &&$malchildrenMax&&$malchildrenMin  && $diabetesMax && $diabetesMin &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)  ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            elseif(($diabetesMax && $diabetesMin)>0 && (( $familymemberMax && $familymemberMin&&$healthychildrenMax && $healthychildrenMin  &&$malchildrenMax&&$malchildrenMin  &&$healthyadultsMax && $healthyadultsMin  &&$cholesterolMax && $cholesterolMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            elseif(($cholesterolMax && $cholesterolMin)>0 && (( $familymemberMax && $familymemberMin&&$healthychildrenMax && $healthychildrenMin  &&$malchildrenMax&&$malchildrenMin  &&$healthyadultsMax && $healthyadultsMin  &&$diabetesMax && $diabetesMin)==0) ){
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            else{
                $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
                $data = $user->query($query);
                // print($query);
                $this->view('familytable',['row'=>$data]);
            }
            
            
        }
        else{
            $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
            $data = $user->query($query);
            // print($query);
            $this->view('familytable',['row'=>$data]);
        }

        
    }

    public function delete(){
        $delete=$_GET['deleteid'];
        $delete_family=new Family();
        $delete_family->delete($delete);

        $this->redirect('familytable');
    }

    
}