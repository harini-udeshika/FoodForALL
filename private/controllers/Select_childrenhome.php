<?php
class Select_childrenhome extends Controller
{
    function index(){
        $eventid=$_GET['eid'];
        $select_details = new select_details();
        $children = new Childrenhome();
        $query_1 = "SELECT childrenhome.less_one_children ,childrenhome.less_five_children,childrenhome.higher_five_children,event.date,
        ROW_NUMBER() OVER (ORDER BY childrenhome.id) AS ccount, select_details.id AS uniqueid,
        childrenhome.children_num, area_coodinator.district, area_coodinator.area, 
        childrenhome.id,
        PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(event.date, '%Y%m')) AS month_diff
        FROM childrenhome
        LEFT JOIN area_coodinator ON childrenhome.areacoordinator_email = area_coodinator.email 
        LEFT JOIN select_details ON select_details.detail_id = childrenhome.id 
        INNER JOIN event ON event.event_id=select_details.event_name
        group BY(childrenhome.id)
        HAVING month_diff <= 3
        ORDER BY month_diff DESC";

        $query_2 = "SELECT *
        FROM (SELECT childrenhome.less_one_children ,childrenhome.less_five_children,childrenhome.higher_five_children,event.date,
        ROW_NUMBER() OVER (ORDER BY childrenhome.id) AS ccount, select_details.id AS uniqueid,
        childrenhome.children_num, area_coodinator.district, area_coodinator.area, 
        childrenhome.id,
        PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(event.date, '%Y%m')) AS month_diff
        FROM childrenhome
        LEFT JOIN area_coodinator ON childrenhome.areacoordinator_email = area_coodinator.email 
        LEFT JOIN select_details ON select_details.detail_id = childrenhome.id 
        INNER JOIN event ON event.event_id=select_details.event_name
        ) AS t
        WHERE 
        t.month_diff BETWEEN 4 AND 6
        GROUP BY 
        t.id
        ORDER BY 
        t.month_diff DESC";

        // $query_3 = "SELECT childrenhome.less_one_children ,childrenhome.less_five_children,childrenhome.higher_five_children,event.date,
        // ROW_NUMBER() OVER (ORDER BY childrenhome.id) AS ccount, select_details.id AS uniqueid,
        // childrenhome.children_num, area_coodinator.district, area_coodinator.area, 
        // childrenhome.id,
        // PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(event.date, '%Y%m')) AS month_diff
        // FROM childrenhome
        // LEFT JOIN area_coodinator ON childrenhome.areacoordinator_email = area_coodinator.email 
        // LEFT JOIN select_details ON select_details.detail_id = childrenhome.id 
        // INNER JOIN event ON event.event_id=select_details.event_name
        // group BY(childrenhome.id)
        // )AS t 
        // WHERE
        // t.month_diff BETWEEN 7 AND 12
        // group BY(t.id)
        // ORDER BY t.month_diff DESC";

        $query_3 =    "SELECT *FROM (
            SELECT childrenhome.less_one_children, childrenhome.less_five_children, childrenhome.higher_five_children, event.date,
                ROW_NUMBER() OVER (ORDER BY childrenhome.id) AS ccount, select_details.id AS uniqueid,
                childrenhome.children_num, area_coodinator.district, area_coodinator.area, 
                childrenhome.id,
                PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(event.date, '%Y%m')) AS month_diff
            FROM childrenhome
            LEFT JOIN area_coodinator ON childrenhome.areacoordinator_email = area_coodinator.email 
            LEFT JOIN select_details ON select_details.detail_id = childrenhome.id 
            INNER JOIN event ON event.event_id = select_details.event_name
            GROUP BY childrenhome.id
        ) AS t 
        WHERE t.month_diff BETWEEN 7 AND 12
        GROUP BY t.id
        ORDER BY t.month_diff DESC";

        $query_4 = "SELECT childrenhome.less_one_children ,childrenhome.less_five_children,childrenhome.higher_five_children,event.date,
        ROW_NUMBER() OVER (ORDER BY childrenhome.id) AS ccount, select_details.id AS uniqueid,
        childrenhome.children_num, area_coodinator.district, area_coodinator.area, 
        childrenhome.id,
        PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(event.date, '%Y%m')) AS month_diff
        FROM childrenhome
        LEFT JOIN area_coodinator ON childrenhome.areacoordinator_email = area_coodinator.email 
        LEFT JOIN select_details ON select_details.detail_id = childrenhome.id 
        INNER JOIN event ON event.event_id=select_details.event_name
        WHERE PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(event.date, '%Y%m')) > 12
        group BY(childrenhome.id)
        ORDER BY month_diff DESC";

        $query_5 = "SELECT childrenhome.less_one_children ,childrenhome.less_five_children,childrenhome.higher_five_children,
        ROW_NUMBER() OVER (ORDER BY childrenhome.id) AS ccount,select_details.id AS uniqueid,
        childrenhome.children_num, area_coodinator.district, area_coodinator.area, 
        childrenhome.id,
        PERIOD_DIFF(DATE_FORMAT(CURRENT_DATE(), '%Y%m'), DATE_FORMAT(select_details.date_entered, '%Y%m')) AS month_diff
        FROM childrenhome
        LEFT JOIN area_coodinator ON childrenhome.areacoordinator_email = area_coodinator.email 
        LEFT JOIN select_details ON select_details.detail_id = childrenhome.id 
        WHERE select_details.detail_id IS NULL
        GROUP BY(childrenhome.id)";


        $data_1 = $children->query($query_1);
        $data_2 = $children->query($query_2);
        $data_3 = $children->query($query_3);
        $data_4 = $children->query($query_4);
        $data_5 = $children->query($query_5);

        $query1 = "SELECT * FROM select_details WHERE catagory= 'family' AND event_name = $eventid";
        $query2 = "SELECT * FROM select_details WHERE catagory= 'childrenhome' AND event_name = $eventid";
        $query3 = "SELECT * FROM select_details WHERE catagory= 'elderhome' AND event_name = $eventid";
        $data1 =$select_details->query($query1);
        $data2 =$select_details->query($query2);
        $data3 =$select_details->query($query3);
        // print(count($data));

        $errors=array();
        if(count($_POST)>0){
            $arr['detail_id']=$_POST['id'];
            $arr['event_name']=$_POST['eid'];
            $arr['catagory'] = 'childrenhome';
            $arr['date_entered'] =date('Y-m-d');
            // var_dump($arr); 


            
            $select_details->insert($arr);
            $this->redirect('select_childrenhome?eid=' . urlencode($eventid));
        }else{
            //error
            $errors=$select_details->errors;
        }
        $this->view('select_childrenhome', ['row' => $data_1,'row_2' => $data_2,'row_3' => $data_3,'row_4' => $data_4,'row_5' => $data_5,'event'=>$eventid, 'row1'=>$data1,'row2'=>$data2,'row3'=>$data3]);
    }

    public function delete(){
        $delete=$_GET['deleteid'];
        $event=$_GET['eid'];
        $delete_details=new Select_details();
        $delete_details->delete($delete);

        $this->redirect('select_childrenhome?eid='. urlencode($event));
    }
   
}