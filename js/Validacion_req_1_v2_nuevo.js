// JavaScript Document
function validarEnvio_presup1(total_proyecto){

var value=$('#total_proyecto').val();

////////////////////////////// INICIO 1

var m1_fuente = document.getElementById('total_esp_mue_inmue').value;
var total_esp_mue_inmue = document.getElementById('total_esp_mue_inmue').value;

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
					
				if(m1_fuente==value){
					console.log('Los montos ingresados son iguales al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
					document.getElementById("rowError1").style.display = 'block';
					cuenta_errora=0;
					cuenta_error_fina = 1
					} else {
						console.log('Los montos "No son iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
						document.getElementById("rowError1").style.display = 'block';
						cuenta_errora=1;
						}
			       
	} else if(errconcepto!='' || errunidad!='' || errdias_a_utilizar!='' || errcosto_unitario_imp_incluidos!='' || errmonto_tot_imp_incluidos!='') {
		console.log('Verifica tu captura ya que no tiene la información necesaria');
		document.getElementById("rowError1").style.display = 'block';
				
		cuenta_error_falta_infora=1;
		}	
} //fin for

var cuenta_error_fina=0;

for(var i=1; i<=3; i++){
	
	var errconcepto = document.getElementById('concepto'+i).value;
	var errunidad = document.getElementById('unidad'+i).value;
	var errdias_a_utilizar = document.getElementById('dias_a_utilizar'+i).value;
	var errcosto_unitario_imp_incluidos = document.getElementById('costo_unitario_imp_incluidos'+i).value;
	var errmonto_tot_imp_incluidos = document.getElementById('monto_tot_imp_incluidos'+i).value;
	
	if(errconcepto=='' || errunidad=='' || errdias_a_utilizar=='' || errcosto_unitario_imp_incluidos=='' || errmonto_tot_imp_incluidos==''){
		cuenta_error_fina = 1
		cuenta_errora=1;
		console.log('deben ser 3 obligatorios')
	}
}
////////////////////////////// FIN 1

 var cuenta_error_totales=0;

	//1
	var btnEnvio = document.getElementById('submit_total');
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

	/// INICIO TOTAL DE PESTAÑAS	
	if(cuenta_error_totales===0){	
		console.log('SI se puede guardar');
		
		//window.document.formul.submit();
		for(var i=1; i<=30; i++){
	
			var id = document.getElementById('id'+i).value;
			var errconcepto = document.getElementById('concepto'+i).value;
			var errunidad = document.getElementById('unidad'+i).value;
			var errdias_a_utilizar = document.getElementById('dias_a_utilizar'+i).value;
			var errcosto_unitario_imp_incluidos = document.getElementById('costo_unitario_imp_incluidos'+i).value;
			var errmonto_tot_imp_incluidos = document.getElementById('monto_tot_imp_incluidos'+i).value;
			var total_esp_mue_inmue = document.getElementById('total_esp_mue_inmue').value;

			console.log(errconcepto);

			if(errconcepto!='' && errunidad!='' && errdias_a_utilizar!='' && errcosto_unitario_imp_incluidos!='' && errmonto_tot_imp_incluidos!=''){
				var url_obj_gen='guardar_1_v2_formatos.php?id='+id+'cuantos='+i+'&concepto='+errconcepto+'&unidad='+errunidad+'&dias_a_utilizar='+errdias_a_utilizar+'&costo_unitario_imp_incluidos='+errcosto_unitario_imp_incluidos+'&monto_tot_imp_incluidos='+errmonto_tot_imp_incluidos+'&total_esp_mue_inmue='+total_esp_mue_inmue;
			
			console.log(url_obj_gen)

			hacerPeticion(url_obj_gen);
			}
			
		}
	
		

 	} else {
		//console.log('error en la captura');
		$(window).scrollTop(300);
		cuenta_error_totales=1;	
		}
	/// FIN TOTAL DE PESTAÑAS	
}
