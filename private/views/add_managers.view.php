<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/akila_css/styles_org.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?> 

<div style="font-family:'Inter'; text-align:center; font-size: 50px; font-weight: bold; color: #7681BF;">
        <?php if(isset($_SESSION['USER'])){
                            $na = $_SESSION['USER']->name;
                            echo $na;
                        }              
        ?> : Manager Information
</div>
<center><div style="width: 1500px; height:auto;">
    <div class="center-box-border" id="managers-list" style="float:right;">
        <h1 style="text-align: center;">Event Managers</h1>
        <hr size="1px" noshade style="width: 70%; opacity: 0.4; text-align: center;
                height: 2px;
                background: black;" >
        <?php 
            // echo "<pre>";
            // print_r($allmanagers);
            // die;
            $org = $_SESSION['USER']; 
            $x = 0;
            if($allmanagers){
                $totManagers = sizeof($allmanagers);

                    echo "<table class='data-table'>
                    <thead>
                    <tr id='topics'>
                    <th>Name</th>
                    <th>Email</th>
                    <th>NIC</th>
                    <th>Events</th>
                    <th></th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>";
                    // output data of each row

                    while($totManagers > 0) {
                        // $_SESSION['nic'] = $row['nic'];
                        // Add_managers/delete_manager?id=".$allmanagers[$x]->email."
                        echo "<tr>
                                <td>".$allmanagers[$x]->full_name."</td>
                                <td>".$allmanagers[$x]->email."</td>
                                <td>".$allmanagers[$x]->nic.
        
                        "</td><td>0</td>
                        <td id='button-col'>
                        <a id='delete-edit-btn-2' href=''><i class='fa-regular fa-trash-can'></i></a></td>
        
                        <td id='button-col'>
                        <a id='delete-edit-btn-2' href=''><i class='fa-regular fa-pen-to-square'></i></a></td>
                        </tr>";
                        $x=$x+1;
                        $totManagers=$totManagers-1;
                    }
                    echo "</tbody></table>";
                } 
                else {
                    echo "
                    <center><h2 style='font-family: 'inter';'>No managers added</h2></center>";
                }
        ?>
        <br><br><br><br><br>
    </div>

    <div class="center-box" id="managers-form" style="float:left;
        background-image: url('./images/bg1.png');
        background-repeat: no-repeat;
        background-position: right bottom;
	    background-size: cover;
        ">
        <h1 style="font-family: inter;">Add Managers</h1>
        
        <form method="POST" id="input-form-em" class="eminput-form">
            <div class="eminput-control">
                <label for="name">Full Name:</label><br>&nbsp;&nbsp;
                <input type="text" id="name-em" name="name" placeholder="Full Name"><br>
                <div class="client-error"></div>
            </div>
            
            <div class="eminput-control">
                <label for="Email">Email:</label><br>&nbsp;&nbsp;
                <input type="text" id="email-em" name="email" placeholder="Email" ><br>
                <div class="client-error"></div>
            </div>

            
            <div class="eminput-control">
                <label for="NIC"></label>NIC:<br>&nbsp;&nbsp;
                <input type="text" id="nic-em" name="nic" placeholder="NIC" ><br>
                <div class="client-error"></div>
            </div>

            <div class="eminput-control">
                <label for="name">Set Password:</label><br>&nbsp;&nbsp;
                <input type="text" id="pw-em" name="password" placeholder="Set Password" ><br>
                <div class="client-error"></div>
            </div>

            <button type="submit" class="submit-btn" id="form-btn">ADD</button>
        </form>
    </div>
    </div></center>
    <br><br><br>
    
    <script src="<?= ROOT ?>/assets/script/em_form_check.js"></script>

<?php $this->view('includes/footer')?>