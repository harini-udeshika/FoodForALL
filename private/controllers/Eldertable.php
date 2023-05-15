<?php
class Eldertable extends Controller
{
    function index(){
        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'area_coordinator')) {
            $this->redirect('home');
        }

        $user=new Elderhome();

        //can not delete selected elderhome
        $query10="SELECT elderhome.id AS id from elderhome INNER JOIN select_details ON select_details.detail_id=elderhome.id
        LEFT JOIN event ON event.event_id=select_details.event_name WHERE (
        (approved = 1 AND budget = 1 AND launch = 0 AND date > CURDATE()) OR   /*still not launch>*/
        (approved=0 AND budget=1 And launch=0  AND date > CURDATE()) OR /* Approve pending- financial actor */
        (approved=0 AND budget=2 And launch=0  AND date > CURDATE()) OR /* budget  created still draft does not send to the financial actor*/
        (approved=3 AND budget=1 And launch=0  AND date > CURDATE()) OR /*request to modify*/ 
        (approved=1 AND budget=1 AND launch=1 AND date >= CURDATE())) /* ongoing*/
        AND select_details.catagory='elderhome'
        AND select_details.detail_id=elderhome.id "; 

        $data10=$user->query($query10);
        // print_r($query10);
        if(isset($_GET['find1'],$_GET['find2'])){
            $find1 = $_GET['find1'];
            $find2 = $_GET['find2'];
            $find1 = str_replace("'", "''", $find1);
            $find2 = str_replace("'", "''", $find2);
            // $find1=trim($_GET['find1']," ");
            if(!$find1){
                if(!$find2){
                    $query = "SELECT * FROM elderhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                }else{
                    $new2=$find2;
                    $query = "SELECT * FROM elderhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND address LIKE '%$new2%' ORDER BY id ASC";
                    // print($new2);
                    $data = $user->query($query);
                    // print($query);
                    $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                }
                
            }else{
                $new=$find1;
                if(!$find2){
                    $query = "SELECT * FROM elderhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                }else{
                    $new2=$find2;
                    $query = "SELECT * FROM elderhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' AND address LIKE '%$new2%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                }
            } 
        }
        elseif(isset($_GET['memberMin'],$_GET['memberMax'],$_GET['healthyadultsMin'],$_GET['healthyadultsMax'],$_GET['diabetesMin'],$_GET['diabetesMax'],$_GET['cholesterolMin'],$_GET['bothMin'],$_GET['cholesterolMax'],$_GET['bothMax'])){
            $memberMin=(int)($_GET['memberMin']);
            $memberMax=(int)($_GET['memberMax']);
            $healthyadultsMin=(int)($_GET['healthyadultsMin']);
            $healthyadultsMax=(int)($_GET['healthyadultsMax']);
            $diabetesMin= (int)($_GET['diabetesMin']);
            $diabetesMax=(int)($_GET['diabetesMax']);
            $cholesterolMin=(int)($_GET['cholesterolMin']);
            $cholesterolMax= (int)($_GET['cholesterolMax']);
            $bothMin=(int)($_GET['bothMin']);
            $bothMax= (int)($_GET['bothMax']);

            if($memberMax &&  $memberMin>0){
                if($healthyadultsMax&&$healthyadultsMin>0){
                    if($bothMax && $bothMin>0){
                        if($diabetesMax && $diabetesMin>0){
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             } 
                         }
                        
                    }else{
                        if($diabetesMax && $diabetesMin>0){
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             } 
                         }
                        
                    }
                }else{
                    if($bothMax && $bothMin>0){
                        if($diabetesMax && $diabetesMin>0){
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND  
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             } 
                         }
                        
                    }else{
                        if($diabetesMax && $diabetesMin>0){
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)  AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             } 
                         }
                        
                    }
                }
            }else{
                if($healthyadultsMax&&$healthyadultsMin>0){
                    if($bothMax && $bothMin>0){
                        if($diabetesMax && $diabetesMin>0){
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             } 
                         }
                        
                    }else{
                        if($diabetesMax && $diabetesMin>0){
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             } 
                         }
                        
                    }
                }else{
                    if($bothMax && $bothMin>0){
                        if($diabetesMax && $diabetesMin>0){
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND  
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             } 
                         }
                        
                    }else{
                        if($diabetesMax && $diabetesMin>0){
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax)  AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
                             } 
                         }
                        
                    }
                }
            }
            
        }
        
        else{
            $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
            $data = $user->query($query);
            // print($query);
            $this->view('eldertable',['row'=>$data,'row10'=>$data10]);
        }
    }


    public function delete(){
        $delete=$_GET['deleteid'];
        $delete_elderhome=new Elderhome();
        $delete_elderhome->delete($delete);

        $this->redirect('eldertable');
    }
}