<?php
class Email_forgot extends Controller
{
    public function index()
    {
        $user = new User();
        $org = new Organization();
        $mail = new Mail();
        $change_pwd = new Change_pwd();

        if (isset($_POST['email'])) {
            $email = $_POST["email"];
            $_SESSION['email'] = $email;
            // $data = $user->where('email', $email);
            // $data = $data[0];
            // $this->view('code', ['rows' => $data]);
            if ($user->where('email', $email)) {
                $data = $user->where('email', $email);
                $data = $data[0];
                $this->view('code', ['rows' => $data]);
                $arr = $user->change_pwd_code();
                $arr['email'] = $email;
                $change_pwd->insert($arr);
                $receipient = $arr['email'];
                $subject = "Account Recovery FoodForALL";
                $message = "Hello User!\r\nPlease enter the code given to change your password.\r\n" . $arr['code'];

                $mail->send_mail($receipient, $subject, $message);
            }elseif($org->where('email', $email)){
                // echo "hello";
                // die;
                $data = $org->where('email', $email);
                $data = $data[0];
                $this->view('code', ['rows' => $data]);
                $arr = $org->change_pwd_code();
                $arr['email'] = $email;
                $change_pwd->insert($arr);
                $receipient = $arr['email'];
                $subject = "Account Recovery FoodForALL";
                $message = "Hello User!\r\nPlease enter the code given to change your password.\r\n" . $arr['code'];

                $mail->send_mail($receipient, $subject, $message);
            } else {
                echo ("Email doesn't exist");
            }

        }
        // $data = $user->where('email', $email);
        // $data = $data[0];
        // $email = $data->email;
        else if (isset($_POST['code'])) {
          
            $code = $_POST['code'];
            $email = $_SESSION['email'];
            $data = $change_pwd->verify($code, $email);
            if (is_array($data)) {
                $data = $data[0];
                $time = time();
                if ($data->expires > $time) {
                    $this->redirect("change_password");
                } else {
                    echo ("Time exceeded");
                }
            }
        } else {
            $this->view('email_forgot');
        }

    }
}
