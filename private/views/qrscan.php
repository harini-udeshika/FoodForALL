<?php $this->view('includes/header');?>
<?php $this->view('includes/navbar');?>
<?php $this->view('includes/submenu');?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/qr.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<link rel="stylesheet" href="<?=ROOT?>/css/qrscan.css">


        <div class="container" style="margin:auto;padding-top:50px">
        <div style="margin:auto"><h2>Mark the attendence</h2></div>
            
            <div class="row" >
                <div class="col-md-6">
                    <video id="preview" width="100%" ></video>
                </div>
                <div class="col-md-6" style="padding-top: 50px;">
                    <label>SCAN QR CODE</label>
                    <span class="qrinput">
                    <input type="text" name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control" readonly>
                    </span>
                    
                    <button class="btn-purple"onclick="openURL()">Open</button>

                </div>
            </div>
        </div>

        <script>
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
           });
           function openURL() {
         var urlInput = document.getElementById('text');
        var url = urlInput.value;

      // Open the URL in a new window
      window.open(url, '_blank');
    }

        </script>
<?php $this->view('includes/footer')?>