<!DOCTYPE html>

<?php
	$serverName = "localhost";
	$username = "root";
	$password = "";
	$dbName = "yearbook";
	
	$connection = new mysqli($serverName, $username, $password);
	$connection->select_db($dbName);
    
    $receiver = $_GET["yb"];
    
    $request = "SELECT name FROM users WHERE email='" . $receiver . "'";
    $nameResult = $connection->query($request);
    $userName = mysqli_fetch_assoc($nameResult);
    
    if ($userName["name"] != "") {
?>

<html>
	<head>
		<title>Sign <?php echo $userName["name"]; ?>'s Yearbook</title>
        <link rel="stylesheet" type="text/css" href="/res/stylesheet.css">
        <link rel="icon" type="image/png" href="/res/icon.png">
        <script>
            function textCounter( field, countfield, maxlimit ) {
                if ( field.value.length > maxlimit ) {
                    field.value = field.value.substring( 0, maxlimit );
                    field.blur();
                    field.focus();
                    return false;
                } else {
                    countfield.value = maxlimit - field.value.length;
                }
            }
        </script>
	</head>
	<body>
        <div id="entry-form">
            <form action="submit.php" method="post" autocomplete="none">
                <input name="receiver" type="hidden" value="<?php echo $receiver; ?>" >
                <i>You are signing <b><?php echo $userName["name"]; ?></b>'s yearbook.</i>
                <br><br><br>
                Your Name
                <br><br>
                <input name="sender" id="entry-form-sender" required>
                <br><br>
                Message
                <br><br>
                <textarea onblur="textCounter(this,this.form.counter,2000);" onkeyup="textCounter(this,this.form.counter,2000);" name="message" id="message-field" maxlength=2000 required></textarea>
                <br>
                <input onblur="textCounter(this.form.recipients,this,2000);" disabled  onfocus="this.blur();" tabindex="999" maxlength="3" size="3" value="2000" name="counter" style="width: 30px; text-align: center;">
                characters remaining.
                <br><br><br>
                <input type="submit" value="Sign!">
            </form>
        </div>
	</body>
</html>
<?php 
    } else {
        echo "The page you are looking for does not exist";
    }
?>