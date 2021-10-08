
    let btnForm2 = document.getElementById('registrar');
function validarForm1() {
    let tipoDocumento = document.getElementById('tipoDocInst').value;
    let numeroIdentificacion = document.getElementById('Num').value;
    let nombre = document.getElementById('Nom').value;
    let apellido = document.getElementById('Ape').value;
    let telefono = document.getElementById('phone').value;
    let correo = document.getElementById('email').value;
    // let contraseña = document.getElementById('Contraseña').value;
    let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    let validarCorreo = document.getElementById('emailValid');
    if ((tipoDocumento == "")||(numeroIdentificacion == "") || (nombre == "") || (apellido == "") || (telefono == "") || (correo == "") /*|| (contraseña == "")*/)
    {
          swal("Ups!","Debe completar todos los campos","warning");
    }
    
    else if(emailRegex.test(correo)==false){
      swal("Ups!","Correo invalido","warning");
            
    }else{ 
      document.getElementById('formInst').submit();

    }
  }