
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
        }
        $this->view('changepic', ['rows' => $data]);
    }
}
