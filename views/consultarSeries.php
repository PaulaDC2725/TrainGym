<?php
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
$rol = $_SESSION["rol"];
if ($rol != 2) {
	header('location: Error.php');
  
} else {
	
}
require_once('../assets/php/modelo/class.consulta.metodologia.php');  
require_once('../assets/php/modelo/class.consulta.instructor.php');
$consultas = new ConsultasInstructor();
$consultasM = new consultaMetodologia();
 
  $numeroIdentificacion=null;
  $nombreInstructor=null;

  if (isset($numDoc) && $rol == 2) {
	$id=$numDoc;

    $filtro=$id;
    $select="";

    $filas = $consultas->cargarInstructorFiltroId($filtro);
    if (is_array($filas) || is_object($filas)){
      
      foreach ($filas as $fila) {
        $numeroIdentificacion=$fila['NumeroIdentificacion'];    
        $nombreInstructor=$fila['nombreInstructor'];
      } 
    }
    $filas1 = $consultasM->consultarSeries($numeroIdentificacion);
   
  
        $tabla="";

        if (isset($filas1)) {    

          foreach ($filas1 as $fila){      
            $tabla.='<tr class="limitada" scope="row">';
              $tabla.='<td>'.$fila['nombreSerieEjercicio'].'</td>';
              $tabla.='<td>'.$fila['descripcionSerieEjercicio'].'</td>';
              $tabla.='<td>'.$fila['nombreMetodologia'].'</td>';
			  $tabla.='<td><img style="height: 125px;" class="img-fluid" src="../assets/php/Controlador/images/'.$fila['urlImagen'].'" alt="imagen soporte"/></td>';
            $tabla.='</tr>';
          
          }  
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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Series de ejercicio</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <!-- Datatable -->
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Custom Stylesheet -->
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="inicioinstructor.php" class="brand-logo">
                <img class="logo-abbr" src="../images/logo.png" alt="">
                <img class="logo-compact" src="../images/logo.jpeg" alt="">
                 <img class="brand-title" width="200" height="30" src="../images/logo-text.png" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
         <!--**********************************
            Nav header end
        ***********************************-->
		
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								Series De Ejercicio
                            </div>
                        </div>
                        <ul class="navbar-nav header-right"></ul>
							
                                <div class="dropdown-menu rounded dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
										<ul class="timeline">
										
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href=".../app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="../email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="../page-login.html" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-news"></i>
							<span class="nav-text">Inicio</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="inicioinstructor.php">Bienvenido</a></li>
							
						</ul>
                    </li>
                    <li class="mm-active"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-list-1"></i>
							<span class="nav-text">Series de Ejercicio</span>
						</a>
                        <ul aria-expanded="true">
                            <li><a href="ingresarSeries1.php">Registrar</a></li>
                            
                            </li>
							<a href="consultarSeries.php">Consultar</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="consultarHorarioIns.php"  href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-search-1"></i>
							<span class="nav-text">Consultar Horario</span>
						</a>
                    </li>
                    <li><a href="Metodologias.php" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-search-1"></i>
							<span class="nav-text">Consultar Metodologias </span>
						</a>
                    </li>
                    
				<div class="copyright">
					<p><strong>TrainGym</strong> © 2021 </p>
					<!-- <p>Made with <span class="heart"></span> by DexignZone</p> -->
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Consultar</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Series</a></li>
					</ol>
                </div>
                <!-- row -->

				<div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Detalles</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display">
                                        <thead>
                                            <tr> 
											<th scope="col">Nombre del ejercicio</th>
                                              <th scope="col">Descripcion del ejercicio</th>
                                              <th scope="col">Metodología</th>
											  <th scope="col">Imagen</th>
                                            </tr>
                                        </thead>
                                        <tbody>      
                                          <?php echo $tabla;?>
                                        </tbody>                                            
                                    </table>
                                </div>
                                <input type="button" class="btn btn-warning" style="background-color: #FF9900; color: white;text-align:center;"value="Regresar" onclick="location.href='mostrarClientes1.php'"/>	
                            </div>
                        </div>
                    </div>					
				</div>
            </div>
        </div>

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Developed by TrainGym 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
	<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
	<script src="../js/deznav-init.js"></script>
	
    <!-- Datatable -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../js/plugins-init/datatables.init.js"></script>

</body>
</html>
