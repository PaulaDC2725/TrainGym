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
require_once('../assets/php/Modelo/class.consulta.Suscripcion.php');
date_default_timezone_set('America/Bogota');
$fcha = date("Y-m-d");


 $consultasS = new ConsultasSuscripcion();


 $nombreCliente=null;

 if (isset($numDoc) || $rol == 3) {
    $id=$numDoc;
 

   $filtro=$id;
   $select="";

   $filas = $consultasS-> cargarSuscripcionFiltroId($filtro);
   if (is_array($filas) || is_object($filas)){
	 
   foreach ($filas as $fila) {
	   $idSuscripcion=$fila['idSuscripcion'];
	 $nombreCliente=$fila['Nombre Completo'];
	 $fechaSuscripción=$fila['fechaSuscripcion'];
	 $metodologia=$fila['nombreMetodologia'];
	 $valorSuscripcion=$fila['valorSuscripcion'];
   } 
   }
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Realizar Pagos</title>
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
								    Realice el pago <?php echo $nombreCliente?>
                            </div>
                        </div>
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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Pagos</a></li>
					</ol>
                </div>
                <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-sm-10 col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">metodología: <?php echo $metodologia;?> </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
								<form method="post" action="../assets/php/Controlador/RegistroPago.php" enctype="multipart/form-data">
										                      <div class="form-group row">
											<input required type="number" class="form-control" id="SuscripcionNumero" name="SuscripcionNumero" value="<?php echo $idSuscripcion?>"hidden>
                                            <label class="col-sm-3 col-form-label">Fecha Suscripción</label>
                                            <div class="col-sm-9">
                                            <input required type="date" class="form-control" id="FechaS" name="FechaS" value="<?php echo $fechaSuscripción?>" disabled>
											<input required type="date" class="form-control" id="FechaS" name="FechaS" value="<?php echo $fechaSuscripción?>" hidden>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha Pago</label>
                                            <div class="col-sm-9">
                                            <input required type="date" class="form-control" id="FechaP" name="FechaP" value="<?php echo $fcha?>" disabled>
											<input required type="date" class="form-control" id="FechaP" name="FechaP" value="<?php echo $fcha?>" hidden>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Valor a Pagar: </label>
                                            <div class="col-sm-9">
                                            <select class="form-control" id="valorS" name="valorS" >
												<option selected value="<?php echo $valorSuscripcion?>" disabled><?php echo $valorSuscripcion?></option>
												<option selected value="<?php echo $valorSuscripcion?>" hidden><?php echo $valorSuscripcion?></option>
											</select>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Imagen: Comprobante de Pago </label>
                                            <div class="col-sm-9">
											<input class="form-control" style="height: 100px;" required type="file" id="ImgPago" name="ImgPago"  multiple>													
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Descripción de pago </label>
                                            <div class="col-sm-9">
											<textarea class="form-control" id="descPago" placeholder="*Realice una descripción del pago a realizar*" name="descPago" value="N/A" rows="5" ></textarea>
                                            </div>
                                        </div>										
                                       
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" id="Registrar" name="btnf" class="btn btn-primary">Realizar Pagos</button>
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