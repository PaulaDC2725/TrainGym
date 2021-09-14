<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.metodologia.php');

$consultaMetodologia = new consultaMetodologia();
if (isset($_GET['NumeroIdentificacion'])) {
    $id=$_GET['NumeroIdentificacion'];
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

}
$registroEj = $consultaMetodologia->registrarEjercicios($idParteDelCuerpoFK,$Ejercicio);
$mensaje4 = $consultaMetodologia->registrarSeries($nombreSerie, $descripcionSerie,$repeticion,$Secuencia);
$SuscSerie =$consultaMetodologia->registrarSuscSerie($idSuscripcionFK,$fechaInio,$fechaFin);
// header('location: ../../../views/consultarSeries.php?NumeroIdentificacion='.$id);
?>