<?php
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
 $rolRec = $_SESSION["rolRecepcionista"];
 if ($rolRec != 1) {
	header('location: Error.php');
   
}
require_once('../assets/php/modelo/class.conexion.php');
require_once('../assets/php/modelo/class.consulta.usuario.php');

$consultasUsuario = new ConsultasUsuario();

$numeroIdentificacion=$_SESSION['numeroDocumento'];
     $filas = $consultasUsuario->validarExistencia($numeroIdentificacion);
 
     foreach ($filas as $fila) {
         $resultado=$fila['Cantidad'];
       } 
       
?>
<html>
<head>
<meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                <meta name="description" content="" />
                <meta name="author" content="" />
                	<link rel="stylesheet" type="text/css" href="../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../css/font-awesome-old/css/font-awesome.min.css" >
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
            crossorigin="anonymous">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
        
            <link rel="stylesheet" href="../fonts/icomoon/style.css">
        
            <link rel="stylesheet" href="../css/owl.carousel.min.css">
            <link rel="icon" type="image/x-icon" href="../img/Logotipo.PNG" />
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="../css/bootstrap.min.css">
            
            <!-- Style -->
            <link rel="stylesheet" href="../css/styleLogin.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

*{
  font-family: "Poppins";
  
}
</style>

</head>
<body>

<?php
if($resultado == 0){
    echo "<script> window.addEventListener('load', init, false);
            function init () {
                Swal.fire({
                     title: '¡ERROR!',
                     text: 'Por alguna razón no ha sido posible encontrar el usuario',
                     icon: 'error',
                     buttons: true,
                     dangerMode: true,
                   }).then((willDelete) => {
                 if (willDelete) {
                     location.href = 'inicioRecepcionista.php';
                 } else {
                     location.href = 'inicioRecepcionista.php';
                 }
               });
             }
            
               </script>";
      
}else{
       
   }
?>
<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/php/PHPMailer/src/Exception.php';
require '../assets/php/PHPMailer/src/PHPMailer.php';
require '../assets/php/PHPMailer/src/SMTP.php';

$server = 'localhost';
$username = 'root'; 
$password = ''; 
$database = 'gimnasiobd'; 

$emailRec = mysqli_connect("localhost", "root", "", "gimnasiobd") or die($emailRec);

$message = '';

if (!empty($_POST['Num'])&& $resultado == 1){
    $numDoc = $_POST['Num'];
    $email = $_POST['email'];
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'traingymsoftware@gmail.com';               
        $mail->Password = '';                           
        $mail->SMTPSecure = 'tls';                        
        $mail->Port = 587;                                    
    
        $mail->setFrom('traingymsoftware@gmail.com');	
        $mail->addAddress($email);    
     
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Activa tu cuenta!';  
        $mail->Body = '
        
        <!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>

    <meta charset="utf-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="x-apple-disable-message-reformatting"> 
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

.im {
    color: inherit !important;
}
img.g-img + div {
    display: none !important;
}

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}

    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

	    .primary{
	background: #ff9900;
}
.bg_white{
	background: #ffffff;
}
.bg_light{
	background: #fafafa;
}
.bg_black{
	background: #000000;
}
.bg_dark{
	background: rgba(0,0,0,.8);
}
.email-section{
	padding:2.5em;
}

.btn{
	padding: 10px 15px;
	display: inline-block;
}
.btn.btn-primary{
	border-radius: 5px;
	background: #ff9900;
	color: #ffffff;
}
.btn.btn-white{
	border-radius: 5px;
	background: #ffffff;
	color: #000000;
}
.btn.btn-white-outline{
	border-radius: 5px;
	background: transparent;
	border: 1px solid #fff;
	color: #fff;
}
.btn.btn-black-outline{
	border-radius: 0px;
	background: transparent;
	border: 2px solid #000;
	color: #000;
	font-weight: 700;
}

h1,h2,h3,h4,h5,h6{
	font-family: sans-serif;
	color: #000000;
	margin-top: 0;
	font-weight: 400;
}

body{
	font-family: sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	color: rgba(0,0,0,.4);
}

a{
	color: #ff9900
}

.logo h1{
	margin: 0;
}
.logo h1 a{
	color: #ff9900;
	font-size: 24px;
	font-weight: 700;
	font-family:  sans-serif;
}
.hero{
	position: relative;
	z-index: 0;
}

.hero .text{
	color: rgba(0,0,0,.3);
}
.hero .text h2{
	color: #000;
	font-size: 40px;
	margin-bottom: 0;
	font-weight: 400;
	line-height: 1.4;
}
.hero .text h3{
	font-size: 24px;
	font-weight: 300;
}
.hero .text h2 span{
	font-weight: 600;
	color: #ff9900
}

