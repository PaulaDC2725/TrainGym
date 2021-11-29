<?php
session_start();
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.consulta.suscripcion.php');
require_once('../modelo/class.consulta.fichaAntro.php');
require_once('../modelo/class.consulta.metodologia.php');
require_once('../modelo/class.consulta.usuario.php');
$consultasSuscripcion = new ConsultasSuscripcion();
$consultasFicha = new consultasFicha();
$consultasMetodologia = new consultaMetodologia();
$ConsultasUsuario = new ConsultasUsuario();
$metodologia=$_POST['metodologia'];
$nombreMetodologia='';
if($metodologia=='1'){
$nombreMetodologia='Disminuir de peso';
}else if($metodologia=='2'){
    $nombreMetodologia='Aumentar masa corporal';
}else if($metodologia=='3'){
    $nombreMetodologia='2X1';
}


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
$medida10 = $_POST['longExinf1'];
$estadoUsuario ="1";
$idRolFK = "3";
$estadoSuscripcion = "1";
$valorSuscripcion = $_POST['valorS'];
$fechaSuscripcion = $_POST['FechaS'];
$FechaFicha = $_POST['FechaFicha'];
$Estatura = $_POST['Estatura'];
$descMedic = $_POST['descMedic'];
$pesoCliente = $_POST['Peso'];

$fechaMet = $_POST['fechaMet'];
$fechaMetFin = $_POST['FechFinMet'];
?>
 <!Doctype HTML>
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
        	<link rel="stylesheet" type="text/css" href="../../../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome-old/css/font-awesome.min.css" >
  <link href="../../../assets/css/styles.css" rel="stylesheet" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>| Matricular cliente</title>
</head>
<body>
    <!-- Responsive navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
              <a href="index.php">
                <img width="300" height="70" src="../../../assets/img/logo1.png">
            	</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="COVID.php">COVID-19</a></li>
                        <li class="nav-item"><a class="nav-link" href="Registro.php" >Registrate</a></li>
                        <li class="nav-item"><a class="nav-link" href="loginAg.php">Programar</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Ingresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
   <!---->
   <br>
  <div class="container">
  <?php     
  $mensaje6 = $consultasSuscripcion -> registrarSuscripcion($valorSuscripcion, $fechaSuscripcion, $estadoSuscripcion,$metodologia);
  $mensaje10 = $consultasMetodologia-> registrarSuscMeto($metodologia,$fechaMet,$fechaMetFin);
$mensaje7 = $consultasFicha -> registrarFichaAntro($FechaFicha, $Estatura, $pesoCliente,$descMedic);
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
$mensaje28 = $ConsultasUsuario -> consultarUltimoUsuario();

if(is_array($mensaje28) || is_object($mensaje28)) {

  foreach ($mensaje28 as $recorrido) {
    $ultimo = $recorrido["Ultimo"];
  }
}

$mensaje29 = $ConsultasUsuario -> consultarUltimoCorreo($ultimo);

if(is_array($mensaje29) || is_object($mensaje29)) {

  foreach ($mensaje29 as $recorrido2) {
    $correo = $recorrido2["correoCliente"];
  }
}

$_SESSION['numeroDocumento'] = $ultimo;
$_SESSION['email'] = $correo;



echo "<script>location.href=' ../../../views/mailConfirmCli.php';</script>";
die();
?>
	</div>	
	<br>
	<br>
	  <!-- Footer-->
	  <footer class="py-5">
          <div class="container" ><p class="m-0 text-center text-white">Copyright &copy; TrainGym 2021</p></div>
        </footer> 
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
	<script src="../../js/Registros2.js">
	</script>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
			crossorigin="anonymous">
	</script>
</html>
 