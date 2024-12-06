<html lang="en-US">
    <head>
        <title>SB Bank - Transaction</title>

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

            //Get info from form.
            $accountID = $_GET['id'];
            $transType = $_REQUEST['type'];
            $transAmount = $_REQUEST['amount'];
            $transDate = date('Y-m-d H:i:s.u');

            //If 0 or less was input into the amount, cancel.
            //If no transaction type was input, cancel.
            if($transAmount < 0.01 or $transType == ""){
                die("<p>Something went wrong with the transaction. <a href=newtransaction.php?id=$accountID>Try again!</a></p>");
            }

            //If transaction type was withdraw, make the amount negative.
            if($transType == 'Withdrawal') {
                $transAmount = -$transAmount;
            }

            //Insert the transaction into the table and update the account's balance accordingly.
            $sql = "INSERT INTO transaction (AccountID, TransactionAmount, TransactionType, TransactionDate)
                    VALUES ('$accountID', '$transAmount', '$transType', '$transDate');
                    UPDATE account
                    SET AccountBalance = AccountBalance + $transAmount WHERE AccountID = $accountID;";

            $result = $conn->multi_query($sql);

            if ($result) {
                echo "<p>Transaction complete! <a href=\"accounts.php\">Return to accounts.</a></p>";
            } else {
                echo "<p>Error with SQL request.".$sql."<br>".$conn->error."</p>";
            }

            $conn->close();
        ?>
    </body>
</html>
