<?php
class Admin_events extends Controller
{
    function index()
    {
        $user = new Admin_events();

        if (Auth::isuser('admin')) {
            $user->view('admin.events');
        } else {
            echo ("You have no access right");
        }
    }
}
