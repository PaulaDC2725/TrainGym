<?php
 error_reporting(E_ERROR | E_PARSE);
 require_once('../Modelo/class.conexion.php');
 session_start();
 $numDoc = $_SESSION["NumeroIdentificacion"];
   $rol = $_SESSION["rol"];
   if ($rol != 2) {
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
require_once('../Modelo/class.consulta.metodologia.php');

$consultaMetodologia = new consultaMetodologia();
if (isset($numDoc) && $rol == 2) {
    $id=$numDoc;
$idMetodologia=$_POST['tipoMetodologia'];    
$nombreSerie = $_POST['Nom'];
$descripcionSerie = $_POST['desc'];
$repeticion = $_POST['Rep'];
$Secuencia = $_POST['Sec'];
$idParteDelCuerpoFK=$_POST['ParteCuerpo'];
$Ejercicio="";
$idEjercicio=$_POST['NomEJ'];
if($idEjercicio=='1'){
    $Ejercicio="Sentadilla";
}else if($idEjercicio=='2'){
    $Ejercicio="Movientos circulares";
}else if($idEjercicio=='3'){
    $Ejercicio="Low Plank";
}else if($idEjercicio=='4'){
    $Ejercicio="Leg Raises";
}else if($idEjercicio=='5'){
    $Ejercicio="Inchworms";
}
$fechaInicio=$_POST['FechaI'];
$fechaFin=$_POST['FechaF'];
$SuscSerie="";
$registroEj = $consultaMetodologia->registrarEjercicios($idParteDelCuerpoFK,$Ejercicio);
$mensaje4 = $consultaMetodologia->registrarSeries($nombreSerie, $descripcionSerie,$repeticion,$Secuencia,$idMetodologia);
$consultarSuscripciones= $consultaMetodologia->ConsultarSucrcipcion($idMetodologia);
    if (is_array($consultarSuscripciones) || is_object($consultarSuscripciones)){
    foreach ($consultarSuscripciones as $consultarSuscripcion){       
        $idSuscripcionFK=$consultarSuscripcion['idSuscripcion'];
      }
    }
    if(isset($idSuscripcionFK)){
        $SuscSerie =$consultaMetodologia->registrarSuscSerie($idSuscripcionFK,$fechaInicio,$fechaFin);
        $RutEj= $consultaMetodologia->registrarRutEj($idEjercicio);
        header('location: ../../../views/consultarSeries.php?NumeroIdentificacion='.$id);
    }else{
        echo "No se encontró ninguna suscripción con esa metodología";
    }
}
// 
?>