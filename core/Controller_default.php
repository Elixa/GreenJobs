<?php
	//@IMPORTS
	require_once("../utils/TransactionStyle.php");

	$TransactionStyle 	= new TransactionStyle;
	
	//Valida que todos los requeridos
	$POST = $_POST;
	foreach($POST as $value)
	{
		if(empty($value))
		{
			$return = array($TransactionStyle -> setTransaction('WARNING', '001'));
			goto end;
		}		
	}
	
	//Valida todos los campos por tipo

	

	end:
	//JSON 
	// print_r($POST);
	$JSON = json_encode($return, JSON_HEX_TAG);
	die($JSON);	