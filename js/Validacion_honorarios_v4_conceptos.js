// JavaScript Document
function validarEnvio_conceptos(){

var cuenta_error_totales=0;
var todoscampos = document.querySelectorAll(".honoconceptos");

var apoyo_fin_sol_sc = document.getElementById('apoyo_fin_sol_sc').value; //Solicitado a la SC
var sumhono = document.getElementById('sumhono').value; //Honorarios
var suma_pestanas = document.getElementById('suma_pestanas').value; //Suma pestañas

/*console.log(`Solicitado a la SC: ${apoyo_fin_sol_sc}`)
console.log(`Honorarios: ${sumhono}`)
console.log(`Suma pestañas: ${suma_pestanas}`)*/

      todoscampos.forEach((h)=>{  
      
      var nombre_campo = h.name;
	  var porciones = nombre_campo.split('__');
                
            var nombre_x = porciones[1];
            var nombre_y = porciones[2];
            
      if(h.value=='' && !nombre_x=='' && !nombre_y==''){
        console.log(`campo vacio: ${nombre_campo}`)
		document.getElementById(nombre_campo).style.borderColor="#D0021B";
      	cuenta_error_totales+=1; 
      } else {
      	console.log(`campo lleno: ${porciones[0]}`)
      	cuenta_error_totales==0;
      }
    })
	//console.log(`errores: ${cuenta_error_totales}`)
    /// INICIO TOTAL DE PESTAÑAS
	if(cuenta_error_totales==0){
	var sumando_1er_2da_montos = parseFloat(suma_pestanas) + parseFloat(sumhono);

		if(sumando_1er_2da_montos==apoyo_fin_sol_sc){
		console.log('SI se puede guardar');
		window.document.formul.submit();	
		} else {
			$(window).scrollTop(300);
			document.getElementById("suma_pestanas").style.borderColor="#D0021B";
            document.getElementById("sumhono").style.borderColor="#D0021B";
            document.getElementById("total_2").style.borderColor="#D0021B";
			document.getElementById("errmayormontoSC").style.display = 'block';
		}	
 	} else {
		console.log('error en la captura');
		$(window).scrollTop(300);
		document.getElementById("errmayormontoSC").style.display = 'block';
		document.getElementById("rowBien1").style.display = 'none';
		cuenta_error_totales=1;
		}
	/// FIN TOTAL DE PESTAÑAS

/*var value=$('#total_proyecto').val();

////////////////////////////// INICIO 1
var m1_fuente = document.getElementById('total_apoyo_suma').value;
var apoyo_general = document.getElementById('apoyo_general_paso').value;
var tipo_elegidos = document.getElementById('tipo_elegidos').value;

var cuenta_errora=0;
var cuenta_error_fina=0;
var cuenta_error_falta_infora=0;
		
for(var p=1; p<=150; p++){
	//input
	var errnomb_art_gru = document.getElementById('nomb_art_gru__'+p).value;
	var est_orig_art_gru = document.getElementById('est_orig_art_gru__'+p).value;
	var mun_origen_artista_grupo = document.getElementById('mun_orig_art_gru__'+p).value;
	var num_tel_artista_grupo = document.getElementById('tel_art_gru__'+p).value;
	var email_artista_grupo = document.getElementById('email_art_gru__'+p).value;
	var reconoci_art_gru = document.getElementById('reconoci_art_gru__'+p).value;
	var paginaweb_redessoc_artista_grupo = document.getElementById('pagweb_redes_art_gru__'+p).value;
	var anio_exper_comproba = document.getElementById('anio_exper_comproba__'+p).value;
	var nom_representante = document.getElementById('nom_representante__'+p).value;
	var tel_repr_fiscal = document.getElementById('tel_repr_fiscal__'+p).value;
	var email_repres_fiscal = document.getElementById('email_repres_fiscal__'+p).value;
	var nomb_present = document.getElementById('nomb_present__'+p).value;
	var fecha_present = document.getElementById('fecha_present__'+p).value;
	var horario = document.getElementById('horario__'+p).value;
	var num_part_gru = document.getElementById('num_part_gru__'+p).value;
	var num_Mujeres = document.getElementById('num_Mujeres__'+p).value;
	var num_Hombres = document.getElementById('num_Hombres__'+p).value;
	var duracion_espec_prop = document.getElementById('duracion__'+p).value;
	var nomb_foro = document.getElementById('nomb_foro__'+p).value;
	var est_foro = document.getElementById('est_foro__'+p).value;
	var mun_alc_foro = document.getElementById('mun_alc_foro__'+p).value;
	var local_foro = document.getElementById('local_foro__'+p).value;
	var publico = document.getElementById('publico__'+p).value;
	var impacto_sociocultural = document.getElementById('impacto_sociocultural__'+p).value;
	var sinopsis = document.getElementById('sinopsis__'+p).value;
	var links_mat_videog_prop = document.getElementById('links_mat_videog_prop__'+p).value;
	var monto = document.getElementById('monto__'+p).value;
	
	//select
	var art_cuenta_CFDI = document.getElementById('art_cuenta_CFDI__'+p).value;
	var alcance = document.getElementById('alcance'+p).value;
	var represent_fiscal_CFDI = document.getElementById('represent_fiscal_CFDI__'+p).value;
	var espacio = document.getElementById('espacio__'+p).value;
	var cuenta_apoyo_FONCA = document.getElementById('cuenta_apoyo_FONCA__'+p).value;
	var confir_tenta = document.getElementById('confir_tenta__'+p).value;
	var disciplina = document.getElementById('disciplina__'+p).value;
	var categoria = document.getElementById('categoria__'+p).value;
	
	if(errnomb_art_gru!='' &&  est_orig_art_gru!='' &&  mun_orig_art_gru!='' &&  num_tel_artista_grupo!='' &&  email_artista_grupo!='' &&  reconoci_art_gru!='' &&  paginaweb_redessoc_artista_grupo!='' &&  
alcance!='' &&  anio_exper_comproba!='' &&  nom_representante!='' &&  tel_repr_fiscal!='' &&  email_repres_fiscal!='' &&  nomb_present!='' &&  
fecha_present!='' &&  horario!='' &&  num_part_gru!='' && num_Mujeres!='' &&  num_Hombres!='' &&  duracion_espec_prop!='' &&  nomb_foro!='' &&  est_foro!='' &&  mun_alc_foro!='' &&  
local_foro!='' &&  publico!='' &&  impacto_sociocultural!='' &&  sinopsis!='' &&  links_mat_videog_prop!='' &&  monto!='' &&
confir_tenta!='' && disciplina!='' && categoria!='' && art_cuenta_CFDI!='' && represent_fiscal_CFDI!='' && espacio!='' && cuenta_apoyo_FONCA!=''){

		if(tipo_elegidos>1){
			var apoyo_general_op = parseFloat(apoyo_general.replace(/[$,\s]/g, ''));

			var suma_todo =  parseFloat(m1_fuente.replace(/[$,\s]/g, '')) + apoyo_general_op;
		} else {
			var suma_todo =  parseFloat(m1_fuente.replace(/[$,\s]/g, ''));
		}
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
	} else if(errnomb_art_gru!='' || est_orig_art_gru!='' || mun_origen_artista_grupo!='' || num_tel_artista_grupo!='' || email_artista_grupo!='' || reconoci_art_gru!='' ||  paginaweb_redessoc_artista_grupo!='' ||  
alcance!='' || anio_exper_comproba!='' || nom_representante!='' || tel_repr_fiscal!='' || email_repres_fiscal!='' || nomb_present!='' ||  
fecha_present!='' || horario!='' || num_part_gru!='' || num_Mujeres!='' || num_Hombres!='' || duracion_espec_prop!='' || nomb_foro!='' || est_foro!='' || mun_alc_foro!='' ||  
local_foro!='' || publico!='' || impacto_sociocultural!='' || sinopsis!='' || links_mat_videog_prop!='' || monto!='' || 
confir_tenta!='' || disciplina!='' || categoria!='' || art_cuenta_CFDI!='' || represent_fiscal_CFDI!='' || espacio!=''|| cuenta_apoyo_FONCA!='') {
		//console.log('Verifica tu captura ya que no tiene la información necesaria');
		document.getElementById("rowError1").style.display = 'block';
		cuenta_error_falta_infora=1;
		$(window).scrollTop(300);
	}	
} //fin for

var cuenta_error_fina=0;

for(var i=1; i<=1; i++){

	var errnomb_art_gru = document.getElementById('nomb_art_gru'+i).value;
	var est_orig_art_gru = document.getElementById('est_orig_art_gru'+i).value;
	var mun_orig_art_gru = document.getElementById('mun_orig_art_gru'+i).value;
	var tel_art_gru = document.getElementById('tel_art_gru'+i).value;
	var email_art_gru = document.getElementById('email_art_gru'+i).value;
	var reconoci_art_gru = document.getElementById('reconoci_art_gru'+i).value;
	var pagweb_redes_art_gru = document.getElementById('pagweb_redes_art_gru'+i).value;
	var anio_exper_comproba = document.getElementById('anio_exper_comproba'+i).value;
	var nom_representante = document.getElementById('nom_representante'+i).value;
	var tel_repr_fiscal = document.getElementById('tel_repr_fiscal'+i).value;
	var email_repres_fiscal = document.getElementById('email_repres_fiscal'+i).value;
	var nomb_present = document.getElementById('nomb_present'+i).value;
	var fecha_present = document.getElementById('fecha_present'+i).value;
	var horario = document.getElementById('horario'+i).value;
	var num_part_gru = document.getElementById('num_part_gru'+i).value;
	var num_Mujeres = document.getElementById('num_Mujeres'+i).value;
	var num_Hombres = document.getElementById('num_Hombres'+i).value;
	var duracion = document.getElementById('duracion'+i).value;
	var nomb_foro = document.getElementById('nomb_foro'+i).value;
	var est_foro = document.getElementById('est_foro'+i).value;
	var mun_alc_foro = document.getElementById('mun_alc_foro'+i).value;
	var local_foro = document.getElementById('local_foro'+i).value;
	var publico = document.getElementById('publico'+i).value;
	var impacto_sociocultural = document.getElementById('impacto_sociocultural'+i).value;
	var sinopsis = document.getElementById('sinopsis'+i).value;
	var links_mat_videog_prop = document.getElementById('links_mat_videog_prop'+i).value;
	var monto = document.getElementById('monto'+i).value;
	var confir_tenta = document.getElementById('confir_tenta'+i).value;
	var disciplina = document.getElementById('disciplina'+i).value;
	var categoria = document.getElementById('categoria'+i).value;
	var art_cuenta_CFDI = document.getElementById('art_cuenta_CFDI'+i).value;
	var represent_fiscal_CFDI = document.getElementById('represent_fiscal_CFDI'+i).value;
	var espacio = document.getElementById('espacio'+i).value;
	var cuenta_apoyo_FONCA = document.getElementById('cuenta_apoyo_FONCA'+i).value;
	var alcance = document.getElementById('alcance'+i).value;

	if(errnomb_art_gru=='' || est_orig_art_gru=='' || mun_origen_artista_grupo=='' || num_tel_artista_grupo=='' || email_artista_grupo=='' || reconoci_art_gru=='' || paginaweb_redessoc_artista_grupo=='' || 
alcance=='' || anio_exper_comproba=='' || nom_representante=='' || tel_repr_fiscal=='' || email_repres_fiscal=='' || nomb_present=='' || 
fecha_present=='' || horario=='' || num_part_gru=='' || num_Mujeres=='' || num_Hombres=='' || duracion_espec_prop=='' || nomb_foro=='' || est_foro=='' || mun_alc_foro=='' || 
local_foro=='' || publico=='' || impacto_sociocultural=='' || sinopsis=='' || links_mat_videog_prop=='' || monto=='' || confir_tenta=='' || 
disciplina=='' || categoria=='' || art_cuenta_CFDI=='' || represent_fiscal_CFDI=='' || espacio=='' || cuenta_apoyo_FONCA==''){
		cuenta_error_fina = 1
		cuenta_errora=1;
		console.log('deben ser 1 obligatorios')
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
		console.log('SI se puede guardar');
		//window.document.formul.submit();		
 	} else {
		console.log('error en la captura');
		$(window).scrollTop(300);
		cuenta_error_totales=1;	
		}
	/// FIN TOTAL DE PESTAÑAS*/
}