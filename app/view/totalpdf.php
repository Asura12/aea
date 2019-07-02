<?php
require_once '../../vendor/autoload.php';
require_once '../../admin/conexion.php';
setlocale(LC_TIME, 'spanish');
setlocale(LC_TIME, 'es_ES.UTF-8');
date_default_timezone_set('America/Bogota');
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    h1 {
        text-align: center;
        align-items: center;
        font-family: 'Open sans';
        padding-top: 30px;
    }

    #img_uni {
        flex: right;
        height: 100px;
        width: 80px;
        position: relative;
        float: right;


    }

    caption,
    td,
    th {
        padding: 0.3em;
    }

    th,
    td {
        border-bottom: 1px solid #999;
        width: 25%;
    }

    caption {
        font-weight: bold;
        font-style: italic;
    }

    #tbxd {
        width: 750px;
        height: 530px;
        margin: 70px auto;
        border-radius: 10px;
        overflow: hidden;
        width: 100%;
        border: 1px solid #999;
        text-align: center;
        border-collapse: collapse;
        margin: 0 0 1em 0;
        caption-side: top;
        font-family: 'Open sans';
    }

    h2 {
        padding: 20px;
        text-align: center;
        font-family: 'Open sans';

    }
</style>

<body>
    <div id="">
        <img id="img_uni" src="../../UNI.png" alt="mmm">
        <h1>Lista de Horas totales

        </h1>
    </div>
   
    <div>
        <table  id="tbxd">
            <thead class='thead-dark'>
                <tr>
                    <th scope='col ' >Codigo</th>
                    <th scope='col '>Nombre Completo</th>
                    <th scope='col '>Horas</th>
                </tr>
            </thead>   
            <tbody>
         <?php
         
          $mysql=DB::conectar();
         $ts=$mysql->prepare("call sp_asistencia_apoyo_suma_horTotales()");
         $ts->execute();
            foreach ($ts as $valor) {
            ?>
         <tr>
                    <td ><?php echo $valor["codPracticante_fk"]?></td>
                    <td><?php echo $valor["nomCompleto"]?></td>
                    <td><?php echo $valor["horas"]?></td>
                </tr>

 <?php           }
        ?>
        </tbody>
        </table> 
    </div>
</body>

</html>

<?php

$hmtl = ob_get_clean();
$mpdf = new \Mpdf\Mpdf();
$mpdf->setHtmlFooter(utf8_encode('
          <table style="width:100%;font-size:9px;">
                  <tr>
                      <td>' . strtoupper(strftime("%A, %d de %B del %Y a las %I:%M ", time()) . ((strftime("%H", time()) >= 12) ? "PM" : "AM")) . '
                      </td>
                      <td><b>PAG. {PAGENO} / {nbpg}</b></td>
                  </tr>
          </table>'));
$mpdf->writeHTML($hmtl);
$mpdf->Output();

?>