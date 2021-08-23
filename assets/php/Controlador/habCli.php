<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.cliente.php');
require_once('../Modelo/class.consulta.usuario.php');

$consultasCliente = new ConsultasClientes();
$consultasUsuario = new ConsultasUsuario();
$estadoCliente=null;
$estadoUsuario = null;
$idUsuarioFK = null;
if (isset($_GET['NumeroIdentificacion'])) 
{
    $num=$_GET['NumeroIdentificacion'];
    $filtro=$num;
    $id = $_GET['id'];

    $filas = $consultasCliente->cargarClientesFiltroId($filtro);
    if (is_array($filas) || is_object($filas))
    {  
      foreach ($filas as $fila) 
      {
        $estadoCliente=$fila['estadoCliente'];
        $estadoUsuario=$fila['estadoUsuario'];
        $idUsuarioFK = $fila['idUsuarioFK'];
      }
      
    } 
    
    $mensaje5 = $consultasUsuario ->cambiarEstadoUsuario("1", $idUsuarioFK);
    $mensaje4 = $consultasCliente->cambiarEstadoCliente("1", $id);
    /*echo $mensaje5;
    echo $mensaje4; */
    // echo $mensaje4;
    echo('<script>alert("Usuario Habilitado con éxito");
    window.location="../../../views/mostrarClientes.php"
        </script>');/**/
    /*header("location: ../../../views/mostrarClientes.php");*/ 
}

?>