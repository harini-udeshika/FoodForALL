<?php
class Donate extends Model{
    protected $table ="donate";
    //arrange donors donated amount according to the descending order of the donations
    public function ranking($arr){
        $place=1;
        $flag=0;
        if($arr!=0){
             for($i=0;$i<sizeof($arr)-1;$i++){

            if($arr[$i]->tot_amount!=$arr[$i+1]->tot_amount){
                $arr[$i]->place=$place;
                if($flag!=0){
                    $place+=$flag;
                }
                $place++;
                $arr[$i+1]->place=$place;
                $flag=0;
               
            } 
            else{
                $arr[$i+1]->place=$place;
                $flag++;
            }
        }
        return $arr;
        }
       else{
        return 0;
       }
    }
  

}