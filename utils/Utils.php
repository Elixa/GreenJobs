<?php
	class Utils
	{
		private $result;
		
		//Valida una URL
		public function validateUrl($input) 
		{ 
			if (!stristr($input, 'http://')) 
			{ 
				return false; 
			}
			return true; 
		} 
		
		//Retorna un identificador
		public function randomText($length) 
		{
			$key = isset($key)? $key:null;
			$pattern = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			for( $i = 0; $i < $length; $i++ ) 
			{
				$key .= $pattern{rand(0,35)};
			}
			return $key;
		}	
		
		//Retorna una lista de nombres de archivos contenidos en carpeta
		public function getListFiles($arrayFiles)
		{
			$this -> result = '';
			foreach($arrayFiles as $file)
			{	
				$doc = pathinfo($file);
				if(!empty($doc['extension']))	
					$this -> result[] = $doc['filename'].'.'.$doc['extension'];														
			}
			return $this -> result; 
		}	
		
		//Retorna la fecha en formato español
		public function getRealDate($date)
		{
			$months = array(
				'January' 	=> 'Enero',
				'February' 	=> 'Febrero',
				'March' 	=> 'Marzo',
				'April' 	=> 'Abril',
				'May'		=> 'Mayo',
				'June'		=> 'Junio',
				'July'		=> 'Julio',
				'August'	=> 'Agosto',
				'September'	=> 'Septiembre',
				'November'	=> 'Noviembre',
				'December'	=> 'Diciembre',
			);
			$date = explode(" ", $date);
			$date[1] = $months[$date[1]];			
			return $date[0].' '.$date[1].' '.$date[2];
		}

		
	}
?>