<div class="main">
			<div class="main-inner">
            			<div class="container">
                        			<div class="row">
<?php
$error=false;
include("conexion.php");
extract($_POST);

/****
	Si le pones require a todos los campos en el formulario HTML 
	no hace falta preguntar si se han colocado todos los campos, al menos no 
	en un proyecto simple, ya que no te deja enviar los datos si no se llenan todos
	los campos por eso estan de más, con poner uno solo basta ****/
if(isset($codigo_producto) )

{
	/***
	Aca habia una redundancia: 
			Si incluis el archivo "conexion.php" no hace falta volver a conectar
	

$con=mysql_connect($host,$user) or die ("problemas al conectar");//sirve para conectar con el servidor//

mysql_select_db($dateb,$con) or die ("Problemas al conectar la base de datos");//sirve para conectar con la base de datos//
		****/

$consulta="SELECT * FROM almacen_producto WHERE codigo_producto=".$codigo_producto;
	$resultado=mysql_query($consulta);

if (!$resultado)
		echo '<div class="alert alert-error">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>Error en la consulta</div>';
		
		
	if (mysql_num_rows($resultado)>0)
	{
		echo '<div class="alert alert-error">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button> El codigo de producto ya existe</div>';
		 
		
	}else{
	/****
	Aca habia un error grave: 
			Insertaba en la columna code_provedor de la TABLA y ese campo no se pedia
			en el formulario, eso daba error.
			
			Cuando usas una variable con $_POST[nombre] ese "nombre" va entre comillas
			simples o dobles, pero con comillas, sino te las interpreta como constantes
			que puedas haber definido antes; entonces te queda asi $_POST['nombre']
			
			Otra cosa: con el comando extract($_POST); se convierten todos los campos
			del formulario en variables con el mismo nombre, por eso las usas
			asi: $nombre  y no hace falta usar $_POST['nombre']
	  **/
$producto=mysql_query("INSERT INTO almacen_producto (codigo_producto, detalle_prod, fec_elab, fec_vec, ubicacion, precio_costo, marca, code_provedor, precio_venta, stock, minimo) VALUES ('".$codigo_producto."','".$detalle_prod."','".$fec_elab."','".$fec_vec."','".$ubicacion."','".$precio_costo."','".$marca."','".$code_provedor."','".$precio_venta."','".$stock."','".$minimo."')",$con);

if (!$producto)
		{
			echo '<div class="alert alert-error">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>Ocurrió un error al agregar producto</div>';
		}else{
			
	    echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> La operación se completó con EXITO</div>';
		}
	}
}
?>

<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Nuevo producto</h3>
            </div>
            <div class="widget-content">
          
<form  method="post" action="">
  <table  class="table table-striped table-bordered">
    <tr >
      <td >Codigo del producto:</td>
      <td ><input type="number" name="codigo_producto" required="required"/></td>
    </tr>
    <tr >
      <td>Codigo de proveedor:</td>
      <td><input type="number" name="code_provedor" required="required"/></td>
    </tr>
    <tr >
      <td >Detalle del producto: </td>
      <td><input type="text" name="detalle_prod" required="required" /></td>
    </tr>
    <tr >
      <td>Fecha de elaboracion: </td>
      <td><input type="date" name="fec_elab"  required="required"  placeholder="Ej: 2014-12-31"/></td>
    </tr>
    <tr>
      <td>Fecha de vencimiento: </td>
      <td><input type="date" name="fec_vec"  required="required" placeholder="Ej: 2014-12-31"/></td>
    </tr>
    <tr>
      <td>Ubicacion: </td>
      <td><input type="text" name="ubicacion" required="required" /></td>
    </tr>
    <tr>
      <td>Precio costo: </td>
      <td><div class="input-prepend input-append">
      <span class="add-on">$</span>
      <input class="span2"type="number" name="precio_costo" required="required"/></div></td>
    </tr>
     <tr>
      <td>Marca: </td>
      <td><input type="text" name="marca" required="required"/></td>
    </tr>
     <tr>
      <td>Precio de venta: </td>
      <td><div class="input-prepend input-append">
      <span class="add-on">$</span>
      <input class="span2"type="number" name="precio_venta" required="required"/></div></td>
    </tr>
    <tr>
      <td>Stock: </td>
      <td><input type="number" name="stock" required="required"/></td>
    </tr>
	<tr>
      <td>Minimo en ubicaci&oacute;n: </td>
      <td><input type="number" name="minimo" required="required"/></td>
    </tr>
    <tr>
      <td>
           
        </td>
        <td><input class="btn btn-primary" name="enviar" type="submit" required="required"  value="Enviar"/>   </td>
      
    </tr>
    
  </table>
</form>

        
     </div></div></div></div></div>