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
	
	function getBeltReqs()
	{
		//CONNECT TO DATABASE
		$conn = new mysqli(HOST, USER, PASS, DB);
		if($conn->connect_error) die("Connection failed. Error ".$conn->connect_errno);
		
		//CREATE DB QUERY
		$sql = "SELECT * FROM techniques;";
		
		//EXECUTE DB QUERY
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		$results = $stmnt->get_result();
		
		//Loop through data
		$beltReqs = array();
		while($row = $results->fetch_assoc())
		{
			$t['belt'] = $row['belt'];
			$t['catagory'] = $row['catagory'];
			$t['name'] = $row['name'];
			array_push($beltReqs, $t);
		}
		
		//CLOSE DB CONNECTION
		$conn->close();
		$stmnt->close();
		return $beltReqs;
	}
	
	function addTechnique($belt, $catagory, $name)
	{
		//CONNECT TO DATABASE
		$conn = new mysqli(HOST, USER, PASS, DB);
		if($conn->connect_error) die("Connection Failed. Error ".$conn->connect_errno);
		
		//CREATE DB QUERY
		$sql = "INSERT INTO techniques(belt, catagory, name) VALUES('$belt', '$catagory', '$name');";
		
		//RUN DB QUERY
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		
		//CLOSE DB CONNECTION
		$conn->close();
		$stmnt->close();
	}
	
	function addTechniqueWithDescription($belt, $catagory, $name, $description)
	{
		//CONNECT TO DATABASE
		$conn = new mysqli(HOST, USER, PASS, DB);
		if($conn->connect_error) die("Connection Failed. Error ".$conn->connect_errno);
		
		//CREATE DB QUERY
		$sql = "INSERT INTO techniques(belt, catagory, name, description) VALUES('$belt', '$catagory', '$name', '$description');";
		
		//RUN DB QUERY
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		
		//CLOSE DB CONNECTION
		$conn->close();
		$stmnt->close();
	}
	
	function addTechniqueDescription($id, $d)
	{
		//CONNECT TO DATABASE
		$conn = new mysqli(HOST, USER, PASS, DB);
		if($conn->connect_error) die("Connection Failed. Error ".$conn->connect_errno);
		
		//CREATE DB QUERY
		$sql = "UPDATE techniques SET description ='$d' WHERE id = $id";
		
		//RUN DB QUERY
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		
		//CLOSE DB CONNECTION
		$conn->close();
		$stmnt->close();
	}
	
	function getTechniqueId($name)
	{
		//CONNECT TO DATABASE
		$conn = new mysqli(HOST, USER, PASS, DB);
		if($conn->connect_error) die("Connection Failed. Error ".$conn->connect_errno);
		
		//CREATE DATABASE QUERY
		$sql = "SELECT id FROM techniques WHERE name = '$name';";
		
		//RUN DB QUERY
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		$results = $stmnt->get_result();
		
		//GET DATA
		$row = $results->fetch_assoc();
		
		//CLOSE CONNECTION TO DATABASE
		$conn->close();
		$stmnt->close();
		
		if(isset($row['id'])) return $row['id'];
		else return null;
	}
	
	function getTechnique($id)
	{
		//CONNECT TO DATABASE
		$conn = new mysqli(HOST, USER, PASS, DB);
		if($conn->connect_error) die("Connection Failed. Error ".$conn->connect_errno);
		
		//CREATE DATABASE QUERY
		$sql = "SELECT * FROM products WHERE id = $id";
		
		//RUN DB QUERY
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		$results = $stmnt->get_result();
		
		//GET DATA
		$row = $results->fetch_assoc();
		
		//CLOSE CONNECTION TO DATABASE
		$conn->close();
		$stmnt->close();
		return $row;
	}
?>