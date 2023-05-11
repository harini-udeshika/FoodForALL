<?php $this->view('includes/header')?>
<?php $this->view('includes/navbar')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/homepage_area_blocks.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/homepage_new.css">
<link rel="stylesheet" href="<?=ROOT?>/assets/homepage_area.css">
<?php $this->view('includes/submenu');
$name = array_column($rows1, 'name')[0];
$email = array_column($rows1, 'email')[0];
$district = array_column($rows1, 'district')[0];
$area = array_column($rows1, 'area')[0];
?>

<div class="container-main manin1">
        <div class="description">
            <div class="content">
                <p class="main">Good <?=Auth::time()?></p>
                <p class="sub1">Welcome Area Coordinator<br><?php echo $name; ?><br> Back !!</p>
                <div>
                </div>
            </div>
        </div>
        <div class="image_section">
            <img src="images/image.png" alt="" class="main-image">
        </div>
</div>

<div class="areatitals">
    
    <h1>MY AREA</h1>
   
</div>

<div class="card-container">
		<div class="card">
			<img src="images/family.png" alt="Card 1 Image">
			<?php foreach($rows1 as $row1):?>
            <p class="sub2"><?=$row1->fnum?></p>
            <?php endforeach;?>
			<h2 class="sub5">Number of<br> individual Families</h2> 
			<div class="card-info">Additional information for Card 1.</div>
		</div>
		<div class="card">
			<img src="images/children.png" alt="Card 2 Image">
			<?php foreach($rows3 as $row3):?>
            <p class="sub2"><?=$row3->cnum?></p>
            <?php endforeach;?>
			<h2 class="sub5">Number of Children's <br> Homes</h2>
			<div class="card-info">Additional information for Card 2.</div>
		</div>
		<div class="card">
			<img src="images/elders.png" alt="Card 3 Image">
			<?php foreach($rows2 as $row2):?>
            <p class="sub2"><?=$row2->enum?></p>
            <?php endforeach;?>
			<h2 class="sub5">Number of Elders' homes</h2>
			<div class="card-info">Additional information for Card 3.</div>
		</div>
		
	</div>

<div>
    <div id="section1">
        <div class="areatitals">
            <h1>MAP</h1>
        </div>
        <iframe width="100%"height="500" src="https://maps.google.com/maps?q=<?=Auth::area_area()?>&output=embed" ></iframe>
    </div>
    <div id="section2">
        <div class="areatitals">
            <h1>MY AREA DETAILS</h1>
        </div>
        <ul class="my-list">
           
            <li class=des_list><i class="fa-solid fa-signature"></i><h3>Area Coordinator's- <Name-span class="btn-green"><?php echo $name; ?></Name-span></h3></li>
            <li><i class="fa-solid fa-paper-plane"></i><h3>Email Address-<Name-span class="btn-green"><?php echo $email; ?></Name-span></h3></li>
            <li><i class="fa-solid fa-building-circle-arrow-right"></i><h3>Name of the District-<Name-span class="btn-green"><?php echo $district; ?></Name-span></h3></li>
            <li><i class="fa-solid fa-chart-area"></i><h3>Name of the Area-<Name-span class="btn-green"><?php echo $area; ?></Name-span></h3></li>
        </ul>
        <div class="gallery">
        <img src="images/areacoordinator.png" alt="Card 1 Image">
        <!-- <img src="image2.jpg" alt="Image 2">
        <img src="image3.jpg" alt="Image 3"> -->
        </div>
        
    </div>
</div>


<div class="containor">
    <h1>Frequently asked questions?</h1>
    <div class="tab">
        <input type="radio" name="acc" id="acc1">
        <label for="acc1">
            <h2>01</h2>
            <h3>How do we apply?</h3>
        </label>
        <div class="content1">
            <p>Yes. We're always interested in improving this generator 
                and one of the best ways to do that is to add new and interesting 
                paragraphs to the generator. If you'd
                like to contribute some random paragraphs, please contact us.</p>
                <p>Yes. We're always interested in improving this generator 
                and one of the best ways to do that is to add new and interesting 
                paragraphs to the generator. If you'd
                like to contribute some random paragraphs, please contact us.</p>
        </div>
    </div>
    <div class="tab">
        <input type="radio" name="acc" id="acc2">
        <label for="acc2">
            <h2>02</h2>
            <h3>How do we apply?</h3>
        </label>
        <div class="content1">
            <p>Yes. We're always interested in improving this generator 
                and one of the best ways to do that is to add new and interesting 
                paragraphs to the generator. If you'd
                like to contribute some random paragraphs, please contact us.</p>
        </div>
    </div>
    <div class="tab">
        <input type="radio" name="acc" id="acc3">
        <label for="acc3">
            <h2>03</h2>
            <h3>How do we apply?</h3>
        </label>
        <div class="content1">
            <p>Yes. We're always interested in improving this generator 
                and one of the best ways to do that is to add new and interesting 
                paragraphs to the generator. If you'd
                like to contribute some random paragraphs, please contact us.</p>
        </div>
    </div>
</div>



    
    <?php $this->view('includes/footer')?>  
    

