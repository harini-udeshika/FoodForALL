<?php
class Event extends Model
{
    protected $table = "event";
    public function sent_requests($req_data){
        for($i=0;$i<sizeof($req_data);$i++) {
            if($req_data[$i]->volunteer_type=='Moderate'){
                $volunteer_types['moderate']=1;
            }
            if($req_data[$i]->volunteer_type=='Mild'){
                $volunteer_types['mild']=1;
            }
            if($req_data[$i]->volunteer_type=='Heavy'){
                $volunteer_types['heavy']=1;
            }
        }
        return $volunteer_types;
    }
    public function update_event($id, $data)
    {

        $str = "";
        foreach ($data as $key => $value) {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str, ",");
        $data['id'] = $id;

        $query = "update $this->table set $str where event_id=:id";
        // echo $query;
        // die;
        // $query="insert into $this->table($columns) values(:$values)";
        return $this->query($query, $data);
    }

    public function delete_event($id)
    {
        $query = "delete from $this->table where event_id = :id";
        $data['id'] = $id;
        return $this->query($query, $data);
    }

  

}