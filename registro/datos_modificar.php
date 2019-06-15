<?php
include('../admin/conexion.php');
$ddn=$_POST['dn'];

$dap=$_POST['ap'];
$dam=$_POST['am'];
$dnom=$_POST['nom'];
$dfecN=$_POST['fecN'];
$dsex=$_POST['sex'];
$dcod=$_POST['cod'];
$ddes=$_POST['des'];

$mysql=DB::conectar();
$resultado=$mysql->prepare("call pc_modificar(:ddn,:dap,:dam,:dnom,:dfecN,:dsex,:dcod,:ddes)");
$resultado->bindValue("ddn",$ddn);
$resultado->bindValue("dap",$dap);
$resultado->bindValue("dam",$dam);
$resultado->bindValue("dnom",$dnom);
$resultado->bindValue("dfecN",$dfecN);
$resultado->bindValue("dsex",$dsex);
$resultado->bindValue("dcod",$dcod);
$resultado->bindValue("ddes",$ddes);
$resultado->execute();

if($resultado){     
echo "Registrado correctamente";

}else{  
     echo "No registrado correctamente";
}
