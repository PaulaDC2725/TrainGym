<?php
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
 $rolRec = $_SESSION["rolRecepcionista"];
 if ($rolRec != 1) {
	header('location: Error.php');
   
 } else {
	 
 }
require_once('../assets/php/modelo/class.consulta.cliente.php');
require_once('../assets/php/modelo/class.consulta.usuario.php');

$consultasCliente = new ConsultasClientes();
$consultasUsuario = new ConsultasUsuario();
$estadoCliente=null;
$estadoUsuario = null;
$idUsuarioFK = null;
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
    
    $mensaje5 = $consultasUsuario ->cambiarEstadoUsuario("0", $idUsuarioFK);
    $mensaje4 = $consultasCliente->cambiarEstadoCliente("0", $id);

?>
<!Doctype HTML>
   <html lang="es-ES">
   <head>
   <head>
	 <meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	 <meta name="description" content="" />
	 <meta name="author" content="" />
	 	<link rel="stylesheet" type="text/css" href="../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../css/font-awesome-old/css/font-awesome.min.css" >
   <link
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
   rel="stylesheet"
   integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
   crossorigin="anonymous">
   <!--<link rel="stylesheet" href="../assets/css/style.css">-->
   
   <link rel="icon" type="image/x-icon" href="images/Recurso 1.png" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <title>| Excelente</title>
   </head>
   <body>
   <script> window.addEventListener("load", init, false);
		function init () {
			Swal.fire({
				title: "Excelente",
				text: "Usuario Inhabilitado con éxito",
				icon: "success",
				buttons: true,
				dangerMode: true,
			  }).then((willDelete) => {
			if (willDelete) {
				location.href = "mostrarClientes.php";
			} else {
				location.href = "mostrarClientes.php";
			}
		  });
		}
		
		  </script>
   
   </body>
   </html>'