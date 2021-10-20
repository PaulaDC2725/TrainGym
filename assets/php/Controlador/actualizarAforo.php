<?php
error_reporting(E_ERROR | E_PARSE);
require_once('../Modelo/class.conexion.php');
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
 $rolRec = $_SESSION["rolRecepcionista"];
 if ($rolRec != 1 )  {
  header('location: ../../../Views/Error.php');
  
} else {
  
}
require_once('../Modelo/class.consulta.cliente.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $consulta = new ConsultasClientes;
    $aforo = $_POST['aforo'];
    $mensaje= $consulta->establecerAforos($aforo,$id);
    header('location: ../../../Views/consultarAforos.php');
}
?>