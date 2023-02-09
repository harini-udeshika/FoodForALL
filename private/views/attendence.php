<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/attendence.css">
<?php $this->view('includes/navbar')?>
<?php if(Auth::logged_in()){
    $this->view('includes/submenu');
}
?>

<div class="attendentB">
        <p class="attendenceTitle">Attendence</p>
        <div class="attendencecard">
            <div class="round">
                <form>
                    <input type="text" placeholder="Enter Code" class="attendencesearch">
             
                    <p class="or">or</p>
                    <div class="qrbutton">
                        <button class="scanqr">Scan QR</button>
                    </div>

                    <div>
                        <input type="text" placeholder="Name" class="subsearch">
                        <input type="email" placeholder="Email" class="subsearch">
                    </div>

                    <div class="lastbutton">
                        <button id="back">Back</button>
                        <button id="conform">Conform</button>
                    </div>

                 
                </form>
                
                
            </div>
         
            
        </div>
       
    </div>

    <?php $this->view('includes/footer')?>