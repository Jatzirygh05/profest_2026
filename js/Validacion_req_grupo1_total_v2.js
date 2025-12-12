// JavaScript Document
function validarEnvio_grupo1(total_proyecto, clave1, clave2, clave3, clave4, clave5, clave6, clave7, clave9, suma_honorario){

var value_UNO = document.getElementById('total_proyecto').value;
var value = parseFloat(value_UNO.replace(/[$,\s]/g, '')); 

var suma_honorario=document.getElementById('suma_honorario').value;

	var total_esp_mue_inmuea_col;
	var uno;
	var total_esp_mue_inmueb_col;
	var dos;
	var total_esp_mue_inmuec_col;
	var tres;
	var total_esp_mue_inmued_col;
	var cuatro;
	var total_esp_mue_inmuee_col;
	var cinco;
	var total_esp_mue_inmueg_col;
	var seis;
	var total_esp_mue_inmuez_col;
	var siete;
	var total_esp_mue_inmue_n_col;
	var ocho;

	if(clave2!=''){
		total_esp_mue_inmuea_col = document.getElementById('total_esp_mue_inmuea').value;
		uno = parseFloat(total_esp_mue_inmuea_col.replace(/[$,\s]/g, '')); 
	} else { uno = 0; } 
	
	if(clave3!=''){
		total_esp_mue_inmueb_col = document.getElementById('total_esp_mue_inmueb').value;
		dos = parseFloat(total_esp_mue_inmueb_col.replace(/[$,\s]/g, '')); 
	} else { dos = 0; }

	if(clave4!=''){
		total_esp_mue_inmuec_col = document.getElementById('total_esp_mue_inmuec').value;
		tres = parseFloat(total_esp_mue_inmuec_col.replace(/[$,\s]/g, '')); 
	} else { tres = 0; }

	if(clave5!=''){
		total_esp_mue_inmued_col = document.getElementById('total_esp_mue_inmued').value;
		cuatro = parseFloat(total_esp_mue_inmued_col.replace(/[$,\s]/g, '')); 
	} else { cuatro = 0; }

	if(clave6!=''){
		total_esp_mue_inmuee_col = document.getElementById('total_esp_mue_inmuee').value;
		cinco = parseFloat(total_esp_mue_inmuee_col.replace(/[$,\s]/g, '')); 
	} else { cinco = 0; }

	if(clave7!=''){
		total_esp_mue_inmueg_col = document.getElementById('total_esp_mue_inmueg').value;
		seis = parseFloat(total_esp_mue_inmueg_col.replace(/[$,\s]/g, '')); 
	} else { seis = 0; }

	if(clave9!=''){ 
		total_esp_mue_inmuez_col = document.getElementById('total_esp_mue_inmue_z').value;
		siete = parseFloat(total_esp_mue_inmuez_col.replace(/[$,\s]/g, '')); 
	} else { siete = 0; }

	if(clave1!=''){ 
		total_esp_mue_inmue_n_col = document.getElementById('total_esp_mue_inmue_n').value;
		ocho = parseFloat(total_esp_mue_inmue_n_col.replace(/[$,\s]/g, '')); 
	} else { ocho = 0; }

	var suma_pestanas_tot = uno + dos + tres + cuatro + cinco + seis + siete + ocho;
	var suma_honorar;

	if(suma_honorario!=''){	suma_honorar = parseFloat(suma_honorario.replace(/[$,\s]/g, '')); } else { suma_honorar = 0; }
	
	var suma_total_pest_hono = suma_pestanas_tot + suma_honorar;

	//console.log(suma_total_pest_hono);

////////////////////////////// INICIO 1
if(clave1!=''){

	var m1_fuente = document.getElementById('total_esp_mue_inmue_n').value;

	var cuenta_errora=0;
	var cuenta_error_fina=0;
	var cuenta_error_falta_infora=0;
			
	for(var p=1; p<=30; p++){

		var errconcepto = document.getElementById('concepto'+p).value;
		var errunidad = document.getElementById('unidad'+p).value;
		var errdias_a_utilizar = document.getElementById('dias_a_utilizar'+p).value;
		var errcosto_unitario_imp_incluidos = document.getElementById('costo_unitario_imp_incluidos'+p).value;
		var errmonto_tot_imp_incluidos = document.getElementById('monto_tot_imp_incluidos'+p).value;
			
		if(errconcepto!='' && errunidad!='' && errdias_a_utilizar!='' && errcosto_unitario_imp_incluidos!='' && errmonto_tot_imp_incluidos!=''){
						
					/*if(m1_fuente==value){
						console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
						document.getElementById("rowError1").style.display = 'block';
						cuenta_errora=0;
						cuenta_error_fina = 1
						} else {
							console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
							document.getElementById("rowError1").style.display = 'block';
							cuenta_errora=1;
							}*/
			if(suma_total_pest_hono==value){
				console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				document.getElementById("rowError1_total").style.display = 'none';
				cuenta_errora=0;
				cuenta_error_fina = 1
			} else {
				console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				$(window).scrollTop(300);
				document.getElementById("rowError1_total").style.display = 'block';
				
				var obtsuma_A= document.formul.total_conceptos;
          			obtsuma_A.value=suma_total_pest_hono;

				cuenta_errora=1;
			}
				       
		} else if(errconcepto!='' || errunidad!='' || errdias_a_utilizar!='' || errcosto_unitario_imp_incluidos!='' || errmonto_tot_imp_incluidos!='') {
			console.log('Verifica tu captura ya que no tiene la información necesaria');
			document.getElementById("rowError1").style.display = 'block';
					
			cuenta_error_falta_infora=1;
			}	
	} //fin for

	var cuenta_error_fina=0;

	for(var i=1; i<=1; i++){
		
		var errconcepto = document.getElementById('concepto'+i).value;
		var errunidad = document.getElementById('unidad'+i).value;
		var errdias_a_utilizar = document.getElementById('dias_a_utilizar'+i).value;
		var errcosto_unitario_imp_incluidos = document.getElementById('costo_unitario_imp_incluidos'+i).value;
		var errmonto_tot_imp_incluidos = document.getElementById('monto_tot_imp_incluidos'+i).value;
		
		if(errconcepto=='' || errunidad=='' || errdias_a_utilizar=='' || errcosto_unitario_imp_incluidos=='' || errmonto_tot_imp_incluidos==''){
			cuenta_error_fina = 1
			cuenta_errora=1;
			console.log('deben ser 1 obligatorios')
		}
	}
}
////////////////////////////// FIN 1

///////////////////////////// INICIO 2
//console.log(clave2)

if(clave2!=''){
var m1_fuentea = document.getElementById('total_esp_mue_inmuea').value;
var total_esp_mue_inmuea = document.getElementById('total_esp_mue_inmuea').value;

var cuenta_errorb=0;
var cuenta_error_finb=0;
var cuenta_error_falta_inforb=0;
		
	for(var p=1; p<=30; p++){

		var errconceptoa = document.getElementById('conceptoa'+p).value;
		var errunidada = document.getElementById('unidada'+p).value;
		var errdias_a_utilizara = document.getElementById('dias_a_utilizara'+p).value;
		var errcosto_unitario_imp_incluidosa = document.getElementById('costo_unitario_imp_incluidosa'+p).value;
		var errmonto_tot_imp_incluidosa = document.getElementById('monto_tot_imp_incluidosa'+p).value;
			
		if(errconceptoa!='' && errunidada!='' && errdias_a_utilizara!='' && errcosto_unitario_imp_incluidosa!='' && errmonto_tot_imp_incluidosa!=''){
						
					/*if(m1_fuentea==value){
						console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
						document.getElementById("rowError2").style.display = 'block';
						cuenta_errorb=0;
						cuenta_error_finb = 1
						} else {
							console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
							document.getElementById("rowError2").style.display = 'block';
							cuenta_errorb=1;
							}*/

			if(suma_total_pest_hono==value){
				//console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				document.getElementById("rowError1_total").style.display = 'none';
				cuenta_errorb=0;
				cuenta_error_finb = 1
			} else {
				//console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				$(window).scrollTop(300);
				document.getElementById("rowError1_total").style.display = 'block';

				var obtsuma_A= document.formul.total_conceptos;
          		obtsuma_A.value=suma_total_pest_hono;

				cuenta_errorb=1;
			}
				       
		} else if(errconceptoa!='' || errunidada!='' || errdias_a_utilizara!='' || errcosto_unitario_imp_incluidosa!='' || errmonto_tot_imp_incluidosa!='') {
			console.log('Verifica tu captura ya que no tiene la información necesaria');
			document.getElementById("rowError2").style.display = 'block';
					
			cuenta_error_falta_inforb=1;
			}	
	} //fin for

	var cuenta_error_finb=0;

	for(var i=1; i<=1; i++){
		
		var errconceptoa = document.getElementById('conceptoa'+i).value;
		var errunidada = document.getElementById('unidada'+i).value;
		var errdias_a_utilizara = document.getElementById('dias_a_utilizara'+i).value;
		var errcosto_unitario_imp_incluidosa = document.getElementById('costo_unitario_imp_incluidosa'+i).value;
		var errmonto_tot_imp_incluidosa = document.getElementById('monto_tot_imp_incluidosa'+i).value;
		
		if(errconceptoa=='' || errunidada=='' || errdias_a_utilizara=='' || errcosto_unitario_imp_incluidosa=='' || errmonto_tot_imp_incluidosa==''){
			cuenta_error_finb = 1
			cuenta_errorb=1;
			console.log('debe ser 1 obligatorio')
		}
	}
}
////////////////////////////// FIN 2

///////////////////////////// INICIO 3
if(clave3!=''){
var m1_fuentec = document.getElementById('total_esp_mue_inmueb').value;
var total_esp_mue_inmueb = document.getElementById('total_esp_mue_inmueb').value;

var cuenta_errorc=0;
var cuenta_error_finc=0;
var cuenta_error_falta_inforc=0;
		
	for(var p=1; p<=30; p++){

		var errconceptob = document.getElementById('conceptob'+p).value;
		var errunidadb = document.getElementById('unidadb'+p).value;
		var errcosto_unitario_imp_incluidosb = document.getElementById('costo_unitario_imp_incluidosb'+p).value;
		var errmonto_tot_imp_incluidosb = document.getElementById('monto_tot_imp_incluidosb'+p).value;
			
		if(errconceptob!='' && errunidadb!='' && errcosto_unitario_imp_incluidosb!='' && errmonto_tot_imp_incluidosb!=''){
						
					/*if(m1_fuentec==value){
						console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
						document.getElementById("rowError3").style.display = 'block';
						cuenta_errorc=0;
						cuenta_error_finc = 1
						} else {
							console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
							document.getElementById("rowError3").style.display = 'block';
							cuenta_errorc=1;
							}*/
			if(suma_total_pest_hono==value){
				//console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				document.getElementById("rowError1_total").style.display = 'none';
				cuenta_errorc=0;
						cuenta_error_finc = 1
			} else {
				//console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				$(window).scrollTop(300);
				document.getElementById("rowError1_total").style.display = 'block';
				
					var obtsuma_A= document.formul.total_conceptos;
          			obtsuma_A.value=suma_total_pest_hono;

				cuenta_errorc=1;
			}
				       
		} else if(errconceptob!='' || errunidadb!='' || errcosto_unitario_imp_incluidosb!='' || errmonto_tot_imp_incluidosb!='') {
			console.log('Verifica tu captura ya que no tiene la información necesaria');
			document.getElementById("rowError3").style.display = 'block';
					
			cuenta_error_falta_inforc=1;
			}	
	} //fin for

	var cuenta_error_finc=0;

	for(var i=1; i<=1; i++){
		
		var errconceptob = document.getElementById('conceptob'+i).value;
		var errunidadb = document.getElementById('unidadb'+i).value;
		var errcosto_unitario_imp_incluidosb = document.getElementById('costo_unitario_imp_incluidosb'+i).value;
		var errmonto_tot_imp_incluidosb = document.getElementById('monto_tot_imp_incluidosb'+i).value;
		
		if(errconceptob=='' || errunidadb=='' || errcosto_unitario_imp_incluidosb=='' || errmonto_tot_imp_incluidosb==''){
			cuenta_error_finc = 1
			cuenta_errorc=1;
			console.log('debe ser 1 obligatorio')
		}
	}
}
///////////////////////////// FIN 3

///////////////////////////// INICIO 4
if(clave4!=''){
var m1_fuentec = document.getElementById('total_esp_mue_inmuec').value;

var cuenta_errord=0;
var cuenta_error_find=0;
var cuenta_error_falta_inford=0;
		
	for(var p=1; p<=30; p++){

		var errconceptoc = document.getElementById('conceptoc'+p).value;
		var errunidadc = document.getElementById('unidadc'+p).value;
		var errcosto_unitario_imp_incluidosc = document.getElementById('costo_unitario_imp_incluidosc'+p).value;
		var errmonto_tot_imp_incluidosc = document.getElementById('monto_tot_imp_incluidosc'+p).value;
			
		if(errconceptoc!='' && errunidadc!='' && errcosto_unitario_imp_incluidosc!='' && errmonto_tot_imp_incluidosc!=''){
						
					/*if(m1_fuentec==value){
						console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
						document.getElementById("rowError4").style.display = 'block';
						cuenta_errord=0;
						cuenta_error_find = 1
						} else {
							console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
							document.getElementById("rowError4").style.display = 'block';
							cuenta_errord=1;
							}*/
			if(suma_total_pest_hono==value){
				//console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				document.getElementById("rowError1_total").style.display = 'none';
				cuenta_errord=0;
				cuenta_error_find = 1
			} else {
				//console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				$(window).scrollTop(300);
				document.getElementById("rowError1_total").style.display = 'block';

					var obtsuma_A= document.formul.total_conceptos;
          			obtsuma_A.value=suma_total_pest_hono;

				cuenta_errord=1;
			}
				       
		} else if(errconceptoc!='' || errunidadc!='' || errcosto_unitario_imp_incluidosc!='' || errmonto_tot_imp_incluidosc!='') {
			console.log('Verifica tu captura ya que no tiene la información necesaria');
			document.getElementById("rowError4").style.display = 'block';
					
			cuenta_error_falta_inford=1;
			}	
	} //fin for

	var cuenta_error_find=0;

	for(var i=1; i<=1; i++){
		
		var errconceptoc = document.getElementById('conceptoc'+i).value;
		var errunidadc = document.getElementById('unidadc'+i).value;
		var errcosto_unitario_imp_incluidosc = document.getElementById('costo_unitario_imp_incluidosc'+i).value;
		var errmonto_tot_imp_incluidosc = document.getElementById('monto_tot_imp_incluidosc'+i).value;
		
		if(errconceptoc=='' || errunidadc=='' || errcosto_unitario_imp_incluidosc=='' || errmonto_tot_imp_incluidosc==''){
			cuenta_error_find = 1
			cuenta_errord=1;
			console.log('debe ser 1 obligatorio')
		}
	}
}
///////////////////////////// FIN 4

///////////////////////////// INICIO 5
if(clave5!=''){
var m1_fuente_5 = document.getElementById('total_esp_mue_inmued').value;

var cuenta_errore=0;
var cuenta_error_fine=0;
var cuenta_error_falta_infore=0;
		
	for(var p=1; p<=30; p++){

		var errnombre_participantes			 = document.getElementById('nombre_participantes'+p).value;
		var errorigen_destino_origen 	     = document.getElementById('origen_destino_origen'+p).value;
		var errmonto_tot_imp_incluidosd 	 = document.getElementById('monto_tot_imp_incluidosd'+p).value;
			
		if(errnombre_participantes!='' && errorigen_destino_origen!='' && errmonto_tot_imp_incluidosd!=''){
						
					/*if(m1_fuente_5==value){
						console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
						document.getElementById("rowError5").style.display = 'block';
						cuenta_errore=0;
						cuenta_error_fine = 1
						} else {
							console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
							document.getElementById("rowError5").style.display = 'block';
							cuenta_errore=1;
							}*/

			if(suma_total_pest_hono==value){
				//console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				document.getElementById("rowError1_total").style.display = 'none';
				cuenta_errore=0;
						cuenta_error_fine = 1
			} else {
				//console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				$(window).scrollTop(300);
				document.getElementById("rowError1_total").style.display = 'block';

					var obtsuma_A= document.formul.total_conceptos;
          			obtsuma_A.value=suma_total_pest_hono;

				cuenta_errore=1;
			}
				       
		} else if(errnombre_participantes!='' || errorigen_destino_origen!='' || errmonto_tot_imp_incluidosd!='') {
			console.log('Verifica tu captura ya que no tiene la información necesaria');
			document.getElementById("rowError5").style.display = 'block';
					
			cuenta_error_falta_infore=1;
			}	
	} //fin for

	var cuenta_error_fine=0;

	for(var i=1; i<=1; i++){

		var errnombre_participantes_val	 = document.getElementById('nombre_participantes'+i).value;
		var errorigen_destino_origen_val	 = document.getElementById('origen_destino_origen'+i).value;
		var errmonto_tot_imp_incluidosd_val	 = document.getElementById('monto_tot_imp_incluidosd'+i).value;
		
		if(errnombre_participantes_val=='' || errorigen_destino_origen_val=='' || errmonto_tot_imp_incluidosd_val==''){
			cuenta_error_fine = 1
			cuenta_errore=1;
			console.log('debe ser 1 obligatorio')
		}
	}
}
///////////////////////////// FIN 5

///////////////////////////// INICIO 6
if(clave6!=''){
var m1_fuente_6 = document.getElementById('total_esp_mue_inmuee').value;

var cuenta_errorf=0;
var cuenta_error_finf=0;
var cuenta_error_falta_inforf=0;
		
	for(var p=1; p<=30; p++){

		var errconceptoe     = document.getElementById('conceptoe'+p).value;
		var errunidade 	     = document.getElementById('unidade'+p).value;
		var errcosto_unitario_imp_incluidose = document.getElementById('costo_unitario_imp_incluidose'+p).value;
		var errmonto_tot_imp_incluidos_dos = document.getElementById('monto_tot_imp_incluidos_dos'+p).value;
			
		if(errconceptoe!='' && errunidade!='' && errcosto_unitario_imp_incluidose!='' && errmonto_tot_imp_incluidos_dos!=''){
						
					/*if(m1_fuente_6==value){
						console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
						document.getElementById("rowError6").style.display = 'block';
						cuenta_errorf=0;
						cuenta_error_finf = 1
						} else {
							console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
							document.getElementById("rowError6").style.display = 'block';
							cuenta_errorf=1;
							}*/
			if(suma_total_pest_hono==value){
				//console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				document.getElementById("rowError1_total").style.display = 'none';
				cuenta_errorf=0;
						cuenta_error_finf = 1
			} else {
				//console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				$(window).scrollTop(300);
				document.getElementById("rowError1_total").style.display = 'block';

					var obtsuma_A= document.formul.total_conceptos;
          			obtsuma_A.value=suma_total_pest_hono;

				cuenta_errorf=1;
			}
				       
		} else if(errconceptoe!='' || errunidade!='' || errcosto_unitario_imp_incluidose!='' || errmonto_tot_imp_incluidos_dos!='') {
			console.log('Verifica tu captura ya que no tiene la información necesaria');
			document.getElementById("rowError6").style.display = 'block';
					
			cuenta_error_falta_inforf=1;
			}	
	} //fin for

	var cuenta_error_finf=0;

	for(var i=1; i<=1; i++){

		var errconceptoe	 = document.getElementById('conceptoe'+i).value;
		var errunidade	 = document.getElementById('unidade'+i).value;
		var errcosto_unitario_imp_incluidose	 = document.getElementById('costo_unitario_imp_incluidose'+i).value;
		var errmonto_tot_imp_incluidos_dos	 = document.getElementById('monto_tot_imp_incluidos_dos'+i).value;
		
		if(errconceptoe=='' || errunidade=='' || errcosto_unitario_imp_incluidose=='' || errmonto_tot_imp_incluidos_dos==''){
			cuenta_error_finf = 1
			cuenta_errorf=1;
			console.log('debe ser 1 obligatorio')
		}
	}
}
///////////////////////////// FIN 6

///////////////////////////// INICIO 7
if(clave7!=''){
var m1_fuente_7 = document.getElementById('total_esp_mue_inmueg').value;

var cuenta_errorg=0;
var cuenta_error_fing=0;
var cuenta_error_falta_inforg=0;
		
	for(var p=1; p<=30; p++){

		var errconceptog     = document.getElementById('conceptog'+p).value;
		var errunidadg 	     = document.getElementById('unidadg'+p).value;
		var errcosto_unitario_imp_incluidosg = document.getElementById('costo_unitario_imp_incluidosg'+p).value;
		var errmonto_tot_imp_incluidosg = document.getElementById('monto_tot_imp_incluidosg'+p).value;
			
		if(errconceptog!='' && errunidadg!='' && errcosto_unitario_imp_incluidosg!='' && errmonto_tot_imp_incluidosg!=''){
						
					/*if(m1_fuente_7==value){
						console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
						document.getElementById("rowError7").style.display = 'block';
						cuenta_errorg=0;
						cuenta_error_fing = 1
						} else {
							console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
							document.getElementById("rowError7").style.display = 'block';
							cuenta_errorg=1;
							}*/
			if(suma_total_pest_hono==value){
				//console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				document.getElementById("rowError1_total").style.display = 'none';
				cuenta_errorg=0;
				cuenta_error_fing = 1
			} else {
				//console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				$(window).scrollTop(300);
				document.getElementById("rowError1_total").style.display = 'block';

					var obtsuma_A= document.formul.total_conceptos;
          			obtsuma_A.value=suma_total_pest_hono;

				cuenta_errorg=1;
			}
				       
		} else if(errconceptog!='' || errunidadg!='' || errcosto_unitario_imp_incluidosg!='' || errmonto_tot_imp_incluidosg!='') {
			console.log('Verifica tu captura ya que no tiene la información necesaria');
			document.getElementById("rowError7").style.display = 'block';
					
			cuenta_error_falta_inforg=1;
			}	
	} //fin for

	var cuenta_error_fing=0;

	for(var i=1; i<=1; i++){

		var errconceptog	 = document.getElementById('conceptog'+i).value;
		var errunidadg	 = document.getElementById('unidadg'+i).value;
		var errcosto_unitario_imp_incluidosg	 = document.getElementById('costo_unitario_imp_incluidosg'+i).value;
		var errmonto_tot_imp_incluidosg	 = document.getElementById('monto_tot_imp_incluidosg'+i).value;
		
		if(errconceptog=='' || errunidadg=='' || errcosto_unitario_imp_incluidosg=='' || errmonto_tot_imp_incluidosg==''){
			cuenta_error_fing = 1
			cuenta_errorg=1;
			console.log('deben ser 1 obligatorios')
		}
	}
}
///////////////////////////// FIN 7

///////////////////////////// INICIO 9
if(clave9!=''){
var m1_fuente_9 = document.getElementById('total_esp_mue_inmue_z').value;

var cuenta_errorz=0;
var cuenta_error_finz=0;
var cuenta_error_falta_inforz=0;
		
	for(var p=1; p<=30; p++){

		var errconceptoz     = document.getElementById('conceptoz'+p).value;
		var errunidadz 	     = document.getElementById('unidadz'+p).value;
		var errcosto_unitario_imp_incluidosz = document.getElementById('costo_unitario_imp_incluidosz'+p).value;
		var errmonto_tot_imp_incluidosz = document.getElementById('monto_tot_imp_incluidosz'+p).value;

		if(errconceptoz!='' && errunidadz!='' && errcosto_unitario_imp_incluidosz!='' && errmonto_tot_imp_incluidosz!=''){
						
					/*if(m1_fuente_9==value){
						console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
						document.getElementById("rowError9").style.display = 'block';
						cuenta_errorz=0;
						cuenta_error_finz = 1
						} else {
							console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
							document.getElementById("rowError9").style.display = 'block';
							cuenta_errorz=1;
							}*/
			if(suma_total_pest_hono==value){
				//console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				document.getElementById("rowError1_total").style.display = 'none';
				cuenta_errorz=0;
				cuenta_error_finz = 1
			} else {
				//console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
				$(window).scrollTop(300);
				document.getElementById("rowError1_total").style.display = 'block';

					var obtsuma_A= document.formul.total_conceptos;
          			obtsuma_A.value=suma_total_pest_hono;

				cuenta_errorz=1;
			}
				       
		} else if(errconceptoz!='' || errunidadz!='' || errcosto_unitario_imp_incluidosz!='' || errmonto_tot_imp_incluidosz!='') {
			console.log('Verifica tu captura ya que no tiene la información necesaria');
			document.getElementById("rowError9").style.display = 'block';
					
			cuenta_error_falta_inforz=1;
			}	
	} //fin for

	var cuenta_error_finz=0;

	for(var i=1; i<=1; i++){

		var errconceptoz	 = document.getElementById('conceptoz'+i).value;
		var errunidadz	 = document.getElementById('unidadz'+i).value;
		var errcosto_unitario_imp_incluidosz	 = document.getElementById('costo_unitario_imp_incluidosz'+i).value;
		var errmonto_tot_imp_incluidosz	 = document.getElementById('monto_tot_imp_incluidosz'+i).value;

		if(errconceptoz=='' || errunidadz=='' || errcosto_unitario_imp_incluidosz=='' || errmonto_tot_imp_incluidosz==''){
			cuenta_error_finz = 1
			cuenta_errorz=1;
			console.log('deben ser 1 obligatorios')
		}
	}
}
///////////////////////////// FIN 9

 var cuenta_error_totales=0;

 	//1
 	//console.log(clave1);

 	if(clave1!=''){
	var btnEnvio = document.getElementById('submit_total');

	console.log(cuenta_errora)

		if(cuenta_errora == 0 && cuenta_error_fina == 0 && cuenta_error_falta_infora==0){	
			//console.log('SI se puede guardar');
			//window.document.formul.submit();
			document.getElementById("rowBien1").style.display = 'block';
			document.getElementById("rowError1").style.display = 'none';
			$(window).scrollTop(300);
	 	} else {
			//console.log('error en la captura');
			document.getElementById("rowError1").style.display = 'block';
			document.getElementById("rowBien1").style.display = 'none';
			$(window).scrollTop(300);
			cuenta_error_totales=1;	
		}
	}
	//2
	if(clave2!=''){
		if(cuenta_errorb == 0 && cuenta_error_finb == 0 && cuenta_error_falta_inforb==0){	
			//console.log('SI se puede guardar');
			//window.document.formula.submit();
			document.getElementById("rowBien2").style.display = 'block';
			document.getElementById("rowError2").style.display = 'none';
			$(window).scrollTop(300);
	 	} else {
			//console.log('error en la captura');
			document.getElementById("rowError2").style.display = 'block';
			document.getElementById("rowBien2").style.display = 'none';
			$(window).scrollTop(300);	
			cuenta_error_totales=1;
			}
	}
	//3
	if(clave3!=''){
		if(cuenta_errorc == 0 && cuenta_error_finc == 0 && cuenta_error_falta_inforc==0){	
			//console.log('SI se puede guardar');
			//window.document.formulb.submit();
			document.getElementById("rowBien3").style.display = 'block';
			document.getElementById("rowError3").style.display = 'none';
			$(window).scrollTop(300);
	 	} else {
			//console.log('error en la captura');
			document.getElementById("rowError3").style.display = 'block';
			document.getElementById("rowBien3").style.display = 'none';
			$(window).scrollTop(300);
			cuenta_error_totales=1;	
			}	
	}
	//4
	if(clave4!=''){
		if(cuenta_errord == 0 && cuenta_error_find == 0 && cuenta_error_falta_inford==0){	
			//console.log('SI se puede guardar');
			//window.document.formulb.submit();
			document.getElementById("rowBien4").style.display = 'block';
			document.getElementById("rowError4").style.display = 'none';
			$(window).scrollTop(300);
	 	} else {
			//console.log('error en la captura');
			document.getElementById("rowError4").style.display = 'block';
			document.getElementById("rowBien4").style.display = 'none';
			$(window).scrollTop(300);
			cuenta_error_totales=1;	
			}	
	}
	//5
	if(clave5!=''){
		if(cuenta_errore == 0 && cuenta_error_fine == 0 && cuenta_error_falta_infore==0){	
			//console.log('SI se puede guardar');
			//window.document.formulb.submit();
			document.getElementById("rowBien5").style.display = 'block';
			document.getElementById("rowError5").style.display = 'none';
			$(window).scrollTop(300);
	 	} else {
			//console.log('error en la captura');
			document.getElementById("rowError5").style.display = 'block';
			document.getElementById("rowBien5").style.display = 'none';
			$(window).scrollTop(300);
			cuenta_error_totales=1;	
			}
	}
	//6
	if(clave6!=''){
		if(cuenta_errorf == 0 && cuenta_error_finf == 0 && cuenta_error_falta_inforf==0){	
			//console.log('SI se puede guardar');
			//window.document.formulb.submit();
			document.getElementById("rowBien6").style.display = 'block';
			document.getElementById("rowError6").style.display = 'none';
			$(window).scrollTop(300);
	 	} else {
			//console.log('error en la captura');
			document.getElementById("rowError6").style.display = 'block';
			document.getElementById("rowBien6").style.display = 'none';
			$(window).scrollTop(300);
			cuenta_error_totales=1;	
			}	
	}
	//7
	if(clave7!=''){
		if(cuenta_errorg == 0 && cuenta_error_fing == 0 && cuenta_error_falta_inforg==0){	
			//console.log('SI se puede guardar');
			//window.document.formulb.submit();
			document.getElementById("rowBien7").style.display = 'block';
			document.getElementById("rowError7").style.display = 'none';
			$(window).scrollTop(300);
	 	} else {
			//console.log('error en la captura');
			document.getElementById("rowError7").style.display = 'block';
			document.getElementById("rowBien7").style.display = 'none';
			$(window).scrollTop(300);
			cuenta_error_totales=1;	
			}
	}
	//9
	if(clave9!=''){
		if(cuenta_errorz == 0 && cuenta_error_finz == 0 && cuenta_error_falta_inforz==0){	
			console.log('SI se puede guardar');
			//window.document.formulb.submit();
			document.getElementById("rowBien9").style.display = 'block';
			document.getElementById("rowError9").style.display = 'none';
			$(window).scrollTop(300);
	 	} else {
			//console.log('error en la captura');
			document.getElementById("rowError9").style.display = 'block';
			document.getElementById("rowBien9").style.display = 'none';
			$(window).scrollTop(300);
			cuenta_error_totales=1;	
			}
	}
	
	/// INICIO TOTAL DE PESTAÑAS	
	if(cuenta_error_totales==0){	
		console.log('SI se puede guardar');
		window.document.formul.submit();		
 	} else {
		console.log('error en la captura');
		$(window).scrollTop(300);
		cuenta_error_totales=1;	
		}
	/// FIN TOTAL DE PESTAÑAS	
}
