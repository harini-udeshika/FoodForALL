<?php
class Search_org extends Controller
{
    public function index()
    {
        $org = new Organization();
        $data = $org->findAll();
        //print_r ($data);
        if(isset($_GET['find'])){
            
            $find='%'.$_GET['find'].'%';

            $search_data=$org->search($find,'name');
            $this->view('search_org',['rows' => $search_data]);
        }
        else{
             $this->view('search_org', ['rows' => $data]); 
        }
       
    }

}
