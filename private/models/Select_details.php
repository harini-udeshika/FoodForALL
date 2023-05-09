<?php
class Select_details extends Model{
    protected $table ="select_details";

    public function delete($id)
    {
        $query = "delete from $this->table where id = :id";
        $data['id'] = $id;
        print_r($query);
        return $this->query($query, $data);
    }

}