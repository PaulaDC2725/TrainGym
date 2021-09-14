<?php 
  require_once('../assets/php/Modelo/class.conexion.php');
  require_once('../assets/php/Modelo/class.consulta.instructor.php');


  $consultas = new ConsultasInstructor();

 
  $numeroIdentificacion=null;
  $nombreInstructor=null;

  if (isset($_GET['NumeroIdentificacion'])) {
    $id=$_GET['NumeroIdentificacion'];
    $opcionEjer="";
    $opcionParte="";
    $opcion="";
    $filtro=$id;
    $select="";
    $Ejercicios= $consultas->ejercicios();
    if (is_array($Ejercicios) || is_object($Ejercicios)){
      foreach ($Ejercicios as $Ejercicio){   
        $idEjercicio=$Ejercicio['idEjercicio'];
          $nombreEjercicio=$Ejercicio['nombreEjercicio'];   
          $opcionEjer.='<option value="'.$Ejercicio['idEjercicio'].'">'.$Ejercicio['nombreEjercicio'].'</option>';                          
          
        }
      }
    $parteCuerpos =$consultas->parteCuerpo();
    if (is_array($parteCuerpos) || is_object($parteCuerpo)){
      foreach ($parteCuerpos as $parteCuerpo){   
        $idParte=$parteCuerpo['idParteDelCuerpo'];
          $nombreParte=$parteCuerpo['nombreParteCuerpo'];   
          $opcionParte.='<option value="'.$parteCuerpo['idParteDelCuerpo'].'">'.$parteCuerpo['nombreParteCuerpo'].'</option>';                          
          
        }
      }
    $metodologias = $consultas ->metodologias();
    if (is_array($metodologias) || is_object($metodologias)){
    foreach ($metodologias as $metodologia){      
        $opcion.='<option value="'.$metodologia['idMetodologia'].'">'.$metodologia['nombreMetodologia'].'</option>';                          
        $idMetodologia=$metodologia['idMetodologia'];
        $nombreMetodologia=$metodologia['nombreMetodologia'];
      }
    }
    $filas = $consultas->cargarInstructorFiltroId($filtro);
    if (is_array($filas) || is_object($filas)){
      
    foreach ($filas as $fila) {
      $numeroIdentificacion=$fila['NumeroIdentificacion'];    
      $nombreCliente=$fila['nombreInstructor'];
    } 
    }
  }
?>
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
	<title>| Registrar Series de Ejercicio</title>
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-Dark">
            <div class="container">
			<a href="inicioInstructor.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>">
                <img width="300" height="70" style="padding: 3px" src="../assets/img/logo.png">
			</a>		
            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="inicioInstructor.php?NumeroIdentificacion=<?php echo $numeroIdentificacion?>">Regresar </a></li>
                    </ul>
                </div>
            </div>
        </nav>
   <!---->
   <br>
   <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-0">       
        </div>
        <div class="card col-md-8">
          <div class="card-body col-md-12">  
           <div class="col-md-12">
              <div class="col-md-12">
                <div class="mb-7">
                  <h1 style="text-align: center;">
                    Registrar Series de Ejercicio 
                  </h1>
                </div>
                <br>
                <form action="../Assets/php/Controlador/registrarSeries.php?NumeroIdentificacion=<?php echo $numeroIdentificacion; ?>" method="post" id="formPaso1">
                      <div class="row">
                        <div class="col-md-6">												
                          <label for="TipoDoc" class="form-label">Tipo de Metodología: </label>
                          <div class="form-group first col-md-12">
                          <select class="form-control" id="tipoMetodologia" name="tipoMetodologia"required >
                                  <option selected value="" disabled>--Seleccione el tipo de Metodología--</option>
                                  <?php echo $opcion;?>
                            </select>			
                          </div>
                        </div>
                        <div class="col-md-6">												
                          <label for="TipoDoc" class="form-label">Parte del cuerpo: </label>
                          <div class="form-group first col-md-12">
                            <select class="form-control" id="ParteCuerpo" name="ParteCuerpo" required>
                                  <option selected value="" disabled>--Seleccione la parte del cuerpo--</option>
                                  <?php echo $opcionParte ?>
                            </select>			
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label for="Num" class="form-label">Ejercicio: </label>
                          <div class="form-group last mb-12">
                          <select class="form-control" id="NomEj" name="NomEJ"required >
                                  <option selected value="" disabled>--Seleccione el Ejercicio--</option>
                                  <?php echo $opcionEjer;?>
                            </select>	
                          </div>
                        </div>
                        <div class="col-md-6">												
                          <label for="Repeticion" class="form-label">Secuencia del Ejercicio:  </label>
                          <div class="form-group first col-md-12">
                            <select class="form-control" id="Sec" name="Sec"required >
                                  <option selected value="" disabled>--Seleccione las veces que se realizará el ejercicio--</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                                  <option value="16">16</option>
                                  <option value="17">17</option>
                                  <option value="18">18</option>
                                  <option value="19">19</option>
                                  <option value="20">20</option>
                            </select>			
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                        <label for="Repeticion" class="form-label">Repeticion del Ejercicio: </label>
                          <div class="form-group first col-md-12">
                            <select class="form-control" id="Rep" name="Rep"required >
                                  <option selected value="" disabled>--Seleccione la repetición del ejercicio--</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                                  <option value="16">16</option>
                                  <option value="17">17</option>
                                  <option value="18">18</option>
                                  <option value="19">19</option>
                                  <option value="20">20</option>
                            </select>			
                          </div>
                        </div>
                        <div class="col-md-6">												
                        <label for="Nom" class="form-label">Nombre de la serie: </label>
                      <div class="form-group last mb-12">					
                      <input required type="text" class="form-control" id="Nom" name="Nom"placeholder="Ingrese El Nombre Del Ejercicio">
                    </div>
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-md-6">	
                        <label for="Num" class="form-label">Fecha Inicio: </label>
                          <div class="form-group last mb-12">
                          <input required type="date" class="form-control" id="FechaI" name="FechaI">
                          </div>
                        </div>
                        <div class="col-md-6">
                        <label for="Num" class="form-label">Fecha Fin: </label>
                          <div class="form-group last mb-12">
                          <input required type="date" class="form-control" id="FechaF" name="FechaF">
                          </div>
                        </div>
                      </div>
                      <div class="row"> 
                      <div class="col-md-12">     
                      <label for="exampleFormControlTextarea1">Descripción de la Serie </label>
                            <div class="form-group last mb-12">                     
                              <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="5" placeholder="*Ingrese la descripción del ejercicio*"></textarea>
                            </div>
                      </div>
                    </div>	                
                    <br>
                    <div class="row">                  
                      <center>
                        <div class="col-md-5">	
                          <input type="submit"  value="Enviar"  id="enviar" name="enviar"class="btn btn-block btn-warning" style="background-color: #FF9900">
                        </div>
                      </center>
                    </div>
                  </div> 
                </form>
            </div>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
			crossorigin="anonymous">
	</script>
</html>
