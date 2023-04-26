<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        box-sizing: border-box;
    }

    .temp_class {
        width: 300px;
        height: 60px;
        margin-left: 200px;
        padding: 20px;
        font-size: 1.5rem;
        background-color: rgba(0, 0, 0, 0.2)
    }

    #result_div {
        max-height: 150px;
        overflow: auto;
    }
</style>

<body>
    <input type="text" id="input_div" style="width:300px;height:60px;margin:200px; margin-bottom:0px; padding:20px; font-size:1.5rem; border:none;background-color:rgba(0,0,0,0.4);" placeholder="enter value">
    <div id="result_div"></div>
    <!-- <button onclick="dynamic_search('input_div')">none</button> -->
</body>

<script>
    const search_input = document.getElementById("input_div")
    const result_div = document.getElementById("result_div")

    search_input.addEventListener("input", () => {
        if (search_input.value == " " || search_input.value == "") {
            search_input.value = ""
        } else {
            handleInput(search_input.value)
        }
    })

    let timerId;
    const delay = 700

    function handleInput(keyword) {
        clearTimeout(timerId)
        timerId = setTimeout(() => {
            dynamic_search(keyword, "http://localhost/food_for_all/public/fetch/searchUser")
        }, delay);
    }

    async function dynamic_search(keyword, function_URL) {
        try {
            const response = await fetch(function_URL + "/" + keyword);
            const data = await response.json();

            if (data != 'redirect') {
                result_div.innerHTML = ""

                if (data.length > 0) {
                    data.forEach(element => {
                        const res_div = document.createElement('div')
                        res_div.classList = "temp_class"
                        res_div.innerHTML = element.event_id
                        result_div.appendChild(res_div)
                    });
                } else {
                    const res_div = document.createElement('div')
                    res_div.classList = "temp_class"
                    res_div.innerHTML = "no result"
                    result_div.appendChild(res_div)
                }
            } else {
                window.location.href = "http://localhost/food_for_all/public/login"
            }
        } catch (error) {
            console.error(error);
        }
    }
</script>

</html>