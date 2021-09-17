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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<img width="150" height="80" src="../assets/img/Recurso.PNG">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<br>
			<br>
			<br>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mb-2 mb-lg-0">
					<li  class="nav-item">
						<a class="nav-link" href="mostrarPagos.php"style="font-size: 18px">Consultar Pagos</a>	
					</li>
					<li class="nav-item"><a class="nav-link" href="">Instructores</a>
							<ul class="navbar-nav mb-2 mb-lg-0">
								<li  class="nav-item">
									<a class="nav-link" href="registroInstructor.php" style="font-size: 14px">Registrar Instructor</a>	
								</li>
								<li  class="nav-item">
									<a class="nav-link" href="mostrarInstructores.php"style="font-size: 14px">MostrarInstructores</a>	
								</li>
								<li  class="nav-item">
									<a class="nav-link" href="mostrarInstructores2.php"style="font-size: 14px">Habilitar Instructores</a>	
								</li>								
							</ul>					
					</li>
					<li class="nav-item"><a class="nav-link">Clientes</a>
						<ul class="navbar-nav   mb-2 mb-lg-0">
							<li  class="nav-item">
								<a class="nav-link" href="mostrarClientes.php"style="font-size: 14px">Mostrar Clientes</a>	
							</li>
							<li  class="nav-item">
								<a class="nav-link" href="mostrarClientes1.php"style="font-size: 14px">Ficha y suscripcion </a>	
							</li>
							<li  class="nav-item">
								<a class="nav-link" href="mostrarClientes2.php"style="font-size: 14px">Habilitar Clientes</a>	
							</li>
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link">Asistencias</a>
						<ul class="navbar-nav  mb-2 mb-lg-0">
							<li  class="nav-item">
								<a class="nav-link" href="registroAsistencias.php"style="font-size: 14px">Registar asistencias</a>	
							</li>
							<li  class="nav-item">
								<a class="nav-link" href="Asistencias.php"style="font-size: 14px">Mostrar Asistencias</a>	
							</li>
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link">Agenda</a>
						<ul class="navbar-nav mb-2 mb-lg-0">							
							<li  class="nav-item">
								<a class="nav-link" href="consultarAgendaClientes.php"style="font-size: 13px; text-align: center;">Consultar agenda de clientes</a>	
							</li>
							<li  class="nav-item">
								<a class="nav-link" href="mostrarInstructores3.php"style="font-size: 13px; text-align: center;">Agendar Instructores</a>	
							</li>
						</ul>
					</li>
					<!-- <li  class="nav-item">
						<a class="nav-link" href="consultarAforos.php"style="font-size: 15px">Aforos</a>	
					</li> -->
				</ul>
			</div>
		</div>
	</nav>
	
<div class="container">
	
<br>
<h1 style="font-size: 2.0em;
			font-weight: 1000;text-align: center;">Bienvenido</h1>	
					<br>
				<div class="row">
				 <center><img width="500" class="card-img-top" height="420"  src="../assets/img/recepcionHome.jpg"/>
				  </div> 
				</div>
			</div>									
</div> 
				<a class="btn btn-dark" href="../assets/php/Controlador/logoutController.php">Cerrar Sesion</a>
				  <!-- <input type="submit" class="btn btn-dark" value="Cerrar Sesion" name="boton2" onclick="location.href='index.php'">       -->
				  
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