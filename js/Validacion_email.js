/* Validacion de e-mail(inicio) */
function validarEmail(idCampo) {
	
if(idCampo == 'Correo_electronico_op'){
var Correo_electronico_opEsc = document.getElementById('Correo_electronico_op').value;
var Correo_electronico_opEsc_campo = document.getElementById('Correo_electronico_op');

var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

//console.log(document.getElementById('Correo_electronico_op').value);

  if (emailRegex.test(Correo_electronico_opEsc)){
   //alert("La dirección de email " + Correo_electronico_opEsc + " es correcta.");
  //emailOK_op.innerText = "correcto";
	errCorreo_electronico_opAs.className = 'form-text';
	emailOK_op.innerText = "";
	Correo_electronico_opEsc_campo.className = 'form-control' ;
  }else{
  	
  	document.getElementById('emailOK_op').className = 'form-text form-text-error';
  	Correo_electronico_opEsc_campo.value="";
  	document.getElementById('emailOK_op').innerText="La direcci\u00F3n de email " + Correo_electronico_opEsc + " es incorrecta";
	
		//alert("La dirección de email es incorrecta.");
  	errCorreo_electronico_opAs.className = 'form-text form-text-error';
  	// esc_arreglo.className = 'form-control form-control-error'; 
  	Correo_electronico_opEsc_campo.className = 'form-control form-control-error' ;

  	var http_request = false;
  	var nombre = 'Correo_electronico_op';
		var valor = document.getElementById('Correo_electronico_op').value;

		console.log(nombre);
		console.log(valor);
	  	var url_instancia='receptor2_Proyecto.php?variable='+nombre+'&valor='+valor;
		hacerPeticion(url_instancia);	

		}
  }
}
/* Validacion de e-mail(fin) */