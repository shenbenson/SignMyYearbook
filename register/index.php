<?php
	$serverName = "localhost";
	$username = "root";
	$password = "";
	$dbName = "yearbook";
	
	$connection = new mysqli($serverName, $username, $password);
	$connection->select_db($dbName);
?>

<html>
	<head>
		<title>Sign up for your yearbook</title>
        <link rel="stylesheet" type="text/css" href="/res/stylesheet.css">
        <link rel="icon" type="image/png" href="/res/icon.png">
	</head>
	<body>
        <div id="entry-form">
            <form action="submit.php" method="post" autocomplete="none">
                <p style="font-size: 50px; margin-top: 0px; margin-bottom: 40px;">Sign up!</p>
                Your Name
                <br><br>
                <input name="name" id="entry-form-sender" required>
                <br><br>
                Email
                <br><br>
                <input name="email" type="email" id="entry-form-sender" required>
                <br><br><br>
                <input type="submit" value="Get My Yearbook Page">
            </form>
        </div>
	</body>
</html>