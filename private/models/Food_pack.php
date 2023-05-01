<?php
class Food_pack extends Model{
    protected $table ="food_pack";
    public function delete_pack($id)
    {
        $query = "delete from $this->table where package_id = :pack_id";
        $data['pack_id'] = $id;
        return $this->query($query, $data);
    }
    public function update_pack($pack_id, $data)
    {

        $str = "";
        foreach ($data as $key => $value) {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str, ",");
        $data['pack_id'] = $pack_id;

        $query = "update $this->table set $str where package_id=:pack_id";
        // $query="insert into $this->table($columns) values(:$values)";
        return $this->query($query, $data);
    }
}
?>