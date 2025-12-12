// JavaScript Document
function validarEnvio_honorarios(total_proyecto){

var value=$('#total_proyecto').val();

////////////////////////////// INICIO 1
var m1_fuente = document.getElementById('total_apoyo_suma').value;
var apoyo_general = document.getElementById('apoyo_general_paso').value;
var tipo_elegidos = document.getElementById('tipo_elegidos').value;

var cuenta_errora=0;
var cuenta_error_fina=0;
var cuenta_error_falta_infora=0;
		
for(var p=1; p<=150; p++){
	//input
	var errnombre_artista_grupo = document.getElementById('nombre_artista_grupo__'+p).value;
	var estado_origen_artista_grupo = document.getElementById('estado_origen_artista_grupo__'+p).value;
	var mun_origen_artista_grupo = document.getElementById('municipio_origen_artista_grupo__'+p).value;
	var num_tel_artista_grupo = document.getElementById('num_telefonico_artista_grupo__'+p).value;
	var email_artista_grupo = document.getElementById('correo_electronico_artista_grupo__'+p).value;
	var reconoc_import_art_grupo = document.getElementById('reconocimientos_importantes_artista_grupo__'+p).value;
	var paginaweb_redessoc_artista_grupo = document.getElementById('paginaweb_redessociales_artista_grupo__'+p).value;
	var anio_experiencia_comprobables = document.getElementById('anio_experiencia_comprobables__'+p).value;
	var nombre_rep_fis_artista_grupo = document.getElementById('nombre_representante_fiscal_artista_grupo__'+p).value;
	var num_tel_rep_fis_artista_grupo = document.getElementById('num_telefonico_representante_fiscal_artista_grupo__'+p).value;
	var email_rep_fis_artista_grupo = document.getElementById('correo_electronico_representante_fiscal_artista_grupo__'+p).value;
	var nombre_presentacion = document.getElementById('nombre_presentacion__'+p).value;
	var fecha_presentacion = document.getElementById('fecha_presentacion__'+p).value;
	var horario = document.getElementById('horario__'+p).value;
	var num_par_por_grupo = document.getElementById('num_participantes_por_grupo__'+p).value;
	var num_Mujeres = document.getElementById('num_Mujeres__'+p).value;
	var num_Hombres = document.getElementById('num_Hombres__'+p).value;
	var duracion_espec_prop = document.getElementById('duracion_espectaculo_propuesto__'+p).value;
	var nombre_foro = document.getElementById('nombre_foro__'+p).value;
	var estado_foro = document.getElementById('estado_foro__'+p).value;
	var mun_alcaldia_foro = document.getElementById('municipio_alcaldia_foro__'+p).value;
	var localidad_foro = document.getElementById('localidad_foro__'+p).value;
	var publico_dir_prop_art = document.getElementById('publico_va_dirigida_propuesta_artistica__'+p).value;
	var impacto_socio_cultural_esp = document.getElementById('impacto_socio_cultural_espectaculo__'+p).value;
	var sinopsis = document.getElementById('sinopsis__'+p).value;
	var links_mat_videograf_prop = document.getElementById('links_material_videografico_propuesta__'+p).value;
	var monto_honorarios_imp_inc_mn = document.getElementById('monto_honorarios_con_impuestos_incluidos_mn__'+p).value;
	
	//select
	var artista_cuenta_con_CFDI = document.getElementById('artista_cuenta_con_CFDI__'+p).value;
	var alcance_Artista = document.getElementById('alcance_Artista__'+p).value;
	var rep_fis_cuenta_con_CFDI = document.getElementById('representante_fiscal_cuenta_con_CFDI__'+p).value;
	var espacio_requerido = document.getElementById('espacio_requerido__'+p).value;
	var cuenta_actualmente_con_apoyo_FONCA = document.getElementById('cuenta_actualmente_con_apoyo_FONCA__'+p).value;
	var confirmado_tentativo = document.getElementById('confirmado_tentativo__'+p).value;
	var disciplina = document.getElementById('disciplina__'+p).value;
	var categoria = document.getElementById('categoria__'+p).value;
	

	if(errnombre_artista_grupo!='' &&  estado_origen_artista_grupo!='' &&  mun_origen_artista_grupo!='' &&  num_tel_artista_grupo!='' &&  email_artista_grupo!='' &&  reconoc_import_art_grupo!='' &&  paginaweb_redessoc_artista_grupo!='' &&  
alcance_Artista!='' &&  anio_experiencia_comprobables!='' &&  nombre_rep_fis_artista_grupo!='' &&  num_tel_rep_fis_artista_grupo!='' &&  email_rep_fis_artista_grupo!='' &&  nombre_presentacion!='' &&  
fecha_presentacion!='' &&  horario!='' &&  num_par_por_grupo!='' && num_Mujeres!='' &&  num_Hombres!='' &&  duracion_espec_prop!='' &&  nombre_foro!='' &&  estado_foro!='' &&  mun_alcaldia_foro!='' &&  
localidad_foro!='' &&  publico_dir_prop_art!='' &&  impacto_socio_cultural_esp!='' &&  sinopsis!='' &&  links_mat_videograf_prop!='' &&  monto_honorarios_imp_inc_mn!='' &&
confirmado_tentativo!='' && disciplina!='' && categoria!='' && artista_cuenta_con_CFDI!='' && rep_fis_cuenta_con_CFDI!='' && espacio_requerido!='' && cuenta_actualmente_con_apoyo_FONCA!=''){

		if(tipo_elegidos>1){
			var apoyo_general_op = parseFloat(apoyo_general.replace(/[$,\s]/g, ''));

			var suma_todo =  parseFloat(m1_fuente.replace(/[$,\s]/g, '')) + apoyo_general_op;
		} else {
			var suma_todo =  parseFloat(m1_fuente.replace(/[$,\s]/g, ''));
		}

		/*console.log(m1_fuente);
		console.log(value);
		console.log(suma_todo);*/

		if(suma_todo<=value){
			console.log('Los montos ingresados son menores o igual al monto de apoyo financiero solicitado a la Secretaría de Cultura.');
			document.getElementById("rowError1").style.display = 'none';
			cuenta_errora=0;
			cuenta_error_fina = 1
		} else {
			console.log('Los montos "No son menores o iguales" ingresados deben sumar lo mismo que el monto de apoyo financiero solicitado a la Secretaría de Cultura.');
			document.getElementById("rowError2").style.display = 'block';
		
			cuenta_errora=1;
		}	       
	} else if(errnombre_artista_grupo!='' || estado_origen_artista_grupo!='' || mun_origen_artista_grupo!='' || num_tel_artista_grupo!='' || email_artista_grupo!='' || reconoc_import_art_grupo!='' ||  paginaweb_redessoc_artista_grupo!='' ||  
alcance_Artista!='' || anio_experiencia_comprobables!='' || nombre_rep_fis_artista_grupo!='' || num_tel_rep_fis_artista_grupo!='' || email_rep_fis_artista_grupo!='' || nombre_presentacion!='' ||  
fecha_presentacion!='' || horario!='' || num_par_por_grupo!='' || num_Mujeres!='' || num_Hombres!='' || duracion_espec_prop!='' || nombre_foro!='' || estado_foro!='' || mun_alcaldia_foro!='' ||  
localidad_foro!='' || publico_dir_prop_art!='' || impacto_socio_cultural_esp!='' || sinopsis!='' || links_mat_videograf_prop!='' || monto_honorarios_imp_inc_mn!='' || 
confirmado_tentativo!='' || disciplina!='' || categoria!='' || artista_cuenta_con_CFDI!='' || rep_fis_cuenta_con_CFDI!='' || espacio_requerido!=''|| cuenta_actualmente_con_apoyo_FONCA!='') {
		//console.log('Verifica tu captura ya que no tiene la información necesaria');
		document.getElementById("rowError1").style.display = 'block';
		cuenta_error_falta_infora=1;
		$(window).scrollTop(300);
	}	
} //fin for

var cuenta_error_fina=0;

for(var i=1; i<=1; i++){
	
	var errnombre_artista_grupo = document.getElementById('nombre_artista_grupo'+i).value;
	var estado_origen_artista_grupo = document.getElementById('estado_origen_artista_grupo'+i).value;
	var mun_origen_artista_grupo = document.getElementById('mun_origen_artista_grupo'+i).value;
	var num_tel_artista_grupo = document.getElementById('num_tel_artista_grupo'+i).value;
	var email_artista_grupo = document.getElementById('email_artista_grupo'+i).value;
	var reconoc_import_art_grupo = document.getElementById('reconoc_import_art_grupo'+i).value;
	var paginaweb_redessoc_artista_grupo = document.getElementById('paginaweb_redessoc_artista_grupo'+i).value;
	var anio_experiencia_comprobables = document.getElementById('anio_experiencia_comprobables'+i).value;
	var nombre_rep_fis_artista_grupo = document.getElementById('nombre_rep_fis_artista_grupo'+i).value;
	var num_tel_rep_fis_artista_grupo = document.getElementById('num_tel_rep_fis_artista_grupo'+i).value;
	var email_rep_fis_artista_grupo = document.getElementById('email_rep_fis_artista_grupo'+i).value;
	var nombre_presentacion = document.getElementById('nombre_presentacion'+i).value;
	var fecha_presentacion = document.getElementById('fecha_presentacion'+i).value;
	var horario = document.getElementById('horario'+i).value;
	var num_par_por_grupo = document.getElementById('num_par_por_grupo'+i).value;
	var num_Mujeres = document.getElementById('num_Mujeres'+i).value;
	var num_Hombres = document.getElementById('num_Hombres'+i).value;
	var duracion_espec_prop = document.getElementById('duracion_espec_prop'+i).value;
	var nombre_foro = document.getElementById('nombre_foro'+i).value;
	var estado_foro = document.getElementById('estado_foro'+i).value;
	var mun_alcaldia_foro = document.getElementById('mun_alcaldia_foro'+i).value;
	var localidad_foro = document.getElementById('localidad_foro'+i).value;
	var publico_dir_prop_art = document.getElementById('publico_dir_prop_art'+i).value;
	var impacto_socio_cultural_esp = document.getElementById('impacto_socio_cultural_esp'+i).value;
	var sinopsis = document.getElementById('sinopsis'+i).value;
	var links_mat_videograf_prop = document.getElementById('links_mat_videograf_prop'+i).value;
	var monto_honorarios_imp_inc_mn = document.getElementById('monto_honorarios_imp_inc_mn'+i).value;

	var confirmado_tentativo = document.getElementById('confirmado_tentativo'+i).value;
	var disciplina = document.getElementById('disciplina'+i).value;
	var categoria = document.getElementById('categoria'+i).value;
	var artista_cuenta_con_CFDI = document.getElementById('artista_cuenta_con_CFDI'+i).value;
	var rep_fis_cuenta_con_CFDI = document.getElementById('rep_fis_cuenta_con_CFDI'+i).value;
	var espacio_requerido = document.getElementById('espacio_requerido'+i).value;
	var cuenta_actualmente_con_apoyo_FONCA = document.getElementById('cuenta_actualmente_con_apoyo_FONCA'+i).value;
	var alcance_Artista = document.getElementById('alcance_Artista'+i).value;

	if(errnombre_artista_grupo=='' || estado_origen_artista_grupo=='' || mun_origen_artista_grupo=='' || num_tel_artista_grupo=='' || email_artista_grupo=='' || reconoc_import_art_grupo=='' || paginaweb_redessoc_artista_grupo=='' || 
alcance_Artista=='' || anio_experiencia_comprobables=='' || nombre_rep_fis_artista_grupo=='' || num_tel_rep_fis_artista_grupo=='' || email_rep_fis_artista_grupo=='' || nombre_presentacion=='' || 
fecha_presentacion=='' || horario=='' || num_par_por_grupo=='' || num_Mujeres=='' || num_Hombres=='' || duracion_espec_prop=='' || nombre_foro=='' || estado_foro=='' || mun_alcaldia_foro=='' || 
localidad_foro=='' || publico_dir_prop_art=='' || impacto_socio_cultural_esp=='' || sinopsis=='' || links_mat_videograf_prop=='' || monto_honorarios_imp_inc_mn=='' || confirmado_tentativo=='' || 
disciplina=='' || categoria=='' || artista_cuenta_con_CFDI=='' || rep_fis_cuenta_con_CFDI=='' || espacio_requerido=='' || cuenta_actualmente_con_apoyo_FONCA==''){
		cuenta_error_fina = 1
		cuenta_errora=1;
		//console.log('deben ser 1 obligatorios')
	}
}
////////////////////////////// FIN 1
	
 var cuenta_error_totales=0;

	//1
	if(cuenta_errora == 0 && cuenta_error_fina == 0 && cuenta_error_falta_infora==0){	
		console.log('SI se puede guardar');
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
	if(cuenta_error_totales==0){	
		//console.log('SI se puede guardar');
		window.document.formul.submit();		
 	} else {
		//console.log('error en la captura');
		$(window).scrollTop(300);
		cuenta_error_totales=1;	
		}
	/// FIN TOTAL DE PESTAÑAS	
}
