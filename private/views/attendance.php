<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?=ROOT?>/assets/attendance2.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>
<style>
        .body{
            background: #ddd;
            font-family: "Inter";
        }
        .center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .popup{
            width: 40%;
            height: 370px;
            padding: 30px 20px;
            background:rgba(228, 239, 255, 1);
            border-radius: 10px;
            z-index: 2;
            text-align: center;
            opacity: 0;
            top: -200%;
            transform: translate(-50%,-50%) scale(0.5);
            transition: opacity 300ms ease-in-out,
                         top 100ms ease-in-out,
                         transform 100ms ease-in-out;
        }

        .popup.active {
            opacity: 1;
            top: 425px;
            transform: translate(-50%,-50%) scale(1);
            transition: transform 300ms cubic-bezier(0.18,0.89,0.43,1.19);
        }

        .popup .icon{
            margin:5px 0px;
            width: 50px;
            height: 50px;
            border: 2px solid #98c03c;
            text-align:center;
            display: inline-block;
            border-radius: 50%;
            line-height: 60px;
        }

        .popup .icon i.fa{
            font-size: 30px;
            color: #98c03c;
        }

        .popup .title{
            margin: 5px 0px;
            font-size: 30px;
            font-weight: 600;
        }

        .popup .description{
            color: #222;
            font-size: 15px;
            padding: 5px;
        }

        .popup .dismiss-btn{
            margin-top: 15px;
        }

        .popup .dismiss-btn button{
            padding: 10px 20px;
            background:#98c03c;
            color: #f5f5f5;
            border: 2px solid #98c03c;
            font-size: 16px;
            font-weight: 600;
            outline: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 300ms ease-in-out;
        }

        .popup .dismiss-btn button:hover{
            color: #98c03c;
            background: #f5f5f5;

        }

        .popup > div{
            position: relative;
            top: 10px;
            opacity: 0;
        }

        .popup.active > div{
            top: 100px;
            opacity:1;
        }

        .popup.active .icon{
            transition: all 300ms ease-in-out 250ms;
        }

        .popup.active .title{
            transition: all 300ms ease-in-out 300ms;
        }

        .popup.active .description{
            transition: all 300ms ease-in-out 350ms;
        }

        .popup.active .dismiss-btn{
            transition: all 300ms ease-in-out 400ms;
        }

        .container.active2{
           opacity: 1;
        }
    </style>
</head>
<body>
  
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
</html>
