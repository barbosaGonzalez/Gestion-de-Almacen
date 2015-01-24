 <div class="main">
			<div class="main-inner">
            			<div class="container">
                        			<div class="row">
                                    
 <?php
//conectar con la bd
include("conexion.php");


extract($_POST);
if(isset($enviar) )

{

//$con=mysql_connect($host,$user) or die ("problemas al conectar");//sirve para conectar con el servidor//

//mysql_select_db($dateb,$con) or die ("Problemas al conectar la base de datos");//sirve para conectar con la base de datos//


$dev=mysql_query("INSERT INTO orden_de_devolucion(num_remito,cantidad_rechazada, motivo_de_rechazo)
VALUES ('".$num_remito."','".$cantidad_rechazada."','".$motivo_de_rechazo."')");
$update_estado=mysql_query("UPDATE remito SET cant_ingr=cant_ingr-".$cantidad_rechazada." where num_remito=".$num_remito);
$update_estado1=mysql_query("UPDATE remito SET estado='devolucion' where num_remito=".$num_remito);
	
	   echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> El remito: '.$num_remito.'  Ingreso al sistema</div>';

if (!$dev)
		{
			echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Ocurrió un error al agregar la orden de devolucion</div>';
		}else{
			
	   echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> La operación se completó con EXITO</div>';
	   
		}

	
}
if (isset($aceptar)){
	
	$update_remito=mysql_query("UPDATE almacen_producto SET stock=stock+$cant_ingr where codigo_producto=".		$codigo_producto);
	$consulta2=mysql_query($update_remito,$con);
	$update_estado=mysql_query("UPDATE remito SET estado='ingresado' where num_remito=".$num_remito);
	$consulta1=mysql_query($update_estado,$con);
	   echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> El remito: '.$num_remito.'  Ingreso al sistema</div>';
	   
	   
		}
		
	//$con= mysql_connect("localhost","root","");
//mysql_select_db("stock",$con);
$sql="select * from remito order by estado desc";
//print_r($consulta);
$consulta=mysql_query($sql,$con); // guarda un identificador de recursos (sesorces Id #4 )
//$resultado=mysql_fetch_assoc($consulta); //convierte en un array
//print_r($resultado);	
	?>
    <?php
if (isset($devolucion)){
	include("devolucion.php");
	}else{
?>
   	
<div class="widget widget-table action-table">
         <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Lista de Remitos</h3>
            </div>
            <div class="widget-content">
  
<table class="table table-striped table-bordered">
    <tr >
      <th>Numero</th>
      <th>Fecha de entrega</th>
      <th>Codigo de producto</th>
      <th>Cantidad</th>
      <th>Estado</th>
      <th>Accion</th>
     
    </tr>
    <?php
	while($resultado = mysql_fetch_assoc($consulta)){
		
	?>
    <tr >
      <td><?php echo $resultado["num_remito"]?></td>
      <td><?php echo $resultado["fecha_entr"]?></td>
      <td><?php echo $resultado["codigo_producto"]?></td>
      <td><?php echo $resultado["cant_ingr"]?></td>
      <td><?php echo $resultado["estado"]?></td>
      <td><form  method="post" action="">
      <?php if ($resultado["estado"]=='ingresado' || $resultado["estado"]=='devolucion' ){
		  echo ' <input type="button" name="rechazar" disabled="" value="'.$resultado["estado"].'"/>';
		 }else {
	 echo '<input type="submit" name="aceptar" value="Aceptar"/>
  

  	  <input type="submit" name="devolucion" value="Orden de devolucion"/>';
	}?>
      <input type="hidden" name="codigo_producto" value="<?php echo $resultado["codigo_producto"]?>"/>
        <input type="hidden" name="cant_ingr" value="<?php echo $resultado["cant_ingr"]?>"/>
        <input type="hidden" name="num_remito" value="<?php echo $resultado["num_remito"]?>"/>
     </form>
     </td>
   
      
    </tr>
    <?php
	}
	?>
    
    </table><div class="widget-header" align="center"> 
  <a class="btn btn-primary" href="./?ref=nuevoremito">Nuevo remito</a></div>
    </div></div>
     
       </div></div></body>
       <?php
	}
	   ?>
  
