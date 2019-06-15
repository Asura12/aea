<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
  

    <script type="text/javascript" src="../js/funciones.js"> </script>
   
    <title>Empleados</title>
</head>

<body>

    <div id="formulario_insetar" class="container">
        <form autocomplete="off" name="form" id="form" class="form-group col-md-10">
            <div class="form-row">
                <h3 id="h3_titu">Formulario de Registro de practicantes</h3>
                <div class="form-group col-md-6">
                    <label>Dni:</label>
                    <input type="text" class="form-control" name="dni"  id="dni"  placeholder="Escriba dni..." maxlength="8">
                    
                </div>
                <div class="form-group col-md-6">
                    <label>A. Paterno:</label>
                    <input type="text" class="form-control" name="apePa" id="apePa" placeholder="Escriba su apellido Paterno...">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>A. Materno:</label>
                    <input type="text" class="form-control" name="apeMa" id="apeMa" placeholder="Escriba su apellido Materno...">
                </div>
                <div class="form-group col-md-6">
                    <label>Nombres:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escriba su Nombres...">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" name="fech" id="fech" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label>Género:</label>
                    <select type="text" class="form-control" name="s" id="s" placeholder="Seleccione género...">
                        <option value="">Seleccione su género</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>CodTurno:</label>
                    <select type="text" class="form-control" name="ct" id="ct" placeholder="Seleccione género...">
                        <option value="">Seleccione su código</option>
                        <option value="T1">T1</option>
                        <option value="T2">T2</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Descripción:</label>
                    <textarea type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Escriba una descripción suya..."></textarea>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" id="btn-yola">Enviar</button>
            <button class="btn  btn-danger" type="button" id="btn-salir">Volver</button>
        </form>

    </div>

</body>

</html>