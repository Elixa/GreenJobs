<?php
	//@IMPORTS
	require_once('mainModel.php');
	require_once('GeneralModel.php');
	
	class ModelNOMBRE_DE_LA_TABLA extends GeneralModel
	{
		private $QueryManager;
		
		public function __construct()
		{
			$this -> QueryManager = new QueryManager;
		}

		//@OVERRIDE
		protected function select($table, $whereKey = null, $whereValue = null, $order = null, $rule = null)
		{
			return $this->QueryManager->_select($table, $whereKey, $whereValue, $order, $rule);
		}

		//@OVERRIDE
		protected function selectLike($table, $column, $value)
		{
			return $this->QueryManager->_selectLike($table, $column, $value);
		}

		//@OVERRIDE
		protected function selectJoin($pkTable, $fkTable, $parameter, $value)
		{
			return $this->QueryManager->_selectJoin($pkTable, $fkTable, $parameter, $value);
		}
		
		//@OVERRIDE
		protected function insert($table, $keys, $values)
		{
			return $this->QueryManager->_insert($table, $keys, $values);
		}

		//@OVERRIDE		
		protected function update($table, $column, $newValue, $whereColunm, $equals)
		{
			return $this->QueryManager->_update($table, $column, $newValue, $whereColunm, $equals);
		}
		
		//@OVERRIDE		
		protected function delete($table, $idArray)
		{
			return $this->QueryManager->_delete($table, $array);
		}
		
		//@OVERRIDE		
		protected function cleaner($string)
		{
			return mysql_real_escape_string($string);
		}
		
		//@OVERRIDE		
		protected function getEntity()
		{
			return str_replace('model', '', strtolower(get_class($this)));
		}
		
		//@OVERRIDE		
		protected function getKeys()
		{
			return $this->QueryManager->_getColumnsNames($this -> getEntity());
		}	
		
		// PUBLIC API FUNCTIONS
		// ====================		
		//Inserta elementos
		public function insertData($values)
		{
			foreach($values as $value)
			{
				$newValues[] =  $this -> cleaner($value);
			}
			if( self::insert($this -> getEntity(), $this -> getKeys(), $newValues) )
				return true;
			return false;			
		}		

		//Modifica un elemento
		public function updateData($values, $id)
		{
			$keys = self::getKeys();
			$pass = 0;
			foreach($values as $value)
			{
				$newValues[] =  self::cleaner($value);
			}
			for($i = 0; $i < count($keys); $i++)
			{
				if( self::update($this -> getEntity(), $keys[$i], $newValues[$i], 'id_agents', $id) )
					$pass++;
			}	
			if($pass == count($keys))
				return true;
			return false;	
		}
		
		//Selecciona todos los elementos
		public function getData()
		{
			return self::select($this -> getEntity());
		}

		//Retorna el elemento por id
		public function getAgentById($id)
		{
			$id = self::cleaner($id);
			return self::select($this -> getEntity(), 'id_'.$this -> getEntity(), $id);
		}
		
		//Elimina elementos
		public function deleteData($idArray)
		{
			if(self::delete($this -> getEntity(), $idArray))
				return true;
			return false;	
		}
		
		
		
	}
?>