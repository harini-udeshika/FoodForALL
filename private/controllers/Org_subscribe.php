<?php
class Org_subscribe extends Controller
{
    public function index() 
    {
        if (Auth::getusertype() == 'organization') {
            
            $this->view('org_subscribe.view');
        } else {
            $this->redirect('home');
        }
    }
}
?>