 <script>
	$(function() 
	{	
		<?php
			include("conexion.php");
			while($row= mysql_fetch_array($query)) 
			{//se reciben los valores y se almacenan en un arreglo
				$elementos[]= '"'.$row['detalle_prod'].'"';
			}
			$arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto
		?>	
		var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript	
		$( "#tags" ).autocomplete
		({
			source: availableTags
		});
	});
</script>
<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<?php
					/*********
					Le falta validar algunas cosas, como por ejemplo que no se vuelva a ingresar
					dos veces el mismo producto... Sino que se actualice la cantidad o algo asi..

					Que el producto exista antes de que lo agreguen el la orden de compra
					**********/
					include("conexion.php");
					$sql="select * from provedores";
					$ultimoid="select max(num_factura)  from remito_cabeza";
					$max=mysql_query($ultimoid);
					$maxid=mysql_fetch_array($max);
					//aca esta m
					$m=$maxid[0]+1;
					$prov=mysql_query($sql);
					$prov1=mysql_query($sql);
					extract($_REQUEST);
					/******PARA EL BOTON FINLIZAR***/

					/*** Falta validar que el finalizar no ande si no se a insertado nada ***/
					if (isset($prove))
					{
						$sql_p="select * from provedores WHERE code_provedor=".$prove;
						$proved=mysql_query($sql_p);
						$row_p=mysql_fetch_array($proved);	
					}
					if (isset($continuar) || isset($continuar2))
					{
						/**
						Verificar si existe el producto antes de insertar
						**/
						$sql_verificar="SELECT * FROM almacen_producto WHERE codigo_producto=".$codigo_producto;
						$verificar=mysql_query($sql_verificar);
						if (mysql_num_rows($verificar)==0)
						{
							/***
							Si el numero de filas que devuleve la consulta SQL es igual a cero
							quiere decir que el producto no está en el almacen*/
							echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>El 			producto ingresado no existe</div>';
						}
						else
						{
							$sql_insert_orden="insert into remito (codigo_producto,cant_ingr,num_factura) values (".$codigo_producto.",".$cantidad.",".$m.")";
							$insertar=mysql_query($sql_insert_orden);
						}
						
					}
					else
					{
						if(isset($finalizar)|| isset($finalizar2))
						{
							/**
							Aca habia un error: 
							Estaba insertando en cod_orden y en la TABLA de la BD es un campo
							con AUTOINCREMENT entonces no insertaba nada, por eso nunca aumentaba 
							el numero del codigo de orden, asique ahora inserta solamente el la
							columna de code_provedor el valor del <select>
							**/
							$sql_insert_compra="insert into remito_cabeza(code_provedor) values (".$code_provedor.")";	
							$insertar2=mysql_query($sql_insert_compra);
							if (!$insertar2)
							{
								echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Ocurrió un error al el remito</div>';
							}
							else
							{
								echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>El remito N°'.$m.' se guardó correctamente</div>';
							}
							$m=$m+1;
						}
					}
					$error=false;
					$consultar_finalizar="SELECT * FROM remito where num_factura=".$m;
					$cons=mysql_query($consultar_finalizar);
					if(mysql_num_rows($cons)==0)
					{
						$error=true;
					}
				?>
				<div class="widget widget-table action-table">
					<div class="widget-header"> 
						<i class="icon-th-list"></i>
						<h3>Remito</h3>
					</div>
					<div class="widget-content">
						<form action="" method="post">
							<table class="table table-striped table-bordered">
								<tr>
									<td>
										Codigo remito: <?php echo $m;?>
									</td>
									<td>Provedor Responsable/Codigo:
										<input disabled="disabled"  type="text" value="<?php echo $row_p['nombre']?>"/>
										<input type="hidden"  name="code_provedor" type="text" value="<?php echo $row_p['code_provedor']?>"/>
									</td>
									<td>Fecha de orden:  
										<input name=""value="<?php echo date("d-m-y"); ?>"disabled="disabled" type="text">
									</td>
									<td>
										<input class="btn btn-danger" name="finalizar" type="submit" <?php if($error==true or isset($finalizar)) echo "disabled='disabled'"?> value="Finalizar">
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
				<?php
				//aca va el finalizar 
				if (isset($continuar) || isset($continuar2) )
				{?>
					<div class="widget widget-table action-table">
						<div class="widget-header"> 
							<i class="icon-th-list"></i>
							<h3>Ingrese un producto</h3>
						</div>
						<div class="widget-content">
							<form action="" method="post">
								<table class="table table-striped table-bordered">
									<tr>
										<td>Producto: 
											<input name="codigo_producto" placeholder="Producto" required="required">
										</td>
										<td>Cantidad: 
											<input name="cantidad" type="number" placeholder="Cantidad" required="required">
										</td>
										<td>
											<input class="btn btn-primary" name="continuar2" type="submit" value="Continuar">
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
					<p>
						<?php
							$sql_lista="select * from remito where num_factura=".$m;
							$lista=mysql_query($sql_lista);
						?>
					</p>
					<p>&nbsp; </p>
					<div class="widget widget-table action-table">
						<div class="widget-header"> 
							<i class="icon-th-list"></i>
							<h3>Listado</h3>
						</div>
						<div class="widget-content">
							<table class="table table-striped table-bordered">
								<tr>
									<td>Codigo producto</td>
									<td>Descripcion</td>
									<td>Marca</td>
									<td>Cantidad</td>
								</tr>
								<tr>
  
									<?php 
										$total=0;
										while($array_lista= mysql_fetch_assoc($lista))
										{
											$sql_prod="select * from almacen_producto where codigo_producto=".$array_lista['codigo_producto'];
											$prod=mysql_query($sql_prod);
											$array_prod=mysql_fetch_assoc($prod);
									?>
											<td><?php echo $array_prod['codigo_producto'] ?></td>
											<td><?php echo $array_prod['detalle_prod'] ?></td>
											<td><?php echo $array_prod['marca'] ?></td>
											<td><?php echo $array_lista['cant_ingr'] ?></td>
								</tr>
									<?php}?>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</table>
						</div>
					</div>
			<?php}
				else
				{?>
					<div class="widget widget-table action-table">
						<div class="widget-header"> 
							<i class="icon-th-list"></i>
							<h3>Ingrese un producto</h3>
						</div>
						<div class="widget-content">
							<form action="" method="post">
								<table class="table table-striped table-bordered">
									<tr>
										<td>Codigo producto: 
											<input name="codigo_producto" type="number" placeholder="Codigo de producto" required="required">
										</td>
										<td>Cantidad: 
											<input name="cantidad" type="number" placeholder="Cantidad" required="required">
										</td>
										<td>
											<input class="btn btn-primary" name="continuar" type="submit"   value="Continuar">
										</td>
									</tr>
								</table>
							</form>	
						</div>
					</div>
			<?php}?>
			<!-- /widget-content --> 
			</div>
		</div>
	</div>
</div>
