<?php
	//libreria generica
	require_once ("src/jpgraph.php");

	// libreria para gradigos de barras , hay muchas mas
	require_once ("src/jpgraph_bar.php");
	include("conexion.php"); 
	$sql= "select * from provedores_rechazados";
	$res=mysql_query($sql);
	while ($row=mysql_fetch_array($res))
	{
		//agrega datos a la array
		$datos[] = $row ["num_de_rechazos"];
		$labels[] = $row ["code_provedor"];
	}

	//formatos generales 
	$grafico = new Graph(800,600, "auto");
	$grafico -> SetScale ("textlin");
	$grafico -> title->Set("Estadisticas de rechazo");
	$grafico -> xaxis ->title ->set ("Codigo del Provedor");
	$grafico -> yaxis -> title ->set ("       Promedio");

	// ingresamos los datos al arreglo de datos que iran en el grafico
	$barplot1 = new BarPlot($datos);

	// formatos especificos de los colores
	$barplot1 ->SetFillGradient ('#0C3','#666',GRAD_HOR);

	// tamaño de las barras
	$barplot1 ->SetWidth(25);

	// le agregamos datos al grafico
	$grafico ->add($barplot1);

	// salida por pantalla y imagen
	$grafico ->stroke();
	$grafico ->stroke("grafi.png");
?>