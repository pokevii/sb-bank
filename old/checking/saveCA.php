<html lang="en-US">
    <head>
        <title>ABC Bank - New Checking Account</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="author" content="Joshua Grizzell"/>
        <meta name="description" content="A mock bank website made for CSE 4550."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">        <link rel="Shortcut Icon" href="image/favicon.ico" type="image/favicon">
        <link rel="stylesheet" href="../style.css"/>
    </head>

    <body>
    <nav>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../savings/savings.html">Savings</a></li>
            <li><a href="../checking/checking.html">Checking</a></li>
            <li><a href="../investment/investment.html">Investment</a></li>
        </ul>
    </nav>

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

            // get the variables from the URL request string
            $Acct_no = rand(111111111, 999999999);
            $TRansID = rand(111111111, 999999999);
            $date = date("mm/dd/yyyy");
            $lastname = $_REQUEST['lastname'];
            $firstname = $_REQUEST['firstname'];
            $address = $_REQUEST['address'];
            $phone = $_REQUEST['phone'];
            $email = $_REQUEST['email'];
            $balance = $_REQUEST['balance'];

            $sql = "INSERT INTO checking (Acct_no, lastname, firstname, address, email, phone, balance, date, TRansID)
            VALUES ('$Acct_no', '$lastname', '$firstname', '$address', '$email', '$phone', '$balance', '$date', '$TRansID')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Account created!<br>Account ID: $Acct_no<br>Transaction ID: $TRansID<br></p>";
            } else {
                echo "<p>Error with account creation.".$sql."<br>".$conn->error."</p>";
            }

            $conn->close();
        ?>
    </body>
</html>
