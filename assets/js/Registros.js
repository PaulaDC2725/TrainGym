function validarForm1() {
  let tipoDocumento = document.getElementById('tipoDocumentoCli').value;
    let numeroIdentificacion = document.getElementById('Num').value;
    let nombreCliente = document.getElementById('Nom').value;
    let apellidoCliente = document.getElementById('Ape').value;
    let fechaNacimiento = document.getElementById('FechaN').value;
    let telefonoCliente = document.getElementById('Tel').value;
    let correoCliente = document.getElementById('corr').value;
    let Confcorreo = document.getElementById('corr2').value;
    let contraseñaCliente = document.getElementById('Contraseña').value;
    let Confcontra = document.getElementById('Contraseña2').value;
    let privacidad = document.getElementById('privacidad').value;
    let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if ((tipoDocumento=="")||(numeroIdentificacion == "") || (correoCliente == "") || (Confcontra == "") ||(nombreCliente == "") || (apellidoCliente == "") || (fechaNacimiento == "") || (telefonoCliente == "") || (contraseñaCliente == "") || (Confcorreo == "") )
    {
      swal("Ups!","Debe completar todos los campos","warning");
    }else if (privacidad=="") {
      swal("ERROR!","Debe aceptar las politicas de privacidad","error");
    }else if (contraseñaCliente.length < 10 ) {
      swal("ERROR!","La contraseña ingresada no es válida","error");
    }else if (telefonoCliente.length != 10 ) {
      swal("ERROR!","La longitud del teléfono no es válida","error");
    }else if (Confcontra.length < 10 ) {
      swal("ERROR!","La confirmación de contraseña no es válida","error");
    }else if (Confcontra != contraseñaCliente) {
      swal("ERROR!","Las contraseñas no coinciden","error");
    }else if(emailRegex.test(correoCliente)==false){
      swal("Ups!","Correo invalido","warning");
            
    }else if(emailRegex.test(Confcorreo)==false){
      swal("Ups!","La confirmación de correo no es válida","warning");
            
    } 
    else{
     
      document.getElementById('formPaso1').submit();  
  }
}


