<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="my-form">
        <input type="text" placeholder="name" name="name">
        <button type="submit">submit form</button>
    </form>
</body>
<script>
    const form = document.getElementById("my-form");

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // prevent the form from submitting normally

        const formData = new FormData(form);

        fetch("<?=ROOT?>/admin/temp16", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log("Success:", data);
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
</script>

</html>