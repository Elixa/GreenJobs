<?php
	class db_mysql
	{
		var $link;
		var $db;
		
		function conectar($bd, $host, $user, $pass)
		{
			$this -> link = mysql_connect($host, $user, $pass);
			$this -> db = @mysql_select_db($bd, $this -> link);
			if($this -> db)
			{
				return $this -> link;
			}else
			{
				return false;
			}
		}	
	}

?>