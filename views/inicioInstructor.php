<?php 
  error_reporting(E_ERROR | E_PARSE);
  include '../assets/php/Modelo/class.conexion.php';
  session_start();
  $numDoc = $_SESSION["NumeroIdentificacion"];
  $rol = $_SESSION["rol"];
  if ( $rol != 2) {
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
                  text: "Debe iniciar sesión correctamente para acceder!",
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
	require_once('../assets/php/Modelo/class.consulta.instructor.php');


	$consultas = new ConsultasInstructor();
  
   
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
	}
	echo '<!DOCTYPE html>
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
									Bienvenido '. $nombreInstructor .'
								</div>
							</div>
							<ul class="navbar-nav header-right"></ul>
													<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
														<div class="header-info">
															<span style="color: #FF9900"><strong>Instructor</strong></span>
														</div>
													</a> 
													<div class="dropdown-menu dropdown-menu-right">
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
								<li><a href="inicioinstructor.php">Bienvenido</a></li>
								
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-list-1"></i>
								<span class="nav-text">Series de Ejercicio</span>
							</a>
							<ul aria-expanded="false">
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
							<div class="col-sm-6">
									<div class="card avtivity-card">
									<a href="ingresarSeries1.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-list-1" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Registrar Series</p></strong>
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
								<div class="col-sm-6">
									<div class="card avtivity-card">
									<a href="consultarHorarioIns.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-calendar-7"style="font-size: 40px;margin-top: 20px;"></i>
												<!-- <i class="fa fa-money"  ></i>		 -->
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Horario</p></strong>
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
								<div class="col-sm-6">
									<div class="card avtivity-card">
									<a href="consultarSeries.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-search-1" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Consultar Series</p></strong>
												</div>
											</div>
											<div class="progress" style="height:5px;">
												<div class="progress-bar bg-Color1" style="width: 90%; height:5px;" role="progressbar">
												
												</div>
											</div>
										</div>
										<div class="effect bg-Color1" ></div>
									</div>
								</div></a>
								<div class="col-sm-6">
									<div class="card avtivity-card">
										<a href="Metodologias.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-search-1" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Metodologías</p></strong>
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
	</html>';
  }


?>





