<?php session_start() ?>
<html lang="en-US">
    <head>
        <title>ABC Bank - Savings</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="author" content="Joshua Grizzell"/>
        <meta name="description" content="A mock bank website made for CSE 4550."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">        
        <link rel="Shortcut Icon" href="../image/favicon.ico" type="image/favicon">
        <link rel="stylesheet" href="../style.css"/>
    </head>

    <body>

    <nav>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../savings/savings.html">Savings</a></li>
            <li><a href="../checking/checking.html">Checking</a></li>
            <li><a href="investment.html">Investment</a></li>
        </ul>
    </nav>

        <h2>All Investment Accounts</h2><br>

        <?php
            $servername = "localhost";
            $username = "quickme1_4211";
            $password = "csci4211";
            $dbname = "dbvpny1qngaxgp";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM investment";
            $result = $conn->query($sql);
        ?>

        <table class="striped">
            <tr class="header">
                <td><strong>Account Number</strong></td>
                <td><strong>First Name</strong></td>
                <td><strong>Last Name</strong></td>
                <td><strong>Phone Number</strong></td>
                <td><strong>Balance</strong></td>
                <td><strong>Interest Rate</strong></td>
                <td><strong>Total Amount</strong></td>

        <?php
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["Acct_no"]."</td>";
                    echo "<td>".$row["firstname"]."</td>";
                    echo "<td>".$row["lastname"]."</td>";
                    echo "<td>".$row["phone"]."</td>";
                    echo "<td>$".$row["Balance"]."</td>";
                    echo "<td>".$row["interest_rate"]."</td>";
                    echo "<td>$".$row["total_amount"]."</td>";
                    echo "</tr>";
                }
            }
        ?>
    </body>
</html>