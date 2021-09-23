<?php $fcha = date("Y-m-d");?>
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
			<!--<form class="box" method="post" action="../assets/php/Controlador/Registro1.php">-->
				<div id="registroPaso2">
					<div class="container">
						<center>
						<CENTER><a class="navbar-brand" href="../../../views/index.php"><img data-aos="fade-up" data-aos-delay="200" src="../../../views/images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>
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
										<label for="Metodo" class="form-label">Metodo de pago: </label>
										<div class="form-group first col-md-12">
											<select class="form-control" id="MetPago" name="MetPago" >
												<option selected value="" disabled>--Seleccione el método de pago--</option>
												<option>Efectivo</option>
												<option>Cheque</option>
												<option>Tarjeta de crédito</option>
												<option>transferencia electrónica</option>
												<option>PSE o Pago en linea</option>
											</select>
										</div>					
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
										<br>
										<br>
										<div class="col-md-3"></div>
											<button type="button" value="Continuar" id="registrar3" name="btnf" class="btn btn-block btn-warning col-md-6" style="background-color: #FF9900; color: white;">
												Continuar
											</button>
										<!--<center>
											<input type="botton" class="btn btn-dark" id="Regresar2" value="Regresar" name="boton1" onclick="location.href='registroPaso3.php'">
										</center>-->
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
				<CENTER><a class="navbar-brand" href="../../../views/index.php"><img data-aos="fade-up" data-aos-delay="200" src="../../../views/images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>								
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
										<textarea class="form-control" id="descMedic" placeholder="*En caso de no tener alguna recomendación ingrese N/A*" name="descMedic" value="N/A" rows="12" ></textarea>
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
									<!--<center>
										<input type="botton" class="btn btn-dark" id="Regresar2" value="Regresar" name="boton1" onclick="location.href='registroPaso3.php'">
									</center>-->
			
									
				<!-- <div class="container">
					<div class="form-group">
						<center>
							<h1 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
							Paso 4: Ficha Antropométrica y Datos médicos
							</h1>
						</center>
						<br>
						<label for="Num" class="form-label">
							Fecha:
						</label>
						<input required type="date" value="<?php echo $fcha?>" class="form-control" id="FechaFicha" name="FechaFicha" disabled>
                        <input required type="date" value="<?php echo $fcha?>" class="form-control" id="FechaFicha" name="FechaFicha" hidden>
                    </div>
					<div class="form-group">
						<label for="Num" class="form-label">Estatura: </label>
						<input step="any" required type="number" class="form-control" id="Estatura" name="Estatura">
					</div>
					<div class="form-group">
						<label for="Num" class="form-label">Peso: </label>
						<input step="any" required type="number" class="form-control" id="Peso" name="Peso">
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Descripción medica </label>
                        <pre style="color: blue;">*En caso de que no tener alguna recomendación ingrese N/A *</pre>
						<textarea class="form-control" id="descMedic" name="descMedic" value="N/A" rows="5" ></textarea>
					</div>
					<br>
					<center>
						<h3 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
							Medidas del cuerpo
						</h3>
					</center>
					<div class="row">
						<div class="col-sm-6" style="border: #D16810 2px solid;">				
						<br>				
						<br>				
							<div class="form-group">
								<input class="form-check-input" type="checkbox" value="Craneo" id="Craneoshow" name="Craneoshow" checked disabled>
								<input class="form-check-input" type="hidden" value="Craneo" id="Craneo" name="Craneo" checked>
								<label class="form-check-label" for="flexCheckChecked" > -->
									<!-- <strong style=" margin: 0;padding: 0 0 20px; text-align: center; font-size: 22px">
										Perímetro del cráneo:
									</strong>	 -->
								<!--</label>-->
								<!--<h5 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
									Perímetro del cráneo: 
								</h5>-->
								<!-- <input step="any" required type="number"  class="form-control" id="perCraneo" name="perCraneo">
							</div>
							<div class="form-group">
								
								<h5 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
									Perímetro de biceps:
								</h5>
								<input class="form-check-input" type="checkbox" value="Bicep Derecho" id="BicDerShow" name="BicDerShow" checked disabled>
								<input class="form-check-input" type="hidden" value="Bicep Derecho" id="BicDer" name="BicDer" checked>
								<label for="Num" class="form-label">
									Derecho: 
								</label>
								<input required type="number" class="form-control" id="perBic1" name="perBic1" >
								<input class="form-check-input" type="checkbox" value="Bicep Izquierdo" id="BicIzqShow" name="BicIzqShow" checked disabled>
								<input class="form-check-input" type="hidden" value="Bicep Izquierdo" id="BicIzq" name="BicIzq" checked>
								<label for="Num" class="form-label">
									Izquierdo: 
								</label>
								<input required type="number" class="form-control" id="perBic2" name="perBic2" >
							</div>
							<div class="form-group">
								<h5 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
									Perímetro muslos:
								</h5>
								<input class="form-check-input" type="checkbox" value="Muslo derecho" id="musDerShow" name="musDerShow" checked disabled>
								<input class="form-check-input" type="hidden" value="Muslo derecho" id="musDer" name="musDer" checked>
									<label for="Num" class="form-label">
										Derecho: 
									</label>
									<input required type="number" class="form-control" id="perMus1" name="perMus1" >
									<input class="form-check-input" type="checkbox" value="Muslo Izquiero" id="musIzqShow" name="musIzqShow" checked disabled>
									<input class="form-check-input" type="hidden" value="Muslo Izquiero" id="musIzq" name="musIzq"  checked>
									<label for="Num" class="form-label">
										Izquierdo: 
									</label>
									<input required type="number" class="form-control" id="perMus2" name="perMus2" >		
							</div>
						</div>		
						<br>
						<br>	
						<div class="col-sm-6" style="border: #D16810 2px solid;">
							<div class="form-group">
								<br>
								<br>
								<input class="form-check-input" type="checkbox" value="Cintura" id="CinturaShow" name="CinturaShow" checked disabled>
								<input class="form-check-input" type="hidden"  value="Cintura" id="Cintura" name="Cintura" checked>
								<strong style=" margin: 0;padding: 0 0 20px; text-align: center; font-size: 22px">
									Perímetro de cintura:
								</strong>
								<input step="any" required type="number" class="form-control" id="perCint" name="perCint">
							</div>
							<div class="form-group">
								<h5 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
									Longitud extremidades superiores:
								</h5>
								<input class="form-check-input" type="checkbox" value="Brazo Derecho" id="brazDShow" name="brazDShow" checked disabled>
								<input class="form-check-input" type="hidden" value="Brazo Derecho" id="brazD" name="brazD" checked>
								<label for="Num" class="form-label">
									Derecho: 
								</label>
								<input required type="number" class="form-control" id="longExsup1" name="longExsup1">
								<input class="form-check-input" type="checkbox" value="Brazo Izquierdo" id="brazIShow" name="brazIShow" checked disabled>
								<input class="form-check-input" type="hidden" value="Brazo Izquierdo" id="brazI" name="brazI" checked>
								<label for="Num" class="form-label">
									Izquierdo: 
								</label>
								<input required type="number" class="form-control" id="longExsup2" name="longExsup2">
							</div>
							<div class="form-group">
								<h5 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>Longitud extremidades inferiores:</h5>
									<input class="form-check-input" type="checkbox" value="Pierna Derecha" id="pierDShow" name="pierDShow" checked disabled>
									<input class="form-check-input" type="hidden" value="Pierna Derecha" id="pierD" name="pierD"  checked>	
									<label for="Num" class="form-label">Derecho: </label>
									<input required type="number" class="form-control" id="longExinf1" name="longExinf1">
									<input class="form-check-input" type="checkbox" value="Pierna Izquierda" id="pierIShow" name="pierIShow" checked disabled>
									<input class="form-check-input" type="hidden" value="Pierna Izquierda" id="perI" name="perI" checked>
									<label for="Num" class="form-label">Izquierdo: </label>
									<input required type="number" class="form-control" id="longExinf2" name="longExinf2">
							</div>
							<br>
							<br>-->
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
