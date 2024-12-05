<?php session_start() ?>
<html lang="en-US">
    <head>
        <title>SB Bank - Accounts</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="description" content="A mock bank website made for CSE 5720."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
        <link rel="Shortcut Icon" href="../image/favicon.ico" type="image/favicon">
        <link rel="stylesheet" href="style.css"/>
    </head>

    <nav>
        <ul>
            <li><span><a href=index.html>Home</a></span></li>
            <li><span><a href=accounts.php>Accounts</a></span></li>
        </ul>
    </nav>

    <body>
        <?php
            $servername = "localhost";
            $username = "testacc";
            $password = "cse5720";
            $dbname = "sbbank";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            } 

            $accname = $_REQUEST["AccountName"];
            $acctype = $_REQUEST["AccountType"];
            $accbal = $_REQUEST["AccountBalance"];
            $customerid = $_SESSION["CustomerID"];

            if ($acctype !== null) {
                    $sql = "INSERT INTO account (CustomerID, AccountName, AccountType, AccountBalance)
                    VALUES ('$customerid', '$accname', '$acctype', '$accbal')";
                if ($conn ->query($sql) === TRUE) {
                    echo "<p>Account created successfully! Navigate to your account using the bar above.".$sql."<br>".$conn->error."</p>";
                } else {
                    echo "<p>Error with account creation. Try <a href=\"login.php\">logging in</a>, your session may have expired.".$sql."<br>".$conn->error."</p>";
                }
            } else {
                echo "<p>Invalid account type or account type was null.<a href=\"login.php\">Try again.</a>".$sql."<br>".$conn->error."</p>";
            }

            $conn->close();
        ?>
    </body>
</html>
