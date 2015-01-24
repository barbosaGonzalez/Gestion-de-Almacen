
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
extract($_REQUEST);
$ultimoid="select max(cod_orden)  from orden_de_compra";
$max=mysql_query($ultimoid);
$maxid=mysql_fetch_array($max);

	$m=$maxid[0];
	


//aca esta m
$m=$maxid[0]+1;

$sql="select * from provedores";
$prov=mysql_query($sql);
$prov1=mysql_query($sql);

/******
PARA EL BOTON FINLIZAR

***/
$sql_p="select * from provedores WHERE code_provedor=".$prove;
	$proved=mysql_query($sql_p);
	$row_p=mysql_fetch_array($proved);
/*** Falta validar que el finalizar no ande si no se a insertado nada ***/
if (isset($prove)){
	$sql_p="select * from provedores WHERE code_provedor=".$prove;
	$proved=mysql_query($sql_p);
	$row_p=mysql_fetch_array($proved);
	
}
if (isset($continuar)){
	/**
	Verificar si existe el producto antes de insertar
	**/
	$sql_verificar="SELECT * FROM almacen_producto WHERE codigo_producto=".$codigo_producto." and code_provedor=".$code_provedor ;
	$verificar=mysql_query($sql_verificar);
	if (mysql_num_rows($verificar)==0){
		/***
		Si el numero de filas que devuleve la consulta SQL es igual a cero
		quiere decir que el producto no está en el almacen*/
	
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>El 			producto ingresado no existe o No coreesponde a este provedor</div>';
	}else {
		$cabeza=mysql_query("select * from orden_de_compra where cod_orden=".$n_orden);
		if (mysql_num_rows($cabeza)==0){
			$sql_insert_compra="insert into orden_de_compra (code_provedor) values (".$code_provedor.")";	
		$insertar2=mysql_query($sql_insert_compra);
		if (!$insertar2){
			echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Ocurrió un error al guardar la orden de compra</div>';
		}else{
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>La orden de compra N°'.$n_orden.' se guardó correctamente</div>';
		}
			}
		
	$sql_insert_orden="insert into orden_producto (codigo_producto,cantidad,cod_orden) values (".$codigo_producto.",".$cantidad.",".$n_orden.")";
	
	$insertar=mysql_query($sql_insert_orden);
	}
	
}
		


?>
<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Orden de compra</h3>
            </div>
            <div class="widget-content">
<form action="./" method="post">
<table class="table table-striped table-bordered">
  <tr>
    <td>Codigo orden: <?php 
	if (isset($n_orden)) echo $n_orden; else echo $m;
	?></td>
    <td>Provedor Responsable/Codigo:
      <input disabled='disabled' type="text" value="<?php echo $row_p['nombre']?>"/>
    <input type="hidden"  name="code_provedor" type="text" value="<?php echo $row_p['code_provedor']?>"/>
	
</td>
    <td>Fecha de orden:  
      <input name=""value="<?php
echo date("d-m-y");
?>"type="text" disabled="disabled"></td>
	<td><input class="btn btn-primary" name="das" type="submit" value="Finalizar"></td>
  </tr>
</table>
</form></div></div>

  
    <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Ingrese un producto</h3>
            </div>
            <div class="widget-content">

<form action="" method="post">
<table class="table table-striped table-bordered">
  <tr>
    <td>Producto: 
      <input name="codigo_producto" placeholder="Producto" required="required"></td>
    <td>Cantidad: <input name="cantidad" type="number" placeholder="Cantidad" required="required"></td>
     <input type="hidden"  name="code_provedor" type="text" value="<?php echo $row_p['code_provedor']?>"/>
     <input type="hidden"  name="n_orden" type="text" value="<?php if (isset($n_orden)) echo $n_orden; else echo $m;?>"/>
<td><input class="btn btn-primary" name="continuar" type="submit" value="Continuar">
   </form></td>
  
</table>
</div></div></div>
                          <p>
                            <?php
							if (isset($n_orden)) $n=$n_orden; else $n=$m;
$sql_lista="select * from orden_producto where cod_orden=".$n;
$lista=mysql_query($sql_lista);
?>
                          </p>
                          <p>&nbsp; </p>
                          
                          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Listado</h3>
            </div>
            <div class="widget-content">
	<table class="table table-striped table-bordered">
  <tr>
    <td>Codigo producto</td>
    <td>Descripcion</td>
    <td>Marca</td>
    <td>Precio U</td>
    <td>Cantidad</td>
    <td>SubTotal</td>
  </tr>
  <tr>
  
  <?php 
  $total=0;
  while($array_lista= mysql_fetch_assoc($lista)){
  		$sql_prod="select * from almacen_producto where codigo_producto=".$array_lista['codigo_producto'];
		$prod=mysql_query($sql_prod);
		$array_prod=mysql_fetch_assoc($prod);
		$subtotal=$array_prod['precio_venta']*$array_lista['cantidad'];
		$total=$total+$subtotal;
  ?>
   <td><?php echo $array_prod['codigo_producto'] ?></td>
    <td><?php echo $array_prod['detalle_prod'] ?></td>
    <td><?php echo $array_prod['marca'] ?></td>
    <td>$ <?php echo $array_prod['precio_venta'] ?></td>
    <td><?php echo $array_lista['cantidad'] ?></td>
    <td>$ <?php echo $subtotal ?></td>
  </tr>
  <?php
}

  ?>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Total: </td>
  <td>$<?php echo $total ?></td>
</table>
    </div></div></div>
      

            <!-- /widget-content --> 
          </div>
                                    </div></div></div></div>
