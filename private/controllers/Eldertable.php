<?php
class Eldertable extends Controller
{
    function index(){
        if(!Auth::logged_in()){
            $this->redirect('login');
        }

        $user=new Elderhome();
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
                    $this->view('eldertable',['row'=>$data]);
                }else{
                    $new2=$find2;
                    $query = "SELECT * FROM elderhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND address LIKE '%$new2%' ORDER BY id ASC";
                    // print($new2);
                    $data = $user->query($query);
                    // print($query);
                    $this->view('eldertable',['row'=>$data]);
                }
                
            }else{
                $new=$find1;
                if(!$find2){
                    $query = "SELECT * FROM elderhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('eldertable',['row'=>$data]);
                }else{
                    $new2=$find2;
                    $query = "SELECT * FROM elderhome WHERE 	areacoordinator_email='{$_SESSION["USER"]->email}' AND CONCAT(Name,OwnerName) LIKE '%$new%' AND address LIKE '%$new2%' ORDER BY id ASC";
                    $data = $user->query($query);
                    // print($query);
                    $this->view('eldertable',['row'=>$data]);
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
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
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
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
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
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND  
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
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
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) AND
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND ((members BETWEEN $memberMin AND $memberMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
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
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
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
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) AND 
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Healthy_adults BETWEEN $healthyadultsMin AND $healthyadultsMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
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
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) AND (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) AND  
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (both_patients BETWEEN $bothMin AND $bothMax))  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
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
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (Diabetes_patients BETWEEN $diabetesMin AND $diabetesMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }
                         }else{
                            if($cholesterolMax && $cholesterolMin>0){
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' AND (
                                (cholesterol_patients BETWEEN $cholesterolMin AND $cholesterolMax) )  ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
                             }else{
                                $query = "SELECT * FROM elderhome WHERE areacoordinator_email='{$_SESSION["USER"]->email}' ORDER BY id ASC";
                                $data = $user->query($query);
                                // print($query);
                                $this->view('eldertable',['row'=>$data]);
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