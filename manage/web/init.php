<?php
	//@IMPORTS
	require_once('manage/Dinamic.php');
	
	class _init implements Dinamic
	{
		//Titulo del manejador (titulo de la ventana)
		private $title 	= '';
		
		//Argumentos del manejador, opciones = (Array)
		private $args 	= null;
		
		//Contenido del manejador	
		private $content;
		
		public function __construct($id = null)
		{

		}
		//@OVERRIDE
		public function limitAccess()
		{}		
		//@OVERRIDE
		public function getName()
		{
			return get_class($this);
		}
		//@OVERRIDE
		public function getTitle()
		{
			return $this -> title;
		}		
		//@OVERRIDE
		public function getArgs()
		{
			return $this -> args;
		}
		//@OVERRIDE
		public function getContent()
		{
			$this -> content = '';					
			return $this -> content;
		}

	
	}	
?>	
	