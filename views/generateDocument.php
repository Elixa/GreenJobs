
	<script src="controllers/Controller_generateDocument.js" type="text/javascript" language="javascript"></script>
	<form action="plugins/dompdf/generateDocument.php" method="post" id="formGenerateDocument" target="generateStrategy">
	<table border="0" cellspacing="0" cellpadding="10" width="500" class="contentStyle">
		<tr>
			<td colspan="2">
				<span class="titleStyle">Generar n&oacute;mina de empleados:</span>
			</td>
		</tr>
		<tr>
			<td>
				Mes:
			</td>
			<td>
				<select name="optMonth">
					<option value="">Selecciona:</option>			
					<option value="01">Enero</option>			
					<option value="02">Febrero</option>			
					<option value="03">Marzo</option>			
					<option value="04">Abril</option>			
					<option value="05">Mayo</option>			
					<option value="06">Junio</option>			
					<option value="07">Julio</option>			
					<option value="08">Agosto</option>			
					<option value="09">Septiembre</option>			
					<option value="10">Octubre</option>			
					<option value="11">Noviembre</option>			
					<option value="12">Diciembre</option>					
				</select>
			</td>
		</tr>
		<tr>
			<td>
				A&ntilde;o:
			</td>
			<td>
				<select name="optYear">
					<option value="">Selecciona:</option>
<?
				$year = date('Y');
				for($i = $year; $i >= $year - 25; $i--)
				{
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
				//onLoad="return $('#iconLoading').css('display','none');"
?>				
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<iframe name="generateStrategy" style="display:none;" ></iframe>
			</td>
			<td>
				<button class="btmStyle" onClick="return generateDocument();">Generar</button>&nbsp;<button class="btmStyle" onClick="return closeJfancy();">Cancelar</button>
			</td>
		</tr>
	</table>
	</form>
	