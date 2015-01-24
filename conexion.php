<?php
$host = "localhost";
$user="root";
$dateb = "almacen" ;
$con=mysql_connect($host,$user) or die ("error al conectar");
$base=mysql_select_db($dateb)or die("error al seleccionar la base de datos ");
?>