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
    }
    else{
     
      document.getElementById('formPaso1').submit();
    // }else{      
    //   sigForm();
    // }    
  }
}
// }
//   function validarForm3() {
//     let metodoPago = document.getElementById('MetPago').value;
//     let fechaSuscripcion = document.getElementById('FechaS').value;
//     let valorSuscripcion = document.getElementById('valorS').value;
//     if ((metodoPago == '') || (fechaSuscripcion == '') || (valorSuscripcion == '' ))
//         {
//           alert('Debe completar todos los campos');
//     }
//     else{
//         sigFormB();
//     }    
//   }
// function sigForm(){
//     if(formulario2.style.display === 'none'){
//         formulario2.style.display = 'block';
//         registrar1_btn.style.display = 'none';
//         formulario1.style.display= 'none';
//     }
// };
// /*let numeroIdentificacion = document.getElementById('Num').value;
// let telefonoCliente = document.getElementById('Tel').value;
// let correoCliente = document.getElementById('corr').value;
// *//*
// let accionF= [];*/
// /*function alerta(){
//   if(numeroIdentificacion == numeroIdentificacion){
//     swal("Error!","Numero de identificacion duplicado","error");
//     window.location= "../../views/registroPaso1.php"
//   }
// }*/
// function sigFormA(){
//     if(formulario3.style.display === 'none'){
//         formulario3.style.display = 'block';
//         registrar2a_btn.style.display = 'none';
//         formulario2.style.display = 'none';
//     }
// };
// function sigFormAA(){
//     if(formulario3.style.display === 'none'){
//         formulario3.style.display = 'block';
//         registrar2b_btn.style.display = 'none';
//         formulario2.style.display = 'none';
//     }
// };
// function sigFormAB(){
//     if(formulario3.style.display === 'none'){
//         formulario3.style.display = 'block';
//         registrar2c_btn.style.display = 'none';
//         formulario2.style.display = 'none';
//     }
// };
// function sigFormB(){
//     if(formulario4.style.display === 'none'){
//         formulario4.style.display = 'block';
//         registrar3_btn.style.display = 'none';
//         formulario3.style.display = 'none';
//     }
// };


//  /*function validarForm2() {
//     const usuario = document.getElementById('Usuario').value;
//     const Contrasenia = document.getElementById('Contrasenia').value;
//     if (usuario.length == 0 && Contrasenia.length < 6) {
//       alert('No ha ingresado datos de inicio de sesion');
//       return;
//     } else if (usuario.length == 0) {
//       alert('No ha digitado nada en el nombre de usuario');
//       return;
//     } else if (Contrasenia.length < 3) {
//       alert('La contraseña ingresada no es válida');
//       return;
//     }
//   }
//   function validarForm3() {
//     const usuario = document.getElementById('Usuario').value;
//     const Contrasenia = document.getElementById('Contrasenia').value;
//     if (usuario.length == 0 && Contrasenia.length < 6) {
//       alert('No ha ingresado datos de inicio de sesion');
//       return;
//     } else if (usuario.length == 0) {
//       alert('No ha digitado nada en el nombre de usuario');
//       return;
//     } else if (Contrasenia.length < 3) {
//       alert('La contraseña ingresada no es válida');
//       return;
//     }
//   }*/