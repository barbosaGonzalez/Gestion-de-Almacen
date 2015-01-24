<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">                        
		<?php
			//conectar con la bd
			include("conexion.php");
			//$con= mysql_connect("localhost","root","");
			//mysql_select_db("stock",$con);
			$sql="select * from almacen_producto order by codigo_producto asc";
			//print_r($consulta);
			$consulta=mysql_query($sql,$con); // guarda un identificador de recursos (sesorces Id #4 )
			//$resultado=mysql_fetch_assoc($consulta); //convierte en un array
			//print_r($resultado);

			extract($_POST);
			if (isset($borrar))
			{
				$sql_borrar="DELETE FROM almacen_producto  WHERE  codigo_producto=".$codigo_producto;
				$borrar=mysql_query($sql_borrar);
				if(!$borrar)
				{
					echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>No es posible borrar el producto codigo: '.$codigo_producto.' debido al siguiente error: <br> '.mysql_error().'</div>';
				}else
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Producto borrado</div>';
			}
			if (isset($actualizar))
			{
				
				$sql_actualizar="UPDATE almacen_producto SET detalle_prod ='" .$detalle_prod."',marca = '".$marca."',ubicacion='".$ubicacion."',precio_venta=".$precio_venta.",precio_costo=".$precio_costo." WHERE codigo_producto=". $codigo_producto;
				
				$actualizar=mysql_query($sql_actualizar);
				
				if (!$actualizar)
				{
					echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>No se pudo actualizar el producto codigo: '.$codigo_producto.' ['.$detalle_prod.'] Debido al siguiente error<br>'.mysql_error().'</div>';
				}else
				{
					
					echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> El producto codigo: '.$codigo_producto.' ['.$detalle_prod.'] se actualizó con exito</div>';
				}
				
			}
			$consulta=mysql_query($sql,$con);
			if (isset($editar))
			{?>
				<div class="widget widget-table action-table">
					<div class="widget-header"> 
						<i class="icon-th-list"></i>
						<h3>Actualizar Producto</h3>
					</div>
					<div class="widget-content">
						<form method="post" action="">
							<table class="table table-striped table-bordered">
								<tr>
      <th  >Codigo</th>
      <td >
      <input disabled="disabled" type="text" name="codigo_producto" value="<?php echo $codigo_producto?>" /></td>
								</tr>
    <tr>
      <th  >Provedor</th>
      <td >
      <input disabled="disabled" type="text" name="code_provedor" value="<?php echo $code_provedor?>" /></td>
    </tr>
    
    <tr>
      <th  >Detalle</th>
      <td >
      <input type="text" name="detalle_prod" value="<?php echo $detalle_prod;?>"  /></td>
    </tr>
     <tr>
      <th  >Ubicacion</th>
      <td >
      <input type="text" name="ubicacion" value="<?php echo $ubicacion;?>"  /></td>
    </tr>
     <tr>
      <th  >Marca</th>
      <td >
      <input type="text" name="marca" value="<?php echo $marca;?>"  /></td>
    </tr>
     <tr>
      <th  >Fecha de Elaboracion</th>
      <td >
      <input disabled="disabled" type="date" name="fec_elab" value="<?php echo $fec_elab;?>"  /></td>
    </tr>
     <tr>
      <th  >Fecha de vencimiento</th>
      <td >
      <input disabled="disabled" type="date" name="fec_vec" value="<?php echo $fec_vec;?>"  /></td>
    </tr>
     <tr>
      <th  >Precio de Costo</th>
      <td >
      <input type="text" name="precio_costo" value="<?php echo $precio_costo;?>"  /></td>
    </tr>
     <tr>
      <th  >Precio de Venta</th>
      <td >
      <input type="text" name="precio_venta" value="<?php echo $precio_venta;?>"  /></td>
    </tr>
    <tr>
     <tr>
      <th  >Stock</th>
      <td >
      <input disabled="disabled" type="text" name="stock" value="<?php echo $stock;?>"  /></td>
    </tr>
      <th  >Accion</th>
      <td><input name="codigo_producto" type="hidden" value="<?php echo $codigo_producto?>" />
      <input type="submit" name="actualizar"  value="Actualizar" />
      </td>
    </tr>
  </table>
  </form>
  </div></div>
	<?php
}else{
?>
<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Lista de productos</h3>
            </div>
            <div class="widget-content">
  
<table class="table table-striped table-bordered">
    <tr >
      <th>Codigo</th>
      <th>Provedor</th>
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
    <?php
	while($resultado = mysql_fetch_assoc($consulta)){
		
	?>
    <tr >
      <td><?php echo $resultado["codigo_producto"]?></td>
      <td><?php echo $resultado["code_provedor"]?></td>
      <td><?php echo $resultado["detalle_prod"]?></td>
      <td><?php echo $resultado["fec_elab"]?></td>
      <td><?php echo $resultado["fec_vec"]?></td>
      <td><?php echo $resultado["ubicacion"]?></td>
      <td><?php echo $resultado["marca"]?></td>
       <td>$<?php echo $resultado["precio_costo"]?></td>
        <td>$<?php echo $resultado["precio_venta"]?></td>
         <td><?php echo $resultado["stock"]?></td>
      <td><form  method="post" action="">
      
      <input type="submit" name="editar" value="Editar"/>
  
      <input name="codigo_producto" type="hidden" value="<?php echo $resultado["codigo_producto"]?>" />
      <input name="code_provedor" type="hidden" value="<?php echo $resultado["code_provedor"]?>" />
      <input name="detalle_prod" type="hidden" value="<?php echo $resultado["detalle_prod"]?>" />
       <input name="fec_elab" type="hidden" value="<?php echo $resultado["fec_elab"]?>" />
        <input name="fec_vec" type="hidden" value="<?php echo $resultado["fec_vec"]?>" />
         <input name="marca" type="hidden" value="<?php echo $resultado["marca"]?>" />
         <input name="precio_costo" type="hidden" value="<?php echo $resultado["precio_costo"]?>" />
         <input name="precio_venta" type="hidden" value="<?php echo $resultado["precio_venta"]?>" />
         <input name="stock" type="hidden" value="<?php echo $resultado["stock"]?>" />
          <input name="ubicacion" type="hidden" value="<?php echo $resultado["ubicacion"]?>" /><input type="submit" name="borrar" value="Borrar"/></form></td>
    
    </tr>
    <?php
	}
	?>
    
    </table><div class="widget-header" align="center"> 
  <a class="btn btn-primary" href="./?ref=NuevoProducto">Nuevo producto</a></div>
    </div></div>
     
<?php
}
?>
       </div></div></body>