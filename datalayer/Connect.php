<?php

	class Connect
	{
		private static $instance;
		public static $status;
		
		private function __construct() 
		{}
		public static function getInstance($name, $host, $user, $pass)
		{
			if (!isset(self::$instance)) 
			{
				$nameClass = __CLASS__;
				self::$instance = new $nameClass;
				include("ClassConnect.php");
				$con = new db_mysql;
				self::$status = $con -> conectar($name, $host, $user, $pass);
			}
			return self::$instance;
		}
		
		public static function getConnection()
		{
			return self::$status;
		}
	
	}
?>