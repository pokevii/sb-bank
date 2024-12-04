<?php session_start() ?>
<html lang="en-US">
    <head>
        <title>PHP Test</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="author" content="Joshua Grizzell"/>
        <meta name="description" content="A mock bank website made for CSE 4550."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">        
        <link rel="Shortcut Icon" href="../image/favicon.ico" type="image/favicon">
        <link rel="stylesheet" href="style.css"/>
    </head>

    <body>
        <h2>PHP TEST</h2><br>

        <?php
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

            $sql = "SELECT * FROM branch";
            $result = $conn->query($sql);
        ?>

        <table class="striped">
            <tr class="header">
                <td><strong>BranchID</strong></td>
                <td><strong>BranchAddress</strong></td>
                <td><strong>BranchCity</strong></td>
                <td><strong>BranchState</strong</td>

        <?php
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["BranchID"]."</td>";
                    echo "<td>".$row["BranchAddress"]."</td>";
                    echo "<td>".$row["BranchCity"]."</td>";
                    echo "<td>".$row["BranchState"]."</td>";
                }
            }
        ?>
    </body>
</html>