<html lang="en-US">
    <head>
        <title>Account Registered!</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="description" content="A mock bank website made for CSE 5720."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
        <link rel="Shortcut Icon" href="../image/favicon.ico" type="image/favicon">
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
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            } 


            $userid = $_REQUEST['Username'];
            $password = $_REQUEST['Password'];
            $hashword = password_hash($password, PASSWORD_DEFAULT);

            $branchID = $_REQUEST['BranchID'];
            $firstname = $_REQUEST['FirstName'];
            $lastname = $_REQUEST['LastName'];
            $dob = $_REQUEST['DOB'];
            $phone = $_REQUEST['Phone'];
            $email = $_REQUEST['Email'];
            $address = $_REQUEST['Address'];
            $bloodtype = $_REQUEST['BloodType'];

            $sql = "INSERT INTO customer (BranchID, Username, Pass, FirstName, LastName, DOB, Phone, Email, Address, BloodType)
            VALUES ('$branchID', '$userid', '$hashword', '$firstname', '$lastname', '$dob', '$phone', '$email', '$address', '$bloodtype')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Registration complete! <a href=\"login.php\">Log in here.</a></p>";
            } else {
                echo "<p>Error with registration.".$sql."<br>".$conn->error."</p>";
            }

            $conn->close();
        ?>
    </body>
</html>
