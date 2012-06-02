<?php
	abstract class GeneralModel
	{
		abstract protected function select($table,  $whereKey = null, $whereValue = null, $order = null, $rule = null);
		abstract protected function selectLike($table, $column, $value);	
		abstract protected function selectJoin($pkTable, $fkTable, $parameter, $value);	
		abstract protected function insert($table, $keys, $values);
		abstract protected function update($table, $column, $newValue, $whereColunm, $equals);
		abstract protected function delete($table, $idArray);
		abstract protected function cleaner($string);
		abstract protected function getEntity();
		abstract protected function getKeys();
	}
?>