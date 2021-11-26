$(document).ready(function() {

    $('#corr').keyup(function() {

		validaCorreo1();

	});
	$('#corr2').keyup(function() {

		validaCorreo();

	});
	$('#Contraseña').keyup(function() {

		validaContrasenias1();

	});
	$('#Contraseña2').keyup(function() {

		validaContrasenias();

	});
    $("#registrar" ).click(function() {
		validarForm();
	});	

});



function validarForm(){

    var validaCorreo1 = $("#validaCorreo1").val();		
	var validaCorreo2 = $("#validaCorreo").val();
	var validaClave1 = $("#validaClave1").val();		
	var validaClave2 = $("#validaClave").val();
	
	
	if(validaCorreo1=="OK" && validaCorreo2=="OK" && validaClave1=="OK" && validaClave2=="OK" ){
		$( "#formPaso1" ).submit();
	}
	
};



function validaCorreo(){
	var email = $('#corr').val();
	var email2 = $('#corr2').val();
	
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
	var email = $('#corr').val();
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
function validaContrasenias(){
	var contra1 = $('#Contraseña').val();
	var contra2 = $('#Contraseña2').val();
	
   if(contra2==""){
        $('#error3').text("no dejar en blanco").css("color", "red"); 
		$("#validaClave").val("");
    }

	
    else if ( contra1 == contra2 )
	{
		$('#error3').text("Correcto! Las contraseñas coinciden").css("color", "green");
		$("#validaClave").val("OK");
	}else {
		$('#error3').text("las contraseñas deben coincidir").css("color", "red");
		$("#validaClave").val("");
	}
	
};
function validaContrasenias1(){
	var contra1 = $('#Contraseña').val();
	var contra2 = $('#Contraseña2').val();
	
    if (contra1==""){
        $('#error4').text("no dejar en blanco").css("color", "red"); 
		$("#validaClave1").val("");
		
	}else if(contra1.length<10 || contra1.length>18 ){
        $('#error4').text("La contraseña tiene una longitud inválida").css("color", "red"); 
		$("#validaClave1").val("");
    }else if(contra1.length>10 || contra1.length<18 ){
        $('#error4').text("La contraseña es válida").css("color", "green"); 
		$("#validaClave1").val("OK");
    }
	
};