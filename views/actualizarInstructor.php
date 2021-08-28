<?php 
  require_once('../assets/php/Modelo/class.conexion.php');
  require_once('../assets/php/Modelo/class.consulta.instructor.php');
  /*require_once('../assets/php/Controlador/Actu2.php');*/
// require_once ('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>');
$ConsultasInstructor = new ConsultasInstructor();



  $consultas = new ConsultasInstructor();

 
  $numeroIdentificacion=null;
  $nombreInstructor=null;
  $apellidoInstructor=null;  
  $correoInstructor=null;
  $telefonoInstructor=null;

  if (isset($_GET['id'])) {
    $idF=$_GET['id'];
  

    $filtro=$idF;
    $select="";

    $filas = $consultas->cargarInstructorFiltroId($filtro);

    foreach ($filas as $fila) {
		$id=$fila['idInstructor'];    
      $numeroIdentificacion=$fila['NumeroIdentificacion'];    
      $nombreInstructor=$fila['nombreInstructor'];
      $apellidoInstructor=$fila['apellidoInstructor'];
      $correoInstructor=$fila['correoInstructor'];
      $telefonoInstructor=$fila['telefonoInstructor'];
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>| Actualizar instructor</title>
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
                        <li class="nav-item"><a class="nav-link" href="mostrarInstructores.php">Regresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
  <div class="container">

<h1 class="tittle_form" style="font-size: 2.6em;
font-weight: 1000;
color: black; text-align: center;">ACTUALIZAR INSTRUCTOR</h1>
</div>
<div class="container">
	<form class="box" method="post" action="../assets/php/Controlador/Actu2.php?id=<?php echo $id ?>&NumeroIdentificacion=<?php echo $numeroIdentificacion?>"><!-- -->
	<div class="form-group">
			<label for="Num" class="form-label">Numero de documento: </label>
			<input required type="number" class="form-control" id="Num" name="Num" value="<?php echo $numeroIdentificacion ?>" placeholder="Ingrese  Su Numero  De Identificación"disabled>
			<input type="hidden" class="form-control" id="Num" name="Num"placeholder="Ingrese  Su Numero  De Identificación"value="<?php echo $numeroIdentificacion ?>">		
		</div>
		<div class="form-group">
			<label for="Num" class="form-label">Nombre y Apellido: </label>
			<input required type="text" class="form-control" id="nomyApe" name="nomyApe"placeholder="Ingrese  Su Apellido Completo"value="<?php echo $nombreInstructor; echo(" ") ;echo $apellidoInstructor ?>"disabled>
			<input type="hidden"  class="form-control" id="nomyApe" name="nomyApe"placeholder="Ingrese  Su Apellido Completo"value="<?php echo $apellidoInstructor ?>">
			</div>
			
			<div class="form-group">
			<label for="Num" class="form-label">Correo electrónico: </label>
			<input required type="email" value="<?php echo $correoInstructor?>" class="form-control" id="email" name="email"placeholder="Ingrese  su Correo electronico corectamente(email@example.com)">
  
		</div>
			<div class="form-group">
			<label for="Num" class="form-label">Telefono: </label>
			<input required type="number"value="<?php echo $telefonoInstructor?>" class="form-control" id="phone" name="phone"placeholder="Ingrese Su Numero De Telefono">
		</div>
			
		<br>
		<center><button type="submit" value="Actualizar" name="btnf" class="btn btn-dark">Actualizar</button></center>
		<br> <!--window.location = "../../views/mostrarInstructores.php";-->
    <?php  
    $mensaje1=$consultas->DuplicidadCorr($correoInstructor);
    $mensaje2=$consultas->DuplicidadTel($telefonoInstructor);
    if($mensaje1 == 0 && $mensaje2 == 0){
      echo ('<script>swal("Datos actualizados Correctamente"); </script>');
      // echo ('<script>swal("Correo Electrónico no disponible, por favor intentelo nuevamente"); </script>');
      $mensaje4 = $ConsultasInstructor->actualizarInstructor($id, $correoinstructor,$telefonoinstructor);// echo $mensaje4;
  // header("location: ../../../views/mostrarClientes.php");
  }else if($mensaje1 == 1 || $mensaje2 == 1){
   echo ('<script>swal("Datos repetidos, intente nuevamente")</script>');
  }
	?>
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
