 <div class="main">
			<div class="main-inner">
            			<div class="container">
                        			<div class="row">
                                    
 <?php
//conectar con la bd
include("conexion.php");
//$con= mysql_connect("localhost","root","");
//mysql_select_db("stock",$con);
$sql="select * from provedores order by code_provedor asc";
//print_r($consulta);
$consulta=mysql_query($sql,$con); // guarda un identificador de recursos (sesorces Id #4 )
//$resultado=mysql_fetch_assoc($consulta); //convierte en un array
//print_r($resultado);

extract($_POST);
if (isset($borrar)){
	$sql_borrar="DELETE FROM provedores  WHERE  code_provedor=".$code_provedor;
		$borrar=mysql_query($sql_borrar);
	    if(!$borrar){
			echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>No es posible borrar el provedor codigo: '.$code_provedor.' debido al siguiente error: <br> '.mysql_error().'</div>';
		}else
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Provedor borrado</div>';
	}
if (isset($actualizar)){
		
		$sql_actualizar="UPDATE provedores SET nombre='".$nombre."', telefono =" .$telefono.",correo_electronico = '".$correo_electronico."', direccion= '".$direccion."', marca_prov = '".$marca_prov."' WHERE code_provedor=". $code_provedor;
		
		$actualizar=mysql_query($sql_actualizar,$con);
		
		if (!$actualizar)
		{
			 echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Ocurrió un error al actualizar provedor</div>';
		}else{
			
	   echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> El provedor codigo: '.$code_provedor.' se actualizó con exito</div>';
		}
		
		}
		$consulta=mysql_query($sql,$con);

	?>



    

<?php if (isset($editar)){?>
<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Actualizar Provedor</h3>
            </div>
            <div class="widget-content">
<form method="post" action="">
	<table class="table table-striped table-bordered">
    <tr>
      <th  >Codigo</th>
      <td >
      <input disabled="disabled" type="text" name="code_provedor" value="<?php echo $code_provedor?>" /></td>
    </tr>
    <tr>
      <th  >Nombre</th>
      <td >
      <input type="text" name="nombre" value="<?php echo $nombre;?>"  /></td>
    </tr>
     <tr>
      <th  >Telefono</th>
      <td >
      <input type="text" name="telefono" value="<?php echo $telefono;?>"  /></td>
    </tr>
     <tr>
      <th  >E-mail</th>
      <td >
      <input type="text" name="correo_electronico" value="<?php echo $correo_electronico;?>"  /></td>
    </tr>
     <tr>
      <th  >Direccion</th>
      <td >
      <input type="text" name="direccion" value="<?php echo $direccion;?>"  /></td>
    </tr>
     <tr>
      <th  >Marca</th>
      <td >
      <input type="text" name="marca_prov" value="<?php echo $marca_prov;?>"  /></td>
    </tr>
    <tr>
      <th  >Accion</th>
      <td><input name="code_provedor" type="hidden" value="<?php echo $code_provedor?>" />
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
              <h3>Lista de provedores</h3>
            </div>
            <div class="widget-content">
  
<table class="table table-striped table-bordered">
    <tr >
      <th>Codigo de provedor</th>
      <th>Nombre de provedor</th>
      <th>Telefono</th>
      <th>E-mail</th>
      <th>Direccion</th>
      <th>Accion</th>
     
    </tr>
    <?php
	while($resultado = mysql_fetch_assoc($consulta)){
		
	?>
    <tr >
      <td><?php echo $resultado["code_provedor"]?></td>
      <td><?php echo $resultado["nombre"]?></td>
      <td><?php echo $resultado["telefono"]?></td>
      <td><?php echo $resultado["correo_electronico"]?></td>
      <td><?php echo $resultado["direccion"]?></td>
      <td><form  method="post" action="">
        
        <input type="submit" name="editar" value="Editar"/>
        
        <input name="code_provedor" type="hidden" value="<?php echo $resultado["code_provedor"]?>" />
        <input name="nombre" type="hidden" value="<?php echo $resultado["nombre"]?>" />
        <input name="telefono" type="hidden" value="<?php echo $resultado["telefono"]?>" />
        <input name="correo_electronico" type="hidden" value="<?php echo $resultado["correo_electronico"]?>" />
        <input name="direccion" type="hidden" value="<?php echo $resultado["direccion"]?>" />
        <input name="marca_prov" type="hidden" value="<?php echo $resultado["marca_prov"]?>" /><input type="submit" name="borrar" value="Borrar"/> <td><a class="btn btn-secundary" href="./?ref=rechazado">Provedor Rechazado</a></td>
        </form></td>
      
      
      
    </tr>
    <?php
	}
	?>
    
    </table><div class="widget-header" align="center"> 
  <a class="btn btn-primary" href="./?ref=NuevoProv">Nuevo provedor</a></div>
    </div></div>
     
<?php
}
?>
       </div></div></body>
  
