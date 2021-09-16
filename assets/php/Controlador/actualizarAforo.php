<?php
error_reporting(E_ERROR | E_PARSE);
require_once('../Modelo/class.conexion.php');
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
 $rolRec = $_SESSION["rolRecepcionista"];
 if (!isset($numDoc) || $rolRec != 1 )  {
  echo '<!Doctype HTML>
  <html lang="es-ES">
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
<link rel="icon" type="image/x-icon" href="../../../assets/img/Logotipo.PNG" />
  <!-- Core theme CSS (includes Bootstrap)-->
<link href="../../../assets/css/style.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>| Error</title>
  </head>
  <body>
  <script> window.addEventListener("load", init, false);
	  function init () {
		  Swal.fire({
			  title: "¡Error!",
			  text: "La pagina a la cual intenta acceder requiere haber iniciado sesion previamente o no tiene permisos para acceder a la misma",
			  icon: "error",
			  buttons: true,
			  dangerMode: true,
			}).then((willDelete) => {
		  if (willDelete) {
			  location.href = "/TrainGym/views/index.php";
		  } else {
			  location.href = "/TrainGym/views/index.php";
		  }
		});
	  }
	  
		</script>
  
  </body>
  </html>';
  
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