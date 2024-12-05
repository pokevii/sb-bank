<?php session_start() ?>
<!DOCTYPE html>
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
            <li><span>Accounts</span></li>
        </ul>
    </nav>

    <body>
        <br>
        
        

        <?php
            if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
                echo("<h2>Accounts</h2>");
            } else {
                die("<p>Please <a href=\"login.html\">log in</a> to view this page.</p>");
            }
        ?>

        <a href="newaccount.html"><img src="image/plus.png" width="25" alt="Add new bank account."></a>

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
            
            //get all accounts associated with the customerID
            $sql = "SELECT * FROM account WHERE CustomerID = $customerid";
            $result = mysqli_query($conn, $sql);
            $data = $result->fetch_all(MYSQLI_ASSOC);
            

            //display all accounts
            if($result->num_rows == 0){
                echo("<p>No accounts found. Make one <a href=newaccount.html>here!</a></p>");
            } else { ?>
                <div class="grid-container">
                <?php foreach ($data as $account): ?>
                    <div class="account-container">
                        <div class="account-name"><?=htmlspecialchars($account["AccountName"]);?></div>
                        <div class="account-delete"><a href="index.html"><img src="image/minus.png" alt="Delete account" width=15px></div></a>
                        <div class="account-balance">$<?=htmlspecialchars(round($account["AccountBalance"], 2, 1));?></div> 
                    </div>
                    
                

                <?php endforeach;  ?>
                </div>
            <?php } ?>

    </body>
</html>
