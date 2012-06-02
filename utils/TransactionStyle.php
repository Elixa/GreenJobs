<?php
	class TransactionStyle
	{
		private $optionsRefresh = array(
			'addFines',
			'addRanges',
			'deleteRanges',
			'deleteFines',
			'deleteUsers'
		);
		
		//Contenedor de mensages
		private $notifyMessage = array(
			'000' => 'Exito'
		);
		
		private $notify; 
		
		public function __construct($option = null)
		{
			if (in_array($option, $this -> optionsRefresh)) 
			{
				$this -> notifyMessage['000'] .= '<META http-equiv="REFRESH" content="1;">';
			}			
		}
		
		public function setTransaction($style, $msg)
		{
			switch ($style) {
				case "INFO":
					self::setInfo($msg);
					break;
				case "TICK":
					self::setTick($msg);
					break;
				case "WARNING":
					self::setWarning($msg);
					break;
				case "BLOCK":
					self::setBlock($msg);
					break;
			}
			return $this -> notify;	
		}

		public function getTransaction(){
			return $this -> notify;
		}		

									// <td align="right" width="21">
										// <a href="ayuda/'.$id.'" title="Clic para ver que significa esto..." id="iconHelp"></a>
									// </td>		
		
		public function setInfo($id)
		{
			$this -> notify = '
				<div style="border:1px solid #4f9dcd;">
					<div style="border:1px solid #005185;">
						<div id="notifyInfo">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td width="23" valign="top">
										<div id="iconInfo"></div>
									</td>									
									<td align="left">
										<b>Informaci&oacute;n:</b> '.$this -> notifyMessage[$id].'
									</td>
								</tr>
							</table>	
						</div>
					</div>
				</div>
			';				
		}

		public function setWarning($id)
		{
			$this -> notify = '
				<div style="border:1px solid #cccd4f;">
					<div style="border:1px solid #858000;">
						<div id="notifyWarning">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td width="23" valign="top">
										<div id="iconAlert"></div>
									</td>									
									<td align="left">
										<b>Alerta:</b> '.$this -> notifyMessage[$id].'
									</td>
								</tr>
							</table>	
						</div>
					</div>
				</div>
			';		
		}		

		public function setTick($id)
		{
			$this -> notify = '
				<div style="border:1px solid #4fcd52;">
					<div style="border:1px solid #0d8500;">
						<div id="notifyTick">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td width="23" valign="top">
										<div id="iconTick"></div>
									</td>									
									<td align="left">
										<b>Informaci&oacute;n:</b> '.$this -> notifyMessage[$id].'
									</td>
								</tr>
							</table>	
						</div>
					</div>
				</div>
			';		
		}
		
		public function setBlock($id)
		{
			$this -> notify = '
				<div style="border:1px solid #cd4f4f;">
					<div style="border:1px solid #850000;">
						<div id="notifyBlock">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td width="23" valign="top">
										<div id="iconBlock"></div>
									</td>									
									<td align="left">
										<b>Error:</b> '.$this -> notifyMessage[$id].' '.mysql_error().'
									</td>
								</tr>
							</table>	
						</div>
					</div>
				</div>
			';		
		}		
	}
?>