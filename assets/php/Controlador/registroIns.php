<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.instructor.php');
require_once('../Modelo/class.consulta.usuario.php');
$consultasInstructor = new ConsultasInstructor();
$consultasUsuario = new ConsultasUsuario();
$telefonoInstructor = $_POST['phone'];
$numeroIdentificacion = $_POST['Num'];
$correoInstructor = $_POST['email'];
$nombreDocumento = '';
$tipoDocumento=$_POST['tipoDocInst'];
if($tipoDocumento =="1"){
    $nombreDocumento="Cedula de ciudadania";
}else if($tipoDocumento =="3"){
    $nombreDocumento="Cedula de extranjeria";
}else if($tipoDocumento =="4"){
    $nombreDocumento="Pasaporte";
}
$contra1="";
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
for($i=0;$i<14;$i++){
	$contra1 .= substr($str,rand(0,62),1);
}
$estadoInstructor ="1";
$idRolFK = "2";
$nombreRol = "Instructor";
$nombreInstructor=$_POST['Nom'];
$apellidoInstructor = $_POST['Ape'];
 ?>
 <!DOCTYPE html>
<html>
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
  <link rel="icon" type="image/x-icon" href="../../../assets/img/Logotipo.PNG" />
        <!-- Core theme CSS (includes Bootstrap)-->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../../assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../../assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../../../assets/css/styleLogin.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>| Registrar instructor</title>
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
              <center><a href="../../../views/inicioRecepcionista.php">
                <img class="encabezado" width="300" height="70" src="../../../assets/img/logo1.png">
            	</a>
			</center>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../../../views/inicioRecepcionista.php">Regresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
  <!-- <div class="container">

<h1 class="tittle_form" style="font-size: 2.6em;
font-weight: 1000;
color: black; text-align: center;">Registrar instructor</h1>
</div>
<div class="container">
	<form class="box" method="post" action="registroins.php">
		
		<center>
			<h1 class="headerForm">
				Formulario de registro
			</h1>
		</center>
		<div class="form-group">
			<label for="TipoDoc" class="form-label">Tipo de documento: </label>
			 <select class="form-control" id="tipoDocInst" name="tipoDocInst" >
					  <option selected value="<?php echo $tipoDocumento?>" disabled><?php echo $nombreDocumento?></option>
                      <option selected value="<?php echo $tipoDocumento?>" hidden><?php echo $nombreDocumento?></option>
                      <option value='1'>Cedula de ciudadania</option>
					 <option value='3'>Cedula de extranjeria</option>
					 <option value='4'>Pasaporte</option>
					</select>
		</div>
			<div class="form-group">
			<label for="Num" class="form-label">Numero de documento: </label>
			<input required type="number" class="form-control" id="Num" name="Num"placeholder="Ingrese  Su Numero  De Identificación" value="<?php echo $numeroIdentificacion?>">
        </div>
			<div class="form-group">
			<label for="Num" class="form-label">Nombre: </label>
			<input required type="text" class="form-control" id="Nom" name="Nom"placeholder="Ingrese Su Nombre Completo"value="<?php echo $nombreInstructor?>">
		</div>
			<div class="form-group">
			<label for="Num" class="form-label">Apellido: </label>
			<input required type="text" class="form-control" id="Ape" name="Ape"placeholder="Ingrese  Su Apellido Completo"value="<?php echo $apellidoInstructor?>">
			</div>
			<div class="form-group">
			<label for="Num" class="form-label">Correo electrónico: </label>
			<input required type="email" class="form-control" id="email" name="email"placeholder="Ingrese  su Correo electronico corectamente(email@example.com)"value="<?php echo $correoInstructor?>">
		</div>
			<div class="form-group">
			<label for="Num" class="form-label">Telefono: </label>
			<input required type="number" class="form-control" id="phone" name="phone"placeholder="Ingrese Su Numero De Telefono" value="<?php echo $telefonoInstructor?>">
		</div>
		<div class="form-group">
			<label for="Contraseña" class="form-label">Contraseña: </label>
			<input required type="password" class="form-control" id="Contraseña" name="Contraseña"placeholder="Ingrese Su Contraseña(MINIMO 10 CARACTERES)"value="<?php echo $contra1?>">
		</div>
		<br>
		<center><button type="submit" value="Enviar" name="btnf" class="btn btn-dark">Enviar</button></center>
		<br>
		
		<hr>
	</form>
