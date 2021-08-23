
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
<!--<link rel="stylesheet" href="../assets/css/style.css">-->
<link rel="icon" type="image/x-icon" href="../assets/img/Logotipo.PNG" />
	<!-- Core theme CSS (includes Bootstrap)-->
<link href="../assets/css/style.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>| Registrar Asistencias</title>
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
              <center><a href="inicioRecepcionista.php">
                <img class="encabezado" width="300" height="70" src="../assets/img/logo.png">
            	</a>
			</center>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="inicioRecepcionista.php">Regresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
  <div class="container">

		<h1 style="font-size: 2.6em;
		font-weight: 1000;
		color: black; ">Registrar Asistencia</h1>
		</div>
  <div class="container">
			<form class="box" method="post" action="">
				<div class="form-group">
   					 <label for="exampleFormControlSelect1">Tipo de ususario</label>
   						 <select class="form-control" id="tipoUsuarioAsis" name="tipoUsuarioAsis" >
      						<option selected value="--Seleccione el tipo de ususario--" disabled>--Seleccione el tipo de ususario--</option>
      						<option>Instructor</option>
     						<option>Cliente</option>
   						 </select>
  					</div>
				<div class="form-group">
					<label for="TipoDoc" class="form-label">Tipo de documento: </label>
					 <select class="form-control" id="tipoUsuarioAsis" name="tipoUsuarioAsis" >
      						<option selected value="--Seleccione el tipo de documento--" disabled>--Seleccione el tipo de documento--</option>
      						<option>Cedula de ciudadania</option>
     						<option>Tarjeta de identidad</option>
     						<option>Cedula de extranjeria</option>
     						<option>Pasaporte</option>
   						 </select>
				</div>
					<div class="form-group">
					<label for="Num" class="form-label">Numero de documento: </label>
					<input required type="number" class="form-control" id="Num" name="Num"placeholder="Ingrese Numero De Identificación">
				</div>
					<div class="form-group">
					<label for="Num" class="form-label">Nombre: </label>
					<input required type="text" class="form-control" id="Nom" name="Nom"placeholder="Ingrese Nombre Completo">
				</div>
					<div class="form-group">
					<label for="Num" class="form-label">Apellido: </label>
					<input required type="text" class="form-control" id="Ape" name="Ape"placeholder="Ingrese Apellido Completo">
				</div>
					<div class="form-group">
					<label for="Num" class="form-label">Fecha y hora de ingreso: </label>
					<input required type="datetime-local" class="form-control" id="FechaN" name="FechaN"--Seleccione el tipo de documento-->
				</div>
				<br>
				<center><button type="submit" value="Enviar" name="btnf" class="btn btn-dark">Enviar</button></center>
				<br>
				<center><input type="botton" class="btn btn-dark" value="Regresar" name="boton1" onclick="location.href='inicioRecepcionista.php'"></center>
				<hr>
			</form>
		</div>
		<hr>
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