.heading-section h2{
	color: #000000;
	font-size: 28px;
	margin-top: 0;
	line-height: 1.4;
	font-weight: 400;
}
.heading-section .subheading{
	margin-bottom: 20px !important;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(0,0,0,.4);
	position: relative;
}
.heading-section .subheading::after{
	position: absolute;
	left: 0;
	right: 0;
	bottom: -10px;
	width: 100%;
	height: 2px;
	background: #ff9900;
	margin: 0 auto;
}

.heading-section-white{
	color: rgba(255,255,255,.8);
}
.heading-section-white h2{
	line-height: 1;
	padding-bottom: 0;
}
.heading-section-white h2{
	color: #ffffff;
}
.heading-section-white .subheading{
	margin-bottom: 0;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(255,255,255,.4);
}


ul.social{
	padding: 0;
}
ul.social li{
	display: inline-block;
	margin-right: 10px;
}
.footer{
	border-top: 1px solid rgba(0,0,0,.05);
	color: rgba(0,0,0,.5);
}
.footer .heading{
	color: #000;
	font-size: 20px;
}
.footer ul{
	margin: 0;
	padding: 0;
}
.footer ul li{
	list-style: none;
	margin-bottom: 10px;
}
.footer ul li a{
	color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
	<center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
    	<!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
          	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
          		<tr>
          			<td class="logo" style="text-align: center;">
			            <img src="https://raw.githubusercontent.com/PaulaDC2725/TrainGym/main/assets/img/Logo.jpeg" width="400" height="100"/>
			          </td>
          		</tr>
          	</table>
          </td>
	      </tr><!-- end tr -->
	      <tr>
          <td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0;">
            <img src="images/email.png" alt="" style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
          </td>
	      </tr><!-- end tr -->
				<tr>
          <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
            <table>
            	<tr>
            		<td>
            		<pre style="color: #2c2c2c">En caso de estar el correo de activación en la carpeta SPAM, seleccionar la opción *NO ES SPAM*</pre>
            			<div class="text" style="padding: 0 2.5em; text-align: center;">
            				<h2>¡Por favor, activa tu cuenta! </h2>
            				<a href="http://localhost/trainGym/assets/php/controlador/activarCuenta1.php?email='.$email.'&doc='.$numDoc.'"><button type="button" class="btn btn-warning"style="background-color: #FF9900;color:white ;">Haciendo clic aqui</button></a>
            				 <pre style="color: #2c2c2c">En caso de no funcionar el botón copie y pegue este link en su navegador:</pre>
            				  <pre style="color: #ff9900">http://localhost/trainGym/assets/php/controlador/activarCuenta1.php?email='.$email.'&doc='.$numDoc.'</pre>
            				    </div>
            		</td>
            	</tr>
            </table>
          </td>
	      </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="middle" class="bg_light footer email-section">
            <table>
            	<tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                      	<div class="container">
               <div class="row">

                    <div class="ml-auto col-lg-4 col-md-5">
                        <p class="copyright-text">Copyright &copy; 2021 TRAINGYM.
                        
                        <br>Design: <a href="https://www.tooplate.com">TRAINGYM</a></p>
                    </div>

                    <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                        <p class="mr-4">
                            <i class="fa fa-envelope-o mr-1"></i>
                            <!--<a href="">-->trainGymSoftware@gmail.com<!--</a>-->
                        </p>

                        
                    </div>
                    
               </div>
          </div>
          </td>
        </tr>
      </table>

    </div>
  </center>
</body>
</html>';   


        
        $mail->AltBody = 'Este es el contenido del mensaje en texto plano';  

        $usuarioPass = "SELECT * FROM usuarios WHERE NumeroIdentificacion='$email'";
        $stmt = $emailRec->query($usuarioPass);
    if($stmt){
        $mail->send();
        $exito = "Revisar el correo electronico $email para activar correctamente la cuenta. ¡RECUERDE REVISAR LA CARPETA SPAM!";
        echo "<script> window.addEventListener('load', init, false);
        function init () {
            Swal.fire({
                title: '¡Email enviado correctamente!',
                text: '$exito',
                icon: 'success',
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
            if (willDelete) {
                location.href = 'mostrarInstructores2.php';
            } else {
                location.href = 'mostrarInstructores2.php';
            }
          });
        }
        
          </script>";  
    }}catch (Exception $e) {
        echo 'Hubo un error al enviar el correo de verificación: ', $mail->ErrorInfo;
    }
}

?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

		</body>

</html>
