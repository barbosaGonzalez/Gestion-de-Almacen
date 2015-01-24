<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<?php
					$error=false;
					include("conexion.php");
					$ultimoid="select max(num_ext)  from extraccion";
					$max=mysql_query($ultimoid);
					$maxid=mysql_fetch_array($max);
					//aca esta m
					$m=$maxid[0]+1;
					extract($_POST);
					if(isset($codigo_producto) )
					{
						//$con=mysql_connect($host,$user) or die ("problemas al conectar");//sirve para conectar con el servidor//
						//mysql_select_db($dateb,$con) or die ("Problemas al conectar la base de datos");//sirve para conectar con la base de datos//
						//$consulta="SELECT * FROM extraccion WHERE num_ext=".$num_ext;
						//$resultado=mysql_query($consulta);
						//if (!$resultado)
							//echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Error en la consulta</div>';
							//if (mysql_num_rows($resultado)>0)
							//{
								//echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>El numero de venta ya existe</div>'; 
							//}else{
						$remito=mysql_query("INSERT INTO extraccion(num_ext, codigo_producto, cantidad_ext) VALUES ('".$m."',".$codigo_producto.",".$cantidad_ext.")");
						$update_venta=mysql_query("UPDATE almacen_producto SET stock=stock-".$cantidad_ext." where codigo_producto=".$codigo_producto);
						if (!$remito)
						{
							echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Ocurrió un error al generar extraccion</div>';
						}
						else
						{
							echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> La operación se completó con EXITO</div>';
						}
					}
							//}
				?>
				<div class="widget widget-table action-table">
					<div class="widget-header"> <i class="icon-th-list"></i>
						<h3>Nueva Extraccion</h3>
					</div>
					<div class="widget-content">
						<form  method="post" action="">
							<table  class="table table-striped table-bordered">
								<tr>
									<td width="161">Numero de extraccion</td>
									<td width="236"><input disabled="disabled" type="number" value=<?php echo '"'.$m.'"'?> name="num_ext"  maxlength=4 required="required"/></td>
								</tr>
								<tr>
									<td>Codigo de producto</td>
									<td><input type="number" name="codigo_producto"  maxlength=4 required="required"/></td>
								</tr>
								<tr>
									<td>Fecha de extraccion</td>
									<td><input type="date" name="fecha_ext"  required="required"/></td>
								</tr>
								<tr >
									<td>Cantidad  extraccion </td>
									<td><input type="number" name="cantidad_ext" maxlength=4  required="required" /></td>
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