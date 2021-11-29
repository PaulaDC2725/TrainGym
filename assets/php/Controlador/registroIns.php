<?php
   error_reporting(E_ERROR | E_PARSE);
   include '../modelo/class.conexion.php';
   session_start();
 $numDoc = $_SESSION["NumeroIdentificacion"];
 $rolRec = $_SESSION["rolRecepcionista"];
 if ($rolRec != 1 ) {
	header('location: ../../../views/Error.php');
	 
 }
require_once('../modelo/class.consulta.instructor.php');
require_once('../modelo/class.consulta.usuario.php');
$consultasInstructor = new ConsultasInstructor();
$consultasUsuario = new ConsultasUsuario();
$telefonoInstructor = $_POST['phone'];
$numeroIdentificacion = $_POST['Num'];
$correoInstructor = $_POST['email2'];
$nombreDocumento = '';
$tipoDocumento=$_POST['tipoDocInst'];
if($tipoDocumento =="1"){
    $nombreDocumento="Cedula de ciudadania";
}else if($tipoDocumento =="3"){
    $nombreDocumento="Cedula de extranjeria";
}else if($tipoDocumento =="4"){
    $nombreDocumento="Pasaporte";
}
$contra1="";
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
for($i=0;$i<14;$i++){
	$contra1 .= substr($str,rand(0,62),1);
}
$estadoInstructor ="1";
$idRolFK = "2";
$nombreRol = "Instructor";
$nombreInstructor=$_POST['Nom'];
$apellidoInstructor = $_POST['Ape'];


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registrar Instructor</title>
    <!-- Favicon icon -->
    	<link rel="stylesheet" type="text/css" href="../../../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome-old/css/font-awesome.min.css" >
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="../../../images/favicon.png">
	<link href="../../../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
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
            <a href="../../../views/inicioRecepcionista.php" class="brand-logo">
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
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								Registrar Instructor
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
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-news"></i>
							<span class="nav-text">Inicio</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="../../../views/inicioRecepcionista.php">Bienvenido</a></li>
							
						</ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="fa fa-money"></i>
							<span class="nav-text">Pagos</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="../../../views/ConsultarPagos.php">Consultar pagos</a></li>
                            
                            </li>
                 
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-user-9"></i>
							<span class="nav-text">Instructores</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="../../../views/RegistrarInstructor.php">Registrar Instructor</a></li>
                            <li><a href="../../../views/mostrarInstructores.php">Mostrar instructores</a></li>
                            <li><a href="../../../views/mostrarInstructores2.php">Habilitar instructores</a></li>
                            
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-user-9"></i>
							<span class="nav-text">Clientes </span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="../../../views/mostrarClientes.php">Mostrar Clientes</a></li>
                            <li><a href="../../../views/mostrarClientes1.php">Ficha y Suscripcion</a></li>
                            <li><a href="../../../views/mostrarClientes2.php">Habilitar clientes</a></li>
                            

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Asistencias</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="../../../views/registroAsistencias.php">Registrar Asistencias</a></li>
                            <li><a href="../../../views/Asistencias.php">Mostrar Asistencias</a></li>
                            
                        </ul>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-calendar-7"></i>
						<span class="nav-text">Agenda</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="../../../views/ConsultarAgendaClientes.php">Consultar Agenda Clientes</a></li>
						<li><a href="../../../views/mostrarInstructores3.php">Agendar Programacion Instructores</a></li>
						
					</ul>
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Registrar</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Instructor</a></li>
					</ol>
				</div>
                <!-- row -->
                <div class="row justify-content-center">
					<div class="col-xl-10 col-lg-10 col-sm-10 col-md-10">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Datos del instructor</h4>
								</div>
								<div class="card-body">
									<div class="basic-form">
										<form action="registroins.php" id="formInst" method="post">
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="TipoDoc" class="form-label">Tipo de documento: </label>
													<div class="form-group first col-md-12">
														<select class="form-control" id="tipoDocInst" name="tipoDocInst" >
															<option selected value="<?php echo $tipoDocumento?>" disabled><?php echo $nombreDocumento?></option>
															<option selected value="<?php echo $tipoDocumento?>" hidden><?php echo $nombreDocumento?></option>
															<option value='1'>Cedula de ciudadania</option>
															<option value='3'>Cedula de extranjeria</option>
															<option value='4'>Pasaporte</option>
														</select>
													</div>
												</div>
												<div class="form-group col-md-6">
													<label>Número De documento</label>
													<input required type="number" class="form-control" id="Num" name="Num"placeholder="Ingrese  Su Numero  De Identificación" value="<?php echo $numeroIdentificacion?>">
												</div>
												<div class="form-group col-md-6">
													<label>Nombre</label>
													<input required type="text" class="form-control" id="Nom" name="Nom"placeholder="Ingrese Su Nombre Completo"value="<?php echo $nombreInstructor?>">
												</div>
												<div class="form-group col-md-6">
													<label>Apellido</label>
													<input required type="text" class="form-control" id="Ape" name="Ape"placeholder="Ingrese  Su Apellido Completo"value="<?php echo $apellidoInstructor?>">
												</div>
												<div class="form-group col-md-6">
													<label>Teléfono</label>
													<input required type="number" class="form-control" id="phone" name="phone"placeholder="Ingrese Su Numero De Telefono" value="<?php echo $telefonoInstructor?>">
												</div>
												<div class="form-group col-md-6">
													<label>Correo electrónico *</label>
													<input required type="email"  id="email" name="email" class="form-control" value="<?php echo $correoInstructor?>" placeholder="email@example.com">
                                                    <div id="error1"></div>
                									<input type="hidden" id="validaCorreo1" value="">
                                                </div>
                                                <div class="form-group col-md-6">
													<label>Confirmar Correo electrónico *</label>
													<input required type="email2"  id="email2" name="email" class="form-control" value="<?php echo $correoInstructor?>"placeholder="email@example.com">
                                                    <span id="error2"></span>
                      								<input type="hidden" id="validaCorreo" value="">
                                                </div>
											</div>
											<!-- <div class="form-row">
												
												<div class="form-group col-md-2">
													<label>Zip</label>
													<input required type="text" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<div class="form-check">
													<input required class="form-check-input" type="checkbox">
													<label class="form-check-label">
														Check me out
													</label>
												</div>
											</div> -->
											<button type="button"  id="registrar" name="registrar"onclick=validarForm1() class="btn btn-primary">Registrar</button>
											<?php
													$mensajes1=$consultasInstructor->DuplicidadCorr($correoInstructor);
													foreach ($mensajes1 as $mensaje1) {
														$correo=$mensaje1['correo'];    
													} 
													$mensajes2=$consultasInstructor->DuplicidadTel($telefonoInstructor);
													foreach ($mensajes2 as $mensaje2) {
														$telefono=$mensaje2['Telefono'];    
													}
													$mensajes3=$consultasUsuario->DuplicidadDoc($numeroIdentificacion);
													foreach ($mensajes3 as $mensaje3) {
														$doc=$mensaje3['Doc'];    
													}
													if($telefono == 0 && $correo == 0 && $doc == 0){
													$mensaje4 = $consultasUsuario->registrarUsuario($numeroIdentificacion, $contra1, $estadoInstructor,$idRolFK,$tipoDocumento);
                                                    $mensaje5= $consultasInstructor-> registrarInstructor($nombreInstructor, $apellidoInstructor, $correoInstructor,$telefonoInstructor,$estadoInstructor);
													
                                                    echo "<script>location.href=' ../../../views/mostrarInstructores.php';</script>";
														die();
												}else if($telefono == 1 && $correo == 1 && $doc == 1){
												echo ('<script>swal("ERROR!","Datos registrados anteriormente", "error")</script>');
												}else if($telefono == 1){
													echo ('<script>swal("ERROR!","Telefono registrado anteriormente", "error")</script>');
												}else if($correo == 1){
													echo ('<script>swal("ERROR!","Correo registrado anteriormente", "error")</script>');
												}else if($doc == 1){
													echo ('<script>swal("ERROR!","Numero de documento registrado anteriormente", "error")</script>');
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
	<script src="../../../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../../../js/custom.min.js"></script>
	<script src="../../../js/deznav-init.js"></script>
	
    


    <script src="../../../vendor/flot/jquery.flot.js"></script>
    <script src="../../../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../../../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../../../vendor/flot-spline/jquery.flot.spline.min.js"></script>
    <script src="../../../js/plugins-init/flot-init.js"></script>

	<script src="../../../assets/js/RegistroInstructor.js"></script>

</body>	
<script src="../../../assets/js/confirmarInst.js"></script>
</html>