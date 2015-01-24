<div class="main">
			<div class="main-inner">
            			<div class="container">
                       
                        			<div class="row">
                                     
<?php
$error=false;
include("conexion.php");
if(isset($_POST['codigo']) && !empty($_POST['codigo']) && isset ($_POST['nombre']) && !empty ($_POST['nombre']) &&
isset ($_POST['tel']) && !empty ($_POST['tel']) && isset ($_POST['email']) && !empty ($_POST['email']) &&
isset ($_POST['dir']) && !empty ($_POST['dir']) && isset ($_POST['marca']) && !empty ($_POST['marca'])) 
{

//$con=mysql_connect($host,$user) or die ("problemas al conectar");//sirve para conectar con el servidor//

//mysql_select_db($dateb,$con) or die ("Problemas al conectar la base de datos");//sirve para conectar con la base de datos//

$consulta="SELECT*FROM `provedores` WHERE `code_provedor`=".$_POST['codigo'];

$resultado=mysql_query($consulta);
if (!$resultado)
		
			echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Error en la consulta</div>';
		
		
	if (mysql_num_rows($resultado)>0)
	{
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>El codigo de provedor ya existe</div>';
		 
		
	}else{

$nuevo_prov=mysql_query("INSERT INTO provedores (code_provedor, nombre, telefono, correo_electronico, direccion, marca_prov)
VALUES ('$_POST[codigo]','$_POST[nombre]','$_POST[tel]','$_POST[email]','$_POST[dir]','$_POST[marca]')",$con)  ;
if (!$nuevo_prov)
		{
			echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Ocurrió un error al agregar provedor</div>';
		}else{
			
	   echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> La operación se completó con EXITO</div>';
		}

	}

}
?>
<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Nuevo Provedor</h3>
            </div>
            <div class="widget-content">
    
        
<form  method="post" action="">
  <table  class="table table-striped table-bordered">
    <tr>
      <td>Codigo de provedor:</td>
      <td><input type="number" name="codigo" maxlength=4 required="required"/></td>
    </tr>
    <tr>
      <td>Nombre de provedor: </td>
      <td><input type="text" name="nombre" required="required" /></td>
    </tr>
    <tr>
      <td>Telefono de provedor: </td>
      <td><input type="number" name="tel"  required="required"/></td>
    </tr>
    <tr>
      <td>Correo electronico: </td>
      <td><input type="email" name="email"  required="required"/></td>
    </tr>
    <tr >
      <td>Direccion: </td>
      <td><input type="text" name="dir" required="required" /></td>
    </tr>
    <tr>
	<tr >
      <td>Marca: </td>
      <td><input type="text" name="marca" required="required" /></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input class="btn btn-primary" name="Enviar" type="submit" required="required" id="Enviar" value="Enviar"/>      
        </td>
    </tr>
  </table>
</form>
   </div></div></div></div></div>