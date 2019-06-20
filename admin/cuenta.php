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
		<h1> ADMIN</h1>
	</div>
	<div id="contenedor_cuenta">
		<div id="img_primera">
			<img src="../user.png" alt="">
		</div>
		<div id="esto">
			<P>AJASLDA</P>
			<P>AKLDHASLKASHD</P>
			<p>añdjaslkdahsdlaskd</p>
			<p>aldahlkdsahd</p>
		</div>
		<div id="botones">
			<a href="../registro/formprincipal.php"><input type="submit" value="Ingresar al formulario" class="btn btn-primary"></a>
			<a href="../app/view/home.php"><input type="submit" value="Ingresar a la asistencia diaria" class="btn btn-primary"></a>
			<a href="index.php"><input type="submit" value="Salir a menu principal" class="btn btn-danger"></a>
			<a href="registrarse.php"><input type="submit" value="Registrar un nuevo usuario" class="btn btn-secondary"></a>
		</div>
	</div>



</body>

</html>