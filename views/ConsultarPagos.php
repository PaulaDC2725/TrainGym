<?php
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/Modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
 $rolRec = $_SESSION["rolRecepcionista"];
 if ($rolRec != 1) {
	header('location: Error.php');
   
 } else {
	 
 }
require_once('../assets/php/Modelo/class.consulta.cliente.php');
require_once('../assets/php/Modelo/class.consulta.suscripcion.php');
  $consultasCli = new ConsultasClientes();
  $consultasS = new ConsultasSuscripcion();
 
    $filas = $consultasCli->consultarClientes();
 
   
  
  $tabla="";
  $estado='';
  $boton='';
  /*$rutaActivaInactiva="";*/
  
  /*$botonBorrar='';*/

  if (isset($filas)) {    

    foreach ($filas as $fila){
     
      $tabla.='<tr class="limitada" scope="row">';
        $tabla.='<td><strong>'.$fila['NumeroIdentificacion'].'</strong></td>';
        $tabla.='<td>'.$fila['nombreCliente'].'</td>';
        $tabla.='<td>'.$fila['apellidoCliente'].'</td>';
        $tabla.='<td>'.$fila['fechaNacimientoCliente'].'</td>';
        $tabla.='<td>'.$fila['correoCliente'].'</td>';
        $tabla.='<td>'.$fila['telefonoCliente'].'</td>';
        $botonPagos='<a href="ConsultarPagosClientes.php?NumeroIdentificacion='.$fila['NumeroIdentificacion'].'&id='.$fila['idCliente'].'" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>';

        $tabla.='<td>
					<div class="d-flex">
					'.$botonPagos.'
					</div>												
				</td>';
      $tabla.='</tr>';

     
     }
	 
}
$rows1 = $consultasS->ConsultarCantidadPagosCli();
	if (is_array($rows1) || is_object($rows1))
  	{      
		foreach ($rows1 as $row1) 
		{
		$CantidadPagos=$row1['Cantidad de los clientes que han pagado'];
		}
	}
	$rows = $consultasS->ConsultarPorcentajePagosCli();
	if (is_array($rows) || is_object($rows))
  	{      
		foreach ($rows as $row) 
		{
		$PorcentajePagos=$row['Porcentaje de los pagos'];
		}
	}  
