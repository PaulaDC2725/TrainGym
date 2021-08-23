<?php 
  require_once('../assets/php/Modelo/class.conexion.php');
  require_once('../assets/php/Modelo/class.consulta.cliente.php');

  $consultas = new ConsultasClientes();

 
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

      $filas = $consultas->cargarAgendaCliFiltroId($filtro);
      if (is_array($filas) || is_object($filas))
      {      
        foreach ($filas as $fila) 
        {
          $tabla.='<tr class="limitada" scope="row">';
          $tabla.='<td>'.$fila['horaInicioHorario'].'</td>';
          $tabla.='<td>'.$fila['horaFinHorario'].'</td>';
          $tabla.='<td>'.$fila['semanaDiaHorario'].'</td>';
          $numeroIdentificacion=$fila['NumeroIdentificacion']; 
          $nombreCliente = $fila['nombreCliente'];   
          $semanaDiaHorario=$fila['semanaDiaHorario'];
          $horaFinHorario =$fila['horaFinHorario'];
          $horaInicioHorario =$fila['horaInicioHorario'];
        }
      }else{
      $filas1 = $consultas->cargarClientesFiltroId($filtro);
      foreach ($filas1 as $fila) 
      {
        $numeroIdentificacion=$fila['NumeroIdentificacion']; 
          $nombreCliente = $fila['nombreCliente'];   
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
          $nombreCliente = $fila['nombreCliente'];   
          $semanaDiaHorario=$fila['semanaDiaHorario'];
          $horaFinHorario =$fila['horaFinHorario'];
          $horaInicioHorario =$fila['horaInicioHorario'];
        }
      }
  }
?>
<!DOCTYPE html>
<html>
<head>
	
<title>| Agenda</title>
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
		color: black; "> Información de la Agenda de <?php echo $nombreCliente?></h1>
		</div>
		<div class="table-responsive"> 
  <table class="table table-striped">
    <thead>
      <tr>
        
        <th scope="col">Fecha y hora de ingreso</th>
        <th scope="col">Fecha y hora de Salida</th>
        <th scope="col">Dia</th>
      </tr>
    </thead>
    <tbody>        
      <?php echo $tabla;?>
    </tbody>
    </table>
    </div>
   
    <br>
		<center><input type="botton" class="btn btn-dark" value="Regresar" name="boton1" onclick="location.href='consultarAgendaClientes.php'"></center>
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