<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.cliente.php');
require_once('../Modelo/class.consulta.asistencias.php');

if (isset($_GET['NumeroIdentificacion'])) {
    $id=$_GET['NumeroIdentificacion'];

$ConsultasClientes = new ConsultasClientes();
$ConsultasAsistencias = new ConsultasAsistencias();

$fechaInicioPro=$_POST['ingresopro'];
$fechaFinPro=$_POST['salidapro'];
$horaIngreso=$_POST['ingreso'];
$horaSalida=$_POST['salida'];

$mensaje1 = $ConsultasAsistencias->registrarProgramacion($fechaInicioPro,$fechaFinPro,$id);
$mensaje2 = $ConsultasAsistencias->registrarAsistencia($fechaInicioPro);
$mensaje3 = $ConsultasAsistencias->registrarAsistenciaCli($horaIngreso,$horaSalida);
echo $mensaje1;
echo $mensaje2;
echo $mensaje3;

//$mensaje2 = $consultasClientes-> registrarInstructor($nombreInstructor, $apellidoInstructor, $correoInstructor,$telefonoInstructor,$estadoInstructor);


header ('location: ../../../views/inicioCliente.php?NumeroIdentificacion='.$id);
}
 ?>