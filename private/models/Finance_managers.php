<?php

use LDAP\Result;

class Finance_managers extends Model
{
    protected $table = "finance_manager";

    public function change_table($table_name)
    {
        $this->table = $table_name;
    }

    // get budget details
    function budget_details($param=0)
    {
        $currnet_date = (new DateTime())->format('Y-m-d');
        $budget_pending_events = array();
        $budget_org_packages = array();
        $budget_new_packages = array();

        $query = "select event_id,name from event where approved = $param AND date<'$currnet_date'";
        $events = $this->query($query);
        if ($events == false) {
            $events == array();
        }

        // turn each event to an object
        foreach ($events as $event) {
            $new_object = new stdClass();
            $new_object->event_id = $event->event_id;
            $new_object->event_name = $event->name;
            $budget_pending_events[$event->event_id] = $new_object;
        }

        // select org food packs
        foreach ($budget_pending_events as $budget_pending_event) {
            $query = "select package_id,quantity from selected_pakage_org where eid = '$budget_pending_event->event_id'";

            $packages = $this->query($query);

            if ($packages == false) {
                $packages = array();
            }

            $package_array = array();
            $quantity_array = array();

            // explode events, use fore each beacuse there are some null properties
            foreach ($packages as $package) {
                $package_array = explode(",", $package->package_id);
                $quantity_array = explode(",", $package->quantity);
            }

            // add organization budget data
            $budget_object = new stdClass();
            for ($x = 0; $x < count($package_array); $x++) {
                $package = $package_array[$x];

                $query = "select * from food_pack where package_id ='$package'";
                $package_data = $this->query($query);
                $pack = $package_data[0];
                // print_r($pack);

                $pack->item_price = explode(",", $pack->item_price);
                $pack->item_name = explode(",", $pack->item_name);
                $pack->quantity = explode(",", $pack->quantity);

                // calculate package total
                $package_total = 0;
                for ($i = 0; $i < count($pack->item_name); $i++) {
                    $package_total += ($pack->quantity[$i]) * ($pack->item_price[$i]);
                }
                $pack->package_total =  $package_total;
                $pack->package_quantity = $quantity_array[$x];
                $pack->total =  $package_total * ($pack->package_quantity);
                $budget_object->$package = $pack;
            }
            $budget_pending_event->org_budgets = $budget_object;
        }

        // select new food packs
        foreach ($budget_pending_events as $budget_pending_event) {
            $query = "select * from food_pack_new_eventmanager where eid = '$budget_pending_event->event_id'";

            $packages = $this->query($query);

            if ($packages == false) {
                $packages = array();
            }

            $budget_object = new stdClass();
            foreach ($packages as $package) {

                $package->item_price = explode(",", $package->item_price);
                $package->item_name = explode(",", $package->item_name);
                $package->quantity = explode(",", $package->quantity);

                // calculate package total
                $package_total = 0;
                for ($i = 0; $i < count($package->item_name); $i++) {
                    $package_total += ($package->quantity[$i]) * ($package->item_price[$i]);
                }
                $package->package_total =  $package_total;
                $package->total =  $package_total * ($package->package_quantity);

                // assign package to budget object
                $pack_id = $package->package_id;
                $budget_object->$pack_id = $package;
            }
            $budget_pending_event->new_budgets = $budget_object;
        }
        // print_r(($budget_pending_events));
        return $budget_pending_events;

        // print_r($budget_pending_events);
    }

    public function approveBudget($event_id)
    {
        $query = "select event_id from event where event_id= $event_id";
        $result = $this->query($query);

        if ($result == false) {
            return false;
        }

        $query = "update event set approved=1 where event_id= $event_id";
        $this->query($query);
        return true;
    }

    public function rejectBudget($event_id)
    {
        $query = "select event_id from event where event_id= $event_id";
        $result = $this->query($query);

        if ($result == false) {
            return false;
        }

        $query = "update event set approved=-1 where event_id= $event_id";
        $this->query($query);
        return true;
    }
}
