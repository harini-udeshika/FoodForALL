<?php

class Org_admin_events extends Controller
{
    function index()
    {
        $event = new Event();

        $org_reg = $_SESSION['USER']->gov_reg_no;
        $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved=0";
        $arr = ['id' => $org_reg];
        $pending = $event->query($query, $arr);
        // echo "<pre>";
        // echo "pending";
        // print_r($pending);

        // ---------------------------------------------------------------------------------------
        // $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0 && date>=CURRENT_DATE";
        // $arr = ['id'=>$org_reg];
        // $ongoing = $event->query($query,$arr);
        // ---------------------------------------------------------------------------------------------------
        $org = new Organization();
        $ongoing = $org->selectOngoing($org_reg);
        // echo "<pre>";
        // print_r($ongoing);
        // die;

        $query = "SELECT * FROM event WHERE org_gov_reg_no= :id && approved!=0 && date<CURRENT_DATE";
        $arr = ['id' => $org_reg];
        $past = $event->query($query, $arr);
        // echo "<br>past";
        // print_r($past);
        // die;
        $this->view('org.admin.events', ['pending' => $pending, 'ongoin' => $ongoing, 'past' => $past]);
    }

    public function delete_pending()
    {
        $id = $_GET['id'];
        // echo $id;
        // die;
        $item_del = new Event();
        $item_del->delete_event($id);

        $this->redirect('org_admin_events');
    }




    public function search_events()
    {
        // echo "hello";
        // die;
        if (isset($_POST['name'])) {
            $event = new Event();
            $org_reg = $_SESSION['USER']->gov_reg_no;

            $query = "SELECT * FROM event WHERE name LIKE '%" . $_POST['name'] . "%' AND org_gov_reg_no = $org_reg ";
            $event_list = $event->query($query);
            if ($_POST['name']) {
                if ($event_list) {
                    foreach ($event_list as $data) {
                    ?>
                        <!-- Search Result section -->
                        <div class="blank col-lg-3"></div>
                        <a href="<?= ROOT ?>/event_org?id=<?= $data->event_id ?>" style="text-decoration: none;">
                            <div id="" class="result_row col-lg-3 grid-10 p-4 card-simple height-50px" style="margin: 0px;">
                                <div class="col-1" id="event_thumbnail">
                                    <img width="100%" height="42px" src="<?= ROOT ?>/<?php echo $data->thumbnail_pic ?>" alt="" srcset="">
                                </div>
                                <div class="col-9 p-left-10 txt-gray txt-11" id="event_name"><?php echo $data->name ?><br>
                                    <div class="txt-08" style="color: black;"><?php echo $data->date ?>&nbsp | &nbsp<span style="color:red;">
                                            <?php
                                            if ($data->date < date("Y-m-d")) {
                                                echo "Completed";
                                            } else {
                                                if ($data->approved == '0') {
                                                    echo "Pending";
                                                } else {
                                                    echo "Upcoming";
                                                }
                                            }
                                            ?>
                                        </span></div>
                                </div>
                            </div>
                        </a>
                        <div class="blank col-lg-3"></div>
                        <!-- End of Search Result section -->
                    <?php
                    }
                } else {
                    ?>
                    <!-- Search Result section -->
                    <div class="blank col-lg-1"></div>
                    <div id="result_row" class="col-lg-10 row-flex jf-center card-simple height-50px" style="margin: 0px;">
                        hello
                    </div>
                    <div class="blank col-lg-1"></div>
                    <!-- End of Search Result section -->
            <?php
                }
            } else echo "not found";
        }
    }
}
