<div class="main">
			<div class="main-inner">
            			<div class="container">
                       
                        			<div class="row">
                                     
<?php
$error=false;
include("conexion.php");
extract($_POST);

?>
<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Orden de devolucion</h3>
            </div>
            <div class="widget-content">
    
        
<form  method="post" action="./?ref=listaremito">
  <table  class="table table-striped table-bordered">
   
    <tr>
      <td>Numero de remito: </td>
      <td><input  name="num_remito" disabled="disabled" value="<?php echo $num_remito ?>"  required="required" maxlength=4 /></td>
    </tr>
    <tr >
      <td>Cantidad Rechazada: </td>
      <td><input type="number" name="cantidad_rechazada" max="<?php echo $cant_ingr ?>" min="1" required="required" /> Maximo de rechazo <?php echo $cant_ingr ?> unidades</td>
    </tr>
    <tr >
      <td>Motivo de rechazo: </td>
      <td><input type="text" name="motivo_de_rechazo" required="required" /></td>
    </tr>
   
    <tr>
      <td></td>
      <td>
        <input class="btn btn-primary" name="enviar" type="submit" required="required" id="Enviar" value="Enviar"/>      
        </td>
      
    </tr>
     <input type="hidden" name="num_remito" value="<?php echo $num_remito?>"/>
  </table>
</form>
   
   </div></div></body>