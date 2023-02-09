<?php
class Admin_search_users extends Controller
{
    function index()
    {
        // $user = new User();
        // $data = $user->findAll();
        $user = new Admin_search_users();
        $results = array();

        if (Auth::isuser('admin')) {
            $admin_model = new Admins();
            // $defaults=array();
            $results = $admin_model->select_users_bydate();
            $results['result_type'] = 'recent';

            $user->view('admin.search.users', ['results' => $results]);
        } else {
            $this->redirect('login');
        }
    }

    public function search_user()
    {
        $new_user = new Admin_search_users();
        $results = array();

        if (Auth::isuser('admin')) {
            $admin_model = new Admins();

            if (isset($_POST['search_term'])) {
                if ($_POST['search_term'] != '') {
                    $results = $admin_model->search_in_users($_POST['search_term']);

                    if ($results == false) {
                        $results = array();
                        $results['result_type'] = 'search_result';

                        $new_user->view('admin.search.users', ['results' => $results]);
                    } else {
                        $results['result_type'] = 'search_result';
                        $new_user->view('admin.search.users', ['results' => $results]);
                    }
                } else {
                    $new_user->view('admin.search.users');
                }
            } else {
                $new_user->view('admin.search.users');
            }
        } else {
            $this->redirect('login');
        }
    }

    public function delete($id = null)
    {

        if (Auth::isuser('admin')) {
            $admin_model = new Admins();
            $admin_model->change_table('user');

            if (isset($_POST)) {
                if (count($_POST) > 0) {
                    $admin_model->delete($id);
                    $this->redirect('Admin_search_users');
                }
            }

            $row = $admin_model->where('id', $id);

            if ($row != false) {
                $this->view('admin.delete.user', [
                    'row' => $row[0],
                ]);
            }
            else{
                $this->view('admin.delete.user');
            }
        } else {
            $this->redirect('login');
        }
    }
}
