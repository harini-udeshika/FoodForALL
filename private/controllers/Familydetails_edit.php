<?php
class Familydetails_edit extends Controller{
    function index(){
        // $user1=new AreaCoordinator();
        $user =new Family();
        $id=$_GET['updateid'];
        if(!Auth::logged_in()){
            $this->redirect('home');
        }
        if($_POST){

                $arr['FullName']=$_POST['FullName'];
                $arr['Iname']=$_POST['NameWithInitial'];
                $arr['nic']=$_POST['FamilyID'];
                $arr['profession']=$_POST['profession'];
                $arr['netsalary']=$_POST['salary'];
                $arr['contact1']=$_POST['Contact1'];
                $arr['contact2']=$_POST['Contact2'];
                $arr['address']=$_POST['address'];
                $arr['cholesterol_patients']=$_POST['Cholesterol_patients'];
                $arr['healthy_adults']=$_POST['Healthy_adults'];
                $arr['diabetes_patients']=$_POST['Diabetes_patients'];
                $arr['malnutritioned_children']=$_POST['Malnutrition_children'];
                $arr['healthy_children']=$_POST['Healthy_children'];
                $arr['area_coodinator_email']=$_POST['email'];
                $user->update($id,$arr);
            $this->redirect('familytable');   
        }


      
        // $data1 = $user1->where('email',Auth::getemail());    
        // // print_r ($data);
        // // echo ($data[0]->id);
        // $data1 = $data1[0];
        // $this->view('familydetails_edit',['rows1'=>$data1]);

        $data = $user->where('id',$id);    
        // print_r ($data);
        // echo ($data[0]->id);
        $data = $data[0];
        $this->view('familydetails_edit',['rows'=>$data]);
       
        
        

    }
}
