<?php
	session_start();
	include_once("includes/db.php");
	
	$techAdded = false;
	
	if(isset($_POST['belt'])) $belt = $_POST['belt']; else $belt = '';
	if(isset($_POST['catagory'])) $catagory = $_POST['catagory']; else $catagory = '';
	if(isset($_POST['technique'])) $technique = $_POST['technique']; else $technique = '';
	if(isset($_POST['description'])) $description = $_POST['description']; else $description = '';
	if(isset($_POST['technique-submitted'])) $showConfirm = true; else $showConfirm = false;
	
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
			if(!$techAdded)
			{
				#echo "
				#<h1>Add Technique<div class='underline'></div></h1>
				#	<form id='add-tech' method='post'>
				#		<input name='belt' placeholder='Belt'>
				#		<input name='catagory' placeholder='Catagory'>
				#		<input name='technique' placeholder='Technique Name'>
				#		<input type='submit' value='Add to Database'>
				#	</form>
				#";
				echo "
				<h1>Add Technique<div class='underline'></div></h1>
					<form id='add-tech' method='post'>
						<select name='belt'>
							<option selected disabled>Select a Rank</option>
							<option value='Orange'>Orange</option>
							<option value='Purple'>Purple</option>
							<option value='Blue'>Blue</option>
							<option value='Green'>Green</option>
							<option value='Brown'>Brown</option>
							<option value='Black'>Black</option>
						</select>
						<select name='catagory'>
							<option selected disabled>Select a Stance</option>
							<option value='Stance'>Stance</option>
							<option value='Block'>Block</option>
							<option value='Kick'>Kick</option>
							<option value='Punch Technique'>Punch Technique</option>
							<option value='Grab Technique'>Grab Technique</option>
							<option value='Kata'>Kata</option>
							<option value='Weapons'>Weapons</option>
						</select>
						<input name='technique' placeholder='Technique Name'>
						<input name='technique-submitted' value='true' type='hidden'>
						<input type='submit' value='Add to Database'>
					</form>
				";
			}
			else
			{
				echo "
					<p>Technique Added</p>
					<a href='admin.php'><button>Add Another</button></a>
				";
			}
		?>
	</body>
</html>