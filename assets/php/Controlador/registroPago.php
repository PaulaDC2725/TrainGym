<?php
 error_reporting(E_ERROR | E_PARSE);
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
require_once('../Modelo/class.consulta.Suscripcion.php');


//$ConsultasClientes = new ConsultasClientes();
$ConsultasS = new ConsultasSuscripcion();
if (isset($numDoc) & $rol == 3) {
	$numeroIdentificacion=$numDoc;
    $filtro=$numeroIdentificacion;
    $idSuscripcion = $_POST['SuscripcionNumero'];

$fcha = date("Y-m-d"); 
$suscripcionF=$_POST['FechaS'];
$fechaPago=$_POST['FechaP'];
$valorPago=$_POST['valorS'];
$descripcion=$_POST['descPago'];


$Prueba = $_POST['ImgPago'];

	$rutaservidor='images';
	$rutatemporal=$_FILES['ImgPago']['tmp_name'];
	$soporte=$_FILES['ImgPago']['name'];
	$rutadestino=$rutaservidor.'/'.$soporte;
	move_uploaded_file($rutatemporal, $rutadestino);
	$filas = $ConsultasS-> cargarSuscripcionFiltroId($filtro);
	if (is_array($filas) || is_object($filas)){
	
	foreach ($filas as $fila) {
		$idSuscripcion=$fila['idSuscripcion'];
		$nombreCliente=$fila['Nombre Completo'];
		$fechaSuscripción=$fila['fechaSuscripcion'];
		$metodología=$fila['nombreMetodologia'];
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
    <title>Realizar pagos</title>
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
            <a href="inicioCliente.php" class="brand-logo">
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
								    Realice el pago <?php echo $nombreCliente?>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right"></ul>
                                <div class="dropdown-menu rounded dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
										<ul class="timeline">
                                
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Realizar</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Pagos</a></li>
					</ol>
                </div>
                <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-sm-10 col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Metodología: <?php echo $metodología;?> </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="RegistroPago.php?NumeroIdentificacion=<?php echo $id?>&SuscripcionNumero=<?php echo $idSuscripcion ?>" method="post">
										                      <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha de Suscripcion:</label>
                                            <div class="col-sm-9">
                                            <input required type="date" class="form-control" id="FechaS" name="FechaS" value="<?php echo $fechaSuscripción?>" disabled>
											<input required type="date" class="form-control" id="FechaS" name="FechaS" value="<?php echo $fechaSuscripción?>" hidden>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha de pago:</label>
                                            <div class="col-sm-9">
                                            <input required type="date" class="form-control" id="FechaP" name="FechaP" value="<?php echo $fcha?>" disabled>
											<input required type="date" class="form-control" id="FechaP" name="FechaP" value="<?php echo $fcha?>" hidden>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Valor a pagar:</label>
                                            <div class="col-sm-9">
												<select class="form-control" id="valorS" name="valorS" >
													<option selected value="<?php echo "$$valorSuscripcion"?>" disabled><?php echo "$$valorSuscripcion"?></option>
													<option selected value="<?php echo $valorSuscripcion?>" hidden><?php echo $valorSuscripcion?></option>
												</select>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Imagen: Comprobante de pago</label>
                                            <div class="col-sm-9">
											<input class="form-control" style="height: 100px;" required type="file" id="ImgPago" name="ImgPago"  multiple>													
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Descripción del pago:</label>
                                            <div class="col-sm-9">
											<textarea required class="form-control" id="descPago" placeholder="*Realice una descripción del pago a realizar*" name="descPago" value="N/A" rows="5" ></textarea>
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
                                                <button type="submit" id="Registrar" name="btnf" class="btn btn-primary">Registar Pago</button>
                                            </div>
                                        </div>
										<?php
											if(isset($fechaPago) && isset($valorPago) && isset($descripcion) && isset($soporte)&& isset($idSuscripcion)&& isset($suscripcionF)){
												$mensaje1= $ConsultasS->registrarPagos($fechaPago,$valorPago,$descripcion,$soporte,$idSuscripcion);
												echo "<script>location.href=' ../../../views/inicioCliente.php'</script>";
												die();
											} else{
												echo('<script> swal("ERROR","El pago no se pudo realizar","error")</script>');  
											} 
											?> 
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
                <p>Copyright © Developed by TrainGym 2021 	<?php
										echo $numeroIdentificacion;
										echo $Prueba;?></p>
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