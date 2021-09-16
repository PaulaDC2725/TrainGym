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
  require_once('../assets/php/Modelo/class.consulta.cliente.php');


  $consultas = new ConsultasClientes();

 
  $fechaInicio=null;
  $fechaFin=null;
  $aforo=null;

  if (isset($_GET['id'])) {
    $idF=$_GET['id'];
  

    $filtro=$idF;
    $select="";

    $filas = $consultas->mostrarAforosid($filtro);

    foreach ($filas as $fila) {
      $horaInicio=$fila['horaInicioHorario'];    
      $horaFin=$fila['horaFinHorario'];
      $aforo=$fila['aforoHorario'];
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
<!--<link rel="stylesheet" href="../assets/css/style.css">-->
<link rel="icon" type="image/x-icon" href="../assets/img/Logotipo.PNG" />
	<!-- Core theme CSS (includes Bootstrap)-->
<link href="../assets/css/style.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>| Establecer aforos disponibles</title>
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
              <center><a href="inicioRecepcionista.php">
                <img class="encabezado" width="300" height="70" src="../assets/img/logo.png">
            	</a>
			</center>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="inicioRecepcionista.php">Regresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
  		<div class="container">

			<h1 style="font-size: 2.6em;
			font-weight: 1000;
			color: black; ">Establecer cantidad permitida de personas</h1>
		</div>
  		<div class="container">
				<form class="box" method="post" action="../Assets/php/Controlador/actualizarAforo.php?id=<?php echo $idF?>">
  					<div class="form-group">
   					 <label for="exampleFormControlSelect1">Hora inicio</label>
						<input required type="text" class="form-control" id="horaI" name="horaI" value="<?php echo $horaInicio ?>" disabled >
						<input required type="hidden" class="form-control" id="horaI" name="horaI" value="<?php echo $horaInicio ?>">
  					</div>
				<br>
				<div class="form-group">
					<label for="aforo" class="form-label">Hora fin: </label>
					<input required type="text" class="form-control" id="horaF" name="horaF" value="<?php echo $horaFin?>" disabled>
					<input required type="hidden" class="form-control" id="horaF" name="horaF" value="<?php echo $horaFin?>">
				</div>
				<br>
				<div class="form-group">
					<label for="aforo" class="form-label">Ingrese la cantidad de personas permitidas para ingresar a la zona seleccionada: </label>
					<input required type="number" class="form-control" id="aforo" name="aforo" value="<?php echo $aforo?>" placeholder="Ingrese La Cantida De Personas">
				</div>
				<br>
				<center><button type="submit" value="Enviar" name="btnf" class="btn btn-dark">Establecer</button></center>
				<br>
				<center><input type="botton" class="btn btn-dark" value="Regresar" name="boton1" onclick="location.href='consultarAforos2.php'"></center>
				<hr>
			</form>
		</div>
		<hr>
		<footer class="py-5">
          <div class="container" ><p class="m-0 text-center text-white">Copyright &copy; Recepcionista TrainGym 2021</p></div>
        </footer> 
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
	crossorigin="anonymous"></script>
</html>