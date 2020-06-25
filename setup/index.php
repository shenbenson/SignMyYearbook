<!-- Set-up page -->

<?php
	$serverName = "localhost";
	$username = "root";
	$password = "";
	$dbName = "yearbook";
	$success = true;
    
    $pass = "";
    
    if (!empty($_GET)) {
        $pass = $_GET["pass"];
    }

    if ($pass == "") {
        $pass = "whatever";
    }
	
    if ($pass == "Benson.123") {
    	// Create connection
        $connection = new mysqli($serverName, $username, $password);
        
        // Create database	
        $connection->query("CREATE DATABASE $dbName");
        
        // Connect to database
        $connection->select_db($dbName);
        
        $connection->query("
            CREATE TABLE allmessages (
                messageID INT AUTO_INCREMENT,
                receiver VARCHAR(50),
                sender VARCHAR(50),    
                message TEXT(10000),       
                PRIMARY KEY (messageID)
            )"
        );
        
        $connection->query("
            CREATE TABLE users (
                email VARCHAR(50),
                name VARCHAR(50),  
                key VARCHAR(5),
                PRIMARY KEY (email)
            )"
        );
        
        
        echo "Database is set up properly!";
        $connection->close();
    } else {
        echo "incorrect access code.";
    }
?>