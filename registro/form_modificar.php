<?php
include('../admin/conexion.php');
$mysql = DB::conectar();
$ddn = $_POST["dn"];
$consulta = "SELECT * FROM practicantes WHERE dni ='$ddn'";


$datos = $mysql->query($consulta);
foreach ($datos as $fila) {
    $dap = $fila['apePaterno'];
    $dam = $fila['apeMaterno'];
    $dnom = $fila['nombres'];
    $dfecN = $fila['fecNacimiento'];
    $dsex = $fila['sexo'];
    $dcod = $fila['codTurno_fk'];
    $ddes = $fila['descripcion'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="../js/funciones.js"> </script>
    <script type="text/javascript" src="../js/jquery-3.4.0.js"></script>
    <link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Document</title>
</head>

<body>
    <div id="formulario_insetar">
        <form autocomplete="off" name="form" id="form" class="form-group col-md-10">
            <div class="form-row">
                <input type="hidden" id="cod_tur" value="<?php echo $dcod; ?>">
                <input type="hidden" id="cod_sex" value="<?php echo $dsex; ?>">
                <h3 id="h3_titu">Formulario de actualizacion practicantes</h3>
                <div class="form-group col-md-6">
                    <label>Dni:</label>
                    <input type="text" class="form-control" name="dni" id="dni" maxlength="8" disabled="true"  value="<?php echo $ddn; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>A. Paterno:</label>
                    <input type="text" class="form-control" name="apePa" id="apePa" value="<?php echo $dap; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>A. Materno:</label>
                    <input type="text" class="form-control" name="apeMa" id="apeMa" value="<?php echo $dam; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Nombres:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $dnom; ?>">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" name="fech" id="fech" value="<?php echo $dfecN; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Género:</label>
                    <select type="text" class="form-control" name="s" id="s" >
                        <option value="">Seleccione su género</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>CodTurno:</label>
                    <select type="text" class="form-control" name="ct" id="ct" >
                        <option value="">Seleccione su código</option>
                        <option value="T1">T1</option>
                        <option value="T2">T2</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Descripción:</label>
                    <textarea type="text" class="form-control" name="descripcion" id="descripcion" ><?php echo $ddes; ?></textarea>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" id="btn-hola" >Aceptar</button>
            <button class="btn  btn-danger" type="button" id="btn-salir">Volver</button>
        </form>

    </div>


</body>

</html>

<script>
    $(document).ready(function(){
        $("#ct").val($("#cod_tur").val());
        $("#s").val($("#cod_sex").val());
    })
</script>