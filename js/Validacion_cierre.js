function validarEnvio(){
	/* Ventena emergente */
	var rowError = document.getElementById('rowError');
	
	/* Variables de la primera parte */
	/* Primera fila */
	
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
	
	var disciplinaEsc = document.getElementById('disciplina');
	var errdisciplina= document.getElementById('errdisciplina');
	var errdisciplinaAs= document.getElementById('errdisciplinaAs');
	
	var objetivo_generalEsc = document.getElementById('objetivo_general');
	var errobjetivo_general= document.getElementById('errobjetivo_general');
	var errobjetivo_generalAs= document.getElementById('errobjetivo_generalAs');
	
	var meta_num_presentacionesEsc = document.getElementById('meta_num_presentaciones');
	var errmeta_num_presentaciones= document.getElementById('errmeta_num_presentaciones');
	var errmeta_num_presentacionesAs= document.getElementById('errmeta_num_presentacionesAs');
	
	var meta_num_publicoEsc = document.getElementById('meta_num_publico');
	var errmeta_num_publico= document.getElementById('errmeta_num_publico');
	var errmeta_num_publicoAs= document.getElementById('errmeta_num_publicoAs');
	
	var meta_num_municipioEsc = document.getElementById('meta_num_municipio');
	var errmeta_num_municipio= document.getElementById('errmeta_num_municipio');
	var errmeta_num_municipioAs= document.getElementById('errmeta_num_municipioAs');

	var meta_num_forosEsc = document.getElementById('meta_num_foros');
	var errmeta_num_foros= document.getElementById('errmeta_num_foros');
	var errmeta_num_forosAs= document.getElementById('errmeta_num_forosAs');
	
	var meta_num_artistasEsc = document.getElementById('meta_num_artistas');
	var errmeta_num_artistas= document.getElementById('errmeta_num_artistas');
	var errmeta_num_artistasAs= document.getElementById('errmeta_num_artistasAs');

	var meta_cantidad_gruposEsc = document.getElementById('meta_cantidad_grupos');
	var errmeta_cantidad_grupos= document.getElementById('errmeta_cantidad_grupos');
	var errmeta_cantidad_gruposAs= document.getElementById('errmeta_cantidad_gruposAs');

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

	var Infor_finan_apoyo_montoEsc = document.getElementById('Infor_finan_apoyo_monto');
	var errInfor_finan_apoyo_monto= document.getElementById('errInfor_finan_apoyo_monto');
	var errInfor_finan_apoyo_montoAs= document.getElementById('errInfor_finan_apoyo_montoAs');

	var Infor_finan_apoyo_costo_totalEsc = document.getElementById('Infor_finan_apoyo_costo_total');
	var errInfor_finan_apoyo_costo_total= document.getElementById('errInfor_finan_apoyo_costo_total');
	var errInfor_finan_apoyo_costo_totalAs= document.getElementById('errInfor_finan_apoyo_costo_totalAs');
	
	//FIN PESTAÑA SOLICITUD
	
	//INICIO PESTAÑA PROYECTO
	
	var responsable_op_nombreEsc = document.getElementById('responsable_op_nombre');
	var errresponsable_op_nombre= document.getElementById('errresponsable_op_nombre');
	var errresponsable_op_nombreAs= document.getElementById('errresponsable_op_nombreAs');
	
	var primer_apellido_opEsc	= document.getElementById('primer_apellido_op');
	var errprimer_apellido_op= document.getElementById('errprimer_apellido_op');
	var errprimer_apellido_opAs= document.getElementById('errprimer_apellido_opAs');
		
	var segundo_apellido_opEsc	= document.getElementById('segundo_apellido_op');
	var errcsegundo_apellido_op= document.getElementById('errsegundo_apellido_op');
	var errsegundo_apellido_opAs= document.getElementById('errsegundo_apellido_opAs');
	
	var cargo_opEsc			= document.getElementById('cargo_op');
	var errcargo_op= document.getElementById('errcargo_op');
	var errcargo_opAs= document.getElementById('errcargo_opAs');
	
	var lada_opEsc				= document.getElementById('lada_op');
	var errlada_op= document.getElementById('errlada_op');
	var errlada_opAs= document.getElementById('errlada_opAs');
	
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
	
	var cargo_admEsc				= document.getElementById('cargo_adm');
	var errcargo_adm= document.getElementById('errcargo_adm');
	var errcargo_admAs= document.getElementById('errcargo_admAs');
	
	var lada_admEsc				= document.getElementById('lada_adm');
	var errlada_adm= document.getElementById('errlada_adm');
	var errlada_admAs= document.getElementById('errlada_admAs');
	
	var telefono_fijo_admEsc		= document.getElementById('telefono_fijo_adm');
	var errtelefono_fijo_adm= document.getElementById('errtelefono_fijo_adm');
	var errtelefono_fijo_admAs= document.getElementById('errtelefono_fijo_admAs');
	
	var correo_electronico_admEsc	= document.getElementById('correo_electronico_adm');
	var errcorreo_electronico_adm= document.getElementById('errcorreo_electronico_adm');
	var errcorreo_electronico_admAs= document.getElementById('errcorreo_electronico_admAs');
	
	
	var desarrollo_proyecto_antecedenteEsc	= document.getElementById('desarrollo_proyecto_antecedente');
	var errdesarrollo_proyecto_antecedente= document.getElementById('errdesarrollo_proyecto_antecedente');
	var errdesarrollo_proyecto_antecedenteAs= document.getElementById('errdesarrollo_proyecto_antecedenteAs');


	var desarrollo_proyecto_diagnosticoEsc	= document.getElementById('desarrollo_proyecto_diagnostico');
	var errdesarrollo_proyecto_diagnostico= document.getElementById('errdesarrollo_proyecto_diagnostico');
	var errdesarrollo_proyecto_diagnosticoAs= document.getElementById('errdesarrollo_proyecto_diagnosticoAs');
	
	var desarrollo_proyecto_justificacionEsc	= document.getElementById('desarrollo_proyecto_justificacion');
	var errdesarrollo_proyecto_justificacion= document.getElementById('errdesarrollo_proyecto_justificacion');
	var errdesarrollo_proyecto_justificacionAs= document.getElementById('errdesarrollo_proyecto_justificacionAs');

	var desarrollo_proyecto_descripcionEsc	= document.getElementById('desarrollo_proyecto_descripcion');
	var errdesarrollo_proyecto_descripcion= document.getElementById('errdesarrollo_proyecto_descripcion');
	var errdesarrollo_proyecto_descripcionAs= document.getElementById('errdesarrollo_proyecto_descripcionAs');
	
	var desarrollo_proyecto_objetivos_especificosEsc	= document.getElementById('desarrollo_proyecto_objetivos_especificos');
	var errdesarrollo_proyecto_objetivos_especificos= document.getElementById('errdesarrollo_proyecto_objetivos_especificos');
	var errdesarrollo_proyecto_objetivos_especificosAs= document.getElementById('errdesarrollo_proyecto_objetivos_especificosAs');

	var desarrollo_proyecto_meta_cuantitativaEsc	= document.getElementById('desarrollo_proyecto_meta_cuantitativa');
	var errdesarrollo_proyecto_meta_cuantitativa= document.getElementById('errdesarrollo_proyecto_meta_cuantitativa');
	var errdesarrollo_proyecto_meta_cuantitativaAs= document.getElementById('errdesarrollo_proyecto_meta_cuantitativaAs');
	
	var desarrollo_proyecto_descripcion_impactoEsc	= document.getElementById('desarrollo_proyecto_descripcion_impacto');
	var errdesarrollo_proyecto_descripcion_impacto= document.getElementById('errdesarrollo_proyecto_descripcion_impacto');
	var errdesarrollo_proyecto_descripcion_impactoAs= document.getElementById('errdesarrollo_proyecto_descripcion_impactoAs');
	
	
	var poblacion_genero_hombreEsc	= document.getElementById('poblacion_genero_hombre');
	var errdesarrollo_proyecto_descripcion_impacto= document.getElementById('errdesarrollo_proyecto_descripcion_impacto');
	var errdesarrollo_proyecto_descripcion_impactoAs= document.getElementById('errdesarrollo_proyecto_descripcion_impactoAs');
		
	var poblacion_genero_mujerEsc		= document.getElementById('poblacion_genero_mujer');
	var errpoblacion_genero_mujer	= document.getElementById('errpoblacion_genero_mujer');
	var errpoblacion_genero_mujerAs	= document.getElementById('errpoblacion_genero_mujerAs');

	var poblacion_edad_0_12Esc			= document.getElementById('poblacion_edad_0_12');
	var errpoblacion_edad_0_12		= document.getElementById('errpoblacion_edad_0_12');
	var errpoblacion_edad_0_12As	= document.getElementById('errpoblacion_edad_0_12As');

	var poblacion_edad_13_17Esc		= document.getElementById('poblacion_edad_13_17');	
	var errpoblacion_edad_13_17		= document.getElementById('errpoblacion_edad_13_17');
	var errpoblacion_edad_13_17As	= document.getElementById('errpoblacion_edad_13_17As');

	var poblacion_edad_18_29Esc		= document.getElementById('poblacion_edad_18_29');	
	var errpoblacion_edad_18_29		= document.getElementById('errpoblacion_edad_18_29');
	var errpoblacion_edad_18_29As	= document.getElementById('errpoblacion_edad_18_29As');

	var poblacion_edad_30_59Esc		= document.getElementById('poblacion_edad_30_59');	
	var errpoblacion_edad_30_59		= document.getElementById('errpoblacion_edad_30_59');
	var errpoblacion_edad_30_59As	= document.getElementById('errpoblacion_edad_30_59As');

	var poblacion_edad_60Esc			= document.getElementById('poblacion_edad_60');	
	var errpoblacion_edad_60					= document.getElementById('errpoblacion_edad_60');
	var errpoblacion_edad_60As					= document.getElementById('errpoblacion_edad_60As');

	var poblacion_nivel_sin_escolaridadEsc	= document.getElementById('poblacion_nivel_sin_escolaridad');	
	var errpoblacion_nivel_sin_escolaridad	= document.getElementById('errpoblacion_nivel_sin_escolaridad');
	var errpoblacion_nivel_sin_escolaridadAs= document.getElementById('errpoblacion_nivel_sin_escolaridadAs');

	var poblacion_nivel_educ_basicaEsc		= document.getElementById('poblacion_nivel_educ_basica');	
	var errpoblacion_nivel_educ_basica	= document.getElementById('errpoblacion_nivel_educ_basica');
	var errpoblacion_nivel_educ_basicaAs= document.getElementById('errpoblacion_nivel_educ_basicaAs');

	var poblacion_nivel_educ_mediaEsc		= document.getElementById('poblacion_nivel_educ_media');	
	var errpoblacion_nivel_educ_media	= document.getElementById('errpoblacion_nivel_educ_media');
	var errpoblacion_nivel_educ_mediaAs	= document.getElementById('errpoblacion_nivel_educ_mediaAs');

	var poblacion_nivel_educ_superiorEsc	= document.getElementById('poblacion_nivel_educ_superior');	
	var errpoblacion_nivel_educ_superior	= document.getElementById('errpoblacion_nivel_educ_superior');
	var errpoblacion_nivel_educ_superiorAs	= document.getElementById('errpoblacion_nivel_educ_superiorAs');

	var poblacion_especific_reclusionEsc	= document.getElementById('poblacion_especific_reclusion');	
	var errpoblacion_especific_reclusion	= document.getElementById('errpoblacion_especific_reclusion');
	var errpoblacion_especific_reclusionAs	= document.getElementById('errpoblacion_especific_reclusionAs');

	var poblacion_especific_migrantesEsc	= document.getElementById('poblacion_especific_migrantes');	
	var errpoblacion_especific_migrantes	= document.getElementById('errpoblacion_especific_migrantes');
	var errpoblacion_especific_migrantesAs	= document.getElementById('errpoblacion_especific_migrantesAs');

	var poblacion_especific_indigenasEsc	= document.getElementById('poblacion_especific_indigenas');	
	var errpoblacion_especific_indigenas	= document.getElementById('errpoblacion_especific_indigenas');
	var errpoblacion_especific_indigenasAs	= document.getElementById('errpoblacion_especific_indigenasAs');

	var poblacion_especific_con_discapacidadEsc	= document.getElementById('poblacion_especific_con_discapacidad');
	var errpoblacion_especific_con_discapacidad		= document.getElementById('errpoblacion_especific_con_discapacidad');
	var errpoblacion_especific_con_discapacidadAs	= document.getElementById('errpoblacion_especific_con_discapacidadAs');
	
	var poblacion_especific_otrosEsc		= document.getElementById('poblacion_especific_otros');
	var errpoblacion_especific_otros	= document.getElementById('errpoblacion_especific_otros');
	var errpoblacion_especific_otrosAs	= document.getElementById('errpoblacion_especific_otrosAs');
	
	var estrategias_acciones_dar_conocerEsc		= document.getElementById('estrategias_acciones_dar_conocer');
	var errestrategias_acciones_dar_conocer		= document.getElementById('errestrategias_acciones_dar_conocer');
	var errestrategias_acciones_dar_conocerAs	= document.getElementById('errestrategias_acciones_dar_conocerAs');
	
	var descripcion_mecanismos_evaluacionEsc	= document.getElementById('descripcion_mecanismos_evaluacion');
	var errdescripcion_mecanismos_evaluacion	= document.getElementById('errdescripcion_mecanismos_evaluacion');
	var errdescripcion_mecanismos_evaluacionAs	= document.getElementById('errdescripcion_mecanismos_evaluacionAs');
	
	var estrategias_medios_radioEsc				= document.getElementById('estrategias_medios_radio');
	var estrategias_medios_televisionEsc		= document.getElementById('estrategias_medios_television');
	var estrategias_medios_internetEsc			= document.getElementById('estrategias_medios_internet');
	var estrategias_medios_redes_socialesEsc	= document.getElementById('estrategias_medios_redes_sociales');
	var estrategias_medios_prensaEsc			= document.getElementById('estrategias_medios_prensa');
	var estrategias_medios_folletos_postersEsc	= document.getElementById('estrategias_medios_folletos_posters');
	var estrategias_medios_espectacularesEsc	= document.getElementById('estrategias_medios_espectaculares');
	var estrategias_medios_perifoneoEsc			= document.getElementById('estrategias_medios_perifoneo');
	
	var err_muestra_check	= document.getElementById('errmuestra_error');
	var err_est_difucionAs	= document.getElementById('err_est_difucionAs');
	
	var crono_fechaacciones_aEsc = document.getElementById('crono_fechaacciones_a');
	var errcrono_fechaacciones_a = document.getElementById('errcrono_fechaacciones_a');
	var errcrono_fechaacciones_aAs = document.getElementById('errcrono_fechaacciones_aAs');
	
	var crono_acciones_aEsc = document.getElementById('crono_acciones_a');
	var errcrono_acciones_a = document.getElementById('errcrono_acciones_a');
	var errcrono_acciones_aAs = document.getElementById('errcrono_acciones_aAs');
	
	var crono_fechaacciones_bEsc = document.getElementById('crono_fechaacciones_b');
	var errcrono_fechaacciones_b = document.getElementById('errcrono_fechaacciones_b');
	var errcrono_fechaacciones_bAs = document.getElementById('errcrono_fechaacciones_bAs');
	
	var crono_acciones_bEsc = document.getElementById('crono_acciones_b');
	var errcrono_acciones_b = document.getElementById('errcrono_acciones_b');
	var errcrono_acciones_bAs = document.getElementById('errcrono_acciones_bAs');

	var crono_fechaacciones_cEsc = document.getElementById('crono_fechaacciones_c');
	var errcrono_fechaacciones_c = document.getElementById('errcrono_fechaacciones_c');
	var errcrono_fechaacciones_cAs = document.getElementById('errcrono_fechaacciones_cAs');
	
	var crono_acciones_cEsc = document.getElementById('crono_acciones_c');
	var errcrono_acciones_c = document.getElementById('errcrono_acciones_c');
	var errcrono_acciones_cAs = document.getElementById('errcrono_acciones_cAs');


//INICIO LUGARES

	var Nombreforo_aEsc = document.getElementById('Nombreforo_a');
	var errNombreforo_a = document.getElementById('errNombreforo_a');
	var errNombreforo_aAs = document.getElementById('errNombreforo_aAs');
	
	var Domicilioforo_aEsc = document.getElementById('Domicilioforo_a');
	var errDomicilioforo_a = document.getElementById('errDomicilioforo_a');
	var errDomicilioforo_aAs = document.getElementById('errDomicilioforo_aAs');
	
	var Descripcionlug_aEsc = document.getElementById('Descripcionlug_a');
	var errDescripcionlug_a = document.getElementById('errDescripcionlug_a');
	var errDescripcionlug_aAs = document.getElementById('errDescripcionlug_aAs');

	var Nombreforo_bEsc = document.getElementById('Nombreforo_b');
	var errNombreforo_b = document.getElementById('errNombreforo_b');
	var errNombreforo_bAs = document.getElementById('errNombreforo_bAs');
	
	var Domicilioforo_bEsc = document.getElementById('Domicilioforo_b');
	var errDomicilioforo_b = document.getElementById('errDomicilioforo_b');
	var errDomicilioforo_bAs = document.getElementById('errDomicilioforo_bAs');
	
	var Descripcionlug_bEsc = document.getElementById('Descripcionlug_b');
	var errDescripcionlug_b = document.getElementById('errDescripcionlug_b');
	var errDescripcionlug_bAs = document.getElementById('errDescripcionlug_bAs');
	
	var Nombreforo_cEsc = document.getElementById('Nombreforo_c');
	var errNombreforo_c = document.getElementById('errNombreforo_c');
	var errNombreforo_cAs = document.getElementById('errNombreforo_cAs');
	
	var Domicilioforo_cEsc = document.getElementById('Domicilioforo_c');
	var errDomicilioforo_c = document.getElementById('errDomicilioforo_c');
	var errDomicilioforo_cAs = document.getElementById('errDomicilioforo_cAs');
	
	var Descripcionlug_cEsc = document.getElementById('Descripcionlug_c');
	var errDescripcionlug_c = document.getElementById('errDescripcionlug_c');
	var errDescripcionlug_cAs = document.getElementById('errDescripcionlug_cAs');
	
//FIN LUGARES	

//INICIO PRESUPUESTO
//INICIO uno
	var Concepto_gasto_aEsc = document.getElementById('Concepto_gasto_a');
	var errConcepto_gasto_a = document.getElementById('errConcepto_gasto_a');
	var errConcepto_gasto_aAs = document.getElementById('errConcepto_gasto_aAs');
	
	var Fuente_finan_aEsc = document.getElementById('Fuente_finan_a');
	var errFuente_finan_a = document.getElementById('errFuente_finan_a');
	var errFuente_finan_aAs = document.getElementById('errFuente_finan_aAs');
	
	var Monto_unidad_aEsc = document.getElementById('Monto_unidad_a');
	var errMonto_unidad_a = document.getElementById('errMonto_unidad_a');
	var errMonto_unidad_aAs = document.getElementById('errMonto_unidad_aAs');
	
	var Porcentaje_aEsc = document.getElementById('Porcentaje_a');
	var errPorcentaje_a = document.getElementById('errPorcentaje_a');
	var errPorcentaje_aAs = document.getElementById('errPorcentaje_aAs');
//FIN uno
//INICIO dos
	var Concepto_gasto_bEsc = document.getElementById('Concepto_gasto_b');
	var errConcepto_gasto_b = document.getElementById('errConcepto_gasto_b');
	var errConcepto_gasto_bAs = document.getElementById('errConcepto_gasto_bAs');
	
	var Fuente_finan_bEsc = document.getElementById('Fuente_finan_b');
	var errFuente_finan_b = document.getElementById('errFuente_finan_b');
	var errFuente_finan_bAs = document.getElementById('errFuente_finan_bAs');
	
	var Monto_unidad_bEsc = document.getElementById('Monto_unidad_b');
	var errMonto_unidad_b = document.getElementById('errMonto_unidad_b');
	var errMonto_unidad_bAs = document.getElementById('errMonto_unidad_bAs');
	
	var Porcentaje_bEsc = document.getElementById('Porcentaje_b');
	var errPorcentaje_b = document.getElementById('errPorcentaje_b');
	var errPorcentaje_bAs = document.getElementById('errPorcentaje_bAs');
//FIN dos

//INICIO tres
	var Concepto_gasto_cEsc = document.getElementById('Concepto_gasto_c');
	var errConcepto_gasto_c = document.getElementById('errConcepto_gasto_c');
	var errConcepto_gasto_cAs = document.getElementById('errConcepto_gasto_cAs');
	
	var Fuente_finan_cEsc = document.getElementById('Fuente_finan_c');
	var errFuente_finan_c = document.getElementById('errFuente_finan_c');
	var errFuente_finan_cAs = document.getElementById('errFuente_finan_cAs');
	
	var Monto_unidad_cEsc = document.getElementById('Monto_unidad_c');
	var errMonto_unidad_c = document.getElementById('errMonto_unidad_c');
	var errMonto_unidad_cAs = document.getElementById('errMonto_unidad_cAs');
	
	var Porcentaje_cEsc = document.getElementById('Porcentaje_c');
	var errPorcentaje_c = document.getElementById('errPorcentaje_c');
	var errPorcentaje_cAs = document.getElementById('errPorcentaje_cAs');
//FIN tres
//FIN PRESUPUESTO	
		
	/* Boton de Envío */
	var btnEnvio = document.getElementById('submit1');

	/* Arreglo de variables (especificamente las cajas de texto)*/
	
	var campos = [
		nombre_festivalEsc,
		numero_ediciones_previasEsc,
		objetivo_generalEsc,
		meta_num_presentacionesEsc,
		meta_num_publicoEsc,
		meta_num_municipioEsc,
		meta_num_forosEsc,
		meta_num_artistasEsc,
		meta_cantidad_gruposEsc,
		periodo_realizacion_fecha_inicioEsc,
		periodo_realizacion_fecha_terminoEsc,
		Infor_finan_costo_montoEsc,
		Infor_finan_apoyo_montoEsc,
		Infor_finan_apoyo_costo_totalEsc,
		responsable_op_nombreEsc,
		primer_apellido_opEsc,
		cargo_opEsc,
		lada_opEsc,
		telefono_fijo_opEsc,
		Correo_electronico_opEsc,
		responsable_adm_nombreEsc,
		primer_apellido_admEsc,
		cargo_admEsc,
		lada_admEsc, 
		telefono_fijo_admEsc, 
		correo_electronico_admEsc,
		desarrollo_proyecto_antecedenteEsc,
		desarrollo_proyecto_diagnosticoEsc,
		desarrollo_proyecto_justificacionEsc,
		desarrollo_proyecto_descripcionEsc,
		desarrollo_proyecto_objetivos_especificosEsc,
		desarrollo_proyecto_meta_cuantitativaEsc,
		desarrollo_proyecto_descripcion_impactoEsc,
		poblacion_genero_hombreEsc,
		poblacion_genero_mujerEsc,
		poblacion_edad_0_12Esc,
		poblacion_edad_13_17Esc,
		poblacion_edad_18_29Esc,
		poblacion_edad_30_59Esc,
		poblacion_edad_60Esc,
		poblacion_nivel_sin_escolaridadEsc,
		poblacion_nivel_educ_basicaEsc,
		poblacion_nivel_educ_mediaEsc,
		poblacion_nivel_educ_superiorEsc,
		poblacion_especific_reclusionEsc,
		poblacion_especific_migrantesEsc,
		poblacion_especific_indigenasEsc,
		poblacion_especific_con_discapacidadEsc,
		poblacion_especific_otrosEsc,
		estrategias_acciones_dar_conocerEsc,
		descripcion_mecanismos_evaluacionEsc,
		crono_fechaacciones_aEsc,
		crono_fechaacciones_bEsc,
		crono_fechaacciones_cEsc,
		crono_acciones_aEsc,
		crono_acciones_bEsc,
		crono_acciones_cEsc,
		Nombreforo_aEsc,
		Domicilioforo_aEsc,
		Descripcionlug_aEsc,
		Nombreforo_bEsc,
		Domicilioforo_bEsc,
		Descripcionlug_bEsc,
		Nombreforo_cEsc,
		Domicilioforo_cEsc,
		Descripcionlug_cEsc,
		Concepto_gasto_aEsc,
		Fuente_finan_aEsc,
		Monto_unidad_aEsc,
		Porcentaje_aEsc,		
		Concepto_gasto_bEsc,		
		Fuente_finan_bEsc,
		Monto_unidad_bEsc,
		Porcentaje_bEsc,		
		Concepto_gasto_cEsc,		
		Fuente_finan_cEsc,
		Monto_unidad_cEsc,
		Porcentaje_cEsc
	];
	

	
	//Variables de los mensajes "Este campo es obligatorio"	
	var mensaje = [
		errnombre_festival,
		errnumero_ediciones_previas,
		errobjetivo_general,
		errmeta_num_presentaciones,
		errmeta_num_publico,
		errmeta_num_municipio,
		errmeta_num_foros,
		errmeta_num_artistas,
		errmeta_cantidad_grupos,
		errperiodo_realizacion_fecha_inicio,
		errperiodo_realizacion_fecha_termino,
		errInfor_finan_costo_monto,
		errInfor_finan_apoyo_monto,
		errInfor_finan_apoyo_costo_total,
		errresponsable_op_nombre,
		errprimer_apellido_op,
		errcargo_op,
		errlada_op,
		errtelefono_fijo_op,
		errCorreo_electronico_op,
		errresponsable_adm_nombre,
		errprimer_apellido_adm,
		errcargo_adm,
		errlada_adm, 
		errtelefono_fijo_adm, 
		errcorreo_electronico_adm,
		errdesarrollo_proyecto_antecedente,
		errdesarrollo_proyecto_diagnostico,
		errdesarrollo_proyecto_justificacion,
		errdesarrollo_proyecto_descripcion,
		errdesarrollo_proyecto_objetivos_especificos,
		errdesarrollo_proyecto_meta_cuantitativa,
		errdesarrollo_proyecto_descripcion_impacto,
		errpoblacion_genero_hombre,
		errpoblacion_genero_mujer,
		errpoblacion_edad_0_12,
		errpoblacion_edad_13_17,
		errpoblacion_edad_18_29,
		errpoblacion_edad_30_59,
		errpoblacion_edad_60,
		errpoblacion_nivel_sin_escolaridad,
		errpoblacion_nivel_educ_basica,
		errpoblacion_nivel_educ_media,
		errpoblacion_nivel_educ_superior,
		errpoblacion_especific_reclusion,
		errpoblacion_especific_migrantes,
		errpoblacion_especific_indigenas,
		errpoblacion_especific_con_discapacidad,
		errpoblacion_especific_otros,
		errestrategias_acciones_dar_conocer,
		errdescripcion_mecanismos_evaluacion,
		errcrono_fechaacciones_a,
		errcrono_fechaacciones_b,
		errcrono_fechaacciones_c,
		errcrono_acciones_a,
		errcrono_acciones_b,
		errcrono_acciones_c,
		errNombreforo_a,
		errDomicilioforo_a,
		errDescripcionlug_a,
		errNombreforo_b,
		errDomicilioforo_b,
		errDescripcionlug_b,
		errNombreforo_c,
		errDomicilioforo_c,
		errDescripcionlug_c,		
		errConcepto_gasto_a,
		errFuente_finan_a,
		errMonto_unidad_a,
		errPorcentaje_a,		
		errConcepto_gasto_b,
		errFuente_finan_b,
		errMonto_unidad_b,
		errPorcentaje_b,		
		errConcepto_gasto_c,
		errFuente_finan_c,
		errMonto_unidad_c,
		errPorcentaje_c
	];
	
	//Variables de los asteriscos
	
	var asteriscos = [
		errnombre_festivalAs,
		errnumero_ediciones_previasAs,
		errobjetivo_generalAs,
		errmeta_num_presentacionesAs,
		errmeta_num_publicoAs,
		errmeta_num_municipioAs,
		errmeta_num_forosAs,
		errmeta_num_artistasAs,
		errmeta_cantidad_gruposAs,
		errperiodo_realizacion_fecha_inicioAs,
		errperiodo_realizacion_fecha_terminoAs,
		errInfor_finan_costo_montoAs,
		errInfor_finan_apoyo_montoAs,
		errInfor_finan_apoyo_costo_totalAs,
		errresponsable_op_nombreAs,
		errprimer_apellido_opAs,
		errcargo_opAs,
		errlada_opAs,
		errtelefono_fijo_opAs,
		errCorreo_electronico_opAs,
		errresponsable_adm_nombreAs,
		errprimer_apellido_admAs,
		errcargo_admAs,
		errlada_admAs, 
		errtelefono_fijo_admAs, 
		errcorreo_electronico_admAs,
		errdesarrollo_proyecto_antecedenteAs,
		errdesarrollo_proyecto_diagnosticoAs,
		errdesarrollo_proyecto_justificacionAs,
		errdesarrollo_proyecto_descripcionAs,
		errdesarrollo_proyecto_objetivos_especificosAs,
		errdesarrollo_proyecto_meta_cuantitativaAs,
		errdesarrollo_proyecto_descripcion_impactoAs,
		errpoblacion_genero_hombreAs,
		errpoblacion_genero_mujerAs,
		errpoblacion_edad_0_12As,
		errpoblacion_edad_13_17As,
		errpoblacion_edad_18_29As,
		errpoblacion_edad_30_59As,
		errpoblacion_edad_60As,
		errpoblacion_nivel_sin_escolaridadAs,
		errpoblacion_nivel_educ_basicaAs,
		errpoblacion_nivel_educ_mediaAs,
		errpoblacion_nivel_educ_superiorAs,
		errpoblacion_especific_reclusionAs,
		errpoblacion_especific_migrantesAs,
		errpoblacion_especific_indigenasAs,
		errpoblacion_especific_con_discapacidadAs,
		errpoblacion_especific_otrosAs,
		errestrategias_acciones_dar_conocerAs,
		errdescripcion_mecanismos_evaluacionAs,
		errcrono_fechaacciones_aAs,
		errcrono_fechaacciones_bAs,
		errcrono_fechaacciones_cAs,
		errcrono_acciones_aAs,
		errcrono_acciones_bAs,
		errcrono_acciones_cAs,
		errNombreforo_aAs,
		errDomicilioforo_aAs,
		errDescripcionlug_aAs,
		errNombreforo_bAs,
		errDomicilioforo_bAs,
		errDescripcionlug_bAs,
		errNombreforo_cAs,
		errDomicilioforo_cAs,
		errDescripcionlug_cAs,
		errConcepto_gasto_aAs,
		errFuente_finan_aAs,
		errMonto_unidad_aAs,
		errPorcentaje_aAs,
		errConcepto_gasto_bAs,
		errFuente_finan_bAs,
		errMonto_unidad_bAs,
		errPorcentaje_bAs,
		errConcepto_gasto_cAs,
		errFuente_finan_cAs,
		errMonto_unidad_cAs,
		errPorcentaje_cAs
	];

	//Variables de los combobox
	var comboEsc = [
		info_financiera_categoriaEsc,
		disciplinaEsc
		//DocProbInstPerEsc	
	];
	var errcomboAs =[
		errinfo_financiera_categoriaAs,
		errdisciplinaAs
		//errDocProbInstPerAs
	];
	var errcombo =[
		errinfo_financiera_categoria,
		errdisciplina
		//errDocProbInstPer
	];	
	

		/* Contador */
	var i=0;

	//Variable que contiene el arreglo comboBox
	var selec = comboEsc;

	//El capturador de errores
	var cuenta_error=0;
	
	var extra_for = 1;
	var cuenta_campo = 0;
	

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

            }else if(tomar_valor_a != ''){
				
            	var err_arreglo = mensaje[i];
				var as_arreglo = asteriscos[i];
				var esc_arreglo = campos[i];

				err_arreglo.style.display = 'none';
				as_arreglo.className = 'control-label';
                esc_arreglo.className = 'form-control';
            }

			for(var j=0; j < selec.length ; j++){
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

			}//fin del ciclo for interno
			
			if(estrategias_medios_radioEsc.checked==true || estrategias_medios_televisionEsc.checked==true || estrategias_medios_internetEsc.checked==true || estrategias_medios_redes_socialesEsc.checked==true || estrategias_medios_prensaEsc.checked==true || estrategias_medios_folletos_postersEsc.checked==true || estrategias_medios_espectacularesEsc.checked==true || estrategias_medios_perifoneo.checked==true){
					
					err_est_difucionAs.className = 'form-text' ;
					err_muestra_check.style.display = 'none';
				
				} else {					
					err_est_difucionAs.className = 'form-text form-text-error' ;
					err_muestra_check.style.display = 'block';
					
					  cuenta_error++;
					
					}
	}//fin del ciclo for */

	
	
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


/* Validacion de e-mail(inicio) */
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

/* Validacion de e-mail(fin) */



