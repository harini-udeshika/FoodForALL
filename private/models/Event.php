<?php
class Event extends Model
{
    protected $table = "event";

    public function update_event($id, $data)
    {

        $str = "";
        foreach ($data as $key => $value) {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str, ",");
        $data['id'] = $id;

        $query = "update $this->table set $str where event_id=:id";
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
}
