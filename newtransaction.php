<?php session_start() ?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>SB Bank - Transaction</title>

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
        <br>

        <?php
            $servername = "localhost";
            $username = "testacc";
            $password = "cse5720";
            $dbname = "sbbank";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $customerid = $_SESSION["CustomerID"];
            $accountid = $_GET["id"];

            //if user is not logged in, or user is logged in but this is not their account, do not let them access the page.
            if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
                $sql = "SELECT * FROM account WHERE CustomerID = $customerid && AccountID = $accountid";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) == 1) {
                    echo("<h2>Make Transaction</h2>");
                } else {
                    die("<p>Error in accessing account. Are you being sneaky?</p>");
                }
            } else {
                die("<p>Please <a href=\"login.html\">log in</a> to view this page.</p>");
            }
        ?>

        <form name="transaction" method="post" action="inserttransaction.php?id=<?=$accountid?>">
            <label for="type">Transaction Type: </label>
            <select name="type" id="type">
                <option value=""></option>
                <option value="Deposit">Deposit</option>
                <option value="Withdrawal">Withdrawal</option>
            </select><br><br>

            <label for="amount">Transaction Amount: $</label>
            <input type="number" name="amount" min="0.00" step="0.01"><br><br>

            <button type="submit">Submit</button>
        </form>


    </body>
</html>
