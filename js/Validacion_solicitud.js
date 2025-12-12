function validarEnvio(){
	/* Ventena emergente */
	var rowError = document.getElementById('rowError');

	//INICIO PESTAÑA SOLICITUD
	
	var info_financiera_categoriaEsc = document.getElementById('info_financiera_categoria');
	var errinfo_financiera_categoria= document.getElementById('errinfo_financiera_categoria');
	var errinfo_financiera_categoriaAs= document.getElementById('errinfo_financiera_categoriaAs');

	var nombre_festivalEsc = document.getElementById('nombre_festival');
	var errnombre_festival= document.getElementById('errnombre_festival');
	var errnombre_festivalAs= document.getElementById('errnombre_festivalAs');
	
	var numero_ediciones_previasEsc = document.getElementById('numero_ediciones_previas');
	var errnumero_ediciones_previas= document.getElementById('errnumero_ediciones_previas');
	var errnumero_ediciones_previasAs= document.getElementById('errnumero_ediciones_previasAs');
	
	/* 2024 si, se quita para 2025 var objetivo_generalEsc = document.getElementById('objetivo_general');
	var errobjetivo_general= document.getElementById('errobjetivo_general');
	var errobjetivo_generalAs= document.getElementById('errobjetivo_generalAs');
    */

	var acciones_festival_medio_ambienteEsc	= document.getElementById('acciones_festival_medio_ambiente');
	var erracciones_festival_medio_ambiente= document.getElementById('erracciones_festival_medio_ambiente');
	var erracciones_festival_medio_ambienteAs= document.getElementById('erracciones_festival_medio_ambienteAs');

	
	//Meta 1
	var meta_num_presentacionesEsc = document.getElementById('meta_num_presentaciones');
	var errmeta_num_presentaciones= document.getElementById('errmeta_num_presentaciones');
	var errmeta_num_presentacionesAs= document.getElementById('errmeta_num_presentacionesAs');
	//Meta 2
	var meta_num_publicoEsc = document.getElementById('meta_num_publico');
	var errmeta_num_publico= document.getElementById('errmeta_num_publico');
	var errmeta_num_publicoAs= document.getElementById('errmeta_num_publicoAs');
	//Meta 3
	var meta_num_municipioEsc = document.getElementById('meta_num_municipio');
	var errmeta_num_municipio= document.getElementById('errmeta_num_municipio');
	var errmeta_num_municipioAs= document.getElementById('errmeta_num_municipioAs');
	//Meta 4
	var meta_num_forosEsc = document.getElementById('meta_num_foros');
	var errmeta_num_foros= document.getElementById('errmeta_num_foros');
	var errmeta_num_forosAs= document.getElementById('errmeta_num_forosAs');
	//Meta 5
	var meta_num_artistasEsc = document.getElementById('meta_num_artistas');
	var errmeta_num_artistas= document.getElementById('errmeta_num_artistas');
	var errmeta_num_artistasAs= document.getElementById('errmeta_num_artistasAs');
	//Meta 6
	var meta_cantidad_gruposEsc = document.getElementById('meta_cantidad_grupos');
	var errmeta_cantidad_grupos= document.getElementById('errmeta_cantidad_grupos');
	var errmeta_cantidad_gruposAs= document.getElementById('errmeta_cantidad_gruposAs');
	//Meta 7
	var meta_num_actividades_academicasEsc = document.getElementById('meta_num_actividades_academicas');
	var errmeta_num_actividades_academicas = document.getElementById('errmeta_num_actividades_academicas');
	var errmeta_num_actividades_academicasAs = document.getElementById('errmeta_num_actividades_academicasAs');
	//Meta 8
	var meta_act_creadores_num_cine_mexEsc = document.getElementById('meta_act_creadores_num_cine_mex');
	var errmeta_act_creadores_num_cine_mex = document.getElementById('errmeta_act_creadores_num_cine_mex');
	var errmeta_act_creadores_num_cine_mexAs = document.getElementById('errmeta_act_creadores_num_cine_mexAs');
	
	//inicio disciplina
	/*var disciplina_musicaEsc	= document.getElementById('disciplina_musica_v2');
	var disciplina_teatroEsc	= document.getElementById('disciplina_teatro_v2');
	var disciplina_danzaEsc		= document.getElementById('disciplina_danza_v2');
	var disciplina_artes_visualesEsc = document.getElementById('disciplina_artes_visuales_v2');
	var disciplina_gastronomiaEsc	 = document.getElementById('disciplina_gastronomia_v2');
	var disciplina_literaturaEsc = document.getElementById('disciplina_literatura_v2');
	var disciplina_cinematografiaEsc	 = document.getElementById('disciplina_cinematografia_v3');
	var disciplina_multidisciplinaEsc = document.getElementById('disciplina_multidisciplina_v3');*/
	
	var disciplina_2022Esc = document.getElementById('disciplina_2022');
	var errdisciplina_2022= document.getElementById('errdisciplina_2022');
	var errdisciplina_2022As= document.getElementById('errdisciplina_2022As');
	//fin disciplina

	var nombre_festivalEsc = document.getElementById('nombre_festival');
	var errnombre_festival= document.getElementById('errnombre_festival');
	var errnombre_festivalAs= document.getElementById('errnombre_festivalAs');
		
	var alcance_programacionEsc = document.getElementById('alcance_programacion');
	var erralcance_programacion= document.getElementById('erralcance_programacion');
	var erralcance_programacionAs= document.getElementById('erralcance_programacionAs');
	
	var periodo_realizacion_fecha_inicioEsc = document.getElementById('periodo_realizacion_fecha_inicio');
	var errperiodo_realizacion_fecha_inicio= document.getElementById('errperiodo_realizacion_fecha_inicio');
	var errperiodo_realizacion_fecha_inicioAs= document.getElementById('errperiodo_realizacion_fecha_inicioAs');

	var periodo_realizacion_fecha_terminoEsc = document.getElementById('periodo_realizacion_fecha_termino');
	var errperiodo_realizacion_fecha_termino= document.getElementById('errperiodo_realizacion_fecha_termino');
	var errperiodo_realizacion_fecha_terminoAs= document.getElementById('errperiodo_realizacion_fecha_terminoAs');

	var Info_financiera_categoriaEsc = document.getElementById('Info_financiera_categoria');
	var errInfo_financiera_categoria= document.getElementById('errInfo_financiera_categoria');
	var errInfo_financiera_categoriaAs= document.getElementById('errInfo_financiera_categoriaAs');

	var Infor_finan_costo_montoEsc = document.getElementById('Infor_finan_costo_monto');
	var errInfor_finan_costo_monto= document.getElementById('errInfor_finan_costo_monto');
	var errInfor_finan_costo_montoAs= document.getElementById('errInfor_finan_costo_montoAs');

	var m1_fuente = Infor_finan_costo_montoEsc.value;

	/*26122024var Infor_finan_apoyo_montoEsc = document.getElementById('Infor_finan_apoyo_monto');
	var errInfor_finan_apoyo_monto= document.getElementById('errInfor_finan_apoyo_monto');
	var errInfor_finan_apoyo_montoAs= document.getElementById('errInfor_finan_apoyo_montoAs');
*/
	var m2_fuente = document.getElementById('total_2').value;

	var Infor_finan_apoyo_costo_totalEsc = document.getElementById('Infor_finan_apoyo_costo_total');
	var errInfor_finan_apoyo_costo_total= document.getElementById('errInfor_finan_apoyo_costo_total');
	var errInfor_finan_apoyo_costo_totalAs= document.getElementById('errInfor_finan_apoyo_costo_totalAs');
	
	//FIN PESTAÑA SOLICITUD
	
	//INICIO PESTAÑA PROYECTO

	//Director del festival(INICIO)
	
	var nombre_dirEsc = document.getElementById('nombre_dir');
	var errnombre_dir= document.getElementById('errnombre_dir');
	var errnombre_dirAs= document.getElementById('errnombre_dirAs');

	var primer_apellido_dirEsc = document.getElementById('primer_apellido_dir');
	var errprimer_apellido_dir= document.getElementById('errprimer_apellido_dir');
	var errprimer_apellido_dirAs= document.getElementById('errprimer_apellido_dirAs');

	var cargo_dirEsc = document.getElementById('cargo_dir');
	var errcargo_dir= document.getElementById('errcargo_dir');
	var errcargo_dirAs= document.getElementById('errcargo_dirAs');

	var telefono_fijo_dirEsc = document.getElementById('telefono_fijo_dir');
	var errtelefono_fijo_dir= document.getElementById('errtelefono_fijo_dir');
	var errtelefono_fijo_dirAs= document.getElementById('errtelefono_fijo_dirAs');
	
	var Correo_electronico_dirEsc = document.getElementById('Correo_electronico_dir');
	var errCorreo_electronico_dir= document.getElementById('errCorreo_electronico_dir');
	var errCorreo_electronico_dirAs= document.getElementById('errCorreo_electronico_dirAs');

	var breve_semblanza_directorEsc = document.getElementById('breve_semblanza_director');
	var errbreve_semblanza_director= document.getElementById('errbreve_semblanza_director');
	var errbreve_semblanza_directorAs= document.getElementById('errbreve_semblanza_directorAs');

	/* 2024 si, se quita para 2025 var breve_semblanza_opEsc = document.getElementById('breve_semblanza_op');
	var errbreve_semblanza_op= document.getElementById('errbreve_semblanza_op');
	var errbreve_semblanza_opAs= document.getElementById('errbreve_semblanza_opAs');

	var breve_semblanza_admEsc = document.getElementById('breve_semblanza_adm');
	var errbreve_semblanza_adm= document.getElementById('errbreve_semblanza_adm');
	var errbreve_semblanza_admAs= document.getElementById('errbreve_semblanza_admAs');*/
	//Director del festival(FIN)
	
	var responsable_op_nombreEsc = document.getElementById('responsable_op_nombre');
	var errresponsable_op_nombre= document.getElementById('errresponsable_op_nombre');
	var errresponsable_op_nombreAs= document.getElementById('errresponsable_op_nombreAs');
	
	var primer_apellido_opEsc	= document.getElementById('primer_apellido_op');
	var errprimer_apellido_op= document.getElementById('errprimer_apellido_op');
	var errprimer_apellido_opAs= document.getElementById('errprimer_apellido_opAs');
		
	var segundo_apellido_opEsc	= document.getElementById('segundo_apellido_op');
	var errcsegundo_apellido_op= document.getElementById('errsegundo_apellido_op');
	var errsegundo_apellido_opAs= document.getElementById('errsegundo_apellido_opAs');
	
	var cargo_opEsc = document.getElementById('cargo_op');
	var errcargo_op = document.getElementById('errcargo_op');
	var errcargo_opAs = document.getElementById('errcargo_opAs');
	
	var telefono_fijo_opEsc	= document.getElementById('telefono_fijo_op');
	var errtelefono_fijo_op= document.getElementById('errtelefono_fijo_op');
	var errtelefono_fijo_opAs= document.getElementById('errtelefono_fijo_opAs');
	
	var Correo_electronico_opEsc	= document.getElementById('Correo_electronico_op');
	var errCorreo_electronico_op= document.getElementById('errCorreo_electronico_op');
	var errCorreo_electronico_opAs= document.getElementById('errCorreo_electronico_opAs');
	
	var responsable_adm_nombreEsc	= document.getElementById('responsable_adm_nombre');
	var errresponsable_adm_nombre= document.getElementById('errresponsable_adm_nombre');
	var errresponsable_adm_nombreAs= document.getElementById('errresponsable_adm_nombreAs');	
	
	var primer_apellido_admEsc		= document.getElementById('primer_apellido_adm');
	var errprimer_apellido_adm= document.getElementById('errprimer_apellido_adm');
	var errprimer_apellido_admAs= document.getElementById('errprimer_apellido_admAs');
	
	var segundo_apellido_admEsc	= document.getElementById('segundo_apellido_adm');
	var errsegundo_apellido_adm= document.getElementById('errsegundo_apellido_adm');
	var errsegundo_apellido_admAs= document.getElementById('errsegundo_apellido_admAs');
	
	var cargo_admEsc	= document.getElementById('cargo_adm');
	var errcargo_adm	= document.getElementById('errcargo_adm');
	var errcargo_admAs= document.getElementById('errcargo_admAs');
	
	var telefono_fijo_admEsc	= document.getElementById('telefono_fijo_adm');
	var errtelefono_fijo_adm	= document.getElementById('errtelefono_fijo_adm');
	var errtelefono_fijo_admAs	= document.getElementById('errtelefono_fijo_admAs');
	
	var correo_electronico_admEsc	= document.getElementById('correo_electronico_adm');
	var errcorreo_electronico_adm= document.getElementById('errcorreo_electronico_adm');
	var errcorreo_electronico_admAs= document.getElementById('errcorreo_electronico_admAs');


	var desarrollo_proyecto_antecedenteEsc	= document.getElementById('desarrollo_proyecto_antecedente');
	var errdesarrollo_proyecto_antecedente= document.getElementById('errdesarrollo_proyecto_antecedente');
	var errdesarrollo_proyecto_antecedenteAs= document.getElementById('errdesarrollo_proyecto_antecedenteAs');
	
	var desarrollo_proyecto_justificacionEsc	= document.getElementById('desarrollo_proyecto_justificacion');
	var errdesarrollo_proyecto_justificacion= document.getElementById('errdesarrollo_proyecto_justificacion');
	var errdesarrollo_proyecto_justificacionAs= document.getElementById('errdesarrollo_proyecto_justificacionAs');

	var desarrollo_proyecto_descripcionEsc	= document.getElementById('desarrollo_proyecto_descripcion');
	var errdesarrollo_proyecto_descripcion= document.getElementById('errdesarrollo_proyecto_descripcion');
	var errdesarrollo_proyecto_descripcionAs= document.getElementById('errdesarrollo_proyecto_descripcionAs');
	
	var desarrollo_proyecto_descripcion_impactoEsc	= document.getElementById('desarrollo_proyecto_descripcion_impacto');
	var errdesarrollo_proyecto_descripcion_impacto= document.getElementById('errdesarrollo_proyecto_descripcion_impacto');
	var errdesarrollo_proyecto_descripcion_impactoAs= document.getElementById('errdesarrollo_proyecto_descripcion_impactoAs');
	
	var estrategias_acciones_dar_conocerEsc		= document.getElementById('estrategias_acciones_dar_conocer');
	var errestrategias_acciones_dar_conocer		= document.getElementById('errestrategias_acciones_dar_conocer');
	var errestrategias_acciones_dar_conocerAs	= document.getElementById('errestrategias_acciones_dar_conocerAs');
	
	var descripcion_mecanismos_evaluacionEsc	= document.getElementById('descripcion_mecanismos_evaluacion');
	var errdescripcion_mecanismos_evaluacion	= document.getElementById('errdescripcion_mecanismos_evaluacion');
	var errdescripcion_mecanismos_evaluacionAs	= document.getElementById('errdescripcion_mecanismos_evaluacionAs');
	
	var organigrama_nombre1Esc		= document.getElementById('organigrama_nombre1');
	var errorganigrama_nombre1		= document.getElementById('errorganigrama_nombre1');
	var errorganigrama_nombre1As	= document.getElementById('errorganigrama_nombre1As');

	var organigrama_nombre2Esc		= document.getElementById('organigrama_nombre2');
	var errorganigrama_nombre2		= document.getElementById('errorganigrama_nombre2');
	var errorganigrama_nombre2As	= document.getElementById('errorganigrama_nombre2As');

	var organigrama_nombre3Esc		= document.getElementById('organigrama_nombre3');
	var errorganigrama_nombre3		= document.getElementById('errorganigrama_nombre3');
	var errorganigrama_nombre3As	= document.getElementById('errorganigrama_nombre3As');
	
	var organigrama_cargo1Esc		= document.getElementById('organigrama_cargo1');
	var errorganigrama_cargo1		= document.getElementById('errorganigrama_cargo1');
	var errorganigrama_cargo1As	= document.getElementById('errorganigrama_cargo1As');

	var organigrama_cargo2Esc		= document.getElementById('organigrama_cargo2');
	var errorganigrama_cargo2		= document.getElementById('errorganigrama_cargo2');
	var errorganigrama_cargo2As	= document.getElementById('errorganigrama_cargo2As');

	var organigrama_cargo3Esc		= document.getElementById('organigrama_cargo3');
	var errorganigrama_cargo3		= document.getElementById('errorganigrama_cargo3');
	var errorganigrama_cargo3As	= document.getElementById('errorganigrama_cargo3As');

	var organigrama_funciones1Esc		= document.getElementById('organigrama_funciones1');
	var errorganigrama_funciones1		= document.getElementById('errorganigrama_funciones1');
	var errorganigrama_funciones1As	= document.getElementById('errorganigrama_funciones1As');

	var organigrama_funciones2Esc		= document.getElementById('organigrama_funciones2');
	var errorganigrama_funciones2		= document.getElementById('errorganigrama_funciones2');
	var errorganigrama_funciones3As	= document.getElementById('errorganigrama_funciones3As');

	var organigrama_funciones3Esc		= document.getElementById('organigrama_funciones3');
	var errorganigrama_funciones3		= document.getElementById('errorganigrama_funciones3');
	var errorganigrama_funciones3As	= document.getElementById('errorganigrama_funciones3As');

	var err_muestra_check	= document.getElementById('errmuestra_error');
	var err_est_difucionAs	= document.getElementById('err_est_difucionAs');
/* 2024 si, se quita para 2025 
	var num_publico_benefiaciado_antEsc = document.getElementById('num_publico_benefiaciado_ant');
	var errnum_publico_benefiaciado_ant = document.getElementById('errnum_publico_benefiaciado_ant');
	var errnum_publico_benefiaciado_antAs = document.getElementById('errnum_publico_benefiaciado_antAs');
*/
	var descripcion_linea_curotorialEsc = document.getElementById('descripcion_linea_curotorial');
	var errdescripcion_linea_curotorial = document.getElementById('errdescripcion_linea_curotorial');
	var errdescripcion_linea_curotorialAs = document.getElementById('errdescripcion_linea_curotorialAs');

	/* 2024 si, se quita para 2025 
	var descripcion_poblacion_audienciaEsc = document.getElementById('descripcion_poblacion_audiencia');
	var errdescripcion_poblacion_audiencia = document.getElementById('errdescripcion_poblacion_audiencia');
	var errdescripcion_poblacion_audienciaAs = document.getElementById('errdescripcion_poblacion_audienciaAs');
	*/
//INICIO LUGARES
/*	var tipo_lugar_aEsc = document.getElementById('tipo_lugar_a');
	var errtipo_lugar_a = document.getElementById('errtipo_lugar_a');
	var errtipo_lugar_aAs = document.getElementById('errtipo_lugar_aAs');
*/
	var Nombreforo_aEsc = document.getElementById('Nombreforo_a');
	var errNombreforo_a = document.getElementById('errNombreforo_a');
	var errNombreforo_aAs = document.getElementById('errNombreforo_aAs');

	var cpforo_aEsc = document.getElementById('cpforo_a');
	var errcpforo_a = document.getElementById('errcpforo_a');
	var errcpforo_aAs = document.getElementById('errcpforo_aAs');

	var estadoforo_aEsc = document.getElementById('estadoforo_a');
	var errestadoforo_a = document.getElementById('errestadoforo_a');
	var errestadoforo_aAs = document.getElementById('errestadoforo_aAs');

	var mun_alcforo_aEsc = document.getElementById('mun_alcforo_a');
	var errmun_alcforo_a = document.getElementById('errmun_alcforo_a');
	var mun_alcforo_aAs = document.getElementById('errmun_alcforo_aAs');

	var coloniaforo_aEsc = document.getElementById('coloniaforo_a');
	var calleforo_aEsc = document.getElementById('calleforo_a');
	var no_extforo_aEsc = document.getElementById('no_extforo_a');
	var no_intforo_aEsc = document.getElementById('no_intforo_a');
	
	var errcoloniaforo_a = document.getElementById('errcoloniaforo_a');
	var errcalleforo_a = document.getElementById('errcalleforo_a');
	var errno_extforo_a = document.getElementById('errno_extforo_a');
	var errno_intforo_a = document.getElementById('errno_intforo_a');
	
	var coloniaforo_aAs = document.getElementById('errcoloniaforo_aAs');
	var calleforo_aAs = document.getElementById('errcalleforo_aAs');
	var no_extforo_aAs = document.getElementById('errno_extforo_aAs');
	var no_intforo_aAs = document.getElementById('errno_intforo_aAs');

	var Descripcionlug_aEsc = document.getElementById('Descripcionlug_a');
	var errDescripcionlug_a = document.getElementById('errDescripcionlug_a');
	var errDescripcionlug_aAs = document.getElementById('errDescripcionlug_aAs');
	//FIN PRESUPUESTO

	/* (INICIO) Información de la Instancia */
	var tipo_instanciaEsc = document.getElementById('tipo_instancia');
	var errtipo_instancia= document.getElementById('errtipo_instancia');
	var errtipo_instanciaAs= document.getElementById('errtipo_instanciaAs');

	var entidades_a1Esc		= document.getElementById('entidades_a1');
	var errentidades_a1		= document.getElementById('errentidades_a1');
	var errentidades_a1As	= document.getElementById('errentidades_a1As');
	
	var nombre_instancia_postulanteEsc = document.getElementById('nombre_instancia_postulante');
	var errnombre_instancia_postulante= document.getElementById('errnombre_instancia_postulante');
	var errnombre_instancia_postulanteAs= document.getElementById('errnombre_instancia_postulanteAs');
	
	var nombre_titularEsc = document.getElementById('nombre_titular');
	var errnombre_titular= document.getElementById('errnombre_titular');
	var errnombre_titularAs= document.getElementById('errnombre_titularAs');
	
	var grado_academicoEsc = document.getElementById('grado_academico');
	var errgrado_academico= document.getElementById('errgrado_academico');
	var errgrado_academicoAs= document.getElementById('errgrado_academicoAs');	

	var cargoEsc = document.getElementById('cargo');
	var errcargo= document.getElementById('errcargo');
	var errcargoAs= document.getElementById('errcargoAs');
	
	var PostCodRepLegEsc = document.getElementById('PostCodRepLeg');
	var errPostCodRepLeg= document.getElementById('errPostCodRepLeg');
	var errPostCodRepLegAs= document.getElementById('errPostCodRepLegAs');

	var EstadoRepLegEsc = document.getElementById('EstadoRepLeg');
	var errEstadoRepLeg= document.getElementById('errEstadoRepLeg');
	var errEstadoRepLegAs= document.getElementById('errEstadoRepLegAs');

	var Municipio_AlcRepLegEsc = document.getElementById('Municipio_AlcRepLeg');
	var errMunicipio_AlcRepLeg= document.getElementById('errMunicipio_AlcRepLeg');
	var errMunicipio_AlcRepLegAs= document.getElementById('errMunicipio_AlcRepLegAs');

	var ColoniaRepLegEsc = document.getElementById('ColoniaRepLeg');
	var errColoniaRepLeg= document.getElementById('errColoniaRepLeg');
	var errColoniaRepLegAs= document.getElementById('errColoniaRepLegAs');

	var calleEsc = document.getElementById('calle');
	var errcalle= document.getElementById('errcalle');
	var errcalleAs= document.getElementById('errcalleAs');

	var no_extEsc = document.getElementById('no_ext');
	var errno_ext= document.getElementById('errno_ext');
	var errno_extAs= document.getElementById('errno_extAs');

	var telefono_fijoEsc = document.getElementById('telefono_fijo');
	var errtelefono_fijo= document.getElementById('errtelefono_fijo');
	var errtelefono_fijoAs= document.getElementById('errtelefono_fijoAs');

	var Correo_titEsc = document.getElementById('Correo_tit');
	var errCorreo_tit= document.getElementById('errCorreo_tit');
	var errCorreo_titAs= document.getElementById('errCorreo_titAs');


	var proy_desc_pob_aud_pubobj_festivalEsc = document.getElementById('proy_desc_pob_aud_pubobj_festival');
	var errproy_desc_pob_aud_pubobj_festival= document.getElementById('errproy_desc_pob_aud_pubobj_festival');
	var errproy_desc_pob_aud_pubobj_festivalAs= document.getElementById('errproy_desc_pob_aud_pubobj_festivalAs');

	var proy_noved_ed_2025Esc = document.getElementById('proy_noved_ed_2025');
	var errproy_noved_ed_2025= document.getElementById('errproy_noved_ed_2025');
	var errproy_noved_ed_2025As= document.getElementById('errproy_noved_ed_2025As');

	var proy_esp_infra_forosEsc = document.getElementById('proy_esp_infra_foros');
	var errproy_esp_infra_foros= document.getElementById('errproy_esp_infra_foros');
	var errproy_esp_infra_forosAs= document.getElementById('errproy_esp_infra_forosAs');

	var proy_vinc_org_obtrecursosEsc = document.getElementById('proy_vinc_org_obtrecursos');
	var errproy_vinc_org_obtrecursos= document.getElementById('errproy_vinc_org_obtrecursos');
	var errproy_vinc_org_obtrecursosAs= document.getElementById('errproy_vinc_org_obtrecursosAs');

	var proy_fav_itineranciaEsc = document.getElementById('proy_fav_itinerancia');
	var errproy_fav_itinerancia= document.getElementById('errproy_fav_itinerancia');
	var errproy_fav_itineranciaAs= document.getElementById('errproy_fav_itineranciaAs');

	var proy_accionesEsc = document.getElementById('proy_acciones');
	var errproy_acciones= document.getElementById('errproy_acciones');
	var errproy_accionesAs= document.getElementById('errproy_accionesAs');

	/* (FIN) Información de la Instancia */
		
	/* Boton de Envío */
	var btnEnvio = document.getElementById('submit1');

	/* Arreglo de variables (especificamente las cajas de texto)*/
	var campos = [
		nombre_festivalEsc,
		numero_ediciones_previasEsc,
		meta_num_presentacionesEsc,
		meta_num_publicoEsc,
		meta_num_municipioEsc,
		meta_num_forosEsc,
		meta_num_artistasEsc,
		meta_cantidad_gruposEsc,
		meta_num_actividades_academicasEsc,
		meta_act_creadores_num_cine_mexEsc,
		periodo_realizacion_fecha_inicioEsc,
		periodo_realizacion_fecha_terminoEsc,
		/**************Infor_finan_costo_montoEsc,
		Infor_finan_apoyo_montoEsc,
		Infor_finan_apoyo_costo_totalEsc,*******************/
		responsable_op_nombreEsc,
		primer_apellido_opEsc,
		cargo_opEsc,
		telefono_fijo_opEsc,
		Correo_electronico_opEsc,
		responsable_adm_nombreEsc,
		primer_apellido_admEsc,
		cargo_admEsc,
		telefono_fijo_admEsc, 
		correo_electronico_admEsc,
		desarrollo_proyecto_antecedenteEsc,
		//desarrollo_proyecto_diagnosticoEsc,
		desarrollo_proyecto_justificacionEsc,
		desarrollo_proyecto_descripcionEsc,
		//desarrollo_proyecto_objetivos_especificosEsc,
		acciones_festival_medio_ambienteEsc,
		organigrama_nombre1Esc, 
		organigrama_nombre2Esc, 
		organigrama_nombre3Esc,
		organigrama_cargo1Esc,
		organigrama_cargo2Esc,
		organigrama_cargo3Esc,
		organigrama_funciones1Esc,
		organigrama_funciones2Esc,
		organigrama_funciones3Esc,
		nombre_instancia_postulanteEsc,
		nombre_titularEsc,
		cargoEsc,
		PostCodRepLegEsc,
		EstadoRepLegEsc,
		Municipio_AlcRepLegEsc,
		ColoniaRepLegEsc,
		calleEsc,		
		no_extEsc,
		telefono_fijoEsc,		
		Correo_titEsc,
		nombre_dirEsc,
		primer_apellido_dirEsc,
		cargo_dirEsc,
		telefono_fijo_dirEsc,
		Correo_electronico_dirEsc,
		breve_semblanza_directorEsc,
		descripcion_linea_curotorialEsc,
		proy_desc_pob_aud_pubobj_festivalEsc,
		proy_noved_ed_2025Esc,
		proy_esp_infra_forosEsc,
		proy_vinc_org_obtrecursosEsc,
		proy_fav_itineranciaEsc,
		proy_accionesEsc
		]; 
	//Variables de los mensajes "Este campo es obligatorio"	
	var mensaje = [
		errnombre_festival,
		errnumero_ediciones_previas,
		errmeta_num_presentaciones,
		errmeta_num_publico,
		errmeta_num_municipio,
		errmeta_num_foros,
		errmeta_num_artistas,
		errmeta_cantidad_grupos,
		errmeta_num_actividades_academicas,
		errmeta_act_creadores_num_cine_mex,
		errperiodo_realizacion_fecha_inicio,
		errperiodo_realizacion_fecha_termino,
		/****************errInfor_finan_costo_monto,
		errInfor_finan_apoyo_monto,
		errInfor_finan_apoyo_costo_total,*************************/
		errresponsable_op_nombre,
		errprimer_apellido_op,
		errcargo_op,
		errtelefono_fijo_op,
		errCorreo_electronico_op,
		errresponsable_adm_nombre,
		errprimer_apellido_adm,
		errcargo_adm,
		errtelefono_fijo_adm, 
		errcorreo_electronico_adm,
		errdesarrollo_proyecto_antecedente,
		//errdesarrollo_proyecto_diagnostico,
		errdesarrollo_proyecto_justificacion,
		errdesarrollo_proyecto_descripcion,
		//errdesarrollo_proyecto_objetivos_especificos,
		erracciones_festival_medio_ambiente,
		errorganigrama_nombre1,
		errorganigrama_nombre2,
		errorganigrama_nombre3,
		errorganigrama_cargo1,
		errorganigrama_cargo2,
		errorganigrama_cargo3,
		errorganigrama_funciones1,
		errorganigrama_funciones2,
		errorganigrama_funciones3,
		errnombre_instancia_postulante,
		errnombre_titular,
		errcargo,
		errPostCodRepLeg,
		errEstadoRepLeg,
		errMunicipio_AlcRepLeg,
		errColoniaRepLeg,
		errcalle,		
		errno_ext,
		errtelefono_fijo,		
		errCorreo_tit,
		errnombre_dir,
		errprimer_apellido_dir,
		errcargo_dir,
		errtelefono_fijo_dir,
		errCorreo_electronico_dir,
		errbreve_semblanza_director,
		errdescripcion_linea_curotorial,
		errproy_desc_pob_aud_pubobj_festival,
		errproy_noved_ed_2025,
		errproy_esp_infra_foros,
		errproy_vinc_org_obtrecursos,
		errproy_fav_itinerancia,
		errproy_acciones
		];
	
	//Variables de los asteriscos
	var asteriscos = [
		errnombre_festivalAs,
		errnumero_ediciones_previasAs,
		errmeta_num_presentacionesAs,
		errmeta_num_publicoAs,
		errmeta_num_municipioAs,
		errmeta_num_forosAs,
		errmeta_num_artistasAs,
		errmeta_cantidad_gruposAs,
		errmeta_num_actividades_academicasAs,
		errmeta_act_creadores_num_cine_mexAs,
		errperiodo_realizacion_fecha_inicioAs,
		errperiodo_realizacion_fecha_terminoAs,
		/***************errInfor_finan_costo_montoAs,
		errInfor_finan_apoyo_montoAs,
		errInfor_finan_apoyo_costo_totalAs,***********************/
		errresponsable_op_nombreAs,
		errprimer_apellido_opAs,
		errcargo_opAs,
		errtelefono_fijo_opAs,
		errCorreo_electronico_opAs,
		errresponsable_adm_nombreAs,
		errprimer_apellido_admAs,
		errcargo_admAs,
		errtelefono_fijo_admAs, 
		errcorreo_electronico_admAs,
		errdesarrollo_proyecto_antecedenteAs,
		//errdesarrollo_proyecto_diagnosticoAs,
		errdesarrollo_proyecto_justificacionAs,
		errdesarrollo_proyecto_descripcionAs,
		//errdesarrollo_proyecto_objetivos_especificosAs,
		erracciones_festival_medio_ambienteAs,
		errorganigrama_nombre1As,
		errorganigrama_nombre2As,
		errorganigrama_nombre3As,
		errorganigrama_cargo1As,
		errorganigrama_cargo2As,
		errorganigrama_cargo3As,
		errorganigrama_funciones1As,
		errorganigrama_funciones2As,
		errorganigrama_funciones3As,
		errnombre_instancia_postulanteAs,
		errnombre_titularAs,
		errcargoAs,
		errPostCodRepLegAs,
		errEstadoRepLegAs,
		errMunicipio_AlcRepLegAs,
		errColoniaRepLegAs,
		errcalleAs,
		errno_extAs,
		errtelefono_fijoAs,		
		errCorreo_titAs, 
		errnombre_dirAs,
		errprimer_apellido_dirAs,
		errcargo_dirAs,
		errtelefono_fijo_dirAs,
		errCorreo_electronico_dirAs,
		errbreve_semblanza_directorAs,
		errdescripcion_linea_curotorialAs,
		errproy_desc_pob_aud_pubobj_festivalAs,
		errproy_noved_ed_2025As,
		errproy_esp_infra_forosAs,
		errproy_vinc_org_obtrecursosAs,
		errproy_fav_itineranciaAs,
		errproy_accionesAs
	];

	//Variables de los combobox
	var comboEsc = [
	//18-01-2023 tipo_lugar_aEsc,
	//18-01-2023 disciplina_2022Esc,
	//18-01-2023 tipo_lugar_bEsc,
	//18-01-2023 tipo_lugar_cEsc,
		info_financiera_categoriaEsc,
		/*************************alcance_programacionEsc,
		
		//,
		//DocProbInstPerEsc	*************************/
		entidades_a1Esc,
		tipo_instanciaEsc,
		grado_academicoEsc		
	];
	var errcomboAs =[
	//18-01-2023 errtipo_lugar_aAs,
	//18-01-2023 errdisciplina_2022As,
	//18-01-2023 errtipo_lugar_bAs,
	//18-01-2023 errtipo_lugar_cAs,
		errinfo_financiera_categoriaAs,
		/*************************erralcance_programacionAs,	*************************/	
		//,
		//errDocProbInstPerAs
		errentidades_a1As,
		errtipo_instanciaAs,
		errgrado_academicoAs
	];
	var errcombo =[
	//18-01-2023 errtipo_lugar_a,
	//18-01-2023 errdisciplina_2022,
	//18-01-2023 errtipo_lugar_b,
	//18-01-2023 errtipo_lugar_c,
		errinfo_financiera_categoria,
		/*************************erralcance_programacion,*************************/
		
		//,
		//errDocProbInstPer
		errentidades_a1,
		errtipo_instancia,
		errgrado_academico
	];	
	/* Contador */
	var i=0;

	//Variable que contiene el arreglo comboBox
	var selec = comboEsc;
	//console.log(comboEsc);

	//El capturador de errores
	var cuenta_error=0;
	
	var extra_for = 1;
	var cuenta_campo = 0;
	
	//Todos y cada uno de los campos de texto
	for ( i=0 ; i < campos.length ; i++) {
		var tomar_valor_a = campos[i].value;

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
        }
		for(var j=0; j < selec.length ; j++){
			if(selec[j].options[selec[j].selectedIndex].value == 0){

				rowError.style.display = 'block';
				comboEsc[j].className = 'form-control form-control-error';
				errcomboAs[j].className = 'form-text form-text-error';
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

				//////////////////////////////////Inicio a/////////////////////////////////////////////////
				/*18/10/2023 if(comboEsc[j].name=="tipo_lugar_a" && selec[j].options[selec[j].selectedIndex].value==1){
					var campos_JAT = [Nombreforo_aEsc,
							cpforo_aEsc,
							estadoforo_aEsc,
							mun_alcforo_aEsc,
							coloniaforo_aEsc,
							calleforo_aEsc,
							no_extforo_aEsc,
							no_intforo_aEsc,
							Descripcionlug_aEsc]; 

					var mensaje_JAT = [errNombreforo_a,
							errcpforo_a,
							errestadoforo_a,
							errmun_alcforo_a,
							errcoloniaforo_a,
							errcalleforo_a,
							errno_extforo_a,
							errno_intforo_a,
							errDescripcionlug_a]; 

					var asteriscos_JAT = [errNombreforo_aAs,
							errcpforo_aAs,
							errestadoforo_aAs,
							errmun_alcforo_aAs,
							errcoloniaforo_aAs,
							errcalleforo_aAs,
							errno_extforo_aAs,
							errno_intforo_aAs,
							errDescripcionlug_aAs];

					for( m=0 ; m < campos_JAT.length ; m++) {
						var tomar_valor_ba = campos_JAT[m].value;
						if (tomar_valor_ba == '')
						{
							rowError.style.display = 'block';
							var err_arreglo_JAT = mensaje_JAT[m];
							var as_arreglo_JAT = asteriscos_JAT[m];
							var esc_arreglo_JAT = campos_JAT[m];

							err_arreglo_JAT.style.display = 'block';
							as_arreglo_JAT.className = 'form-text form-text-error';
			                esc_arreglo_JAT.className = 'form-control form-control-error'; 

			                cuenta_error++;

			            } else {

							comboEsc[j].className = 'form-control' ;
							errcomboAs[j].className = 'control-label' ;
							errcombo[j].style.display = 'none';
						}
					}
		} */
		/*18/01/2023 if(comboEsc[j].name=="tipo_lugar_a" && selec[j].options[selec[j].selectedIndex].value==2){
			var campos_JAT2 = [Nombreforo_aEsc, 
			Descripcionlug_aEsc]; 
			var mensaje_JAT2 = [errNombreforo_a, 
					errDescripcionlug_a]; 
			var asteriscos_JAT2 = [errNombreforo_aAs,
							errDescripcionlug_aAs];

			for ( p=0 ; p < campos_JAT2.length; p++) {
				var tomar_valor_baz = campos_JAT2[p].value;
				if (tomar_valor_baz == '')
				{
					rowError.style.display = 'block';
					var err_arreglo_JAT2 = mensaje_JAT2[p];
					var as_arreglo_JAT2 = asteriscos_JAT2[p];
					var esc_arreglo_JAT2 = campos_JAT2[p];

					err_arreglo_JAT2.style.display = 'block';
					as_arreglo_JAT2.className = 'form-text form-text-error';
			        esc_arreglo_JAT2.className = 'form-control form-control-error'; 
	                cuenta_error++;
	            } else {
					comboEsc[j].className = 'form-control' ;
					errcomboAs[j].className = 'control-label' ;
					errcombo[j].style.display = 'none';
				}
			}
		}*/
///////////////////////////////////// Fin a lugar ////////////////////////////////////////////
					comboEsc[j].className = 'form-control' ;
					errcomboAs[j].className = 'control-label' ;
					errcombo[j].style.display = 'none';
	} 
}//fin del ciclo for interno									
}//fin del ciclo for */
//----------------------------------JAAATTTTT INICIO-----------------------------------------------------------
//console.log(`cuenta_error=${cuenta_error}`); //23012023 cuenta los errores de los campos que faltan por capturar
var cuenta_error_fin=0;
var cuenta_error_falta_infor = 0
var cuenta_error_profest = 0;
var sumaT=0;		

