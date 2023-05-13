
<?php
class Changepic extends Controller
{
    function index()
    {
        $user = new User();

        if (!Auth::logged_in()) {
            $this->redirect('home');
        }

        if (Auth::getusertype() == 'reg_user') {
            $data = $user->where('id', Auth::getid());

            $data = $data[0];

            $image = new Image();

            if ($_POST > 0) {
                if ($image->pic_validate()) {
                    $id = Auth::getid();
                    $filename = $image->pic_validate();
                    $arr['profile_pic'] = $filename;
                    $user->update($id, $arr);
                    $this->redirect('profile');
                }
            }
        } elseif (Auth::getusertype() == 'organization') {
            $user = new Organization();
            $data = $user->where('id', Auth::getid());

            $data = $data[0];
            $image = new Image();
            if ($_POST > 0) {
                if ($image->pic_validate()) {
                    $id = Auth::getid();
                    $filename = $image->pic_validate();
                    $arr['profile_pic'] = $filename;
                    $user->update($id, $arr);
                    $this->redirect('edit_org_profile');
                }
            }
        } elseif (Auth::getusertype() == 'eventmanager') {
            $user = new EventManager();
            $data = $user->where('email', Auth::getemail());

            $data = $data[0];
            $image = new Image();
            if ($_POST > 0) {
                if ($image->pic_validate()) {
                    $email= Auth::getemail();
                    $filename = $image->pic_validate();
                    // print_r($filename);
                    $arr['profile_pic'] = $filename;
                    $data=$user->update_U_email($email, $arr);
                    // print_r($data);
                    $this->redirect('profile_eventmanager');
                }
            }
        } elseif (Auth::getusertype() == 'area_coordinator') {
            $user = new Areacoordinator();
            $data = $user->where('email', Auth::getemail());

            $data = $user->where('id', Auth::getid());

            $data = $data[0];
            $image = new Image();
            if ($_POST > 0) {
                if ($image->pic_validate()) {
                    $id = Auth::getid();
                    $filename = $image->pic_validate();
                    $arr['profile_pic'] = $filename;
                    $user->update($id, $arr);
                    $this->redirect('edit_area_profile');
                }
            }
        }

        $this->view('changepic', ['rows' => $data]);
    }
}
