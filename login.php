<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>SB Bank - Login</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>
        <meta name="description" content="A mock bank website made for CSE 5720."/>
        
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css"/>
    </head>

    <nav>
        <ul>
            <li><span><a href=index.html>Home</a></span></li>
            <li><span><a href=accounts.php>Accounts</a></span></li>
        </ul>
    </nav>

    <body>
        <?php
            ini_set('session.gc_maxlifetime', 3600);
            session_set_cookie_params(3600);
            $session = session_start();
            if(!$session){
                echo("Something went wrong. Session could not be started. Login information will not be saved.<br>");
            }

            $servername = "localhost";
            $username = "testacc";
            $password = "cse5720";
            $dbname = "sbbank";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            //get input username and password
            $username = $_REQUEST['userid'];
            $password = $_REQUEST['pass'];

            //get encrypted password from database and verify it
            $sql = "SELECT Pass FROM customer WHERE Username = '$username'";
            $result = $conn->query($sql);
            $hashword = $result->fetch_assoc()["Pass"];

            //get customer info if password is correct
            if(password_verify($password, $hashword)){
                $sql = "SELECT * FROM customer WHERE Username = '$username'";
                $result = $conn->query($sql);
                $info = $result->fetch_assoc();

                $_SESSION["logged_in"] = true;
                $_SESSION["Username"] = $username;
                $_SESSION["FirstName"] = $info["FirstName"];
                $_SESSION["LastName"] = $info["LastName"];
                $_SESSION["CustomerID"] = $info["CustomerID"];

                $firstname = $_SESSION["FirstName"];

                echo("<p>Log in successful! Welcome back, $firstname. Use the navigation menu to view your accounts.</p>");
            } else {
                echo("<p>Error trying to log in as '$username'. Please try logging in again <a href=login.html>here.</a><br>".
                    $result->num_rows." rows found.");
            }
        ?>
    </body>
</html>
