<?php
require_once '../../vendor/autoload.php';
require_once '../../admin/conexion.php';
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Document</title>
</head>
<style>
    table {
   width: 100%;
   border: 1px solid #999;
   text-align: left;
   border-collapse: collapse;
   margin: 0 0 1em 0;
   caption-side: top;
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
</style>
<body>
    <div class="contenedor col-xl-6">
    <h1>Reporte de Lista de todos los practicante </h1>
    <table border ='1' class=' table '>
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
    $tabla=$mysql->query("SELECT dni,CONCAT(apePaterno,' ',apeMaterno,', ',nombres)as nomCompleto,fecha,horEntrada,horSalida FROM practicantes p left join detalle_asistencia d on p.dni=d.codPracticante_fk where fecha=DATE_FORMAT(NOW(), '%Y-%m-%d') or fecha<=>null");
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
$mpdf->writeHTML($hmtl);
$mpdf->Output();

?>