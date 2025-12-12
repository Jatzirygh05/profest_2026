<?php // INICIO informacion para acceso al sistema
            $sql = "SELECT * FROM `usuarios` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
            $resultado = mysqli_query($con, $sql);
            $num_resultados = mysqli_num_rows($resultado);
         
            for ($i=0; $i <$num_resultados; $i++){
              $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
              $nombrec = $row["nombre_usuario_reg_proyecto"];
              $tipo_instancia=$row['tipo_instancia'];
              $nombre_instancia_postulante=$row['nombre_instancia_postulante'];
              $nombre_titular=$row['nombre_titular'];
              $grado_academico=$row['grado_academico'];
              $cargo=$row['cargo'];
              $cp=$row['cp'];
              $estado=$row['estado'];
              $Municipio_AlcRepLeg=$row['municio_alcaldia'];
              $ColoniaRepLeg=$row['colonia'];
              $calle=$row['calle'];
              $no_ext=$row['no_ext'];
              $no_int=$row['no_int'];
              $telefono_fijo=$row['telefono_fijo'];
              $extension=$row['extension'];
              $Correo_tit=$row['Correo_tit'];
              $CLUNI=$row['CLUNI'];
            }
             // FIN informacion para acceso al sistema   
            // INICIO PESTAÑA 'Solicitud'
            $sql_consulta = "SELECT * FROM `solicitud` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
            $resultado_consulta = mysqli_query($con, $sql_consulta);
            $num_resultados_solicitud = mysqli_num_rows($resultado_consulta);
            for ($j=0; $j <$num_resultados_solicitud; $j++){
                $row_sol = mysqli_fetch_array($resultado_consulta, MYSQLI_ASSOC);
            
                $nombre_festival = $row_sol["nombre_festival"];
                $numero_ediciones_previas = $row_sol["numero_ediciones_previas"];
                $disciplina_2022=$row_sol["disciplina_2022"];
                $objetivo_general = $row_sol["objetivo_general"];
                $objetivo_general = str_replace("<br>", "\n", $objetivo_general);
                
                $pagina_web_festival = $row_sol["pagina_web_festival"];
                $facebook_festival = $row_sol["facebook_festival"];
                $twitter_festival = $row_sol["twitter_festival"];
                
                $meta_num_presentaciones = $row_sol["meta_num_presentaciones"];
                $meta_num_publico = $row_sol["meta_num_publico"];
                $meta_num_municipio = $row_sol["meta_num_municipio"];
                $meta_num_foros = $row_sol["meta_num_foros"];
                $meta_num_artistas = $row_sol["meta_num_artistas"];
                $meta_cantidad_grupos = $row_sol["meta_cantidad_grupos"];
                $meta_num_actividades_academicas = $row_sol["meta_num_actividades_academicas"];
               
                //2025
                $meta_num_presentaciones_alcanzada  = $row_sol["meta_num_presentaciones_alcanzada"];
                $meta_num_publico_alcanzada         = $row_sol["meta_num_publico_alcanzada"];
                $meta_num_municipio_alcanzada       = $row_sol["meta_num_municipio_alcanzada"];
                $meta_num_foros_alcanzada           = $row_sol["meta_num_foros_alcanzada"];
                $meta_num_artistas_alcanzada        = $row_sol["meta_num_artistas_alcanzada"];
                $meta_cantidad_grupos_alcanzada            = $row_sol["meta_cantidad_grupos_alcanzada"];
                $meta_num_actividades_academicas_alcanzada = $row_sol["meta_num_actividades_academicas_alcanzada"];
                $meta_act_creadores_num_cine_mex           = $row_sol["meta_act_creadores_num_cine_mex"];
                $meta_act_creadores_num_cine_mex_alcanzada = $row_sol["meta_act_creadores_num_cine_mex_alcanzada"];
                $meta_otro_2025                     = $row_sol["meta_otro_2025"];
                $meta_otro_2025_alcanzada           = $row_sol["meta_otro_2025_alcanzada"];
                $meta_otro_alcanzada_2024           = $row_sol["meta_otro_alcanzada_2024"];
                $meta_otro_alcanzada_2024_alcanzada = $row_sol["meta_otro_alcanzada_2024_alcanzada"];
                //2025
                
                $alcance_programacion = $row_sol["alcance_programacion"];
                $periodo_realizacion_fecha_inicio = $row_sol["periodo_realizacion_fecha_inicio"];
                $periodo_realizacion_fecha_termino = $row_sol["periodo_realizacion_fecha_termino"];
                
                $Info_financiera_categoria = $row_sol["Info_financiera_categoria"];
                $Infor_finan_apoyo_monto = $row_sol["Infor_finan_apoyo_monto"];
                $Infor_finan_apoyo_costo_total = $row_sol["Infor_finan_apoyo_costo_total"];
                $Infor_finan_costo_monto = $row_sol["Infor_finan_costo_monto"];
                $monto_coinversion = $row_sol["monto_coinversion"];
                
                $cerrrado  = $row_sol["cerrrado"]; 
                $fecha_hora_cierre_total = $row_sol["fecha_hora_cierre_total"];
            }
            
            
        // FIN PESTAÑA 'Solicitud'
                  
            if($cerrrado==1 and $fecha_hora_cierre_total!='0000-00-00 00:00:00'){ 
                echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=finsol_continua_proceso.php'>"; 
                exit; 
            }
                
            // INICIO PESTAÑA 'Proyecto 1er'             
            $sql_consulta_proy = "SELECT * FROM `proyecto` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
            $resultado_consulta_proy = mysqli_query($con, $sql_consulta_proy);
            $num_resultados_proyecto = mysqli_num_rows($resultado_consulta_proy);
            for ($k=0; $k <$num_resultados_proyecto; $k++){
                $row_proy = mysqli_fetch_array($resultado_consulta_proy, MYSQLI_ASSOC);
                
                $responsable_op_nombre                      = $row_proy["responsable_op_nombre"];
                $primer_apellido_op                         = $row_proy["primer_apellido_op"];
                $segundo_apellido_op                        = $row_proy["segundo_apellido_op"];
                $cargo_op                                   = $row_proy["cargo_op"];
                $lada_op                                    = $row_proy["lada_op"];
                $telefono_fijo_op                           = $row_proy["telefono_fijo_op"];
                $extension_op                               = $row_proy["extension_op"];
                $telefono_movil_op                          = $row_proy["telefono_movil_op"];
                $Correo_electronico_op                      = $row_proy["Correo_electronico_op"];
                $responsable_adm_nombre                     = $row_proy["responsable_adm_nombre"];
                $primer_apellido_adm                        = $row_proy["primer_apellido_adm"];
                $segundo_apellido_adm                       = $row_proy["segundo_apellido_adm"];
                $cargo_adm                                  = $row_proy["cargo_adm"];
                $lada_adm                                   = $row_proy["lada_adm"];
                $telefono_fijo_adm                          = $row_proy["telefono_fijo_adm"];
                $extension_adm                              = $row_proy["extension_adm"];
                $telefono_movil_adm                         = $row_proy["telefono_movil_adm"];
                $correo_electronico_adm                     = $row_proy["correo_electronico_adm"];
                
                $desarrollo_proyecto_antecedente            = $row_proy["desarrollo_proyecto_antecedente"];
                $desarrollo_proyecto_diagnostico            = $row_proy["desarrollo_proyecto_diagnostico"];
                $desarrollo_proyecto_justificacion          = $row_proy["desarrollo_proyecto_justificacion"];
                $desarrollo_proyecto_descripcion            = $row_proy["desarrollo_proyecto_descripcion"];


                //2025 (inicio)
                $proy_desc_pob_aud_pubobj_festival          = $row_proy["proy_desc_pob_aud_pubobj_festival"];
                $proy_noved_ed_2025                         = $row_proy["proy_noved_ed_2025"];
                $proy_esp_infra_foros                       = $row_proy["proy_esp_infra_foros"];
                $proy_vinc_org_obtrecursos                  = $row_proy["proy_vinc_org_obtrecursos"];
                $proy_fav_itinerancia                       = $row_proy["proy_fav_itinerancia"];
                $proy_acciones                              = $row_proy["proy_acciones"];
                $proy_info_adic                             = $row_proy["proy_info_adic"];

                //***********/

                $proy_desc_pob_aud_pubobj_festival    = str_replace("<br>", "\n", $proy_desc_pob_aud_pubobj_festival);
                $proy_noved_ed_2025    = str_replace("<br>", "\n", $proy_noved_ed_2025);
                $proy_esp_infra_foros    = str_replace("<br>", "\n", $proy_esp_infra_foros);
                $proy_vinc_org_obtrecursos    = str_replace("<br>", "\n", $proy_vinc_org_obtrecursos);
                $proy_fav_itinerancia    = str_replace("<br>", "\n", $proy_fav_itinerancia);
                $proy_acciones    = str_replace("<br>", "\n", $proy_acciones);
                $proy_info_adic    = str_replace("<br>", "\n", $proy_info_adic);
                //2025 (fin)
                
                $desarrollo_proyecto_meta_cuantitativa      = $row_proy["desarrollo_proyecto_meta_cuantitativa"];
                $desarrollo_proyecto_descripcion_impacto    = $row_proy["desarrollo_proyecto_descripcion_impacto"];
                $acciones_festival_medio_ambiente          = $row_proy["acciones_festival_medio_ambiente"];
                $acciones_festival_medio_ambiente    = str_replace("<br>", "\n", $acciones_festival_medio_ambiente);

                $id_entidad_proyecto = $row_proy["id_entidad_proyecto"];
                $desarrollo_proyecto_antecedente    = str_replace("<br>", "\n", $desarrollo_proyecto_antecedente);
                $desarrollo_proyecto_justificacion  = str_replace("<br>", "\n", $desarrollo_proyecto_justificacion);
                $desarrollo_proyecto_diagnostico    = str_replace("<br>", "\n", $desarrollo_proyecto_diagnostico); 
                $desarrollo_proyecto_descripcion    = str_replace("<br>", "\n", $desarrollo_proyecto_descripcion);
                $desarrollo_proyecto_meta_cuantitativa      = str_replace("<br>", "\n", $desarrollo_proyecto_meta_cuantitativa); 
                $desarrollo_proyecto_descripcion_impacto    = str_replace("<br>", "\n", $desarrollo_proyecto_descripcion_impacto); 
                $desarrollo_proyecto_rebrote_covid      = str_replace("<br>", "\n", $desarrollo_proyecto_rebrote_covid);
                
                $estrategias_medios_otros_nombre    = $row_proy["estrategias_medios_otros_nombre"];
                $estrategias_acciones_dar_conocer   = $row_proy["estrategias_acciones_dar_conocer"];
                $descripcion_mecanismos_evaluacion  = $row_proy["descripcion_mecanismos_evaluacion"];
                
                $estrategias_medios_otros_nombre    = str_replace("<br>", "\n", $estrategias_medios_otros_nombre); 
                $estrategias_acciones_dar_conocer   = str_replace("<br>", "\n", $estrategias_acciones_dar_conocer); 
                $descripcion_mecanismos_evaluacion  = str_replace("<br>", "\n", $descripcion_mecanismos_evaluacion); 
                
                $organigrama_nombre1    = $row_proy["organigrama_nombre1"];
                $organigrama_cargo1     = $row_proy["organigrama_cargo1"];
                $organigrama_funciones1 = $row_proy["organigrama_funciones1"];
                            
                $organigrama_nombre2    = $row_proy["organigrama_nombre2"];
                $organigrama_cargo2     = $row_proy["organigrama_cargo2"];
                $organigrama_funciones2 = $row_proy["organigrama_funciones2"];
                                
                $organigrama_nombre3    = $row_proy["organigrama_nombre3"];
                $organigrama_cargo3     = $row_proy["organigrama_cargo3"];
                $organigrama_funciones3 = $row_proy["organigrama_funciones3"];
                                
                $organigrama_nombre4    = $row_proy["organigrama_nombre4"];
                $organigrama_cargo4     = $row_proy["organigrama_cargo4"];
                $organigrama_funciones4 = $row_proy["organigrama_funciones4"];
                                
                $organigrama_nombre5    = $row_proy["organigrama_nombre5"];
                $organigrama_cargo5     = $row_proy["organigrama_cargo5"];
                $organigrama_funciones5 = $row_proy["organigrama_funciones5"];

                $organigrama_nombre6    = $row_proy["organigrama_nombre6"];
                $organigrama_cargo6     = $row_proy["organigrama_cargo6"];
                $organigrama_funciones6 = $row_proy["organigrama_funciones6"];
                                
                $organigrama_nombre7    = $row_proy["organigrama_nombre7"];
                $organigrama_cargo7     = $row_proy["organigrama_cargo7"];
                $organigrama_funciones7 = $row_proy["organigrama_funciones7"];
                                
                $organigrama_nombre8    = $row_proy["organigrama_nombre8"];
                $organigrama_cargo8     = $row_proy["organigrama_cargo8"];
                $organigrama_funciones8 = $row_proy["organigrama_funciones8"];

                $entidades_a1   = $row_proy["entidades_a1"];
                $entidades_a2   = $row_proy["entidades_a2"];
                $entidades_a3   = $row_proy["entidades_a3"];
                $entidades_a4   = $row_proy["entidades_a4"];
                $entidades_a5   = $row_proy["entidades_a5"];
                $entidades_a6   = $row_proy["entidades_a6"];
                $entidades_a7   = $row_proy["entidades_a7"];
                $entidades_a8   = $row_proy["entidades_a8"];
                $entidades_a9   = $row_proy["entidades_a9"];
                $entidades_a10  = $row_proy["entidades_a10"];


                $Concepto_gasto_a= $row_proy["Concepto_gasto_a"];
                $Fuente_finan_a = $row_proy["Fuente_finan_a"];
                $Monto_unidad_a = $row_proy["Monto_unidad_a"];
                $Porcentaje_a   = $row_proy["Porcentaje_a"];
                
                $Concepto_gasto_b= $row_proy["Concepto_gasto_b"];
                $Fuente_finan_b = $row_proy["Fuente_finan_b"];
                $Monto_unidad_b = $row_proy["Monto_unidad_b"];      
                $Porcentaje_b   = $row_proy["Porcentaje_b"];
                
                $Concepto_gasto_c= $row_proy["Concepto_gasto_c"];
                $Fuente_finan_c = $row_proy["Fuente_finan_c"];
                $Monto_unidad_c = $row_proy["Monto_unidad_c"];
                $Porcentaje_c   = $row_proy["Porcentaje_c"];
                
                $suma_invalida = $row_proy["suma_invalida"];
                $suma_porinvalida = $row_proy["suma_porinvalida"];

                $descripcion_linea_curotorial = $row_proy["descripcion_linea_curotorial"];
                $descripcion_linea_curotorial = str_replace("<br>", "\n", $descripcion_linea_curotorial);
            }
            // FIN PESTAÑA 'Proyecto 1er'     
            // INICIO PESTAÑA 'Proyecto 2do.' 
            $sql_consulta_proy2 = "SELECT * FROM `proyecto_parte2` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
            $resultado_consulta_proy2 = mysqli_query($con, $sql_consulta_proy2);
            $num_resultados_proyecto2 = mysqli_num_rows($resultado_consulta_proy2);
            for ($k2=0; $k2 <$num_resultados_proyecto2; $k2++){
                $row_proy2 = mysqli_fetch_array($resultado_consulta_proy2, MYSQLI_ASSOC);
                
                $nombre_dir                         = $row_proy2["nombre_dir"];
                $primer_apellido_dir        = $row_proy2["primer_apellido_dir"];
                $segundo_apellido_dir   = $row_proy2["segundo_apellido_dir"];
                $cargo_dir                          = $row_proy2["cargo_dir"];
                $telefono_fijo_dir          = $row_proy2["telefono_fijo_dir"];
                $extension_dir                  = $row_proy2["extension_dir"];
                $telefono_movil_dir         = $row_proy2["telefono_movil_dir"];
                $Correo_electronico_dir = $row_proy2["Correo_electronico_dir"];
                $breve_semblanza_director = $row_proy2["breve_semblanza_director"];
                $breve_semblanza_op             = $row_proy2["breve_semblanza_op"];
                $breve_semblanza_adm            = $row_proy2["breve_semblanza_adm"];
            } 
          
            // FIN PESTAÑA 'Proyecto 2do.'

            
       $query_cat_conceptos="SELECT * FROM `catalogo_concepto_gastos`";
       $result_query_cat_conceptos = mysqli_query($con, $query_cat_conceptos);
       if($result_query_cat_conceptos)
          $combobit="";
          $num_query_cat_conceptos = mysqli_num_rows($result_query_cat_conceptos);
            for ($k3=0; $k3 <$num_query_cat_conceptos; $k3++){
                  $renglon = mysqli_fetch_array($result_query_cat_conceptos, MYSQLI_ASSOC);
                  $valor=$renglon['id_gasto'];
                  $imp_texto=$renglon['concepto_gasto'];
                  $combobit .= "<option value=".$valor.">".$imp_texto."</option>\n";
            }
 
           //INICIO código CRONOGRAMA, PRESUPUESTO Y PROGRAMACIÓN 
           $oper2=0;
           $sql_sum_cant = "SELECT (costo_unitario_imp_incluidos * unidad) as multiplica 
            FROM `reque_v2_1_2` WHERE reque_v2_1_2.clave_usuario LIKE '".$cve_user."'"; 
            $resultado_sql_sum_cant = mysqli_query($con, $sql_sum_cant);
            $num_sql_sum_cant = mysqli_num_rows($resultado_sql_sum_cant);
            for ($z=0; $z <$num_sql_sum_cant; $z++){
              $row_sql_sum_cant = mysqli_fetch_array($resultado_sql_sum_cant, MYSQLI_ASSOC);
              $multiplica = $row_sql_sum_cant["multiplica"];
              $oper2 = $multiplica + $oper2;
            } 
         
           if($oper2==""){
             $oper3 = 0;
            } else {
             $oper3 = $oper2;
            }
            $suma_pestanas = $oper3;
            //FIN código CRONOGRAMA, PRESUPUESTO Y PROGRAMACIÓN    