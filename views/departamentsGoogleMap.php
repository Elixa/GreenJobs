<?php
	require_once('../models/ModelAgents.php');
	require_once('../models/ModelRanges.php');
	$ModelAgents = new ModelAgents;
	$ModelRanges = new ModelRanges;
	$agents = $ModelAgents -> getAgentsBySituation();
?>
	<script type="text/javascript">
    var departaments = [
		<?php
			
			while($agent = mysql_fetch_assoc($agents))
			{
				$range = mysql_fetch_assoc($ModelRanges -> getRangeById($agent['id_ranges']));
				echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"><img src="data/temp/'.$agent['identify'].'" width="80" style="border:1px #494949 solid;"/></div><div style="text-align:left;">Nombre: '.$agent['name'].' '.$agent['lname'].'<br/>C&eacute;dula: '.$agent['ced'].'<br/>Rango: '.$range['title'].'<br/>Asignado en: '.$agent['placeAssig'].'</div></div>\', '.$agent['latitude'].','.$agent['longitude'].', 4],';
			}
		?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: new google.maps.LatLng(18.812718, -70.298767),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < departaments.length; i++) 
	{  
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(departaments[i][1], departaments[i][2]),
			map: map
		});

		google.maps.event.addListener(marker, 'click', (function(marker, i) 
		{
			return function() 
			{
			infowindow.setContent(departaments[i][0]);
			infowindow.open(map, marker);
			}
		})(marker, i));
    }
	
	function closeJfancy()
	{
		//Cerrar Jfancy
		$.Jfancy.close();	
		return false;
	}	
  </script>

	
	<table border="0" cellspacing="0" cellpadding="10" width="700">
		<tr>
			<td>
				<span class="titleStyle">Ubicaciones geograficas de todos los agentes activos en el pais:</span>
			</td>
		</tr>
		<tr>
			<td align="center">
				<div id="map" style="width: 700px; height: 450px; border:1px #494949 solid;"></div>
			</td>
		</tr>
		<tr>
			<td align="left">
				<input type="submit" name="btmCalcel" value="Salir" class="btmStyle" onClick="return closeJfancy();">
			</td>
		</tr>
	</table>

