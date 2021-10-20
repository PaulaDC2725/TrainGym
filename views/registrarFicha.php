<?php
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/Modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
$rol = $_SESSION["rol"];
if ($rol != 3) {
	header('location: Error.php');
  
}else {
require_once('../Assets/php/Modelo/class.consulta.suscripcion.php');
require_once('../Assets/php/Modelo/class.consulta.fichaAntro.php');
$consultasSuscripcion = new ConsultasSuscripcion();
$consultasFicha = new consultasFicha();
date_default_timezone_set('America/Bogota'); 
$fcha = date("Y-m-d");
if(isset($_POST['perCraneo'])&&isset($_POST['perBic1'])&&isset($_POST['perBic2'])
&&isset($_POST['perMus1'])&&isset($_POST['descMedic'])&&isset($_POST['Peso'])
&&isset($_POST['perMus2'])&&isset($_POST['perCint'])&&isset($_POST['longExsup1'])
&&isset($_POST['longExsup2'])&&isset($_POST['longExinf1'])&&isset($_POST['longExinf2'])
&&isset($_POST['FechaFicha'])&&isset($_POST['Estatura'])){
    date_default_timezone_set('America/Bogota'); 
$fcha = date("Y-m-d");
    $idParteDelCuerpo1FK='1';
    $idParteDelCuerpo2FK='2';
    $idParteDelCuerpo3FK='3';
    $idParteDelCuerpo4FK='4';
    $idParteDelCuerpo5FK='5';
    $idParteDelCuerpo6FK='6';
    $idParteDelCuerpo7FK='7';
    $idParteDelCuerpo8FK='8';
    $idParteDelCuerpo9FK='9';
    $idParteDelCuerpo10FK='10';
    $medida1 = $_POST['perCraneo'];
    $medida2 = $_POST['perBic1'];
    $medida3 = $_POST['perBic2'];
    $medida4 = $_POST['perMus1'];
    $medida5 = $_POST['perMus2'];
    $medida6 = $_POST['perCint'];
    $medida7 = $_POST['longExsup1'];
    $medida8 = $_POST['longExsup2'];
    $medida9 = $_POST['longExinf1'];
    $medida10 = $_POST['longExinf2'];
    $Estatura = $_POST['Estatura'];
    $descMedic = $_POST['descMedic'];
    $pesoCliente = $_POST['Peso'];
    $mensaje6 = $consultasSuscripcion -> ConsultarSuscripcion($numDoc);
    if(is_array($mensaje6)||is_object($mensaje6)){
        foreach($mensaje6 as $mens6){
            $idSuscripcion=$mens6['idSuscripcion'];
        }
    }
    $mensaje7 = $consultasFicha -> registrarFichaAntroNueva($fcha, $Estatura, $pesoCliente,$descMedic,$idSuscripcion);
$mensaje9 = $consultasFicha -> registrarFichaMedida($idParteDelCuerpo1FK, $medida1);
$mensaje11 = $consultasFicha -> registrarFichaMedida($idParteDelCuerpo2FK, $medida2);
$mensaje13 = $consultasFicha -> registrarFichaMedida($idParteDelCuerpo3FK, $medida3);
$mensaje15 = $consultasFicha -> registrarFichaMedida($idParteDelCuerpo4FK, $medida4);
$mensaje17 = $consultasFicha -> registrarFichaMedida($idParteDelCuerpo5FK, $medida5);
$mensaje19 = $consultasFicha -> registrarFichaMedida($idParteDelCuerpo6FK, $medida6);
$mensaje21 = $consultasFicha -> registrarFichaMedida($idParteDelCuerpo7FK, $medida7);
$mensaje23 = $consultasFicha -> registrarFichaMedida($idParteDelCuerpo8FK, $medida8);
$mensaje25 = $consultasFicha -> registrarFichaMedida($idParteDelCuerpo9FK, $medida9);
$mensaje27 = $consultasFicha -> registrarFichaMedida($idParteDelCuerpo10FK, $medida10);
echo "<script>location.href=' inicioCliente.php';</script>";
die();
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registrar Ficha</title>
    <!-- Favicon icon -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
	<link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

</head>

<body>
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
                                Ficha
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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Ficha Antropométrica</a></li>
					</ol>
				</div>
                <!-- row -->
                <div class="row">                                            
                    <form action="registrarFicha.php" id="formFich" method="post">
                        <div class="card col-xl-12 col-lg-12 col-sm-12 col-md-12 ">
                            <div class="card-header">
                                <h4 class="card-title">Información / Detalles</h4>
                            </div>
                            <div class="card-body md-6 sm-6 lg-6">
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Fecha:</label>
                                            <input required type="date" id="FechaFicha" name="FechaFicha" value="<?php echo $fcha?>" class="form-control" disabled>
                                            <input required type="date" id="FechaFicha" name="FechaFicha" value="<?php echo $fcha?>" class="form-control" hidden>

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Estatura:</label>
                                            <div class="input-group mb-3">
                                                <input step="any" required type="number" class="form-control" id="Estatura" placeholder="Ingrese Su Estatura" name="Estatura">
                                                <strong><span class="input-group-text" style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">Metros</span></strong>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Peso</label>
                                            <div class="input-group mb-3">
                                                <input step="any" required type="number" class="form-control" placeholder="Ingrese Su Peso"id="Peso" name="Peso">
                                                    <strong><span class="input-group-text"style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">Kg</span></strong>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Descripción</label>
                                            <textarea class="form-control" id="descMedic" placeholder="*En caso de no tener alguna recomendación ingrese N/A*" name="descMedic" rows="8" >N/A</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>                  
                            <div class="card-body md-6 sm-6 lg-6">
                            <div class="card-header">
                                <h4 class="card-title">Medidas del Cuerpo</h4>
                            </div>
                            <br>
                                <div class="basic-form">                               
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Perimetro del cráneo:</label>
                                            <div class="input-group mb-3">
                                                <input step="any" required type="number"  class="form-control" id="perCraneo"  name="perCraneo">
                                                <strong><span class="input-group-text"style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">cm</span></strong>
                                            </div>	
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Perímetro de cintura :</label>
                                            <div class="input-group mb-3">
                                                <input step="any" required type="number"  class="form-control" id="perCint" name="perCint">
                                                <strong><span class="input-group-text"style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">cm</span></strong>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <strong><label>Perímetro de Bíceps</label></strong>
                                            <br>
                                            <label for="text" class="form-label">Derecho: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="perBic1" name="perBic1">
														<strong><span class="input-group-text"style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">cm</span></strong>
													</div>
												</div>
												<label for="text" class="form-label">Izquierdo: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="perBic2" name="perBic2">
														<strong><span class="input-group-text"style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">cm</span></strong>
													</div>
												</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <strong><label>Longitud Brazos</label></strong>
                                            <br>
                                            <label for="text" class="form-label">Derecho: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="longExsup1" name="longExsup1">
														<strong><span class="input-group-text"style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">cm</span></strong>
													</div>
												</div>
												<label for="text" class="form-label">Izquierdo: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="longExsup2" name="longExsup2">
														<strong><span class="input-group-text"style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">cm</span></strong>
													</div>
												</div>	
                                        </div>
                                        <div class="form-group col-md-6">
                                            <strong><label>Perímetro de Muslos</label></strong>
                                            <br>
                                            <label for="text" class="form-label">Derecho: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="perMus1" name="perMus1">
														<strong><span class="input-group-text"style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">cm</span></strong>
													</div>
												</div>
												<label for="text" class="form-label">Izquierdo: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="perMus2" name="perMus2">
														<strong><span class="input-group-text"style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">cm</span></strong>
													</div>
												</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <strong><label>Longitud Piernas</label></strong>
                                        <br>
                                        <label for="text" class="form-label">Derecha: </label>
                                            <div class="form-group last md-12">													
                                                <div class="input-group mb-3">
                                                    <input step="any" required type="number"  class="form-control" id="longExinf1" name="longExinf1">
                                                    <strong><span class="input-group-text"style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">cm</span></strong>
                                                </div>
                                            </div>
                                            <label for="text" class="form-label">Izquierda: </label>
                                            <div class="form-group last md-12">													
                                                <div class="input-group mb-3">
                                                    <input step="any" required type="number"  class="form-control" id="longExinf2" name="longExinf2">
                                                    <strong><span class="input-group-text"style="height:55px;border-radius: 0px;"aria-describedby="basic-addon2">cm</span></strong>
                                                </div>
                                            </div>		
                                        </div>                                        
                                    </div>
                                </div>
                            <div>
                        </div>
                        <button type="button"  id="registrar" name="registrar"onclick=validarForm1() class="btn btn-primary">Registrar</button>
                    </form>                    
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
    <script src="../js/custom.min.js"></script>
	<script src="../js/deznav-init.js"></script>
	
    


    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot-spline/jquery.flot.spline.min.js"></script>
    <script src="../js/plugins-init/flot-init.js"></script>
    <script src="../assets/js/fichaAntro.js"></script>
</body>
</html>