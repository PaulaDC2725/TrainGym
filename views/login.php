<?php
session_start();
	require_once('../assets/php/modelo/class.conexion.php');
	require_once('../assets/php/modelo/class.consulta.usuario.php');

	$consultasUsuario = new ConsultasUsuario();

?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Ingresa</title>

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

</head>
<body>
<section class="about section" id="Login">
  <div class="content">
    <div class="container">
      <div class="row justify-content-center"> 
          <div class="col-md-6 col-sm-6 col-lg-6 col-6" data-aos="fade-up" data-aos-delay="700">
            <div class="team-thumb">
              <br>
              <br>
              <br>
                  <img  src="images/imagenForm.png" class="img-fluid" id="fotoForm" alt="Trainer">
            </div>                                 
          </div>
          <div class="card col-md-6 col-sm-6 col-lg-6"data-aos="fade-up" data-aos-delay="700">
            <div class="card-body col-md-12">
              <div class="col-md-12">
                <div class="mb-12">
                  <CENTER><a class="navbar-brand" href="index.php"><img src="images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>
                  <center><h1 style="text-align: center;font-size: 23px">Iniciar Sesión</h1></center>
                </div>
                
<?php 
if(isset($_POST['Num']) && isset($_POST['Contraseña'])){
  

$usuario = $_POST['Num'];
$contrasenia = $_POST['Contraseña'];
if($usuario=="'' or '1'='1'" || $contrasenia=="'' or '1'='1'"){
  echo('<script>swal("Error!", "Datos inválidos","error")</script>');
}else{
  $correcciones = $consultasUsuario->validarDatosCorrectos($usuario,$contrasenia);
  if (is_array($correcciones) || is_object($correcciones))
  {foreach($correcciones as $correccion) {
    $datosErroneos=$correccion['Correcto'];
  }
  }else{
    $datosErroneos =="0";
  }
  $existencias = $consultasUsuario->validarExistencia($usuario);
  if (is_array($existencias) || is_object($existencias))
  {foreach($existencias as $existencia) {
    $existenciaU=$existencia['Cantidad'];
  }
  }else{
    $existenciaU ="0";
  }
  $rows = $consultasUsuario->validarLogin2($usuario);
  if (is_array($rows) || is_object($rows))
  {foreach($rows as $row) {
    $Rol=$row['idRolFK'];
  }
  }else{
    $Rol ="0";
  }
  $estado=$consultasUsuario->validarLogin3($usuario);
  if (is_array($estado) || is_object($estado))
  {foreach($estado as $state) {
    $estadoU=$state['estadoUsuario'];
  }
  }else{
    $estadoU ="0";
  }
  $filas = $consultasUsuario->validarLoginUsuario($usuario,$contrasenia,$Rol,$estadoU);
  $resultado=null;
  if (is_array($filas) || is_object($filas))
  {
    foreach($filas as $fila) {
    $resultado=$fila['RESULTADO'];
  }
  }
  $rolRecepcionista = 1;
  if($Rol == '1' && $resultado == "1" ){
    $_SESSION["rolRecepcionista"] = $rolRecepcionista;
    $_SESSION["NumeroIdentificacion"] = $usuario;
    echo "<script>location.href=' inicioRecepcionista.php';</script>";
die();
    //header('location: inicioRecepcionista.php');
  }
  else if($Rol == '2' && $resultado == "1"){
    $_SESSION["NumeroIdentificacion"] = $usuario;
    $_SESSION['rol'] = $Rol;
    echo "<script>location.href=' inicioInstructor.php';</script>";
    die();
    //header('location: inicioInstructor.php');
  }
  else if($Rol == '3' && $resultado == "1"){
    $_SESSION["NumeroIdentificacion"] = $usuario;
    $_SESSION['rol'] = $Rol;
    echo "<script>location.href=' inicioCliente.php';</script>";
    die();
   // header('location: inicioCliente.php');
  }else if($usuario=="" || $contrasenia==""){
    echo('<script>swal("Error!", "Debe ingresar datos al formulario para iniciar sesión","error")</script>');
  }else if($existenciaU=='0'){
    echo('<script>swal("Error!", "Usuario no registrado en el sistema","error")</script>');
  }else if($resultado!= '1' && $datosErroneos=="0"){
    echo('<script>swal("Error!", "Datos ingresados erroneos, intentelo nuevamente","error")</script>');
  }else if($estadoU=='0' && $datosErroneos=="1"){
    echo '<div class="alert alert-warning"><strong>Usuario Inhabilitado!</strong> Si cree que se trata de un error, por favor comuníquese con Recepción.</div>';
  }
}
}



?>
                <form action="login.php" method="post">            
                  <label for="username">Número de Documento</label> 
                    <input type="number" class="form-control" value="<?php echo $usuario?>"placeholder="Ingrese el número de documento" id="Num" name="Num" required>
                    <br>
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Ingrese la contraseña" id="Contraseña"name="Contraseña"required>
                    <br> 
                    <div class="d-flex mb-5 align-items-center">
                      <span><a href="Registro.php" class="forgot-pass">Regístrate</a></span>
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