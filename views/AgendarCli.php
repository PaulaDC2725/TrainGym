<?php
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/Modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
$rol = $_SESSION["rol"];
if ($rol != 3) {
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
  <script> 
  alert("La pagina a la cual intenta acceder requiere haber iniciado sesion previamente o no tiene permisos para acceder a la misma")
  location.href = "index.php";
  </script>
  
  </body>
  </html>';
  
} else {
}
require_once('../assets/php/Modelo/class.consulta.cliente.php');


  $consultas = new ConsultasClientes();

 
  $numeroIdentificacion=null;
  $nombreCliente=null;

  if (isset($numDoc) || $rol == 3) {
    $id=$numDoc;
    $filtro=$id;
  $filas1 = $consultas->cargarClientesFiltroId($filtro);
    foreach ($filas1 as $fila) {
    $numeroIdentificacion=$fila['NumeroIdentificacion']; 
      $nombreCliente = $fila['nombreCliente']; 
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Agendar</title>
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
            <a href="inicioCliente.php" class="brand-logo">
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
								                Programación Cliente
                            </div>
                        </div>
                        <ul class="navbar-nav header-right"></ul>							
                                <div class="dropdown-menu rounded dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
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
							<li><a href="inicioCliente.php">Bienvenido</a></li>
							
						</ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="fa fa-money"></i>
							<span class="nav-text">Pagos</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="realizarPagosCli.php">Registrar</a></li>
                            
                            </li>
							<a href="consultarPagosCli.php">Consultar</a>
                            </li>
                        </ul>
                    </li>
					<li><a href="consultarAgendaCli.php"  href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-search-1"></i>
							<span class="nav-text">Consultar Agenda</span>
						</a>
                    </li>
                    <li><a href="AgendarCli.php" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-calendar-7"></i>
							<span class="nav-text">Agendar Programación</span>
						</a>
                    </li>
                    <li><a href="registrarAsistenciasCli.php"  href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Registrar Asistencias</span>
						</a>
                    </li>
                    <li><a href="consultarSerie.php" href="javascript:void()" aria-expanded="false">
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
                                <h4 class="card-title">Agende la programación <?php echo $nombreCliente;?> </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="../assets/php/controlador/AgendarPrograCli.php" method="post">
										                      <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha Inicio Programación</label>
                                            <div class="col-sm-9">
                                            <input required type="date" class="form-control" id="ingresopro" name="ingresopro">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha Fin Programación</label>
                                            <div class="col-sm-9">
                                            <input required type="date" class="form-control" id="salidapro" name="salidapro">
                                            </div>
                                        </div>
                                        <!-- <fieldset class="form-group">
                                            <div class="row">
                                                <label class="col-form-label col-sm-3 pt-0">Radios</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" value="option1" checked>
                                                        <label class="form-check-label">
                                                            First radio
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" value="option2">
                                                        <label class="form-check-label">
                                                            Second radio
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input" type="radio" name="gridRadios" value="option3" disabled>
                                                        <label class="form-check-label">
                                                            Third disabled radio
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Checkbox</div>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox">
                                                    <label class="form-check-label">
                                                        Example checkbox
                                                    </label>
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="form-group row">
                                            <div class="col-sm-10">
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
    <script src="../js/custom.min.js"></script>
	<script src="../js/deznav-init.js"></script>
	
    

    <script src="../vendor/select2/js/select2.full.min.js"></script>
    <script src="../js/plugins-init/select2-init.js"></script>



</body>

</html>