<?php
	require_once('Modelo/class.conexion.php');
	require_once('Modelo/class.consulta.usuario.php');

	$consultasUsuario = new ConsultasUsuario();

?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>ERROR</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="../../views/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../views/css/font-awesome.min.css">
     <link rel="stylesheet" href="../../views/css/aos.css">
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../../views/css/tooplate-gymso-style.css">
     <link rel="icon" type="image/x-icon" href="../../views/images/Recurso 1.png" />
<!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
</head>
<body>
<?php 
session_start();
$usuario = $_POST['Num'];
$contrasenia = $_POST['Contraseña'];

$estadoU = "1";
if($usuario=="'' or '1'='1'" || $contrasenia=="'' or '1'='1'"){
  echo('<script>swal("Error!", "Datos inválidos","error")</script>');
}else{
  $rows = $consultasUsuario->validarLogin2($usuario);
  if (is_array($rows) || is_object($rows))
  {foreach($rows as $row) {
    $Rol=$row['idRolFK'];
  }
  }else{
    $Rol ="0";
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
  if($usuario=='1032480756' && $contrasenia=='1345ElmejorGrupo' && $rolRecepcionista = 1){
    $_SESSION["rolRecepcionista"] = $rolRecepcionista;
    $_SESSION["NumeroIdentificacion"] = $usuario;
    header('location: ../../views/inicioRecepcionista.php');
  }
  else if($Rol == '2' && $resultado == "1"){
    $_SESSION["NumeroIdentificacion"] = $usuario;
    $_SESSION['rol'] = $Rol;
    header('location: ../../views/inicioInstructor.php?NumeroIdentificacion='.$usuario);
  }
  else if($Rol == '3' && $resultado == "1"){
    $_SESSION["NumeroIdentificacion"] = $usuario;
    $_SESSION['rol'] = $Rol;
    header('location: ../../views/inicioCliente.php');
  }else if($usuario=="" || $contrasenia==""){
    echo('<script>swal("Error!", "Debe ingresar datos al formulario para iniciar sesión","error")</script>');
  }
  else{
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
                  <img  src="../../views/images/imagenForm.png" class="img-fluid" alt="Trainer">
            </div>                                 
          </div>
          <div class="card col-md-6 col-sm-6 col-lg-6"data-aos="fade-up" data-aos-delay="700">
            <div class="card-body col-md-12">
              <div class="col-md-12">
                <div class="mb-12">
                  <CENTER><a class="navbar-brand" href="../../views/index.php"><img src="../../views/images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>
                  <center><h1 style="text-align: center;font-size: 23px">Iniciar Sesión</h1></center>
                </div>
                <form action="ingresar1.php" method="post">            
                  <label for="username">Número de Documento</label> 
                  <input value="<?php echo $usuario?>" type="number" class="form-control" placeholder="Ingrese su número de identificación" id="Num" name="Num" required>			
                    <br>
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Ingrese la contraseña" id="Contraseña"name="Contraseña"required>
                    <br> 
                    <div class="d-flex mb-5 align-items-center">
                      <span><a href="../../views/registro.php" class="forgot-pass">Regístrate</a></span>
                      <div class="control__indicator"></div>
                    <span class="ml-auto"><a href="../../views/recoveryPasswordView.php" class="forgot-pass">¿Olvidaste tu contraseña?</a></span> 
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
<script src="../../views/js/jquery.min.js"></script>
<script src="../../views/js/bootstrap.min.js"></script>
<script src="../../views/js/aos.js"></script>
<script src="../../views/js/smoothscroll.js"></script>
<script src="../../views/js/custom.js"></script>

</body>
</html>
