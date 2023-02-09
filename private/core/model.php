<?php
class Model extends Database
{
    // protected $table="user";
    public $errors = array();
    public function __construct()
    {
        // echo $this::class;
        if (!property_exists($this, 'table')) {
            $this->table = strtolower($this::class);
        }
    }
    public function where($column, $value)
    {

        $column = addslashes($column);
        $query = "select * from $this->table where $column= :value";
        //echo ($query);
        return $this->query($query, [
            'value' => $value,
        ]);
    }
    public function count($column,$column_con, $value)
    {
        
        $column = addslashes($column);
        $query = "select count($column) as count from  $this->table where $column_con= :value";
       
       
        return $this->query($query, [
            'value' => $value,
        ]);
    }
    public function sum($column,$column_con, $value)
    {
        
        $column = addslashes($column);
        $query = "select sum($column) as total from  $this->table where $column_con= :value";
       
       
        return $this->query($query, [
            'value' => $value,
        ]);
    }
    public function email_exists($email)
    {
        $query = "select * from user where email= :value";
        return $this->query($query, [
            'value' => $email,
        ]);
    }
    public function search($find, $fcolumn)
    {

        $fcolumn = addslashes($fcolumn);
        $query = "select * from $this->table where $fcolumn like :find";
        return $this->query($query, [
            'find' => $find,
        ]);
    }
    public function verify($code, $email)
    {

        $fcolumn = addslashes($email);
        $query = "select * from $this->table where code =:code && email=:email";
        return $this->query($query, [
            'code' => $code,
            'email' => $email,
        ]);
    }
    public function filter($f1, $f2, $col1, $col2)
    {

        // $column=addslashes($column);
        if ($f2 = "default") {
            
            $query = "select * from $this->table where $col1= :f1  && date> CURRENT_DATE && approved=1";
            return $this->query($query, [
                'f1' => $f1,

            ]);
        } else if (!$f1) {
            $query = "select * from $this->table where $col2= :f2 && date> CURRENT_DATE && approved=1";
            return $this->query($query, [
                'f2' => $f2,

            ]);
        }
        $query = "select * from $this->table where $col1= :f1 && $col2= :f2 && date> CURRENT_DATE && approved=1";
        echo ($query);
        return $this->query($query, [
            'f1' => $f1,
            'f2' => $f2,
        ]);
    }
    public function findAll()
    {

        $query = "select * from $this->table";
        return $this->query($query);
    }

    public function insert($data)
    {

        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);

        $query = "insert into $this->table($columns) values(:$values)";
        // echo ($query);
        return $this->query($query, $data);
    }

    public function update($id, $data)
    {

        $str = "";
        foreach ($data as $key => $value) {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str, ",");
        $data['id'] = $id;

        $query = "update $this->table set $str where id=:id";
        // $query="insert into $this->table($columns) values(:$values)";
        return $this->query($query, $data);
    }

    public function update_U_email($email, $data)
    {

        $str = "";
        foreach ($data as $key => $value) {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str, ",");
        $data['email'] = $email;

        $query = "update $this->table set $str where email=:email";
        // $query="insert into $this->table($columns) values(:$values)";
        return $this->query($query, $data);
    }

    public function delete($id)
    {

        $query = "delete from $this->table where id = :id";
        $data['id'] = $id;
        return $this->query($query, $data);
    }
}
