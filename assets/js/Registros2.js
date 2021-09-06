let registrar2a_btn = document.getElementById("metodologia1");
registrar2a_btn.addEventListener("click", sigFormA);
let registrar2b_btn = document.getElementById("metodologia2");
registrar2b_btn.addEventListener("click", sigFormAA);
let registrar2c_btn = document.getElementById("metodologia3");
registrar2c_btn.addEventListener("click", sigFormAB);
let registrar3_btn = document.getElementById("registrar3");
/*registrar3_btn.addEventListener('click', sigFormB);*/
registrar3_btn.addEventListener("click", validarForm3);
let formulario2 = document.getElementById("registroPaso2");
let formulario1 = document.getElementById("registroPaso1");
let formulario3 = document.getElementById("registroPaso3");
let formulario4 = document.getElementById("registroPaso4");

formulario3.style.display = "none";
formulario4.style.display = "none";
function validarForm3() {
  let metodoPago = document.getElementById("MetPago").value;
  let fechaSuscripcion = document.getElementById("FechaS").value;
  let valorSuscripcion = document.getElementById("valorS").value;
  if (metodoPago == "" || fechaSuscripcion == "" || valorSuscripcion == "") {
    swal("Ups!", "Debe completar todos los campos", "error");
  } else {
    sigFormB();
  }
}
/*let numeroIdentificacion = document.getElementById('Num').value;
let telefonoCliente = document.getElementById('Tel').value;
let correoCliente = document.getElementById('corr').value;
*/ /*
let accionF= [];*/
/*function alerta(){
  if(numeroIdentificacion == numeroIdentificacion){
    swal("Error!","Numero de identificacion duplicado","error");
    window.location= "../../views/registroPaso1.php"
  }
}*/
function sigFormA() {
  if (formulario3.style.display === "none") {
    formulario3.style.display = "block";
    registrar2a_btn.style.display = "none";
    formulario2.style.display = "none";
  }
}
function sigFormAA() {
  if (formulario3.style.display === "none") {
    formulario3.style.display = "block";
    registrar2b_btn.style.display = "none";
    formulario2.style.display = "none";
  }
}
function sigFormAB() {
  if (formulario3.style.display === "none") {
    formulario3.style.display = "block";
    registrar2c_btn.style.display = "none";
    formulario2.style.display = "none";
  }
}
function sigFormB() {
  if (formulario4.style.display === "none") {
    formulario4.style.display = "block";
    registrar3_btn.style.display = "none";
    formulario3.style.display = "none";
  }
}

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
