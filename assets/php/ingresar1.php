<?php
	require_once('Modelo/class.conexion.php');
	require_once('Modelo/class.consulta.usuario.php');

	$consultasUsuario = new ConsultasUsuario();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Usuarios</title>
	<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
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
 </head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
    <div class="container">
      <a href="../../views/index.php">
        <img width="450" height="100" src="../img/Logo1.PNG" alt="Logo TrainGym">
    </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="../../views/COVID.php">COVID-19</a></li>
                <li class="nav-item"><a class="nav-link" href="../../views/Registro.php" >Registrate</a></li>
                <li class="nav-item"><a class="nav-link" href="../../views/loginAg.php">Programar</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="../../views/login.php">Ingresar</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php 
session_start();
$usuario = $_POST['Num'];
$contrasenia = $_POST['Contraseña'];
$estadoU = "1";
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
if($usuario=='1032480756' && $contrasenia=='1345ElmejorGrupo'){
  $_SESSION["NumeroIdentificacion"] = $usuario;
	header('location: ../../views/inicioRecepcionista.php');
}
else if($Rol == '2' && $resultado == "1"){
  echo('<script>alert("Bienvenido"+$usuario)<script>');
	header('location: ../../views/inicioInstructor.php?NumeroIdentificacion='.$usuario);
}
else if($Rol == '3' && $resultado == "1"){
	header('location: ../../views/inicioCliente.php?NumeroIdentificacion='.$usuario);
}else if($usuario=="" || $contrasenia==""){
  echo('<script>swal("Error!", "Debe ingresar datos al formulario para iniciar sesión","error")</script>');
}
else{
	echo('<script>swal("Error!", "Datos ingresados erroneos, intentelo nuevamente","error")</script>');
}
?>
<br>
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
         <center> <img src="../img/LogoTipo.PNG" alt="Image" class="img-fluid"></center>
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3 style="font-family: masque;">Inicia Sesión</h3>
              </div>
            <form action="ingresar1.php" method="post">
            
			<label for="username">Numero de Documento</label>  
			<div class="form-group first">
                <input value="<?php echo $usuario?>" type="number" class="form-control" placeholder="Ingrese su número de identificación" id="Num" name="Num" required>			
              </div>
			  <br>
                <label for="password">Contraseña</label>
              <div class="form-group last mb-4">
                <input type="password" class="form-control" placeholder="Ingrese la contraseña" id="Contraseña"name="Contraseña"required>
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="../../views/recoveryPasswordView.php" class="forgot-pass">¿Olvidaste tu contraseña?</a></span> 
              </div>

              <input type="submit" value="INGRESAR" class="btn btn-block btn-warning" style="background-color: #FF9900">

              
              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
 
   <!-- Footer-->
   <footer class="py-5">
    <div class="container" ><p class="m-0 text-center text-white">Copyright &copy; TrainGym 2021</p></div>
  </footer> 
    <!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>
			
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="../js/Ingresos.js">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
	crossorigin="anonymous"></script>
</html>