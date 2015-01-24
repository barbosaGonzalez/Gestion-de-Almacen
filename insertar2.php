<?php
include("conexion.php");
if(isset($_POST['codigo']) && !empty($_POST['codigo']) && isset ($_POST['nombre']) && !empty ($_POST['nombre']) &&
isset ($_POST['tel']) && !empty ($_POST['tel']) && isset ($_POST['email']) && !empty ($_POST['email']) &&
isset ($_POST['dir']) && !empty ($_POST['dir']) && isset ($_POST['marca']) && !empty ($_POST['marca'])) 
{

$con=mysql_connect($host,$user) or die ("problemas al conectar");//sirve para conectar con el servidor//

mysql_select_db($dateb,$con) or die ("Problemas al conectar la base de datos");//sirve para conectar con la base de datos//

$consulta="SELECT*FROM `provedores` WHERE `code_provedor`=".$_POST['codigo'];

$resultado=mysql_query($consulta) or die (mysql_error());
	if (mysql_num_rows($resultado)>0)
	{
		print("Este codigo ya existe")."<br/ >";
		die();
	}

mysql_query("INSERT INTO provedores (code_provedor, nombre, telefono, correo_electronico, direccion, marca_prov)
VALUES ('$_POST[codigo]','$_POST[nombre]','$_POST[tel]','$_POST[email]','$_POST[dir]','$_POST[marca]')",$con)  or die ("Error al insertar datos");
echo "Datos insertados";

}else{
echo "problemas al insetar datos";

}

?>