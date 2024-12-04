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

            $Acct_no = $_REQUEST["Acct_no"];
            
            $sql = "DELETE FROM checking WHERE Acct_no=$Acct_no";
            $result = $conn->query($sql);

            if($result){
                echo("<p>Account removed.</p>");
            } else {
                echo("<p>Error removing account.</p>");
            }
            $conn->close();
        ?>
    </body>
</html>
