<?php
	include("style/web/include/head.php");
?>	
		<div id="body" style="height:500px;" class="contentStyle">
			<div class="centralizer" align="center">		
				<form method="post">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>											
							<td>
							<div class="box" style="width: 325px; min-height: 300px; margin-top:40px; margin-left: auto; margin-right: auto;background-color:#ffffff;">
								<div class="left"></div>
								<div class="right"></div>
								<div class="heading">
									<h5>La aplicaci&oacute;n <b style="color:#ced817;">no est&aacute; instalada</b>, escribe tus datos de acceso para proceder a la instalaci&oacute;n.</h5>
								</div>
								<div class="content" style="min-height: 150px;">
									<form method="post">
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td valign="top">	
													<div id="iconInstall">
													</div>
												</td>
												<td align="center">
													<table border="0" cellpadding="5" cellspacing="0">
														<tr align="left">
															<td>
																Servidor local:
															</td>							
														</tr>
														<tr>
															<td>
																<input type="text" name="txtServer" value="localhost">
															</td>							
														</tr>
														<tr align="left">
															<td>
																Usuario:
															</td>							
														</tr>
														<tr>
															<td>
																<input type="text" name="txtUser" value="root">
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
														<tr align="left">
															<td>
																Base de datos:
															</td>							
														</tr>
														<tr>
															<td>
																<input type="text" name="txtName">
															</td>							
														</tr>
														<tr>
															<td align="right">
																<input type="submit" name="btmInstall" value="Instalar">
															</td>							
														</tr>
													</table>
												</td>							
											</tr>
											<tr>
												<td colspan="2">
<?php

	if(isset($_POST['btmInstall']))
	{
		if(!empty($_POST['txtServer']))
		{
			if(!empty($_POST['txtUser']))
			{
					if(!empty($_POST['txtName']))
					{
						$data ="<?php
	define('DB_HOST','".$_POST['txtServer']."');
	define('DB_USER','".$_POST['txtUser']."');
	define('DB_PASS','".$_POST['txtPass']."');
	define('DB_NAME','".$_POST['txtName']."');";
						//Carga el archivo de configuracion
						$file = fopen("config/config.php", "w");
						if(is_writable('config/config.php'))
						{
							fwrite($file, $data);
							fclose($file);
							
							//Abre una conexion temporal para la creacion de las tablas
							$link =  mysql_connect($_POST['txtServer'], $_POST['txtUser'], $_POST['txtPass']);
							if (!$link) 
							{
								echo '
									<div class="error">
										No pudo conectarse debido a: '.mysql_error().'
									</div>
								';
							}else
							{
								mysql_query('CREATE DATABASE IF NOT EXISTS '.$_POST['txtName'].';', $link);
								mysql_query('USE '.$_POST['txtName'].';');
								//Creacion de tablas
mysql_query('	
CREATE TABLE agents (
	id_agents int(10) unsigned NOT NULL AUTO_INCREMENT,
	ced varchar(45) NOT NULL,
	name varchar(45) NOT NULL,
	lname varchar(45) NOT NULL,
	address varchar(300) NOT NULL,
	tel varchar(45) NOT NULL,
	email varchar(45) NOT NULL,
	id_ranges int(11) NOT NULL,
	typeBlood varchar(45) NOT NULL,
	sex varchar(45) NOT NULL,
	noAccount varchar(45) NOT NULL,
	placeAssig varchar(100) DEFAULT NULL,
	latitude varchar(45) NOT NULL,
	longitude varchar(45) NOT NULL,
	birthDay varchar(45) DEFAULT NULL,
	dateStart varchar(45) NOT NULL,
	state varchar(45) NOT NULL,
	situation varchar(45) NOT NULL,
	birthMonth varchar(45) DEFAULT NULL,
	birthYear varchar(45) DEFAULT NULL,
	identify varchar(45) NOT NULL,
	motivation text NOT NULL,
	PRIMARY KEY (id_agents)
)
');
mysql_query('	
CREATE TABLE comments (
	id_comments int(10) unsigned NOT NULL AUTO_INCREMENT,
	id_agents int(10) unsigned NOT NULL,
	comment text NOT NULL,
	punctuation varchar(45) NOT NULL,
	dateAdded varchar(45) NOT NULL,
	PRIMARY KEY (id_comments),
	KEY FK_comments_1 (id_agents),
	CONSTRAINT FK_comments_1 FOREIGN KEY (id_agents) REFERENCES agents (id_agents) ON DELETE CASCADE ON UPDATE CASCADE
)
');	

mysql_query('	
CREATE TABLE contraventions (
	id_contraventions int(10) unsigned NOT NULL AUTO_INCREMENT,
	id_agents int(10) unsigned DEFAULT NULL,
	license varchar(45) NOT NULL,
	plate varchar(45) NOT NULL,
	id_fines int(10) unsigned NOT NULL,
	description text NOT NULL,
	month varchar(45) NOT NULL,
	year varchar(45) NOT NULL,
	PRIMARY KEY (id_contraventions),
	KEY FK_contraventions_1 (id_agents),
	KEY FK_contraventions_2 (id_fines),
	CONSTRAINT FK_contraventions_2 FOREIGN KEY (id_fines) REFERENCES fines (id_fines) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT FK_contraventions_1 FOREIGN KEY (id_agents) REFERENCES agents (id_agents) ON DELETE CASCADE ON UPDATE CASCADE
)
');	
mysql_query('	
CREATE TABLE fines (
	id_fines int(10) unsigned NOT NULL AUTO_INCREMENT,
	code varchar(45) NOT NULL,
	title varchar(100) NOT NULL,
	description text NOT NULL,
	price varchar(45) NOT NULL,
	PRIMARY KEY (id_fines)
)
');	

mysql_query('	
CREATE TABLE ranges (
	id_ranges int(10) unsigned NOT NULL AUTO_INCREMENT,
	code varchar(45) NOT NULL,
	title varchar(45) NOT NULL,
	money varchar(45) NOT NULL,
	PRIMARY KEY (id_ranges)
) 
');	
mysql_query('	
CREATE TABLE users (
	id_users int(10) unsigned NOT NULL AUTO_INCREMENT,
	name varchar(45) NOT NULL,
	pass varchar(45) NOT NULL,
	level varchar(5) NOT NULL,
	PRIMARY KEY (id_users)
)
');							
								if(mysql_error() == '' )
								{
									echo '
										Configuraci&oacute;n creada, favor espere...
										<META http-equiv="REFRESH" content="1;URL=./">	
									';								
								}else
								{
									echo '
										<div class="error">
											Ha ocurrido un error al crear la configuraci&oacute;n: '.mysql_error().'
										</div>
									';								
								}
							}
							mysql_close($link);
						}else
						{
							echo '
								<div class="error">
									Ha ocurrido un error al crear la configuraci&oacute;n.
								</div>
							';					
						}					
					}else
					{
						echo '
							<div class="error">
								El nombre de la base de datos es requerido.
							</div>
						';					
					}									
			}else
			{
				echo '
					<div class="error">
						El usuario del servidor es requerido.
					</div>
				';
			}			
		}else
		{
			echo '
				<div class="error">
					La direcci&oacute;n del servidor es requerida.
				</div>
			';
		}
	}
?>
												</td>
											</tr>											
										</table>								
									</form>	
								</div>
							</div>								
							</td>							
						</tr>											
					</table>								
				</form>	
			</div>
		</div>
<?php
	include("style/web/include/footer.php");	
?>		