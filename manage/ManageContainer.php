<?php
	//Gestor de contenidos dinamicos de seleccion
	require_once('style/web/ContainerStyle.php');	
	require_once('models/StandarModel.php');

	class ManageContainer
	{
		const DIR = 'manage/web/'; 
		private $StandarModel;
		private $ContainerStyle;
		private $instance;
		private $tempInstance;
		private $OptionSelected;

		/*
			Opciones web
			============
			Option URL => Nombre archivo
		*/
		private $optionsLocations = array(
			"init" 			=> "init.php",																																																																																																																																																																																																																																																																										
			"NULL" 			=> "NULL"			
		);
		
		public function __construct($option, $id = null)
		{
			// Consigue la conexion para que funcione (mysql_real_escape_string) para el $option
			$this -> StandarModel 	= new StandarModel;														
			$this -> StandarModel -> getConnection();
			
			//Escapa los caracteres de la opcion (Stop Injection)
			$this -> OptionSelected 	= mysql_real_escape_string($option);
			$this -> productSelected 	= mysql_real_escape_string($id);
			
			//Incluye el manejador seleccinado
			$this -> autoInclude($this -> OptionSelected, $this -> productSelected);
		}
		private function autoInclude($option, $id = null)
		{
 			// Verifica si existe la opcion elegida en $optionsLocations
			if (array_key_exists($option, $this -> optionsLocations)) 
			{
				// Incluye el manejador
				include_once( self::DIR . $this -> optionsLocations[$option] );
				// Recuperar los datos del manejador para enviarlos al manejador de estilo	
				$this -> tempInstance = '_'.$option;
				// Envia la referencia del producto para que el manejador cargue los datos en caso de ser un id
				$this -> instance = new $this -> tempInstance($id);				

				//Envia valores recuperados del manejador al setManage de ContainerStyle de style(titulo, argumentos, contenido)
				new ContainerStyle($this -> instance -> getTitle(), $this -> instance -> getArgs(), $this -> instance -> getContent(), $this -> instance -> getName());
			}
 			else
			{
				//Incluye la opcion default (inicio)
				include_once( self::DIR . $this -> optionsLocations['init'] );
				// Todas las clases de manejador (contenido mostrado) son: _NameClass
				$this -> tempInstance = '_init';
				//Instancia la clase para recuperar los valores del manejador
				$this -> instance = new $this -> tempInstance;
				echo $this -> instance -> getContent();
			}  
		}
	}
?>
