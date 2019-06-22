<?php
session_start();
if (!isset($_SESSION['usuario'])) {
	header('Location:index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Tu cuenta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="../js/funciones.js"> </script>
	<link rel="stylesheet" href="../css/estilosc.css">
	<script type="text/javascript" src="../js/jquery-3.4.0.js"></script>

</head>

<body>
	<div class="w3-container w3-black w3-center">
		<h1 > ADMIN</h1>
	</div>
	<div id="contenedor_cuenta" class="jumbotron jumbotron-fluid">
		<h1 id="tit" class="display-4">Presentación</h1>
		<div id="img_primera">
			<img src="../user.png" alt="">
		</div>
		<div id="esto">
			<P>AJASLDAasdsadad
				ssadasdsaad
			</P>
			
		</div>
		<div id="botones">
			<a href="../registro/formprincipal.php"><input type="submit" value="Ingresar al formulario" class="btn btn-primary"></a>
			<a href="../app/view/home.php"><input type="submit" value="Ingresar a la asistencia diaria" class="btn btn-primary"></a>
			<a href="registrarse.php"><input type="submit" value="Registrar un nuevo usuario" class="btn btn-secondary"></a>
			<a href="index.php"><input type="submit" value="Salir a menu principal" class="btn btn-danger"></a>
			
			
		</div>
	</div>



</body>

</html>