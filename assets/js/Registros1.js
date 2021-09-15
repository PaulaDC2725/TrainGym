let registrar1_btn = document.getElementById('registrar1');
let btnForm2 = document.getElementById('enviar');
/*registrar1_btn.addEventListener('click', sigForm);*/
registrar1_btn.addEventListener('click', validarForm1);
// let registrar2a_btn = document.getElementById('metodologia1');
// registrar2a_btn.addEventListener('click', sigFormA);
// let registrar2b_btn = document.getElementById('metodologia2');
// registrar2b_btn.addEventListener('click', sigFormAA);
// let registrar2c_btn = document.getElementById('metodologia3');
// registrar2c_btn.addEventListener('click', sigFormAB);
// let registrar3_btn = document.getElementById('registrar3');
// /*registrar3_btn.addEventListener('click', sigFormB);*/ 
// // registrar3_btn.addEventListener('click', validarForm3);        
// let formulario2 = document.getElementById('registroPaso2');
// let formulario1 = document.getElementById('registroPaso1');
// let formulario3 = document.getElementById('registroPaso3');
// let formulario4 = document.getElementById('registroPaso4');


// formulario2.style.display='none';
// formulario3.style.display='none';
// formulario4.style.display='none';
btnForm2.style.display='none';
function validarForm1() {
  let tipoDocumento = document.getElementById('tipoDocumentoCli').value;
    let numeroIdentificacion = document.getElementById('Num').value;
    let nombreCliente = document.getElementById('Nom').value;
    let apellidoCliente = document.getElementById('Ape').value;
    let fechaNacimiento = document.getElementById('FechaN').value;
    let telefonoCliente = document.getElementById('Tel').value;
    let correoCliente = document.getElementById('corr').value;
    let contraseñaCliente = document.getElementById('Contraseña').value;
    let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    let validarCorreo = document.getElementById('emailValid');
    if ((tipoDocumento=="")||(numeroIdentificacion == "") || (nombreCliente == "") || (apellidoCliente == "") || (fechaNacimiento == "") || (telefonoCliente == "") || (contraseñaCliente == "") || (correoCliente == ""))
    {
      swal("Ups!","Debe completar todos los campos","warning");
    }else if (contraseñaCliente.length < 10 ) {
      swal("ERROR!","La contraseña ingresada no es válida","error");
    }else if(emailRegex.test(correoCliente)==false){
            swal("Ups!","Correo invalido","warning");
           
            if(emailRegex.test(correoCliente)==true){
                validarCorreo.innerHTML="Correo Valido";
            }
    }else{
      swal("Excelente!","Ya puede continuar","success");
      btnForm2.style.display = 'none';
      registrar1_btn.style.display= 'none';
       document.getElementById('formPaso1').submit();
    // }else{      
    //   sigForm();
    // }    
  }
}