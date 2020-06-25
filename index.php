<!-- Landing page -->

<!DOCTYPE html>

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
		<title>SignMyYearbook</title>
        <link rel="stylesheet" type="text/css" href="/res/stylesheet.css">
        <link rel="icon" type="image/png" href="/res/icon.png">
	</head>
	<body>
		<p id="landing-p"><b>Welcome to </b><i>SignMyYearbook.tk</i></p>
        <p id="landing-d">This tool is created by <b>Benson Shen</b></p>
        <p id="landing-e"><b>Access the website with the links proivided to you</b></p>
        <p id="reg-link">or&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="/register">Register Here</a></b></p>
	</body>
</html>