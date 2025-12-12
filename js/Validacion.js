function validarEnvio(){
	/* Ventena emergente */
	var rowError = document.getElementById('rowError');

	/* Variables de la primera parte */

	var nombre_usuario_reg_proyectoEsc = document.getElementById('nombre_usuario_reg_proyecto');
	var errnombre_usuario_reg_proyecto= document.getElementById('errnombre_usuario_reg_proyecto');
	var errnombre_usuario_reg_proyectoAs= document.getElementById('errnombre_usuario_reg_proyectoAs');

	var Correo_sistEsc 	= document.getElementById('Correo_sist');
	var errCorreo_sist	= document.getElementById('errCorreo_sist');
	var errCorreo_sistAs= document.getElementById('errCorreo_sistAs');


	/*
	var tipo_de_instanciaEsc = document.getElementById('tipo_de_instancia');
	var errtipo_de_instancia= document.getElementById('errtipo_de_instancia');
	var errtipo_de_instanciaAs= document.getElementById('errtipo_de_instanciaAs');
	
	
	var Nombre_InstEsc = document.getElementById('Nombre_Inst');
	var errNombre_Inst= document.getElementById('errNombre_Inst');
	var errNombre_InstAs= document.getElementById('errNombre_InstAs');
	
	var nombre_titularEsc = document.getElementById('nombre_titular');
	var errnombre_titular= document.getElementById('errnombre_titular');
	var errnombre_titularAs= document.getElementById('errnombre_titularAs');
	
	var gradoEsc = document.getElementById('grado');
	var errgrado= document.getElementById('errgrado');
	var errgradoAs= document.getElementById('errgradoAs');	

	var cargoEsc = document.getElementById('cargo');
	var errcargo= document.getElementById('errcargo');
	var errcargoAs= document.getElementById('errcargoAs');
	
	
	var CorreoEsc = document.getElementById('Correo');
	var errCorreo= document.getElementById('errCorreo');
	var errCorreoAs= document.getElementById('errCorreoAs');
	
	var PostCodRepLegEsc = document.getElementById('PostCodRepLeg');
	var errPostCodRepLeg= document.getElementById('errPostCodRepLeg');
	var errPostCodRepLegAs= document.getElementById('errPostCodRepLegAs');

	var CalleRepLegEsc = document.getElementById('CalleRepLeg');
	var errCalleRepLeg= document.getElementById('errCalleRepLeg');
	var errCalleRepLegAs= document.getElementById('errCalleRepLegAs');

	var EstadoRepLegEsc = document.getElementById('EstadoRepLeg');
	var errEstadoRepLeg= document.getElementById('errEstadoRepLeg');
	var errEstadoRepLegAs= document.getElementById('errEstadoRepLegAs');

	var Municipio_AlcRepLegEsc = document.getElementById('Municipio_AlcRepLeg');
	var errMunicipio_AlcRepLeg= document.getElementById('errMunicipio_AlcRepLeg');
	var errMunicipio_AlcRepLegAs= document.getElementById('errMunicipio_AlcRepLegAs');

	var ColoniaRepLegEsc = document.getElementById('ColoniaRepLeg');
	var errColoniaRepLeg= document.getElementById('errColoniaRepLeg');
	var errColoniaRepLegAs= document.getElementById('errColoniaRepLegAs');

	/*var InteriorRepLegEsc = document.getElementById('InteriorRepLeg');
	var errInteriorRepLeg= document.getElementById('errInteriorRepLeg');
	var errInteriorRepLegAs= document.getElementById('errInteriorRepLegAs');*/

	/*var ExteriorRepLegEsc = document.getElementById('ExteriorRepLeg');
	var errExteriorRepLeg= document.getElementById('errExteriorRepLeg');
	var errExteriorRepLegAs= document.getElementById('errExteriorRepLegAs');

	/*var LadaRepLegEsc = document.getElementById('LadaRepLeg');
	var errLadaRepLeg= document.getElementById('errLadaRepLeg');
	var errLadaRepLegAs= document.getElementById('errLadaRepLegAs');*/

	/*var TelefonoRepLegEsc = document.getElementById('TelefonoRepLeg');
	var errTelefonoRepLeg= document.getElementById('errTelefonoRepLeg');
	var errTelefonoRepLegAs= document.getElementById('errTelefonoRepLegAs');*/

	/* Boton de Envío */
	var btnEnvio = document.getElementById('submit1');

	/* Arreglo de variables (especificamente las cajas de texto)*/
	
	var campos = [
		nombre_usuario_reg_proyectoEsc,
		Correo_sistEsc
	];
//InteriorRepLegEsc,
	//Variables de los mensajes "Este campo es obligatorio"	
	var mensaje = [
		errnombre_usuario_reg_proyecto,
		errCorreo_sist
	];
//errInteriorRepLeg,
	//Variables de los asteriscos
	
	var asteriscos = [
		errnombre_usuario_reg_proyectoAs,
		errCorreo_sistAs
	];
		//errInteriorRepLegAs,
	//Variables de los combobox
	/*var comboEsc = [
		tipo_de_instanciaEsc,
		gradoEsc
		//DocProbInstPerEsc	
	];
	var errcomboAs =[
		errtipo_de_instanciaAs,
		errgradoAs
		//errDocProbInstPerAs
	];
	var errcombo =[
		errtipo_de_instancia,
		errgrado
		//errDocProbInstPer
	];	*/

		/* Contador */
	var i=0;

	//Variable que contiene el arreglo comboBox
	//var selec = comboEsc;

	//El capturador de errores
	var cuenta_error=0;
	
	//var extra_for = 1;
	//var cuenta_campo = 0;
	

	//Todos y cada uno de los campos de texto
	for ( i=0 ; i < campos.length ; i++) {

			var tomar_valor_a = campos[i].value;
			//console.log(tomar_valor_a[i] != '');

			if (tomar_valor_a == '')
			{
				rowError.style.display = 'block';
				var err_arreglo = mensaje[i];
				var as_arreglo = asteriscos[i];
				var esc_arreglo = campos[i];

				err_arreglo.style.display = 'block';
				as_arreglo.className = 'form-text form-text-error';
                esc_arreglo.className = 'form-control form-control-error'; 

                cuenta_error++;

            }else{ /*if(tomar_valor_a != ''){
				
				      if(campos[i].name=="TelefonoRepLeg" && tomar_valor_a.length<10)
							{
									rowError.style.display = 'block';
									var err_arreglo = mensaje[i];
									var as_arreglo = asteriscos[i];
									var esc_arreglo = campos[i];

									err_arreglo.style.display = 'block';
									as_arreglo.className = 'form-text form-text-error';
					        esc_arreglo.className = 'form-control form-control-error'; 
								cuenta_error++;
				      }else{
				        
	            }*/ 
	            var err_arreglo = mensaje[i];
							var as_arreglo = asteriscos[i];
							var esc_arreglo = campos[i];

							err_arreglo.style.display = 'none';
							as_arreglo.className = 'control-label';
	            esc_arreglo.className = 'form-control';
            }

			/*for(var j=0; j < selec.length ; j++){
				if(selec[j].options[selec[j].selectedIndex].value == 0){
					if(rowError.style.display !== 'block')
						rowError.style.display = 'block';
					comboEsc[j].className = 'form-control form-control-error' ;
					errcomboAs[j].className = 'form-text form-text-error' ;
					errcombo[j].style.display = 'block';
					switch (extra_for){
						case 1:
							cuenta_error++;
							cuenta_campo++;
							if(cuenta_campo == 2){
								extra_for = 2;
							}
						break;
						default: break;
					}
				}else if(selec[j].options[selec[j].selectedIndex].value != 0){

					comboEsc[j].className = 'form-control' ;
					errcomboAs[j].className = 'control-label' ;
					errcombo[j].style.display = 'none';
				}

			}//fin del ciclo for interno*/
			
			
	}//fin del ciclo for 


	
	if(cuenta_error == 0){
		window.document.apInf.submit();
 	}  

}


