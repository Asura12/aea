<?php
class Practicante
{
    private $dni;
    private $apePaterno;
    private $apeMaterno;
    private $nombre;
    private $fecNacimiento;
    private $sexo;
    private $codTurno_fk;
    private $descripcion;

    public function Practicante(){
        
    }
    public function verPracticantes(){
      
        $mysqli=DB::conectar();
        $stm=$mysqli->prepare("call listaAlumnos()"); 
        /* QUERY */
        $stm->execute();
      //  $rs=$stm->get_result();
        $array=[];
        foreach($stm as $row){
           /* echo $row["dni"];
            echo "<br>";*/
         $array[]=$row;
        }
       
        /*
        $array=[];
        while ($myrow = $rs->fetch_assoc()) {
            $array[]=$myrow;
        }*/
       return $array;
    }
    public function marcarAsistencia($accion){
       
        $mysqli= DB::conectar();
        $stm=$mysqli->prepare("call marcarAsistencia(:codigo,:accion)");
        $stm->bindValue("accion",$accion);
        $stm->bindValue("codigo",$this->dni);
        $stm->execute();
        //$rs=$stm->get_result();
        if(!$stm){
            echo $stm->error;
        }
        return true;
    }
    public function HorarioDia(){
     
        $mysqli= DB::conectar();
        $stm=$mysqli->prepare("call horario_dia()");
        $stm->execute();
        $array=[];
        foreach($stm as $row){
            $array[]=$row;
        }/*
        $rs=$stm->get_result();
        $array=[];
        while ($myrow = $rs->fetch_assoc()) {
            $array[]=$myrow;
        }*/
        $json=json_encode($array,JSON_FORCE_OBJECT);
        return $json;
    }
    public function verificarAsistencia(){
     
        $mysqli=DB::conectar();
        $stm=$mysqli->prepare("call verificar_asistencia($this->dni);");
        $stm->execute();
        // $rs=$stm->get_result();
        // $myrow = $rs->fetch_assoc();
        $array=[
            "entrada"=>"",
            "salida"=>"",
            "fecha" =>""
        ];
        foreach ($stm as $fila) {
            if($fila['conIngreso']==1){
                $array['entrada']="<button class='btn btn-default active col disabled' data-action='disable'>Ya Registró entrada</button>";
            }elseif($fila['conIngreso']==0){
                $array['entrada']="<button class='btn btn-default active col ' data-action='enable'>Registrar Entrada</button>";
            }
            if($fila['conSalida']==1){
                $array['salida']="<button class='btn btn-default active col disabled' data-action='disable'>Ya Registró salida</button>";
            }elseif($fila['conSalida']==0){
                $array['salida']="<button class='btn btn-default active col ' data-action='enable'>Registrar salida</button>";
            }
            if(isset($fila['fecha'])){
                $array["fecha"]=$fila['fecha'];
            } 
        }
       
            #print_r($rs->num_rows);
            $json=json_encode($array,JSON_FORCE_OBJECT);
            return $json;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }
}
