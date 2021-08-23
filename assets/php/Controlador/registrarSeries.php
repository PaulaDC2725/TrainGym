<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.metodologia.php');

$consultaMetodologia = new consultaMetodologia();
if (isset($_GET['NumeroIdentificacion'])) {
    $id=$_GET['NumeroIdentificacion'];
$nombreSerie = $_POST['Nom'];
$descripcionSerie = $_POST['desc'];


}
$mensaje4 = $consultaMetodologia->registrarSeries($nombreSerie, $descripcionSerie);
header('location: ../../../views/consultarSeries.php?NumeroIdentificacion='.$id);
?>