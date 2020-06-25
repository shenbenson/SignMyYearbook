<!DOCTYPE html>

<?php
	$serverName = "localhost";
	$username = "root";
	$password = "";
	$dbName = "yearbook";
	
	$connection = new mysqli($serverName, $username, $password);
	$connection->select_db($dbName);
	
	$name = $_POST["name"];
	$email = strtolower($_POST["email"]);
    $key = rand(10000, 99999);
	
	$name = str_replace("'", "''", $name);
	
	$insertEntry = "INSERT INTO users (name, email, userKEY) VALUES ('$name', '$email', '$key')";
	$result = mysqli_query($connection, $insertEntry);
	
	if (!empty($result)) {
		echo "Success! You will be directed to your yearbook page.";
    
    $link = $email . "&key=" . $key;
?>

<html>
	<head>
		<title>Success!</title>
        <link rel="icon" type="image/png" href="/res/icon.png">
	</head>
    <body>
        <input id="link" type="hidden" value="<?php echo $link; ?>">
        <script>
            var link = document.getElementById('link').value;
            link = link.replace(" ", "+");
            console.log(link);
            window.setTimeout(function(){
                window.location.href = "/m/?yb=" + link;
            }, 2000);
            alert('Save the page for future access! (save to bookmarks)');
        </script>
</html>
<?php
    } else {
        echo "Whoops, something went wrong!";
	}
?>