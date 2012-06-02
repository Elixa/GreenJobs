	<script type="text/javascript">
		var mapDiv = document.getElementById('map');
		var map = new google.maps.Map(mapDiv, {
			center: new google.maps.LatLng(18.812718, -70.298767),
			zoom: 8,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});      
		var marker = new google.maps.Marker({
			map: map,
			position: new google.maps.LatLng(18.812718, -70.298767),
			draggable: true
		}); 
		function setLocationValues()
		{
			var location = marker.getPosition();
			document.formAgent.txtLat.value = location.lat();				
			document.formAgent.txtLon.value = location.lng();				
			$.Jfancy.close();	
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
				<span class="titleStyle">Escoje la ubicaci&oacute;n donde ser&aacute; asignado el agente:</span>
			</td>
		</tr>
		<tr>
			<td align="center">
				<div id="map" style="width: 700px; height: 450px; border:1px #494949 solid;"></div>
			</td>
		</tr>
		<tr>
			<td align="left">
				<input type="submit" name="btmSave" value="Escojer" class="btmStyle" onClick="return setLocationValues();">&nbsp;<input type="submit" name="btmCalcel" value="Cancelar" class="btmStyle" onClick="return closeJfancy();">
			</td>
		</tr>
	</table>

