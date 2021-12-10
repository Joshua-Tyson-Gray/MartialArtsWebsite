<?php
	session_start();
	include_once("includes/db.php");
	session_destroy();
	header('location:.');
?>