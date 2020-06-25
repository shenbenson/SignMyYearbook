<!DOCTYPE html>

<?php
	$serverName = "localhost";
	$username = "root";
	$password = "";
	$dbName = "yearbook";
	
	$connection = new mysqli($serverName, $username, $password);
	$connection->select_db($dbName);
	
	$messageID = $_POST["messageID"];
    $link = $_POST["receiver"];
    $key = $_POST["key"];
	
	$removeEntry = "DELETE FROM allMessages WHERE messageID='" . $messageID . "'";
	$result = mysqli_query($connection, $removeEntry);
	
	if (empty($result)) {
		echo "Whoops, something went wrong!";
	} else {
		echo "Success! You've removed the message.";
	}
    
    $ex = $link . "&key=" . $key;
?>

<html>
	<head>
		<title>The message has been removed.</title>
        <link rel="icon" type="image/png" href="/res/icon.png">
	</head>
    <body>
        <input id="link" type="hidden" value="<?php echo $ex; ?>">
        <script>
            var link = document.getElementById('link').value;
            link = link.replace(" ", "+");
            console.log(link);
            window.setTimeout(function(){
                window.location.href = "/m/?yb=" + link;
            }, 750);
        </script>
</html>