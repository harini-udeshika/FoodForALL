<?php
class Merchandise_item extends Model{
    protected $table ="merchandise_item";
    public function delete_item($id)
    {
        $query = "delete from $this->table where item_no = :item_no";
        $data['item_no'] = $id;
        return $this->query($query, $data);
    }
}
?>