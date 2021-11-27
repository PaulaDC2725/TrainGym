<!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/aos.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-gymso-style.css">
     <link rel="icon" type="image/x-icon" href="images/Recurso 1.png" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Recuperar Contraseña</title>
  </head>
  <body>
  <!-- Responsive navbar-->
<br> 
<br> 
<br> 
<br> 
<br> 
<br> 

  <div class="content justify-content-center">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
         
        </div>
        <div class="card col-md-6 col-sm-6 col-lg-6"data-aos="fade-up" data-aos-delay="700">
            <div class="card-body col-md-12">
              <div class="col-md-12">
            <div class="col-md-12">
              <div class="mb-4">
              <CENTER><a class="navbar-brand" href="index.php"><img src="images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>
              <h3 style="font-family: masque;">Recuperar Contraseña</h3>
              </div>
            <form action="../assets/php/mailRecoveryPassword.php" id="form" method="POST">
            
			<label for="username">Numero de Documento</label>  
			<div class="form-group first">
                <input type="text" class="form-control" placeholder="Ingrese su número de identificación" id="Num" name="Num" required>
              </div>
              <label for="username">Correo</label>  
              <div class="form-group first">
                <input type="email" class="form-control" placeholder="Ingrese su correo" id="email" name="email" required>			
                <div id="error1"></div>
                <input type="hidden" id="validaCorreo1" value="">
              </div> <a href="login.php" class="forgot-pass">Regresar</a></span>
			  <br>
        <br>
              <input id="recuperar" type="button" onclick="validarForm1()" value="SIGUIENTE" class="btn btn-block btn-warning" style="background-color: #FF9900">

              
              
            </form>
            </div>
          </div>
          
        </div>
      </div>  
      </div>
      </div>
    </div>
  </div>
  <footer class="py-5">
          <div class="container" ><p class="m-0 text-center text-white">Copyright &copy; TrainGym 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  
         <script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>
<script src="../assets/js/Recuperar1.js"></script>	  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="../assets/js/validarDatos.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
	crossorigin="anonymous"></script>
</html> 