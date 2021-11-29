$(document).ready(function() {

    $('#email').keyup(function() {

		validaCorreo1();

	});
	$('#phone').keyup(function() {

		validaTel1();

	});
	$('#email2').keyup(function() {

		validaCorreo();

	});
    $("#registrar" ).click(function() {
		validarCorreo();
	});	

});



function validarCorreo(){

    var validaCorreo1 = $("#validaCorreo1").val();		
	var validaCorreo2 = $("#validaCorreo").val();
	var validaTel1 = $("#validaTel1").val();
	
	
	if(validaCorreo1=="OK" && validaCorreo2=="OK" && validaTel1=="OK"){
		$( "#form" ).submit();
	}
	
};



function validaCorreo(){
	var email = $('#email').val();
	var email2 = $('#email2').val();
	
   if(email2==""){
        $('#error2').text("no dejar en blanco").css("color", "red"); 
		$("#validaCorreo").val("");
    }

	
    else if ( email == email2 )
	{
		$('#error2').text("Correcto! Los correos electrónicos coinciden").css("color", "green");
		$("#validaCorreo").val("OK");
	}else {
		$('#error2').text("Los correos electrónicos no coinciden").css("color", "red");
		$("#validaCorreo").val("");
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
function validaTel1(){
	var tel = $('#phone').val();
	var formTel= /^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/;
	
    if (tel==""){
        $('#error3').text("no dejar en blanco").css("color", "red"); 
		$("#validaTel1").val("");
		
	}else if(tel.length<10) {
        $('#error3').text("La longitud del telefono no es válida").css("color", "red"); 
		$("#validaTel1").val("");
    }else if(formTel.test(tel)==false){
		$('#error3').text("El formato de teléfono es inválido").css("color", "red"); 
		$("#validaTel1").val("OK");
	}else{
		$('#error3').text("El teléfono es válido").css("color", "green"); 
		$("#validaTel1").val("OK");
	}
	
};