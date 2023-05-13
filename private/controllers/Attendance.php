<?php
class Attendance extends Controller
{
    function index(){
        $manager = new Eventmanager();
        $eid = $_GET["eid"];
        $query="select name from event where event_id=$eid";
        $data=$manager->query($query);
        
        if(isset($_GET["id"])){  
            $key = "my_secret_key";
            $iv = "1234567890123456";// Initialization vector must be 16 bytes for AES encryption in CBC mode
            $cipher = "AES-256-CBC";
            $uid = $_GET["id"];
            $decrypted = openssl_decrypt($uid, $cipher, $key, 0, $iv);
            // echo "hiddddd".$decrypted;
            // $data = $user->findAll();
            // 'event_budget?eid='. urlencode($eventid)
            
            if(isset($_POST['id'])){
                $query2="UPDATE attendance SET attendance=1 WHERE volunteer_nic='$decrypted' AND event_id='$eid'" ;
                $manager->query($query2);
                // header('Location: attendance?eid=' . $eid);
                exit();
            }
            
            
            $this->view('attendance', ['eid'=>$eid,'id'=>$decrypted,'event'=>$data,"error"=>0]);
        }else{
            if(isset($_POST['id'])){
                
                if(empty($_POST["id"])){
                    $this->view('attendance', ['eid'=>$eid,'event'=>$data,'id'=>"","error"=>1]);
                }else{
                    $nic=$_POST["id"];
                    $query2="UPDATE attendance SET attendance=1 WHERE volunteer_nic='$nic' AND event_id='$eid'" ;
                    $manager->query($query2);
                    $this->view('attendance', ['eid'=>$eid,'event'=>$data,'id'=>"","error"=>0]);
                    exit();
                }
                
                // if(!$result) {
                //     $error = "Error: " . $manager->error;
                // } else {
                //     header('Location: attendance?eid=' . $eid);
                //     exit();
                // }
            }else{
                $this->view('attendance', ['eid'=>$eid,'event'=>$data,'id'=>"","error"=>0]);
            }
            
        }
        
    }
   
}