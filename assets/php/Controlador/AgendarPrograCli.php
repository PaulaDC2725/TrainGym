<?php
error_reporting(E_ERROR | E_PARSE);
require_once('../Modelo/class.conexion.php');
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
  $rol = $_SESSION["rol"];
  if ($rol != 3) {
    header('location: ../../../Views/Error.php');
  
} else {
  //require_once('../Modelo/class.consulta.cliente.php');
require_once('../Modelo/class.consulta.asistencias.php');

  $numid=$numDoc;
//$ConsultasClientes = new ConsultasClientes();
$ConsultasAsistencias = new ConsultasAsistencias();
$fechaInicioPro=$_POST['ingresopro'];
$fechaFinPro=$_POST['salidapro'];

$ConsultasAsistencias->registrarProgramacion($fechaInicioPro,$fechaFinPro,$numid); 
header('location: ../../../views/inicioCliente.php');
}
?>


