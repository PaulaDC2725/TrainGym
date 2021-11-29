<?php 
     
  include '../assets/php/modelo/class.conexion.php';
  session_start();
  $numDoc = $_SESSION["NumeroIdentificacion"];
$rol = $_SESSION["rol"];
if ($rol != 3) {
	header('location: Error.php');
  
} else {
}
  require_once('../assets/php/modelo/class.consulta.cliente.php');
  require_once('../assets/php/modelo/class.consulta.suscripcion.php');

  $consultas = new ConsultasClientes;
  $consultasS = new ConsultasSuscripcion();

 
  $numeroIdentificacion=null;
  $descripcion=null;
  $comprobante=null;  
  $fechaPago=null;
  $valor=null;
  $metodologia=null;
  $nombreCliente=null;

  if (isset($numDoc) && $rol == 3) {
    $id=$numDoc;
    
	$tabla="";
	$filtro=$id;
	$select="";

	$filas = $consultasS->cargarPagoCliFiltroId($filtro);
	if (is_array($filas) || is_object($filas))
	{      
	  foreach ($filas as $fila) 
	  {
		$tabla.='<tr class="limitada" scope="row">';
		$tabla.='<td>'.$fila['valorPago'].'</td>';
		$tabla.='<td>'.$fila['fechaPago'].'</td>';
		$tabla.='<td>'.$fila['descripcionPago'].'</td>';
		$tabla.='<td><img style="height: 125px;" class="img-fluid" src="../assets/php/controlador/images/'.$fila['urlSoportePago'].'" alt="imagen soporte"/></td>';
		$tabla.='<td>'.$fila['nombreMetodologia'].'</td>';
		$numeroIdentificacion=$id;
		$descripcion=$fila['descripcionPago'];
		$comprobante=$fila['urlSoportePago'];  
		$fechaPago=$fila['fechaPago'];
		$valor=$fila['valorPago'];
		$metodologia=$fila['nombreMetodologia'];
		$nombreCliente = $fila['Nombre Completo']; 
	  }
	}else{
		$filas1 = $consultas->cargarClientesFiltroId($filtro);
		foreach ($filas1 as $fila) 
		{
		  $numeroIdentificacion=$fila['NumeroIdentificacion']; 
			$nombreCliente = $fila['nombreCliente'];   
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
	<title>Pagos</title>
    <!-- Favicon icon -->
    	<link rel="stylesheet" type="text/css" href="../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../css/font-awesome-old/css/font-awesome.min.css" >
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <!-- Datatable -->
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Custom Stylesheet -->
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
								Pagos
                            </div>
                        </div>
                        <ul class="navbar-nav header-right"></ul>
						
                                <div class="dropdown-menu rounded dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
										<ul class="timeline">
										
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="../app-profile.html" class="dropdown-item ai-icon">
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
							<li><a href="inicioCliente.php">Bienvenido</a></li>
							
						</ul>
                    </li>
                    <li class="mm-active"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
						<i class="fa fa-money"></i>
							<span class="nav-text">Pagos</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="realizarPagosCli.php">Registrar</a></li>
                            
                            </li>
							<a href="consultarPagosCli.php" class="mm-active">Consultar</a>
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
                    <li><a href="registrarFicha.php" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-resume"></i>
							<span class="nav-text">Ficha Antropométrica </span>
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Consultar</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Pagos</a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Pagos realizados por <br><?php echo $nombreCliente?></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
											<th scope="col">Valor del pago</th>
											<th scope="col">Fecha del pago</th>
											<th scope="col">Descripción del pago</th>
											<th scope="col">Comprobante pago</th>
											<th scope="col">Metodología</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php echo $tabla;?>
										</tbody>
                                    </table>									
                                </div>
								
								
                            </div>
                        </div>					
                    </div>					
				</div>
            </div>
		</div>

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
	
    <!-- Datatable -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../js/plugins-init/datatables.init.js"></script>

</body>
</html>
