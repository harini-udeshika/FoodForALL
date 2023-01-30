<?php
class Charts extends Controller
{
    public function index()
    {
        $volunteer = new Volunteer();
        $data = $volunteer->where('user_id', Auth::getid());
       
       
        //$user=new User();
        $volunteer_count = $volunteer->count("user_id","user_id",Auth::getid());
        $volunteer_count=($volunteer_count[0]->count);

        if (!Auth::logged_in()) {
            $this->redirect('home');
        }

        $this->view('charts', ['rows' => $data]);
    }

}
