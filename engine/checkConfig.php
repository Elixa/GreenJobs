<?php
	require_once('utils/Utils.php');
	require_once('models/StandarModel.php');
	//var_dump($Connect::$status);
	
	$StandarModel = new StandarModel;
	if(!$StandarModel -> testConnection())
	{
		include('views/install.php');
	}else
	{
		$Utils = new Utils;
		//Verifica que existe algun user
		if( $Utils -> verifyUsers() )
		{
			require_once('engine/session.php');
			$_SESSION['data'] = isset($_SESSION['data'])? $_SESSION['data']:null;
			if($_SESSION['data'])
			{
				include('views/home.php');
			}else
			{
				if(@$_GET['option'] == "singIn")
				{
					var_dump($StandarModel -> testConnection());
					include('views/userForm.php');
				}else
				{
					include('views/loginForm.php');
				}				
			}
		}else
		{
			//Formulario para la creacion de usuario administrador
			include('views/userForm.php');
		}
	}  
	
	//include('views/home.php');
