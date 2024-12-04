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

            $type = $_REQUEST["transtype"];
            $Acct_no = $_REQUEST["Acct_no"];
            $body = "<p>Error; transaction type invalid.</p>";

            if($type == 'deposit')
            {
                $body =
                "
                <form name=\"deposit\" method=\"post\" action=\"depositSA.php\">
                    <label name=\"amount\">Amount to Deposit:</label>
                    <input type=\"number\" name=\"amount\"><br>

                    <button type=\"submit\">Submit</button>
                </form>
                ";
            } 
            else 
            {
                $body = "";
                ?>

                <h2>Interest Calculation</h2>

                <table class="striped">
                    <tr class="header">
                        <td><strong>Month</strong></td>
                        <td><strong>Balance</strong></td>
                
                <?php
                $sql = "SELECT * FROM savings WHERE `Acct_no`='$Acct_no'";
                $result = $conn->query($sql);
                $temp_balance = 0;
                $balance = 0;
                $interest = 0;

                if($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $balance = $row["balance"];
                    $temp_balance = $balance;
                    $interest = $row["interest_rate"];
                }

                for($i = 0; $i < 12; $i = $i + 1)
                {
                    $temp_balance = $temp_balance * $interest;
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$temp_balance."<td>";
                    echo "</tr>";
                }
            }

            echo($body);
            echo("<input type=\"hidden\" name=\"Acct_no\" value=$Acct_no");
            $conn->close();
        ?>
    </body>
</html>