</div>
<hr> 
-->
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
         <center> <img src="../../../assets/img/LogoTipo.PNG" alt="Image" class="img-fluid"></center>
        </div>
			<div class="col-md-7 contents">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="mb-7">
							<h1 style="text-align: center;">
								 Registro Instructor
							</h1>
					</div>
					<br>
					<form action="registroins.php" method="post">
						<div class="row">
							<div class="col-md-6">												
								<label for="TipoDoc" class="form-label">Tipo de documento: </label>
								<div class="form-group first col-md-12">
								<select class="form-control" id="tipoDocInst" name="tipoDocInst" >
					           <option selected value="<?php echo $tipoDocumento?>" disabled><?php echo $nombreDocumento?></option>
                               <option selected value="<?php echo $tipoDocumento?>" hidden><?php echo $nombreDocumento?></option>
                               <option value='1'>Cedula de ciudadania</option>
					           <option value='3'>Cedula de extranjeria</option>
					           <option value='4'>Pasaporte</option>
					       </select>			
								</div>
							</div>	
							<br>
							<div class="col-md-6">
								<label for="Num" class="form-label">Numero de documento: </label>
								<div class="form-group last mb-12">
								<input required type="number" class="form-control" id="Num" name="Num"placeholder="Ingrese  Su Numero  De Identificación" value="<?php echo $numeroIdentificacion?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="Num" class="form-label">Nombre: </label>
								<div class="form-group last mb-12">
								<input required type="text" class="form-control" id="Nom" name="Nom"placeholder="Ingrese Su Nombre Completo"value="<?php echo $nombreInstructor?>">
								</div>
							</div>
							<div class="col-md-6">	
								<label for="Num" class="form-label">Apellido: </label>
								<div class="form-group last mb-12">
								<input required type="text" class="form-control" id="Ape" name="Ape"placeholder="Ingrese  Su Apellido Completo"value="<?php echo $apellidoInstructor?>">
								</div>
							</div>
						</div>
						<div class="row">
							
							<div class="col-md-6">    
								<label for="Num" class="form-label">Telefono: </label>
								<div class="form-group last mb-12">
								<input required type="number" class="form-control" id="phone" name="phone"placeholder="Ingrese Su Numero De Telefono" value="<?php echo $telefonoInstructor?>">
								</div>
							</div>
							<div class="col-md-6">   
								<label for="Num" class="form-label">Correo Electrónico: </label>
								<div class="form-group last mb-12">
								<input required type="email" class="form-control" id="email" name="email"placeholder="Ingrese  su Correo electronico corectamente(email@example.com)"value="<?php echo $correoInstructor?>">
								</div>
							</div> 
						</div>	
						<!-- <div class="row">
							
							<div class="col-md-12"> 
								<label for="Num" class="form-label">Contraseña: </label>
								<div class="form-group last mb-12">
								<input required type="password" class="form-control" id="Contraseña" name="Contraseña"placeholder="Ingrese Su Contraseña(MINIMO 10 CARACTERES)"value="<?php echo $contra1?>">
								</div>
							</div> 
						</div> -->
						<br>
						<center><button type="submit" value="Enviar" name="btnf" class="btn btn-block btn-warning" style="background-color: #FF9900">Enviar</button></center>
                      </div>
                    </div>

						<?php
        $mensajes1=$consultasInstructor->DuplicidadCorr($correoInstructor);
        foreach ($mensajes1 as $mensaje1) {
            $correo=$mensaje1['correo'];    
        } 
        $mensajes2=$consultasInstructor->DuplicidadTel($telefonoInstructor);
        foreach ($mensajes2 as $mensaje2) {
            $telefono=$mensaje2['Telefono'];    
        }
        $mensajes3=$consultasUsuario->DuplicidadDoc($numeroIdentificacion);
        foreach ($mensajes3 as $mensaje3) {
            $doc=$mensaje3['Doc'];    
        }
        if($telefono == 0 && $correo == 0 && $doc == 0){
          $mensaje4 = $consultasUsuario->registrarUsuario($numeroIdentificacion, $contra1, $estadoInstructor,$idRolFK,$tipoDocumento);
          $mensaje5= $consultasInstructor-> registrarInstructor($nombreInstructor, $apellidoInstructor, $correoInstructor,$telefonoInstructor,$estadoInstructor);
          echo "<script>location.href=' ../../../views/mostrarInstructores.php';</script>";
            die();
      }else if($telefono == 1 && $correo == 1 && $doc == 1){
       echo ('<script>swal("ERROR!","Datos registrados anteriormente", "error")</script>');
      }else if($telefono == 1){
		echo ('<script>swal("ERROR!","Telefono registrado anteriormente", "error")</script>');
	   }else if($correo == 1){
		echo ('<script>swal("ERROR!","Correo registrado anteriormente", "error")</script>');
	   }else if($doc == 1){
		echo ('<script>swal("ERROR!","Numero de documento registrado anteriormente", "error")</script>');
	   }
        ?>
		<br>
						</form>
	                </div>
	          </div>
	    </div>
		
<footer class="py-5">
          <div class="container" ><p class="m-0 text-center text-white">Copyright &copy; Recepcionista TrainGym 2021</p></div>
        </footer> 
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
crossorigin="anonymous"></script>
</html>
