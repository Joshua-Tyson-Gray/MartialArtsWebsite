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
	
	function getTechniques($b, $c)
	{
		//MAKE DATABASE CONNECTION
		$conn = new mysqli(HOST, USER, PASS, DB);
		if($conn->connect_error) die("Connection Failed. Error ".$conn->connect_errno);
		
		//CREATE DATABASE QUERY
		$sql = 'SELECT name FROM techniques WHERE belt = "'.$b.'" AND catagory = "'.$c.'";';
		
		//RUN DATABASE QUERY
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		$results = $stmnt->get_result();
		
		//Loop through data
		$techs = array();
		while($row = $results->fetch_assoc())
		{
			$addTech = true;
			if(isset($techs))
			{
				foreach($techs as $tech)
				{
					if($row['name'] == $tech)
					{
						$addTech = false;
					}
				}
				if($addTech)
				{
					array_push($techs, $row['name']);
				}
			}
		}
		
		//CLOSE CONNECTION
		$conn->close();
		$stmnt->close();
		return $techs;
	}
	
	
	
	function getTechniquesByBelt($belt)
	{
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
		$techniques = array();
		while($row = $results->fetch_assoc())
		{
			$t['catagory'] = $row['catagory'];
			$t['name'] = $row['name'];
			$t['description'] = $row['description'];
			array_push($techniques, $t);
		}
		
		//CLOSE CONNECTION TO DATABASE
		$conn->close();
		$stmnt->close();
		return $techniques;
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