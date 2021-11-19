<?php
 error_reporting(E_ERROR | E_PARSE);
 include '../assets/php/modelo/class.conexion.php';
 session_start();
 $numDoc = $_SESSION["NumeroIdentificacion"];
 $rol = $_SESSION["rol"];
 if ($rol != 2) {
   header('location: ../../../views/Error.php');
   
 } else {
   
 }
require_once('../modelo/class.consulta.metodologia.php');

$consultaMetodologia = new consultaMetodologia();
if (isset($numDoc) && $rol == 2) {
    $id=$numDoc;
$idMetodologia=$_POST['tipoMetodologia'];    
$nombreSerie = $_POST['Nom'];
$descripcionSerie = $_POST['desc'];
$repeticion = $_POST['Rep'];
$Secuencia = $_POST['Sec'];
$idParteDelCuerpoFK=$_POST['ParteCuerpo'];
$Ejercicio="";
$idEjercicio=$_POST['NomEJ'];
$Prueba = $_POST['ImgEjer'];

	$rutaservidor='images';
	$rutatemporal=$_FILES['ImgEjer']['tmp_name'];
	$imgEjercicio=$_FILES['ImgEjer']['name'];
	$rutadestino=$rutaservidor.'/'.$imgEjercicio;
	move_uploaded_file($rutatemporal, $rutadestino);
$fechaInicio=$_POST['FechaI'];
$fechaFin=$_POST['FechaF'];
if(isset($_POST['FechaI'])&&isset($_POST['FechaF'])&&isset($imgEjercicio)){
    $mensaje4 = $consultaMetodologia->registrarSeries($nombreSerie, $descripcionSerie,$repeticion,$Secuencia,$imgEjercicio,$idMetodologia);
    $SuscSerie =$consultaMetodologia->registrartbSerie($idEjercicio);
            header('location: ../../../views/consultarSeries.php');
}else{
        echo $imgEjercicio;"<script>alert('No se encontró ninguna suscripción con esa metodología')</script>
        ";
    }
}
// 
?>