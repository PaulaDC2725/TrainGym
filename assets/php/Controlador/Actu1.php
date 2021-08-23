<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.cliente.php');
$mysqli = new mysqli('127.0.0.1', 'root', '', 'gimnasiobd');
$mysqli->set_charset("utf8");
if (isset($_GET['id'])&& isset($_GET['NumeroIdentificacion'])){
    $id=$_GET['id'];
    $numeroIdentificacion = $_GET['NumeroIdentificacion'];
$consultasCliente = new ConsultasClientes();
$correoCliente = $_POST['corr'];
$telefonoCliente = $_POST['Tel'];
$tabla1="USUARIOS";
$tabla2="CLIENTES";
$consulta1=$mysqli->query("SELECT correoCliente from $tabla2 where correoCliente='$correoCliente'");
$consulta2=$mysqli->query("SELECT telefonoCliente from $tabla2 where telefonoCliente='$telefonoCliente'");
if(mysqli_num_rows($consulta1)>0 && mysqli_num_rows($consulta2) == 0){
    echo ('<script>alert("Telefono Actualizado Correctamente");
    alert("Correo Electrónico no disponible, por favor intentelo nuevamente");window.location = "../../../views/mostrarClientes.php"; </script>');
    $mensaje4 = $consultasCliente->actualizarCliente($id, $correoCliente,$telefonoCliente);
// echo $mensaje4;
// header("location: ../../../views/mostrarClientes.php");
}else if(mysqli_num_rows($consulta2)>0 && mysqli_num_rows($consulta1)==0){
    echo ('<script>alert("Correo Electrónico Actualizado correctamente");
    alert("Telefono no disponible, por favor intentelo nuevamente");
    window.location = "../../../views/mostrarClientes.php"; </script>');
    $mensaje4 = $consultasCliente->actualizarCliente($id, $correoCliente,$telefonoCliente);
}else if(mysqli_num_rows($consulta2)>0 && mysqli_num_rows($consulta1)>0){
    echo ('<script>alert("ERROR! Debe ingresar datos para actualizar ó los datos ingresados no están disponibles! Por favor intentelo nuevamente");
    window.location = "../../../views/actualizarCliente.php?id='.$numeroIdentificacion.'";</script>');
    $mensaje4 = $consultasCliente->actualizarCliente($id, $correoCliente,$telefonoCliente);
}
else{
        $id=$_GET['id'];
    $consultasCliente = new ConsultasClientes();
    $correoCliente = $_POST['corr'];
    $telefonoCliente = $_POST['Tel'];
    
$mensaje4 = $consultasCliente->actualizarCliente($id, $correoCliente,$telefonoCliente);
// echo $mensaje4;
header("location: ../../../views/mostrarClientes.php");
}
}
/*window.location = "../../../views/actualizarCliente.php?id='.$numeroIdentificacion.'"; */
?>