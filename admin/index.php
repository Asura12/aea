<?php
session_start();
unset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>formulario</title>
  <link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="../css/estilos.css">

  <script src="../js/jquery-3.2.1.js"></script>
  <script src="../js/script.js"></script>
  <script src="../js/all.js"></script>
</head>

<body>
  <div class="formulario">
    <div class="contact_info">
      <section class="info_title">
        <span class="fas fa-user-circle" id="we"></span>
        <h2>INFORMACION<br>DE CONTACTO</h2>
      </section>
      <section class="info_items">
        <p><span class="fas fa-envelope"></span> &nbsp;info.contact@gmail.com</p>
        <p><span class="fas fa-mobile-alt"></span> &nbsp; 959436678</p>
      </section>
    </div>
    <div>
       <form action="controller_login.php" method="post" class="form_contact">
       <h2>Ingrese su Usuario</h2>
        <p>
          <label class="usuarios">
            Usuario
          </label>
          <input type="text" name="usuario" id="usuario" class="form-control ">
        </p>
         <!-- <p>
          <label class="aeamongol">
            Password
          </label>
          <input type="password" name="pas " id="pas" class="form-control">
        </p>
       
       
        <p>Si aún no tienes cuenta ve al siguiente link <a href="registrarse.php">Registrarse</a></p>
      </form> --> 
      <!-- <form class="w3-container" action="controller_login.php" method="post"> -->
		<!-- <p>
			<label class="w3-label">
				Usuario
			</label>
			<input class="w3-input w3-border " type="text" name="usuario">
		</p> -->
		<p>
			<label class="password">Password</label>
			<input class="form-control" type="password" name="pas" id="pas">
		</p>
		<!-- <p>
			<input type="hidden" name="entrar" value="entrar">
			<button class="w3-btn w3-green">Aceptar</button>
    </p> -->
     <!-- <p>
        <input type="hidden" value="entrar"  name="entrar">
          
        <button class="btn btn-primary"  >Enviar</button>
        </p>
        -->
        <p>
        <input type="hidden" value="entrar"  name="entrar">
          
        <button class="btn btn-primary"  >Enviar</button>
        </p>
		<p>Si aún no tienes cuenta ve al siguiente link <a href="registrarse.php">Registrarse</a></p>
	</form>
    </div>
  </div>
</body>

</html>