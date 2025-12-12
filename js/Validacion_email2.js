/* Validacion de e-mail(inicio) */
function validarEmail2(idCampo) {
	
if(idCampo == 'correo_electronico_adm'){
var correo_electronico_admEsc = document.getElementById('correo_electronico_adm').value;
var correo_electronico_admEsc_campo = document.getElementById('correo_electronico_adm');

var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

//console.log(document.getElementById('correo_electronico_adm').value);

  if (emailRegex.test(correo_electronico_admEsc)){
   //alert("La dirección de email " + correo_electronico_admEsc + " es correcta.");
  //emailOK.innerText = "correcto";
	errcorreo_electronico_admAs.className = 'form-text';
	document.getElementById('emailOK_adm').innerText="";
	correo_electronico_admEsc_campo.className = 'form-control' ;
  }else{
  	
  	document.getElementById('emailOK_adm').className = 'form-text form-text-error';
  	correo_electronico_admEsc_campo.value="";
  	document.getElementById('emailOK_adm').innerText="La direcci\u00F3n de email " + correo_electronico_admEsc + " es incorrecta";
	
	//alert("La dirección de email es incorrecta.");
  	errcorreo_electronico_admAs.className = 'form-text form-text-error';
  	// esc_arreglo.className = 'form-control form-control-error'; 
  	correo_electronico_admEsc_campo.className = 'form-control form-control-error' ;

  	var http_request = false;
  	var nombre = 'correo_electronico_adm';
		var valor = document.getElementById('correo_electronico_adm').value;

		console.log(nombre);
		console.log(valor);
	  var url_instancia='receptor2_Proyecto.php?variable='+nombre+'&valor='+valor;
		hacerPeticion(url_instancia);	

		
  	}
  }
}

/* Validacion de e-mail(fin) */