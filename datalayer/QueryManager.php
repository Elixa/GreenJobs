<?php
	//Ubicacion del puntero actual (en caso de usar AJAX)
	$dir = getcwd();$dir = substr($dir , -5);if($dir == '\core'){$dir = '../';}elseif($dir == 'ompdf'){$dir = '../../';}else{$dir = '';}
	
	require_once('Connect.php');
	require_once($dir.'config/config.php');
	
	class QueryManager
	{
		private $query;		
		private static $Connect;		
			
		public function __construct()
		{
			self::$Connect = Connect::getInstance(DB_NAME, DB_HOST, DB_USER, DB_PASS);
			$this -> query = isset($this -> query)? $this -> query:null;
		}	
		
		// Retorna una conexion
		public function _getConnection()
		{
			return self::$Connect -> getConnection();
		}

		// public function validateLogin($user, $pass)
		// {
			// $this -> query = mysql_query("SELECT * FROM users WHERE name = '$user' and pass = '$pass' ");
			// return $this -> query;
		// }
		
		public function _select($table, $whereKey, $whereValue, $order = 'asc', $rule = '')
		{
			//Entra en caso de que se quieran comparar dos valores
			if(is_array($whereKey) and is_array($whereValue))
			{
				$this -> query = mysql_query("SELECT * FROM ".$table." WHERE ".$whereKey[0]." = '$whereValue[0]' AND ".$whereKey[1]." = '$whereValue[1]' AND ".$whereKey[2]." = '$whereValue[2]'");
			}
			//Cuando se limita la busqueda (paginacion)
			elseif(is_array($rule))			
			{
				$this -> query = mysql_query("SELECT * FROM ".$table." ORDER BY id_".$table." desc LIMIT ".$rule['start'].",".$rule['end']);			
			}
			//Cuando un campo pueda ser igual a dos valores
			elseif(!empty($whereKey) and is_array($whereValue))
			{
				//echo "SELECT * FROM ".$table." WHERE ".$whereKey." = '$whereValue[0]' OR ".$whereKey." = '$whereValue[1]'";
				$this -> query = mysql_query("SELECT * FROM ".$table." WHERE ".$whereKey." = '$whereValue[0]' OR ".$whereKey." = '$whereValue[1]'");
			}
			//Seleccion normal con condicion
			elseif(!empty($whereKey) and !empty($whereValue))
			{
				//echo "SELECT * FROM ".$table." WHERE ".$whereKey." = '$whereValue' ORDER BY id_".$table." $order";
				$this -> query = mysql_query("SELECT * FROM ".$table." WHERE ".$whereKey." = '$whereValue' ORDER BY id_".$table." ".$order."");
			}
			//Seleccion sin condicion
			else
			{	
				$this -> query = mysql_query("SELECT * FROM ".$table." ORDER BY id_".$table." $order");
			}	
			return $this -> query;		
		}
		
		//Seleccion para busqueda
		public function _selectLike($table, $column, $value)
		{
			//echo "SELECT * FROM ".$table." WHERE ".$column." LIKE '%".$value."%'";
			$this -> query = mysql_query("SELECT * FROM ".$table." WHERE ".$column." LIKE '%".$value."%'");
			return $this -> query;
		}
		
		//Seleccion para foreing keys
		public function _selectJoin($pkTable, $fkTable, $parameter, $value)
		{
			$this -> query = mysql_query("SELECT * FROM ".$pkTable.", ".$fkTable." WHERE ".$fkTable.".".$parameter." = '".$value."' AND ".$fkTable.".id_".$pkTable." = ".$pkTable.".id_".$pkTable);		
			return $this -> query;	
		}
		
		//Inserta y retorna id_ del insertado
		public function _insert($table, $keys, $values)
		{	
			//echo "INSERT IGNORE INTO ".$table."(".implode(', ', $keys).") VALUES ('".implode("', '", $values)."')";
			$this -> query = mysql_query("INSERT IGNORE INTO ".$table."(".implode(', ', $keys).") VALUES ('".implode("', '", $values)."')");	 
			$this -> query = mysql_insert_id();
			return $this -> query;
		}
		
		//Actualiza
		public function _update($table, $column, $newValue, $whereColunm, $equals)
		{
			//echo "UPDATE ".$table." SET ".$column." = '$newValue' WHERE ".$whereColunm." = '$equals'";
			$this -> query = mysql_query("UPDATE ".$table." SET ".$column." = '$newValue' WHERE ".$whereColunm." = '$equals'");
			return $this -> query;
		}
		
		//Borra
		public function _delete($table, $array)
		{
			$this -> query = mysql_query("DELETE FROM ".$table." WHERE id_".$table." IN (".implode(',',$array).")");
			return $this -> query;
		}
		
		//Retorna los nombres de las columnas de la tabla
		public function _getColumnsNames($table)
		{
			$i = 0;
			$this -> query = mysql_query("SHOW COLUMNS FROM ".$table);
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
		
	}