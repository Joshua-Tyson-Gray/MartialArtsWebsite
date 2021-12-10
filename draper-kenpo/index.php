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
			<main>
				<img class='main' src='img/black-belts.jpg'>
				<p id='main-text'>Welcome to the premiere martial arts studio in Sandy for learning Kenpo Karate, Jiu Jitsu, and Russian Systema. We are the home to Gators Kenpo Karate We’re located in Sandy Utah, and we serve the Sandy, Draper, Riverton, and South Jordan area with great instructors and classes suited to every level. Come in and train with some great instructors and some great students. For information and specials, fill out the contact form below.</p>
				<div id='contact-form-wrapper'>
					<form id='contact-form' method='post'>
						<input name='name' placeholder='Name'>
						<input name='email' placeholder='Email'>
						<input name='phone' placeholder='Phone Number'>
						<textarea name='message' placeholder='Message (Please include age of student and classes of interest)'></textarea>
						<input type='submit' value='Send'>
					</form>
				</div>
			</main>
			";
			include_once("includes/footer.php");
		?>
	</body>
</html>