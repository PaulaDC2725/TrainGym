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
            <a href="inicioCliente.php?NumeroIdentificacion='. $numeroIdentificacion .'" class="brand-logo">
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
						<div class="col-xl-12 col-xxl-12">
							<div class="row">
							<div class="col-sm-6">
									<div class="card avtivity-card">
									<a href="consultarPagosCli.php?NumeroIdentificacion='.$numeroIdentificacion.'"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="fa fa-money" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Pagos</p></strong>
												</div>
											</div>
											<!-- <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
														<path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
														<path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
														<path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
													</svg> -->
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
									<a href="registrarAsistenciasCli.php?NumeroIdentificacion='.$numeroIdentificacion.'"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-notepad"style="font-size: 40px;margin-top: 20px;"></i>
												<!-- <i class="fa fa-money"  ></i>		 -->
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Registrar Asistencias</p></strong>
												</div>
											</div>
											<!-- <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
														<path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
														<path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
														<path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
													</svg> -->
											<div class="progress" style="height:5px;">
												<div class="progress-bar bg-Color1" style="width: 90%; height:5px;" role="progressbar">
												
												</div>
											</div>
										</div>
										<div class="effect bg-Color1"></div>
									</div>
								</div></a>
								<div class="col-sm-6">
									<div class="card avtivity-card">
									<a href="AgendarCli.php?NumeroIdentificacion='.$numeroIdentificacion.'"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-calendar-7" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Agendar</p></strong>
												</div>
											</div>
											<!-- <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
														<path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
														<path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
														<path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
													</svg> -->
											<div class="progress" style="height:5px;">
												<div class="progress-bar bg-warning" style="width: 90%; height:5px;" role="progressbar">
												
												</div>
											</div>
										</div>
										<div class="effect bg-warning" ></div>
									</div>
								</div></a>
								<div class="col-sm-6">
									<div class="card avtivity-card">
										<a href="consultarSerie.php?NumeroIdentificacion='.$numeroIdentificacion.'"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-list-1" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Series De Ejercicio</p></strong>
												</div>
											</div>
											<!-- <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
														<path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
														<path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
														<path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
													</svg> -->
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
