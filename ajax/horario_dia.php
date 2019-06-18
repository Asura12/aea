<?php 
require_once '../admin/conexion.php';
require_once '../app/model/Practicante.php';
$obj= new Practicante();
echo $obj->HorarioDia();