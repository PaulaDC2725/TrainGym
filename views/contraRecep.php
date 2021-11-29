<?php 
// error_reporting(E_ERROR | E_PARSE);
include '../assets/php/modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
$rolRec = $_SESSION["rolRecepcionista"];
if ($rolRec != 1) {
	header('location: Error.php');
  
}
  require_once('../assets/php/modelo/class.consulta.usuario.php');
  /*require_once('../../assets/php/Controlador/Actu2.php');*/
// require_once ('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>');



  $consultas = new ConsultasUsuario();

 
  $numeroIdentificacion=null;
  $passwordUsuario=null;


    $idF=$numDoc;
  

    $filtro=$idF;
    $select="";

    $filas = $consultas->consultarUsuario1($filtro);
if(is_array($filas)|| is_object($filas)){
    foreach ($filas as $fila) {
		$id=$fila['idUsuario'];    
      $passwordUsuario=$fila['passwordUsuario'];
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Actualizar Contraseña</title>
    <!-- Favicon icon -->
    	<link rel="stylesheet" type="text/css" href="../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../css/font-awesome-old/css/font-awesome.min.css" >
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
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
            <a href="inicioRecepcionista.php" class="brand-logo">
                <img class="logo-abbr" src="../images/logo.png" alt="">
                <!-- <img class="logo-compact" src="../images/logo.jpeg" alt=""> -->
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
								Actualización contraseña
                            </div>
                        </div>
                        <ul class="navbar-nav header-right"></ul>
							
												<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
													<div class="header-info">
														<span style="color: #FF9900"><strong>Recepcionista</strong></span>
													</div>
												</a> 
												<div class="dropdown-menu dropdown-menu-right">
													<!-- <a href="../app-profile.html" class="dropdown-item ai-icon">
														<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
														<span class="ml-2">Profile </span>
													</a>
													<a href="../email-inbox.html" class="dropdown-item ai-icon">
														<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
														<span class="ml-2">Inbox </span>
													</a> -->
													<a href="Ajustes.php" class="dropdown-item ai-icon">
													<i class="flaticon-381-controls-9" style="color: #FFBC11"></i>
														<span class="ml-2">Ajustes de cuenta</span>
													</a>
													<a href="../assets/php/Controlador/logoutController.php" class="dropdown-item ai-icon">
														<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-warning" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
														<span class="ml-2">Cerrar Sesion </span>
													</a>
													
												</div>
											</li>
										</ul>
									</div>
								</nav>
							</div>
						</div>
	

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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Cambiar</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Contraseña</a></li>
					</ol>
				</div>
                <!-- row -->
                <div class="row justify-content-center">
					<div class="col-xl-10 col-lg-10 col-sm-10 col-md-10">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Contraseña</h4>
								</div>
								<div class="card-body">
									<div class="basic-form">
										<form method="post" id="form" action="../assets/php/controlador/contraRecep.php?id=<?php echo $id ?>">
											<div class="form-row">
                                                <div class="form-group col-md-12">
													<label>Contraseña Antigua</label>
													<input required type="password" class="form-control" id="passwordShow" name="passwordShow" value="<?php echo $passwordUsuario ?>" placeholder="Contraseña"disabled>
                                                    <input required type="hidden" class="form-control" id="password" name="password" value="<?php echo $passwordUsuario ?>" placeholder="Contraseña">                                                
                                                </div>
                                                <div class="form-group col-md-6">
													<label>Nueva Contraseña</label>
													<input required type="password" class="form-control" id="password1" name="password1"  placeholder="Contraseña">
													<div id="error1"></div>
                									<input type="hidden" id="validaClave1" value="">
												</div>
                                                <div class="form-group col-md-6">
													<label>Confirmar nueva Contraseña</label>
													<input required type="password" class="form-control" id="password2" name="password2" placeholder="Confirma la contraseña">
													<span id="error2"></span>
                      								<input type="hidden" id="validaClave" value="">
												</div>													
											</div>	
											<pre style="color: #ff9900; text-align:center;">*La contraseña debe contener mínimo 10 carácteres<br> máximo 18*</pre>
                                            <button type="button"  id="actualizar" name="actualizar"  class="btn btn-primary">Actualizar</button>
										</form>
									</div>
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

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
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
	<script src="../vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="../js/custom.min.js"></script>
	<script src="../js/deznav-init.js"></script>
	<script src="../vendor/owl-carousel/owl.carousel.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="../vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="../vendor/apexchart/apexchart.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="../js/dashboard/dashboard-1.js"></script>
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},	
					1200:{
						items:2
					},			
					
					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})			
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>
</body>
<script src="../assets/js/confirmar.js"></script>
</html>