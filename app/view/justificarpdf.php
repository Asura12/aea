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


</style>
<div id="">
     <img id="img_uni" src="../../UNI.png" alt="mmm">  <h1>ONE DIRECCTION 

</h1>
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