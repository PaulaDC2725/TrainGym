<?php
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
 $rolRec = $_SESSION["rolRecepcionista"];
 if ($rolRec != 1) {
	header('location: Error.php');
   
 } else {
	 
 }
require_once('../assets/php/modelo/class.consulta.instructor.php');


$consultas = new ConsultasInstructor();


$numeroIdentificacion=null;
$nombreCliente=null;

if (isset($_GET['NumeroIdentificacion'])) {
  $id=$_GET['NumeroIdentificacion'];
  $filtro=$id;
$filas1 = $consultas->cargarInstructorFiltroId($filtro);
  foreach ($filas1 as $fila) {
  $numeroIdentificacion=$fila['NumeroIdentificacion']; 
	$nombreInstructor = $fila['nombreInstructor']; 
}
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Agendar a <?php echo $nombreInstructor?></title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <link rel="stylesheet" href="../vendor/select2/css/select2.min.css">
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
            <a href="inicioRecepcionista.php" class="brand-logo">
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
								Programación Instructor
                            </div>
                        </div>
                        <ul class="navbar-nav header-right"></ul>
                                <div class="dropdown-menu rounded dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
										<ul class="timeline">
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="../app-profile.html" class="dropdown-item ai-icon">
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
							<li><a href="inicioRecepcionista.php">Bienvenido</a></li>
							
						</ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="fa fa-money"></i>
							<span class="nav-text">Pagos</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="ConsultarPagos.php">Consultar pagos</a></li>
                            
                            </li>
                 
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-user-9"></i>
							<span class="nav-text">Instructores</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="RegistrarInstructor.php">Registrar Instructor</a></li>
                            <li><a href="mostrarInstructores.php">Mostrar instructores</a></li>
                            <li><a href="mostrarInstructores2.php">Habilitar instructores</a></li>
                            
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-user-9"></i>
							<span class="nav-text">Clientes </span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="mostrarClientes.php">Mostrar Clientes</a></li>
                            <li><a href="mostrarClientes1.php">Ficha y Suscripcion</a></li>
                            <li><a href="mostrarClientes2.php">Habilitar clientes</a></li>
                            

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Asistencias</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="registroAsistencias.php">Registrar Asistencias</a></li>
                            <li><a href="Asistencias.php">Mostrar Asistencias</a></li>
                            
                        </ul>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-calendar-7"></i>
						<span class="nav-text">Agenda</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="ConsultarAgendaClientes.php">Consultar Agenda Clientes</a></li>
						<li><a href="mostrarInstructores3.php">Agendar Programacion Instructores</a></li>
						
					</ul>
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Agendar</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Programacion</a></li>
					</ol>
                </div>
                <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-sm-10 col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Agende la programación de <?php echo $nombreInstructor;?> </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="../assets/php/controlador/AgendarPrograIns.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>" method="post">
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha inicio programación *</label>
                                            <div class="col-sm-9">
                                            <input required type="date" class="form-control" id="ingresopro" name="ingresopro">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha fin programación *</label>
                                            <div class="col-sm-9">
                                            <input required type="date" class="form-control" id="salidapro" name="salidapro">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                
                                                 <input type="button" class="btn btn-warning" style="background-color: #FF9900; color: white;text-align:center;"value="Regresar" onclick="location.href='mostrarInstructores3.php'"/> 
                                                 <button type="submit" id="Registrar" name="btnf" class="btn btn-primary">Agendar</button>
                                            </div>
                                        </div>
                                    </form>   
                                </div>
                            </div>
                        </div>
					</div>
                </div>  
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


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
    <script src="../js/custom.min.js"></script>
	<script src="../js/deznav-init.js"></script>
	
    

    <script src="../vendor/select2/js/select2.full.min.js"></script>
    <script src="../js/plugins-init/select2-init.js"></script>



</body>

</html>