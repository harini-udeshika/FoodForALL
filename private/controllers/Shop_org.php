<?php
class Shop_org extends Controller
{
    function index()
    {
        $item = new Merchandise_item();

        if ($_POST) {
            // print_r($_POST);
            // echo "hello1";
            // die;
            $merch_item = new Merchandise_item();


            $arr['name'] = $_POST['itemName'];
            $arr['org_gov_reg_no'] = $_SESSION['USER']->gov_reg_no;
            $arr['price'] = $_POST['price'];
            $arr['stock'] = $_POST['stock'];
            // $arr['item_no'] = $_POST['code'];


            if (isset($_FILES['image'])) {

                $tmp_name = $_FILES['image']['tmp_name'];
                $image_name = $_FILES['image']['name'];
                $time = time();
                $ext = explode('.', $image_name);
                $image_new_name = 'item.' . $time . '.' . $ext[1];


                if (move_uploaded_file($tmp_name, "../public/images/merch_items/" . $image_new_name)) {
                    $arr['image'] = $image_new_name;
                    $merch_item->insert($arr);

                    // $insert_query = "insert into shop (item,price,stock,image,code) values 
                    //         ('$item','$price',' $stock', '$image_new_name', '$code')";

                    // mysqli_query($con, $insert_query);   
                }
            }
            unset($_POST);
        } else {
            // echo "hello error";
            // die;
        }

        $data = $item->where('org_gov_reg_no', $_SESSION['USER']->gov_reg_no);
        $this->view('shop_org.view', ['allitems' => $data]);
    }

    public function delete_item()
    {
        $code = $_GET['id'];
        // echo $code;
        // die;
        $item_del = new Merchandise_item();
        $reg_no = Auth::gov_reg_no();
        if ($item_del->where('item_no', $code)) {
            $item_data = $item_del->where('item_no', $code);
            // print_r($item_data);
            if ($item_data[0]->org_gov_reg_no == $reg_no) {
                $item_del->delete_item($code);
                $this->redirect('shop_org');
            } else {
                $this->redirect('shop_org');
            }
            die;
        } else {
            $this->redirect('shop_org');
        }

        $this->redirect('shop_org');
    }

    public function countLastItems()
    {
        $item = new Merchandise_item();
        $query = "SELECT COUNT(*) AS row_count
            FROM merchandise_item
            WHERE org_gov_reg_no= :id && added_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
        $arr_1 = ['id' => Auth::gov_reg_no()];
        $items_30_days = $item->query($query, $arr_1);

        echo $items_30_days[0]->row_count;
    }

    public function isPayed()
    {
        $item = new Merchandise_item();
        $query = "SELECT COUNT(*) AS row_count
            FROM merchandise_item
            WHERE org_gov_reg_no= :id && added_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
        $arr_1 = ['id' => Auth::gov_reg_no()];
        $items_30_days = $item->query($query, $arr_1);

        echo $items_30_days[0]->row_count;

        $org = new Organization();
        $data = $org->where('gov_reg_no', Auth::gov_reg_no());
    
        $date = new DateTime();
        $today = $date->format('Y-m-d');
        // echo $today;
        $paid_date = DateTime::createFromFormat('Y-m-d', $data[0]->sub_fee_paid_date);
        $today = DateTime::createFromFormat('Y-m-d', $today);

        $interval = $paid_date->diff($today);
        $days = $interval->days;
        
        if($days <= 30 && $items_30_days[0]->row_count < 3){
            echo "TRUE";
        } else {
            echo "FALSE";
        }
        die;
    }
}
