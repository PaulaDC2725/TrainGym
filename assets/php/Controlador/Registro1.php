<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.consulta.cliente.php');
require_once('../modelo/class.consulta.usuario.php');
require_once('../modelo/class.consulta.suscripcion.php');
require_once('../modelo/class.consulta.fichaAntro.php');
$consultasCliente = new ConsultasClientes();
$consultasUsuario = new ConsultasUsuario();
$consultasSuscripcion = new ConsultasSuscripcion();
$consultasFicha = new consultasFicha();

$nombreCliente=$_POST['Nom'];
$apellidoCliente = $_POST['Ape'];
$telefonoCliente = $_POST['Tel'];
$fechaNacimiento = $_POST['FechaN'];
$NumeroIdentificacion = $_POST['Num'];
$correoCliente = $_POST['corr'];
$contra1 = $_POST['Contraseña'];
$nombreDocumento = '';
$tipoDocumento=$_POST['tipoDocumentoCli'];
if($tipoDocumento =="1"){
    $nombreDocumento="Cedula de ciudadania";
}else if($tipoDocumento =="2"){
    $nombreDocumento="Tarjeta de identidad";
}else if($tipoDocumento =="3"){
    $nombreDocumento="Cedula de extranjeria";
}else if($tipoDocumento =="4"){
    $nombreDocumento="Pasaporte";
}
						


 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>

     <title>Matricular Cliente</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <link rel="stylesheet" href="../../../views/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../../views/css/font-awesome.min.css">
     <link rel="stylesheet" href="../../../views/css/aos.css">
     <!-- MAIN CSS -->
     	<link rel="stylesheet" type="text/css" href="../../../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome-old/css/font-awesome.min.css" >
     <link rel="stylesheet" href="../../../views/css/tooplate-gymso-style.css">
     <link rel="icon" type="image/x-icon" href="../../../views/images/Recurso 1.png" />
