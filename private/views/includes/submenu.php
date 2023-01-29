<div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="<?=$_SESSION['USER']->profile_pic?>" alt="">
                    <p>Hello <?php echo $_SESSION['USER']->first_name?> !</p>
                </div>
                    <hr>
                    <a href="profile" class="sub-menu-link">
                        <i class="fa-solid fa-user"></i>
                        <p>View profile</p>
                        <span>></span>
                    </a>
                    <a href="edit_profile" class="sub-menu-link">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <p>Edit profile</p>
                        <span>></span>
                    </a>
                    <a href="logout" class="sub-menu-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>Log out</p>
                        <span>></span>
                    </a>
            </div>
</div>