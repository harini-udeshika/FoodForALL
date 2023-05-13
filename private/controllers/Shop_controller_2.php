<?php
class Shop_controller_2 extends Controller
{
    public function isSubscribed()
    {
        $item = new Merchandise_item();
        $query = "SELECT COUNT(*) AS row_count
            FROM merchandise_item
            WHERE org_gov_reg_no= :id && added_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
        $arr_1 = ['id' => Auth::gov_reg_no()];
        $items_30_days = $item->query($query, $arr_1);

        // echo $items_30_days[0]->row_count;

        $org = new Subscribe();
        $data = $org->where('org_gov_reg_no', Auth::gov_reg_no());

        if ($data) {
            $paid_date = new DateTime($data[0]->date);
            $today = new DateTime(); // create a new DateTime object for today's date
            $interval = $paid_date->diff($today);
            $days = $interval->days;
            // echo $days;

            if ($days > 30 && $items_30_days[0]->row_count > 3) {
                echo "FALSE";
            } else {
                echo "TRUE";
            }
        } else {
            echo "FALSE";
        }
    }
}