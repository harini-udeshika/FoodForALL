<?php
class Merchandise_item extends Model{
    protected $table ="merchandise_item";
    public function delete_item($id)
    {
        // $query = "delete from $this->table where item_no = :item_no";
        $query = "UPDATE $this->table
        SET deactivated = 1
        WHERE item_no = :item_no";
        $data['item_no'] = $id;
        return $this->query($query, $data);
    }
    public function update_item($item_id, $data)
    {

        $str = "";
        foreach ($data as $key => $value) {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str, ",");
        $data['item_no'] = $item_id;

        $query = "update $this->table set $str where item_no=:item_no";
        // $query="insert into $this->table($columns) values(:$values)";
        return $this->query($query, $data);
    }

   
}
