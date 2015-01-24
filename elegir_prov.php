 <?php
	/*********
	Le falta validar algunas cosas, como por ejemplo que no se vuelva a ingresar
	dos veces el mismo producto... Sino que se actualice la cantidad o algo asi..

	Que el producto exista antes de que lo agreguen el la orden de compra
	**********/
	include("conexion.php");
	$sql="select * from provedores";
	$prov=mysql_query($sql);

	extract($_POST);
	/******PARA EL BOTON FINLIZAR***/

	/*** Falta validar que el finalizar no ande si no se a insertado nada ***/
?>
<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="span6">
				<div class="widget">
					<div class="widget-header"> <i class="icon-bookmark"></i>
						<h3>Elegir proveedor</h3>
					</div>
					<!-- /widget-header -->   
					<div class="widget-content">
					<?php while($row=mysql_fetch_array($prov))
						{?>
							<div class="shortcuts"> 
								<a href="./?ref=orden2&prove=<?php echo $row['code_provedor']?>" class="shortcut">
									<i class="shortcut-icon icon-list-alt"></i>
									<span class="shortcut-label"><?php echo $row['nombre']?></span> 
								</a>
							</div>
						<?php }?>
					<!-- /widget-content --> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>