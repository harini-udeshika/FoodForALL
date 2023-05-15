<?php
class Organization extends Model
{
    // for table organization
    public function validate($DATA)
    {
        // echo "<pre>";
        // print_r($DATA["organization"]);
        $result1 = $this->where('email', $DATA["email"]);
        $result2 = $this->where('gov_reg_no', $DATA["gov_no"]);
        if (!empty($result1)) {
            // echo "<pre>";
            // print_r(sizeof($result1));
            // print_r($result1);
            $error = "error";
            $_SESSION['error1'] = "*This email already exists";
            // echo $error;
            // die;
        }

        if (!empty($result2)) {
            $error = "error";
            $_SESSION['error2'] = "*This Gov. registration No. already exists";
        }
        // echo "empty";
        // die;

        if (isset($_SESSION['error1']) || isset($_SESSION['error2'])) {
            return false;
        }

        return true;
    }

    public function code()
    {
        $arr = array();
        $arr['code'] = rand(10000, 99999);
        $arr['email'] = $_SESSION['USER']->email;
        $arr['expires'] = time() + (60) * 3;
        return $arr;
    }

    public function change_pwd_code()
    {
        $arr = array();
        $arr['code'] = rand(10000, 99999);
        // $arr['email'] = $_SESSION['USER']->email;
        $arr['expires'] = time() + (60) * 3;
        return $arr;
    }

    public function add_images($id,$count)
    {
        if($count != 0){
            $org_images = $this->get_images($id);
        } else {
            $org_images = [];
        }
        $imageCount = count($_FILES['images']['name']);
        for ($i = $count,$j = 0; $i <= 3 && $j < $imageCount; $i++,$j++) {
            $image_name = $_FILES['images']['name'][$j];
            $img_extention = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
            $new_imgName = "image-" . $id . '-' . $i+$j . '.' . $image_name;
            // $new_imgName = "image-" . $id . '-' . $i . '.' . $img_extention;
            $img_upload_path = 'uploads/' . $new_imgName;
            move_uploaded_file($_FILES['images']['tmp_name'][$j], $img_upload_path);

            $image = new Image();
            $this->crop_org_image($img_upload_path, $img_upload_path, 800, 800);
            if ($this->crop_org_image($img_upload_path, $img_upload_path, 800, 800)) {
            }

            array_push($org_images, $new_imgName);
        }

        $imagesURL = implode(',', $org_images);
        return $imagesURL;
    }

    public function get_images($id)
    {

        $query = "SELECT * FROM organization WHERE id= :id";
        $arr = ['id' => $id];
        $data = $this->query($query, $arr);
        $org_data = $data[0];
        // print_r($org_data);

        $imagesList = $org_data->images;
        $img_arr = explode(',', $imagesList);
        return $img_arr;
    }

    public function crop_org_image($original_file_name, $cropped_file_name, $max_width, $max_height)
    {

        if (file_exists($original_file_name)) {

            $original_image = imagecreatefromjpeg($original_file_name);

            $original_width = imagesx($original_image);
            $original_height = imagesy($original_image);

            if ($original_height > $original_width) {
                //make width equals to max max_width
                // echo "h gt w";
                // die;
                $ratio = $max_width / $original_width;
                $new_width = $max_width;
                $new_height = $original_height * $ratio;
            } else {
                // echo "h lt w";
                // die;
                $ratio = $max_height / $original_height;
                $new_height = $max_height;
                $new_width = $original_width * $ratio;
            }
        }
        $new_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
        imagedestroy($original_image);
        //cropping
        if ($new_height > $new_width) {
            // echo "h gt w";
            // die;
            $diff = ($new_height - $new_width);
            $y = round($diff / 2);
            $x = 0;
        } else {
            // echo "h lt w";
            //     die;
            $diff = ($new_width - $new_height);
            $x = round($diff / 2);
            $y = 0;
        }
        $new_cropped_image = imagecreatetruecolor($max_width, $max_height);
        imagecopyresampled($new_cropped_image, $new_image, 0, 0, $x, $y, $max_width, $max_height, $max_width, $max_height);
        imagedestroy($new_image);
        imagejpeg($new_cropped_image, $cropped_file_name, 90);
        imagedestroy($new_cropped_image);
    }

