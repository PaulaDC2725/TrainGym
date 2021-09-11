<?php 
require_once('../assets/php/Modelo/class.conexion.php');
require_once('../assets/php/Modelo/class.consulta.Suscripcion.php');
$fcha = date("Y-m-d");


 $consultasS = new ConsultasSuscripcion();


 $numeroIdentificacion=null;
 $nombreCliente=null;

 if (isset($_GET['NumeroIdentificacion'])) {
   $id=$_GET['NumeroIdentificacion'];
 

   $filtro=$id;
   $select="";

   $filas = $consultasS-> cargarSuscripcionFiltroId($filtro);
   if (is_array($filas) || is_object($filas)){
	 
   foreach ($filas as $fila) {
	   $idSuscripcion=$fila['idSuscripcion'];
	 $nombreCliente=$fila['Nombre Completo'];
	 $fechaSuscripción=$fila['fechaSuscripcion'];
	 $metodología=$fila['nombreMetodologia'];
	 $valorSuscripcion=$fila['valorSuscripcion'];
   } 
   }
 }

?>
<!Doctype HTML>
<html lang="es-ES">
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
  <link rel="icon" type="image/x-icon" href="../assets/img/Logotipo.PNG" />
        <!-- Core theme CSS (includes Bootstrap)-->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../assets/css/styleLogin.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>| Realizarpagos</title>
</head>
<body>
    <!-- Responsive navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
		<div class="container">
			<center><a href="inicioRecepcionista.php">
				<img class="encabezado" width="300" height="70" src="../assets/img/logo1.png">
			</a>
		</center>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
				<li class="nav-item"><a class="nav-link" href="inicioCliente.php?NumeroIdentificacion=<?php echo $id?>">Regresar</a></li>
			</ul>
		</div>
	</div>
</nav>
   <!---->
   <br>
  <div class="container"> 
	<form method="post" action="../assets/php/Controlador/RegistroPago.php?NumeroIdentificacion=<?php echo $id?>&SuscripcionNumero=<?php echo $idSuscripcion ?>">
	<div id="registroPago">
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-5">											
					<center> <img src="../assets/img/LogoTipo.PNG" alt="Image" class="img-fluid"></center>
					</div>
					<div class="col-md-7 contents">
						<div class="row justify-content-center">
							<div class="col-md-12">
								<div class="mb-7">							
								<center>
								<h1 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
									Realice el pago <br><?php echo $nombreCliente?> 
								</h1>
									<h1 style="font-size: 20px">
									Metodología: <?php echo $metodología?>
									</h1>
								</center>
								</div>
							</div>
							<br>
						</div>
						<label for="date" class="form-label"></label>
						<div class="row justify-content-center">
							<div class="col-md-6 col-lg-6 col-sm-6">	
								<label for="date" class="form-label">Fecha de Suscripcion: </label>
								<div class="form-group first col-md-12">
									<input required type="date" class="form-control" id="FechaS" name="FechaS" value="<?php echo $fechaSuscripción?>" disabled>
									<input required type="date" class="form-control" id="FechaS" name="FechaS" value="<?php echo $fechaSuscripción?>" hidden>
								</div>
							</div>
							<div class="col-md-6 col-lg-6 col-sm-6">					
								<label for="date" class="form-label">Fecha de pago: </label>
								<div class="form-group first col-md-12">
									<input required type="date" class="form-control" id="FechaP" name="FechaP" value="<?php echo $fcha?>" disabled>
									<input required type="date" class="form-control" id="FechaP" name="FechaP" value="<?php echo $fcha?>" hidden>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-md-4 col-lg-4 col-sm-4">	
								<label for="Valor" class="form-label">Valor a pagar: </label>
								<div class="form-group first col-md-12">
									<div class="input-group mb-3">
										<span class="input-group-text">$</span>
										<select class="form-control" id="valorS" name="valorS" >
											<option selected value="<?php echo $valorSuscripcion?>" disabled><?php echo $valorSuscripcion?></option>
											<option selected value="<?php echo $valorSuscripcion?>" hidden><?php echo $valorSuscripcion?></option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-8 col-lg-8 col-sm-8">
									<label for="Num" class="form-label">Imagen: Comprobante de pago </label>
									<div class="form-group">							
										<input class="form-control" style="height: 100px;" required type="file" id="ImgPago" name="ImgPago"  multiple>													
									</div>
								</div>
							</div>	
							<div class="row justify-content-center">								
								<div class="col-md-12">	
									<label for="text" class="form-label">Descripción del pago: </label>
									<div class="form-group last mb-12">																				
										<textarea class="form-control" id="descPago" placeholder="*Realice una descripción del pago a realizar*" name="descPago" value="N/A" rows="5" ></textarea>
									</div>										
								</div>
								<center>
									<button type="submit" value="Realizar Pago" id="registrarPago" name="btnf" class="btn btn-block btn-warning" style="background-color: #FF9900">
										Realizar Pago
									</button>
								</center>
							</diV>									
						</div>
								
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
	</div>
</diV>
</div>
	  <!-- Footer-->
	  <footer class="py-5">
          <div class="container" ><p class="m-0 text-center text-white">Copyright &copy; TrainGym 2021</p></div>
        </footer> 
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
	<!-- <script src="../../js/Registros2.js"> -->
	</script>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
			crossorigin="anonymous">
	</script>
</html>
 