<!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">


  
<section class="about section" id="Login">
    <div class="content">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6 col-sm-6 col-lg-6 col-6" data-aos="fade-up" data-aos-delay="700">
                <div class="team-thumb">
                    <br>
                    <br>
                    <br>
                    <img  src="../../../views/images/imagenForm.png" class="img-fluid" alt="Trainer">
                </div>
             </div>            
                <div class="card col-md-6 col-sm-6 col-lg-6"data-aos="fade-up" data-aos-delay="700">
                    <div class="card-body col-md-12">
                      <div class="col-md-12">
                        <div class="mb-12">
                            <CENTER><a class="navbar-brand" href="../../../views/index.php"><img src="../../../views/images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>
                            <center><h1 style="text-align: center;font-size: 23px">Paso 1: Datos Personales</h1> </center>   
                        </div>
                        <form action="Registro1.php" method="post" id="formPaso1">
                        <?php  
							$mensajes1=$consultasCliente->DuplicidadCorr($correoCliente);
							foreach ($mensajes1 as $mensaje1) {
								$correo=$mensaje1['correo'];    
							} 
							$mensajes2=$consultasCliente->DuplicidadTel($telefonoCliente);
							foreach ($mensajes2 as $mensaje2) {
								$telefono=$mensaje2['Telefono'];    
							}
							$mensajes3=$consultasUsuario->DuplicidadDoc($NumeroIdentificacion);
							foreach ($mensajes3 as $mensaje3) {
								$doc=$mensaje3['Doc'];    
							}
							if($telefono == 1){                        
								echo '<div class="alert alert-warning"><strong>Ups, Lo sentimos!</strong> Telefono registrado previamente en el sistema, revisalo e intentalo nuevamente.</div>';
							
							}else if($correo == 1 ){
								echo '<div class="alert alert-warning"><strong>Ups, Lo sentimos!</strong> Correo registrado previamente en el sistema, revisalo e intentalo nuevamente.</div>';
							}else if($doc == 1){
								echo '<div class="alert alert-warning"><strong>Ups, Lo sentimos!</strong> Numero de documento registrado previamente en el sistema, revisalo e intentalo nuevamente.</div>';
							}else if($telefono == 1 && $correo == 1 && $doc == 1 ){
								echo '<div class="alert alert-warning"><strong>Ups, Lo sentimos!</strong> Datos registrados previamente en el sistema, revisalos e intentalo nuevamente.</div>';
							}else if($telefono == 0 || $correo == 0 ||$doc == 0){
								$estadoUsuario="1";
								$idRolFK="3";
								$mensaje4 = $consultasUsuario->registrarUsuario($NumeroIdentificacion,$contra1, $estadoUsuario,$idRolFK,$tipoDocumento);
								$mensaje5 = $consultasCliente->registrarCliente($nombreCliente, $apellidoCliente,$fechaNacimiento,$correoCliente,$telefonoCliente,$estadoUsuario);							
								echo "<script>location.href=' Registro2.php';</script>";
								die();
							}
					?>    
						<div class="row">
                                <div class="col-md-6">												
                                    <label for="TipoDoc" class="form-label">Tipo de documento: </label>
                                    <select class="form-control" id="tipoDocumentoCli" name="tipoDocumentoCli" >
											<option selected value="" disabled><?php echo $nombreDocumento?></option>
											<option selected value="<?php echo $tipoDocumento?>" hidden><?php echo $nombreDocumento?></option>
											<option value="1">Cédula de ciudadania</option>
											<option value="2">Tarjeta de identidad</option>
											<option value="3">Cédula de extranjeria</option>
											<option value="4">Pasaporte</option>
                                        </select>
                                </div>	
                                <br>
                                <div class="col-md-6">
                                    <label for="Num" class="form-label">Número de documento: </label>
                                    <div class="form-group last mb-12">
									<input required type="number" class="form-control" id="Num" name="Num"placeholder="Ingrese Numero De Identificación" value="<?php echo $NumeroIdentificacion?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Num" class="form-label">Nombre: </label>
                                    <div class="form-group last mb-12">
									<input required type="text" class="form-control" id="Nom" name="Nom"placeholder="Ingrese Nombre Completo"value="<?php echo $nombreCliente?>">
                                    </div>
                                </div>
                                <div class="col-md-6">	
                                    <label for="Num" class="form-label">Apellido: </label>
                                    <div class="form-group last mb-12">
									<input required type="text" class="form-control" id="Ape" name="Ape"placeholder="Ingrese Apellido Completo"value="<?php echo $apellidoCliente?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">	
                                    <label for="Num" class="form-label">Fecha de nacimiento: </label>
                                    <div class="form-group last mb-12">
									<input required type="date" class="form-control" id="FechaN" name="FechaN" value="<?php echo $fechaNacimiento?>">
                                    </div>
                                </div>
                                <div class="col-md-6">    
                                    <label for="Num" class="form-label">Teléfono: </label>
                                    <div class="form-group last mb-12">
									<input required type="number" class="form-control" id="Tel" name="Tel"placeholder="Ingrese Numero De Telefono"value="<?php echo $telefonoCliente?>">
                                    </div>
                                </div>
                            </div>	
                            <div class="row">
                                <div class="col-md-6">   
                                    <label for="Num" class="form-label">Correo Electrónico: </label>
                                    <div class="form-group last mb-12">
									<input required type="email" class="form-control" id="corr" name="corr"placeholder="(email@example.com)"value="<?php echo $correoCliente?>">			
                                    </div>                                 
                                </div> 
                                <div class="col-md-6"> 
                                    <label for="Num" class="form-label">Contraseña: </label>
                                    <div class="form-group last mb-12">
									<input required type="password" class="form-control" id="Contraseña" name="Contraseña"placeholder="Ingrese contraseña (MINIMO 10 CARACTERES)"value="<?php echo $contra1?>">
                                    </div>                                                             
                                </div>                                
                                <div class="col-md-12">	
                                    <span><a href="login.php">¿Ya tienes cuenta?  Inicia sesión</a></span>
                                  </div>                                 
                            </div>                           
                            <br>
                            <center>
                                <div class="col-md-12">	
                                    <input type="button"  value="Registrar"  id="Registrar" name="Registrar"class="btn btn-block btn-warning" onclick="validarForm1()" style="color: white;background-color: #FF9900">
                                </div>
                                
                                 
                            </center>
                                   
                                       
                            </form>
                    </div>
                </div>
              
            </div>
            
          </div>
        </div>
      </div>
      
</section>
     <!-- FOOTER -->
    
                   


    <!-- Modal -->
    <!-- <div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

        <div class="modal-content">
          <div class="modal-header">

            <h2 class="modal-title" id="membershipFormLabel">Membership Form</h2>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form class="membership-form webform" role="form">
                <input type="text" class="form-control" name="cf-name" placeholder="John Doe">

                <input type="email" class="form-control" name="cf-email" placeholder="Johndoe@gmail.com">

                <input type="tel" class="form-control" name="cf-phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>

                <textarea class="form-control" rows="3" name="cf-message" placeholder="Additional Message"></textarea>

                <button type="submit" class="form-control" id="submit-button" name="submit">Submit Button</button>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="signup-agree">
                    <label class="custom-control-label text-small text-muted" for="signup-agree">I agree to the <a href="#">Terms &amp;Conditions</a>
                    </label>
                </div>
            </form>
          </div>

          <div class="modal-footer"></div>

        </div>
      </div>
    </div> -->

     <!-- SCRIPTS -->
     <script src="../../../views/js/jquery.min.js"></script>
     <script src="../../../views/js/bootstrap.min.js"></script>
     <script src="../../../views/js/aos.js"></script>
     <script src="../../../views/js/smoothscroll.js"></script>
     <script src="../../../views/js/custom.js"></script>
     <script src="../../js/Registros1.js"></script>

</body>
</html>