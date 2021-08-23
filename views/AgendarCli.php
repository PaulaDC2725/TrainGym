<?php 
  require_once('../assets/php/Modelo/class.conexion.php');
  require_once('../assets/php/Modelo/class.consulta.cliente.php');


  $consultas = new ConsultasClientes();

 
  $numeroIdentificacion=null;
  $nombreCliente=null;

  if (isset($_GET['NumeroIdentificacion'])) {
    $id=$_GET['NumeroIdentificacion'];
    $filtro=$id;
    $select="";

    $filas = $consultas->cargarAgendaCliFiltroId($filtro);
  if (is_array($filas) || is_object($filas)){      
    foreach ($filas as $fila) {
      $numeroIdentificacion=$fila['NumeroIdentificacion'];    
      $nombreCliente=$fila['nombreCliente'];
    } 
  }else{
  $filas1 = $consultas->cargarClientesFiltroId($filtro);
    foreach ($filas1 as $fila) {
    $numeroIdentificacion=$fila['NumeroIdentificacion']; 
      $nombreCliente = $fila['nombreCliente']; 
}}
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
<title>| Agendar Entrenamiento</title>
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
              <center><a href="inicioCliente.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>">
                <img class="encabezado" width="300" height="70" src="../assets/img/logo.png">
            	</a>
			</center>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="inicioCliente.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>">Regresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
  <div class="container">

		<h1 style="font-size: 2.6em;
    font-weight: 1000;
    color: black; ">Agende su entrenamiento <?php echo $nombreCliente;?> </h1>
		</div>
  <div class="container">
				<form class="box" method="post" action="../assets/php/Controlador/registroAsistencia.php?NumeroIdentificacion=<?php echo $numeroIdentificacion ?>">
          <div class="form-group">
          <label for="Num" class="form-label">Fecha inicio  </label>
          <input required type="date" class="form-control" id="FechayHIns" name="ingresopro">
        </div>
        <div class="form-group">
          <label for="Num" class="form-label">Fecha fin </label>
          <input required type="date" class="form-control" id="FechayHIns" name="salidapro">
        </div>
								<div class="form-group">
					<label for="Num" class="form-label">Fecha y Hora de Ingreso </label>
					<input required type="datetime-local" class="form-control" id="FechayHIns" name="ingreso">
				</div>

        <div class="form-group">
          <label for="Num" class="form-label">Fecha y Hora de Salida </label>
          <input required type="datetime-local" class="form-control" id="FechayHIns" name="salida">
        </div>  
    <br>
				
        <br>
    <center><button type="submit" value="Agendar" name="btnf" class="btn btn-dark">Agendar</button></center>
    <br>
				<center><input type="botton" class="btn btn-dark" value="Regresar" name="boton1" onclick="location.href='InicioCliente.php?NumeroIdentificacion=<?php echo $numeroIdentificacion ?>'"></center>
				<hr>
			</form>
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