<?php
class Finance_manager extends Model
{
    protected $table = "finance_manager";

    public function change_table($table_name)
    {
        $this->table = $table_name;
    }

}
