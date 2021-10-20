<?php
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/Modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
$rol = $_SESSION["rol"];
if ($rol != 3) {
	header('location: Error.php');
  
} else {
}
require_once('../assets/php/Modelo/class.consulta.cliente.php');

  $consultas = new ConsultasClientes();

 
  $numeroIdentificacion=null;
  $semanaDiaHorario=null;
  $horaFinHorario=null;  
  $horaInicioHorario=null;

  if (isset($numDoc) && $rol == 3) {
    $id=$numDoc;
    
      $tabla="";
      $filtro=$id;
      $select="";

      $filas = $consultas->cargarAgendaCliFiltroId($filtro);
      if (is_array($filas) || is_object($filas))
      {      
        foreach ($filas as $fila) 
        {
          $tabla.='<tr class="limitada" scope="row">';
          $tabla.='<td>'.$fila['idProgramacion'].'</td>';
          $tabla.='<td>'.$fila['fechaInicioPro'].'</td>';
          $tabla.='<td>'.$fila['fechaFinPro'].'</td>';
          $numeroIdentificacion=$fila['NumeroIdentificacion']; 
          $nombreCliente = $fila['nombreCliente'];   
          $fechaInicioPro=$fila['fechaInicioPro'];
          $fechaFinPro =$fila['fechaFinPro'];
          $idProgramacion=$fila['idProgramacion'];
        }
      }else{
      $filas1 = $consultas->cargarClientesFiltroId($filtro);
      foreach ($filas1 as $fila) 
      {
        $numeroIdentificacion=$fila['NumeroIdentificacion']; 
          $nombreCliente = $fila['nombreCliente'];          
      }
    }
      if (is_array($filas) || is_object($filas))
      {  
        foreach ($filas as $fila) 
        {
          $numeroIdentificacion=$fila['NumeroIdentificacion']; 
          $nombreCliente = $fila['nombreCliente'];
          $idProgramacion=$fila['idProgramacion'];
          $fechaInicioPro=$fila['fechaInicioPro'];
          $fechaFinPro =$fila['fechaFinPro'];
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
	<title>Agenda</title>
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
								            Agenda
                            </div>
                        </div>
                        <ul class="navbar-nav header-right"></ul>
                                
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Consultar</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Agenda</a></li>
					</ol>
                </div>
                <!-- row -->

				<div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Información de la Agenda de <?php echo $nombreCliente?></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display">
                                        <thead>
                                            <tr>
                                            <th scope="col">Número de la programación</th>
                                            <th scope="col">Fecha Inicio de la programación</th>
                                            <th scope="col">Fecha Fin de la programación</th>
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
