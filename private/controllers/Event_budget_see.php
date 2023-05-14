<?php


use Stripe\Price;
class Event_budget_see extends Controller
{
    function index(){
        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'eventmanager')) {
            $this->redirect('home');
        }
            $eventmanager=new EventManager;
            $food_pack = new Food_pack();
            $pack = new Pack();
            $budget_org_pack = new Budget_org_pack();
            $budget_eventmanager_pack= new Budget_eventmanager_pack();
            $eventid=$_GET['eid'];
            $query="SELECT * FROM event where event_id= $eventid";
            $data = $eventmanager->query($query);
            $query1= "SELECT select_details.detail_id, family.cholesterol_patients, family.healthy_adults, family.diabetes_patients, family.both_patients, family.familymembers, 
            family.less_one_children, family.less_five_children, family.higher_five_children,event.event_manager_email 
            FROM select_details 
            LEFT JOIN family ON select_details.detail_id=family.id 
            LEFT JOIN event ON select_details.event_name=event.event_id
            WHERE event_name=$eventid AND catagory='family'";

            $query2= "SELECT select_details.detail_id, childrenhome.less_one_children, childrenhome.less_five_children, childrenhome.higher_five_children 
            FROM select_details 
            LEFT JOIN childrenhome ON select_details.detail_id=childrenhome.id 
            WHERE event_name=$eventid AND catagory='childrenhome'";

            $query3= "SELECT select_details.detail_id, elderhome.cholesterol_patients, elderhome.Healthy_adults, elderhome.Diabetes_patients, elderhome.both_patients
            FROM select_details 
            LEFT JOIN elderhome ON select_details.detail_id=elderhome.id 
            WHERE event_name=$eventid AND catagory='elderhome'";

            
            $query4 = "SELECT food_pack_new_eventmanager.package_id,food_pack_new_eventmanager.eid,food_pack_new_eventmanager.package_quantity, food_pack_new_eventmanager.photograph, food_pack_new_eventmanager.package_name, food_pack_new_eventmanager.item_price, food_pack_new_eventmanager.item_name, food_pack_new_eventmanager.quantity, selected_packages_eventmanager.quantity AS selected_package_event_quantity 
            FROM food_pack_new_eventmanager
            Left  JOIN selected_packages_eventmanager 
            ON food_pack_new_eventmanager.eid = food_pack_new_eventmanager.eid
            where food_pack_new_eventmanager.eid='$eventid'";//event managers new food packages

            $query5= "SELECT food_pack.package_id,food_pack.photograph,food_pack.package_name,food_pack.item_price,food_pack.item_name,food_pack.org_gov_reg_no,food_pack.quantity,COALESCE(selected_pakage_org.quantity, 0) AS selected_package_org_quantity FROM  food_pack 
            INNER JOIN eventmanager ON food_pack.org_gov_reg_no = eventmanager.org_gov_reg_no
            LEFT JOIN selected_pakage_org ON selected_pakage_org.eid='$eventid' WHERE 
            food_pack.org_gov_reg_no = eventmanager.org_gov_reg_no"; //organization food packages 

            $data1= $eventmanager->query($query1);
            $data2= $eventmanager->query($query2);
            $data3= $eventmanager->query($query3);
            $package_data= $pack->query($query4);
            $food_pack_data= $food_pack->query($query5);
            // print_r($food_pack_data);
            // print_r($query5);
            
            $this->view('event_budget_see',['row'=>$data,'row1'=>$data1,'row2'=>$data2,'row3'=>$data3,'package_data' => $package_data,'food_pack' => $food_pack_data]);
        
        
        
    }

    

    public function handle_pack_delete()
{
    if(isset($_GET['id'])){
        $delete = intval($_GET['id']); // Sanitize the id parameter
        $food_pack = new Pack();
        $food_pack->delete_pack($delete);
    }
    // Redirect or display a success message
}

   
}