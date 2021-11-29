<?php date_default_timezone_set('America/Bogota'); 
$fcha = date("Y-m-d");?>
<!Doctype HTML>
<html lang="es-ES">
<head>
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
     	<link rel="stylesheet" type="text/css" href="../../../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome-old/css/font-awesome.min.css" >
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../../../views/css/tooplate-gymso-style.css">
     <link rel="icon" type="image/x-icon" href="../../../views/images/Recurso 1.png" />
	<title>| Matricular cliente</title>
</head>
<body data-spy="scroll" data-target="#navbarNav" data-offset="50">
 <!-- CLASS -->
 <section class="class section" id="class">
 <div class="container"> 
		<form method="post" action="Registro2Cli.php">
			
				<div id="registroPaso2">
					<div class="container">
						<center>
						<CENTER><a class="navbar-brand" ><img data-aos="fade-up" data-aos-delay="200" src="../../../views/images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>
							<h1 data-aos="fade-up" data-aos-delay="200"margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
									Paso 2: Elegir Metodología
							</h1>
						</center>
						<br>
						<div class="row">
							<div class="col-sm-4">
								<div class="card"data-aos="fade-up" data-aos-delay="200" >
									<div class="card-body"  style="background-color: #FF9900;opacity: 0.8;">
										<center>
											<h5 class="card-title">
												Disminuir de peso
											</h5>
										</center>
									</div>
									<div class="card-body">
									<p class="card-text"style=" color: black">
										En esta metodología se le asignan series de ejercicios para obtener una disminución de peso óptima.
									</p>
									<center>
										<input type="radio" value="1" name="metodologia" id="metodologia1"  style="background-color: #FF9900; "> Seleccionar <br/>
										<!--<a class="btn btn-warning" id="selMet1" name="selMet1">Seleccionar</a>-->
									</center>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="card" data-aos="fade-up" data-aos-delay="200">
									<div class="card-body"  style="background-color: #FF9900;opacity: 0.8;">
										<center>
											<h5 class="card-title">
												Aumentar Masa Coporal
											</h5>
										</center>
									</div>
									<div class="card-body" >
									<p class="card-text"style=" color: black;opacity: 0.8;">
										En esta metodología se le asignan series de ejercicios para lograr aumentar tu masa corporal.
									</p>
									<center>
										<input type="radio" value="2" name="metodologia" id="metodologia2" > Seleccionar <br/>
										<!--<a class="btn btn-warning" id="selMet1" name="selMet1">Seleccionar</a>-->
									</center>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="card" data-aos="fade-up" data-aos-delay="200">
									<div class="card-body"  style="background-color: #FF9900;opacity: 0.8;">
										<center>
											<h5 class="card-title" >
												2 X 1
											</h5>
										</center>
									</div>
									<div class="card-body">
									<p class="card-text" style=" color: black">
										Esta metodología es la adecuada, si deseas bajar de peso y a la vez aumentar la masa corporal.
									</p>
									<center>
										<input type="radio" value="3" name="metodologia" id="metodologia3"  style="background-color: #FF9900; "> Seleccionar <br/>
										<!--<a class="btn btn-warning" id="selMet1" name="selMet1">Seleccionar</a>-->
									</center>
									</div>
								</div>
						</div>					
					</div>
					<br>
				</div>
			</div>
	</div>
	<div id="registroPaso3" data-aos="fade-up" data-aos-delay="200">
		<div class="content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-5">
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
					<img  src="../../../views/images/imagenForm.png" class="img-fluid" alt="Trainer">
					</div>
					<div class="card col-md-6 col-sm-6 col-lg-6">
                    	<div class="card-body col-md-12">
							<div class="col-md-12 contents">
								<div class="row justify-content-center">
										<div class="col-md-12">
											<div class="mb-12">
												<CENTER><a class="navbar-brand" href="../../../views/index.php"><img data-aos="fade-up" data-aos-delay="200" src="../../../views/images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>								
												<center>
													<h1 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
														Paso 3: Suscripción
													</h1>
												</center>
											</div>
										</div>
										<br>					
										<label for="date" class="form-label">Fecha de suscripción: </label>
										<div class="form-group first col-md-12">
											<input required type="date" class="form-control" id="FechaS" name="FechaS" value="<?php echo $fcha?>" disabled>
											<input required type="date" class="form-control" id="FechaS" name="FechaS" value="<?php echo $fcha?>" hidden>
										</div>
										<label for="Valor" class="form-label">Valor suscripcion: </label>
										<div class="form-group first col-md-12">
											<div class="input-group mb-3">
												<span class="input-group-text">$</span>
													<select class="form-control" id="valorS" name="valorS" >
														<option selected value="" disabled>--Seleccione el valor de la suscripción--</option>
														<option value="180000">180000</option>
														<option value="200000">200000</option>
														<option value="250000">250000</option>
													</select>
											</div>
										</div>
										<label for="date" class="form-label">Fecha Inicio Metodología: </label>
										<div class="form-group first col-md-12">
											<input required type="date" class="form-control" id="fechaMet" name="fechaMet" value="<?php echo $fcha?>" disabled>
											<input required type="date" class="form-control" id="fechaMet" name="fechaMet" value="<?php echo $fcha?>" hidden>
										</div>
										<label for="date" class="form-label">Fecha de fin Metodología: </label>
										<div class="form-group first col-md-12">
											<input required type="date" class="form-control" id="FechFinMet" name="FechFinMet" >
										</div>
										<br>
										<br>
										<div class="col-md-3"></div>
											<button type="button" value="Continuar" id="registrar3" name="btnf" class="btn btn-block btn-warning col-md-6" style="background-color: #FF9900; color: white;">
												Continuar
											</button>
										
										<hr>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="registroPaso4"data-aos="fade-up" data-aos-delay="200">
		<div class="content">
				<div class="container">
				<CENTER><a class="navbar-brand" href=""><img data-aos="fade-up" data-aos-delay="200" src="../../../views/images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>								
					<div class="row">
					<div class="card col-md-6 col-sm-6 col-lg-6">
                    		<div class="card-body col-md-12">	
						<div class="col-md-12 contents">
							<center>		
								
								<h1 style="font-size: 25px">
								Paso 4: <br>Ficha Antropométrica y Datos médicos
								</h1>
								</center>
							<div class="row">
								<div class="col-md-12">	
									<label for="Num" class="form-label">Fecha: </label>
									<div class="form-group last mb-12">
										<input required type="date" value="<?php echo $fcha?>" class="form-control" id="FechaFicha" name="FechaFicha" disabled>
										<input required type="date" value="<?php echo $fcha?>" class="form-control" id="FechaFicha" name="FechaFicha" hidden>
									</div>		
								</div>	
								<br>
								<div class="col-md-12">
									<label for="Num" class="form-label">Estatura </label>
									<div class="form-group last md-12">
										<div class="input-group mb-3">
											<input step="any" required type="number" class="form-control" id="Estatura" placeholder="Ingrese Su Estatura" name="Estatura">
											<strong><span class="input-group-text">Metros</span></strong>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="Num" class="form-label">Peso: </label>
									<div class="form-group last mb-12">										
										<div class="input-group mb-3">
											<input step="any" required type="number" class="form-control" placeholder="Ingrese Su Peso"id="Peso" name="Peso">
												<strong><span class="input-group-text">Kg</span></strong>
										</div>
									</div>
								</div>
								<div class="col-md-12">	
									<label for="text" class="form-label">Descripción Médica: </label>
									<div class="form-group last mb-12">																				
										<textarea class="form-control" id="descMedic" placeholder="*En caso de no tener alguna recomendación ingrese N/A*" name="descMedic" value="N/A" rows="12" >N/A</textarea>
									</div>										
								</div>
								<!-- <pre style="color: blue;font-size:18px"></pre> -->
							</div>							
						</div>
						</div>	
							
						</div>
						<br>
						<div class="card col-md-6 col-sm-6 col-lg-6">
                    	<div class="card-body col-md-12">
							<div class="col-md-12 contents">
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-5">								
										<center>
											<h3 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
												Medidas del cuerpo
											</h3>
										</center>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-6">											
											<label for="Num" class="form-label">Perimetro del cráneo: </label>
											<div class="form-group last mb-12">
												<div class="input-group mb-3">
													<input step="any" required type="number"  class="form-control" id="perCraneo"  name="perCraneo">
													<strong><span class="input-group-text">cm</span></strong>
												</div>		
											</div>	
										</div>
										<br>
										<div class="col-md-6">				
											<label for="text" class="form-label">Perimetro de cintura: </label>
												<div class="form-group last md-12">													
											<div class="input-group mb-3">
													<input step="any" required type="number"  class="form-control" id="perCint" name="perCint">
													<strong><span class="input-group-text">cm</span></strong>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
									<div class="col-md-6">
											<strong><label for="text" class="form-label">Perímetro de biceps: </label></strong><br>				
											<label for="text" class="form-label">Derecho: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="perBic1" name="perBic1">
														<strong><span class="input-group-text">cm</span></strong>
													</div>
												</div>
												<label for="text" class="form-label">Izquierdo: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="perBic2" name="perBic2">
														<strong><span class="input-group-text">cm</span></strong>
													</div>
												</div>
										</div>										
										<div class="col-md-6">
											<strong><label for="text" class="form-label">Longitud Brazos: </label></strong><br>											
											<label for="text" class="form-label">Derecho: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="longExsup1" name="longExsup1">
														<strong><span class="input-group-text">cm</span></strong>
													</div>
												</div>
												<label for="text" class="form-label">Izquierdo: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="longExsup2" name="longExsup2">
														<strong><span class="input-group-text">cm</span></strong>
													</div>
												</div>											
										</div>
										<div class="row">
										<div class="col-md-6">
											<strong><label for="tex" class="form-label">Perímetro Muslos: </label></strong><br>											
											<label for="text" class="form-label">Derecho: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="perMus1" name="perMus1">
														<strong><span class="input-group-text">cm</span></strong>
													</div>
												</div>
												<label for="text" class="form-label">Izquierdo: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="perMus2" name="perMus2">
														<strong><span class="input-group-text">cm</span></strong>
													</div>
												</div>		
										</div>
										<div class="col-md-6">
											<strong><label for="tex" class="form-label">Longitud Piernas: </label></strong>	<br>										
											<label for="text" class="form-label">Derecha: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="longExinf1" name="longExinf1">
														<strong><span class="input-group-text">cm</span></strong>
													</div>
												</div>
												<label for="text" class="form-label">Izquierda: </label>
												<div class="form-group last md-12">													
													<div class="input-group mb-3">
														<input step="any" required type="number"  class="form-control" id="longExinf2" name="longExinf2">
														<strong><span class="input-group-text">cm</span></strong>
													</div>
												</div>											
										</div>
									</div>
								</div>							
							</div>
						</div>
					</div>
				</div>
			</div>	
			
			<center>
				<br><br>
				<div class="col-md-5">
				<button type="submit" value="Terminar" id="registrarTotal" name="btnf" class="btn btn-block btn-warning" style="background-color: #FF9900">
					Terminar
				</button>
			</div>
			</center>
			</div>									
						</div>			
					</div>
					<br>
					<br> 
						
						<br>
						<hr>
						
				</div>
			</div>
		</form>
	</div>	
	<br>
	<br>
</diV>
</div>               
     </section>
     
  
	  <!-- Footer-->
	  <footer class="py-5">
          <div class="container" ><p class="m-0 text-center text-white">Copyright &copy; TrainGym 2021</p></div>
        </footer> 
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	<script src="../../js/Registros2.js">
	</script>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
			crossorigin="anonymous">
	</script>
	<script src="../../../views/js/jquery.min.js"></script>
     <script src="../../../views/js/bootstrap.min.js"></script>
     <script src="../../../views/js/aos.js"></script>
     <script src="../../../views/js/smoothscroll.js"></script>
     <script src="../../../views/js/custom.js"></script>
	 </body>
</html>
