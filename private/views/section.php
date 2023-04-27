<link rel="stylesheet" href="<?= ROOT ?>/assets/anjuna_css/autoload.css">
<!DOCTYPE html>
<html>

<head>
    <title>My Webpage</title>
    <style>
        /* set height and width for each section */
        section {
            height: 100vh;
        }

        body {
            margin: 0px;
            overflow: hidden;
        }

        /* set overflow to scroll */
        #section_container {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            margin: auto;
            max-width: 1400px;
            width: 100%;
        }

        /* style for the first section */
        #section1 {
            grid-column: span 3;
            background-color: #f2f2f2;
            /* background-color: black; */
            overflow-x: hidden;
            overflow-y: scroll;
            padding: 30px;
        }

        /* style for the second section */
        #section2 {
            grid-column: span 6;
            background-color: #ddd;
        }

        /* style for the third section */
        #section3 {
            grid-column: span 3;
            background-color: #ccc;
        }

        /* style for the scrollbar */
        ::-webkit-scrollbar {
            width: 0px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <a href="" data-key></a>
    <div id="section_container">
        <section id="section1">
            <div style="width:100%;height:120vh;background-color:yellow;border:1px solid black">
                <div style="background-color: white;width:100%; height:60px; border-bottom:1px solid black;"></div>
                <div style="background-color: white;width:100%; height:60px; border-bottom:1px solid black;"></div>
                <div style="background-color: white;width:100%; height:60px; border-bottom:1px solid black;"></div>
                <div style="background-color: white;width:100%; height:60px; border-bottom:1px solid black;"></div>
                <div style="background-color: white;width:100%; height:60px; border-bottom:1px solid black;"></div>

            </div>
        </section>

        <section id="section2">
            <!-- content for section 2 -->
        </section>

        <section id="section3">
            <!-- content for section 3 -->
        </section>
    </div>

</body>

</html>