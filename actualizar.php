<?php
	include("conexion.php");
	$con = mysql_connect($host,$user) or die("problemas al conectara con el server");
	mysql_select_db($dateb,$con) or die("problemas al conectar con la base de datos");
		
?>