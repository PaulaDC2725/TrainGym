<?php

  include '../modelo/class.conexion.php';
  session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
$rolRec = $_SESSION["rolRecepcionista"];
if ($rolRec != 1 ) {
   header('location: ../../../views/Error.php');
	
}
  require_once('../modelo/class.consulta.usuario.php');    
  if (isset($_GET['id'])){
	 $consultas = new ConsultasUsuario(); 
	 $id=$_GET['id'];
	  $password = $_POST['password2'];  
	  $filas = $consultas->actualizarContra($password,$id);
     
	 
	}

?>
<!Doctype HTML>
   <html lang="es-ES">
   <head>
   <head>
	 <meta charset="utf-8" />
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	 <meta name="description" content="" />
	 <meta name="author" content="" />
   <link
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
   rel="stylesheet"
   integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
   crossorigin="anonymous">
   <!--<link rel="stylesheet" href="../assets/css/style.css">-->
   <link rel="icon" type="image/png" sizes="16x16" href="../../../images/favicon.png">
	 <!-- Core theme CSS (includes Bootstrap)-->
	 	<link rel="stylesheet" type="text/css" href="../../../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome-old/css/font-awesome.min.css" >
   <link href="../assets/css/style.css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <title>Actualizar Contraseña</title>
   </head>
   <body>
   <script> 
    window.addEventListener("load", init, false);
		function init () {
			Swal.fire({
				title: "¡Excelente!",
				text: "Contraseña actualizada,Por favor inicie sesión nuevamente para finalizar el proceso!",
				icon: "success",
				buttons: true,
				dangerMode: true,
			  }).then((willDelete) => {
			if (willDelete) {
				location.href = "http://localhost/trainGym/assets/php/controlador/logoutControllerContra.php";
			} else {
				location.href = "http://localhost/trainGym/assets/php/controlador/logoutControllerContra.php";
			}
		  });
		}
		
   </script>
   
   </body>
   </html>
