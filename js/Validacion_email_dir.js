/* Validacion de e-mail(inicio) */
function validarEmail_dir(idCampo) {
	
if(idCampo == 'Correo_electronico_dir'){
var Correo_electronico_dirEsc = document.getElementById('Correo_electronico_dir').value;
var Correo_electronico_dirEsc_campo = document.getElementById('Correo_electronico_dir');

var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

  if (emailRegex.test(Correo_electronico_dirEsc)){
   //alert("La dirección de email " + correo_electronico_admEsc + " es correcta.");
  //emailOK.innerText = "correcto";
	errCorreo_electronico_dirAs.className = 'form-text';
	document.getElementById('emailOK_dir').innerText="";
	Correo_electronico_dirEsc_campo.className = 'form-control' ;
  }else{
  	
  	document.getElementById('emailOK_dir').className = 'form-text form-text-error';
  	Correo_electronico_dirEsc_campo.value="";
  	document.getElementById('emailOK_dir').innerText="La direcci\u00F3n de email " + Correo_electronico_dirEsc + " es incorrecta";
	
	//alert("La dirección de email es incorrecta.");
  	errCorreo_electronico_dirAs.className = 'form-text form-text-error';
  	// esc_arreglo.className = 'form-control form-control-error'; 
  	Correo_electronico_dirEsc_campo.className = 'form-control form-control-error' ;

  	var http_request = false;
  	var nombre = 'Correo_electronico_dir';
		var valor = document.getElementById('Correo_electronico_dir').value;

		console.log(nombre);
		console.log(valor);
	  var url_instancia='receptor2_Proyecto_director.php?variable='+nombre+'&valor='+valor;
		hacerPeticion(url_instancia);			
  	}
  }
}
/* Validacion de e-mail(fin) */