//  <a href=ConsultarPagosClientes.php?NumeroIdentificacion='.$fila['NumeroIdentificacion'].'&id='.$fila['idCliente'].'"><input type="button" class="btn btn-info" value="Consultar Pagos"></a>

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Clientes del gimnasio</title>
    <!-- Favicon icon -->
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
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								Pagos Por Cliente
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
                                <h4 class="card-title"><strong>Porcentaje de pagos realizados: </strong> <?php echo $PorcentajePagos?>% <br> <strong>Cantidad de clientes que han pagado: </strong><?php echo $CantidadPagos?></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
											<th scope="col">Número de identificación</th>
											<th scope="col">Nombre</th>
											<th scope="col">Apellido</th>
											<th scope="col">Fecha de nacimiento</th>
											<th scope="col">Correo electrónico</th>
											<th scope="col">Teléfono</th>
											<th scope="col">Pagos</th>
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
										<!-- <tr>
                                                <td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
                                                <td>Tiger Nixon</td>
                                                <td>Architect</td>
                                                <td>Male</td>
                                                <td>M.COM., P.H.D.</td>
                                                <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                                <td>2011/04/25</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
														<a href="#" class="btn btn-warning shadow btn-xs sharp"style="bac"><i class="fa fa-eye"></i></a>
													</div>												
												</td>												
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic2.jpg" alt=""></td>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Female</td>
                                                <td>M.COM., P.H.D.</td>
                                                <td><a href="javascript:void(0);"><strong>987 654 3210</a></strong></td>
												<td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2011/07/25</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic3.jpg" alt=""></td>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical</td>
                                                <td>Male</td>
                                                <td>B.COM., M.COM.</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
												<td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2009/01/12</td>
												<td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic4.jpg" alt=""></td>
                                                <td>Cedric Kelly</td>
                                                <td>Developer</td>
                                                <td>Male</td>
												<td>B.COM., M.COM.</td>
                                                <td><a href="javascript:void(0);"><strong>123 456 7890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2012/03/29</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic5.jpg" alt=""></td>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Female</td>
												<td>B.A, B.C.A</td>
                                                <td><a href="javascript:void(0);"><strong>987 654 3210</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2008/11/28</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic6.jpg" alt=""></td>
                                                <td>Brielle Williamson</td>
                                                <td>Specialist</td>
                                                <td>Male</td>
												<td>B.COM., M.COM.</td>
                                                <td><a href="javascript:void(0);"><strong>123 456 7890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2012/12/02</td>
												<td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic7.jpg" alt=""></td>
                                                <td>Herrod Chandler</td>
                                                <td>Sales Assistant</td>
                                                <td>Female</td>
												<td>B.A, B.C.A</td>
                                                <td><a href="javascript:void(0);"><strong>987 654 3210</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2012/08/06</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic8.jpg" alt=""></td>
                                                <td>Rhona Davidson</td>
                                                <td>Integration</td>
                                                <td>Male</td>
												<td>B.TACH, M.TACH</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2010/10/14</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic9.jpg" alt=""></td>
                                                <td>Colleen Hurst</td>
                                                <td>Javascript Developer</td>
                                                <td>Female</td>
												<td>B.A, B.C.A</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2009/09/15</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic10.jpg" alt=""></td>
                                                <td>Sonya Frost</td>
                                                <td>Software Engineer</td>
                                                <td>Male</td>
												<td>B.COM., M.COM.</td>
                                                <td><a href="javascript:void(0);"><strong>123 456 7890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2008/12/13</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
                                                <td>Jena Gaines</td>
                                                <td>Office Manager</td>
                                                <td>Female</td>
												<td>B.TACH, M.TACH</td>
                                                <td><a href="javascript:void(0);"><strong>987 654 3210</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2008/12/19</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic2.jpg" alt=""></td>
                                                <td>Quinn Flynn</td>
                                                <td>Support Lead</td>
                                                <td>Male</td>
												<td>B.TACH, M.TACH</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2013/03/03</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic3.jpg" alt=""></td>
                                                <td>Charde Marshall</td>
                                                <td>Regional Director</td>
                                                <td>Female</td>
												<td>B.A, B.C.A</td>
                                                <td><a href="javascript:void(0);"><strong>123 456 7890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2008/10/16</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic4.jpg" alt=""></td>
                                                <td>Haley Kennedy</td>
                                                <td>Senior Marketing</td>
                                                <td>Male</td>
												<td>B.COM., M.COM.</td>
                                                <td><a href="javascript:void(0);"><strong>987 654 3210</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2012/12/18</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic5.jpg" alt=""></td>
                                                <td>Tatyana Fitzpatrick</td>
                                                <td>Regional Director</td>
                                                <td>Male</td>
												<td>B.TACH, M.TACH</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2010/03/17</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic6.jpg" alt=""></td>
                                                <td>Michael Silva</td>
                                                <td>Marketing Designer</td>
                                                <td>Female</td>
												<td>B.A, B.C.A</td>
                                                <td><a href="javascript:void(0);"><strong>123 456 7890</a></strong></td>
												<td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
												<td>2012/11/27</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic7.jpg" alt=""></td>
                                                <td>Paul Byrd</td>
                                                <td>Financial Officer</td>
                                                <td>Male</td>
												<td>B.TACH, M.TACH</td>
                                                <td><a href="javascript:void(0);"><strong>987 654 3210</a></strong></td>
												<td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2010/06/09</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic8.jpg" alt=""></td>
                                                <td>Gloria Little</td>
                                                <td>Systems Administrator</td>
                                                <td>Female</td>
												<td>B.A, B.C.A</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2009/04/10</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic9.jpg" alt=""></td>
                                                <td>Bradley Greer</td>
                                                <td>Software Engineer</td>
                                                <td>Male</td>
												<td>B.COM., M.COM.</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2012/10/13</td>
												<td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic10.jpg" alt=""></td>
                                                <td>Dai Rios</td>
                                                <td>Personnel Lead</td>
                                                <td>Male</td>
												<td>B.TACH, M.TACH</td>
                                                <td><a href="javascript:void(0);"><strong>123 456 7890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2012/09/26</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
                                                <td>Jenette Caldwell</td>
                                                <td>Development Lead</td>
                                                <td>Female</td>
												<td>B.A, B.C.A</td>
                                                <td><a href="javascript:void(0);"><strong>987 654 3210</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2011/09/03</td>
												<td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic2.jpg" alt=""></td>
                                                <td>Yuri Berry</td>
                                                <td>Marketing Officer</td>
                                                <td>Male</td>
												<td>B.TACH, M.TACH</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2009/06/25</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic3.jpg" alt=""></td>
                                                <td>Caesar Vance</td>
                                                <td>Pre-Sales Support</td>
                                                <td>Male</td>
												<td>B.TACH, M.TACH</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2011/12/12</td>
												<td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic4.jpg" alt=""></td>
                                                <td>Doris Wilder</td>
                                                <td>Sales Assistant</td>
                                                <td>Female</td>
												<td>B.A, B.C.A</td>
                                                <td><a href="javascript:void(0);"><strong>123 456 7890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2010/09/20</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic5.jpg" alt=""></td>
                                                <td>Angelica Ramos</td>
                                                <td>Executive Officer</td>
                                                <td>Male</td>
												<td>B.COM., M.COM.</td>
                                                <td><a href="javascript:void(0);"><strong>987 654 3210</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2009/10/09</td>
												<td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic6.jpg" alt=""></td>
                                                <td>Gavin Joyce</td>
                                                <td>Developer</td>
                                                <td>Female</td>
												<td>B.TACH, M.TACH</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2010/12/22</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic7.jpg" alt=""></td>
                                                <td>Jennifer Chang</td>
                                                <td>Regional Director</td>
                                                <td>Male</td>
												<td>B.A, B.C.A</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2010/11/14</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic8.jpg" alt=""></td>
                                                <td>Brenden Wagner</td>
                                                <td>Software Engineer</td>
                                                <td>Female</td>
												<td>B.TACH, M.TACH</td>
                                                <td><a href="javascript:void(0);"><strong>123 456 7890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2011/06/07</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic9.jpg" alt=""></td>
                                                <td>Fiona Green</td>
                                                <td>Operating Officer</td>
                                                <td>Male</td>
												<td>B.A, B.C.A</td>
                                                <td><a href="javascript:void(0);"><strong>987 654 3210</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2010/03/11</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td><img class="rounded-circle" width="35" src="images/profile/small/pic10.jpg" alt=""></td>
                                                <td>Shou Itou</td>
                                                <td>Regional Marketing</td>
                                                <td>Female</td>
												<td>B.COM., M.COM.</td>
                                                <td><a href="javascript:void(0);"><strong>(123) 4567 890</a></strong></td>
                                                <td><a href="javascript:void(0);"><strong>info@example.com</a></strong></td>
                                                <td>2011/08/14</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                        </tbody> -->
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
	
    <!-- Datatable -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../js/plugins-init/datatables.init.js"></script>

</body>
</html>
