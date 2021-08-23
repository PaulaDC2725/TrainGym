<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.cliente.php');
require_once('../Modelo/class.consulta.usuario.php');
require_once('../Modelo/class.consulta.suscripcion.php');
require_once('../Modelo/class.consulta.fichaAntro.php');
$mysqli = new mysqli('127.0.0.1', 'root', '', 'gimnasiobd');
$mysqli->set_charset("utf8");
$consultasCliente = new ConsultasClientes();
$consultasUsuario = new ConsultasUsuario();
$consultasSuscripcion = new ConsultasSuscripcion();
$consultasFicha = new consultasFicha();
$telefonoCliente = $_POST['Tel'];
$NumeroIdentificacion = $_POST['Num'];
$correoCliente = $_POST['corr'];
$tabla1="USUARIOS";
$tabla2="CLIENTES";
$NumeroIdentificacion=$mysqli->query("SELECT NumeroIdentificacion from $tabla1 where NumeroIdentificacion='$NumeroIdentificacion'");
$correoCliente=$mysqli->query("SELECT correoCliente from $tabla2 where correoCliente='$correoCliente'");
$telefonoCliente=$mysqli->query("SELECT telefonoCliente from $tabla2 where telefonoCliente='$telefonoCliente'");
if(mysqli_num_rows($NumeroIdentificacion)>0 || mysqli_num_rows($correoCliente)>0 ||mysqli_num_rows($telefonoCliente)>0  )
{
echo '<script>alert("ERROR! Datos ya registrados en el sistema anteriormente, por favor ingreselos nuevamente");window.location = "../../../views/registroPaso1.php";</script>';
}
else
{
$nombreDocumento = '';
$tipoDocumento=$_POST['tipoDocumentoCli'];
$metodologia=$_POST['metodologia'];
$nombreMetodologia='';
if($metodologia=='1'){
$nombreMetodologia='Disminuir de peso';
}else if($metodologia=='2'){
	$nombreMetodologia='Aumentar masa corporal';
}else if($metodologia=='3'){
	$nombreMetodologia='2X1';
}


$nombreParteCuerpo1= $_POST['Craneo'];
$nombreParteCuerpo2= $_POST['BicDer'];
$nombreParteCuerpo3= $_POST['BicIzq'];
$nombreParteCuerpo4= $_POST['musDer'];
$nombreParteCuerpo5= $_POST['musIzq'];
$nombreParteCuerpo6= $_POST['Cintura'];
$nombreParteCuerpo7= $_POST['brazD'];
$nombreParteCuerpo8= $_POST['brazI'];
$nombreParteCuerpo9= $_POST['pierD'];
$nombreParteCuerpo10= $_POST['perI'];
$idParteDelCuerpo1FK='6';
$idParteDelCuerpo2FK='7';
$idParteDelCuerpo3FK='8';
$idParteDelCuerpo4FK='9';
$idParteDelCuerpo5FK='10';
$idParteDelCuerpo6FK='11';
$idParteDelCuerpo7FK='12';
$idParteDelCuerpo8FK='13';
$idParteDelCuerpo9FK='14';
$idParteDelCuerpo10FK='15';
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
$nombreCliente=$_POST['Nom'];
$apellidoCliente = $_POST['Ape'];
$telefonoCliente = $_POST['Tel'];
$fechaNacimiento = $_POST['FechaN'];
$idUsuarioFK = $_POST['Num'];
$NumeroIdentificacion = $_POST['Num'];
$correoCliente = $_POST['corr'];
$contra1 = $_POST['Contraseña'];
$estadoUsuario ="1";
$idRolFK = "3";
$estadoSuscripcion = "1";
$valorSuscripcion = $_POST['valorS'];
$fechaSuscripcion = $_POST['FechaS'];
$FechaFicha = $_POST['FechaFicha'];
$Estatura = $_POST['Estatura'];
$descMedic = $_POST['descMedic'];
$pesoCliente = $_POST['Peso'];
$mensaje3 = $consultasUsuario->registrarUsuario($NumeroIdentificacion,$contra1, $estadoUsuario,$idRolFK,$tipoDocumento);
$mensaje4 = $consultasCliente->registrarCliente($nombreCliente, $apellidoCliente,$fechaNacimiento,$correoCliente,$telefonoCliente,$estadoUsuario);
$mensaje6 = $consultasSuscripcion -> registrarSuscripcion($valorSuscripcion, $fechaSuscripcion, $estadoSuscripcion,$metodologia);
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
header ('location: ../../../views/login.php');
} 

/*echo ($mensaje1);
echo '<br>';
echo ($mensaje2);
echo '<br>';
echo ($mensaje3);
echo '<br>';
echo ($mensaje4);
echo '<br>';
/*echo ($mensaje5);
echo '<br>';*/
/*echo ($mensaje6);
echo '<br>';
echo ($mensaje7);
echo '<br>';
echo ($mensaje9);
echo '<br>';
echo ($mensaje11);
echo '<br>';
echo ($mensaje13);
echo '<br>';
echo ($mensaje15);
echo '<br>';
echo ($mensaje17);
echo '<br>';
echo ($mensaje19);
echo '<br>';
echo ($mensaje21);
echo '<br>';
echo ($mensaje23);
echo '<br>';
echo ($mensaje25);
echo '<br>';
echo ($mensaje27);*/
/**/
 ?>
 