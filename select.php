<?php
	include("conexion.php");
	//$con = mysql_connect($host,$user) or die("problemas al conectara con el server");
	//mysql_select_db($dateb,$con) or die("problemas al conectar con la base de datos");
	$registro=mysql_query("select * from `provedores`") or die("problemas al consultar:".mysql_error());
	echo(" <table width='800' border='1' align='center'>\n");
		echo(" <tr>\n");
			echo("<td>Codigo</td>\n");
			echo("<td>Nombre</td>\n");
			echo("<td>Telefono</td>\n");
			echo("<td>Email</td>\n");
			echo("<td>Direccion</td>\n");
			echo("<td>Marca</td>\n");
		echo("</tr>\n");
		while($reg=mysql_fetch_array ($registro))
		{
			echo("<tr>\n");
				echo("<td>".$reg['code_provedor']."</td>\n");
				echo("<td>".$reg['nombre']."</td>\n");
				echo("<td>".$reg['telefono']."</td>\n");
				echo("<td>".$reg['correo_electronico']."</td>\n");
				echo("<td>".$reg['direccion']."</td>\n");
				echo("<td>".$reg['marca_prov']."</td>\n");
			echo("<tr>\n");	
		}
	echo("</table>\n");
?>
