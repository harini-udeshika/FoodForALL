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

    public function volunteer_email($event_id)
    {
        $volunteer = new Volunteer();
        $user = new User();
        $mail = new Mail();
        $vol_data = $volunteer->where('event_id', $event_id);
        // echo "<pre>";
        // print_r($vol_data);
        if ($vol_data) {
            foreach ($vol_data as $vols) {
                $user_data = $user->where('id', $vols->user_id);
                $user_data = $user_data['0'];

                $receipient = $user_data->email;
                $subject = "Event Reminder FoodForALL";
                $message = "Hello ";
                $mail->send_mail($receipient, $subject, $message);
                // print_r($user_data);
                // echo $receipient;
                // echo "<br>";
                // echo $subject;
                // echo "<br>";
            }
        }

        // die;
    }



    public function add_images($id)
    {
        $event_images = [];
        $imageCount = count($_FILES['images']['name']);
        for ($i = 0; $i < $imageCount; $i++) {
            $image_name = $_FILES['images']['name'][$i];
            $img_extention = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
            $new_imgName = "event-image-" . $id . '-' . $i . '.' . $image_name;
            // $new_imgName = "image-" . $id . '-' . $i . '.' . $img_extention;
            $img_upload_path = 'uploads/' . $new_imgName;
            move_uploaded_file($_FILES['images']['tmp_name'][$i], $img_upload_path);

            $image = new Image();
            $this->crop_org_image($img_upload_path, $img_upload_path, 800, 800);
            if ($this->crop_org_image($img_upload_path, $img_upload_path, 800, 800)) {
            }

            array_push($event_images, $new_imgName);
        }

        $imagesURL = implode(',', $event_images);
        return $imagesURL;
    }

    public function get_images($id)
    {
        $query = "SELECT * FROM event WHERE event_id= :id";
        $arr = ['id' => $id];
        $data = $this->query($query, $arr);
        $event_data = $data[0];

        $imagesList  = $event_data->photographs;
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

    public function get_details($event_id)
    {
        $events = new Event();
        $query = "SELECT * FROM event WHERE event_id= :id";
        $arr = ['id' => $event_id];
        $upcoming = $events->query($query, $arr);

        if ($upcoming) {
            foreach ($upcoming as $event) {
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
                    $event->vol_percentage = (int)($vol_tot * 100 / $event->no_of_volunteers);
                } else {
                    $event->vol_percentage = 0;
                }

                // donation percentage
                $event->collected = $total;
                if ($event->total_amount && $event->total_amount > 0) {
                    $event->amount_percentage = (int)($total * 100 / $event->total_amount);
                } else {
                    $event->amount_percentage = 0;
                }
            }
        }
        // echo "<pre>";
        // print_r($ongoing);
        // die;

        return $upcoming;
    }
}
