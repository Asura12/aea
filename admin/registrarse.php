<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/estilosc.css">
</head>
<body>
<header>
	
</header>
		
		<div id="form_login">
			
			<form class="form-group" action="controller_login.php" method="post">
			<h1 id="tit_res">Registrarse</h1>
				<p>
					<label class="w3-label">Nombre de usuario o correo electrónico</label>
					<input class="form-control col-10" type="text" name="usuario">
				</p>
				<p>
					<label class="w3-label">Password</label>
					<input class="form-control col-10 " type="password" name="pas">
				</p>
				<p>
					<input type="hidden" name="registrarse" value="registrarse">
					<button class="btn btn-primary">Registrarse</button>
				</p>
				<p><a href="cuenta.php">Ahora no</a></p>
			</form>
		</div>


</body>
</html>