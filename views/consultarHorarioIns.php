<?php 
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/Modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
$rol = $_SESSION["rol"];
if (!isset($numDoc) || $rol != 2 ) {
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
  $semanaDiaHorario=null;
  $horaFinHorario=null;  
  $horaInicioHorario=null;

  if (isset($_GET['NumeroIdentificacion'])) 
  {
      $id=$_GET['NumeroIdentificacion'];
    
      $tabla="";
      $filtro=$id;
      $select="";

      $filas = $consultas->cargarAgendaInsFiltroId($filtro);
      if (is_array($filas) || is_object($filas))
      {      
        foreach ($filas as $fila) 
        {
          $tabla.='<tr class="limitada" scope="row">';
          $tabla.='<td>'.$fila['idProgramacion'].'</td>';
          $tabla.='<td>'.$fila['fechaInicioPro'].'</td>';
          $tabla.='<td>'.$fila['fechaFinPro'].'</td>';
          $numeroIdentificacion=$fila['NumeroIdentificacion']; 
          $nombreInstructor = $fila['nombreInstructor'];   
          $fechaInicioPro=$fila['fechaInicioPro'];
          $fechaFinPro =$fila['fechaFinPro'];
          $idProgramacion=$fila['idProgramacion'];
        }
      }else{
      $filas1 = $consultas->cargarInstructorFiltroId($filtro);
      foreach ($filas1 as $fila) 
      {
        $numeroIdentificacion=$fila['NumeroIdentificacion']; 
          $nombreInstructor = $fila['nombreInstructor'];   
        $tabla='<tr style="text-align: center">';
        $tabla.='<td colspan="9" style="color: black; font-size: 20px">';
          $tabla.='No se encuentran resultados para la busqueda';
        $tabla.='</td>';
        $tabla.='</tr>';
      }
    }
      if (is_array($filas) || is_object($filas))
      {  
        foreach ($filas as $fila) 
        {
          $numeroIdentificacion=$fila['NumeroIdentificacion']; 
          $nombreInstructor = $fila['nombreInstructor'];   
          $fechaInicioPro=$fila['fechaInicioPro'];
          $fechaFinPro =$fila['fechaFinPro'];
          $idProgramacion=$fila['idProgramacion'];
        }
      }
  }

?>
<!DOCTYPE html>
<html>
<head>	
<title>| Horario</title>
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
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
			<a href="inicioInstructor.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>">
                <img width="300" height="70" style="padding: 3px" src="../assets/img/logo.png">
			</a>            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="inicioInstructor.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>">Regresar </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">

<h1 style="font-size: 2.6em;
font-weight: 1000;
color: black; "> Información de la Agenda de <?php echo $nombreInstructor?></h1>
</div>
<div class="table-responsive"> 
<table class="table table-striped">
<thead>
  <tr>
  <th scope="col">Número de la programación</th>
     <th scope="col">Fecha Inicio de horario</th>
    <th scope="col">Fecha Fin de horario</th>
  </tr>
</thead>
<tbody>        
  <?php echo $tabla;?>
</tbody>
</table>
</div>
<hr>
		
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