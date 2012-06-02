<?php
	$dir = getcwd();
	$dir = substr($dir , -5);
	if($dir == '\core' or $dir == 'views')
	{
		$dir = '../';
	}elseif($dir == 'ompdf')
	{
		$dir = '../../';
	}else
	{
		$dir = '';
	}
	include("ClassSession.php");
	include($dir."datalayer/QueryManager.php");
?>