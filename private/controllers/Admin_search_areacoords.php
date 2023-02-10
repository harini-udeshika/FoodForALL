<?php
class Admin_search_areacoords extends Controller
{
    function index()
    {
        // $user = new User();
        // $data = $user->findAll();
        $user = new Admin_search_areacoords();
        $results = array();

        if (Auth::isuser('admin')) {
            $admin_model = new Admins();
            // $defaults=array();
            $results = $admin_model->select_areacoords_bydate();
            $results['result_type'] = 'recent';

            $user->view('admin.search.areacoords', ['results' => $results]);
        } else {
            $this->redirect('login');
        }
    }

    public function search_user()
    {
        $new_user = new Admin_search_areacoords();
        $results = array();
        
        if (Auth::isuser('admin')) {
            $admin_model = new Admins();
            
            if (isset($_POST['search_term'])) {
                if ($_POST['search_term'] != '') {
                    $results = $admin_model->search_in_areacoords($_POST['search_term']);
                    
                    if ($results == false) {
                        $results = array();
                        $results['result_type'] = 'search_result';
                        
                        $new_user->view('admin.search.areacoords', ['results' => $results]);
                    } else {
                        $results['result_type'] = 'search_result';
                        $new_user->view('admin.search.areacoords', ['results' => $results]);
                    }
                } else {
                    $new_user->view('admin.search.areacoords');
                }
            } else {
                $new_user->view('admin.search.areacoords');
            }
        } else {
            $this->redirect('login');
        }
    }

    public function delete($id = null)
    {

        if (Auth::isuser('admin')) {
            $admin_model = new Admins();
            $admin_model->change_table('area_coodinator');

            if (isset($_POST)) {
                if (count($_POST) > 0) {
                    $admin_model->delete($id);
                    $this->redirect('Admin_search_areacoords');
                }
            }

            $row = $admin_model->where('id', $id);

            if ($row != false) {
                $this->view('admin.delete.areacoord', [
                    'row' => $row[0],
                ]);
            }
            else{
                $this->view('admin.delete.areacoord');
            }
        } else {
            $this->redirect('login');
        }
    }
}
