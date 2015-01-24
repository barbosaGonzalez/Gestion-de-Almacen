<?php
	session_start();
	if ($_SESSION['admin']==false)
		header ("Location: ./login.php");
	include("conexion.php");
	include("mod/header.php");
	include("mod/sub-menu.php");
	extract($_REQUEST);
	if(isset($ref)){
		switch($ref){
			case "busqueda":
			include("busqueda.php");
			break;
			case "close":
			session_destroy();
			break;
			case "NuevoProducto":
			include("almacen.php");
			break;
			case "ListaProd":
			include("lista_prod.php");
			break;
			case "ListaProv":
			include("formact.php");
			break;
			case "NuevoProv":
			include("formprove.php");
			break;
			case "orden":
			include("elegir_prov.php");
			break;
			case "grafica":
			include("as.php");
			break;
			case "orden2":
			include("orden.php");
			break;
			case"nuevoremito":
			include("remito.php");
			break;
			case"listaremito":
			include("lista_remito.php");
			break;
			case"devolucion":
			include("devolucion.php");
			break;
			case"extraer":
			include("extraer.php");
			break;
			case"rechazado":
			include("prov_rechazado.php");
			break;
			case"consulta":
			include("consultas.php");
			break;
			case"mas_ext":
			include("mas_extraido.php");
			break;
			case"mas_dem":
			include("mas_dem.php");
			break;
			case"prov_rechazado":
			include("prov_rechazado.php");
			break;
			default:
			include("inicio.php");
			break;
		}
	}
	else
	{
		include("inicio.php");
	}
	include("mod/footer.php");
?>