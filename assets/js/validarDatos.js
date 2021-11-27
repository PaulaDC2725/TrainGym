$(document).ready(function() {

    $('#email').keyup(function() {

		validaCorreo1();

	});
    $("#recuperar" ).click(function() {
		validarForm();
	});	

});



function validarForm(){

    var validaCorreo1 = $("#validaCorreo1").val();
	
	
	if(validaCorreo1=="OK"){
		$( "#form" ).submit();
	}
	
};



function validaCorreo1(){
	var email = $('#email').val();
	var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	
    if (email==""){
        $('#error1').text("no dejar en blanco").css("color", "red"); 
		$("#validaCorreo1").val("");
		
	}else if(emailRegex.test(email)==false) {
        $('#error1').text("El correo no es válido").css("color", "red"); 
		$("#validaCorreo1").val("");
    }else{
		$('#error1').text("El correo es válido").css("color", "green"); 
		$("#validaCorreo1").val("OK");
	}
	
};