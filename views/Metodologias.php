<?php
    error_reporting(E_ERROR | E_PARSE);
    include '../assets/php/Modelo/class.conexion.php';
    session_start();
    $numDoc = $_SESSION["NumeroIdentificacion"];
    $rol = $_SESSION["rol"];
    if (!isset($numDoc) || $rol != 2) {
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
  require_once('../assets/php/Modelo/class.consulta.metodologia.php');  
  require_once('../assets/php/Modelo/class.consulta.instructor.php');
  require_once('../assets/php/Modelo/class.consulta.cliente.php');
  $consultasCli = new ConsultasClientes();
  $consultas = new ConsultasInstructor();
    
  $consultasM = new consultaMetodologia();
 
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
      $nombreInstructor=$fila['nombreInstructor'];
    } 
    }
  }
  if (isset($_GET['filtroCol']) && isset($_GET['valor'])) {
    $filas = $consultasM->consultarMetoFiltrados($_GET['filtroCol'],$_GET['valor']);
  }else{
    $filas = $consultasM->consultarMetodologia();
  }
   
  
  $tabla="";
  /*$rutaActivaInactiva="";*/
  /*/*
  $botonBorrar='';*/

  if (isset($filas)) {    

    foreach ($filas as $fila){      
      $tabla.='<tr class="limitada" scope="row">';
        $tabla.='<th scope="col">'.$fila['NumeroIdentificacion'].'</th>';
        $tabla.='<td>'.$fila['nombreCliente'].'</td>';
        $tabla.='<td>'.$fila['apellidoCliente'].'</td>';
        $tabla.='<td>'.$fila['correoCliente'].'</td>';
        $tabla.='<td>'.$fila['telefonoCliente'].'</td>';        
        $tabla.='<td>'.$fila['nombreMetodologia'].'</td>';
/*if ($fila['rolUsuario']=='Paciente') {
          $botonBorrar='<a href="borrar/borr_pac.php?id='.$fila['idUsuario'].'"><input type="button" class="btn btn-danger" value="Borrar"></a>';

        }else if ($fila['rolUsuario']=='Médico') {
          $botonBorrar='<a href="borrar/borr_Med.php?id='.$fila['idUsuario'].'"><input type="button" class="btn btn-danger" value="Borrar"></a>';
         }else{
          $botonBorrar="";
        }*/
        /*if ($fila['rolUsuario']=='Paciente') {
          $botonEditar='<a href="actualizar/act_usu.php?id='.$fila['idUsuario'].'"><input type="button" class="btn btn-info" value="Editar"></a>'; 
          $rutaActivaInactiva='estado/habilitarDeshabilitarPacienteUsu.php';

        }else if ($fila['rolUsuario']=='Médico') {
          $botonEditar='<a href="actualizar/act_usu_m.php?id='.$fila['idUsuario'].'"><input type="button" class="btn btn-info" value="Editar"></a>';
          $rutaActivaInactiva='estado/habilitarDeshabilitarMedicoUsu.php';  
        }else{
          $botonEditar="";
        }


        if ($fila['estadoUsuario']=='1'){
          $estado='<td>Activo</td>';
          $boton='<a href="'.$rutaActivaInactiva.'?estado=0&id='.$fila['idUsuario'].'"><input type="button" class="btn btn-danger" value="Inhabilitar"></a>';
        }else{
          $estado='<td>Inactivo</td>';
          $boton='<a href="'.$rutaActivaInactiva.'?estado=1&id='.$fila['idUsuario'].'"><input type="button" class="btn btn-success" value="Habilitar"></a>';
        }

        $tabla.=$estado;   */     
        
       /* $tabla.='<center><td class="row_buttons">'.$botonEditar.'<br>'.$boton.'</td></center>';*/
     /* $tabla.='<td><button class="btn btn-warning">Actualizar</button> <button class="btn btn-danger">Inhabilitar</button></td>';*/
      
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
	
<title>| Clientes en el sistema</title>
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
              <center><a href="inicioInstructor.php?NumeroIdentificacion=<?php echo $id?>">
                <img class="encabezado" width="300" height="70" src="../assets/img/logo.png">
            	</a>
			</center>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="inicioInstructor.php?NumeroIdentificacion=<?php echo $id?>">Regresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
  <div class="container">
		<h1 style="font-size: 2.6em;
		font-weight: 1000;
		color: black; ">Clientes del gimnasio</h1>
		</div>
		<table class="table table-striped">
  <tbody>
    <tr>
      <form action="" method="GET" id="form">        
        <td>
            <input type="hidden" name="NumeroIdentificacion"  value="<?php echo $id ?>">
          <select type="option" id="est" name="filtroCol" class="form-control" required="">
            <option value="NumeroIdentificacion">Número de identificación</option>
            <option value="nombreCliente">Nombre</option>
            <option value="correoCliente">Correo Electrónico</option>            
            <option value="nombreMetodologia">Metodologia</option>
          </select>          
        </td>
        <td>
          <input type="text" name="valor" class="form-control" value="" required="">
        </td>
        <td>          
          <button type="submit" class="btn btn-dark" >Buscar</button>
        </td>
        <td>
          <a href="Metodologias.php?NumeroIdentificacion=<?php echo $id?>"><input type="button" class="btn btn-warning" value="Limpiar Busqueda"></a>
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
        <th scope="col">Metodología</th>
      </tr>
    </thead>
    <tbody>        
      <?php echo $tabla;?>
    </tbody>
    </table>
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