function validarEnvio_presup(Infor_finan_costo_monto, Infor_finan_apoyo_monto){

var Infor_finan_costo_monto = Infor_finan_costo_monto
var m1_fuente = Infor_finan_costo_monto
var Infor_finan_apoyo_monto = Infor_finan_apoyo_monto
var m2_fuente = Infor_finan_apoyo_monto	

//console.log('ENTRO');

var cuenta_error=0;
var cuenta_error_fin=0;
var cuenta_error_falta_infor = 0
var cuenta_error_profest = 0;
var sumaT=0;		

for(var p=1; p<=50; p++){

	var errConcepto_gasto = document.getElementById('Concepto_gasto'+p).value;
	var errFuente_finan = document.getElementById('Fuente_finan'+p).value;
	var errMonto_unidad = document.getElementById('Monto_unidad'+p).value;
	var errPorcentaje = document.getElementById('Porcentaje'+p).value;

	if(errConcepto_gasto!='' && errFuente_finan!='' && errMonto_unidad!='' && errPorcentaje!=''){
				var fuente_finan_nombre = 'Fuente_finan'+p;
				var fuente_finan = document.getElementById(fuente_finan_nombre).value;
				var Monto_unidad_nombre = 'Monto_unidad'+p;
				var calcula_monto_profest_sin = document.getElementById(Monto_unidad_nombre).value;
				if(calcula_monto_profest_sin.length==0 ){ 
					calcula_monto_profest = 0 
				} else { 
					calcula_monto_profest = parseFloat(calcula_monto_profest_sin.replace(/[$,\s]/g, ''));
				}
				if(fuente_finan == "3"){
					
				sumaT=sumaT+calcula_monto_profest;
				
				}        
	} //fin if
	else if(errConcepto_gasto!='' || errFuente_finan!='' || errMonto_unidad!='' || errPorcentaje!='') {
		alert ('Verifica tu captura ya que no tiene la información necesaria');
		document.getElementById("rowError").style.display = 'block';
		cuenta_error_falta_infor=1;
		}	
} //fin for

//console.log(sumaT)
	if(sumaT!=m2_fuente){
		//console.log("entro aqui")

		alert ("Verifica los montos ingresados para la fuente de financiamiento Institucional PROFEST");
		document.getElementById("rowError").style.display = 'block';
		cuenta_error_profest=1;
	}

var cuenta_error_fin=0;

for(var i=1; i<=3; i++){
	
	var errConcepto_gasto = document.getElementById('Concepto_gasto'+i).value;
	var errFuente_finan = document.getElementById('Fuente_finan'+i).value;
	var errMonto_unidad = document.getElementById('Monto_unidad'+i).value;
	var errPorcentaje = document.getElementById('Porcentaje'+i).value;
	
	if(errConcepto_gasto=='' || errFuente_finan=='' || errMonto_unidad=='' || errPorcentaje==''){
		cuenta_error_fin = 1
	}
}
//FIN PRESUPUESTO se valido que los campos sean correctos

//INICIO PRESUPUESTO VALIDAR porcentaje total
var pres_anual_tot_2010 = document.getElementById('pres_anual_tot_2010').value;
var ene_suma = document.getElementById('textod').value;
	
	//console.log(ene_suma);	
	//console.log(pres_anual_tot_2010);	
	//console.log(m1_fuente);	
	
	if(Math.round(ene_suma)==100  &&  pres_anual_tot_2010 == m1_fuente ){
		console.log('ya son el 100%');
		cuenta_error=0;
	} else {
		console.log('aun no son 100%');
		cuenta_error=1;
		}
//FIN PRESUPUESTO VALIDAR porcentaje total
//console.log(cuenta_error);
/*console.log(cuenta_error_fin);
console.log(cuenta_error_falta_infor);*/


	/* Boton de Envío */


	var btnEnvio = document.getElementById('submit1');
	if(cuenta_error == 0 && cuenta_error_fin == 0 && cuenta_error_falta_infor==0 && cuenta_error_profest==0){	
		//console.log('SI se puede guardar');
		window.document.apInf.submit();
 	} else {
		//console.log('error en la captura');
		document.getElementById("rowError").style.display = 'block';
		
		}
}