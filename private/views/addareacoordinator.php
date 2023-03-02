<?php $this->view('includes/header_2') ?>
<link rel="stylesheet" href="<?= ROOT ?>/assets/addareacoordinator.css">
<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/submenu') ?>


<body>
    <div class="container">
        <!-- main heading -->
        <div class="heading-1 col-lg-12">Add Area Coordinator</div>

        <!-- space -->
        <div class="blank col-lg-3"></div>

        <!-- START : form -->
        <form class="col-lg-6 m-top-20 m-bottom-100" action="<?= ROOT ?>/Admin_search_areacoords/new_areacoord" method="post" id="form1">
            <div class="card card-back1 p-40 p-bottom-30 grid-8 max-w-400px m-lr-auto">
                <?php if (isset($errors)) : ?>
                    <div class="col-lg-8 server_errors p-10">
                        <?php foreach ($errors as $error) : ?>
                            <div class="txt-white txt-09 w-semibold">*<?= $error ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="col-lg-8">
                    <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">Name</label>
                    <input class="input-field input-field-block txt-08 w-medium" name="name" id="name" value="<?= get_var('name') ?>" type="text">
                    <div class="error-holder">
                        <i class="fa-solid fa-triangle-exclamation exclanation_icon"></i>
                        <div class="err_message inline">error message</div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">E-mail</label>
                    <input class="input-field input-field-block txt-08 w-medium" name="email" value="<?= get_var('email') ?>" id="email" type="text">
                    <div class="error-holder">
                        <i class="fa-solid fa-triangle-exclamation exclanation_icon"></i>
                        <div class="err_message inline">error message</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">NIC</label>
                    <input class="input-field input-field-block txt-08 w-medium" name="nic" id="nic" value="<?= get_var('nic') ?>" type="text">
                    <div class="error-holder">
                        <i class="fa-solid fa-triangle-exclamation exclanation_icon"></i>
                        <div class="err_message inline">error message</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">Contact Number</label>
                    <input class="input-field input-field-block txt-08 w-medium" name="phone_no" id="phone_no" value="<?= get_var('phone_no') ?>" type="text">
                    <div class="error-holder">
                        <i class="fa-solid fa-triangle-exclamation exclanation_icon"></i>
                        <div class="err_message inline">error message</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">District</label>
                    <select type="text" name="district" id="district" placeholder="District" class="input-field input-field-block txt-08 w-medium">
                        <option value="" selected="selected">Select District</option>
                    </select>
                    <div class="error-holder">
                        <i class="fa-solid fa-triangle-exclamation exclanation_icon"></i>
                        <div class="err_message inline">error message</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">Area</label>
                    <select type="text" name="area" id="area" placeholder="Area" class="input-field input-field-block txt-08 w-medium">
                        <option value="" selected="selected">Please select Distrct</option>
                    </select>
                    <div class="error-holder">
                        <i class="fa-solid fa-triangle-exclamation exclanation_icon"></i>
                        <div class="err_message inline">error message</div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">Password</label>
                    <input class="input-field input-field-block txt-08 w-medium" type="password" name="password" id="password">
                    <div class="error-holder">
                        <i class="fa-solid fa-triangle-exclamation exclanation_icon"></i>
                        <div class="err_message inline">error message</div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <label class="txt-08 width-100 p-left-5 w-semibold txt-gray" for="">Re-enter Password</label>
                    <input class="input-field input-field-block txt-08 w-medium" type="password" name="password2" id="password2">
                    <div class="error-holder">
                        <i class="fa-solid fa-triangle-exclamation exclanation_icon"></i>
                        <div class="err_message inline">error message</div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <button class="btn btn-sm btn-block btn-green m-top-20" type="submit" name="add">Add</button>
                </div>
            </div>
        </form>
        <!-- END : form -->

        <!-- space -->
        <div class="blank col-lg-3"></div>
    </div>

    <script>
        // --------------------------- VALIDATE usin JS-----------------------
        const form = document.getElementById('form1');

        // selecting form elements

        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const nic = document.getElementById('nic');
        const phone_no = document.getElementById('phone_no');
        const district = document.getElementById('district');
        const area = document.getElementById('area');
        const password = document.getElementById('password');
        const password2 = document.getElementById('password2');

        form.addEventListener("submit", (event) => {
            // event.preventDefault();
            checkInputs(event);
        });

        function checkInputs(event) {

            const name_value = name.value.trim();
            const email_value = email.value.trim();
            const nic_value = nic.value.trim();
            const phone_no_value = phone_no.value.trim();
            const district_value = district.value.trim();
            const area_value = area.value.trim();
            const password_value = password.value.trim();
            const password2_value = password2.value.trim();


            //------validate first name-----
            if (name_value == '') {
                displayErrorMessage(event, name, "cannot be empty");
            } else if (!isValidName(name_value)) {
                displayErrorMessage(event, name, "Not a valid username.");
            } else {
                offErrorMessage(name);
            }

            //------validate email-----
            if (email_value == '') {
                displayErrorMessage(event, email, "Cannot be blank");
            } else if (!email_value.substring(email_value.length - 4) == '.com') {
                displayErrorMessage(event, email, "Not a valid email");
            } else {
                offErrorMessage(email);
            }

            // -----validate nic------
            if (nic_value == '') {
                displayErrorMessage(event, nic, "Can not be blank.");
            } else if (nic_value.length == 12) {
                if (!isValidNumber(nic_value)) {
                    displayErrorMessage(event, nic, "Invalid NIC");

                } else {
                    offErrorMessage(nic);
                }
            } else if (nic_value.length == 10) {
                var lastLetterOfNic = nic_value[nic_value.length - 1];

                if (lastLetterOfNic != 'V' && lastLetterOfNic != 'v') {
                    displayErrorMessage(event, nic, "Invalid NIC");

                } else if (!isValidNumber(nic_value.substring(0, nic_value.length - 1))) {
                    displayErrorMessage(event, nic, "Invalid NIC");


                } else {
                    offErrorMessage(nic);
                }
            } else {
                displayErrorMessage(event, nic, "Invalid NIC");
            }

            // -----validate contact number------
            if (phone_no_value == '') {
                displayErrorMessage(event, phone_no, "cannot be empty.");
            } else if (phone_no_value.substring(0, 2) == '94' && phone_no_value.length == 11) {
                var serviceProvider = phone_no_value.substring(2, 4);
                if (!isValidPrefix(serviceProvider)) {
                    displayErrorMessage(event, phone_no, "Invalid number.");


                } else {
                    offErrorMessage(phone_no);
                }

            } else if (phone_no_value[0] == 0 && phone_no_value.length == 10) {
                var serviceProvider = phone_no_value.substring(1, 3);
                if (!isValidPrefix(serviceProvider)) {
                    displayErrorMessage(event, phone_no, "Invalid number.");


                } else {
                    offErrorMessage(phone_no);
                }

            } else if (phone_no_value.length == 9) {
                var serviceProvider = phone_no_value.substring(0, 2);
                if (!isValidPrefix(serviceProvider)) {
                    displayErrorMessage(event, phone_no, "Invalid number");


                } else {
                    offErrorMessage(phone_no);
                }
            } else {
                displayErrorMessage(event, phone_no, "Invalid Number");
            }


            // -----Validate District------
            if (district_value == '') {
                displayErrorMessage(event, district, "Please select a district");
            } else {
                offErrorMessage(district);
            }

            // -----Validate area------
            if (area_value == '') {
                displayErrorMessage(event, area, "Please select a town");
            } else {
                offErrorMessage(area);
            }

            // validate password
            if (password2_value == '') {
                displayErrorMessage(event, password2, "Can not be blank.");
            } else {
                offErrorMessage(password2);
            }
            if (password_value == '') {
                displayErrorMessage(event, password, "Can not be blank.");
            } else {
                offErrorMessage(password);
            }


            if (password_value == '') {
                displayErrorMessage(event, password, "Can not be blank.");
            } else if (password_value.length < 8) {
                displayErrorMessage(event, password, "Password should at least 8 characters");
            } else if (name_value != ''&& (password_value.includes(name_value))) {
                displayErrorMessage(event, password, "Can not use your name as a password.");
            } else if (password_value != password2_value) {
                displayErrorMessage(event, password2, "Password does not match.");
            } else {
                offErrorMessage(password);
                offErrorMessage(password2);
            }
        }


        //  !----------------------- end of validations ------------------------



        //  !----------------------- helper functions ------------------------

        //function to check letter or not
        function isLetter(letter) {
            return letter.match(/[a-z]/i);
        }

        //function to check number or not
        function isDigit(letter) {
            return letter.match(/[0-9]/);
        }

        //valid service provider
        function isValidPrefix(str) {
            var serviceProviders = ["77", "76", "74", "71", "70", "31", "11", ];
            return serviceProviders.includes(str);
        }

        //validate username(check whether contain any other character than a english letter)
        function isValidName(name) {
            var flag = true;

            for (let index = 0; index < name.length; index++) {
                if (!isLetter(name[index])) {

                }
            }

            return flag;
        }

        //validate NIC
        function isValidNumber(number) {
            var flag = true;

            for (let index = 0; index < number.length; index++) {
                if (!isDigit(number[index])) {

                }
            }

            return flag;
        }

        // display error
        function displayErrorMessage(event, id, message) {
            const form_control = id.parentElement;

            const err_div = form_control.querySelector('.error-holder');

            const err_field = form_control.querySelector('.err_message');
            // const err_icon = form_control.querySelector('.exclanation_icon');

            err_div.classList.add('active');

            err_field.innerText = message;

            event.preventDefault();
        }

        function offErrorMessage(id) {
            const form_control = id.parentElement;

            const err_div = form_control.querySelector('.error-holder');
            err_div.classList.remove('active');
        }


        // district and town
        var districtObject = {
            "Ampara": {
                "Addalaichchenai": [],
                "Akkaraipattu": [],
                "Alayadivembu": [],
                "Ampara": [],
                "Damana": [],
                "Dehiattakandiya": [],
                "Irakkamam": [],
                "Kalmunai": [],
                "Kavaitivu": [],
                "Lahugala": [],
                "Maha Oya": [],
                "Navithanveli": [],
                "Nintavur": [],
                "Padiyathalawa": [],
                "Pottuvil": [],
                "Sainthamaruthu": [],
                "Sammanthurai": [],
                "Thirukkovil": [],
                "Uhana": [],
            },
            "Anuradhapura": {
                "Anuradhapura": [],
                "Bulnewa": [],
                "Eppawala": [],
                "Galenbindunuwewa": [],
                "Galnewa": [],
                "Ganewalpola": [],
                "Habarana": [],
                "Horowupatana": [],
                "Kahatagasdigiliya": [],
                "Kebithigollawa": [],
                "Kekirawa": [],
                "Konapathirawa": [],
                "Konwewa": [],
                "Madutugama": [],
                "Mahailuppallama": [],
                "Maradankadawala": [],
                "Medawachchiya": [],
                "Mihintale": [],
                "Nochchiyagama": [],
                "Padawiya": [],
                "Palugaswewa": [],
                "Rambewa": [],
                "Seeppukulama": [],
                "Talawa": [],
                "Tambuttegama": [],
                "Thirappane": [],
                "Yakkala": [],
            },
            "Badulla": {
                "Badulla": [],
                "Bandarawela": [],
                "Ella": [],
                "Hali-Ela": [],
                "Haputale": [],
                "Kumarapattiya": [],
                "Lunugala": [],
                "Mahiyanganaya": [],
                "Passara": [],
                "Uva-Paranagama": [],
                "Welimada": [],
                "Wiyaluwa": [],
            },
            "Batticaloa": {
                "Eravurpaththu": [],
                "Eravur Town": [],
                "Kattankudy": [],
                "Koralaipattu": [],
                "Manmunai": [],
                "Manmunaipattu": [],
                "Porativuoattu": [],
            },
            "Colombo": {
                "Colombo": [],
                "Dehiwala": [],
                "Homagama": [],
                "Kaduwela": [],
                "Kesbawa": [],
                "Kolonnawa": [],
                "Maharagama": [],
                "Moratuwa": [],
                "Padukka": [],
                "Ratmalana": [],
                "Seethawaka": [],
                "Jayawardenapura": [],
                "Thimbirigasyaya": [],
            },
            "Galle": {
                "Ahangama": [],
                "Ahungalla": [],
                "Ambalangoda": [],
                "Baddegama": [],
                "Balapitiya": [],
                "Batapola": [],
                "Bentota": [],
                "Boossa": [],
                "Elpitiya": [],
                "Habaraduwa": [],
                "Hiniduma": [],
                "Hikkaduwa": [],
                "Karandeniya": [],
                "Koggala": [],
                "Kosgoda": [],
                "Mapalagama": [],
                "Mapalagama": [],
                "Nagoda": [],
                "Neluwa": [],
                "Pitigala": [],
                "Rathgama": [],
                "Thawalama": [],
                "Udugama": [],
                "Urugasmanhandiya": [],
                "Wanduramba": [],
                "Yakkala": [],
            },
            "Gampaha": {
                "Attanagalla": [],
                "Biyagama": [],
                "Divulapitiya": [],
                "Dompe": [],
                "Gampaha": [],
                "Ja-Ela": [],
                "Katana": [],
                "Kelaniya": [],
                "Mahara": [],
                "Minuwangoda": [],
                "Mirigama": [],
                "Negombo": [],
                "Wattala": [],
            },
            "Hambanthota": {
                "Hambantota": [],
                "Tangalle": [],
                "Ambalantota": [],
                "Beliatta": [],
                "Tissamaharama": [],
                "Middeniya": [],
                "Agunakolapelessa": [],
                "Walasmulla": [],
                "Weerakatiya": [],
            },
            "Jaffna": {
                "Delf": [],
                "Jaffna": [],
                "Karainagar": [],
                "Nallur": [],
                "Thenmarachchi": [],
                "Vadamarachchi": [],
                "Valikamak": [],
            },
            "Kalutara": {
                "Agalawatta": [],
                "Bandaragama": [],
                "Beruwala": [],
                "Bulathsinhala": [],
                "Dodangoda": [],
                "Horana": [],
                "Ingiriya": [],
                "Kaluthara": [],
                "Madurawela": [],
                "Matugama": [],
                "Millaniya": [],
                "Palindanuwara": [],
                "Panadura": [],
                "Walallavita": [],
            },
            "Kandy": {
                "Akurana": [],
                "Delotata": [],
                "Doluwa": [],
                "Ganga Ihala Korale": [],
                "Gagawata Korale": [],
                "Harispattuwa": [],
                "Hatharaliyadda": [],
                "Kundasale": [],
                "Teldeniya": [],
                "Mnipe": [],
                "Panvila": [],
                "Pasbage Korale": [],
                "Pathadumbara": [],
                "Pathahewaheta": [],
                "Poojapitiya": [],
                "Thumpane": [],
                "Udapalatha": [],
                "Ududumbara": [],
                "Udunuwara": [],
                "Yatinuwara": [],
            },
            "Kegalle": {
                "Ambepussa": [],
                "Aranayaka": [],
                "Bulathkohupitiya": [],
                "Dehiovita": [],
                "Deraniyagala": [],
                "Deraniyagala": [],
                "Galigamuwa": [],
                "Hemmathagama": [],
                "Karawanella": [],
                "Kitulgala": [],
                "Kotiyakumbura": [],
                "Mawanella": [],
                "Rambukkana": [],
                "Thalgaspitiya": [],
                "Warakapola": [],
                "Yatiyantota": [],
                "Ganthuna": [],
            },
            "Kilinochchi": {
                "Kandavalai": [],
                "Karachchi": [],
                "Pachchilaipalli": [],
                "Poonakary": [],
            },
            "Kurunegala": {
                "Girithalana": [],
                "Panagamuwa": [],
                "Narammala": [],
                "Wariyapola": [],
                "Nikaweratiya": [],
                "Pannala": [],
                "Galgamuwa": [],
                "Gomugomuwa": [],
                "Polgahawela": [],
                "Maho": [],
                "Ibbangamuwa": [],
                "Giriulla": [],
                "Hiripitiya": [],
                "Dandagamuwa": [],
                "Dambadeniya": [],
                "Melsiripura": [],
                "Hettipola": [],
                "Panduwasnuwara": [],
                "Potuhera": [],
                "Mawathagama": [],
                "Yapahuwa": [],
                "Bingiriya": [],
                "Pannawa": [],
                "Ridigama": [],
            },
            "Mannar": {
                "Madhu": [],
                "Mannar": [],
                "Mamthai": [],
                "Musali": [],
                "Nanaddan": [],
            },
            "Matale": {
                "Dambulla": [],
                "Galewela": [],
                "naula": [],
                "Nallepola": [],
                "Rattota": [],
                "Ukuwela": [],
                "Yatawatta": [],
            },
            "Matara": {
                "Akuressa": [],
                "Athuraliya": [],
                "Devinuwara": [],
                "Dickwella": [],
                "Hakmana": [],
                "Kamburupitiya": [],
                "Kirinda Pahuwella": [],
                "Katapola": [],
                "Malimbada": [],
                "Matara": [],
                "Mulatiyana": [],
                "Pasgoda": [],
                "Pitabeddara": [],
                "Thihagoda": [],
                "Weligama": [],
                "Wlipitiya": [],
            },
            "Moneragala": {
                "Moneraragala": [],
                "Bibile": [],
                "Buttala": [],
                "Wellawaya": [],
                "Kataragama": [],
                "Siyambalanduwa": [],
                "Medagama": [],
                "Thanamalwila": [],
                "Badalkumbura": [],
                "Sevanagala": [],
                "Madulla": [],
            },
            "Mullaitivu": {
                "Manthai East": [],
                "maritimepattu": [],
                "Oddusuddan": [],
                "Puthukkudiyiruppu": [],
                "Thunukkai": [],
                "Weli Oya": [],
            },
            "Nuwara Eliya": {
                "Agrapatana": [],
                "Ambewela": [],
                "Bogawantalawa": [],
                "Bopattalawa": [],
                "ginigathhena": [],
                "Hapugastalawa": [],
                "Haggala": [],
                "Hanguranketha": [],
                "Hatton": [],
                "Kotagala": [],
                "Kotmale": [],
                "Labukele": [],
                "Laxapana": [],
                "Talawakele": [],
                "Maskeliya": [],
                "Nildandahinna": [],
                "Nuwara Eliya": [],
                "Nanu Oya": [],
                "Norton Bridge": [],
                "Padiyapelella": [],
                "Ramboda": [],
                "Ragala": [],
                "Rikillagaskada": [],
                "Rozella": [],
                "Udapussellwa": [],
                "Walapane": [],
                "Watawala": [],
                "Pundaluoya": [],
                "Kandapola": [],
                "Pattipola": [],
            },
            "Polonnaruwa": {
                "Thamankaduwa": [],
                "Hingurakgoda": [],
                "Medirigiriya": [],
                "Lankapura": [],
                "Welikanda": [],
                "Dimbulagala": [],
                "Elahara": [],
            },
            "Puttalam": {
                "Anamaduwa": [],
                "Battuluoya": [],
                "Dankotuwa": [],
                "Eluwankulama": [],
                "Kalpitiya": [],
                "Madampe": [],
                "Mahawewa": [],
                "Marawila": [],
                "Mundel": [],
                "Nattandiya": [],
                "Nuraicholai": [],
                "Palavi": [],
                "Thillayadi": [],
                "Wennappuwa": [],
                "Katuneriya": [],
                "Nainamadama": [],
                "Chilaw": [],
            },
            "Ratnapura": {
                "Ratnapura": [],
                "Ratnapura": [],
                "Ratnapura": [],
                "Eheliyagoda": [],
                "Pelmadulla": [],
                "Kuruwita": [],
                "Imbulpe": [],
                "Godakawela": [],
                "Kahawatta": [],
                "Rakwana": [],
                "Weligepola": [],
                "Nivitigala": [],
                "Ayagama": [],
                "Kalawana": [],
                "Kolonna": [],
                "Panamure": [],
                "Pohorabawa": [],
                "Pallebedda": [],
                "Udawalawe": [],
            },
            "Trincomalee": {
                "Gomarankadawala": [],
                "Kantalai": [],
                "Kinniya": [],
                "Kuchchaveli": [],
                "Morawewa": [],
                "Muttur": [],
                "Padavi Siripura": [],
                "Seruvila": [],
                "Thampalakamam": [],
                "Echchalampattu": [],
            },
            "Vavniya": {
                "Vavuniya": [],
                "Vavuniya North": [],
                "Vavuniya South": [],
                "Venkalacheddikkulam": [],
            },
        }

        window.onload = function() {
            var selected_district = "<?php get_var('district') ?>";
            var selected_area = "<?php get_var('area') ?>";

            var districtSelector = document.getElementById("district"),
                areaSelector = document.getElementById("area");
            for (var country in districtObject) {
                districtSelector.options[districtSelector.options.length] = new Option(country, country);
            }
            districtSelector.onchange = function() {
                areaSelector.length = 1;
                if (this.selectedIndex < 1) return;
                for (var state in districtObject[this.value]) {
                    areaSelector.options[areaSelector.options.length] = new Option(state, state);
                }
            }
            // districtSelector.onchange();
            if (selected_district != "") {
                districtSelector.value = selected_district;
                var event = new Event("change");
                districtSelector.dispatchEvent(event);

                if (selected_area != "")
                    areaSelector.value = selected_area;
            }
        }
    </script>
</body>

<?php $this->view('includes/footer') ?>