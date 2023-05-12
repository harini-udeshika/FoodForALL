<?php
class Select_family extends Controller
{
    function index(){
        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'eventmanager')) {
            $this->redirect('home');
        }
                $eventid=$_GET['eid'];
                $select_details = new select_details();
                $family=new Family();
                $query_0="SELECT family.familymembers,ROW_NUMBER() OVER (ORDER BY family.id) AS  fcount, (family.less_one_children + family.less_five_children+family.higher_five_children) AS children,(family.familymembers- (family.less_one_children + family.less_five_children+family.higher_five_children))AS adults ,
                area_coodinator.district, area_coodinator.area, family.cholesterol_patients, family.both_patients,family.less_one_children ,family.less_five_children,family.higher_five_children,event.date,
                family.diabetes_patients,family.healthy_adults,family.id,select_details.id AS uniqueid FROM family
                LEFT JOIN area_coodinator ON family.area_coodinator_email = area_coodinator.email  
                LEFT JOIN select_details ON select_details.detail_id = family.id 
                LEFT JOIN event ON event.event_id='$eventid'
                where select_details.event_name= '$eventid' AND select_details.catagory='family'";

                $query_1 = "SELECT family.familymembers,ROW_NUMBER() OVER (ORDER BY family.id) AS  fcount, (family.less_one_children + family.less_five_children+family.higher_five_children) AS children,(family.familymembers- (family.less_one_children + family.less_five_children+family.higher_five_children))AS adults ,
                area_coodinator.district, area_coodinator.area, family.cholesterol_patients, family.both_patients,family.less_one_children ,family.less_five_children,family.higher_five_children,event.date,
                family.diabetes_patients,family.healthy_adults,family.id,select_details.id AS uniqueid,
                PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(event.date, '%Y%m')) AS month_diff
                FROM family
                LEFT JOIN area_coodinator ON family.area_coodinator_email = area_coodinator.email 
                LEFT JOIN select_details ON select_details.detail_id = family.id 
                Left JOIN event ON event.event_id=select_details.event_name
                WHERE select_details.catagory='family'
                group BY(family.id)
                HAVING month_diff <= 3 
                ORDER BY month_diff DESC";

                $query_2 = "SELECT *
                FROM (SELECT family.familymembers,ROW_NUMBER() OVER (ORDER BY family.id) AS  fcount, (family.less_one_children + family.less_five_children+family.higher_five_children) AS children,(family.familymembers- (family.less_one_children + family.less_five_children+family.higher_five_children))AS adults ,
                area_coodinator.district, area_coodinator.area, family.cholesterol_patients, family.both_patients,family.healthy_adults,
                family.diabetes_patients,family.id,family.less_one_children ,family.less_five_children,family.higher_five_children,select_details.id AS uniqueid,
                PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(event.date, '%Y%m')) AS month_diff
                FROM family
                LEFT JOIN area_coodinator ON family.area_coodinator_email = area_coodinator.email 
                LEFT JOIN select_details ON select_details.detail_id = family.id 
                LEFT JOIN event ON event.event_id=select_details.event_name
                WHERE select_details.catagory='family'
                ) AS t
                WHERE 
                t.month_diff BETWEEN 4 AND 6
                GROUP BY 
                t.id
                ORDER BY 
                t.month_diff DESC";

                $query_3 = "SELECT * FROM (SELECT family.familymembers,ROW_NUMBER() OVER (ORDER BY family.id) AS  fcount, (family.less_one_children + family.less_five_children+family.higher_five_children) AS children,(family.familymembers- (family.less_one_children + family.less_five_children+family.higher_five_children))AS adults ,
                area_coodinator.district, area_coodinator.area, family.cholesterol_patients, family.both_patients, family.healthy_adults,
                family.diabetes_patients,family.id,family.less_one_children ,family.less_five_children,family.higher_five_children,select_details.id AS uniqueid,
                PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(event.date, '%Y%m')) AS month_diff
                FROM family
                LEFT JOIN area_coodinator ON family.area_coodinator_email = area_coodinator.email 
                LEFT JOIN select_details ON select_details.detail_id = family.id 
                LEFT JOIN event ON event.event_id=select_details.event_name
                WHERE select_details.catagory='family'
                ) AS t 
                WHERE
                t.month_diff BETWEEN 7 AND 12
                group BY t.id
                ORDER BY t.month_diff DESC";

                $query_4 = "SELECT family.familymembers,ROW_NUMBER() OVER (ORDER BY family.id) AS  fcount, (family.less_one_children + family.less_five_children+family.higher_five_children) AS children,(family.familymembers- (family.less_one_children + family.less_five_children+family.higher_five_children))AS adults ,
                area_coodinator.district, area_coodinator.area, family.cholesterol_patients,family.both_patients, family.healthy_adults,
                family.diabetes_patients,family.id,family.less_one_children ,family.less_five_children,family.higher_five_children,select_details.id AS uniqueid,
                PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(event.date, '%Y%m')) AS month_diff
                FROM family
                LEFT JOIN area_coodinator ON family.area_coodinator_email = area_coodinator.email 
                LEFT JOIN select_details ON select_details.detail_id = family.id 
                left JOIN event ON event.event_id=select_details.event_name
                WHERE select_details.catagory='family' AND PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(event.date, '%Y%m')) > 12
                group BY(family.id)
                ORDER BY month_diff DESC";

                $query_5 = "SELECT family.familymembers,ROW_NUMBER() OVER (ORDER BY family.id) AS  fcount, (family.less_one_children + family.less_five_children+family.higher_five_children) AS children,(family.familymembers- (family.less_one_children + family.less_five_children+family.higher_five_children))AS adults ,
                area_coodinator.district, area_coodinator.area, family.cholesterol_patients, family.both_patients,family.healthy_adults,
                family.diabetes_patients,family.id,(family.id) AS uniqueid,
                family.less_one_children ,family.less_five_children,family.higher_five_children
                FROM family
                LEFT JOIN area_coodinator ON family.area_coodinator_email = area_coodinator.email
                WHERE family.id NOT IN (SELECT detail_id FROM select_details WHERE catagory = 'family' AND detail_id IS NOT NULL)";

                $data_0 = $family->query($query_0);
                $data_1 = $family->query($query_1);
                $data_2 = $family->query($query_2);
                $data_3 = $family->query($query_3);
                $data_4 = $family->query($query_4);
                $data_5 = $family->query($query_5);

                $query1 = "SELECT * FROM select_details WHERE catagory= 'family' AND event_name = $eventid";
                $query2 = "SELECT * FROM select_details WHERE catagory= 'childrenhome' AND event_name = $eventid";
                $query3 = "SELECT * FROM select_details WHERE catagory= 'elderhome' AND event_name = $eventid";

                $data1 = $select_details->query($query1);
                $data2 = $select_details->query($query2);
                $data3 = $select_details->query($query3);

                

        
                $errors=array();
                if(count($_POST)>0){
                    $arr['detail_id']=$_POST['id'];
                    $arr['event_name']=$_POST['eid'];
                    $arr['catagory'] = 'family';
                    $arr['date_entered'] =date('Y-m-d');
                    // var_dump($arr); 


                    
                    $select_details->insert($arr);
                    $this->redirect('select_family?eid=' . urlencode($eventid));
                }else{
                    //error
                    $errors=$select_details->errors;
                }


                
                $this->view('select_family', ['row0'=>$data_0,'row' => $data_1,'row_2' => $data_2,'row_3' => $data_3,'row_4' => $data_4,'row_5' => $data_5,'event'=>$eventid, 'row1'=>$data1,'row2'=>$data2,'row3'=>$data3]);

    }

    public function delete(){
        $delete=$_GET['deleteid'];
        $event=$_GET['eid'];
        $delete_details=new Select_details();
        $delete_details->delete($delete);

        $this->redirect('select_family?eid='. urlencode($event));
    }

        
}