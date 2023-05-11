<?php
class Familydetails extends Controller{
    function index()
    {
        //code..
        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'area_coordinator')) {
            $this->redirect('home');
        }
        $errors=array();
        
        if(count($_POST)>0){
            $family=new Family();
            if($family->validate($_POST)){
                $arr['FullName']=$_POST['FullName'];
                $arr['Iname']=$_POST['NameWithInitial'];
                $arr['nic']=$_POST['nic'];
                $arr['familymembers']=$_POST['fnum'];
                $arr['profession']=$_POST['profession'];
                $arr['netsalary']=$_POST['salary'];
                $arr['contact1']=$_POST['Contact1'];
                $arr['contact2']=$_POST['Contact2'];
                $arr['address']=$_POST['address'];
                $arr['cholesterol_patients']=$_POST['Cholesterol_patients'];
                $arr['healthy_adults']=$_POST['Healthy_adults'];
                $arr['diabetes_patients']=$_POST['Diabetes_patients'];
                $arr['both_patients']=$_POST['Both_patients'];
                $arr['less_one_children']=$_POST['Less_one_children'];
                $arr['less_five_children']=$_POST['Less_five_children'];
                $arr['higher_five_children']=$_POST['Higher_five_children'];
                $arr['familymembers']=$_POST['Familymembers'];
                $arr['area_coodinator_email']=$_POST['email'];
                
                $family->insert($arr);
                $this->redirect('familytable');
            }else{
            //error
            $errors=$family->errors;
            }
        }
        $this->view('familydetails',[
            'errors'=>$errors,
        ]);
    }

    
}
