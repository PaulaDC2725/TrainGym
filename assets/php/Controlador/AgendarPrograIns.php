<?php
 error_reporting(E_ERROR | E_PARSE);
 include '../Modelo/class.conexion.php';
 session_start();
 $numDoc = $_SESSION["NumeroIdentificacion"];
 $rolRec = $_SESSION["rolRecepcionista"];
 if (!isset($numDoc) || $rolRec != 1 ) {
     echo '<!Doctype HTML>
     <html lang="es-ES">
     <head>
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
     <link rel="icon" type="image/x-icon" href="../assets/img/Logotipo.PNG" />
         <!-- Core theme CSS (includes Bootstrap)-->
     <link href="../assets/css/style.css" rel="stylesheet" />
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <title>| Error</title>
     <style>
     body{background-color: white;}
     </style>
     </head>
     <body>
     <script> window.addEventListener("load", init, false);
         function init () {
             Swal.fire({
                 title: "¡Error!",
                 text: "La pagina a la cual intenta acceder requiere haber iniciado sesion previamente o no tiene permisos para acceder a la misma",
                 icon: "error",
                 buttons: true,
                 dangerMode: true,
               }).then((willDelete) => {
             if (willDelete) {
                 location.href = "index.php";
             } else {
                 location.href = "index.php";
             }
           });
         }
         
           </script>
     
     </body>
     </html>';
     
 } 
require_once('../Modelo/class.consulta.asistencias.php');

if(isset($_GET['NumeroIdentificacion'])){
$ConsultasAsistencias = new ConsultasAsistencias();
$numid=$_GET['NumeroIdentificacion'];
$fechaInicioPro=$_POST['ingresopro'];
$fechaFinPro=$_POST['salidapro'];

$ConsultasAsistencias->registrarProgramacion($fechaInicioPro,$fechaFinPro,$numid); 
header('location: ../../../views/inicioRecepcionista.php');
}

