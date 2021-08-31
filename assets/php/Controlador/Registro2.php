<?php $fcha = date("Y-m-d");?>
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
  <!--<link rel="stylesheet" href="../assets/css/style.css">-->
  <link rel="icon" type="image/x-icon" href="../../../assets/img/Logotipo.PNG" />
        <!-- Core theme CSS (includes Bootstrap)-->
  <link href="../../../assets/css/styles.css" rel="stylesheet" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>| Matricular cliente</title>
</head>
<body>
    <!-- Responsive navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
              <a href="index.php">
                <img width="300" height="70" src="../../../assets/img/logo.png">
            	</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="COVID.php">COVID-19</a></li>
                        <li class="nav-item"><a class="nav-link" href="Registro.php" >Registrate</a></li>
                        <li class="nav-item"><a class="nav-link" href="loginAg.php">Programar</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Ingresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
   <!---->
   <br>
  <div class="container"> 
	<form method="post" action="Registro2Cli.php">
			<!--<form class="box" method="post" action="../assets/php/Controlador/Registro1.php">-->
			<div id="registroPaso2">
				<div class="container">
					<center>
						<h1 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
								Paso 2: Elegir metodología
						</h1>
					</center>
					<div class="row">
						<div class="col-sm-4">
							<div class="card" style="width: 18rem;">
								<div class="card-body"  style="background-color: white;">
									<center>
										<h5 class="card-title">
											Disminuir de peso
										</h5>
									</center>
								</div>
								<p class="card-text">
									En esta metodología se le asignan series de ejercicios para obtener una disminución de peso óptima.
								</p>
								<center>
									<input type="radio" value="1" name="metodologia" id="metodologia1"  style="background-color: #FF9900; "> Seleccionar <br/>
									<!--<a class="btn btn-warning" id="selMet1" name="selMet1">Seleccionar</a>-->
								</center>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card" style="width: 18rem;">
								<div class="card-body"  style="background-color: white;">
									<center>
										<h5 class="card-title">
											Aumentar Masa Coporal
										</h5>
									</center>
								</div>
								<p class="card-text">
									En esta metodología se le asignan series de ejercicios para lograr aumentar tu masa corporal.
								</p>
								<center>
									<input type="radio" value="2" name="metodologia" id="metodologia2"  style="background-color: #FF9900; "> Seleccionar <br/>
									<!--<a class="btn btn-warning" id="selMet1" name="selMet1">Seleccionar</a>-->
								</center>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card" style="width: 18rem;">
								<div class="card-body"  style="background-color: white;">
									<center>
										<h5 class="card-title">
											2 X 1
										</h5>
									</center>
								</div>
								<p class="card-text">
									Esta metodología es la adecuada, si deseas bajar de peso y a la vez aumentar la masa corporal.
								</p>
								<center>
									<input type="radio" value="3" name="metodologia" id="metodologia3"  style="background-color: #FF9900; "> Seleccionar <br/>
									<!--<a class="btn btn-warning" id="selMet1" name="selMet1">Seleccionar</a>-->
								</center>
							</div>
						</div>					
					</div>
					<br>
				</div>
			</div>
			<div id="registroPaso3">
				<div class="container">
					<div class="form-group">
						<center>
							<h1 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
								Paso 3: Suscripción
							</h1>
						</center>
						<label for="TipoDoc" class="form-label">Metodo de pago: </label>
							<select class="form-control" id="MetPago" name="MetPago" >
								<option selected value="--Seleccione el tipo de documento--" disabled>--Seleccione el método de pago--</option>
								<option>Efectivo</option>
								<option>Cheque</option>
								<option>Tarjeta de crédito</option>
								<option>transferencia electrónica</option>
								<option>PSE o Pago en linea</option>
							</select>
					</div>
					<div class="form-group">
						<label for="date" class="form-label">Fecha de suscripciónn: </label>
						<input required type="date" class="form-control" id="FechaS" name="FechaS" value="<?php echo $fcha?>" disabled>
                        <input required type="date" class="form-control" id="FechaS" name="FechaS" value="<?php echo $fcha?>" hidden>
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text">$</span>
						<select class="form-control" id="valorS" name="valorS" >
							<option selected value="--Seleccione el tipo de documento--" disabled>--Seleccione el valor de la suscripción--</option>
							<option value="180000">180000</option>
							<option value="200000">200000</option>
							<option value="250000">250000</option>
						</select>
					</div>
					<br>
					<br>
					<center>
						<button type="button" value="Continuar" id="registrar3" name="btnf" class="btn btn-dark">
							Continuar
						</button>
					</center>
					<br>
					<!--<center>
						<input type="botton" class="btn btn-dark" id="Regresar2" value="Regresar" name="boton1" onclick="location.href='registroPaso3.php'">
					</center>-->
					<hr>
				</div>
			</div>
			<div id="registroPaso4">
				<div class="container">
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
								<!--<label class="form-check-label" for="flexCheckChecked" >-->
									<strong style=" margin: 0;padding: 0 0 20px; text-align: center; font-size: 22px">
										Perímetro del cráneo:
									</strong>	
								<!--</label>-->
								<!--<h5 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
									Perímetro del cráneo: 
								</h5>-->
								<input step="any" required type="number"  class="form-control" id="perCraneo" name="perCraneo">
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
							<br>
						</div>			
					</div>
					<br>
					<br>
						<center>
							<button type="submit" value="Enviar" id="registrarTotal" name="btnf" class="btn btn-dark">
								Terminar
							</button>
						</center>
						<br>
						<center>
							<input type="botton" class="btn btn-dark" value="Regresar" name="boton1" onclick="location.href='registroPaso1.php'">
						</center>
						<hr>
						
				</div>
			</div>
		</form>
	</div>	
	<br>
	<br>
	  <!-- Footer-->
	  <footer class="py-5">
          <div class="container" ><p class="m-0 text-center text-white">Copyright &copy; TrainGym 2021</p></div>
        </footer> 
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
	<script src="../../js/Registros2.js">
	</script>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
			crossorigin="anonymous">
	</script>
</html>
 