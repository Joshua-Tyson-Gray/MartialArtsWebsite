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
	
	$belt = $_GET['belt'];

	//CONNECT TO DATABASE
	$conn = new mysqli(HOST, USER, PASS, DB);
	if($conn->connect_error) die("Connection Failed. Error ".$conn->connect_errno);
	
	//CREATE DATABASE QUERY
	$sql = "SELECT * FROM techniques WHERE belt = '$belt';";
	
	//RUN DATABASE QUERY
	$stmnt = $conn->prepare($sql);
	$stmnt->execute();
	$results = $stmnt->get_result();
	
	//LOOP THROUGH DATA
	#$techniques = array();
	#while($row = $results->fetch_assoc())
	#{
	#	$t['catagory'] = $row['catagory'];
	#	$t['name'] = $row['name'];
	#	$t['description'] = $row['description'];
	#	array_push($techniques, $t);
	#}
	
	$techniques = array();
	while($row = $results->fetch_assoc())
	{
		$t['catagory'] = $row['catagory'];
		$t['name'] = $row['name'];
		array_push($techniques, $t);
	}
	
	$display = '';
	foreach($techniques as $t)
	{
		$display .= '
			<div class="technique">'.$t['name'].'</div>
		';
	}
	
	echo $display;
	
	#foreach($techniques as $t)
	#{
	#	echo "<p>Belt: $belt; Type: ".$t['catagory']."; Name: ".$t['name']."; Description: Coming Soon!</p><br>";
	#}
	
	//CLOSE CONNECTION TO DATABASE
	$conn->close();
?>