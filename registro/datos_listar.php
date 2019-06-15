<?php
include("../admin/conexion.php");
$mysql = DB::conectar();
$tabla = $mysql->query("SELECT * FROM practicantes");
echo "<div id='form_tabla' >";
echo "<table border ='1' class=' table table-striped table-hover  table-bordered table-responsive'>
        <thead class='thead-dark'>
        <th scope='col '>DNI</th>
        <th  scope='col'>Ape Paterno</th>
        <th  scope='col'>Ape Materno</th>
        <th  scope='col'>Nombres</th>
        <th  scope='col'>fec Nacimiento</th>
        <th  scope='col'>Sexo</th>
        <th  scope='col'>Cod Turno</th>
        <th scope='col'>Opciones</th>
        <tbody>
";
foreach ($tabla as $row) {
    echo "<tr >";
    echo "<td >" . $row['dni'] . "</td>";
    echo "<td >" . $row['apePaterno'] . "</td>";
    echo "<td >" . $row['apeMaterno'] . "</td>";
    echo "<td >" . $row['nombres'] . "</td>";
    echo "<td >" . $row['fecNacimiento'] . "</td>";
    echo "<td >" . $row['sexo'] . "</td>";
    echo "<td >" . $row['codTurno_fk'] . "</td>";
    echo "<td><a style='cursor:pointer' onclick='Modificar(" . $row['dni'] . ");'>Modificar</a>&nbsp;&nbsp;|&nbsp;&nbsp;";
    echo "<a style='cursor:pointer' onclick='Eliminar(" . $row['dni'] . ")'>Eliminar</a></td>";
    echo "</tr>";
    echo"</div>";
} /*
while ($row = mysqli_fetch_array($tabla)){
    echo "<tr>";
    echo "<td>" .$row['dni']."</td>";
    echo "<td>" .$row['apePaterno']."</td>";
    echo "<td>" .$row['apeMaterno']."</td>";
    echo "<td>" .$row['nombres']."</td>";
    echo "<td>" .$row['fecNacimiento']."</td>";
    echo "<td>" .$row['sexo']."</td>";
    echo "<td>" .$row['codTurno_fk']."</td>";
    echo "</tr>";
}*/
echo "</tbody></table>";
