<!-- This is all of the metadata. Should be the same for all pages. -->
<html lang="en-US">
    <head>
        <title>Template Page</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="description" content="A mock bank website made for CSE 5720."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
        <link rel="Shortcut Icon" href="../image/favicon.ico" type="image/favicon">
        <link rel="stylesheet" href="style.css"/>
    </head>




    <!-- This is the navigation menu. -->
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
        </ul>
    </nav>



<!-- Below is where you put all of your HTML and PHP. Examples below -->
    <body>
        <h2>Template Page</h2><br>

        <!-- You always want this bit of PHP here if you need to do anything w/ the database. -->
        <?php
            //Connect to the database.
            $servername = "localhost";
            $username = "testacc";
            $password = "cse5720";
            $dbname = "sbbank";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            //Query.
            //$sql = "SELECT * FROM branch";
            //$result = $conn->query($sql);
        ?>

        <!-- HTML goes here. -->

        <?php
        //Additional PHP can be placed after html statements.
        ?>
    </body>
</html>