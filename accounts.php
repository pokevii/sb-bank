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
            <li><a href="index.html">Home</a></span></li>
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

            //get all accounts associated with the customerID
            $sql = "SELECT * FROM account WHERE CustomerID = ".$_SESSION["CustomerID"];
            $result = mysqli_query($conn, $sql);
            $data = $result->fetch_all(MYSQLI_ASSOC);

            //display all accounts
            if($result->num_rows == 0){
                echo("<p>No accounts found. Make one <a href=createaccount.php>here!</a>");
            } else {
                foreach ($data as $account): ?>
                <div class="grid-container">
                    <div class="grid-item"><?=htmlspecialchars($account["Balance"])?></div>
                </div>

                <?php endforeach; 
            } ?>

    </body>
</html>
