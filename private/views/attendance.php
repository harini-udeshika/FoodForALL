<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?=ROOT?>/assets/attendance2.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

  
    <div class="popup center">
        <div class="icon">
            <i class="fa fa-check"></i>
        </div>
        
        <div class="description">
            Successfully make the attendance 
        </div>
        <div class="dismiss-btn">
            <button id="dismiss-popup-btn"  onclick="document.getElementById('attendence-form').submit();">
                Dissmiss
            </button>
        </div>
    </div>

<?php if(!isset($error)){?>
    <div class="popup center">
        <div class="icon">
            <i class="fa fa-times"></i>
        </div>
        
        <div class="description">
            An error has occurred: <?php echo $error; ?>
        </div>
        <div class="dismiss-btn">
            <button id="dismiss-popup-btn"  onclick="document.getElementById('attendence-form').submit();">
                Dismiss
            </button>
        </div>
    </div>
<?php }?>

    <div class="attendenceTitle">Attendance</div>
    <div class="container">
      <form method="post" id="attendence-form" onsubmit="return false;">
      <div class="new_container">
        <div class="new_container2">
            <div class="input-container">
              <label for="id">NIC</label>
            </div>
            <div class="input-row">
              <div class="input-container">
              <?php if ($id) { ?>
                <input type="text" placeholder="Enter NIC" name="id" value="<?php echo $id; ?>" readonly>
              <?php } else { ?>
                <input type="text" placeholder="Enter NIC"  name="id" required>
              <?php } ?>

              </div>
            </div>
        </div>
        <div class="new_container2">  
          <div class="input-container">
            <label for="eid">Event ID</label>
          </div>

          <div class="input-row">
            <div class="input-container">
              <input type="text" placeholder="Enter Event ID" value="<?=$eid?>" name="eventid" readonly>
            </div>
          </div>
        </div>

        <div class="new_container2">  
          <div class="input-container">
              <label for="ename">Event Name</label>
          </div>

          <div class="input-row">
            <div class="input-container">
              <input type="text" placeholder="Enter Event Name" value="<?php echo $event[0]->name?>" readonly>
            </div>
          </div>
        </div>
      </div>

      <div class="button-row">
        <div class="button-container">
          
          <button onclick="history.back()">Back</button>
          
          <button name="mark" class="mark-btn" id="open-popup-btn" >Mark</button>
          </form>
        </div>
      </div>

      <h2>OR</h2>

      <div class="button-row">
        <div style="margin: auto;width:auto">
          <a href="qrscan">
          <button name="mark" class="mark-btn" id="open-popup-btn" style="width: 100px;">Scan QR code here</button></a>
        </div>
      </div>

    </div>      
      
</body>

<script>
    document.getElementById("open-popup-btn").addEventListener("click",function(){
        document.getElementsByClassName("popup")[0].classList.add("active");
    })
    

    document.getElementById("open-popup-btn").addEventListener("click",function(){
        document.getElementsById("attendence-form").submit();
    })

    

    document.getElementById("dismiss-popup-btn").addEventListener("click",function(){
        document.getElementsByClassName("popup")[0].classList.remove("active");
    })
</script>
<?php $this->view('includes/footer') ?>
