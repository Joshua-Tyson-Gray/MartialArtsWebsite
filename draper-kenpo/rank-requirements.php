<?php
	session_start();
	include_once("includes/db.php");
	
	function getTechniqueWindow()
	{
		//Gets Belt Requirement Database
		$reqs = getBeltReqs();
		
		//Gets Belt Ranks
		$belts = array();
		
		//Gets a list of all existing belts
		foreach($reqs as $r)
		{
			$addBelt = true;
			//Iterates through to determine if the current belt has already been added to the list
			if(!empty($belts)) foreach($belts as $belt) if($r['belt'] == $belt) $addBelt = false;
			
			//Adds the belt to the list if applicable
			if($addBelt) array_push($belts, $r['belt']);
		}
		
		//Begins Display
		$display = "<div id='technique-window'>
									<div id='tech-win-title'>Ranks</div>
		";
		
		//Iterates through each belt/rank
		foreach($belts as $belt)
		{
			$display .= "
				<div class='rank'>
					<p id='".strtolower($belt)."'class='rank-title'>$belt Belt</p>	
					<div hidden id='".strtolower($belt)."-catagory' class='catagory'>
			";
			
			//Gets a list of all catagories according to the current belt
			$catagories = array();
			foreach($reqs as $r)
			{
				$addCat = true;
				foreach($catagories as $c) if($r['catagory'] == $c) $addCat = false;
				if($addCat && $r['belt'] == $belt) array_push($catagories, $r['catagory']);
			}
			
			//Add each catagory coresponding to each belt
			foreach($catagories as $catagory)
			{
				$display .= "
						<p id='".strtolower($belt)."-".strtolower($catagory)."' class='catagory-title'>".$catagory.($catagory == "Weapons" ? "" : "s")."</p>
						
						<div hidden id='".strtolower($belt)."-".strtolower($catagory)."-technique' class='technique'>
				";
				
				//Gets a list of techniques for each catagory of each belt
				$techniques = array();
				foreach($reqs as $r)
				{
					$addTech = true;
					foreach($techniques as $t) if($r['name'] == $t) $addTech = false;
					if($addTech && $r['belt'] == $belt && $r['catagory'] == $catagory) array_push($techniques, $r['name']);
				}
				
				//Adds each technique corresponding to each catagory of each belt
				foreach($techniques as $tech)
				{
					$display .= "
							<p id='$tech' class='technique-title'>$tech</p>
					";
				}
				$display .= "
						</div>
				";
			}
			$display .= "
					</div>
				</div>
			";
		}
		$display .= "</div>";
		return $display;
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Draper Kenpo and Martial Arts</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script defer src="js/script.js"></script>
	</head>
	
	<body>
		<?php
			include_once("includes/nav.php");
			echo "<h1>Rank Requirements<div class='underline'></div></h1>";
			echo "
					<blockquote class='sub-heading-quote'>I come to you with only Karate, my empty hands, I have no weapons, but should I be forced to defend myself, my principles, or my honor, should it be a matter of life or death, of right or wrong: then here are my weapons, Karate, my empty hands.</blockquote>
			";
			echo "
					<div id='technique-main'>
			";
			echo getTechniqueWindow();
			echo "
						<div id='main-description'>
							<img src='img/kenpo-crest.jpg'>
						</div>
					</div>
			";
			
			include_once("includes/footer.php");
		?>
	</body>
</html>