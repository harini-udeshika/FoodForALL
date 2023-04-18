<?php

use Stripe\Price;

class Org_packages extends Controller
{
    function index()
    {
        $reg_no = Auth::gov_reg_no();

        $food_pack = new Food_pack();
        if (count($_POST) > 0) {
            print_r($_POST);
            // die;

            if (count($_POST['item_name'])>0) {
                $pack = new Food_pack();
                $pack_name = $_POST['pack_name'];
                $i_name = $_POST['item_name'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                // echo "<pre>";
                // print_r($i_name);
                // print_r($price);
                // echo sizeof($price);


                $data_item = implode(',', $i_name);
                $data_price = implode(',', $price);
                $data_quantity = implode(',', $quantity);

                // echo "<br>";
                // echo $data_item;
                // echo "<br>";
                // echo ($data_price);
                // echo "<br>";

                $arr['package_name'] = $_POST['pack_name'];
                $arr['item_price'] = $data_price;
                $arr['item_name'] = $data_item;
                $arr['org_gov_reg_no'] = $reg_no;
                $arr['quantity'] = $data_quantity;
                $pack->insert($arr);
                $this->redirect('org_packages');
                
            }
        }else{
            // die;
        }


        $package_data = $food_pack->where('org_gov_reg_no', $reg_no);
        // print_r($package_data);
        // $price_arr = explode(',',$package_data[0]->item_price);
        // print_r($package_data[0]->item_price);

        // print_r($price_arr);
        // echo sizeof($price_arr);
        // echo "<br>";
        // print_r($price_arr[1]);

        // die;
        $this->view('org_packages_2.view', ['package_data' => $package_data]);
    }

    public function delete_package(){
        $reg_no = Auth::gov_reg_no();
        $food_pack = new Food_pack();
        $pack_id = $_GET['id'];
        if($food_pack->where('package_id', $pack_id)){
            $package_data = $food_pack->where('package_id', $pack_id);
            print_r($package_data);
            if($package_data[0]->org_gov_reg_no == $reg_no){
                $food_pack->delete_pack($pack_id);
                $this->redirect('org_packages');
            }else{
                $this->redirect('org_packages');
            }
            die;
        }else{
            $this->redirect('org_packages');
        }
    }
}
