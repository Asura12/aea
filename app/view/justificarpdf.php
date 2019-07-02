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
    
    <title>pdf justificado</title>
</head>
<body>
<style>

h1{
text-align: center;
align-items: center;
font-family: 'Open sans';
padding-top: 30px;
}
#img_uni{
    flex: right;
    height: 100px;
    width: 80px;
    position: relative;
    float: right ;


}   
caption, td, th {
   padding: 0.3em;
}
th, td {
   border-bottom: 1px solid #999;
   width: 25%;
}
caption {
   font-weight: bold;
   font-style: italic;
}
#tbxd{
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
h2{
    padding: 20px;
    text-align: center;
    font-family:'Open sans';

}

</style>
<div id="">
     <img id="img_uni" src="../../UNI.png" alt="mmm">  <h1>Lista de Tardanzas

</h1>
    </div> 
    <div>
 <h2>REPORTE TARDANZA </h2>
    <table class=' table ' id ='tbxd'>
        <thead class='thead-dark'>
            <tr>
        <th scope='col '>DNI</th>
        <th  scope='col'>Nombres</th>
        <th  scope='col'>Hora llegada</th>
        <th  scope='col'>Hora salida</th>
        </tr>
        </thead>
        <tbody>
        <?php
    $mysql=DB::conectar();
    $tabla=$mysql->query("SELECT dni,CONCAT(apePaterno,' ',apeMaterno,', ',nombres)as nomCompleto,fecha,horEntrada,horSalida,estado FROM practicantes p left join detalle_asistencia d on p.dni=d.codPracticante_fk where estado=1 AND  fecha=DATE_FORMAT(NOW(), '%Y-%m-%d') or fecha<=>null");
foreach ($tabla as $dato) {
    echo "<tr >";
    echo "<td >" . $dato['dni'] . "</td>";
    echo "<td >" . $dato['nomCompleto'] . "</td>";
    echo "<td >" . $dato['horEntrada'] . "</td>";
    echo "<td >" . $dato['horSalida'] . "</td>";
   echo "</tr>";
   
}

    ?>
    </tbody>
</table>

    </div>
 

</body>
</html>

<?php

$hmtl=ob_get_clean();
$mpdf=new \Mpdf\Mpdf();
$mpdf->setHtmlFooter(utf8_encode('
          <table style="width:100%;font-size:9px;">
                  <tr>
                      <td>'.strtoupper(strftime("%A, %d de %B del %Y a las %I:%M ",time()).((strftime("%H",time())>=12)?"PM":"AM")).'
                      </td>
                      <td><b>PAG. {PAGENO} / {nbpg}</b></td>
                  </tr>
          </table>'));
$mpdf->writeHTML($hmtl);
$mpdf->Output();

?>