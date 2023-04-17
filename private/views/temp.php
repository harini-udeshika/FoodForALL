<ul id="sidebar">
    <li><a href="#" onclick="loadPage('getballa')">balla</a></li>
    <li><a href="#" onclick="loadPage('calcluate_org_count')">kukula</a></li>
</ul>

<div id="container"></div>

<script>
    function loadPage(method_name) {
        let url = "http://localhost/food_for_all/public/fetch/" + method_name
        console.log("function called")
        fetch(url)
            .then(response => response.text())
            .then(html => {
                document.getElementById("container").innerHTML = html;
            })
            .catch(error => {
                console.error('Error fetching page:', error);
            });
    }

    function temp_func() {
        let url = "http://localhost/food_for_all/public/fetch/calcluate_org_count"

        console.log("function called")
        fetch(url)
            .then(response => response.text())
            .then(html => {
                console.log(html)
            })
            .catch(error => {
                console.error('Error fetching page:', error);
            });
    }

    setInterval(temp_func,3000)
</script>

</body>

</html>