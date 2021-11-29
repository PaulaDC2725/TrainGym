<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="../../../css/flaticon.css" >
		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome-old/css/font-awesome.min.css" >
     <link rel="stylesheet" href="../../../views/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../../views/css/font-awesome.min.css">
     <link rel="stylesheet" href="../../../views/css/aos.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../../../views/css/tooplate-gymso-style.css">
     <link rel="icon" type="image/x-icon" href="../../../views/images/Recurso 1.png" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Activa tu cuenta</title>
</head>
  <body>
  <!-- Responsive navbar-->

<br> 
<div class="content justify-content-center">
    <div class="container">
    <br>
         <br><br>
         <br><br>
         <br>
      <div class="row">
        <div class="col-md-3">
         <br>
         <br>
        </div>
        <div class="card col-md-6 col-sm-6 col-lg-6"data-aos="fade-up" data-aos-delay="700">
            <div class="card-body col-md-12">
              <div class="col-md-12">
            <div class="col-md-12">
              <div class="mb-4">
              <CENTER><a class="navbar-brand" href=""><img src="../../../views/images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>
              <h3 style="font-family: masque;">Cambiar Contraseña</h3>
              </div>
              <form action="<?php $_PHP_SELF ?>" id="form" method="POST">
            
              <label for="password">Ingrese una Contraseña</label>
              <input required type="text" value="1" name="Estado" hidden>
              <div class="form-group last mb-4">
                <input min-width="10" max-width="18" type="password" class="form-control" placeholder="Ingrese la contraseña" id="contra1"name="Contraseña"required>
                <div id="error1"></div>
                <input type="hidden" id="validaClave1" value="">
              </div>
              <label for="password">Confirma la contraseña</label>
                    <div class="form-group last mb-4">
                      <input type="password" class="form-control" placeholder="Ingrese la contraseña" id="contra2"name="Contraseña"required>
                      <span id="error2"></span>
                      <input type="hidden" id="validaClave" value="">
                    </div>
                    <pre style="color: #ff9900; text-align:center;">*La contraseña debe contener mínimo 10 carácteres<br> máximo 18*</pre>
              <input type="button"  value="Recuperar" class="btn btn-block btn-warning" id="button_form" style="background-color: #FF9900; color: white;">

              
              
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
  
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../../views/js/jquery.min.js"></script>
<script src="../../../views/js/bootstrap.min.js"></script>
<script src="../../../views/js/aos.js"></script>
<script src="../../../views/js/smoothscroll.js"></script>
<script src="../../../views/js/custom.js"></script>
			  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
			  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="../../js/Recuperar.js">
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

$emailRec = mysqli_connect("localhost", "id17957462_elmejorgrupo", "A@TkHlYL@xe6#Q~r", "id17957462_traingym") or die($emailRec);


if(isset($_GET['doc']) && !empty($_GET['doc']) && isset($_POST['Contraseña']) && !empty($_POST['Contraseña'])&& isset($_POST['Estado'])&& !empty($_POST['Estado'])){
    $numDoc = mysqli_escape_string($emailRec, $_GET['doc']); 
    $password = mysqli_escape_string($emailRec, $_POST['Contraseña']); 
    $estado = mysqli_escape_string($emailRec, $_POST['Estado']);
    
    $activar = "UPDATE usuarios as u join instructores as i on i.idUsuarioFK=u.idUsuario SET u.passwordUsuario = '".$password."', u.estadoUsuario = '".$estado."', i.estadoInstructor='".$estado."' WHERE u.NumeroIdentificacion='".$numDoc."'";
    $stmt = $emailRec->query($activar);
    
        $mensajeExito = "Se ha activado su cuenta correctamente"; 
        echo "<script> window.addEventListener('load', init, false);
        function init () {
            Swal.fire({
                title: 'Registro exitoso!',
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