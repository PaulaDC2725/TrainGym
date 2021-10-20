<!DOCTYPE html>
<html lang="en">
<head>

     <title>Registro</title>

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
<!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR --> 
<section class="about section" id="Login">
    <div class="content">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6 col-sm-6 col-lg-6 col-6" data-aos="fade-up" data-aos-delay="700">
                <div class="team-thumb">
                    <br>
                    <br>
                    <br>
                    <img  src="images/imagenForm.png" class="img-fluid" alt="Trainer">
                </div>
             </div>            
                <div class="card col-md-6 col-sm-6 col-lg-6"data-aos="fade-up" data-aos-delay="700">
                    <div class="card-body col-md-12">
                      <div class="col-md-12">
                        <div class="mb-12">
                            <CENTER><a class="navbar-brand" href="index.php"><img src="images/logoDiseño.png" class="card-img-top"width="100" height="100"/></a></CENTER>
                            <center><h1 style="text-align: center;font-size: 23px">Regístrate</h1> </center>   
                        </div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">												
                                    <label for="TipoDoc" class="form-label">Tipo de documento: </label>
                                    <select class="form-control" id="tipoDocumentoCli" name="tipoDocumentoCli" >
                                                        <option selected value="--Seleccione el tipo de documento--" disabled>--Seleccione el tipo de documento--</option>
                                                        <option value="1">Cédula de ciudadania</option>
                                                        <option value="2">Tarjeta de identidad</option>
                                                        <option value="3">Cédula de extranjeria</option>
                                                        <option value="4">Pasaporte</option>
                                        </select>
                                </div>	
                                <br>
                                <div class="col-md-6">
                                    <label for="Num" class="form-label">Número de documento: </label>
                                    <div class="form-group last mb-12">
                                        <input required type="number" class="form-control" id="Num" name="Num">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Num" class="form-label">Nombre: </label>
                                    <div class="form-group last mb-12">
                                        <input required type="text" class="form-control" id="Nom" name="Nom">
                                    </div>
                                </div>
                                <div class="col-md-6">	
                                    <label for="Num" class="form-label">Apellido: </label>
                                    <div class="form-group last mb-12">
                                        <input required type="text" class="form-control" id="Ape" name="Ape">
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
                                    <label for="Num" class="form-label">Teléfono: </label>
                                    <div class="form-group last mb-12">
                                        <input required type="number" class="form-control" id="Tel" name="Tel">
                                    </div>
                                </div>
                            </div>	
                            <div class="row">
                                <div class="col-md-6">   
                                    <label for="Num" class="form-label">Correo Electrónico: </label>
                                    <div class="form-group last mb-12">
                                        <input required type="email" class="form-control" id="corr" name="corr"placeholder="email@example.com">
                                    </div>                                 
                                </div> 
                                <div class="col-md-6"> 
                                    <label for="Num" class="form-label">Contraseña: </label>
                                    <div class="form-group last mb-12">
                                        <input required type="password" class="form-control" id="Contraseña" name="Contraseña"placeholder="Mínimo 10 carácteres">
                                    </div>                                                             
                                </div>                                
                                <div class="col-md-12">	
                                    <span><a href="Login.php">¿Ya tienes cuenta?  Inicia sesión</a></span>
                                  </div>                                 
                            </div>                           
                            <br>
                            <center>
                                <div class="col-md-12">	
                                    <input type="submit"  value="Registrar"  id="Registrar" name="Registrar"class="btn btn-block btn-warning" style="color: white;background-color: #FF9900">
                                </div>
                                
                                 
                            </center>
                                   
                                       
                            </form>
                    </div>
                </div>
              
            </div>
            
          </div>
        </div>
      </div>
      
</section>
     <!-- FOOTER -->
     <!-- SCRIPTS -->
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/aos.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>