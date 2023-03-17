<?php

class Org_admin_event_items extends Controller
{
    function index()
    {
        // $user = new User();
        // $data = $user->findAll();
        $item = new Merchandise_item();
        if ($_GET['id']) {
            $item_id = $_GET['id'];
        }
        // $results = array();

        if (Auth::getusertype() == 'organization') {
            if (count($_POST) > 0) {
                $merch_item = new Merchandise_item();
                $arr['name'] = $_POST['item_name'];
                $arr['org_gov_reg_no'] = $_SESSION['USER']->gov_reg_no;
                $arr['price'] = $_POST['unit_price'];
                $arr['stock'] = $_POST['stock_count'];
                $arr['item_no'] = $_POST['code'];
                

                if(isset($_FILES['image'])){
    
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $image_name = $_FILES['image']['name'];
                    $time = time();
                    $ext = explode('.',$image_name);
                    $image_new_name = 'item.'.$time.'.'.$ext[1];
            
                    
                    if(move_uploaded_file($tmp_name,"../public/images/merch_items/".$image_new_name)){
                        $arr['image'] = $image_new_name;
                        // $merch_item->update_item($item_id,$arr);
                    }
                } 
                
                $merch_item->update_item($item_id,$arr);

                $this->redirect('Org_admin_event_items?id=' . $item_id);
            }
            else{
                $data = $item->where('item_no',$item_id);
                $data = $data[0];
                $this->view('org.admin.event.items', ['item_data' => $data]);
            }

            
        } else {
            $this->redirect('login');
        }
    }
}
