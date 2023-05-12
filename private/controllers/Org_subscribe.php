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

            $sub_data = $this->isSubscribed();
            $this->view('org_subscribe.view',['sub_data'=>$sub_data]);
          
        } else {
            $this->redirect('home');
        }
       
    }

    public function isSubscribed()
    {
        $org = new Subscribe();
        $query = "SELECT * FROM subscription Where org_gov_reg_no= :id 
        && status = 1 ORDER BY date DESC";

        $arr_2 = ['id' => Auth::gov_reg_no()];
        $data = $org->query($query,$arr_2);

        if ($data) {
            $paid_date = new DateTime($data[0]->date);
            $today = new DateTime(); 
            $interval = $paid_date->diff($today);
            $days = $interval->days;

            if ($days > 30) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
        // die;
    }
}
?> 