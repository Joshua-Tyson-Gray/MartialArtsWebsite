<?php

	#龍虎精神 Tiger Dragon Spirit
	#拳法唐手 Law of the Fist, Offensive Hand (Kenpo Karate)
	#拳法 Law of the Fist (Kenpo)
	#魚咢 Fish Entrapment
	#唐手 Offensive Hand (Karate)
//VARIABLES

	//Array for file names
	$fileNames[] = "index.php";
	
	//Page names in Navigation display
	$navMiddle = '';
	
	if(isset($_SESSION['admin'])) $admin = true; else $admin = false;
	
//CODE

	//Checks which page the user is on
	$pageName = basename($_SERVER['PHP_SELF']);
	
	//Gets all files
	$dir = scandir(".");
	
	//Places all files into an array
	foreach($dir as $d)
	{
		//Adds file to array if it is a '.php' file
		if(substr($d, -4) === ".php" && $d !== "index.php") $fileNames[] = $d;
	}
	
	//Opens nav and adds insignias
	$navBeginning = '<nav><a id="tiger-dragon-anchor" href="index.php"><img id="logo" src="img/tiger-dragon.jpg"></a><a href="index.php"><img id="logo" src="img/gator-conley.jpg"></a><h4 id="main-sub-title">The Studio for Kenpo, Jiu Jitsu and Systema</h4><ul>';

		//Cycles through and adds each file name
		foreach ($fileNames as $fileName)
		{
			//If current active page is this file, set class name to active
			if($pageName === $fileName) $class ='class="active" '; else $class='';
			
			if($fileName === 'index.php') //If the file name is the home page
			{
				//Sets Home title
				$navText = "Home";
				
				//Sets Home location
				$fileName = ".";
			}else //Removes '-' from file names, Capitalizes, and removes '.php'
			{
				//Array for file name words
				$exN = [];
				
				//Breaks words in file name up
				$explodedName = explode('-', $fileName);
				
				//Capitalizes each word in the file name
				foreach($explodedName as $fn) $exN[] = ucfirst($fn);
				
				//Puts all words into one string
				$displayName = implode(" ", $exN);
				
				//Cuts off '.php'
				$navText = substr($displayName, 0, -4);
			}
			
			//Adds file to navigation
			$navMiddle .= '<li><a '.$class.'href="'.$fileName.'">'.$navText.'</a><div class="hover-underline"></div></li>';
		}

	
	//Closes nav and adds tags for styling for the bottom border
	$navEnd = '</ul></nav><div id="stripes"><div id="stripe-five"><div id="stripe-six"><div id="stripe-seven"></div></div></div></div>';
	
	//Combines to create full nav
	$nav = $navBeginning.$navMiddle.$navEnd;
	
	//Displays nav
	echo $nav;