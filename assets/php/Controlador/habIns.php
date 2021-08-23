<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.instructor.php');
require_once('../Modelo/class.consulta.usuario.php');

$consultasInstructor = new consultasInstructor();
$consultasUsuario = new ConsultasUsuario();
$estadoInstructor=null;
$estadoUsuario = null;
$idUsuarioFK = null;
if (isset($_GET['NumeroIdentificacion'])) 
{
    $num=$_GET['NumeroIdentificacion'];
    $filtro=$num;
    $id = $_GET['id'];

    $filas = $consultasInstructor->cargarInstructorFiltroId($filtro);
    if (is_array($filas) || is_object($filas))
    {  
      foreach ($filas as $fila) 
      {
        $estadoCliente=$fila['estadoInstructor'];
        $estadoUsuario=$fila['estadoUsuario'];
        $idUsuarioFK = $fila['idUsuarioFK'];
      }
      
    } 
    
    $mensaje5 = $consultasUsuario ->cambiarEstadoUsuario("1", $idUsuarioFK);
    $mensaje4 = $consultasInstructor->cambiarEstadoInstructor("1", $id);
    echo $mensaje5;
    echo $mensaje4; 
    // echo $mensaje4;
    echo('<script>alert("Usuario habilitado con éxito");
    window.location="../../../views/mostrarInstructores.php"
        </script>');/**/
    /*header("location: ../../../views/mostrarClientes.php");*/ 
}

?>