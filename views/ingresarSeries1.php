<?php
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
$rol = $_SESSION["rol"];
if ($rol != 2) {
	header('location: Error.php');
  
} else {
	
}
 require_once('../assets/php/modelo/class.consulta.instructor.php');


  $consultas = new ConsultasInstructor();

 
  $numeroIdentificacion=null;
  $nombreInstructor=null;

  if (isset($numDoc) && $rol == 2) {
	$id=$numDoc;
    $opcionEjer="";
    $opcionParte="";
    $opcion="";
    $filtro=$id;
    $select="";
    $Ejercicios= $consultas->ejercicios();
    if (is_array($Ejercicios) || is_object($Ejercicios)){
      foreach ($Ejercicios as $Ejercicio){   
        $idEjercicio=$Ejercicio['idEjercicio'];
          $nombreEjercicio=$Ejercicio['nombreEjercicio'];   
          $opcionEjer.='<option value="'.$Ejercicio['idEjercicio'].'">'.$Ejercicio['nombreEjercicio'].'</option>';                          
	
        }
      }
    $parteCuerpos =$consultas->parteCuerpo();
    if (is_array($parteCuerpos) || is_object($parteCuerpo)){
      foreach ($parteCuerpos as $parteCuerpo){   
        $idParte=$parteCuerpo['idParteDelCuerpo'];
          $nombreParte=$parteCuerpo['nombreParteCuerpo'];   
          $opcionParte.='<option value="'.$parteCuerpo['idParteDelCuerpo'].'">'.$parteCuerpo['nombreParteCuerpo'].'</option>';                          
          
        }
      }
    $metodologias = $consultas ->metodologias();
    if (is_array($metodologias) || is_object($metodologias)){
    foreach ($metodologias as $metodologia){      
        $opcion.='<option value="'.$metodologia['idMetodologia'].'">'.$metodologia['nombreMetodologia'].'</option>';                          
        $idMetodologia=$metodologia['idMetodologia'];
        $nombreMetodologia=$metodologia['nombreMetodologia'];
      }
    }
    $filas = $consultas->cargarInstructorFiltroId($filtro);
    if (is_array($filas) || is_object($filas)){
      
    foreach ($filas as $fila) {
      $numeroIdentificacion=$fila['NumeroIdentificacion'];    
      $nombreCliente=$fila['nombreInstructor'];
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
    <title>Registrar Series</title>
    <!-- Favicon icon -->
    	<link rel="stylesheet" type="text/css" href="../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../css/font-awesome-old/css/font-awesome.min.css" >
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
	<link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
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
            <a href="inicioInstructor.php" class="brand-logo">
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
								Registrar Series
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
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-news"></i>
							<span class="nav-text">Inicio</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="inicioInstructor.php">Bienvenido</a></li>
							
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
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Registrar</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Series de Ejercicio</a></li>
					</ol>
				</div>
                <!-- row -->
                <div class="row justify-content-center">
					<div class="col-xl-10 col-lg-10 col-sm-10 col-md-10">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Datos de las series</h4>
								</div>
								<div class="card-body">
									<div class="basic-form">
										<form action="../assets/php/controlador/registrarSeries.php?NumeroIdentificacion=<?php echo $numeroIdentificacion; ?>" id="formInst"  enctype="multipart/form-data" method="post">
											<div class="form-row">
											<div class="form-group col-md-6">												
													<label>Tipo de metodología *</label>
													<select class="form-control" id="tipoMetodologia" name="tipoMetodologia"required >
                                  <option selected value="" disabled>--Seleccione el tipo de Metodología--</option>
                                  <?php echo $opcion;?>
                            </select>	
												</div>
                        <div class="form-group col-md-6">
													<label>Parte del cuerpo *</label>
                          <select class="form-control" id="ParteCuerpo" name="ParteCuerpo" required>
                                  <option selected value="" disabled>--Seleccione la parte del cuerpo--</option>
                                  <?php echo $opcionParte ?>
                            </select>	
												</div>
                        <div class="form-group col-md-6">
													<label>Ejercicio *</label>
                          <select class="form-control" id="NomEj" name="NomEJ"required >
                                  <option selected value="" disabled>--Seleccione el Ejercicio--</option>
                                  <?php echo $opcionEjer;?>
                            </select>	
												</div>
												
                        <div class="form-group col-md-6">
													<label>Repetición del Ejercicio *</label>
													<select class="form-control" id="Rep" name="Rep"required >
                                  <option selected value="" disabled>--Seleccione la repetición del ejercicio--</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                                  <option value="16">16</option>
                                  <option value="17">17</option>
                                  <option value="18">18</option>
                                  <option value="19">19</option>
                                  <option value="20">20</option>
                            </select>	
												</div>
                        <div class="form-group col-md-6">
													<label>Secuencia del ejercicio *</label>
													<select class="form-control" id="Sec" name="Sec"required >
                                  <option selected value="" disabled>--Seleccione las veces que se realizará el ejercicio--</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                                  <option value="16">16</option>
                                  <option value="17">17</option>
                                  <option value="18">18</option>
                                  <option value="19">19</option>
                                  <option value="20">20</option>
                            </select>	
												</div>
												<div class="form-group col-md-6">
													<label>Nombre de la serie *</label>
													<input required type="text" class="form-control" id="Nom" name="Nom"placeholder="Ingrese El Nombre De la Serie">
												</div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Fecha Inicio *</label>
                            <div class="col-sm-9">
                            <input required type="date" class="form-control" id="FechaI" name="FechaI">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Fecha Fin *</label>
                            <div class="col-sm-9">
                            <input required type="date" class="form-control" id="FechaF" name="FechaF">
                            </div>
                        </div>
							<div class="form-group col-md-6">
								<label>Descripción de la serie *</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="5" placeholder="*Ingrese la descripción del ejercicio*"></textarea>
							</div>
						<div class="form-group col-md-6 ">
						<label class="col-form-label">Imagen de apoyo *</label>
						<div class="col-sm-9">
						<input class="form-control" style="height: 110px;" required type="file" id="ImgEjer" name="ImgEjer"  multiple>													
						</div>
					</div>
											<button type="submit"  id="registrar" name="registrar"onclick=validarForm1() class="btn btn-primary">Registrar</button>
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
    <script src="../vendor/global/global.min.js"></script>
	<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
	<script src="../js/deznav-init.js"></script>
	
    


    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot-spline/jquery.flot.spline.min.js"></script>
    <script src="../js/plugins-init/flot-init.js"></script>

	<!-- <script src="../assets/js/RegistroInstructor.js"></script> -->

</body>	

</html>