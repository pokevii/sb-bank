<html lang="en-US">
    <head>
        <title>ABC Bank - Registration</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="author" content="Joshua Grizzell"/>
        <meta name="description" content="A mock bank website made for CSE 4550."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">        <link rel="Shortcut Icon" href="image/favicon.ico" type="image/favicon">
        <link rel="stylesheet" href="style.css"/>
    </head>

    <body>
        <nav>
            <ul>
                <li><a href="index.html">Home</span></li>
                <li><a href="savings/savings.html">Savings</a></li>
                <li><a href="checking/checking.html">Checking</a></li>
                <li><a href="investment/investment.html">Investment</a></li>
            </ul>
        </nav>
        <?php
            ob_start();
            $session = session_start();
            if($session){
                echo("Session started, hopefully everything works out.<br>");
            } else {
                echo("Something went wrong. Session could not be started. Login information will not be saved.");
            }

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

            $userid = $_REQUEST['userid'];
            $pssword = $_REQUEST['pssword'];

            //i know its bad to store plaintext passwords but we're just goofin here
            $sql = "SELECT * FROM login_tbl WHERE userid = '$userid' AND pssword = '$pssword'";
            
            $result = $conn->query($sql);

            if($result->num_rows === 1){
                $results1 = $result->fetch_object();

                $_SESSION["logged_in"] = true;
                $_SESSION["userid"] = $userid;
                $_SESSION["pssword"] = $pssword;
                $_SESSION["firstname"] = $results1->firstname;
                $_SESSION["lastname"] = $results1->lastname;

                $firstname = $results1->firstname;

                echo("<p>Log in successful! Welcome back, $firstname. Use the navigation menu to view your accounts.</p>");
            } else {
                echo("<p>Error trying to log in as '$userid'. Please try logging in again <a href=login.html>here.</a><br>".
                    $result->num_rows." rows found.");
            }
        ?>
    </body>
</html>
