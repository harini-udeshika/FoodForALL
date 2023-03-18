<?php
class Event extends Model{
    protected $table ="event";

    public function delete_event($id)
    {
        $query = "delete from $this->table where event_id = :id";
        $data['id'] = $id;
        return $this->query($query, $data);
    }

  

}