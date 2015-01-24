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
					<a class="brand" href="index.php">
						Almacen 				
					</a>			
					<div class="nav-collapse">
						<ul class="nav pull-right"></ul>
					</div>
					<!--/.nav-collapse -->
				</div>
			<!-- /container -->
			</div>
			<!-- /navbar-inner -->
		</div>
		<!-- /navbar -->
		<?php 
			session_start();
			extract($_POST);
			$_SESSION['admin']=false;
			include("conexion.php");
			extract($_POST);
			if (isset($enviar))
			{
				$con_mail="select * from usuarios where correo='".$mail."'";
				$resultado=mysql_query($con_mail);
				$consulta="SELECT * FROM usuarios WHERE usuario='".$user."'";
				$resultado2=mysql_query($consulta);
				if (mysql_num_rows($resultado)>0)
				{
					echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>El 		correo ya exite</div>';
				}
				else
				{
					if(mysql_num_rows($resultado2)>0)
					{
						
						echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>El 		nombre de usuario ya exite</div>';
					}
					else
					{
						$user=mysql_query("INSERT INTO usuarios (Nombre, usuario, pass, correo) VALUES ('".$nomb."','".$user."','".$pass."','".$mail."')");
						if (!$user)
						{
							echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Ocurrió un error grave</div>';
						}
						else
						{
							echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> La operación se completó con EXITO</div>';
						}
					}
				}
			}
		?>
		<div class="account-container">
			<div class="content clearfix">
				<h1>Registro</h1>
				<div class="login-fields">
					<p>Por favor ingrese:</p>
					<form action="" method="post">
						<p>
						   Nombre Completo:<input type="text" name="nomb" required="required">
						   Correo Electronico:<input type="email" name="mail" required="required">
						   Nombre de usuario:<input type="text" name="user" required="required">
						   Contraseña:<input type="password" name="pass" required="required">
						</p>
						<p>
							<p></p>
							<input name="enviar" type="submit" class="button btn btn-success btn-large" value="Enviar">
						</p>
					</form>
				</div>
				<!-- /content -->
			</div>
			<!-- /account-container -->
		</div>
		<!-- /login-extra -->
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>