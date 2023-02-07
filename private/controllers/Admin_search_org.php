<?php
class Admin_search_org extends Controller
{
    function index()
    {
        // $user = new User();
        // $data = $user->findAll();
        $user = new Admin_search_org();
        $results = array();

        if (Auth::isuser('admin')) {
            $admin_model = new Admins();
            // $defaults=array();
            $defaults = $admin_model->select_orgs_bydate();
            $user->view('admin.search.org', ['defaults' => $defaults]);
        } else {
            $this->redirect('login');
        }
    }

    public function search_org()
    {
        $new_user = new Admin_search_org();
        $results = array();

        if (Auth::isuser('admin')) {
            $admin_model = new Admins();

            if (isset($_POST['search_term'])) {
                if ($_POST['search_term'] != '') {
                    $results = $admin_model->search_in_org($_POST['search_term']);

                    if ($results == false) {
                        $results = array();
                        $new_user->view('admin.search.org', ['results' => $results]);
                    } else {
                        $new_user->view('admin.search.org', ['results' => $results]);
                    }
                } else {
                    $new_user->view('admin.search.org');
                }
            } else {
                $new_user->view('admin.search.org');
            }
        } else {
            $this->redirect('login');
        }
    }
}
