<?php
class Org_subscribe extends Controller
{
    public function index() 
    {
        
        if (Auth::getusertype() == 'organization') {
            $org=new Organization();
            $id=Auth::getgov_reg_no();
            
            $sub=new Subscribe();
            if(isset($_GET['pay'])=='true') {
                $arr['org_gov_reg_no']=strval($id);
                $arr['amount']=1000; //change this to $financial_admin['subscription_amount']
               
                $query="INSERT INTO subscription (org_gov_reg_no,amount) VALUES (:id,:amount)";
                $sub->query($query,['id'=>$id,'amount'=>$arr['amount']]);

                $query = "SELECT * from subscription WHERE org_gov_reg_no= :id ORDER by date DESC LIMIT 1";
                $data=$sub->query($query,['id'=>$id]);
                $arr['id']=$data[0]->id;
                subscription_checkout($arr);
            }
            $this->view('org_subscribe.view');
          
        } else {
            $this->redirect('home');
        }
       
    }
}
?> 