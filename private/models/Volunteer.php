<?php
class Volunteer extends Model
{
    protected $table = "volunteer";
    public function volunteer_marks($arr)
    {
        $check = array();
        if ($arr != array()) {
            //assign marks to a new variable named marks for each category
            for ($i = 0; $i < sizeof($arr); $i++) {
                $arr[$i]->marks = 0;
                $arr[$i]->mild_v = 0;
                $arr[$i]->average_v = 0;
                $arr[$i]->heavy_v = 0;
                if ($arr[$i]->volunteer_type == "mild") {
                    $arr[$i]->marks += $arr[$i]->v_count * 5; 
                    $arr[$i]->mild_v = $arr[$i]->v_count;

                }
                if ($arr[$i]->volunteer_type == "average") {
                    $arr[$i]->marks += $arr[$i]->v_count * 8;
                    $arr[$i]->average_v = $arr[$i]->v_count;
                }
                if ($arr[$i]->volunteer_type == "heavy") {
                    $arr[$i]->marks += $arr[$i]->v_count * 10;
                    $arr[$i]->heavy_v = $arr[$i]->v_count;
                }
            }
// create a check array to track duplicates and delete after finalizing marks
            $size = sizeof($arr);
            for ($i = 0; $i < $size; $i++) {
                if (!isset($check[$arr[$i]->id])) {
                    // echo"done";
                    $check[$arr[$i]->id] = $i;
                } else {
                    if (($arr[$i]->mild_v) > 0) {
                        $arr[$check[$arr[$i]->id]]->mild_v = $arr[$i]->mild_v;
                    } else if (($arr[$i]->average_v) > 0) {
                        $arr[$check[$arr[$i]->id]]->average_v = $arr[$i]->average_v;
                    } else if (($arr[$i]->heavy_v) > 0) {
                        $arr[$check[$arr[$i]->id]]->heavy_v = $arr[$i]->heavy_v;
                    }
                    $arr[$check[$arr[$i]->id]]->marks += $arr[$i]->marks;
                    $arr[$check[$arr[$i]->id]]->v_count += $arr[$i]->v_count;
                    unset($arr[$i]);
                }
            }

// print_r($check);
            $arr = array_values($arr);
            function comparator($object1, $object2)
            {
                return $object1->marks < $object2->marks;
            }
            usort($arr, 'comparator');
            return $arr;
        } else {
            return 0;
        }
    }
    //arrange volunteer details according to the descending order of the marks
    public function ranking($arr)
    {
        $place = 1;
        $flag = 0;
        if ($arr != null) {
            for ($i = 0; $i < sizeof($arr) - 1; $i++) {

                if ($arr[$i]->marks != $arr[$i + 1]->marks) {
                    $arr[$i]->place = $place;
                    if ($flag != 0) {
                        $place += $flag;
                    }
                    $place++;
                    $arr[$i + 1]->place = $place;
                    $flag = 0;

                } else {
                    $arr[$i + 1]->place = $place;
                    $flag++;
                }
            }
            return $arr;
        }else{
            return 0;
        }

    }

}
