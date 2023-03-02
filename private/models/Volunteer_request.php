<?php
class Volunteer_request extends Model{
    protected $table ="volunteer_request";

    public function delete_request($uid,$event_id)
    {
        $query = "delete from $this->table where id = :uid && event_id = :event_id";
        $arr = ['event_id' => $event_id,'uid' => $uid];
        return $this->query($query, $arr);
    }

}