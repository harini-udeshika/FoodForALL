<?php


use Stripe\Price;
class Event_budget extends Controller
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

            $query5= "SELECT food_pack.package_id,food_pack.photograph,food_pack.package_name,food_pack.item_price,food_pack.item_name,food_pack.org_gov_reg_no,food_pack.quantity,selected_pakage_org.quantity AS selected_package_org_quantity FROM  food_pack 
            Left JOIN eventmanager ON food_pack.org_gov_reg_no =eventmanager.org_gov_reg_no
            INNER JOIN selected_pakage_org ON selected_pakage_org.eid='$eventid' "; //organization food packages

            

            if (count($_POST) > 0) {
                // print_r($_POST);
                // die;

                if (isset($_POST['new_form'])) {
                    // print_r($_POST);
                    $pack_name = $_POST['pack_name'];
                    $i_name = $_POST['item_name'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    echo "<pre>";
                    // print_r($i_name);
                    // print_r($price);
                    // echo sizeof($price);


                    $data_item = implode(',', $i_name);
                    $data_price = implode(',', $price);
                    $data_quantity = implode(',', $quantity);

                    echo "<br>";
                    echo $data_item;
                    echo "<br>";
                    echo ($data_price);
                    echo "<br>";

                    $arr['package_name'] = $_POST['pack_name'];
                    $arr['item_price'] = $data_price;
                    $arr['item_name'] = $data_item;
                    $arr['quantity'] = $data_quantity;
                    $arr['eid'] = $eventid;
                    $arr['package_quantity'] = $_POST['package_quantity'];
                    $pack->insert($arr);
                    $this->redirect('event_budget?eid='. urlencode($eventid));
                    
                }elseif(isset($_POST['organize_packges'])){
                    // print_r($_POST);
                    
                    $quantity_new= $_POST['quantity_new'];
                    $pack_id_new = $_POST['pack_new'];
                    $price_new = $_POST['price_new'];
                    $delimiter = ',';

                    $quantity_str = implode($delimiter, $quantity_new);
                    $pack_id_str = implode($delimiter, $pack_id_new);
                    $price_str = implode($delimiter, $price_new );

                    // print_r($quantity_str);
                    $query_1 = "INSERT INTO selected_pakage_org (eid, package_id, quantity, prices)
                    VALUES ($eventid, '$pack_id_str', '$quantity_str', '$price_str')
                    ON DUPLICATE KEY UPDATE quantity = VALUES(quantity)";

          
                    // print_r($query_1);
                    $data_1=$budget_org_pack->query($query_1);
                }elseif(isset($_POST['eventmanager_packges'])){
                    print_r($_POST);
                    $quantity_new2 = $_POST['package_quantity'];
                    $pack_id_new2 = $_POST['package_id'];
                
                    foreach ($pack_id_new2 as $index => $pack_id) {
                        $quantity = $quantity_new2[$index];
                        $query_2 = "UPDATE food_pack_new_eventmanager SET package_quantity = $quantity WHERE package_id = $pack_id";
                        $food_pack->query($query_2);
                    }
                }
               
            }
            
            $data1= $eventmanager->query($query1);
            $data2= $eventmanager->query($query2);
            $data3= $eventmanager->query($query3);
            $package_data= $pack->query($query4);
            $food_pack_data= $food_pack->query($query5);
            // print_r($food_pack_data);
            // print_r($query5);
            
            $this->view('event_budget',['row'=>$data,'row1'=>$data1,'row2'=>$data2,'row3'=>$data3,'package_data' => $package_data,'food_pack' => $food_pack_data]);
        
        
        
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