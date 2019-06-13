<?php
include('../admin/conexion.php');
$ddn = $_POST['dn'];

$dap = $_POST['ap'];
$dam = $_POST['am'];
$dnom = $_POST['nom'];
$dfecN = $_POST['fecN'];
$dsex = $_POST['sex'];

$dcod = $_POST['cod'];
$ddes = $_POST['des'];
// echo"--------------";
// echo "<br>";
// echo "dni -> ". $ddn;
// echo "<br>";
// echo "dap -> ". $dap;
// echo "<br>";
// echo "dam -> ". $dam;
// echo "<br>";
// echo "dnom -> ". $dnom;
// echo "<br>";
// echo "dfecN -> ". $dfecN;
// echo "<br>";
// echo "dsex -> ". $dsex;
// echo "<br>";
// echo "cod -> ". $dcod;
// echo "<br>";
// echo "des -> ". $ddes;
// echo "<br>";
$mysql = DB::conectar();
$resultado = $mysql->prepare("call pc_insertar(:ddn,:dap,:dam,:dnom,:dfecN,:dsex,:dcod,:ddes)");
$resultado->bindValue("ddn", $ddn);
$resultado->bindValue("dap", $dap);
$resultado->bindValue("dam", $dam);
$resultado->bindValue("dnom", $dnom);
$resultado->bindValue("dfecN", $dfecN);
$resultado->bindValue("dsex", $dsex);
$resultado->bindValue("dcod", $dcod);
$resultado->bindValue("ddes", $ddes);
$resultado->execute();
if ($resultado) {
     echo "Registrado correctamente";
} else {
     echo "No registrado correctamente";
}
