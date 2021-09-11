<?php
require_once('../Modelo/class.conexion.php');
//require_once('../Modelo/class.consulta.cliente.php');
require_once('../Modelo/class.consulta.asistencias.php');



//$ConsultasClientes = new ConsultasClientes();
$ConsultasAsistencias = new ConsultasAsistencias();
date_default_timezone_set('America/Bogota');
$DateAndTime = date('d-m-Y h:i:s a', time());  
$fechaHoraIngreso=$_POST['fechaHoraIngreso'];
$fechaHoraSalida=$_POST['fechaHoraSalida'];
$numeroIdentificacion=$_POST['Num'];
$filas= $ConsultasAsistencias->consultaridAsistencia($numeroIdentificacion);
if (is_array($filas) || is_object($filas))
    {  
        foreach($filas as $fila){
            $idAsistencia=$fila['idAsistencia'];
        }
    } 
$rows=$ConsultasAsistencias-> consultaridProgramacion($numeroIdentificacion);
if (is_array($rows) || is_object($rows))
    {  
        foreach($rows as $row){
            $idProgramacion=$row['idProgramacion'];
        }
    }


/*$fechaInicioPro=$_POST['ingresopro'];
$fechaFinPro=$_POST['salidapro'];
$horaIngreso=$_POST['ingreso'];
$horaSalida=$_POST['salida'];*/

//$mensaje1 = $ConsultasAsistencias->registrarProgramacion($fechaInicioPro,$fechaFinPro,$id);

//$mensaje3 = $ConsultasAsistencias->registrarAsistenciaCli($horaIngreso,$horaSalida);
//echo $mensaje1;
//echo $mensaje2;
//echo $mensaje3;

//$mensaje2 = $consultasClientes-> registrarInstructor($nombreInstructor, $apellidoInstructor, $correoInstructor,$telefonoInstructor,$estadoInstructor);


/*header ('location: ../../../views/Asistencias.php');*/

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
  <link rel="icon" type="image/x-icon" href="../../../assets/img/Logotipo.PNG" />
        <!-- Core theme CSS (includes Bootstrap)-->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../../assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../../assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../../../assets/css/styleLogin.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>| Registrar Asistencias </title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
		<div class="container">
			<center><a href="inicioRecepcionista.php">
				<img class="encabezado" width="300" height="70" src="../../../assets/img/logo1.png">
			</a>
		</center>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
				<li class="nav-item"><a class="nav-link" href="../../../views/inicioRecepcionista.php">Regresar</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="container">
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<center> <img src="../../../assets/img/LogoTipo.PNG" alt="Image" class="img-fluid"></center>
				</div>
				<div class="col-md-6 contents">
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="mb-4">
								<h1 style="font-size: 2.6em;
								font-weight: 1000;
								color: black; ">
								Registrar Asistencia 
							</h1>
						</div> 
						<form action="registroAsistencia.php" method="post">

							<label for="Num">Numero de Documento: </label>  
							<div class="form-group first">
								<input type="number" class="form-control" value="<?php echo $numeroIdentificacion?>" placeholder="Ingrese su número de identificación" id="Num" name="Num" required>			
							</div>
							<br>
							<label for="fechaHoraIngreso" class="form-label">Fecha Hora Ingreso: </label>
							<div class="form-group last mb-4">
								<input step="any" required type="datetime-local"  value="<?php echo  $DateAndTime; ?>" class="form-control" id="fechaHoraIngreso"  name="fechaHoraIngreso">

							</div>
							<label for="fechaHoraSalida" class="form-label">Fecha Hora Salida: </label>
							<div class="form-group last mb-4">
								<input step="any" required type="datetime-local" class="form-control" value="<?php echo $fechaFinPro?>" id="fechaHoraSalida"  name="fechaHoraSalida">

							</div>
							<div class="col-md-8">
								<button type="submit" value="Registrar" id="Registrar" name="btnf" class="btn btn-block btn-warning" style="background-color: #FF9900">
									Registrar
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if(isset($idAsistencia) && isset($idProgramacion)){
    $mensaje2 = $ConsultasAsistencias->registrarAsistencia($idAsistencia,$idProgramacion,$fechaHoraIngreso,$fechaHoraSalida,$numeroIdentificacion);
    echo "<script>location.href=' ../../../views/Asistencias.php';</script>";
	die();
} else{
    echo('<script> swal("ERROR","Debe programar la agenda para poder asistir al gimnasio","error")</script>');  
} 
?>  
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



