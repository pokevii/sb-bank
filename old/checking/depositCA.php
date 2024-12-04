<html lang="en-US">
    <head>
        <title>ABC Bank - Make Transaction</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="author" content="Joshua Grizzell"/>
        <meta name="description" content="A mock bank website made for CSE 4550."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">        <link rel="Shortcut Icon" href="image/favicon.ico" type="image/favicon">
        <link rel="stylesheet" href="../style.css"/>
    </head>

    <nav>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../savings/savings.html">Savings</a></li>
            <li><a href="checking.html">Checking</a></li>
            <li><a href="../investment/investment.html">Investment</a></li>
        </ul>
    </nav>

    <body>
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

            $amount = $_REQUEST["amount"];
            $Acct_no = $_REQUEST["Acct_no"];
            $trans_type = "Deposit";
            
            $sql = "SELECT * FROM checking WHERE `Acct_no`='$Acct_no'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                $balance = $row["Balance"];
                $lastname = $row["lastname"];
                $firstname = $row["firstname"];
                $phone = $row["phone"];
                $transid = $row["TRansID"];
            }

            $date = date("m.d.y");
            
            $sql2 = "INSERT INTO `checking_transactions` (transid, trans_type, trans_date, trans_amount, lastname, firstname, phone)
            VALUES ('$transid' ,'$trans_type', '$date', '$amount', '$lastname', '$firstname', '$phone')";
            $result = $conn->query($sql2);
            if($result){
                echo("<p>Checking transaction saved</p>");
            } else {
                echo("<p>Checking transaction could not be saved</p>");
            }
            echo("<br>");

            $new_balance = $balance + $amount;

            $sql = "UPDATE checking SET Balance=$new_balance WHERE `Acct_No`='$Acct_no'";
            $result = $conn->query($sql);

            if($result){
                echo("<p>Deposit successful.</p>");
            } else {
                echo("<p>Error with deposit.</p>");
            }
            $conn->close();
        ?>
    </body>
</html>
