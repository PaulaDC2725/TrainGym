$(document).ready(function() {

    $('#password1').keyup(function() {

		validaContrasenias1();

	});
	$('#password2').keyup(function() {

		validaContrasenias();

	});
    $("#actualizar" ).click(function() {
		validarContraActu();
	});	

});



function validarContraActu(){

    var validaClave1 = $("#validaClave1").val();		
	var validaClave2 = $("#validaClave").val();
	
	
	if(validaClave1=="OK" && validaClave2=="OK"){
		$( "#form" ).submit();
	}else if(validaClave1=="" && validaClave2==""){
		swal('Ups!','Debe cumplir los parámetros','warning');
	}
	
};



function validaContrasenias(){
	var contra1 = $('#password1').val();
	var contra2 = $('#password2').val();
	
   if(contra2==""){
        $('#error2').text("no dejar en blanco").css("color", "red"); 
		$("#validaClave").val("");
    }

	
    else if ( contra1 == contra2 )
	{
		$('#error2').text("Correcto! contraseña lista para actualizar").css("color", "green");
		$("#validaClave").val("OK");
	}else {
		$('#error2').text("las contraseñas deben coincidir").css("color", "red");
		$("#validaClave").val("");
	}
	
};
function validaContrasenias1(){
	var contra1 = $('#password1').val();
	var contra2 = $('#password2').val();
	
    if (contra1==""){
        $('#error1').text("no dejar en blanco").css("color", "red"); 
		$("#validaClave1").val("");
		
	}else if(contra1.length<10 || contra1.length>18 ){
        $('#error1').text("La contraseña tiene una longitud inválida").css("color", "red"); 
		$("#validaClave1").val("");
    }else if(contra1.length>10 || contra1.length<18 ){
        $('#error1').text("La contraseña es válida").css("color", "green"); 
		$("#validaClave1").val("OK");
    }
	
};