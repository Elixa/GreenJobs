<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
	<head>
		<title>Esta es la plataforma web</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<script src="libs/jquery-1.7.1.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="style/web/css/webStyle.css" type="text/css">	
		<link rel="stylesheet" href="style/web/css/stylesheet.css" type="text/css">	
		
		<!--Plugins [Jfancy]-->
		<link href="plugins/Jfancy/css/Jfancy.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="plugins/Jfancy/css/JfancyExtra.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="plugins/Jfancy/js/Jfancy.js" type="text/javascript"></script>
		
		<!--DatePicker-->
		<link rel="stylesheet" href="plugins/autoComplete/css/jquery.ui.all.css">
		<script src="plugins/autoComplete/js/jquery.ui.core.js"></script>
		<script src="plugins/autoComplete/js/jquery.ui.widget.js"></script>
		<script src="plugins/autoComplete/js/jquery.ui.datepicker.js"></script>
		<link rel="stylesheet" href="plugins/autoComplete/css/demos.css">	
		
		<!--GoogleMap
	    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		-->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$("a[rel*=Jfancy]").Jfancy({
					loadingImage : "plugins/Jfancy/images/loading.gif",
					closeImage   : "plugins/Jfancy/images/closelabel.png"
				});		

				$( "#dateBirth" ).datepicker({
					dateFormat: 'dd/mm/yy',
					altField: "#txtBirthDate",
					altFormat: "mm/yy"
				});

				$( "#dateStart" ).datepicker({
					dateFormat: 'dd/mm/yy',
				});
				
			});

			function allChecks(chkbox, formName)
			{
				for (var i = 0 ; i < document.forms[formName].elements.length; i++)
				{ 
					var elemento = document.forms[formName].elements[i]; 
					if (elemento.type == "checkbox")
					{ 
						elemento.checked = chkbox.checked; 
					}  
				} 
			}			
			
		</script>		

	</head>
	<body>
		<div id="containerWeb">
			<div id="head">
				<div class="centralizer">
					<div style="height:30px;"></div>
					<div id="logo"></div>
					<div style="float:right;" class="contentStyle encBlackCss">
						<?php 
					// <font color="blue">
					
						// echo rand(0,1000);
					
					// </font>						
							// if(isset($_SESSION['data']['name']))
							// {
								// echo $_SESSION['data']['name'].'(<a href="engine/logout.php" class="encBlackCss">Cerrar sesi&oacute;n</a>)';
							// }
						?> 
					</div>					
				</div>	
			</div>

