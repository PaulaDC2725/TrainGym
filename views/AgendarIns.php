<?php 
  error_reporting(E_ERROR | E_PARSE);
  include '../assets/php/Modelo/class.conexion.php';
  session_start();
  $numDoc = $_SESSION["NumeroIdentificacion"];
  $rolRec = $_SESSION["rolRecepcionista"];
  if (!isset($numDoc) || $rolRec != 1 ) {
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
  require_once('../assets/php/Modelo/class.consulta.instructor.php');


  $consultas = new ConsultasInstructor();

 
  $numeroIdentificacion=null;
  $nombreCliente=null;

  if (isset($_GET['NumeroIdentificacion'])) {
    $id=$_GET['NumeroIdentificacion'];
    $filtro=$id;
  $filas1 = $consultas->cargarInstructorFiltroId($filtro);
    foreach ($filas1 as $fila) {
    $numeroIdentificacion=$fila['NumeroIdentificacion']; 
      $nombreInstructor = $fila['nombreInstructor']; 
}
}
?>
<!DOCTYPE html>
<html>
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
	<link rel="icon" type="image/x-icon" href="../ASSETS/img/Logotipo.PNG" />
        <!-- Core theme CSS (includes Bootstrap)-->
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../assets/css/styleLogin.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>| Agendar Entrenamiento</title>
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
              <center><a href="inicioRecepcionista.php">
                <img class="encabezado" width="300" height="70" src="../assets/img/logo1.png">
            	</a>
			</center>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="mostrarInstructores3.php">Regresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
         <center> <img src="../assets/img/LogoTipo.PNG" alt="Image" class="img-fluid"></center>
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h1 style="font-size: 2.6em;
            font-weight: 1000;
    color: black; ">Agende la programación de <?php echo $nombreInstructor;?> </h1>
              </div>
            <form action="/TrainGym/assets/php/controlador/AgendarPrograIns.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>" method="post">
            
			<label for="username">Fecha inicio programación:</label>  
			<div class="form-group first">
      <input required type="date" class="form-control" id="FechayHIns" name="ingresopro">			
              </div>
			  <br>
			  <label for="Num" class="form-label">Fecha fin programación:</label>
              <div class="form-group last mb-4">
              <input required type="date" class="form-control" id="FechayHIns" name="salidapro">
                
              </div>
              
			  <div class="col-md-8">
        <center><button type="submit" value="Agendar" name="btnf" class="btn btn-block btn-warning" style="background-color: #FF9900">Agendar</button></center>
			  </div>
                            </div>
                            
    <br>
			
				<hr>
			</form>
		</div>            </div>
							</div>
                            </div>
							</div>
                            </div>
							</div>
                            </div>
  
   

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