<?php
class Familydetails_edit extends Controller{
    function index(){
        $errors=array();
        $family =new Family();
        $id=$_GET['updateid'];
        if (!Auth::logged_in()) {
            $this->redirect('home');
        } elseif (Auth::logged_in() && !(Auth::getusertype() == 'area_coordinator')) {
            $this->redirect('home');
        }
        
        if(count($_POST)>0){
            if($family->validate($_POST)){
                    $arr['FullName']=$_POST['FullName'];
                    $arr['Iname']=$_POST['NameWithInitial'];
                    $arr['nic']=$_POST['familyid'];
                    $arr['familymembers']=$_POST['Familymembers'];
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
                    $arr['higher_five_children']=$_POST['Higher_five_children'];;
                    $arr['area_coodinator_email']=$_POST['email'];
                    $family->update($id,$arr);
                    $this->redirect('familytable');  
            }else{
                //error
                $errors=$family->errors;
            }
        }
        $data = $family->where('id',$id);    
        // print_r ($data);
        // $errors=array();
        // echo ($data[0]->id);
        $data = $data[0];
        $this->view('familydetails_edit',['rows'=>$data,'errors'=>$errors]);
    }

}
        // $data1 = $user1->where('email',Auth::getemail());    
        // // print_r ($data);
      
        // // echo ($data[0]->id);
        // $data1 = $data1[0];
        // $this->view('familydetails_edit',['rows1'=>$data1]);

