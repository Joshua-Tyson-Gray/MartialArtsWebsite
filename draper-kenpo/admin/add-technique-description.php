<?php
	session_start();
	include_once("includes/db.php");
	
	$desUpdated = false;
	$techFound = true;
	
	if(isset($_POST['technique'])) $technique = $_POST['technique']; else $technique = '';
	if(isset($_POST['description'])) $description = $_POST['description']; else $description = '';
	
	if($technique && $description)
	{
		$techId = getTechniqueId($technique);
		if(!empty($techId))
		{
			addTechniqueDescription($techId, $description);
			$desUpdated = true;
		}
		else
		{
			$techFound = false;
		}
		#if($description) addTechniqueWithDescription($belt, $catagory, $technique, $description);
		#else addTechnique($belt, $catagory, $technique);
		#$techAdded = true;
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
			if(!$desUpdated)
			{
				echo "
				<h1>Update Technique Description<div class='underline'></div></h1>";
				echo $techFound ? "" : "<p>Technique not found</p>";
				echo "
				<form id='add-tech-des' method='post'>
					<input name='technique' placeholder='Technique Name'".($techFound? "" : " value='$technique' ").">
					<textarea id='technique-textbox' name='description' placeholder='Technique Description'>".($techFound? "" : "$description")."</textarea>
					<input type='submit' value='Update Description'>
				</form>
				
				<aside>
					<p>This is a test!!!</p>
				</aside>
				";
			}
			else
			{
				echo "
					<p>Description Updated</p>
					<a href='add-technique-description.php'><button>Update Another</button></a>
				";
			}
			
		?>
	</body>
</html>