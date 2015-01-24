 <div class="main">
			<div class="main-inner">
            			<div class="container">
                        			<div class="row">
                                    
 <?php
 error_reporting(0);
include("conexion.php");

//suma
$q=mysql_query("SELECT sum(cantidad_rechazada) FROM orden_de_devolucion ");

$aa=mysql_fetch_array($q);
$total=$aa[0];

//intercepsion
$sql="select * from remito inner join orden_de_devolucion on remito.num_remito=orden_de_devolucion.num_remito";

$prod="select distinct(orden_de_devolucion.num_remito),remito.codigo_producto from orden_de_devolucion inner join remito on orden_de_devolucion.num_remito=remito.num_remito";

$consulta_prod=mysql_query($prod);

//echo 
$num=mysql_num_rows($consulta_prod);

for($i=0;$i<$num;$i++){
	$m=mysql_fetch_array($consulta_prod);
	
	$prod2="select sum(orden_de_devolucion.cantidad_rechazada) from orden_de_devolucion  WHERE  orden_de_devolucion.num_remito=".$m['num_remito'];	
	
	$cons=mysql_query($prod2);
	$row=mysql_fetch_array($cons);
	
	$arreglo[$i][0]=$row[0];
	//echo "</br> arreglo[".$i."][0]=".$arreglo[$i][0];
	$arreglo[$i][1]=$m['cantidad_rechazada'];
	//echo " arreglo[".$i."][1]=".$arreglo[$i][1];
	$arreglo[$i][2]=$m['codigo_producto'];
	//echo " arreglo[".$i."][2]=".$arreglo[$i][2];
	
	}

$consulta=mysql_query($sql,$con);
extract($_POST);

$consulta=mysql_query($sql,$con);

	?>
    
   <?php
   
if (isset($num_remito)){
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
						text: 'Provedores mas rechazados'
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
              <h3>Producto con mas extraccion</h3>
            </div>
            <div class="widget-content">
  
<table class="table table-striped table-bordered">
    <tr >
      <th width="52">Cantidad rechazada</th>
      <th width="81">Codigo de provedor</th>
      
    </tr>

    <?php
	
$prod="select distinct(orden_de_devolucion.num_remito),remito.codigo_producto from orden_de_devolucion inner join remito on orden_de_devolucion.num_remito=remito.num_remito";
	$consulta_prod=mysql_query($prod);
	$num=mysql_num_rows($consulta_prod);
	for($i=0;$i<$num;$i++){
	$m=mysql_fetch_array($consulta_prod);
	
	$prod2="select sum(orden_de_devolucion.cantidad_rechazada) from orden_de_devolucion  WHERE orden_de_devolucion.num_remito=".$m['num_remito'];	
	
	$cons=mysql_query($prod2);
	$row=mysql_fetch_array($cons);
	
	$arreglo[$i][0]=$row[0];
	//echo "</br> arreglo[".$i."][0]=".$arreglo[$i][0];
	$arreglo[$i][1]=$m['cantidad_rechazada'];
	//echo " arreglo[".$i."][1]=".$arreglo[$i][1];
	$arreglo[$i][2]=$m['codigo_producto'];
	//echo " arreglo[".$i."][2]=".$arreglo[$i][2];
	
	
	?>
    <tr >
    <td><?php echo $arreglo[$i][0]=$row[0]?></td>
     
      <td><?php echo $arreglo[$i][2]=$m['codigo_producto']?></td>
    </tr>
  
    <?php
	
	}
	?>
    </table><div class="widget-header" align="center"> 
    </div></div>
     
       </div></div></body>
  
