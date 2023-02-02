<?php
class Shop_org extends Controller
{
    function index(){
        $item = new Merchandise_item();
        $data = $item->where('org_gov_reg_no',$_SESSION['USER']->gov_reg_no);
        // $this->view('shop_org.view', ['allitems' => $data]);

        if(count($_POST)>0){  
            // echo "hello1";
            // die;
            $merch_item = new Merchandise_item();
            $arr['name'] = $_POST['itemName'];
            $arr['org_gov_reg_no'] = $_SESSION['USER']->gov_reg_no;
            $arr['price'] = $_POST['price'];
            $arr['stock'] = $_POST['stock'];
            $arr['item_no'] = $_POST['code'];

    
        if(isset($_FILES['image'])){
    
            $tmp_name = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];
            $time = time();
            $ext = explode('.',$image_name);
            $image_new_name = 'item.'.$time.'.'.$ext[1];
    
            
            if(move_uploaded_file($tmp_name,"../public/images/merch_items/".$image_new_name)){
                $arr['image'] = $image_new_name;
                $merch_item->insert($arr);

                // $insert_query = "insert into shop (item,price,stock,image,code) values 
                //         ('$item','$price',' $stock', '$image_new_name', '$code')";
        
                // mysqli_query($con, $insert_query);   
            }
        } 
    }else{
        // echo "hello error";
        // die;
    }

    $data = $item->where('org_gov_reg_no',$_SESSION['USER']->gov_reg_no);
    $this->view('shop_org.view', ['allitems' => $data]);
    }
   
}