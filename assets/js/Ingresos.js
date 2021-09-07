function validarForm() {
    let numeroIdentificacion = document.getElementById('Num').value;
    let contraseñaCliente = document.getElementById('Contraseña').value;
    if ((numeroIdentificacion == "") || (contraseñaCliente == ""))
    {
      swal("Ups!","Debe completar todos los campos","warning");
    }
}