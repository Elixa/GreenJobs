<?php
	
	class ContainerStyle
	{
		//Variable de paginacion (paginas que tienen paginacion)
		public static $optionMuch = array (
			'_NOMBRE-MANEJADOR',
		);	
		
		public function __construct($title, $args, $content, $nameClass)
		{		
			self::setContent($title, $args, $content, $nameClass);
		}
		
		public function setContent($title, $args, $content, $nameClass)
		{
			echo '
				<div id="compatibity">						
			';
			//Titulo
			if(!empty($title))
			{	
			
				echo ' 				
					<table border="0" cellpadding="0" cellspacing="0"  width="100%" style="margin-left:10px;">
						<tr align="left" valign="top" height="58">						
							<td class="menuContextualOne">					  																								
							</td>
							<td class="menuContextualTwo">												
								<table border="0" cellpadding="0" cellspacing="5" width="100%" style="padding-top:4px;">
									<tr>
										<td align="left" width="430">
											<span class="titleStyle" >'.$title.'</span>
										</td>	
										<td align="right" width="310">
					';
								//Argumentos
								if(!is_null($args))
								{
									foreach($args as $arg)
									{
										echo $arg.'<span style="color:#fff;"> | </span>';
									}
								}					
					echo '					
										</td>	
										<td width="16">
											<div id="iconLoading"></div>
										</td>	
									</tr>
								</table>
							</td>							
							<td class="menuContextualThree">	
							</td>																																										
						</tr>
						<tr>
							<td	colspan="3" align="center">
								<div id="notifyMessage" style="padding:5px;"></div>
							</td>
						</tr>
					</table>
					
					';
			}

			//Imprime el contenido que retorna el manejador
			echo '
				<table border="0" cellpadding="0" cellspacing="5" width="800" style="margin-left:10px;">
					<tr>
						<td colspan="3">
							<span class="contentStyle">'.$content.'</span>
						</td>	
					</tr>
				</table>
			</div>
			';	
			
/* 			//Agregar la libreria de paginacion en caso de...
			if (is_int(array_search($nameClass, self::$optionMuch)))
			{
				$manageName = str_replace("_", "", $nameClass);
				require_once('manage/web/'.$manageName.'.php');				
				$tempInstance 		= new $nameClass;
				$paginationConfig	= $tempInstance -> paginationConfig;
				$id = isset($_GET['id'])? $_GET['id']:0;
				$_pagi_sql = $paginationConfig['_pagi_sql'];
				$rule = ( $id - 1) * 10;	
				
				include('libs/paginatorLib.php');
			}
*/			
			
			//Agrega el controlador asincronico del manejador seleccionado 
			/*
			if(is_file('controllers/Controller'.$nameClass.'.php')) 
				include('controllers/Controller'.$nameClass.'.php'); 
			*/
		}	
	}
	
?>

		