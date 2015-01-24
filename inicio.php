<?php
	include("conexion.php");
	$sql_contar_productos="SELECT count('codigo_producto') FROM almacen_producto";
	$contar_productos=mysql_query($sql_contar_productos);
	$productos=mysql_fetch_array($contar_productos);
	$cantidad_productos=$productos[0];
	$sql_contar_prov="SELECT count('code_provedor') FROM provedores";
	$contar_prov=mysql_query($sql_contar_prov);
	$prov=mysql_fetch_array($contar_prov);
	$cantidad_prov=$prov[0];
	$sql_contar_orden="SELECT count('cod_orden') FROM orden_de_compra";
	$contar_orden=mysql_query($sql_contar_orden);
	$ordenes=mysql_fetch_array($contar_orden);
	$cantidad_ordenes=$ordenes[0];
	$sql_stock="SELECT sum(stock) FROM almacen_producto";
	$contar_stock=mysql_query($sql_stock);
	$stock=mysql_fetch_array($contar_stock);
	$cantidad_stock=$stock[0];
?>
 <div class="main">
	<div class="main-inner">
    	<div class="container">
    		<div class="row">
                <div class="span6">
					<div class="widget widget-nopad">
						<div class="widget-header">
							<i class="icon-list-alt"></i>
							<h3>Estado del almacen</h3>
						</div>
						<!-- /widget-header -->
						<div class="widget-content">
				<div class="widget big-stats-container">
					<div class="widget-content">
						<h6 class="bigstats">Un resumen de las cuentas principales con la que cuenta el sistema</h6>
						<div id="big_stats" class="cf">
							<div class="stat">
								<i class="icon-barcode"></i>
								<span class="value"><?php echo $cantidad_productos?></span>
								<h4>Productos</h4>
							</div>
							<!-- .stat -->
							<div class="stat">
								<i class="icon-list-alt"></i>
								<span class="value"><?php echo $cantidad_prov?></span>
								<h4>Provedores</h4>
							</div>
							<!-- .stat -->
							<div class="stat">
								<i class="icon-credit-card"></i>
								<span class="value"><?php echo $cantidad_ordenes?></span>
								<h4>Ordenes de compra</h4>
							</div>
							<!-- .stat -->
							<div class="stat">
								<i class="icon-bullhorn"></i>
								<span class="value"><?php echo $cantidad_stock?></span>
								<h4>Productos en stock</h4>
							</div>
							<!-- .stat --> 
						</div>
					</div>
                <!-- /widget-content --> 
				</div>
            </div>
					</div>
                 </div>
				<div class="span6">
					<div class="widget">
						<div class="widget-header">
							<i class="icon-bookmark"></i>
							<h3>Accesos Rápidos</h3>
						</div>
						<!-- /widget-header -->
						<div class="widget-content">
							<div class="shortcuts">
								<a href="./?ref=NuevoProducto" class="shortcut">
									<i class="shortcut-icon icon-list-alt"></i>
									<span class="shortcut-label">Nuevo Producto</span>
								</a>
								<a href="./?ref=ListaProd" class="shortcut">
									<i class="shortcut-icon icon-bookmark"></i>
									<span class="shortcut-label">Lista de Productos</span>
								</a>
								<a href="./?ref=NuevoProv" class="shortcut">
									<i class="shortcut-icon icon-signal"></i>
									<span class="shortcut-label">Nuevo Provedor</span> </a>
								</a>
								<a href="./?ref=1" class="shortcut">
									<i class="shortcut-icon icon-list-alt"></i>
									<span class="shortcut-label">Remito</span>
								</a>
								<a href="./?ref=ListaProv" class="shortcut">
									<i class="shortcut-icon icon-list-alt"></i>
									<span class="shortcut-label">Lista de Provedores</span>
								</a>
								<a href="./?ref=orden" class="shortcut">
									<i class="shortcut-icon icon-credit-card"></i>
									<span class="shortcut-label">Orden de compra</span>
								</a>
								<!--<a href="./?ref=devolucion" class="shortcut">
									<i class="shortcut-icon icon-list-alt"></i>
									<span class="shortcut-label">Orden de devolucion</span>
								</a>-->
								<a href="./?ref=venta" class="shortcut">
									<i class="shortcut-icon icon-credit-card"></i>
									<span class="shortcut-label">Extracciones </span>
								</a>
								<a href="./?ref=consulta" class="shortcut">
									<i class="shortcut-icon icon-list-alt"></i>
									<span class="shortcut-label">Consultas e informes</span>
								</a>
             
							<!-- /shortcuts -->            
							</div>
						</div>
						<!-- /widget-content --> 
					</div>
                </div>
			</div>
		</div>
 </div>