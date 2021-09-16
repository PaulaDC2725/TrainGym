<?php 
 error_reporting(E_ERROR | E_PARSE);
 include '../assets/php/Modelo/class.conexion.php';
 session_start();
 $numDoc = $_SESSION["NumeroIdentificacion"];
 $rol = $_SESSION["rol"];
 if (!isset($numDoc) || $rol != 3) {
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
  require_once('../assets/php/Modelo/class.consulta.Cliente.php');
  require_once('../assets/php/Modelo/class.consulta.Suscripcion.php');

  $consultas = new ConsultasClientes;
  $consultasS = new ConsultasSuscripcion();

 
  $numeroIdentificacion=null;
  $descripcion=null;
  $comprobante=null;  
  $fechaPago=null;
  $valor=null;
  $metodologia=null;
  $nombreCliente=null;

  if (isset($_GET['NumeroIdentificacion'])) 
  {
      $id=$_GET['NumeroIdentificacion'];
    
      $tabla="";
      $filtro=$id;
      $select="";

      $filas = $consultasS->cargarPagoCliFiltroId($filtro);
      if (is_array($filas) || is_object($filas))
      {      
        foreach ($filas as $fila) 
        {
          $tabla.='<tr class="limitada" scope="row">';
          $tabla.='<td>'.$fila['valorSuscripcion'].'</td>';
          $tabla.='<td>'.$fila['fechaPago'].'</td>';
          $tabla.='<td>'.$fila['descripcionPago'].'</td>';
          $tabla.='<td><img style="height: 125px;" class="img-fluid" src="/TrainGym/assets/php/Controlador/images/'.$fila['urlSoportePago'].'" alt="imagen soporte"/></td>';
          $tabla.='<td>'.$fila['nombreMetodologia'].'</td>';
          $numeroIdentificacion=$id;
          $descripcion=$fila['descripcionPago'];
          $comprobante=$fila['urlSoportePago'];  
          $fechaPago=$fila['fechaPago'];
          $valor=$fila['valorSuscripcion'];
          $metodologia=$fila['nombreMetodologia'];
          $nombreCliente = $fila['Nombre Completo']; 
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
          $descripcion=$fila['descripcionPago'];
          $comprobante=$fila['urlSoportePago'];  
          $fechaPago=$fila['fechaPago'];
          $valor=$fila['valorSuscripcion'];
          $metodologia=$fila['nombreMetodologia'];
          $nombreCliente = $fila['Nombre Completo'];
        }
      }
  }
?>
<!DOCTYPE html>
<html>
<head>
	
<title>| Pagos</title>
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
<center>
		<h1 style="font-size: 1.6em;
		font-weight: 1000;
		color: black; "> Pagos realizados por <br><?php echo $nombreCliente?></h1>
		</div>
</center>  
		<div class="table-responsive"> 
  <table class="table table-striped">
    <thead>
      <tr>
      <th scope="col">Valor del pago</th>
         <th scope="col">Fecha del pago</th>
        <th scope="col">Descripción del pago</th>
        <th scope="col">Comprobante pago</th>
        <th scope="col">Metodología</th>
      </tr>
    </thead>
    <tbody>        
      <?php echo $tabla;?>
    </tbody>
    </table>
    </div>
   
    <br>
	
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