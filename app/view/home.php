<!DOCTYPE html>
<?php 
require_once '../../app/controller/home_controller.php';

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script type="text/javascript" src="../../js/jquery-3.4.0.js"></script>
    <link rel="stylesheet" href="../../bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="../../js/home.js"></script>
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Document</title>
<<<<<<< HEAD
   
</head>

<body>
    
=======
</head>

<body>
>>>>>>> ebab4aeeb3a7f23a16034bc5b1ec880d1ce5fd90
    <div class="main col-xl-11 col-md-12 col-12 row">
        <div class="contenedor col-xl-6">
            <div class="formulario-marcar">
                <h2>MARCAR ASISTENCIA</h2>
                <div class="form-row">
                    <div class="form-group col-12">
                        <select class="custom-select" id="select-practicante">
                            <option selected value="0">Escoger</option>
                            <?php for ($i = 0; $i < sizeof($totPracticantes); $i++) {
                                echo "<option class='";
                                if (empty($totPracticantes[$i]['horEntrada'])) {
                                    echo "incompleto";
                                } elseif (empty($totPracticantes[$i]['horSalida'])) {
                                    echo "salida";
                                } else {
                                    echo "completo";
                                }
                                echo "' value='" . $totPracticantes[$i]['dni'] . "'>" . $totPracticantes[$i]['nomCompleto'] . "</option>";
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div id="nombre-practicante" class='col-md-5 nombre-practicante'>
                        <p>
                            <i class="fa fa-address-card-o" aria-hidden="true"></i>
                            <span>Ningun practicante seleccionado</span>
                        </p>
                    </div>
                    <div id="opciones-practicante" class='col-md-7 row m-auto'>
                        <div class="col-12 col-md-6" id="div-button-ingreso">
                            <button class='btn btn-default col disabled' data-action='disable'>Registrar Entrada</button>
                        </div>
                        <div class="col-12 col-md-6" id="div-button-salida">
                            <button class='btn btn-default col disabled' data-action='disable'>Registrar Salida</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor col-xl-6">
            <div class="formulario-marcar">
                <h2>TABLA DE ASISTENCIA <?php echo date("d/m/Y"); ?></h2>
                <form action="">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>NOMBRES COMPLETOS</th>
                                    <th>HORA LLEGADA</th>
                                    <th>HORA SALIDA</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div>
            <a href="../../admin/cuenta.php"><input type="submit" value="Salir a menu principal" class="btn btn-danger"></a>
            <a href="listarpdf.php"><input type="submit" value="Documento pdf" class="btn btn-danger"></a>

            </div>
        </div>
    </div>
                            
</body>

</html>