<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/events.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>
<?php
$districts = array(
    'Ampara',
    'Anuradhapura',
    'Badulla',
    'Batticaloa',
    'Colombo',
    'Galle',
    'Gampaha',
    'Hambantota',
    'Jaffna',
    'Kalutara',
    'Kandy',
    'Kegalle',
    'Kilinochchi',
    'Kurunegala',
    'Mannar',
    'Matale', 
    'Matara',
    'Monaragala',
    'Mullaitivu',
    'Nuwara Eliya',
    'Polonnaruwa',
    'Puttalam',
    'Ratnapura',
    'Trincomalee',
    'Vavuniya',
);?>

<div class="heading">Upcoming Events</div>
    <div class="search">
        <form action="">
             <input type="text" name="find" placeholder="Search event by name " class="search-bar">
         <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>


        <div class="filter">
            <p>Filter by</p> 
            <form action="">

            <label for="date" >Date</label>
            <input type="date" name="date" value="<?=isset($_GET['date']) ? $_GET['date'] : ''?>">
            <label for="district">District</label>
            <select name="district" id="district" >
                <option value="default" ><?=isset($_GET['district']) ? $_GET['district'] : 'Select'?></option>
                <?php $i = 0;?>
        <?php foreach ($districts as $dist): ?>
            <option value="<?=$districts[$i]?>"><?=$districts[$i]?></option>
            <?php $i++;?>
        <?php endforeach;?>
            </select>
            <button class="search-btn">Search</button>
            </form>
        </div>
    </div>
    <div class="event-container">
        <div class="event-row">


        <?php $i = 0;?>
        <?php if ($rows): ?>

            <?php
//print_r($rows);?>
        <?php foreach ($rows as $value): ?>

            <?php if ($i % 3 == 0 && $i != 0): ?>
                </div>
                <div class="event-row">


            <?php endif?>
            <?php
$total_donated = 0;
if ($rows[$i]->total_donated) {
    $total_donated = $rows[$i]->total_donated;
}
$total_amount = $rows[$i]->total_amount;
if ($total_amount) {
    $donorp = round(($total_donated / $total_amount) * 100, 2);
}
$tot_volunteers = $rows[$i]->no_of_volunteers;
if ($tot_volunteers) {
    $volunteers = 0;

    if ($rows[$i]->volunteers) {
        $volunteers = $rows[$i]->volunteers;
    }
    $volunteerp = round(($volunteers / $tot_volunteers) * 100, 2);
}

?>

        <a href="<?=ROOT?>/eventpage?id=<?=$rows[$i]->event_id?>">
            <div class="event">

                <div class="event-top">
                    <p><?php echo $rows[$i]->name ?></p>
                    <div class="event-image">
                        <img src="<?=$rows[$i]->thumbnail_pic?>">
                    </div>
                    <p class="date"><?php echo $rows[$i]->date ?></p>
                  
                    <!-- //<i class="fa-solid fa-star fa-sm"> -->
                </div>

                <div class="event-details">
                    <div class="donations">
                        <p>Donations</p>
                        <p><img src="./images/Icons/ArrowLog.png"><?=$rows[$i]->total_amount?> LKR</p>
                    </div>

                    <div class="progress">
                        <div class="progress-bar">
                        <div style="width:<?=$donorp?>%"></div>
                        </div>
                        <span><?=$donorp?>%</span>
                    </div>
                    <div class="volunteers">
                        <p>Volunteers </p>
                        <p><img src="./images/Icons/ArrowLog.png"><?=$rows[$i]->no_of_volunteers?> people</p>
                    </div>

                    <div class="progress">
                        <div class="progress-bar">
                        <div style="width:<?=$volunteerp?>%"></div>
                        </div>
                        <span><?=$volunteerp?>%</span>
                    </div>
                </div>

                <div class="event-button">
               <button class="b1"> <a href="<?=ROOT?>/eventpage?id=<?=$rows[$i]->event_id?>/#donate">Donate</a></button>
               <button class="b2"> <a href="<?=ROOT?>/eventpage?id=<?=$rows[$i]->event_id?>/#volunteer">Volunteer</a></button>
                </div>

            </div>
        </a>
            <?php $i++;
// echo ($i); ?>

        <?php endforeach;?>
        <?php endif?>
        </div>


    </div>
<?php $this->view('includes/footer')?>