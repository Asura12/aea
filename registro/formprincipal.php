<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location:../admin/index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="../js/jquery-3.4.0.js"></script>
    <script type="text/javascript" src="../js/funciones.js"> </script>
    <link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/sweetalert.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div id="contenedor" class="container">
       <button class=" btn btn-success" id="boton_nuevo" onclick="MformInsertar();">Ingresar Nuevo</button>
        <button class=" btn btn-success" id="boton_registro" onclick="Mdatoslistar();">Ingresar Lista</button>
     
    </div>

    <div id="ventana">

    </div>
</body>

</html>