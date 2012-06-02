<?php
	$_SESSION['DATA'] = isset($_SESSION['DATA'])? $_SESSION['DATA']:null;
	if(empty($_SESSION['DATA']))
	{
		@session_start();
	}
?>