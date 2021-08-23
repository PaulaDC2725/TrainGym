<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.instructor.php');
$mysqli = new mysqli('127.0.0.1', 'root', '', 'gimnasiobd');
$mysqli->set_charset("utf8");
if (isset($_GET['id'])&& isset($_GET['NumeroIdentificacion'])) {
    $id=$_GET['id'];
    $numeroIdentificacion = $_GET['NumeroIdentificacion'];
$ConsultasInstructor = new ConsultasInstructor();
$correoinstructor = $_POST['email'];
$telefonoinstructor = $_POST['phone'];
$tabla2="INSTRUCTORES";
$consulta1=$mysqli->query("SELECT correoinstructor from $tabla2 where correoinstructor='$correoinstructor'");
$consulta2=$mysqli->query("SELECT telefonoinstructor from $tabla2 where telefonoinstructor='$telefonoinstructor'");
if(mysqli_num_rows($consulta1)>0 && mysqli_num_rows($consulta2) == 0){
    echo ('<script>alert("Telefono Actualizado Correctamente");
    alert("Correo Electrónico no disponible, por favor intentelo nuevamente");window.location = "../../../views/mostrarInstructores.php"; </script>');
    $mensaje4 = $ConsultasInstructor->actualizarInstructor($id, $correoinstructor,$telefonoinstructor);// echo $mensaje4;
// header("location: ../../../views/mostrarClientes.php");
}else if(mysqli_num_rows($consulta2)>0 && mysqli_num_rows($consulta1)==0){
    echo ('<script>alert("Correo Electrónico Actualizado correctamente");
    alert("Telefono no disponible, por favor intentelo nuevamente");
    window.location = "../../../views/mostrarInstructores.php"; </script>');
    $mensaje4 = $ConsultasInstructor->actualizarInstructor($id, $correoinstructor,$telefonoinstructor);
}else if(mysqli_num_rows($consulta2)>0 && mysqli_num_rows($consulta1)>0){
    echo ('<script>alert("ERROR! Debe ingresar datos para actualizar ó los datos ingresados no están disponibles! Por favor intentelo nuevamente");
    window.location = "../../../views/actualizarInstructor.php?id='.$numeroIdentificacion.'";</script>');
    $mensaje4 = $ConsultasInstructor->actualizarInstructor($id, $correoinstructor,$telefonoinstructor);
}else{
    $id=$_GET['id'];
    $correoinstructor = $_POST['email'];
    $telefonoinstructor = $_POST['phone'];
    
$mensaje4 = $ConsultasInstructor->actualizarInstructor($id, $correoinstructor,$telefonoinstructor);
/*echo $mensaje4;*/
header("location: ../../../views/mostrarInstructores.php");
}
}
?>