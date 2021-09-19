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
	require_once('../assets/php/Modelo/class.consulta.cliente.php');


	$consultas = new ConsultasClientes();
	
	
	$numeroIdentificacion=null;
	$nombreCliente=null;
	
	if (isset($_GET['NumeroIdentificacion'])) {
	  $id=$_GET['NumeroIdentificacion'];
	
	
	  $filtro=$id;
	  $select="";
	
	  $filas = $consultas->cargarClientesFiltroId($filtro);
	  if (is_array($filas) || is_object($filas)){
		
	  foreach ($filas as $fila) {
		$numeroIdentificacion=$fila['NumeroIdentificacion'];    
		$nombreCliente=$fila['nombreCliente'];
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
		 <!--*******************
			 Preloader end
		 ********************-->
	 
		 <!--**********************************
			 Main wrapper start
		 ***********************************-->
		 <div id="main-wrapper">
	 
			 <!--**********************************
				 Nav header start
			 ***********************************-->
			 <div class="nav-header">
				 <a href="inicioCliente.php?NumeroIdentificacion='.$numeroIdentificacion.'" class="brand-logo">
					 <img class="logo-abbr" src="../images/logo.png" alt="">
					 <img class="logo-compact" src="../images/logo.jpeg" alt="">
					 <img class="brand-title" src="../images/logo-text.png" alt="">
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
									 Bienvenido '. $nombreCliente .'
								 </div>
							 </div>
							 <ul class="navbar-nav header-right"></ul>
													 <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
														 <div class="header-info">
															 <span style="color: #FF9900"><strong>Cliente</strong></span>
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
								 <li><a href="inicioCliente.php?NumeroIdentificacion='. $numeroIdentificacion .'">Bienvenido</a></li>
								 
							 </ul>
						 </li>
						 <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							 <i class="fa fa-money"></i>
								 <span class="nav-text">Pagos</span>
							 </a>
							 <ul aria-expanded="false">
								 <li><a href="realizarPagosCli.php?NumeroIdentificacion='. $numeroIdentificacion .'">Registrar</a></li>
								 
								 </li>
								 <a href="consultarPagosCli.php?NumeroIdentificacion='. $numeroIdentificacion .'">Consultar</a>
								 </li>
							 </ul>
						 </li>
						 <li><a href="consultarAgendaCli.php?NumeroIdentificacion='. $numeroIdentificacion.'"  href="javascript:void()" aria-expanded="false">
								 <i class="flaticon-381-search-1"></i>
								 <span class="nav-text">Consultar Agenda</span>
							 </a>
						 </li>
						 <li><a href="AgendarCli.php?NumeroIdentificacion='. $numeroIdentificacion .'" href="javascript:void()" aria-expanded="false">
							 <i class="flaticon-381-calendar-7"></i>
								 <span class="nav-text">Agendar Programación</span>
							 </a>
						 </li>
						 <li><a href="registrarAsistenciasCli.php?NumeroIdentificacion='. $numeroIdentificacion.'"  href="javascript:void()" aria-expanded="false">
								 <i class="flaticon-381-notepad"></i>
								 <span class="nav-text">Registrar Asistencias</span>
							 </a>
						 </li>
						 <li><a href="consultarSerie.php?NumeroIdentificacion='. $numeroIdentificacion .'" href="javascript:void()" aria-expanded="false">
							 <i class="flaticon-381-list-1"></i>
								 <span class="nav-text">Series De Ejercicio </span>
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
				 <!-- row -->
				 <div class="container-fluid">
					 <div class="row">
						 <div class="col-xl-6 col-xxl-12">
							 <div class="row">
								 <div class="col-sm-12">
									 <div class="card avtivity-card">
										 <div class="card-body" style="height: 500px;">
											 <div class="media align-items-center">
												 <!-- <span class="activity-icon bgl-success mr-md-4 mr-3">
													 <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
														 <g clip-path="url(#clip2)">
														 <path d="M14.6406 24.384C14.4639 24.1871 14.421 23.904 14.5305 23.6633C15.9635 20.513 14.4092 18.7501 14.564 11.6323C14.5713 11.2944 14.8346 10.9721 15.2564 10.9801C15.6201 10.987 15.905 11.2962 15.8971 11.6598C15.8902 11.9762 15.8871 12.2939 15.8875 12.6123C15.888 12.9813 16.1893 13.2826 16.5583 13.2776C17.6426 13.2628 19.752 12.9057 20.5684 10.4567L20.9744 9.23876C21.7257 6.9847 20.4421 4.55115 18.1335 3.91572L13.9816 2.77294C12.3274 2.31768 10.5363 2.94145 9.52387 4.32498C4.66826 10.9599 1.44452 18.5903 0.0754914 26.6727C-0.300767 28.8937 0.754757 31.1346 2.70222 32.2488C13.6368 38.5051 26.6023 39.1113 38.35 33.6379C39.3524 33.1709 40.0002 32.1534 40.0002 31.0457V19.1321C40.0002 18.182 39.5322 17.2976 38.7484 16.7664C34.5339 13.91 29.1672 14.2521 25.5723 18.0448C25.2519 18.3828 25.3733 18.937 25.8031 19.1166C27.4271 19.7957 28.9625 20.7823 30.2439 21.9475C30.5225 22.2008 30.542 22.6396 30.2654 22.9155C30.0143 23.1658 29.6117 23.1752 29.3485 22.9376C25.9907 19.9053 21.4511 18.5257 16.935 19.9686C16.658 20.0571 16.4725 20.3193 16.477 20.61C16.496 21.8194 16.294 22.9905 15.7421 24.2172C15.5453 24.6544 14.9607 24.7409 14.6406 24.384Z" fill="#27BC48"/>
														 </g>
														 <defs>
														 <clipPath id="clip2">
														 <rect width="40" height="40" fill="white"/>
														 </clipPath>
														 </defs>
													 </svg>
												 </span> -->
												 <div class="media-body">
													 <!-- <p class="fs-14 mb-2">Weekly Progress</p> -->
													 <center><img src="../images/Imagen_Cliente.svg"width="500" height="450" /></center>
													 <!-- <span class="title text-black font-w600">42%</span> -->
												 </div>
											 </div>
											 <!-- <div class="progress" style="height:5px;"> -->
												 
												 <!-- <div class="progress-bar bg-success" style="width: 42%; height:5px;" role="progressbar">
													 <span class="sr-only">42% Complete</span> -->
												 </div>
											 </div>
										 <!-- </div> -->
										 <!-- <div class="effect bg-success"></div> -->
									 <!-- </div> -->
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
