<?php
	session_start();
	include_once("includes/db.php");
	
	if(isset($_POST['access-code'])) $enteredCode = $_POST['access-code']; else $enteredCode = '';
	if($enteredCode == 'Gator Conley')
	{
		$_SESSION['authenticated'] = true;
		$_SESSION['admin'] = 'admin';
	}
	
	$techAdded = false;
	
	if(isset($_POST['belt'])) $belt = $_POST['belt']; else $belt = '';
	if(isset($_POST['catagory'])) $catagory = $_POST['catagory']; else $catagory = '';
	if(isset($_POST['technique'])) $technique = $_POST['technique']; else $technique = '';
	if(isset($_POST['description'])) $description = $_POST['description']; else $description = '';
	
	if($belt && $catagory && $technique)
	{
		if($description) addTechniqueWithDescription($belt, $catagory, $technique, $description);
		else addTechnique($belt, $catagory, $technique);
		$techAdded = true;
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Draper Kenpo and Martial Arts</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script defer src="../js/script.js"></script>
	</head>
	
	<body>
		<?php
			include_once("includes/nav.php");
			if(isset($_SESSION['authenticated'])) echo"<h1>Draper Kenpo Admin<div class='underline'></div></h1>";
			else echo"
				<form method='post'>
					<h1>Sign In<div class='underline'></div></h1>
					<input name='access-code' type='password' placeholder='Access Code'>
					<input type='submit'>
				</form>";
		?>
	</body>
</html>