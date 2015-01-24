<?php 
extract($_REQUEST);
?>
<div class="subnavbar">
	<div class="subnavbar-inner">
		<div class="container">
			<ul class="mainnav">
				<li <?php if (!isset($ref)) echo "class='active'";?> >
					<a href="./">
						<i class="icon-dashboard"></i>
						<span>Inicio</span>
					</a>	    				
				</li>
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-th-large"></i>
						<span>Productos</span>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
                    	<li <?php if (isset($ref)) if ($ref=='NuevoProducto') echo "class='active'";?>>
							<a href="?ref=NuevoProducto">Nuevo Producto</a>
						</li>
                        <li <?php if (isset($ref)) if ($ref=='ListaProd') echo "class='active'";?>>
							<a href="?ref=ListaProd">Lista de productos</a>
						</li>
					</ul>    				
				</li>
				<li class="dropdown" <?php if (isset($ref)) echo "class='active'";?>>					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-list-alt"></i>
						<span>Provedores</span>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li <?php if (isset($ref)) if ($ref=='NuevoProv') echo "class='active'";?>>
							<a href="?ref=NuevoProv">Nuevo Provedor	</a>
						</li>
						<li <?php if (isset($ref)) if ($ref=='ListaProv') echo "class='active'";?>>
							<a href="?ref=ListaProv">Lista de Provedores</a></li>
						<li <?php if (isset($ref)) if ($ref=='rechazado') echo "class='active'";?>>
							<a href="?ref=rechazado">Provedores rechazados</a>
						</li>
					</ul>
				</li> 
                <li <?php if (isset($ref)) if ($ref=='orden') echo "class='active'";?>>					
					<a href="./?ref=orden">
						<i class="icon-credit-card"></i>
						<span>Orden de compra</span>
					</a>  									
				</li>
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-th-large"></i>
						<span>Remitos</span>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li <?php if (isset($ref)) if ($ref=='nuevoremito') echo "class='active'";?>>
							<a href="?ref=nuevoremito">Nuevo Remito</a>
						</li>
						<li <?php if (isset($ref)) if ($ref=='listaremito') echo "class='active'";?>>
							<a href="?ref=listaremito">Lista de Remitos</a>
						</li>
					</ul>    				
				</li>
				<li <?php if (isset($ref)) if ($ref=='extraer') echo "class='active'";?>>					
					<a href="./?ref=extraer">
						<i class="icon-credit-card"></i>
						<span>Extraciones</span>
					</a>
				</li>	
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-credit-card"></i>
						<span>Consultas e informes</span>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li <?php if (isset($ref)) if ($ref=='mas_ext') echo "class='active'";?>>
							<a href="?ref=mas_ext">Productos mas extraidos</a>
						</li>
						<li <?php if (isset($ref)) if ($ref=='mas_dem') echo "class='active'";?>>
							<a href="?ref=mas_dem">Productos mas demandado</a>
						</li>
						<li <?php if (isset($ref)) if ($ref=='prov_rechazado') echo "class='active'";?>>
							<a href="?ref=prov_rechazado">Provedores mas rechazados</a>
						</li>
					</ul>    				
				</li>
			</ul>
		</div>
		<!-- /container -->
	</div>
	<!-- /subnavbar-inner -->
</div>