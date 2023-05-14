<?php
class Familytable extends Controller
{
    function index(){
        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'area_coordinator')) {
            $this->redirect('home');
        }

        $user=new Family();
        // $data=$user->where('area_coodinator_email',$_SESSION['USER']->email);
        
        //can not delete selected families
        $query10="SELECT family.id AS id from family INNER JOIN select_details ON select_details.detail_id=family.id
        LEFT JOIN event ON event.event_id=select_details.event_name WHERE (
        (approved = 1 AND budget = 1 AND launch = 0 AND date > CURDATE()) OR   /*still not launch>*/
        (approved=0 AND budget=1 And launch=0  AND date > CURDATE()) OR /* Approve pending- financial actor */
        (approved=0 AND budget=2 And launch=0  AND date > CURDATE()) OR /* budget  created still draft does not send to the financial actor*/
        (approved=3 AND budget=1 And launch=0  AND date > CURDATE()) OR /*request to modify*/ 
        (approved=1 AND budget=1 AND launch=1 AND date >= CURDATE())) /* ongoing*/
        AND select_details.catagory='family'
        AND select_details.detail_id=family.id "; 

        $data10=$user->query($query10);
        // print_r($query10);

        if(isset($_GET['find1'],$_GET['find2'])){
            // $find1=trim($_GET['find1']," ");
            $find1 = $_GET['find1'];
            $find2 = $_GET['find2'];
            $find1 = str_replace("'", "''", $find1);
            $find2 = str_replace("'", "''", $find2);
            if(!$find1){
                if(!$find2){

                    $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                }else{
                    $new2=$find2;
                    $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND address LIKE '%$new2%' ORDER BY id ASC";
                    // print($new2);
                    $data = $user->query($query);
                    // print($query);
                    $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                }
                
            }else{
                $new=$find1;
                if(!$find2){
                    $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND CONCAT(FullName,Iname) LIKE '%$new%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                }else{
                    $new2=$find2;
                    $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND CONCAT(FullName,Iname) LIKE '%$new%' AND address LIKE '%$new2%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                }
            } 
        }
        elseif(isset($_GET['familymemberMin'],$_GET['familymemberMax'],$_GET['less_one_childrenMin'],$_GET['less_one_childrenMax'],$_GET['less_five_childrenMin'],$_GET['less_five_childrenMax'],$_GET['higher_five_childrenMin'],$_GET['higher_five_childrenMax'],$_GET['healthyadultsMin'],$_GET['healthyadultsMax'],$_GET['diabetesMin'],$_GET['diabetesMax'],$_GET['cholesterolMin'],$_GET['cholesterolMax'])){
            $familymemberMin=(int)($_GET['familymemberMin']);
            $familymemberMax=(int)($_GET['familymemberMax']);
            $less_one_childrenMin=(int)($_GET['less_one_childrenMin']);
            $less_one_childrenMax=(int)($_GET['less_one_childrenMax']);
            $less_five_childrenMin=(int)($_GET['less_five_childrenMin']);
            $less_five_childrenMax=(int)($_GET['less_five_childrenMax']);
            $higher_five_childrenMin=(int)($_GET['higher_five_childrenMin']);
            $higher_five_childrenMax=(int)($_GET['higher_five_childrenMax']);
            $healthyadultsMin=(int)($_GET['healthyadultsMin']);
            $healthyadultsMax=(int)($_GET['healthyadultsMax']);
            $diabetesMin= (int)($_GET['diabetesMin']);
            $diabetesMax=(int)($_GET['diabetesMax']);
            $cholesterolMin=(int)($_GET['cholesterolMin']);
            $cholesterolMax= (int)($_GET['cholesterolMax']);
            $bothMin=(int)($_GET['bothMin']);
            $bothMax= (int)($_GET['bothMax']);

        if($bothMax && $bothMin>0){
            if($familymemberMax && $familymemberMin>0){
                if($less_one_childrenMax && $less_one_childrenMin >0){
                    if($less_five_childrenMax && $less_five_childrenMin>0){
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }else{
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }

                }else{
                    if($less_five_childrenMax && $less_five_childrenMin>0){
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }else{
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (both_patients BETWEEN $bothMin AND $bothMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (both_patients BETWEEN $bothMin AND $bothMax) AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }
                }

            }else{
                if($less_one_childrenMax && $less_one_childrenMin >0){
                    if($less_five_childrenMax && $less_five_childrenMin>0){
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }else{
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)  
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }

                }else{
                    if($less_five_childrenMax && $less_five_childrenMin>0){
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }else{
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((both_patients BETWEEN $bothMin AND $bothMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((both_patients BETWEEN $bothMin AND $bothMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (both_patients BETWEEN $bothMin AND $bothMax)  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } 
        
        
        
        
        else{
            if($familymemberMax && $familymemberMin>0){
                if($less_one_childrenMax && $less_one_childrenMin >0){
                    if($less_five_childrenMax && $less_five_childrenMin>0){
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }else{
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }

                }else{
                    if($less_five_childrenMax && $less_five_childrenMin>0){
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND 
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }else{
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax)AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) 
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax) AND
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((familymembers BETWEEN $familymemberMin AND $familymemberMax))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }
                }

            }else{
                if($less_one_childrenMax && $less_one_childrenMin >0){
                    if($less_five_childrenMax && $less_five_childrenMin>0){
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }else{
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)  
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax )
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (less_one_children BETWEEN $less_one_childrenMin AND $less_one_childrenMax ) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }

                }else{
                    if($less_five_childrenMax && $less_five_childrenMin>0){
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax )AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ) AND (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND 
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (less_five_children BETWEEN $less_five_childrenMin AND $less_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }else{
                        if($higher_five_childrenMax &&  $higher_five_childrenMin >0){
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ((healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (higher_five_children BETWEEN $higher_five_childrenMin AND $higher_five_childrenMax ))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }else{
                            if($healthyadultsMax && $healthyadultsMin>0){
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)  AND
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) 
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND ( (healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax)
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }

                            }else{
                                if($diabetesMax && $diabetesMin>0){
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND 
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax)
                                        )  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (diabetes_patients BETWEEN $diabetesMin AND $diabetesMax))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }else{
                                    if($cholesterolMax && $cholesterolMin>0){
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' AND (
                                        (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax))  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }else{
                                        $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}'  ORDER BY id ASC";
                                        $data = $user->query($query);
                                        // print($query);
                                        $this->view('familytable',['row'=>$data,'row10'=>$data10]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }              
            
            
        }
        else{
            $query = "SELECT * FROM family WHERE area_coodinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
            $data = $user->query($query);
            // print($query);
            $this->view('familytable',['row'=>$data,'row10'=>$data10]);
        }

        
    }

    public function delete(){
        $delete=$_GET['deleteid'];
        $delete_family=new Family();
        $delete_family->delete($delete);

        $this->redirect('familytable');
    }

    
}