<?php
  include '../Modelo/class.conexion.php'; 
require_once('../Modelo/class.consulta.metodologia.php');

$consultaMetodologia = new consultaMetodologia();
if (isset($_GET['NumeroIdentificacion'])) {
    $id=$_GET['NumeroIdentificacion'];
$idMetodologia=$_POST['tipoMetodologia'];    
$nombreSerie = $_POST['Nom'];
$descripcionSerie = $_POST['desc'];
$repeticion = $_POST['Rep'];
$Secuencia = $_POST['Sec'];
$idParteDelCuerpoFK=$_POST['ParteCuerpo'];
$Ejercicio="";
$idEjercicio=$_POST['NomEJ'];
if($idEjercicio=='1'){
    $Ejercicio="Sentadilla";
}else if($idEjercicio=='2'){
    $Ejercicio="Movientos circulares";
}else if($idEjercicio=='3'){
    $Ejercicio="Low Plank";
}else if($idEjercicio=='4'){
    $Ejercicio="Leg Raises";
}else if($idEjercicio=='5'){
    $Ejercicio="Inchworms";
}
$fechaInicio=$_POST['FechaI'];
$fechaFin=$_POST['FechaF'];
$SuscSerie="";
$registroEj = $consultaMetodologia->registrarEjercicios($idParteDelCuerpoFK,$Ejercicio);
$mensaje4 = $consultaMetodologia->registrarSeries($nombreSerie, $descripcionSerie,$repeticion,$Secuencia,$idMetodologia);
$consultarSuscripciones= $consultaMetodologia->ConsultarSucrcipcion($idMetodologia);
    if (is_array($consultarSuscripciones) || is_object($consultarSuscripciones)){
    foreach ($consultarSuscripciones as $consultarSuscripcion){       
        $idSuscripcionFK=$consultarSuscripcion['idSuscripcion'];
      }
    }
    if(isset($idSuscripcionFK)){
        $SuscSerie =$consultaMetodologia->registrarSuscSerie($idSuscripcionFK,$fechaInicio,$fechaFin);
        $RutEj= $consultaMetodologia->registrarRutEj($idEjercicio);
        header('location: ../../../views/consultarSeries.php?NumeroIdentificacion='.$id);
    }else{
        echo "No se encontró ninguna suscripción con esa metodología";
    }
}
// 
?>