/*$gmx(document).ready( function() {
	$('[data-toggle="tooltip"]').tooltip();
});*/

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


/* Validacion de e-mail(inicio) titular 
function validarEmail(idCampo) {
	
if(idCampo == 'Correo'){
var CorreoEsc = document.getElementById('Correo').value;
var CorreoEsc_campo = document.getElementById('Correo');

var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

//console.log(document.getElementById('Correo').value);

  if (emailRegex.test(CorreoEsc)){
   //alert("La dirección de email " + CorreoEsc + " es correcta.");
  //emailOK.innerText = "correcto";
	errCorreoAs.className = 'form-text';
	emailOK.innerText = "";
	CorreoEsc_campo.className = 'form-control' ;
  }else{
  	
  	document.getElementById('emailOK').className = 'form-text form-text-error';
  	document.getElementById('emailOK').innerText="Ingresa un correo electrónico correcto";
	
	//alert("La dirección de email es incorrecta.");
  	errCorreoAs.className = 'form-text form-text-error';
  	// esc_arreglo.className = 'form-control form-control-error'; 
  	CorreoEsc_campo.className = 'form-control form-control-error' ;
		
  	}
  }
}
 Validacion de e-mail(fin) */

/* Validacion de e-mail(inicio) para el Sistema */
function validarEmail2(idCampo) {
	
if(idCampo == 'Correo_sist'){
var Correo_sistEsc = document.getElementById('Correo_sist').value;
var Correo_sistEsc_campo = document.getElementById('Correo_sist');
var errCorreo_sistAs= document.getElementById('errCorreo_sistAs');

var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

	//console.log(document.getElementById('Correo_sist').value);

  if (emailRegex.test(Correo_sistEsc)){
  //alert("La dirección de email " + Correo_sistEsc + " es correcta.");
  //emailOK.innerText = "correcto";
	errCorreo_sistAs.className = 'form-text';
	emailOK.innerText = "";
	Correo_sistEsc_campo.className = 'form-control' ;
  }else{
  	
  	document.getElementById('emailOK').className = 'form-text form-text-error';
  	document.getElementById('Correo_sist').value="";
  	document.getElementById('emailOK').innerText="La dirección de email " + Correo_sistEsc + " es incorrecta";
	
	//alert("La dirección de email es incorrecta.");
  	errCorreo_sistAs.className = 'form-text form-text-error';
  	//esc_arreglo.className = 'form-control form-control-error'; 
  	Correo_sistEsc_campo.className = 'form-control form-control-error' ;		
  	}
  }
}
/* Validacion de e-mail(fin) */

