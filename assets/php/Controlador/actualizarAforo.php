<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.cliente.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $consulta = new ConsultasClientes;
    $aforo = $_POST['aforo'];
    $mensaje= $consulta->establecerAforos($aforo,$id);
    header('location: ../../../Views/consultarAforos.php');
}
?>