<?php session_start() ?>
<html lang="en-US">
    <head>
        <title>Template Page</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="description" content="A mock bank website made for CSE 5720."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">        
        <link rel="Shortcut Icon" href="../image/favicon.ico" type="image/favicon">
        <link rel="stylesheet" href="../style.css"/>
    </head>

    <!-- This is the navigation menu. -->
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
        </ul>
    </nav>

    <body>
        <h2>Template Page</h2><br>

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