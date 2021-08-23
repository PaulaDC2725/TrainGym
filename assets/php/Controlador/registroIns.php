<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.instructor.php');
require_once('../Modelo/class.consulta.usuario.php');
$mysqli = new mysqli('127.0.0.1', 'root', '', 'gimnasiobd');
$mysqli->set_charset("utf8");
$consultasInstructor = new ConsultasInstructor();
$consultasUsuario = new ConsultasUsuario();
$telefonoInstructor = $_POST['phone'];
$NumeroIdentificacion = $_POST['Num'];
$correoInstructor = $_POST['email'];
$tabla1="USUARIOS";
$tabla2="INSTRUCTORES";
$NumeroIdentificacion=$mysqli->query("SELECT NumeroIdentificacion from $tabla1 where NumeroIdentificacion='$NumeroIdentificacion'");
$correoInstructor=$mysqli->query("SELECT correoInstructor from $tabla2 where correoInstructor='$correoInstructor'");
$telefonoInstructor=$mysqli->query("SELECT telefonoInstructor from $tabla2 where telefonoInstructor='$telefonoInstructor'");
if(mysqli_num_rows($NumeroIdentificacion)>0 || mysqli_num_rows($correoInstructor)>0 ||mysqli_num_rows($telefonoInstructor)>0  )
{
echo '<script>alert("ERROR! Datos ya registrados en el sistema anteriormente, por favor ingreselos nuevamente");window.location = "../../../views/registroInstructor.php";</script>';
}
else
{
$telefonoInstructor = $_POST['phone'];
$NumeroIdentificacion = $_POST['Num'];
$correoInstructor = $_POST['email'];
$nombreDocumento = '';
$tipoDocumento=$_POST['tipoDocInst'];
$contra1 = $_POST['Contraseña'];
$estadoInstructor ="1";
$idRolFK = "2";
$nombreRol = "Instructor";
$nombreInstructor=$_POST['Nom'];
$apellidoInstructor = $_POST['Ape'];
$mensaje3 = $consultasUsuario->registrarUsuario($NumeroIdentificacion, $contra1, $estadoInstructor,$idRolFK,$tipoDocumento);
$mensaje4 = $consultasInstructor-> registrarInstructor($nombreInstructor, $apellidoInstructor, $correoInstructor,$telefonoInstructor,$estadoInstructor);

header ('location: ../../../views/inicioRecepcionista.php');
}
 ?>