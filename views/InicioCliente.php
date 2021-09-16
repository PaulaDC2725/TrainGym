<?php 
  error_reporting(E_ERROR | E_PARSE);
  include '../assets/php/Modelo/class.conexion.php';
  session_start();
  $numDoc = $_SESSION["NumeroIdentificacion"];
  if (!isset($numDoc)) {
      echo '<!Doctype HTML>
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
    <link rel="icon" type="image/x-icon" href="../assets/img/Logotipo.PNG" />
      <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                  location.href = "index.php";
              } else {
                  location.href = "index.php";
              }
            });
          }
          
            </script>
    
    </body>
    </html>';
    
  } else {
    
  }
  require_once('../assets/php/Modelo/class.consulta.cliente.php');


  $consultas = new ConsultasClientes();

 
  $numeroIdentificacion=null;
  $nombreCliente=null;

  if (isset($_GET['NumeroIdentificacion'])) {
    $id=$_GET['NumeroIdentificacion'];
  

    $filtro=$id;
    $select="";

    $filas = $consultas->cargarClientesFiltroId($filtro);
    if (is_array($filas) || is_object($filas)){
      
    foreach ($filas as $fila) {
      $numeroIdentificacion=$fila['NumeroIdentificacion'];    
      $nombreCliente=$fila['nombreCliente'];
    } 
    }
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
<link rel="icon" type="image/x-icon" href="../assets/img/Logotipo.PNG" />
	<!-- Core theme CSS (includes Bootstrap)-->
<link href="../assets/css/style.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>| BIENVENIDO</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
			<a href="inicioCliente.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>">
                <img width="300" height="70" style="padding: 3px" src="../assets/img/logo.png">
			</a>
            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" style="font-size:15px" href="">Pagos</a>
                            <ul class="navbar-nav mb-2 mb-lg-0">
                              <li  class="nav-item">
                                <a class="nav-link" href="realizarPagosCli.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?> ">Realizar Pagos</a></li>
                              </li>
                              <li  class="nav-item">
                                <a class="nav-link" href="consultarPagosCli.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?> ">Consultar Pagos</a></li>
                              </li>                             
                            </ul>					
                        </li>       
                        <li class="nav-item"><a class="nav-link"  style="font-size:15px"href="consultarAgendaCli.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>">Consultar Agenda</a></li>
                        <li class="nav-item"><a class="nav-link"  style="font-size:15px"href="AgendarCli.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?> ">Agendar Programacion</a></li>
                        <li class="nav-item"><a class="nav-link" style="font-size:15px" href="registrarAsistenciasCli.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?> ">Registrar Asistencias</a></li>
                        <li class="nav-item"><a class="nav-link"  style="font-size:15px"href="consultarSerie.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?> ">Series de ejercicio</a></li>                                
                    </ul>
                </div>
            </div>
        </nav>
 <!---->
				
		<hr>
		<div class="container">
			<h1 style="font-size: 1.5em; text-align: center;"><?php echo $fila['nombreCliente']; ?><br> ¿Que desea hacer?</h1>
			<div class="row">
			  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			 <center><img width="1000" height="420" class="card-img-top"  src="../assets/img/clienteHome.jpg"/>
			  </div> 
			  </div>
			  </div> 
			  </div>
			  <a class="btn btn-dark" href="../assets/php/Controlador/logoutController.php">Cerrar Sesion</a>
			  
        <!-- Footer-->
        <footer class="py-5">
			<div class="container" ><p class="m-0 text-center text-white">Copyright &copy; TrainGym 2021</p></div>
		  </footer> 
		  <!-- Bootstrap core JS-->
		  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
	crossorigin="anonymous"></script>
</html>