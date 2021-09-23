function validarForm1() { 
    let numeroIdentificacion = document.getElementById('Num').value;   
    let correo = document.getElementById('email').value;   
    let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if ((numeroIdentificacion == "")  || (correo == ""))
    {
      swal("Ups!","Debe completar todos los campos","warning");
    }else if(emailRegex.test(correo)==false){
            swal("Ups!","Correo invalido","warning");          
           
    }
    else{
     
      document.getElementById('form').submit();
    // }else{      
    //   sigForm();
    // }    
  }
}
