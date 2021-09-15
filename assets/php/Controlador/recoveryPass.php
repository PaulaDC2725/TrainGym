<!doctype html>
<html lang="en">
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
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
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
	<title>Recuperar Contraseña</title>
</head>
  <body>
  <!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
              <a href="index.php">
                <img width="300" height="70" src="../../../assets/img/logo1.png">
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
<br> 
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
         <center> <img src="../../../assets/img/LogoTipo.PNG" alt="Image" class="img-fluid"></center>
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3 style="font-family: masque;">Recupera tu contraseña</h3>
              </div>
            <form action="<?php $_PHP_SELF ?>" method="POST">
            
            <label for="password">Contraseña</label>
              <div class="form-group last mb-4">
                <input type="password" class="form-control" placeholder="Ingrese la contraseña" id="Contraseña"name="Contraseña"required>
                
              </div>
			  <br>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
              </div>

              <input type="submit" onclick="validarForm()" value="INGRESAR" class="btn btn-block btn-warning" style="background-color: #FF9900">

              
              
            </form>
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
  
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
			  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="../assets/js/Ingresos.js">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
	crossorigin="anonymous"></script>
</html> 
<?php

$server = 'localhost';
$username = 'root'; 
$password = ''; 
$database = 'gimnasiobd'; 

$emailRec = mysqli_connect("localhost", "root", "", "gimnasiobd") or die($emailRec);


if(isset($_GET['doc']) && !empty($_GET['doc']) && isset($_POST['Contraseña']) && !empty($_POST['Contraseña'])){
    $numDoc = mysqli_escape_string($emailRec, $_GET['doc']); 
    $password = mysqli_escape_string($emailRec, $_POST['Contraseña']); 
    
    $recuperar = "UPDATE USUARIOS SET passwordUsuario = '".$password."' WHERE NumeroIdentificacion='".$numDoc."'";
    $stmt = $emailRec->query($recuperar);
    
        $mensajeExito = "Se ha modificacdo su cuenta correctamente"; 
        echo "<script> window.addEventListener('load', init, false);
        function init () {
            Swal.fire({
                title: 'Cambio exitoso!',
                text: '$mensajeExito',
                icon: 'success',
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
            if (willDelete) {
                location.href = 'http://localhost/trainGym/views/login.php';
            } else {
                location.href = 'http://localhost/trainGym/views/login.php';
            }
          });
        }
        
          </script>"; 

}
?>