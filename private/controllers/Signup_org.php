<?php
class Signup_org extends Controller
{
    function index()
    {

        $errors = array();
        if (count($_POST) > 0) {
            // echo "<pre>";
            // print_r($_POST);
            $org = new Organization();
            if ($org->validate($_POST)) {

                $arr['name'] = $_POST['organization'];
                $arr['gov_reg_no'] = $_POST['gov_no'];
                $arr['email'] = $_POST['email'];
                $arr['password'] = password_hash($_POST['pw'], PASSWORD_DEFAULT);;
                $arr['tel'] = $_POST['tel'];
                $arr['address'] = $_POST['address'];
                $arr['city'] = $_POST['city'];
                $arr['postal'] = $_POST['postal-code'];
                $arr['profile_pic'] = "images/Logo_jpg.jpg";

                $image = new Image();
                $image->crop_image($arr['profile_pic'], $arr['profile_pic'], 800, 800);
                // print_r($_FILES);
                // die;
                if (isset($_FILES['pdf_file'])) {
                    $fileName = $_FILES['pdf_file']['name'];
                    $fileTmpName = $_FILES["pdf_file"]["tmp_name"];
                    $fileSize = $_FILES["pdf_file"]["size"];
                    $fileType = $_FILES["pdf_file"]["type"];

                    // Specify the directory where the file should be uploaded
                    $targetDir = "uploads/";
                    // echo $targetDir . $fileName;
                    // die;
     
                    // Move the uploaded file to the specified directory
                    if (move_uploaded_file($fileTmpName, $targetDir . $fileName)) {
                        // If the file was uploaded successfully, insert the file information into the database

                        // $sql = "INSERT INTO files (filename, filepath, filesize, filetype) VALUES ('$fileName', '$targetDir$fileName', '$fileSize', '$fileType')";
                        // mysqli_query($conn, $sql);
                        // mysqli_close($conn);
                        $arr['gov_cetficate_cpy'] = $targetDir . $fileName;
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }
                }




                $org->insert($arr);
                $this->redirect('login');
            } else {
                // $this->redirect('signup_org');
                $errors = $org->errors;
            }
        }
        // echo "<pre>";
        // print_r($_POST); 
        // echo "</pre>";  
        $this->view('signup_org.view', ['errors' => $errors]);
    }
}
