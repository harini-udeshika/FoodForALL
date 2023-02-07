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
            $defaults = $admin_model->select_users_bydate();
            $user->view('admin.search.users', ['defaults' => $defaults]);
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
                        $new_user->view('admin.search.users', ['results' => $results]);
                    } else {
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
}
