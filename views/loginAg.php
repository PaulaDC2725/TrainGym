
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Style -->
    <link rel="stylesheet" href="../assets/css/styleLogin.css">
<title>|Login Cliente</title>
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
 </div>
 <!---->
 <br>
    </div>  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
         <center> <img src="../assets/img/LogoTipo.PNG" alt="Image" class="img-fluid"></center>
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4" style="text-align: center;">
              <h3 style="font-family: masque;">Agenda tu programación</h3>
              <h3 style="font-family: inherit; font-size: 13px; color: #FF9900;">*Recuerda iniciar sesion previamente*</h3>
              </div>
            <form action="../assets/php/AgendaIngreso.php" method="post">
            
			<label for="username">Numero de Documento</label>  
			<div class="form-group first">
                <input type="number" class="form-control" placeholder="Ingrese su número de identificación" id="Num" name="Num" required>			
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
                <span class="ml-auto"><a href="./recoveryPasswordView.php" class="forgot-pass">¿Olvidaste tu contraseña?</a></span> 
              </div>

              <input type="submit" value="INGRESAR" class="btn btn-block btn-warning" onclick="validarForm()" style="background-color: #FF9900">

              
              
            </form>
            </div>
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
</body>
<script src="../assets/js/Ingresos.js">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
	crossorigin="anonymous"></script>
</html>