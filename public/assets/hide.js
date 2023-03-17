let filterSection=document.querySelector(".filter-section");
        let isShow=true;

        // function showHideUsers(){
        //     if(isShow){
        //         usersSection.style.display="none";
        //         isShow=false;
        //     }else{
        //         usersSection.style.display="block";
        //         isShow=true;
        //     }
            
        // }

        function showHideUsers(){
            isShow=!isShow;
            filterSection.classList.toggle("hide");
        }

        function clearParameters() {
            window.location.href = window.location.href.split('?')[0];
        }