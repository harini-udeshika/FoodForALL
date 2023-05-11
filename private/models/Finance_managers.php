<?php
class Finance_managers extends Model
{
    protected $table = "finance_manager";

    public function change_table($table_name)
    {
        $this->table = $table_name;
    }

    // get budget details
    function budget_details()
    {
        $currnet_date = (new DateTime())->format('Y-m-d');
        // $query = "select event_id from event where date > '$currnet_date'AND approved != '1' ";
        $query = "SELECT event.event_id, food_pack.*, food_pack_new.*
        FROM event
        LEFT JOIN food_pack ON event.event_id = food_pack.event_id
        LEFT JOIN food_pack_new ON event.event_id = food_pack_new.event_id
        WHERE event.approved = 1
        ";

        $budget_pending_events = $this->query($query);


        echo ("<pre>");
        print_r($this->query($query));
    }
}
