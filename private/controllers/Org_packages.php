<?php

use Stripe\Price;

class Org_packages extends Controller
{
    function index()
    {
        $reg_no = Auth::gov_reg_no();

        $food_pack = new Food_pack();
        if ($_POST) {
            // print_r($_POST);
            // die;

            if ($_POST['pack_name'] && isset($_POST['item_name'])) {
                // print_r($_POST);
                //     die;
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
        } else {
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

    function before_update($id)
    {
        $food_pack = new Food_pack();
        $package_data = $food_pack->where('package_id', $id);

        $data = json_encode($package_data);
        echo ($data);
    }

    function update_pack()
    {
        if (Auth::getusertype() == 'organization') {
            $pack_id = $_GET['pack_id'];

            if ($_POST) {

                if ($_POST['pack_name_update'] && isset($_POST['item_name_update'])) {
                    $pack = new Food_pack();
                    $pack_name = $_POST['pack_name_update'];
                    $i_name = $_POST['item_name_update'];
                    $price = $_POST['price_update'];
                    $quantity = $_POST['quantity_update'];
                    // echo "<pre>";
                    // print_r($i_name);
                    // print_r($price);
                    // echo sizeof($price);
                    // die;


                    $data_item = implode(',', $i_name);
                    $data_price = implode(',', $price);
                    $data_quantity = implode(',', $quantity);

                    $arr['package_name'] = $pack_name;
                    $arr['item_price'] = $data_price;
                    $arr['item_name'] = $data_item;
                    $arr['quantity'] = $data_quantity;
                    $pack->update_pack($pack_id, $arr);
                    $this->redirect('org_packages');
                }
                $this->redirect('org_packages');
            }
        } else {
            $this->redirect('login');
        }
    }

    public function delete_package()
    {
        $reg_no = Auth::gov_reg_no();
        $food_pack = new Food_pack();
        $pack_id = $_GET['id'];
        if ($food_pack->where('package_id', $pack_id)) {
            $package_data = $food_pack->where('package_id', $pack_id);
            print_r($package_data);
            if ($package_data[0]->org_gov_reg_no == $reg_no) {
                $food_pack->delete_pack($pack_id);
                $this->redirect('org_packages');
            } else {
                $this->redirect('org_packages');
            }
            die;
        } else {
            $this->redirect('org_packages');
        }
    }
}
