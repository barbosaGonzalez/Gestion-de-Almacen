<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<?php
					$error=false;
					include("conexion.php");
					extract($_POST);
					if(isset($num_venta) )
					{
						//$con=mysql_connect($host,$user) or die ("problemas al conectar");//sirve para conectar con el servidor//
						//mysql_select_db($dateb,$con) or die ("Problemas al conectar la base de datos");//sirve para conectar con la base de datos//
						$consulta="SELECT * FROM venta WHERE num_venta=".$num_venta;
						$resultado=mysql_query($consulta);
						if (!$resultado)
							echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Error en la consulta</div>';
						if (mysql_num_rows($resultado)>0)
						{
							echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>El numero de venta ya existe</div>';
						}
						else
						{
							$remito=mysql_query("INSERT INTO venta (num_venta, codigo_producto, fecha_venta, cantidad_vendida) VALUES ('".$num_venta."','".$codigo_producto."','".$fecha_venta."','".$cantidad_vendida."')");
							$update_venta=mysql_query("UPDATE almacen_producto SET stock=stock-$cantidad_vendida");
							if (!$remito)
							{
								echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Ocurrió un error al agregar venta</div>';
							}
							else
							{
								echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> La operación se completó con EXITO</div>';
							}
						}
					}
				?>
				<div class="widget widget-table action-table">
					<div class="widget-header"> <i class="icon-th-list"></i>
						<h3>Nueva Venta</h3>
					</div>
					<div class="widget-content">
						<form  method="post" action="">
							<table  class="table table-striped table-bordered">
								<tr>
									<td width="122">Numero de venta:</td>
									<td width="163"><input type="number" name="num_venta" maxlength=4 required="required"/></td>
								</tr>
								<tr>
									<td>Codigo de producto</td>
									<td><input type="number" name="codigo_producto"  maxlength=4 required="required"/></td>
								</tr>
								<tr>
									<td>Fecha Venta</td>
									<td><input type="date" name="fecha_venta"  maxlength=4 required="required"/></td>
								</tr>
								<tr>
									<td>Cantidad Vendida: </td>
									<td><input type="number" name="cantidad_vendida" maxlength=4  required="required" /></td>
								</tr>
								<tr>
									<td></td>
									<td>
										<input class="btn btn-primary" name="Enviar" type="submit" required="required" id="Enviar" value="Enviar"/>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>