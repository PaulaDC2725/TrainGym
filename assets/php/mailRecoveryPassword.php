<html>
<head>
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
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$server = 'localhost';
$username = 'root'; 
$password = ''; 
$database = 'gimnasiobd'; 

$emailRec = mysqli_connect("localhost", "root", "", "gimnasiobd") or die($emailRec);

$message = '';

if (!empty($_POST['Num'])){
    $numDoc = $_POST['Num'];
    $email = $_POST['email'];
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'traingymsoftware@gmail.com';               
        $mail->Password = '1345ElmejorGrupo';                           
        $mail->SMTPSecure = 'tls';                        
        $mail->Port = 587;                                    
    
        $mail->setFrom('traingymsoftware@gmail.com');	
        $mail->addAddress($email);    
     
        $mail->isHTML(true);
        $mail->Subject = 'Recupera tu contraseña!';  
        $mail->Body = '
            <h2>Please verify your email</h2>
            <p><a href="http://localhost/trainGym/assets/php/Controlador/recoveryPass.php?email='.$email.'&doc='.$numDoc.'" class="btn btn-primary">Recuperar!</a></p>
        ';   
        $mail->AltBody = 'Este es el contenido del mensaje en texto plano';  

        $usuarioPass = "SELECT * FROM usuarios WHERE NumeroIdentificacion='$email'";
        $stmt = $emailRec->query($usuarioPass);
    if($stmt){
        $mail->send();
        $exito = "Revisa tu correo electronico $email para recuperar tu contraseña.";
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
                location.href = '../../views/recoveryPasswordView.php';
            } else {
                location.href = '../../views/recoveryPasswordView.php';
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
