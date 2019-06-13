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
    <script type="text/javascript" src="../js/validar.js"> </script>
    <script type="text/javascript" src="../js/jquery-3.4.0.js"></script>

</head>
<body>
	<div class="w3-container w3-black w3-center">
		<h1> ADMIN</h1>
	</div>
	<p></p>
	<form class="w3-container" action="controller_login.php" method="post">
	<div id="contenedor">
   <input type="submit" >
    </div>
		<input type="hidden" name="salir" value="salir">
		<button class="btn btn-danger">Salir</button>
		
	</form>
	
	
</body>
</html>