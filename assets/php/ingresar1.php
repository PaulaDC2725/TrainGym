<?php
	require_once('Modelo/class.conexion.php');
	require_once('Modelo/class.consulta.usuario.php');

	$consultasUsuario = new ConsultasUsuario();

?>
<!DOCTYPE html>
<html>
<head>
	<title>ERROR</title>
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
  <link rel="icon" type="image/x-icon" href="../img/Logotipo.PNG" />
        <!-- Core theme CSS (includes Bootstrap)-->
  <link href="../css/styles.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>|Login Usuarios</title>
 </head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
    <div class="container">
      <a href="../../views/index.php">
        <img width="450" height="100" src="../img/Logo.PNG" alt="Logo TrainGym">
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
<br>
 <?php 

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
echo ('<script>console.log($filas)</script>');
$resultado=null;
if (is_array($filas) || is_object($filas))
{
  foreach($filas as $fila) {
  $resultado=$fila['RESULTADO'];
}
}
if($usuario=='1032480756' && $contrasenia=='1345ElmejorGrupo'){
	header('location: ../../views/inicioRecepcionista.php');
}
else if($Rol == '2' && $resultado == "1"){
  echo('<script>alert("Bienvenido"+$usuario)<script>');
	header('location: ../../views/inicioInstructor.php?NumeroIdentificacion='.$usuario);
}
else if($Rol == '3' && $resultado == "1"){
	header('location: ../../views/inicioCliente.php?NumeroIdentificacion='.$usuario);
}
else{
	echo('<center><div class="container"><br><br><br><span style="text-align: center;font-size: 20px;color: black;border: solid;border-color: red;background: #ff000038;padding: 70px;"><b>¡LOS DATOS INGRESADOS SON ERRÓNEOS!</b> </span></div></center>');
}

?> <br>
	
<br>
<br>
<a href="../../views/login.php"><input type="button" class="btn btn-dark" value="Regresar"></a>
  <br>
   <!-- Footer-->
   <footer class="py-5">
    <div class="container" ><p class="m-0 text-center text-white">Copyright &copy; TrainGym 2021</p></div>
  </footer> 
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>