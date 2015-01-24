 <div class="main">
			<div class="main-inner">
            			<div class="container">
                        			<div class="row">
                                    
 <?php
include("conexion.php");

//suma
$q=mysql_query("SELECT sum(cantidad) FROM orden_producto ");

$aa=mysql_fetch_array($q);
$total=$aa[0];

//intercepsion
//$sql="select * from almacen_producto inner join extraccion on almacen_producto.codigo_producto=extraccion.codigo_producto";

$prod="SELECT distinct (almacen_producto.codigo_producto) ,almacen_producto.detalle_prod from almacen_producto inner join (orden_de_compra inner join orden_producto on orden_de_compra.cod_orden=orden_producto.cod_orden) on almacen_producto.codigo_producto=orden_producto.codigo_producto limit 0,5";

$consulta_prod=mysql_query($prod);
$num=mysql_num_rows($consulta_prod);

for($i=0;$i<$num;$i++){
	$m=mysql_fetch_array($consulta_prod);
	
	$prod2="select sum(orden_producto.cantidad) from orden_producto  WHERE orden_producto.codigo_producto=".$m['codigo_producto'];	
	
	$cons=mysql_query($prod2);
	$row=mysql_fetch_array($cons);
	$arreglo[$i][0]=$row[0];
	//echo "</br> arreglo[".$i."][0]=".$arreglo[$i][0];
	$arreglo[$i][1]=$m['codigo_producto'];
	//echo " arreglo[".$i."][1]=".$arreglo[$i][1];
	$arreglo[$i][2]=$m['detalle_prod'];
	//echo " arreglo[".$i."][2]=".$arreglo[$i][2];
	}

//$consulta=mysql_query($prod,$con);
extract($_POST);

$consulta=mysql_query($prod,$con);

	?>
    
   <?php
   
if (isset($codigo_producto)){
	?>
<?php } ?>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		<!-- Este archivo es para darle un estilo (Este archivo es Opcional) -->
	    <script type="text/javascript" src="js/themes/grid.js"></script>
		<!-- Este archivo es para poder exportar losd atos que obtengamos -->
		<script type="text/javascript" src="js/modules/exporting.js"></script>
<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'Productos con mayor demanda'
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: false
							},
							showInLegend: true
						}
					},
				    series: [{
						type: 'pie',
						name: 'Navegadores',
						data: [
							<?php foreach ($arreglo as $a){
							$porc=($a[0]*100)/$total;
							$number=number_format($porc,2,',',' ');
							echo "['".$a[2]."',".$number."],";?>
							<?php } ?>
						]
					}]
				});
			});
				
		</script>
        <div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>

                             
<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Producto con mas demanda</h3>
            </div>
            <div class="widget-content">
  
<table class="table table-striped table-bordered">
    <tr >
      <th width="52">Cantidad extraida</th>
      <th width="80">Codigo de producto</th>
      <th width="81">Detalle</th>
      
    </tr>

    <?php
	
	$num=mysql_num_rows($consulta);
	
	for($i=0;$i<$num;$i++){
		
	$m=mysql_fetch_array($consulta);
	$prod2="select sum(orden_producto.cantidad) from orden_producto  WHERE orden_producto.codigo_producto=".$m['codigo_producto'];
	$cons=mysql_query($prod2);
	$row=mysql_fetch_array($cons);
	
	$arreglo[$i][0]=$row[0];
	//echo "</br> arreglo[".$i."][0]=".$arreglo[$i][0];
	$arreglo[$i][1]=$m['codigo_producto'];
	//echo " arreglo[".$i."][1]=".$arreglo[$i][1];
	$arreglo[$i][2]=$m['detalle_prod'];
	//echo " arreglo[".$i."][2]=".$arreglo[$i][2];
	
	?>
    <tr >
    <td><?php echo $arreglo[$i][0]=$row[0]?></td>
      <td><?php echo $arreglo[$i][1]=$m['codigo_producto']?></td>
      <td><?php echo $arreglo[$i][2]=$m['detalle_prod']?></td>
      
      
    </tr>
  
    <?php
	}
	?>
    </table><div class="widget-header" align="center"> 
    </div></div>
     
       </div></div></body>
  
