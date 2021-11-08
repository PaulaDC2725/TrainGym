<?php
  include '../Modelo/class.conexion.php';
  require_once('../Modelo/class.consulta.usuario.php');    
  if (isset($_GET['id'])){
	 $consultas = new ConsultasUsuario(); 
	 $id=$_GET['id'];
	  $numeroIdentificacion = $_POST['Num'];  
	  $filas = $consultas->actualizarUsuario($numeroIdentificacion,$id);
      header('location: logoutController.php'); 
	 
	}

?>