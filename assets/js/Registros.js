let registrar1_btn = document.getElementById('registrar1');
/*registrar1_btn.addEventListener('click', sigForm);*/
registrar1_btn.addEventListener('click', validarForm1);
let registrar2a_btn = document.getElementById('metodologia1');
registrar2a_btn.addEventListener('click', sigFormA);
let registrar2b_btn = document.getElementById('metodologia2');
registrar2b_btn.addEventListener('click', sigFormAA);
let registrar2c_btn = document.getElementById('metodologia3');
registrar2c_btn.addEventListener('click', sigFormAB);
let registrar3_btn = document.getElementById('registrar3');
/*registrar3_btn.addEventListener('click', sigFormB);*/ 
registrar3_btn.addEventListener('click', validarForm3);        
let formulario2 = document.getElementById('registroPaso2');
let formulario1 = document.getElementById('registroPaso1');
let formulario3 = document.getElementById('registroPaso3');
let formulario4 = document.getElementById('registroPaso4');


formulario2.style.display='none';
formulario3.style.display='none';
formulario4.style.display='none';
function validarForm1() {
    let numeroIdentificacion = document.getElementById('Num').value;
    let nombreCliente = document.getElementById('Nom').value;
    let apellidoCliente = document.getElementById('Ape').value;
    let fechaNacimiento = document.getElementById('FechaN').value;
    let telefonoCliente = document.getElementById('Tel').value;
    let correoCliente = document.getElementById('corr').value;
    let contraseñaCliente = document.getElementById('Contraseña').value;
    let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    let validarCorreo = document.getElementById('emailValid');
    if ((numeroIdentificacion == "") || (nombreCliente == "") || (apellidoCliente == "") || (fechaNacimiento == "") || (telefonoCliente == "") || (contraseñaCliente == "") || (correoCliente == ""))
    {
          alert('Debe completar todos los campos');
    }else if (contraseñaCliente.length < 10 ) {
        alert('La contraseña ingresada no es válida');
    }else if(emailRegex.test(correoCliente)==false){
            alert('Correo invalido');
            validarCorreo.innerHTML="Correo invalido (debe contener '@' y terminar en '.com') ";
            if(emailRegex.test(correoCliente)==true){
                validarCorreo.innerHTML="Correo Valido";
            }
    }
    else{
        sigForm();
    }    
  }
  
  function validarForm3() {
    let metodoPago = document.getElementById('MetPago').value;
    let fechaSuscripcion = document.getElementById('FechaS').value;
    let valorSuscripcion = document.getElementById('valorS').value;
    if ((metodoPago == '') || (fechaSuscripcion == '') || (valorSuscripcion == '' ))
        {
          alert('Debe completar todos los campos');
    }
    else{
        sigFormB();
    }    
  }
function sigForm(){
    if(formulario2.style.display === 'none'){
        formulario2.style.display = 'block';
        registrar1_btn.style.display = 'none';
        formulario1.style.display= 'none';
    }
};
/*
let accionF= [];*/
function sigFormA(){
    if(formulario3.style.display === 'none'){
        formulario3.style.display = 'block';
        registrar2a_btn.style.display = 'none';
        formulario2.style.display = 'none';
    }
};
function sigFormAA(){
    if(formulario3.style.display === 'none'){
        formulario3.style.display = 'block';
        registrar2b_btn.style.display = 'none';
        formulario2.style.display = 'none';
    }
};
function sigFormAB(){
    if(formulario3.style.display === 'none'){
        formulario3.style.display = 'block';
        registrar2c_btn.style.display = 'none';
        formulario2.style.display = 'none';
    }
};
function sigFormB(){
    if(formulario4.style.display === 'none'){
        formulario4.style.display = 'block';
        registrar3_btn.style.display = 'none';
        formulario3.style.display = 'none';
    }
};


 /*function validarForm2() {
    const usuario = document.getElementById('Usuario').value;
    const Contrasenia = document.getElementById('Contrasenia').value;
    if (usuario.length == 0 && Contrasenia.length < 6) {
      alert('No ha ingresado datos de inicio de sesion');
      return;
    } else if (usuario.length == 0) {
      alert('No ha digitado nada en el nombre de usuario');
      return;
    } else if (Contrasenia.length < 3) {
      alert('La contraseña ingresada no es válida');
      return;
    }
  }
  function validarForm3() {
    const usuario = document.getElementById('Usuario').value;
    const Contrasenia = document.getElementById('Contrasenia').value;
    if (usuario.length == 0 && Contrasenia.length < 6) {
      alert('No ha ingresado datos de inicio de sesion');
      return;
    } else if (usuario.length == 0) {
      alert('No ha digitado nada en el nombre de usuario');
      return;
    } else if (Contrasenia.length < 3) {
      alert('La contraseña ingresada no es válida');
      return;
    }
  }*/