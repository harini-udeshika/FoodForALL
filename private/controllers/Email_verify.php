<?php
class Email_verify extends Controller
{
    public function index()
    {
        //echo(Auth::getusertype());
        if (Auth::getusertype() == 'organization'){
            $user = new Organization();
        }
        else{
            $user = new User();
        }
        $verify = new Verify();
        $mail = new Mail();
        $data = $user->where('id', Auth::getid());
        print_r($data);
        if (($_SERVER['REQUEST_METHOD'] == 'GET') && (!Auth::check_verified())) {

            $arr = $user->code();
            $verify->insert($arr);
            $receipient = $arr['email'];
            $subject = "Account Verification FoodForALL";
            $message = "Hello User!\r\nPlease verify your account.\r\n". $arr['code'];

            $mail->send_mail($receipient, $subject, $message);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Auth::check_verified()) {

                $email = $_SESSION['USER']->email;
                $code = $_POST['code'];
                $data = $verify->verify($code, $email);
                if (is_array($data)) {
                    $data = $data[0];
                    $time = time();
                    if ($data->expires > $time) {
                        print_r($data);
                        $id = Auth::getId();
                        $arr['email_verified'] = $email;
                        $user->update($id, $arr);
                        if (Auth::getusertype() == 'organization'){
                            $this->redirect('home_org');
                        }
                        else{
                            $this->redirect('profile');
                        }
                        die;

                    } else {
                        echo "Code expired!";
                    }
                } else {
                    echo "Wrong code!";
                }

            } else {
                if (Auth::getusertype() == 'organization'){
                    $this->redirect('home_org');
                }else{
                    $this->redirect('profile');
                }
                
            }
        }
        // $this->view('verify');
        $data = $user->where('id', Auth::getid());
        $data = $data[0];

        $this->view('email_verify', ['rows' => $data]);
    }
}
