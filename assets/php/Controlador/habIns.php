<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.instructor.php');
require_once('../Modelo/class.consulta.usuario.php');

$consultasInstructor = new consultasInstructor();
$consultasUsuario = new ConsultasUsuario();
$estadoInstructor=null;
$estadoUsuario = null;
$idUsuarioFK = null;
if (isset($_GET['NumeroIdentificacion'])) 
{
    $num=$_GET['NumeroIdentificacion'];
    $filtro=$num;
    $id = $_GET['id'];

    $filas = $consultasInstructor->cargarInstructorFiltroId($filtro);
    if (is_array($filas) || is_object($filas))
    {  
      foreach ($filas as $fila) 
      {
        $estadoCliente=$fila['estadoInstructor'];
        $estadoUsuario=$fila['estadoUsuario'];
        $idUsuarioFK = $fila['idUsuarioFK'];
      }
      
    } 
    
    $mensaje5 = $consultasUsuario ->cambiarEstadoUsuario("1", $idUsuarioFK);
    $mensaje4 = $consultasInstructor->cambiarEstadoInstructor("1", $id);
    echo $mensaje5;
    echo $mensaje4; 
    // echo $mensaje4;/**/
    /*header("location: ../../../views/mostrarClientes.php");*/ 
}
if (isset($_GET['filtroCol']) && isset($_GET['valor'])) {
  $filas = $consultasInstructor->consultarInstructorFiltrados1($_GET['filtroCol'],$_GET['valor']);
}else{
  $filas = $consultasInstructor->consultarInstructorHab();
}
 

$tabla="";

if (isset($filas)) {    

  foreach ($filas as $fila){
    $boton='<a href="habIns.php?id='.$fila['idInstructor'].'&NumeroIdentificacion='.$fila['NumeroIdentificacion'].'"><input type="button" class="btn btn-info" value="Habilitar"></a>';
    $tabla.='<tr class="limitada" scope="row">';
      $tabla.='<th scope="col">'.$fila['NumeroIdentificacion'].'</th>';
      $tabla.='<td>'.$fila['nombreInstructor'].'</td>';
      $tabla.='<td>'.$fila['apellidoInstructor'].'</td>';
      $tabla.='<td>'.$fila['correoInstructor'].'</td>';
      $tabla.='<td>'.$fila['telefonoInstructor'].'</td>';        
     $tabla.='<center><td class="row_buttons">'.$boton.'</td></center>';
    
    $tabla.='</tr>';

   
   }  
}else{
$tabla='<tr style="text-align: center">';
      $tabla.='<td colspan="9" style="color: black; font-size: 20px">';
        $tabla.='No se encuentran resultados para la busqueda';
      $tabla.='</td>';
    $tabla.='</tr>';
}

?>
<!DOCTYPE html>
<html>
<head>

<title>| Instructores en el sistema</title>
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
<link rel="icon" type="image/x-icon" href="../../../assets/img/Logotipo.PNG" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="../../../assets/css/style.css" rel="stylesheet" />

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
          <div class="container">
            <center><a href="inicioRecepcionista.php">
              <img class="encabezado" width="300" height="70" src="../../../assets/img/logo.png">
            </a>
    </center>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item"><a class="nav-link" href="../../../Views/inicioRecepcionista.php">Regresar</a></li>
                  </ul>
              </div>
          </div>
      </nav>
<div class="container">

  <h1 style="font-size: 2.6em;
  font-weight: 1000;
  color: black; ">Instructores del gimnasio</h1>
  </div>
  <table class="table table-striped">
<tbody>
  <tr>
    <form action="" method="GET" id="form">        
      <td>
        <select type="option" id="est" name="filtroCol" class="form-control" required="">
          <option value="NumeroIdentificacion">Número de identificación</option>
          <option value="nombreInstructor">Nombre</option>
          <option value="correoInstructor">Correo Electrónico</option>
        </select>          
      </td>
      <td>
        <input type="text" name="valor" class="form-control" value="" required="">
      </td>
      <td>          
        <button type="submit" class="btn btn-dark" >Buscar</button>
      </td>
      <td>
        <a href="../../../Views/habIns.php"><input type="button" class="btn btn-warning" value="Limpiar Busqueda"></a>
      </td>
    </form>         
    <td>
      
    </td>  
  </tr>
</tbody>
</table>
  <div class="table-responsive"> 
<table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">Número de identificación</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo electrónico</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>        
    <?php echo $tabla;?>
  </tbody>
  </table>
  <?php
  echo('<script>swal("Excelente","Usuario Habilitado con éxito","success");
      </script>');
  ?>
  </div>
 
  <br>
  <center><input type="botton" class="btn btn-dark" value="Regresar" name="boton1" onclick="location.href='../../../Views/inicioRecepcionista.php'"></center>
      
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