<?php $this->view('includes/header') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/akila_css/styles_org.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/buttons.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/colors.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>

<div style="font-family:'Inter'; text-align:center; font-size: 50px; font-weight: bold; color: #7681BF;">
    <?php if (isset($_SESSION['USER'])) {
        $na = $_SESSION['USER']->name;
        echo $na;
    }
    ?> : Manager Information
</div>

<style>
    .popup-div {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.2);
        width: 100vw;
        height: 100vh;
        z-index: 1000;
    }

    .popup-contain {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .popup-card {
        width: 450px;
        height: fit-content;
        background-color: white;
        text-align: center;
    }

    .popup-body {
        padding: 40px;
    }

    .popup-body i {
        /* color: red; */
        font-size: 6rem;
        margin: 30px 0px 10px 0px;
    }

    .popup-header {
        position: relative;
    }

    .popup-heading {
        height: 75px;
        display: flex;
        justify-content: center;
        align-items: center;

        font-size: 1.5rem;
        font-weight: 600;

        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    }

    .popup-message {
        font-size: 1.4rem;
        margin: 40px;
    }

    .popup-delete-btn {
        margin: 20px 0px 0px 0px;
    }


    .popup-close {
        position: absolute;
        color: rgba(0, 0, 0, 0.4);
        font-size: 1.8rem;
        top: 32%;
        right: 20px;
    }

    .popup-close:hover {
        color: red;
        cursor: pointer;
    }

    .i-green {
        color: green;
    }

    .i-red {
        color: red;
    }
</style>
<center>
    <!-- popup div -->
    <div class="popup-div" id="popup-div">
        <div class="popup-contain">
            <div class="card popup-card">
                <div class="popup-header">
                    <div class="popup-heading" id="popup-head">this is heading</div>
                    <i class="fa-solid fa-circle-xmark popup-close" id="popup-close-btn"></i>
                </div>
                <div class="popup-body">
                    <i class="fa-solid fa-circle-exclamation" id="popup-hero-btn"></i>
                    <div class="popup-message" id="popup-message">
                        Confirm you want to delete event manager michael jackson
                    </div>
                    <button class="popup-delete-btn btn btn-md btn-block" id="popup_delete_btn">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END : popup div -->

    <div style="width: 1500px; height:auto;">
        <div class="center-box-border" id="managers-list" style="float:right;">
            <h1 style="text-align: center;">Event Managers</h1>
            <hr size="1px" noshade style="width: 70%; opacity: 0.4; text-align: center;
                height: 2px;
                background: black;">
            <?php
            $org = $_SESSION['USER'];
            $x = 0;
            if ($allmanagers) : ?>
                <table class='data-table'>
                    <!-- table headings -->
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


                    <!-- // output data of each row -->
                    <tbody id="table_body">
                        <?php foreach ($allmanagers as $manager) : ?>
                            <tr>
                                <td><?= $manager->full_name ?></td>
                                <td><?= $manager->email ?></td>
                                <td><?= $manager->nic ?></td>
                                <td>0</td>
                                <td id='button-col'>
                                    <i id='delete-edit-btn-2' class='fa-regular fa-trash-can' onclick="before_delete('<?= $manager->email ?>')"></i>
                                </td>

                                <td id='button-col'>
                                    <a id='delete-edit-btn-2' href='manager_profile?id=<?= $manager->email ?>'><i class='fa-regular fa-pen-to-square'></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>;
            <?php else : ?>
                <center>
                    <h2 style='font-family: inter;'>No managers added</h2>
                </center>
            <?php endif; ?>
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
                    <input type="text" id="email-em" name="email" placeholder="Email"><br>
                    <div class="client-error"></div>
                </div>


                <div class="eminput-control">
                    <label for="NIC"></label>NIC:<br>&nbsp;&nbsp;
                    <input type="text" id="nic-em" name="nic" placeholder="NIC"><br>
                    <div class="client-error"></div>
                </div>

                <div class="eminput-control">
                    <label for="name">Set Password:</label><br>&nbsp;&nbsp;
                    <input type="password" id="pw-em" name="password" placeholder="Set Password"><br>
                    <div class="client-error"></div>
                </div>

                <button type="submit" class="submit-btn" id="form-btn">ADD</button>
            </form>
        </div>
    </div>
</center>
<br><br><br>

<script>
    const popup_div = document.getElementById('popup-div')
    const popup_close_btn = document.getElementById('popup-close-btn')

    const popup_head = document.getElementById('popup-head')
    const popup_message = document.getElementById('popup-message')
    const popup_btn = document.getElementById('popup_delete_btn')

    const popup_hero_btn = document.getElementById('popup-hero-btn')

    popup_close_btn.addEventListener("click", close_popup)

    function open_popup() {
        popup_div.style.display = 'block'
    }

    function close_popup() {
        popup_div.style.display = 'none'
    }

    close_popup();

    // function fetchData() {
    //     return fetch("http://localhost/food_for_all/public/add_managers/before_dele/sam@123").then(response => response.text()).then(data => {
    //         return data
    //     }).catch(error => {
    //         return ('error')
    //     })
    // }

    function before_delete(manager_email) {
        fetch("http://localhost/food_for_all/public/add_managers/before_delete/" + manager_email)
            .then(response => response.text()).then(data => setpopup_delete(data, manager_email))
            .catch(error => console.log(error))
    }

    function delete_manager(manager_email) {
        fetch("http://localhost/food_for_all/public/add_managers/delete_manager/" + manager_email).then(response => {
            response.text()
        }).then(data => {
            setpopup_done()
            updateFeed()
        }).catch(error => {
            console.log(error)
        })
    }

    function setpopup_delete(error_string, manager_mail) {
        popup_hero_btn.classList = "fa-solid fa-circle-exclamation i-red"
        if (error_string != 'deletable') {
            popup_head.innerHTML = "Error!"
            popup_message.innerHTML = error_string
            popup_btn.classList.remove("btn-red")
            popup_btn.classList.add("btn-green")
            popup_btn.innerHTML = "view profile"

            popup_btn.addEventListener("click", function() {
                window.location.href = "<?=ROOT?>/manager_profile?id=" + manager_mail
            })
        } else {
            popup_head.innerHTML = "Delete event manager"
            popup_message.innerHTML = "Are you shour you want to delete this user?"
            popup_btn.innerHTML="Delete"
            popup_btn.classList.remove("btn-green")
            popup_btn.classList.add("btn-red")
            popup_btn.addEventListener("click", function() {
                delete_manager(manager_mail)
            })
        }

        popup_div.style.display = 'block'
    }

    function setpopup_done() {
        popup_head.innerHTML = "Completed!"
        popup_message.innerHTML = "Manager deleted successfully"

        popup_btn.innerHTML = "Ok"
        popup_btn.classList.add('green')
        popup_btn.addEventListener('click', close_popup)
        popup_hero_btn.classList = "fa-sharp fa-solid fa-circle-check i-green"
    }

    function updateFeed() {
        const table_body = document.getElementById('table_body')
        table_body.innerHTML = ''

        fetch('http://localhost/food_for_all/public/add_managers/update_feed')
            .then(response => response.json())
            .then(data => {
                data.forEach(manager => {
                    const bodyRow = document.createElement('tr');

                    const td_name = document.createElement('td');
                    const td_email = document.createElement('td');
                    const td_nic = document.createElement('td');
                    const td_events = document.createElement('td');
                    const td_delete = document.createElement('td');
                    const td_update = document.createElement('td');

                    const a_update = document.createElement('a');
                    const i_delete = document.createElement('i');
                    const i_update = document.createElement('i');

                    td_name.innerHTML = manager.full_name
                    td_email.innerHTML = manager.email
                    td_nic.innerHTML = manager.nic
                    // td_events.innerHTML=manager.

                    td_delete.setAttribute("id", "button_col")
                    td_update.setAttribute("id", "button_col")

                    i_delete.setAttribute("id", "delete-edit-btn-2")

                    i_delete.setAttribute("class", "fa-regular fa-trash-can")
                    i_delete.setAttribute("onclick", "before_delete('" + manager.email + "')")

                    i_update.setAttribute("class", "fa-regular fa-pen-to-square")

                    a_update.setAttribute("id", "delete-edit-btn-2")
                    a_update.setAttribute("href", "manager_profile?id=" + manager.email)

                    // appending childs
                    a_update.appendChild(i_update)
                    td_update.appendChild(a_update)

                    td_delete.appendChild(i_delete)

                    bodyRow.appendChild(td_name)
                    bodyRow.appendChild(td_email)
                    bodyRow.appendChild(td_nic)
                    bodyRow.appendChild(td_events)
                    bodyRow.appendChild(td_delete)
                    bodyRow.appendChild(td_update)

                    table_body.appendChild(bodyRow)
                })
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }
</script>

<script src="<?= ROOT ?>/assets/script/em_form_check.js"></script>

<?php $this->view('includes/footer') ?>