for(var p=1; p<=50; p++){

	var errConcepto_gasto = document.getElementById('Concepto_gasto'+p).value;
	var errFuente_finan = document.getElementById('Fuente_finan'+p).value;
	var errMonto_unidad = document.getElementById('Monto_unidad'+p).value;
	//var errPorcentaje = document.getElementById('Porcentaje'+p).value;
	
	if(errConcepto_gasto!='' && errFuente_finan!='' && errMonto_unidad!=''){
				var fuente_finan_nombre = 'Fuente_finan'+p;
				var fuente_finan = document.getElementById(fuente_finan_nombre).value;
				var Monto_unidad_nombre = 'Monto_unidad'+p;
				var calcula_monto_profest_sin = document.getElementById(Monto_unidad_nombre).value;
				if(calcula_monto_profest_sin.length==0 ){ 
					calcula_monto_profest = 0 
				} else { 
					calcula_monto_profest = parseFloat(calcula_monto_profest_sin.replace(/[$,\s]/g, ''));
				}
				/*2025 no se utiliza if(fuente_finan == "3"){
					
				sumaT=sumaT+calcula_monto_profest;
				
				}        */
	} //fin if
	else if(errConcepto_gasto!='' || errFuente_finan!='' || errMonto_unidad!='') {
		alert ('Verifica tu captura ya que no tiene la información necesaria');
		document.getElementById("rowError").style.display = 'block';
		cuenta_error++;
		}	
} //fin for
	/*2025 se quita valida PROFEST porque sera el monto de coinversion el que se debe obtener
	if(sumaT!=m2_fuente){
		//console.log("entro aqui")

		alert ("Verifica los montos ingresados para la fuente de financiamiento Institucional PROFEST");
		document.getElementById("rowError").style.display = 'block';
		cuenta_error++;
	}*/

