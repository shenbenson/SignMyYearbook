<!DOCTYPE html>

<?php
	$serverName = "localhost";
	$username = "root";
	$password = "";
	$dbName = "yearbook";
	
	$connection = new mysqli($serverName, $username, $password);
	$connection->select_db($dbName);
	
	$receiver = $_POST["receiver"];
	$sender = $_POST["sender"];
	$message = $_POST["message"];
	
    $request = "SELECT name FROM users WHERE email='" . $receiver . "'";
    $nameResult = $connection->query($request);
    $userName = mysqli_fetch_assoc($nameResult);
    
	$sender = str_replace("'", "''", $sender);
	$message = str_replace("'", "''", $message);
	
	$insertEntry = "INSERT INTO allmessages (receiver, sender, message) VALUES ('$receiver', '$sender', '$message')";
	$result = mysqli_query($connection, $insertEntry);
	
	if (empty($result)) {
		echo "Whoops, something went wrong!";
	} else {
		echo "Success! You've signed on ", $userName['name'], "'s yearbook.";
	}
?>

<html>
	<head>
		<title>Success!</title>
        <link rel="icon" type="image/png" href="/res/icon.png">
        <script>
            window.setTimeout(function(){
                window.location.href = "/";
            }, 2000);
        </script>
	</head>
</html>