    public function selectOngoing($org_reg)
    {
        $events = new Event();
        $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0 && date>=CURRENT_DATE";
        $arr = ['id' => $org_reg];
        $ongoing = $events->query($query, $arr);

        if ($ongoing) {
            foreach ($ongoing as $event) {
                // select count of volunteer for each event
                $query = "SELECT amount FROM donate WHERE event_id=$event->event_id";
                $donation = $this->query($query);

                $total = 0;
                $i = 0;

                if ($donation) {
                    $count = count($donation);
                    while ($count > 0) {
                        $total = $total + $donation[$i]->amount;
                        $count--;
                        $i++;
                    }
                    // echo $total;
                    // die;
                }

                $vol_tot = 0;
                $query = "SELECT user_id FROM volunteer WHERE event_id=$event->event_id";
                $vol_data = $this->query($query);
                if ($vol_data) {
                    $vol_tot = count($vol_data);
                }

                // volunteer percentage
                $event->vol_count = $vol_tot;
                if ($event->no_of_volunteers && $event->no_of_volunteers > 0) {
                    $event->vol_percentage = (int) ($vol_tot * 100 / $event->no_of_volunteers);
                } else {
                    $event->vol_percentage = 0;
                }

                // donation percentage
                $event->collected = $total;
                if ($event->total_amount && $event->total_amount > 0) {
                    $event->amount_percentage = (int) ($total * 100 / $event->total_amount);
                } else {
                    $event->amount_percentage = 0;
                }
            }
        }
        // echo "<pre>";
        // print_r($ongoing);
        // die;

        return $ongoing;
    }

    public function selectAll($org_reg)
    {
        $event_name = new Event();
        // $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0 && date>=CURRENT_DATE";
        $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0";
        $arr = ['id' => $org_reg];
        $allEvents = $event_name->query($query, $arr);
        // echo "hello"
        // print_r($allEvents);

        if ($allEvents) {
            foreach ($allEvents as $event) {
                // select count of volunteer for each event
                $query = "SELECT amount FROM donate WHERE event_id=$event->event_id";
                $donation = $this->query($query);

                $total = 0;
                $i = 0;

                if ($donation) {
                    $count = count($donation);
                    while ($count > 0) {
                        $total = $total + $donation[$i]->amount;
                        $count--;
                        $i++;
                    }
                    // echo $total;
                    // die;
                }

                $event->collected = $total;
                // if ($event->total_amount && $event->total_amount > 0) {
                //     $event->amount_percentage = $total * 100 / $event->total_amount;
                // }
            }
        }

        return $allEvents;
    }

    public function selectLastmonth($reg_no)
    {
        $event = new Event();
        $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0 && date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) && date < CURDATE()";
        $arr = ['id' => $reg_no];
        $lastmonth = $event->query($query, $arr);

        if ($lastmonth) {
            foreach ($lastmonth as $event) {
                // select count of volunteer for each event
                $query = "SELECT amount FROM donate WHERE event_id=$event->event_id";
                $donation = $this->query($query);

                $total = 0;
                $i = 0;

                if ($donation) {
                    $count = count($donation);
                    while ($count > 0) {
                        $total = $total + $donation[$i]->amount;
                        $count--;
                        $i++;
                    }
                    // echo $total;
                    // die;
                }

                $vol_tot = 0;
                $query = "SELECT user_id FROM volunteer WHERE event_id=$event->event_id";
                $vol_data = $this->query($query);
                if ($vol_data) {
                    $vol_tot = count($vol_data);
                }

                // volunteer total
                $event->vol_count = $vol_tot;

                // donation total
                $event->collected = $total;
            }
        }
        // echo "<pre>";
        // print_r($lastmonth);
        // die;

        return $lastmonth;
    }
}
