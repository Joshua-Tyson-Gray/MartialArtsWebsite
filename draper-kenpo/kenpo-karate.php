<?php
	session_start();
	include_once("includes/db.php");
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
			echo "
			<h1>Your Instructors<div class='underline'></div></h1>
			<br>
			<div class='instructor'>
				<div class='instructor-image'>
					<img src='img/gator.jpg'>
				</div>
				<div class='instructor-bio'>
					<h2>Gator Conley</h2>
					<p>Gator Conley is a 7th Degree Black belt in the Kenpo system. He has been training for 34 years, and has trained under some of the best instructors out there. He has a passion for teaching to all ages and abilities. Originally starting Kenpo when he was 16 years old, he has made Kenpo a part of his life, after training for many years with his instructor, Bill Rhinehart, he chose to start teaching on his own, and open his own school. What started as a class once a week in the garage, has now moved on to become the studio that he teaches from today, and is now coming up on its 10th anniversary. He has trained with Tony Martinez Sr., Dave Hebler, A.C. Rainey, Rich Hale, Dave Prosser, Gilbert Velez, Casey Clayton, Sam Elliss, and Bradford Namahoe, just to name a few.</p>
				</div>
			</div>
			
			<div class='instructor'>
				<div class='instructor-image'>
					<img src='img/jim2.jpg'>
				</div>
				<div class='instructor-bio'>
					<h2>Jim Jensen</h2>
					<p>Jim Jensen is  a 5th Degree Black Belt. He began his Kenpo Karate journey with John (Wendell) Warner and Fred De Santo in late 1994 and in 1997 also started studying with Master Bill Rhinehart. \"I received my black belt in April of 2002. Over the years I have also been privileged to train with Grand Master Mike Sandos, Larry Carter, Tommy Rhinehart, Gator Conley, Shea Ennis, Wilson Wong, Vance Cummings, Gigi Doyle and numerous others. It is my sincere hope that I can pass on some of their knowledge.\"</p>
				</div>
			</div>
			";
			
			include_once("includes/footer.php");
		?>
	</body>
</html>