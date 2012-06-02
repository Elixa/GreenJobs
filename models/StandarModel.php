<?php
	//@imports
	require_once('mainModel.php');
	require_once('GeneralModel.php');
	
	class StandarModel
	{
		private $QueryManager;
		private $query;
		
		public function __construct()
		{
			$this -> QueryManager = new QueryManager;
		}
		
		//Retorna los nombres de las columnas de una tabla
		public function getColumnsNames($table)
		{
			$i = 0;
			$this -> query = $this -> QueryManager -> _getColumnsNames($table);
			while($columns = mysql_fetch_assoc($this -> query))
			{
				$keys[$i] = $columns['Field'];
				$i++;
			}
			mysql_free_result($this -> query);
			//Elimina posicion [0] = IDs (auto increments) para retornar columnsNames
			unset($keys[0]);
			$keys = array_values($keys);
			return $keys;
		}
		
		//Verifica si existe connection
		public function testConnection()
		{
			if(!@mysql_ping($this -> QueryManager -> _getConnection()))
				return false;
			return true;	
		}	
		
		//Retorna conexion
		public function getConnection()
		{
			return 	$this -> QueryManager -> _getConnection();
		}
	}
?>