var cuenta_error_fin=0;

for(var i=1; i<=3; i++){
	
	var errConcepto_gasto = document.getElementById('Concepto_gasto'+i).value;
	var errFuente_finan = document.getElementById('Fuente_finan'+i).value;
	var errMonto_unidad = document.getElementById('Monto_unidad'+i).value;
	//var errPorcentaje = document.getElementById('Porcentaje'+i).value;
	
	if(errConcepto_gasto=='' || errFuente_finan=='' || errMonto_unidad==''){
		cuenta_error++;
	}
}
//FIN PRESUPUESTO se valido que los campos sean correctos

//INICIO PRESUPUESTO VALIDAR porcentaje total
var pres_anual_tot_2010 = document.apInf.pres_anual_tot_2010.value
//var ene_suma = document.getElementById('textod').value;
//Math.round(ene_suma)==100  && 
//pres_anual_tot_2010 == m1_fuente 
var monto_coinversion2 = document.getElementById('monto_coinversion2').value;
//console.log(" monto_coinversion2: " + monto_coinversion2 + "\n");

	if( pres_anual_tot_2010 == monto_coinversion2 ){
		//console.log('ya son el 100%');

		//CLUNI INICIO
		var CLUNIEsc= document.getElementById('CLUNI');
			//console.log(CLUNIEsc.value);
			if(tipo_instanciaEsc.value!='5' && CLUNIEsc.value===''){ 
				//console.log(CLUNIEsc);
				//console.log('cualquier otro nuemero y no trae nada');
				
				errCLUNI.style.display = 'none';
				CLUNIEsc.className = 'form-control'; 

				cuenta_error_fin=0;

				} else if (tipo_instanciaEsc.value=='5' && CLUNIEsc.value!='') {
				//console.log('es 5 y trae datos CLUNI');
				errCLUNI.style.display = 'none';
				CLUNIEsc.className = 'form-control'; 
				cuenta_error_fin=0;

				} else {

				//console.log('else');
				errCLUNI.style.display = 'block';
				CLUNIEsc.className = 'form-control form-control-error'; 
				cuenta_error++;

				}
		//CLUNI FIN
	} else {
		//console.log('aun no son 100%');
		
		//console.log(CLUNIEsc.value);
		if(tipo_instanciaEsc.value!='5' && CLUNIEsc.value===''){ 
			//console.log(CLUNIEsc);
			//console.log('cualquier otro nuemero y no trae nada');
			
			errCLUNI.style.display = 'none';
			CLUNIEsc.className = 'form-control'; 

			cuenta_error_fin=0;

			} else if (tipo_instanciaEsc.value=='5' && CLUNIEsc.value!='') {
			//console.log('es 5 y trae datos CLUNI');
			errCLUNI.style.display = 'none';
			CLUNIEsc.className = 'form-control'; 
			cuenta_error_fin=0;

			} else {

			//console.log('else');
			errCLUNI.style.display = 'block';
			CLUNIEsc.className = 'form-control form-control-error'; 
			cuenta_error_fin++;

			}
	//CLUNI FIN
		}
	//----------------------------------JAAATTTTT FIN-----------------------------------------------------------
	
	// (INICIO) Validación cronograma
	var cuenta_error_totales=0;
	var todoscampos = document.querySelectorAll(".honocampo");
	var total_apoyo_suma = document.getElementById('total_apoyo_suma');
    todoscampos.forEach((h)=>{  
      
      var nombre_campo = h.name;
	  var porciones = nombre_campo.split('__');
                
      var nombre_x = porciones[1];
      var nombre_y = porciones[2];
            
      if(h.value=='' && !nombre_x=='' && !nombre_y==''){
      	//console.log(`campo vacio: ${nombre_campo}`)
		document.getElementById(nombre_campo).style.borderColor="#D0021B";
      	cuenta_error_totales+=1; 
      } else {
      	//console.log(`campo lleno: ${porciones[0]}`)
      	cuenta_error_totales==0;
      }
    })
    // (FIN) Validación cronograma

