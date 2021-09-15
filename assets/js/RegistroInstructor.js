
    let btnForm1 = document.getElementById('boton');
    let btnForm2 = document.getElementById('registrar');
    btnForm2.style.display='none';
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
    // else if (contraseña.length < 10 ) {
    //   swal("ERROR!","La contraseña ingresada no es válida","error");
    // }
    else if(emailRegex.test(correo)==false){
      swal("Ups!","Correo invalido","warning");;
            if(emailRegex.test(correoCliente)==true){
                validarCorreo.innerHTML="Correo Valido";
            }
    }else{ 
      swal("Excelente!","Datos registrados correctamente","success");
      btnForm2.style.display = 'block';
      btnForm1.style.display= 'none';
      document.getElementById('formInst').submit();

    }
  }