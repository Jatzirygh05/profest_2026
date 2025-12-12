function valida_un_check(){
	/* Ventena emergente */
	var rowError = document.getElementById('rowError');
	
	/* Variables de la primera parte */
	
	var opcion1Esc = document.getElementById('opcion1');
	var opcion2Esc = document.getElementById('opcion2');
	var opcion3Esc = document.getElementById('opcion3');
	var opcion4Esc = document.getElementById('opcion4');
	var opcion5Esc = document.getElementById('opcion5');
	var opcion6Esc = document.getElementById('opcion6');
	var opcion7Esc = document.getElementById('opcion7');
	var opcion8Esc = document.getElementById('opcion8');
	var opcion9Esc = document.getElementById('opcion9');
	
	/* Boton de Envío */
	var btnEnvio = document.getElementById('submit1');
	/* Contador */
	var i=0;

	//El capturador de errores
	var cuenta_error=0;

if(opcion1Esc==null){ opcion1Esc_verif=false } else { opcion1Esc_verif = opcion1Esc; }
if(opcion2Esc==null){ opcion2Esc_verif=false } else { opcion2Esc_verif = opcion2Esc; }
if(opcion3Esc==null){ opcion3Esc_verif=false } else { opcion3Esc_verif = opcion3Esc; }
if(opcion4Esc==null){ opcion4Esc_verif=false } else { opcion4Esc_verif = opcion4Esc; }
if(opcion5Esc==null){ opcion5Esc_verif=false } else { opcion5Esc_verif = opcion5Esc; }
if(opcion6Esc==null){ opcion6Esc_verif=false } else { opcion6Esc_verif = opcion6Esc; }
if(opcion7Esc==null){ opcion7Esc_verif=false } else { opcion7Esc_verif = opcion7Esc; }
if(opcion8Esc==null){ opcion8Esc_verif=false } else { opcion8Esc_verif = opcion8Esc; }
if(opcion9Esc==null){ opcion9Esc_verif=false } else { opcion9Esc_verif = opcion9Esc; }

var campos = [
		opcion1Esc_verif,
		opcion2Esc_verif,
		opcion3Esc_verif,
		opcion4Esc_verif,
		opcion5Esc_verif,
		opcion6Esc_verif,
		opcion7Esc_verif,
		opcion8Esc_verif,
		opcion9Esc_verif
		]

	//Todos y cada uno de los campos de texto
	for ( i=0 ; i < campos.length ; i++) {
					
			if(opcion1Esc_verif.checked==true || opcion2Esc_verif.checked==true || opcion3Esc_verif.checked==true 
			|| opcion4Esc_verif.checked==true || opcion5Esc_verif.checked==true || opcion6Esc_verif.checked==true 
			|| opcion7Esc_verif.checked==true || opcion8Esc_verif.checked==true || opcion9Esc_verif.checked==true){
				
				//console.log("entro")
					
					rowError.className = 'form-text' ;
					rowError.style.display = 'none';
									
				} else {	
				//console.log("entro2")
				
					rowError.style.display = 'block';
					rowError.className = 'form-text form-text-error' ;
					
					  cuenta_error++;
					
					}
	}
	
	if(cuenta_error == 0){
			window.document.apInf.submit();
 	}
}


$(document).ready(function(){
	$("#submit1").click( function (event){
			//bloqueamos la función del anchor original
            event.preventDefault();

			//dirigimos de manera animada al id del anchor
			//if(){
			if($("samp.form-text-error").offset() != null){
				var desplazamiento_ver = $("samp.form-text-error").offset().top-250;
    	    	$('html,body').animate({
    	      	  //le indicamos al scroll vertical que se dirija al objeto con el id
    	      	  //guardado en el anchor a su posición top.
    	      	  scrollTop:desplazamiento_ver
    	      	  },1000);
    	   	}
    	    //}
		//}
	//}
	});
});

