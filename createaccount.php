<html lang="en-US">
    <head>
        <title>ABC Bank - Registration</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="description" content="A mock bank website made for CSE 5720."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">        
        <link rel="Shortcut Icon" href="image/favicon.ico" type="image/favicon">
        <link rel="stylesheet" href="style.css"/>
    </head>

    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
        </ul>
    </nav>

    <body>
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

            // get the variables from the URL request string
            $userid = $_REQUEST['userid'];
            $pssword = $_REQUEST['pssword'];
            $lastname = $_REQUEST['lastname'];
            $firstname = $_REQUEST['firstname'];
            $address = $_REQUEST['address'];
            $phone = $_REQUEST['phone'];
            $email = $_REQUEST['email'];
            $Testquestion = $_REQUEST['Testquestion'];
            $Testanswer = $_REQUEST['Testanswer'];
            $usertype = $_REQUEST['usertype'];

            $sql = "INSERT INTO login_tbl (userid, pssword, lastname, firstname, address, phone, email, Testquestion, Testanswer, usertype)
            VALUES ('$userid', '$pssword', '$lastname', '$firstname', '$address', '$phone', '$email', '$Testquestion', '$Testanswer', '$usertype')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Registration complete! <a href=\"login.php\">Log in here.</a></p>";
            } else {
                echo "<p>Error with registration.".$sql."<br>".$conn->error."</p>";
            }

            $conn->close();
        ?>
    </body>
</html>
