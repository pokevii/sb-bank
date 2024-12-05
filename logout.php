<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>SB Bank - Log Out</title>

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
            session_start();
            if(session_destroy()){
                echo("<p>Log out successful!</p>");
            } else {
                echo("<p>Something went wrong while logging out.</p>");
            }
            
            
        ?>
    </body>
</html>
