<?php
	//DEFINE THE DATABASE
	if($_SERVER['HTTP_HOST'] == 'localhost')
	{
		define('HOST', 'localhost');
		define('USER', 'root');
		define('PASS', '1550');
		define('DB', 'draper_kenpo');
	}
	else
	{
		/*DB connection code omitted for security */
	}
	
	$name = $_GET['name'];

	//CONNECT TO DATABASE
	$conn = new mysqli(HOST, USER, PASS, DB);
	if($conn->connect_error) die("Connection Failed. Error ".$conn->connect_errno);
	
	//CREATE DATABASE QUERY
	$sql = "SELECT description FROM techniques WHERE name = '$name';";
	
	//RUN DATABASE QUERY
	$stmnt = $conn->prepare($sql);
	$stmnt->execute();
	$results = $stmnt->get_result();
	
	$description = $results->fetch_assoc()['description'];
	
	if(isset($description)) echo "<p>$description</p>";
	else echo "<p>Coming Soon!</p>";
	
	//CLOSE CONNECTION TO DATABASE
	$conn->close();
?>