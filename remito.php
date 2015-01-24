<div class="main">
	<div class="main-inner">
		<div class="container">               
			<div class="row">
				<?php
					$error=false;
					include("conexion.php");
					$ultimoid="select max(num_remito)  from remito";
					$max=mysql_query($ultimoid);
					$maxid=mysql_fetch_array($max);
					//aca esta m
					$m=$maxid[0]+1;
					extract($_POST);
					if(isset($codigo_producto) )
					{
						//$con=mysql_connect($host,$user) or die ("problemas al conectar");//sirve para conectar con el servidor//
						//mysql_select_db($dateb,$con) or die ("Problemas al conectar la base de datos");//sirve para conectar con la base de datos//
						//$consulta="SELECT * FROM remito WHERE num_remito=".$num_remito;
						$remito=mysql_query("INSERT INTO remito (num_remito,codigo_producto, cant_ingr) VALUES ('".$m."','".$codigo_producto."','".$cant_ingr."')");
						if(!$remito)
						{
							echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Ocurrió un error al agregar remito</div>';
						}
						else
						{			
							echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> La operación se completó con EXITO</div>';
						}
					}
				?>
				<div class="widget widget-table action-table">
					<div class="widget-header"> 
						<i class="icon-th-list"></i>
						<h3>Nuevo Remito</h3>
					</div>
					<div class="widget-content">
						<form  method="post" action="">
							<table  class="table table-striped table-bordered">
								<tr>
									<td width="122">Numero de remito:</td>
									<td width="163">
										<input disabled="disabled" value=<?php echo '"'.$m.'"'?> type="number" name="num_remito" maxlength=4 required="required"/>
									</td>
								</tr>
								<tr>
									<td>Codigo de producto: </td>
									<td>
										<input type="number" name="codigo_producto"  maxlength=4 required="required"/>
									</td>
								</tr>
								<tr>
									<td>Cantidad: </td>
									<td>
										<input type="number" name="cant_ingr" maxlength=4  required="required" />
									</td>
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