///(INICIO) 20012023 variables para validacion de la pestaña PRESUPUESTO
	var total_esp_tra_uno =eval('document.apInf.total_esp_tra.value');
	var total_esp_tra = parseFloat(total_esp_tra_uno.replace(/[$,\s]/g, ''));

	var total_2_uno =eval('document.apInf.total_2.value');
	var total_2 = parseFloat(total_2_uno.replace(/[$,\s]/g, ''));

	var pres_anual_tot_2010_uno =eval('document.apInf.pres_anual_tot_2010.value');
	var pres_anual_tot_2010 = parseFloat(pres_anual_tot_2010_uno.replace(/[$,\s]/g, ''));

	var Infor_finan_costo_monto_uno =eval('document.apInf.Infor_finan_costo_monto.value');
	var Infor_finan_costo_monto = parseFloat(Infor_finan_costo_monto_uno.replace(/[$,\s]/g, ''));

	var monto_coinversion2 = document.getElementById('monto_coinversion2').value;
	
///(FIN) 20012023 variables para validacion de la pestaña PRESUPUESTO	
	var cuenta_error_presupesto = 0;

	 if(cuenta_error == 0){
	 	
	 	document.getElementById("rowErrora").style.display = 'none';
		document.getElementById("rowError").style.display = 'none';	 	
//2025 ya no se usará pres_anual_tot_2010==Infor_finan_costo_monto
		if(total_esp_tra==total_2 && pres_anual_tot_2010==monto_coinversion2 ){
		//console.log('captura correcta');
		window.document.apInf.submit();

			cuenta_error_presupesto==0;
      } else {

		/*console.log(monto_coinversion2);
		console.log(Infor_finan_costo_monto);
		console.log(pres_anual_tot_2010);
		console.log(total_esp_tra);
		console.log(total_2);
		*/

				console.log('error en la captura');
				$(window).scrollTop(300);
				document.getElementById("rowError").style.display = 'block';
				//document.getElementById("rowBien1").style.display = 'none';
			cuenta_error_presupesto+=1; 
		}
 
		//(INICIO) Validación cronograma-----------------------------------------------------
		/*if(cuenta_error_totales==0){

			//console.log(`INICIO DE suma de honorarios y pestañas`);

        /*INICIO DE suma de honorarios y pestañas
          var suma_general = 0;

          //18012023var total_apoyo_suma = document.apInf.total_apoyo_suma.value; //suma de honorarios
          total_apoyo_suma = document.apInf.total_2.value;
          //18012023 var apoyo_general_paso = document.apInf.apoyo_general_paso.value;//suma_pestanas
          var apoyo_general_paso = document.apInf.total_esp_tra.value;

          var Infor_finan_apoyo_monto= document.apInf.Infor_finan_apoyo_monto.value;//total_proyecto

        /*19012023 quite  suma_general = parseFloat(total_apoyo_suma.replace(/[$,\s]/g, '')) + parseFloat(apoyo_general_paso.replace(/[$,\s]/g, ''));
  
console.log(suma_general);

         var fin_suma = document.apInf.fin_suma;
              fin_suma.value=suma_general;*/

//if(total_apoyo_suma>0 && suma_general<=Infor_finan_apoyo_monto){ 19/01/2022 asi es como estaba la validación menor o igual al 23000 total pedido a SC

      /* 19012023 quite  if(total_apoyo_suma>0 && suma_general==Infor_finan_apoyo_monto){
             console.log('Entro 1 el importe de honorarios y conceptos es MENOR (BIEN) o igual al Apoyo financiero solicitado a la Secretaría de Cultura');
              document.getElementById("apoyo_general_paso").style.borderColor="";
                document.getElementById("total_apoyo_suma").style.borderColor="";
                //19012023 quite document.getElementById("fin_suma").style.borderColor="";
                //document.getElementById("rowError2").style.display = 'none';
             //--------BUENO(11012022)-----------window.document.apInf.submit();

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//funcion validar la ultima pestaña otros conceptos
var cuenta_error_totales_hono=0;
var todoscampos = document.querySelectorAll(".honocampo");
//var total_apoyo_suma = document.getElementById('total_apoyo_suma').value;
      todoscampos.forEach((h)=>{  
      
      var nombre_campo = h.name;
	  var porciones = nombre_campo.split('__');
                
            var nombre_x = porciones[1];
            var nombre_y = porciones[2];
            
      if(h.value=='' && !nombre_x=='' && !nombre_y==''){
		document.getElementById(nombre_campo).style.borderColor="#D0021B";
      	cuenta_error_totales_hono+=1; 
      } else {
      	cuenta_error_totales_hono==0;
      }
    })
    
	if(cuenta_error_totales_hono==0){
		//console.log('SI se puede guardar');
		//window.document.formul.submit();
		document.getElementById("rowError1").style.display = 'none';
		//INICIO Probar agregar funion de los conceptos//////////////////////////
		validarEnvio_conceptos();
			function validarEnvio_conceptos(){
				//console.log(`entro a la segunda funion de los conceptos`)
				var cuenta_error_totales=0;
				var todoscamposp = document.querySelectorAll(".honoconceptos");

				var apoyo_fin_sol_sc = document.getElementById('apoyo_fin_sol_sc').value; //Solicitado a la SC
				var sumhono = document.getElementById('sumhono').value; //Honorarios
				var suma_pestanas = document.getElementById('suma_pestanas').value; //Suma pestañas

			      todoscamposp.forEach((j)=>{  
			      
			      var nombre_campo = j.name;
				  var porciones = nombre_campo.split('__');
			            var nombre_x1 = porciones[1];
			            var nombre_y1 = porciones[2];
			            
			      if(j.value=='' && !nombre_x1=='' && !nombre_y1==''){
			        //console.log(`campo vacio: ${nombre_campo}`)
					document.getElementById(nombre_campo).style.borderColor="#D0021B";
			      	cuenta_error_totales+=1; 
			      } else {
			      	cuenta_error_totales==0;
			      }
			    })
			    /// INICIO TOTAL DE PESTAÑAS
				if(cuenta_error_totales==0){
				var sumando_1er_2da_montos = parseFloat(suma_pestanas) + parseFloat(sumhono);
					if(sumando_1er_2da_montos==apoyo_fin_sol_sc){
					console.log('SI se puede guardar');
					window.document.apInf.submit();	
					} else {
						$(window).scrollTop(300);
						document.getElementById("suma_pestanas").style.borderColor="#D0021B";
			            document.getElementById("sumhono").style.borderColor="#D0021B";
			            document.getElementById("total_2").style.borderColor="#D0021B";
						document.getElementById("errmayormontoSC").style.display = 'block';
					}	
			 	} else {
					//console.log('error en la captura');
					$(window).scrollTop(300);
					document.getElementById("rowError1").style.display = 'block';
					document.getElementById("rowBien1").style.display = 'none';
					cuenta_error_totales=1;
					}
			}
		//Fin Probar agregar funcion de los conceptos//////////////////////////
		} else {
			console.log('NO se puede guardar');
			$(window).scrollTop(300);
			document.getElementById("rowError1").style.display = 'block';
			return false;
		}	
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    } else {
              // 19012023 quite console.log('Entro 1 el importe de honorarios y conceptos es MAYOR (MAL) o igual al Apoyo financiero solicitado a la Secretaría de Cultura');
                document.getElementById("apoyo_general_paso").style.borderColor="#D0021B";
                document.getElementById("total_apoyo_suma").style.borderColor="#D0021B";
                // 19012023 quite document.getElementById("fin_suma").style.borderColor="#D0021B";
                //document.getElementById("rowError2").style.display = 'block'; 
                document.getElementById("errmayormontoSC").style.display = 'block'; 
                $(window).scrollTop(300);
                $(window).scrollLeft(10);
    }
    //FIN DE suma de honorarios y pestañas*/

 		/* 19012023 quite } else {
			console.log('error en la captura');
			$(window).scrollTop(300);
			document.getElementById("rowError1").style.display = 'block';
			document.getElementById("rowBien1").style.display = 'none';
			cuenta_error_totales=1;
		}
		//(FIN) Validación cronograma-----------------------------------------------------
 	}*/
	} else {	//////////20012023------jattttt
		//console.log('error en la captura campos de texto');
			$(window).scrollTop(300);
			document.getElementById("rowError").style.display = 'block';
			//document.getElementById("rowError").style.display = 'none';
			//document.getElementById("rowBien1").style.display = 'none';
			//cuenta_error=1;
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


/* Validacion de e-mail(inicio) */
function validarEmail_titular(idCampo) {

if(idCampo == 'Correo_tit'){

var CorreoEsc = document.getElementById('Correo_tit').value;
var CorreoEsc_campo = document.getElementById('Correo_tit');
var errCorreo_titAs= document.getElementById('errCorreo_titAs');

var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

  if (emailRegex.test(CorreoEsc)){
  //alert("La dirección de email " + CorreoEsc + " es correcta.");
  //emailOK.innerText = "correcto";
	errCorreo_titAs.className = 'form-text';
	//emailOK.innerText = "";
	CorreoEsc_campo.className = 'form-control' ;
	document.getElementById('emailOK_titular').innerText="";
  }else{
  	
  	document.getElementById('emailOK_titular').className = 'form-text form-text-error';
  	document.getElementById('emailOK_titular').innerText="La dirección de email " + CorreoEsc + " es incorrecta.";
	CorreoEsc_campo.value="";

	//alert("La dirección de email es incorrecta.");
  	errCorreo_titAs.className = 'form-text form-text-error';
  	// esc_arreglo.className = 'form-control form-control-error'; 
  	CorreoEsc_campo.className = 'form-control form-control-error' ;

  	var http_request = false;
  	var nombre = 'Correo_tit';
	var valor = document.getElementById('Correo_tit').value;

	/*console.log(nombre);
	console.log(valor);*/
  	var url_instancia='receptor_informacion_instancia.php?variable='+nombre+'&valor='+valor;
	hacerPeticion(url_instancia);	
		
  	}
  }
}
/* Validacion de e-mail(fin) */