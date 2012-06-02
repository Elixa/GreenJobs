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
									<div id="cpanelTitle" style="margin-bottom:10px;margin-left:10px;">Datos de <font color="#ced817">acceso:</font></div>
									<div id="separatorOne"></div>
									<div id="separatorTwo"></div>
									<table border="0" cellpadding="5" cellspacing="0" class="letterStyle" style="padding-left:10px;">
										<tr align="left">
											<td>
												Usuario:
											</td>							
										</tr>
										<tr>
											<td>
												<input type="text" name="txtUser">
											</td>							
										</tr>
										<tr align="left">
											<td>
												Clave:
											</td>							
										</tr>
										<tr>
											<td>
												<input type="password" name="txtPass">
											</td>							
										</tr>
										<tr>
											<td align="left">
												<a href="index.php?option=singIn" class="lnkCss">Registrarte</a><input type="submit" name="btmLogin" value="Iniciar" style="float:right">
											</td>							
										</tr>
										<tr>
											<td align="left">
<?php
	require_once('models/ModelUsers.php');
	if(isset($_POST['btmLogin']))
	{
		if( !empty($_POST['txtUser']) && !empty($_POST['txtPass']) )
		{
			$ModelUsers = new ModelUsers;
			if( $ModelUsers -> validateLogin($_POST['txtUser'], $_POST['txtPass']) )
			{
				echo '
					Cargando...
					<META http-equiv="REFRESH" content="0;URL=./">	
				';
			}else
			{
				echo '
				<div class="error">
					Usuario incorrecto!
				</div>
				';
			}
		}else
		{
			echo '
				<div class="error">
					Datos no v&aacute;lidos!
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