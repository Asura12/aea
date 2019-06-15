<?php

include('../admin/conexion.php');
$mysql = DB::conectar();
$ddn = $_POST["dn"];

$datos = $mysql->query("call pc_eliminar('$ddn') ");
if ($datos){
echo "Eliminado correctamente";

}
else{
    echo "No elimino";
}
