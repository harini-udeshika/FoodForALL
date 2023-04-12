<style>
    #go-to-top {
        display: none;
        position: fixed;

        bottom: 60px;
        right: 30px;

        z-index: 99;
        cursor: pointer;

        height: 48px;

        border: none;
        border-radius: 10px;

        font-weight: 700;
        font-size: 22px;

        padding: 0px 20px;

        color: white;
        background-color: #7FB432;
    }

    #go-to-top:hover {
        background-color: #6F9D2B;
    }
</style>

<button id="go-to-top">Top &uparrow;</button>

<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        let scrollTop_limit = 600
        if (document.body.scrollTop > scrollTop_limit || document.documentElement.scrollTop > scrollTop_limit) {
            document.getElementById("go-to-top").style.display = "block";
        } else {
            document.getElementById("go-to-top").style.display = "none";
        }
    }

    document.getElementById("go-to-top").addEventListener("click", function() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
</script>