<?php 
error_reporting(E_ERROR | E_PARSE);
require_once('../Modelo/class.conexion.php');
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
  $rol = $_SESSION["rol"];
  if ($rol != 3) {
  echo '<!Doctype HTML>
  <html lang="es-ES">
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
<link rel="icon" type="image/x-icon" href="../../../assets/img/Logotipo.PNG" />
  <!-- Core theme CSS (includes Bootstrap)-->
<link href="../../../assets/css/style.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>| Error</title>
  </head>
  <body>
  <script> 
	  alert("Debe iniciar sesión correctamente para acceder!")
	  location.href = "../../../Views/index.php";
	  </script>
  
  </body>
  </html>';
  
} else {
  
}
require_once('../Modelo/class.consulta.asistencias.php');



//$ConsultasClientes = new ConsultasClientes();
$ConsultasAsistencias = new ConsultasAsistencias();
date_default_timezone_set('America/Bogota');
$DateAndTime = date('d-m-Y h:i:s a', time());  
$fechaHoraIngreso=$_POST['fechaHoraIngreso'];
$fechaHoraSalida=$_POST['fechaHoraSalida'];
$numeroIdentificacion=$_POST['Num'];
$filas= $ConsultasAsistencias->consultaridAsistencia($numeroIdentificacion);
if (is_array($filas) || is_object($filas))
    {  
        foreach($filas as $fila){
            $idAsistencia=$fila['idAsistencia'];
        }
    } 
$rows=$ConsultasAsistencias-> consultaridProgramacion($numeroIdentificacion);
if (is_array($rows) || is_object($rows))
    {  
        foreach($rows as $row){
            $idProgramacion=$row['idProgramacion'];
        }
    }




 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registro Asistencias</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../../images/favicon.png">
    <link rel="stylesheet" href="../../../vendor/select2/css/select2.min.css">
    <link href="../../../css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>

 <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> -->
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
    <a href="../../../views/inicioCliente.php" class="brand-logo">
        <img class="logo-abbr" src="../../../images/logo.png" alt="">
        <img class="logo-compact" src="../../../images/logo.jpeg" alt="">
         <img class="brand-title" width="200" height="30" src="../../../images/logo-text.png" alt="">
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
								                Registrar Asistencias
                            </div>
                        </div>
                        <ul class="navbar-nav header-right"></ul>
							
                                <div class="dropdown-menu rounded dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
										<ul class="timeline">
											
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="../../../app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="../../../email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="../../../page-login.html" class="dropdown-item ai-icon">
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
        <?php require_once('menuCliente.php')?>
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Registrar</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Asistencia</a></li>
					</ol>
                </div>
                <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-sm-10 col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Datos de la asistencia</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="registroAsistencia.php" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Número de Documento</label>
                                            <div class="col-sm-9">
                                            <input type="number" class="form-control" value="<?php echo $numeroIdentificacion?>" placeholder="Ingrese su número de identificación" id="Num" name="Num" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha y hora ingreso</label>
                                            <div class="col-sm-9">
                                            <input step="any" required type="datetime-local"  value="<?php echo  $DateAndTime; ?>" class="form-control" id="fechaHoraIngreso"  name="fechaHoraIngreso">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha y hora salida</label>
                                            <div class="col-sm-9">
                                            <input step="any" required type="datetime-local" class="form-control" value="<?php echo $fechaFinPro?>" id="fechaHoraSalida"  name="fechaHoraSalida">
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
                                                <button type="submit" id="Registrar" name="btnf" class="btn btn-primary">Registrar</button>
                                            </div>
                                        </div>
                                    </form>
									<?php
										if(isset($idAsistencia) && isset($idProgramacion)){
											$mensaje2 = $ConsultasAsistencias->registrarAsistencia($idAsistencia,$idProgramacion,$fechaHoraIngreso,$fechaHoraSalida,$numeroIdentificacion);
											echo "<script>location.href=' ../../../views/inicioCliente.php';</script>";
											die();
										} else{
											echo('<script> swal("ERROR","Debe programar la agenda para poder asistir al gimnasio","error")</script>');  
										} 
									?>  
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
    <script src="../../../vendor/global/global.min.js"></script>
    <script src="../../../js/custom.min.js"></script>
	<script src="../../../js/deznav-init.js"></script>
	
    

    <script src="../../../vendor/select2/js/select2.full.min.js"></script>
    <script src="../../../js/plugins-init/select2-init.js"></script>



</body>

</html>