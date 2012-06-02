<?php
	include("manage/ManageContainer.php");
	$_GET['option'] = ISSET($_GET['option'])? $_GET['option']:NULL;
	$_GET['id'] 	= ISSET($_GET['id'])? $_GET['id']:NULL;
	new ManageContainer($_GET['option'], $_GET['id']);
?>