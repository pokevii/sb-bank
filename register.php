<?php session_start()?>
<html lang="en-US">
    <head>
        <title>Template Page</title>

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

    <?php
        $servername = "localhost";
        $username = "testacc";
        $password = "cse5720";
        $dbname = "sbbank";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = mysqli_query($conn, "SELECT BranchCity FROM branch");
        $data = $sql->fetch_all(MYSQLI_ASSOC);
        $idcounter = 1;
    ?>

    <body>
        <form name="registration" method="post" action="insertaccount.php">
            <label for="Username">Username: </label>
            <input type="text" name="Username"><br>
            
            <label for="Password">Password: </label>
            <input type="password" name="Password"><br>

            <label for="BranchID">Branch: </label>
            <select name="BranchID" id="BranchID">
                <option value=""></option>
                <?php foreach ($data as $row): ?>
                <option value="<?=htmlspecialchars($idcounter) ?>">
                    <?= htmlspecialchars($row['BranchCity']) ?>
                    <?php $idcounter += 1; ?>
                </option>
                <?php endforeach ?>
            </select><br><br>

            <label for="FirstName">First Name: </label>
            <input type="text" name="FirstName"><br>

            <label for="LastName">Last Name: </label>
            <input type="text" name="LastName"><br>
            
            <label for="DOB">Date of Birth:</label>
            <input type="date" name="DOB"><br>

            <label for="Phone">Phone Number: </label>
            <input type="number" name="Phone"><br>
            
            <label for="Email">Email Address: </label>
            <input type="text" name="Email"><br>

            <label for="Address">Home Address: </label>
            <input type="text" name="Address"><br>

            <label for="BloodType">Blood Type: </label>
            <select name="BloodType" id="BloodType">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="O?">O±</option>
                <option value="spicy">Spicy</option>
                <option value="4">4</option>
            </select><br><br>

            <button type="submit">Submit</button>
        </form>
    </body>
