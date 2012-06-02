<?php
	include("style/web/include/head.php");
?>	
		<div id="body" >
			<div class="centralizer" align="center">		
				<form method="post">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>											
							<td>
								<div id="cpanelUp">
									<div id="cpanelTitle" style="margin-bottom:10px;margin-left:10px;">Nuevo <font color="#ced817">usuario:</font></div>
									<div id="separatorOne"></div>
									<div id="separatorTwo"></div>
									<table border="0" cellpadding="5" cellspacing="0" class="letterStyle" width="100%">
														<tr align="left">
															<td>
																Nombre de usuario:
															</td>							
														</tr>
														<tr align="left">
															<td>
																<input type="text" name="txtUser">
															</td>							
														</tr>
														<tr align="left">
															<td>
																Clave:
															</td>							
														</tr>
														<tr align="left">
															<td>
																<input type="password" name="txtPass">
															</td>							
														</tr>
														<tr align="left">
															<td>
																Repetir clave:
															</td>							
														</tr>
														<tr align="left">
															<td>
																<input type="password" name="txtPassTwo">
															</td>							
														</tr>
														<tr>
															<td align="left">
																<input type="submit" name="btmCreate" value="Crear">&nbsp;<a href="./" class="encCss">Volver</a>
															</td>							
														</tr>
											<tr>
												<td>
<?php
	$_POST['txtUser'] = isset($_POST['txtUser'])?mysql_real_escape_string($_POST['txtUser']):null;
	$_POST['txtPass'] = isset($_POST['txtPass'])?mysql_real_escape_string($_POST['txtPass']):null;
	if(isset($_POST['btmCreate']))
	{
		if(!empty($_POST['txtUser']))
		{
			if(!empty($_POST['txtPass']) && !empty($_POST['txtPassTwo']))
			{
					if( $_POST['txtPass'] == $_POST['txtPassTwo'] )
					{
						//Almacenar el usuario
						require_once('utils/Utils.php');
						$Utils = new Utils;
						$level = 1;
						if(!$Utils -> verifyUsers())
							$level = 0;
							
						mysql_query("INSERT INTO users (name, pass, level) VALUES('".$_POST['txtUser']."', '".$_POST['txtPass']."', $level);");
						if(mysql_error() == '' )
						{
							echo '
								Favor espere...
								<META http-equiv="REFRESH" content="1;URL=./">	
							';								
						}else
						{
							echo '
								<div class="error">
									Error: '.mysql_error().'
								</div>
							';								
						}	
						//echo mysql_stat();	
					}else
					{
						echo '
							<div class="error">
								Claves deben coincidir.
							</div>
						';					
					}									
			}else
			{
				echo '
					<div class="error">
						Campos de clave requeridos.
					</div>
				';
			}			
		}else
		{
			echo '
				<div class="error">
					Nombre requerido.
				</div>
			';
		}
	}
?>
											</td>							
										</tr>
									</table>
								</div>
								<div id="cpanelDown"></div>								
							</td>							
						</tr>											
					</table>								
				</form>	
			</div>
		</div>
<?php
	include("style/web/include/footer.php");	
?>			