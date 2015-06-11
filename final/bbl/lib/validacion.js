$(document).ready(function(){
	//variables globales
	var searchBoxes = $('.text');
	var inputNombre = $('#nombre');
	var inputIdusuario = $('#idusuario');
	
	function validarId(){
		if(isNaN(inputIdusuario)){
			inputIdusuario.addClass("error");
			return false;
		}else{
			inputIdusuario.removeClass("error");
			return true;
		}
	}
	
	function validarNombre(){
		//caracteres de la a-zA-Z
		if(inputNombre.val().length == 0){
			inputNombre.addClass("error");
			return false;
		}
		else if(!inputNombre.val().match(/^[a-zA-Z]+$/)){
			inputNombre.addClass("error");
			return false;
		}else{
			inputNombre.removeClass("error");
			return true;
		}
	}
	
	//controlamos la validacion en los distintos eventos  
	// Perdida de foco  
	inputNombre.blur(validarNombre);  
	inputIdusuario.blur(validarId);  
	// inputPassword1.blur(validatePassword1);    
	// inputPassword2.blur(validatePassword2);    
	  
	// Pulsacion de tecla  
	inputNombre.keyup(validarNombre);  
	inputIdusuario.keyup(validarId);  
	// inputPassword2.keyup(validatePassword2);  
	  
	// Envio de formulario  
	$("#frm_docente").submit(function(){  
		if(validarId() & validarNombre())  
			return true;  
		else  
			return false;  
	});
});