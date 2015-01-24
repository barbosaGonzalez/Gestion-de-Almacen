<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />

<?php
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

$con = "select * from almacen_producto";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$query = mysql_query($con);
	?>
    
    <script>
	$(function() {
		
		<?php
		
		while($row= mysql_fetch_array($query)) {//se reciben los valores y se almacenan en un arreglo
      $elementos[]= '"'.$row['codigo_producto'].''.$row['detalle_prod'].'"';
	  
}
$arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto
		?>	
		
		var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
				
		$( "#tags" ).autocomplete({
			source: availableTags
		});
	});
	</script>

<form action="recibe.php" method="post">
	<label for="tags">buscar </label>
	<input id="tags" name="nombre">
    <input name="Enviar" type="submit" />
</form>
