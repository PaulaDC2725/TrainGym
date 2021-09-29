<?php
	require_once('../assets/php/Modelo/class.conexion.php');
	require_once('../assets/php/Modelo/class.consulta.usuario.php');

	$consultasUsuario = new ConsultasUsuario();

?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Agendar</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/aos.css">
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-gymso-style.css">
     <link rel="icon" type="image/x-icon" href="images/Recurso 1.png" />
<!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
</head>
<body>
<?php 
if(isset($_POST['Num'])&&isset($_POST['Contraseña'])){
  session_start();
$usuario = $_POST['Num'];
$contrasenia = $_POST['Contraseña'];
$estadoU = "1";
$Rol = "3";
$filas = $consultasUsuario->validarLoginUsuario($usuario,$contrasenia,$Rol,$estadoU);
echo ('<script>console.log($filas)</script>');
$resultado=null;
if (is_array($filas) || is_object($filas))
{
  foreach($filas as $fila) {
  $resultado=$fila['RESULTADO'];
  /*$estado = $fila['estadoUsuario'];*/
}
}
if($resultado=='1'){
  $_SESSION["NumeroIdentificacion"] = $usuario;
  $_SESSION['rol'] = $Rol;
	header('location: AgendarCli.php');
}else if($usuario=="" || $contrasenia==""){
  echo('<script>swal("Error!", "Debe ingresar datos al formulario para iniciar sesión","error")</script>');
}
/*else if($resultado == '0' && $estado="0"){
	echo('<center><div class="container"><br><br><br><span style="text-align: center;font-size: 20px;color: black;border: solid;border-color: red;background: #ff000038;padding: 70px;"><b>¡Usuario inhabilitado, por favor comuniqusese con la recepcionista para habilitarse nuevamente!</b> </span></div></center>');
}*/else{
  echo('<script>swal("Error!", "Datos ingresados erroneos, intentelo nuevamente","error")</script>');
}

}

?>
<section class="about section" id="Login">
  <div class="content">
    <div class="container">
      <div class="row justify-content-center"> 
          <div class="col-md-6 col-sm-6 col-lg-6 col-6" data-aos="fade-up" data-aos-delay="700">
            <div class="team-thumb">
              <br>
              <br>
              <br>
                  <img  src="images/imagenForm.png"  id="fotoForm"class="img-fluid" alt="Trainer">
            </div>                                 
          </div>
          <div class="card col-md-6 col-sm-6 col-lg-6"data-aos="fade-up" data-aos-delay="700">
            <div class="card-body col-md-12">
              <div class="col-md-12">
                <div class="mb-12">
                  <CENTER><a class="navbar-brand" href="index.php"><img src="images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>
                  <br>
                  <h3 style="font-family: masque">Agenda tu programación</h3>
              <h3 style="font-family: inherit; font-size: 15px; color: #FF9900;; text-align:center;">*Recuerda iniciar sesion previamente*</h3>
                </div>
                <br>
                <form action="loginAg.php" method="post">            
                  <label for="username">Número de Documento</label> 
                    <input type="number" value="<?php echo $usuario?>" class="form-control" placeholder="Ingrese el número de documento" id="Num" name="Num" required>
                    <br>
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Ingrese la contraseña" id="Contraseña"name="Contraseña"required>
                    <br> 
                    <div class="d-flex mb-5 align-items-center">
                      <span><a href="registro.php" class="forgot-pass">Regístrate</a></span>
                      <div class="control__indicator"></div>
                    <span class="ml-auto"><a href="./recoveryPasswordView.php" class="forgot-pass">¿Olvidaste tu contraseña?</a></span> 
                    </div>
                    <input type="submit" value="INGRESAR" class="btn btn-block btn-warning" style="color: white;background-color: #FF9900">
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>
</html>