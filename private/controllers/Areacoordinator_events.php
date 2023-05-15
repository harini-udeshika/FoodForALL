<?php
class Areacoordinator_events extends Controller
{
    function index(){
        $user = new AreaCoordinator();
        // $data = $user->findAll();
        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'area_coordinator')) {
            $this->redirect('home');
        }
      
           
                    
            if(isset($_GET['date'])){
                $date=$_GET['date'];
                if(!empty($date)){
                    $query1="SELECT count(family.id) AS fcount,count(childrenhome.id) AS ccount,count(elderhome.id) AS ecount,event.name,event.date,event.time,event.event_id,organization.name As org_name,
                    event.thumbnail_pic 
                    FROM select_details
                    Left JOIN family  ON select_details.detail_id= family.id AND select_details.catagory='family'
                    Left JOIN childrenhome  ON select_details.detail_id= childrenhome.id AND select_details.catagory='childrenhome'
                    Left JOIN elderhome  ON select_details.detail_id= elderhome.id AND select_details.catagory='elderhome'
                    INNER JOIN event ON event.event_id=select_details.event_name
                    LEFT JOIN organization ON organization.gov_reg_no =event.org_gov_reg_no 
                    where (family.area_coodinator_email='{$_SESSION["USER"]->email}' OR childrenhome.areacoordinator_email='{$_SESSION["USER"]->email}' OR elderhome.areacoordinator_email='{$_SESSION["USER"]->email}')
                    AND event.date = '{$date}' AND approved=1 AND budget=1 AND launch=1 AND date < CURDATE()
                    GROUP BY event.event_id
                    ORDER BY event.date DESC";
                    $data1 = $user->query($query1);
                    // print($query1);
                    $this->view('Areacoordinator_events',['row1'=>$data1]);
                }else{
                    $query1="SELECT count(family.id) AS fcount,count(childrenhome.id) AS ccount,count(elderhome.id) AS ecount,event.name,event.date,event.time,event.event_id,organization.name As org_name,
                    event.thumbnail_pic 
                    FROM select_details
                    Left JOIN family  ON select_details.detail_id= family.id AND select_details.catagory='family'
                    Left JOIN childrenhome  ON select_details.detail_id= childrenhome.id AND select_details.catagory='childrenhome'
                    Left JOIN elderhome  ON select_details.detail_id= elderhome.id AND select_details.catagory='elderhome'
                    INNER JOIN event ON event.event_id=select_details.event_name
                    LEFT JOIN organization ON organization.gov_reg_no =event.org_gov_reg_no 
                    where (family.area_coodinator_email='{$_SESSION["USER"]->email}' OR childrenhome.areacoordinator_email='{$_SESSION["USER"]->email}' OR elderhome.areacoordinator_email='{$_SESSION["USER"]->email}')
                    AND approved=1 AND budget=1 AND launch=1 AND date < CURDATE()
                    GROUP BY event.event_id
                    ORDER BY event.date DESC";
                    $data1 = $user->query($query1);
                    // print($query1);
                    $this->view('Areacoordinator_events',['row1'=>$data1]);
                }
                
            }
                
            elseif(isset($_GET['find'])){
                $find=$_GET['find'];
                $query1="SELECT count(family.id) AS fcount,count(childrenhome.id) AS ccount,count(elderhome.id) AS ecount,event.name,event.date,event.time,event.event_id,organization.name As org_name,
                event.thumbnail_pic 
                FROM select_details
                Left JOIN family  ON select_details.detail_id= family.id AND select_details.catagory='family'
                Left JOIN childrenhome  ON select_details.detail_id= childrenhome.id AND select_details.catagory='childrenhome'
                Left JOIN elderhome  ON select_details.detail_id= elderhome.id AND select_details.catagory='elderhome'
                INNER JOIN event ON event.event_id=select_details.event_name
                LEFT JOIN organization ON organization.gov_reg_no =event.org_gov_reg_no 
                where (family.area_coodinator_email='{$_SESSION["USER"]->email}' OR childrenhome.areacoordinator_email='{$_SESSION["USER"]->email}' OR elderhome.areacoordinator_email='{$_SESSION["USER"]->email}')
                AND event.name LIKE '%$find%' AND approved=1 AND budget=1 AND launch=1 AND date < CURDATE()
                GROUP BY event.event_id
                ORDER BY event.date DESC";
                $data1 = $user->query($query1);
                // print($query1);
                $this->view('Areacoordinator_events',['row1'=>$data1]);
            }
                        
            else{
                $query1="SELECT count(family.id) AS fcount,count(childrenhome.id) AS ccount,count(elderhome.id) AS ecount,event.name,event.date,event.time,event.event_id,organization.name As org_name,
                event.thumbnail_pic
                FROM select_details
                Left JOIN family  ON select_details.detail_id= family.id AND select_details.catagory='family'
                Left JOIN childrenhome  ON select_details.detail_id= childrenhome.id AND select_details.catagory='childrenhome'
                Left JOIN elderhome  ON select_details.detail_id= elderhome.id AND select_details.catagory='elderhome'
                INNER JOIN event ON event.event_id=select_details.event_name
                LEFT JOIN organization ON organization.gov_reg_no =event.org_gov_reg_no 
                where (family.area_coodinator_email='{$_SESSION["USER"]->email}' OR childrenhome.areacoordinator_email='{$_SESSION["USER"]->email}' OR elderhome.areacoordinator_email='{$_SESSION["USER"]->email}')
                AND approved=1 AND budget=1 AND launch=1 AND date < CURDATE()
                GROUP BY event.event_id
                ORDER BY event.date DESC";

                $data1 = $user->query($query1);
                // print($query1);
                $this->view('Areacoordinator_events',['row1'=>$data1]);
            }
                
       
        
        
    }
   
}

