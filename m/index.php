<!-- Display messages page -->

<!DOCTYPE html>

<?php
	$serverName = "localhost";
	$username = "root";
	$password = "";
	$dbName = "yearbook";
	
	$connection = new mysqli($serverName, $username, $password);
	$connection->select_db($dbName);
    
    $receiver = $_GET["yb"];
    $key = $_GET["key"];
    
    $request = "SELECT name, userKEY FROM users WHERE email='" . $receiver . "'";
    $nameResult = $connection->query($request);
    $userName = mysqli_fetch_assoc($nameResult);
    
    if ($userName["name"] != "" and $key == $userName["userKEY"]) {
?>

<html>
	<head>
		<title><?php echo $userName["name"]; ?>'s Yearbook</title>
        <link rel="stylesheet" type="text/css" href="/res/stylesheet.css">
        <link rel="icon" type="image/png" href="/res/icon.png">
	</head>
	<body>
        <input type="text" id="sign-link" style="width: 1px; position: fixed; margin-left: -10%;" value="http://signmyyearbook.tk/sign/?yb=<?php echo str_replace(' ', '+', $receiver); ?>">    
        <button id="get-sign-link" onclick="getLinkFunction()" title="Send your friends this link for them to sign your yearbook!">Share Link</button>
        <script>
            function getLinkFunction() {
                var copyText = document.getElementById("sign-link");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
                alert("Link copied to clipboard.\nSend your friends this link for them to sign your yearbook!");
            }
        </script>
        <p style="padding-left: 23px; padding-top: 10px; font-size: 20px;"><i><b><?php echo $userName['name']; ?></b>'s Yearbook</i></p>
        <?php
			$sql = "SELECT messageID, receiver, sender, message FROM allmessages WHERE receiver='" . $receiver . "' ORDER BY CHAR_LENGTH(message)";
			if ($result = $connection->query($sql)) {
				while ($entry = mysqli_fetch_assoc($result)) {
                    $message = str_replace("\n", "<br>", $entry["message"]);
                    /*
                    $message = preg_replace("/[\r\n]+/", "\n", $entry["message"]);
                    $message = wordwrap($message,120, '<br>', true);
                    $message = nl2br($message);
                    */
		?>
        <div id="entry">
            <form action="removeMessage.php" method="post" autocomplete="none">
                <input name="messageID" type="hidden" value="<?php echo $entry["messageID"]; ?>" >
                <input name="receiver" type="hidden" value="<?php echo $receiver; ?>" >
                <input name="key" type="hidden" value="<?php echo $key; ?>" >
                <input id="remove-message-button" type="submit" value="×">
            </form>
            <p id="entry-data">
                <b>
                <?php 
                    echo $entry["sender"], "</b><br><br>";
                    echo $message; 
                ?> 
            </p>
        </div>
		<?php
				}
			}
        ?>
        <p style="position:absolute; bottom: 0; right: 20px;"><i>Be sure to save this page (add to <b>bookmarks</b>) for future access!</i></p>
<?php
    } else {
        echo "The page you are looking for does not exist";
    }
		?>
	</body>
</html>