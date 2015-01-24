<?php 
session_start();
extract($_POST);
$_SESSION['admin']=false;
include("conexion.php");
if (isset($enviar)){
	$consulta="SELECT * FROM usuarios WHERE usuario='".$userd."' AND pass='".$passd."'";
	$usu=mysql_query($consulta);
	if(!$usu){
		echo "false rutn";
	}else{
		
			if(mysql_num_rows($usu)==0){
				//echo "CERO::: user: ".$userd." Pass:". $passd;
				//
				}else{
					//echo "MAS DE CERO::: user: ".$userd." Pass:". $passd;
					$_SESSION['admin']=true;
				header("Location: ./");
				}
				
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
  
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="login.php">
				Almacen 				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					
					
					
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
		
		
			<h1>Ingresar</h1>		
			
			<div class="login-fields">
				
				<p>Por favor ingrese:</p>
				
				<div class="field">
             <form action="" method="post">
					<label for="username">Usuario</label>
					<input type="text"  name="userd" placeholder="Ususario" class="login username-field" autofocus />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Contraña::</label>
					<input type="password" name="passd" placeholder="Contraseña" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				
									
				<input name="enviar" type="submit" class="button btn btn-success btn-large" value="Ingresar">
				<a class="button btn btn-success btn-large" href="registro.php">Registrarse</a>
            </form>
	</div> <!-- .actions -->
			
			
			
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



 <!-- /login-extra -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>



</body>

</html>
