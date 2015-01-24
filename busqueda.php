 <?php
	//conectar con la bd
	include("conexion.php");
	extract($_REQUEST);
	//$con= mysql_connect("localhost","root","");
	//mysql_select_db("stock",$con);
	if(!isset($busqueda))
	$busqueda="";
	$sql="select * from almacen_producto where codigo_producto='".$busqueda."' or detalle_prod like'%".$busqueda."%' or marca like '%".$busqueda."%'";
	//print_r($consulta);
	$consulta=mysql_query($sql); // guarda un identificador de recursos (sesorces Id #4 )
	//$resultado=mysql_fetch_assoc($consulta); //convierte en un array
	//print_r($resultado);
?>
<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<div class="widget widget-table action-table">
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<h3>Lista de productos</h3>
				</div>
				<div class="widget-content">
					<table class="table table-striped table-bordered">
						<tr>
							<th>Codigo</th>
							<th>Detalle</th>
							<th>Fecha Elab.</th>
							<th>fecha Venc.</th>
							<th>Ubicación</th>
							<th>Marca</th>
							<th>Precio Costo</th>
							<th>Precio Venta</th>
							<th>Stock</th>
							<th>Accion</th>
						</tr>
						<?phpwhile($resultado = mysql_fetch_assoc($consulta))
						{?>
							<tr>
								<td><?php echo $resultado["codigo_producto"]?></td>
								<td><?php echo $resultado["detalle_prod"]?></td>
								<td><?php echo $resultado["fec_elab"]?></td>
								<td><?php echo $resultado["fec_vec"]?></td>
								<td><?php echo $resultado["ubicacion"]?></td>
								<td><?php echo $resultado["marca"]?></td>
								<td>$<?php echo $resultado["precio_costo"]?></td>
								<td>$<?php echo $resultado["precio_venta"]?></td>
								<td><?php echo $resultado["stock"]?></td>
								<td>
									<form  method="post" action="./?ref=ListaProd">
										<input type="submit" name="editar" value="Editar"/>
										<input name="codigo_producto" type="hidden" value="<?php echo $resultado["codigo_producto"]?>" />
										<input name="detalle_prod" type="hidden" value="<?php echo $resultado["detalle_prod"]?>" />
										<input name="fec_elab" type="hidden" value="<?php echo $resultado["fec_elab"]?>" />
										<input name="fec_vec" type="hidden" value="<?php echo $resultado["fec_vec"]?>" />
										<input name="marca" type="hidden" value="<?php echo $resultado["marca"]?>" />
										<input name="precio_costo" type="hidden" value="<?php echo $resultado["precio_costo"]?>" />
										<input name="precio_venta" type="hidden" value="<?php echo $resultado["precio_venta"]?>" />
										<input name="stock" type="hidden" value="<?php echo $resultado["stock"]?>" />
										<input name="ubicacion" type="hidden" value="<?php echo $resultado["ubicacion"]?>" />
										<input type="submit" name="borrar" value="Borrar"/>
									</form>
								</td>
							</tr>
						<?php}?>
					</table>
					<div class="widget-header" align="center"> 
						<a class="btn btn-primary" href="./?ref=NuevoProducto">Nuevo producto</a>
					</div>
				</div>
			</div>
		</div>
	</div>        
</div>                    