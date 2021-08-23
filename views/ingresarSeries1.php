<?php 
  require_once('../assets/php/Modelo/class.conexion.php');
  require_once('../assets/php/Modelo/class.consulta.instructor.php');


  $consultas = new ConsultasInstructor();

 
  $numeroIdentificacion=null;
  $nombreInstructor=null;

  if (isset($_GET['NumeroIdentificacion'])) {
    $id=$_GET['NumeroIdentificacion'];
  

    $filtro=$id;
    $select="";

    $filas = $consultas->cargarInstructorFiltroId($filtro);
    if (is_array($filas) || is_object($filas)){
      
    foreach ($filas as $fila) {
      $numeroIdentificacion=$fila['NumeroIdentificacion'];    
      $nombreCliente=$fila['nombreInstructor'];
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
<title>| Ingresar Series de ejercicio</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
			<a href="inicioInstructor.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>">
                <img width="300" height="70" style="padding: 3px" src="../assets/img/logo.png">
			</a>
			<h1 style="font-size: 1.8em;
		font-weight: 1000;color: white; text-align: center;">Bienvenido Instructor</h1>
		
		
            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="inicioInstructor.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>">Regresar </a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container">
		<center><h1 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>Elegir metodología</h1></center>
		<hr>
<br>
<br>
<br>
    <div class="row">
		<div class="col-sm-4">
<div class="card" style="width: 18rem;">
  <div class="card-body"  style="background-color: white;">
    <center><h5 class="card-title">Disminuir de peso</h5></center>
    </div>
   
    <a href="ingresarSeries2Dism.php?NumeroIdentificacion=<?php echo $numeroIdentificacion;?>" class="btn btn-warning">Seleccionar</a>
  </div>
</div>
  
<div class="col-sm-4">
<div class="card" style="width: 18rem;">
  <div class="card-body"  style="background-color: white;">
    <center><h5 class="card-title">Aumentar Masa Coporal</h5></center>
    </div>
    
    <a href="ingresarSeries2Aum.php?NumeroIdentificacion=<?php echo $numeroIdentificacion;?>" class="btn btn-warning">Seleccionar</a>
  </div>
</div>
  
  <div class="col-sm-4">
<div class="card" style="width: 18rem;">
  <div class="card-body" style="background-color: white;">
    <center><h5 class="card-title">2 X 1</h5></center>
    </div>
   
    <a href="ingresarSeries2X1.php?NumeroIdentificacion=<?php echo $numeroIdentificacion;?>" class="btn btn-warning">Seleccionar</a>
  </div>
  </div>
</div>

    <br>
  </div>
  </center>
  <hr>
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
</html>