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
            $results = $admin_model->select_orgs_bydate();
            $results['result_type'] = 'recent';

            $user->view('admin.search.org', ['results' => $results]);
        } else {
            $this->redirect('login');
        }
    }

    public function search_user()
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
                        $results['result_type'] = 'search';

                        $new_user->view('admin.search.org', ['results' => $results]);
                    } else {
                        $results['result_type'] = 'search';
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

    public function delete($id = null)
    {

        if (Auth::isuser('admin')) {
            $admin_model = new Admins();
            $admin_model->change_table('organization');

            if (isset($_POST)) {
                if (count($_POST) > 0) {
                    $admin_model->delete_org($id);
                    $this->redirect('Admin_search_org');
                }
            }

            $row = $admin_model->where('gov_reg_no', $id);

            if ($row != false) {
                $this->view('admin.delete.org', [
                    'row' => $row[0],
                ]);
            }
            else{
                $this->view('admin.delete.org');
            }
        } else {
            $this->redirect('login');
        }
    }
}
