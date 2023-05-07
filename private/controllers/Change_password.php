<?php
class Change_password extends Controller
{
    public function index()
    {
        $errors = array();
        if (isset($_POST['password'])) {

            if (strlen($_POST['password']) < 8) {
                $errors['password'] = "Password must be at least 8 characters";
            }else if (!preg_match("/[a-z]/i", $_POST['password'])) {
                $errors['password'] = "Password must contain at least one letter";
            }else if (!preg_match("/[0-9]/", $_POST['password'])) {
                $errors['password'] = "Password must contain at least one digit";
            }else if ($_POST['password'] !== $_POST['password_check']) {
                $errors['password'] = "Passwords do not match";
            }
            if($errors){
                $this->view('change_password', ['errors' => $errors]);
            }
            else {
                $user = new User();
                $org = new Organization();
                $areaC = new AreaCoordinator();
                $em = new EventManager();
                $email = $_SESSION['email'];
                if ($user->where('email', $email)) {
                    $arr['password_hash'] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $data = $user->where('email', $email);
                    $user->update($data[0]->id, $arr);
                } elseif ($org->where('email', $email)) {
                    $arr['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $data = $org->where('email', $email);
                    $org->update($data[0]->email, $arr);
                } elseif ($areaC->where('email', $email)) {
                    $arr['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $data = $areaC->where('email', $email);
                    $areaC->update($data[0]->email, $arr);
                } elseif ($em->where('email', $email)) {
                    $arr['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $data = $em->where('email', $email);
                    $em->update($data[0]->email, $arr);
                }

                $this->redirect('login');
                unset($_SESSION['email']);
            }
           
        } else {
            $this->view('change_password', ['errors' => $errors]);
        }

    }
}
