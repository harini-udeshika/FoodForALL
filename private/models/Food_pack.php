<?php
class Food_pack extends Model{
    protected $table ="food_pack";
    public function delete_pack($id)
    {
        $query = "delete from $this->table where package_id = :pack_id";
        $data['pack_id'] = $id;
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
?>