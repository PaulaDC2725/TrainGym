<?php
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
 $rolRec = $_SESSION["rolRecepcionista"];
 if ($rolRec != 1) {
	header('location: Error.php');
   
 } else {
	 
 }
require_once('../assets/php/modelo/class.consulta.instructor.php');
require_once('../assets/php/modelo/class.consulta.usuario.php');

$consultasInstructor = new consultasInstructor();
$consultasUsuario = new ConsultasUsuario();
$estadoInstructor=null;
$estadoUsuario = null;
$idUsuarioFK = null;


  $filas = $consultasInstructor->consultarInstructor();
 


$tabla="";
$estado='';
$boton='';

if (isset($filas)) {    

  foreach ($filas as $fila){
	$boton='<a href="mostrarInstructores.php?id='.$fila['idInstructor'].'&NumeroIdentificacion='.$fila['NumeroIdentificacion'].'" class="btn btn-danger shadow btn-xs sharp" style="background-color: red;"><i class="fa fa-trash"></i></a>';
	$botonEditar='<a href="actualizarInstructor.php?id='.$fila['NumeroIdentificacion'].'" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>';
	
	$tabla.='<tr class="limitada" scope="row">';
	$tabla.='<td><strong>'.$fila['NumeroIdentificacion'].'</strong></td>';
	  $tabla.='<td>'.$fila['nombreInstructor'].'</td>';
	  $tabla.='<td>'.$fila['apellidoInstructor'].'</td>';
	  $tabla.='<td>'.$fila['correoInstructor'].'</td>';
	  $tabla.='<td>'.$fila['telefonoInstructor'].'</td>';
	  $tabla.='<td><div class="d-flex">'.$botonEditar.' '.$boton.'</div></td>';
	  $tabla.='</tr>';

   
   }  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Instructores</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <!-- Datatable -->
    	<link rel="stylesheet" type="text/css" href="../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../css/font-awesome-old/css/font-awesome.min.css" >
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>
<?php
	  if(isset($_GET['NumeroIdentificacion'])  && isset($_GET['id'])) 
	  {
		echo("<script> window.addEventListener('load', init, false);
		function init () {
            Swal.fire({
                title: '??Est?? seguro de inhabilitar este usuario?',
                icon: 'warning',
                denyButtonColor: '#2c2c2c',
                confirmButtonColor: '#FF9900',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Confirmar',
                denyButtonText: `Cancelar`,
              }).then((result) => {
                if (result.isConfirmed) {
                      location.href = 'inhabilitarInstructor.php?id=".$fila['idInstructor']."&NumeroIdentificacion=".$fila['NumeroIdentificacion']."';
                } else if (result.isDenied) {
                   
                }
              });
			
		}
		
		  </script>");
	  }
	?>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="inicioRecepcionista.php" class="brand-logo">
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
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								Instructores
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
							<li><a href="inicioRecepcionista.php">Bienvenido</a></li>
							
						</ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="fa fa-money"></i>
							<span class="nav-text">Pagos</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="ConsultarPagos.php">Consultar pagos</a></li>
                            
                            </li>
                 
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-user-9"></i>
							<span class="nav-text">Instructores</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="RegistrarInstructor.php">Registrar Instructor</a></li>
                            <li><a href="mostrarInstructores.php">Mostrar instructores</a></li>
                            <li><a href="mostrarInstructores2.php">Habilitar instructores</a></li>
                            
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-user-9"></i>
							<span class="nav-text">Clientes </span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="mostrarClientes.php">Mostrar Clientes</a></li>
                            <li><a href="mostrarClientes1.php">Ficha y Suscripcion</a></li>
                            <li><a href="mostrarClientes2.php">Habilitar clientes</a></li>
                            

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Asistencias</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="registroAsistencias.php">Registrar Asistencias</a></li>
                            <li><a href="Asistencias.php">Mostrar Asistencias</a></li>
                            
                        </ul>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-calendar-7"></i>
						<span class="nav-text">Agenda</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="ConsultarAgendaClientes.php">Consultar Agenda Clientes</a></li>
						<li><a href="mostrarInstructores3.php">Agendar Programacion Instructores</a></li>
						
					</ul>
				</li>
				<div class="copyright">
					<p><strong>TrainGym</strong> ?? 2021 </p>
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Consultar</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Instructores</a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Informaci??n de los instructores</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
											<th scope="col">N??mero de identificaci??n</th>
											<th scope="col">Nombre</th>
											<th scope="col">Apellido</th>
											<th scope="col">Correo electr??nico</th>
											<th scope="col">Tel??fono</th>
											<th scope="col">Acci??n</th>
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
                <p>Copyright ?? Developed by TrainGym 2021</p>
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
