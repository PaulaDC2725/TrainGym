<?php
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/Modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
$rolRec = $_SESSION["rolRecepcionista"];
if ($rolRec != 1) {
	header('location: Error.php');
  
} 
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Bienvenido</title>
		<!-- Favicon icon -->
		<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
		<link rel="stylesheet" href="../vendor/chartist/css/chartist.min.css">
		<link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
		<link href="../vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
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
									Bienvenido
								</div>
							</div>
							<ul class="navbar-nav header-right"></ul>
													<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
														<div class="header-info">
															<span style="color: #FF9900"><strong>Recepcionista</strong></span>
														</div>
													</a> 
													<div class="dropdown-menu dropdown-menu-right">
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
				<!-- row -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 col-xxl-12">
							<div class="row">
							<div class="col-sm-3">
									<div class="card avtivity-card">
									<a href="ConsultarPagos.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="fa fa-money" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Pagos</p></strong>
												</div>
											</div>
											<div class="progress" style="height:5px;">
												<div class="progress-bar bg-warning" style="width: 90%; height:5px;" role="progressbar">
												
												</div>
											</div>
										</div>
										<div class="effect bg-warning"></div>
									</div>
								</div></a>
								<div class="col-sm-3">
									<div class="card avtivity-card">
									<a href="mostrarInstructores.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-user-9"style="font-size: 40px;margin-top: 20px;"></i>
												<!-- <i class="fa fa-money"  ></i>		 -->
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Instructores</p></strong>
												</div>
											</div>
											<div class="progress" style="height:5px;">
												<div class="progress-bar bg-Color1" style="width: 90%; height:5px;" role="progressbar">
												
												</div>
											</div>
										</div>
										<div class="effect bg-Color1"></div>
									</div>
								</div></a>
								<div class="col-sm-3">
									<div class="card avtivity-card">
									<a href="mostrarClientes.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-user-9" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Clientes</p></strong>
												</div>
											</div>
											<div class="progress" style="height:5px;">
												<div class="progress-bar bg-warning" style="width: 90%; height:5px;" role="progressbar">
												
												</div>
											</div>
										</div>
										<div class="effect bg-warning" ></div>
									</div>
								</div></a>
								<div class="col-sm-3">
									<div class="card avtivity-card">
										<a href="Asistencias.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-notepad" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Asistencias</p></strong>
												</div>
											</div>
											<div class="progress" style="height:5px;">
												<div class="progress-bar bg-Color1" style="width: 90%; height:5px;" role="progressbar">
												
												</div>
											</div>
										</div>
										<div class="effect bg-Color1"></div>
									</div>
								</div></a>
						<div class="col-xxl-12 col-xxl-12">
							<div class="card">
								<div class="card-header d-sm-flex d-block pb-0 border-0">
									<div class="mr-auto pr-3 mb-sm-0 mb-3">
										<h4 class="text-black fs-20">Pagos</h4>
										<p class="fs-13 mb-0 text-black">Control de los pagos del año</p>
									</div>
									<div class="dropdown mb-3 show">
												<path d="M0.988957 17.0741C0.328275 17.2007 -0.104585 17.8386 0.0219823 18.4993C0.133362 19.0815 0.644694 19.4865 1.21678 19.4865C1.29272 19.4865 1.37119 19.4789 1.44713 19.4637L6.4592 18.5018C6.74524 18.4461 7.00091 18.2917 7.18316 18.0639L9.33481 15.3503L8.61593 14.9832C8.08435 14.7149 7.71475 14.2289 7.58818 13.6391L5.55804 16.1983L0.988957 17.0741Z" fill="#A02CFA"/>
												<path d="M18.84 6.49306C20.3135 6.49306 21.508 5.29854 21.508 3.82502C21.508 2.3515 20.3135 1.15698 18.84 1.15698C17.3665 1.15698 16.1719 2.3515 16.1719 3.82502C16.1719 5.29854 17.3665 6.49306 18.84 6.49306Z" fill="#A02CFA"/>
												<path d="M13.0179 3.15677C12.7369 2.86819 12.4762 2.75428 12.1902 2.75428C12.0864 2.75428 11.9826 2.76947 11.8712 2.79479L7.29203 3.88073C6.6592 4.03008 6.26937 4.66545 6.41872 5.29576C6.54782 5.83746 7.02877 6.20198 7.56289 6.20198C7.65404 6.20198 7.74514 6.19185 7.8363 6.16907L11.7371 5.24513C11.9902 5.52611 13.2584 6.90063 13.4888 7.14364C11.8763 8.87002 10.2639 10.5939 8.65137 12.3202C8.62605 12.3481 8.60329 12.3759 8.58049 12.4038C8.10966 13.0037 8.25397 13.9454 8.96275 14.3023L13.9064 16.826L11.3397 20.985C10.9878 21.5571 11.165 22.3064 11.7371 22.6608C11.9371 22.7848 12.1573 22.843 12.375 22.843C12.7825 22.843 13.1824 22.638 13.4128 22.2659L16.6732 16.983C16.8529 16.6919 16.901 16.34 16.8074 16.0135C16.7137 15.6844 16.4884 15.411 16.1821 15.2566L12.8331 13.553L16.3543 9.78636L19.0122 12.0393C19.2324 12.2266 19.5032 12.3177 19.7716 12.3177C20.0601 12.3177 20.3487 12.2114 20.574 12.0038L23.6243 9.16112C24.1002 8.71814 24.128 7.97392 23.685 7.49803C23.4521 7.24996 23.1383 7.12339 22.8244 7.12339C22.5383 7.12339 22.2497 7.22717 22.0245 7.43727L19.7412 9.56107C19.7386 9.56361 14.0178 4.18196 13.0179 3.15677Z" fill="#A02CFA"/>
												</g>
												<defs>
												<clipPath id="clip5">
												<rect width="24" height="24" fill="white"/>
												</clipPath>
												</defs>
											</svg>
									</div>
								</div>
								<div class="card-body pt-0 pb-0">
									<div id="chartBar"></div>
								</div>
							</div>
						</div>
								<div class="col-xl-12">	
									<div class="card">
										<div class="card-header d-sm-flex d-block pb-0 border-0">
											<div class="mr-auto pr-3">
												<h4 class="text-black fs-20 font-w600">Asistencias</h4>
												<p class="fs-13 mb-0 text-black">Control de Asitencias en la semana</p>
											</div>
										</div>
										<div class="card-body">
											<div id="chartTimeline"></div>
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
				jQuery(".testimonial-one").owlCarousel({
					loop:true,
					autoplay:true,
					margin:30,
					nav:false,
					dots: false,
					left:true,
					navText: ["<i class="fa fa-chevron-left" aria-hidden="true"></i>", "<i class="fa fa-chevron-right" aria-hidden="true"></i>"],
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
			jQuery(window).on("load",function(){
				setTimeout(function(){
					carouselReview();
				}, 1000); 
			});
		</script>
	</body>
	</html>







