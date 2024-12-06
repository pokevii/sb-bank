<?php session_start() ?>
<html lang="en-US">
    <head>
        <title>SB Bank - Accounts</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="description" content="A mock bank website made for CSE 5720."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css"/>
    </head>

    <nav>
        <ul>
            <li><span><a href=index.html>Home</a></span></li>
            <li><span><a href=accounts.php>Accounts</a></span></li>
        </ul>
    </nav>

    <body>
        <h2>Account Transactions</h2><br>

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

            $AccountID = $_GET["id"];

            $sql = "SELECT * FROM transaction WHERE AccountID = $AccountID";
            $result = $conn->query($sql);

            if($result->num_rows <= 0){
                die("<p>This account has made no transactions!</p>");
            }
        ?>
        <table class="striped">
            <tr class="header">
                <td><strong>Transaction ID</strong></td>
                <td><strong>Account ID</strong></td>
                <td><strong>Type</strong></td>
                <td><strong>Amount</strong></td>
                <td><strong>Date</strong</td>

        <?php
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["TransactionID"]."</td>";
                    echo "<td>".$row["AccountID"]."</td>";
                    echo "<td>".$row["TransactionType"]."</td>";
                    echo "<td>$".$row["TransactionAmount"]."</td>";
                    echo "<td>".$row["TransactionDate"]."</td>";
                }
            }
        ?>
    </body>
</html>