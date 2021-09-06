
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
	<link rel="icon" type="image/x-icon" href="../ASSETS/img/Logotipo.PNG" />
        <!-- Core theme CSS (includes Bootstrap)-->
		<meta charset="utf-8">
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
	<title>| Matricular cliente</title>
</head>
<body>
    <!-- Responsive navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
              <a href="index.php">
                <img width="300" height="70" src="../assets/img/logo1.png">
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
							<h1 style="text-align: center;">
								Paso 1: 
								Datos Personales 
							</h1>
					</div>
					<br>
					<form action="../assets/php/Controlador/Registro1.php" method="post">
						<div class="row">
							<div class="col-md-6">												
								<label for="TipoDoc" class="form-label">Tipo de documento: </label>
								<div class="form-group first col-md-12">
									<select class="form-control" id="tipoDocumentoCli" name="tipoDocumentoCli" >
													<option selected value="--Seleccione el tipo de documento--" disabled>--Seleccione el tipo de documento--</option>
													<option value="1">Cedula de ciudadania</option>
													<option value="2">Tarjeta de identidad</option>
													<option value="3">Cedula de extranjeria</option>
													<option value="4">Pasaporte</option>
									</select>			
								</div>
							</div>	
							<br>
							<div class="col-md-6">
								<label for="Num" class="form-label">Numero de documento: </label>
								<div class="form-group last mb-12">
									<input required type="number" class="form-control" id="Num" name="Num"placeholder="Ingrese Numero De Identificación">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="Num" class="form-label">Nombre: </label>
								<div class="form-group last mb-12">
									<input required type="text" class="form-control" id="Nom" name="Nom"placeholder="Ingrese Nombre Completo">
								</div>
							</div>
							<div class="col-md-6">	
								<label for="Num" class="form-label">Apellido: </label>
								<div class="form-group last mb-12">
									<input required type="text" class="form-control" id="Ape" name="Ape"placeholder="Ingrese Apellido Completo">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">	
								<label for="Num" class="form-label">Fecha de nacimiento: </label>
								<div class="form-group last mb-12">
									<input required type="date" class="form-control" id="FechaN" name="FechaN">
								</div>
							</div>
							<div class="col-md-6">    
								<label for="Num" class="form-label">Telefono: </label>
								<div class="form-group last mb-12">
									<input required type="number" class="form-control" id="Tel" name="Tel"placeholder="Ingrese Numero De Telefono">
								</div>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-6">   
								<label for="Num" class="form-label">Correo Electrónico: </label>
								<div class="form-group last mb-12">
									<input required type="email" class="form-control" id="corr" name="corr"placeholder="Ingrese Correo electronico(email@example.com)">
								</div>
							</div> 
							<div class="col-md-6"> 
								<label for="Num" class="form-label">Contraseña: </label>
								<div class="form-group last mb-12">
									<input required type="password" class="form-control" id="Contraseña" name="Contraseña"placeholder="Ingrese contraseña (MINIMO 10 CARACTERES)">
								</div>
							</div> 
						</div>
						<br>
						<div class="row">
							<center>
								<div class="col-md-5"> 						
									<button type="button" value="Enviar"  id="registrar1" name="registrar1" class="btn btn-block btn-warning" style="background-color: #FF9900">
													Continuar
									</button>
								</div>								
							</center>	
							<center>
								<div class="col-md-5">	
									<input type="submit"  value="Enviar"  id="enviar" name="enviar"class="btn btn-block btn-warning" style="background-color: #FF9900">
								</div>
							</center>
						</div>
						</form>
				</div>
			</div>
          
        </div>
        
      </div>
    </div>
  </div>
  <!-- <div class="container"> 
	<form method="post" action="../assets/php/Controlador/Registro1.php">
			<div id="registroPaso1">
				<center>
					<h1 margin: 0,padding: 0 0 20px, text-align: center, font-size: 22px>
						Paso 1: Datos Personales 
					</h1>
				</center>
				<div class="container">
					<div class="form-group">
						<label for="TipoDoc" class="form-label">Tipo de documento: </label>
						<select class="form-control" id="tipoDocumentoCli" name="tipoDocumentoCli" >
							<option selected value="--Seleccione el tipo de documento--" disabled>--Seleccione el tipo de documento--</option>
							<option value="1">Cedula de ciudadania</option>
							<option value="2">Tarjeta de identidad</option>
							<option value="3">Cedula de extranjeria</option>
							<option value="4">Pasaporte</option>
						</select>
					</div>
				
				
					<div class="form-group">
						<label for="Num" class="form-label">Numero de documento: </label>
						<input required type="number" class="form-control" id="Num" name="Num"placeholder="Ingrese Numero De Identificación">
					</div>
					<div class="form-group">
						<label for="text" class="form-label">Nombre: </label>
						<input required type="text" class="form-control" id="Nom" name="Nom"placeholder="Ingrese Nombre Completo">
					</div>
					<div class="form-group">
						<label for="text" class="form-label">Apellido: </label>
						<input required type="text" class="form-control" id="Ape" name="Ape"placeholder="Ingrese Apellido Completo">
					</div>
					<div class="form-group">
						<label for="date" class="form-label">Fecha de nacimiento: </label>
						<input required type="date" class="form-control" id="FechaN" name="FechaN">
					</div>
					<div class="form-group">
						<label for="Num" class="form-label">Telefono </label>
						<input required type="number" class="form-control" id="Tel" name="Tel"placeholder="Ingrese Numero De Telefono">
					</div>
					<div class="form-group">
						<label for="email" class="form-label">Correo Electrónico </label>
						<input required type="email" class="form-control" id="corr" name="corr"placeholder="Ingrese Correo electronico(email@example.com)">			
						<strong>
								
					<span id="emailValid" style="color: red;"></span>
						</strong>		
					</div>
					<div class="form-group">
						<label for="Contraseña" class="form-label">Contraseña: </label>
						<input required type="password" class="form-control" id="Contraseña" name="Contraseña"placeholder="Ingrese contraseña (MINIMO 10 CARACTERES)">
					</div>
					<br>
					<center>
						<button type="button" value="Enviar"  id="registrar1" name="registrar1" class="btn btn-dark">
							Continuar
						</button>
					</center>
					<center>
						<button type="submit" value="Enviar"  id="enviar" name="registrar1" class="btn btn-dark">
						 Enviar
						</button>
					</center>
					<br>
					<center>
						<input type="botton" class="btn btn-dark" id="regresar1" value="Regresar" name="regresar1" onclick="location.href='Registro.php'">
					</center>
					<hr>
				</div>
			</div>
</div>
<br> -->
	  <!-- Footer-->
	  <footer class="py-5">
          <div class="container" ><p class="m-0 text-center text-white">Copyright &copy; TrainGym 2021</p></div>
        </footer> 
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
	<script src="../assets/js/Registros.js">
	</script>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
			crossorigin="anonymous">
	</script>
</html>