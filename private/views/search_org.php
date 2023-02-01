<?php $this->view('includes/header')?>
<link rel="stylesheet" href="<?=ROOT?>/assets/events.css">
<?php $this->view('includes/navbar')?>
<?php $this->view('includes/submenu')?>

<h1>Organizations</h1>
<div class="search">
        <form action="">
             <input type="text" name="find" placeholder="Search event by name " class="search-bar">
         <button><i class="fa-solid fa-magnifying-glass fa-l"></i></button>
        </form>


        <!-- <div class="filter">
            <p>Filter by</p>
            <form action="">

            <label for="date" >Date</label>
            <input type="date" name="date">
            <label for="location">Location</label>
            <select name="location" id="location">
                <option value="default">Select</option>
                <option value="Kalutara">Kalutara</option>
                <option value="Colombo">Colombo</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Kandy">Kandy</option>
                <option value="Matale">Matale</option>
                <option value="Nuwara Eliya">Nuwara Eliya</option>
                <option value="Galle">Galle</option>
                <option value="Matara">Matara</option>
                <option value="Hambantota">Hambantota</option>
                <option value="Jaffna">Jaffna</option>
                <option value="Matara">Matara</option>
                <option value="erlang">Matara</option>
                <option value="erlang">Matara</option>
            </select>
            <button class="search-btn">Search</button>
            </form>
        </div> -->
    </div>
<div class="org_container">
    <div class="headings">
        <p>Logo</p>
        <p>Organization Name</p>
        <p>Events</p>
    </div>
    <?php $i = 0;?>
        <?php if ($rows): ?>
            <div class=scroll>
        <?php foreach ($rows as $value): ?>
            <?php
            $event=new Event();
            $tot_events=$event->count('event_id','org_gov_reg_no',$rows[$i]->gov_reg_no);
            $tot_events = $tot_events[0];
            ?>
    <div class="long-card">
        <div class="img">
            <img src="" alt="image">
        </div>
        <p><?=$rows[$i]->name?></p>
        <p><?=$tot_events->count?></p>
    </div>
    

    <?php $i++;
// echo ($i); ?>

        <?php endforeach;?>
    </div>
        <?php endif?>
</div>
<script src=" navbar.js"></script>
<?php $this->view('includes/footer')?>