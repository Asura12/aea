<?php
include('../admin/conexion.php');


$ddn = $_POST['dn'];
$mysql = DB::conectar();
$resultado=$mysql->query("SELECT Count(*) as total FROM practicantes where dni =' $ddn';");
$rs = $resultado->fetch(PDO::FETCH_ASSOC);

if($rs["total"] === "0"){
     $ddn = $_POST['dn'];
     $dap = $_POST['ap'];
     $dam = $_POST['am'];
     $dnom = $_POST['nom'];
     $dfecN = $_POST['fecN'];
     $dsex = $_POST['sex'];
     $dcod = $_POST['cod'];
     $ddes = $_POST['des'];
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
          echo $rs["total"];
     } else {
          // echo "No registrado correctamente";
     }
}else{  
     echo $rs["total"];
}



   

