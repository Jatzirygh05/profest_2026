<?php
      $sql_dat = "SELECT * FROM `solicitud` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
      $resultado_dat = mysqli_query($con, $sql_dat);
      $num_resultados_dat = mysqli_num_rows($resultado_dat);
        for ($y=0; $y <$num_resultados_dat; $y++)
        {
          $row_dat = mysqli_fetch_array($resultado_dat);
          $Infor_finan_costo_monto = $row_dat["Infor_finan_costo_monto"];
          $Infor_finan_apoyo_monto = $row_dat["Infor_finan_apoyo_monto"];

         /* if($row_dat['disciplina_artes_visuales_v2']==1){
                $sel_disciplina_artes_visuales_v2=',5';
              } else {
                $sel_disciplina_artes_visuales_v2='';
              }

          if($row_dat['disciplina_gastronomia_v2']==1){
               $sel_disciplina_gastronomia_v2=",6";
              } else {
               $sel_disciplina_gastronomia_v2='';
              }

          if($row_dat['disciplina_cinematografia_v3']==1){
               $sel_disciplina_cinematografia_v3=",7";
              } else {
               $sel_disciplina_cinematografia_v3='';
              }*/
        }

    /*$arreglo_disciplina = "1,2,3,4$sel_disciplina_artes_visuales_v2$sel_disciplina_gastronomia_v2$sel_disciplina_cinematografia_v3";
      and tipo in ($arreglo_disciplina)*/
 
?>
      <script type="text/javascript" src="js/suma_montos_pestanas_traduccion_v3.js"></script>
      <!--script type="text/javascript" src="js/Validacion_honorarios_v3_2dparte.js"></script>
      <script type="text/javascript" src="js/suma_montos_pestanas_plaataformas_v3.js"></script>
      <script type="text/javascript" src="js/suma_montos_pestanas_pagosderechosseg_v3.js"></script>
      <script type="text/javascript" src="js/suma_montos_pestanas_reqmontajeobra_v3.js"></script>
      <script type="text/javascript" src="js/suma_montos_pestanas_insumosgastro_v3.js"></script>
      <script type="text/javascript" src="js/suma_montos_pestanas_paqueteria_v3.js"></script-->
      <script type="text/javascript" src="js/soloLetras.js"></script>
  <!--form name="formul" action="guardar_solicitud.php" method="post"-->

     <div class="container">
            <div class="row">
              <div class="col-md-8"> 
                <h3>Presupuesto PROFEST</h3>
              </div>
            </div>
          <?php $total_proyecto=$Infor_finan_apoyo_monto; //Apoyo financiero solicitado a la Secretaría de Cultura ?>
          <!--div class="row">
            <div class="col-sm-4">
              <strong>Monto solicitado a la Secretaría de Cultura:</strong>
            </div>
            <div class="col-sm-4">
<input type="text" class="form-control" name="apoyo_fin_sol_sc" id="apoyo_fin_sol_sc" value="<?php echo $total_proyecto; ?>" readonly>
            </div>
          </div-->
          <?php //INICIO honorarios_artisticos_academicos VALOR CAPTURADO
           /* $query_user10 = "SELECT sum(monto_honorarios_con_impuestos_incluidos_mn) as sumhono
            FROM honorarios_artisticos_academicos_v2 WHERE clave_usuario='".$cve_user."';";                          
            $res_user10 =  mysqli_query($con, $query_user10);
            $fila10=mysqli_fetch_array($res_user10, MYSQLI_ASSOC);
               //FIN honorarios_artisticos_academicos VALOR CAPTURADO

            $total_suma_todo = $suma_pestanas + $fila10['sumhono'];*/
          ?>
          <!-- (inicio) se uso para convocatoria 2022: div class="row">
            <div class="col-sm-4">
              <strong>Total de honorarios artísticos y académicos:</strong>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="sumhono" id="sumhono" value="<?php echo $fila10['sumhono']; ?>" readonly>
            </div>
          </div (inicio) se uso para convocatoria 2022-->
          <!--div class="row">
            <div class="col-sm-4">
              <strong>Suma de conceptos:</strong>
            </div>
            <div class="col-sm-4">
 <input type="text" class="form-control" name="suma_pestanas" id="suma_pestanas" value="<?php echo $suma_pestanas; ?>" readonly>
            </div>
          </div-->
          <div class="row">
            <div class="col-sm-4">
              <strong>Monto solicitado a la Secretaría de Cultura:</strong>
            </div>
            <div class="col-sm-4">
 <input type="text" class="form-control" name="total_2" id="total_2" value="<?php echo $Infor_finan_apoyo_monto; ?>" readonly>
            </div>
          </div>

          <div class="row">
            <br>
            <div class="col-md-11">
              <p>Usa este apartado únicamente para detallar la distribución del recurso solicitado a la Secretaría de Cultura. La suma total de los conceptos registrados deberá ser igual a la cantidad capturada en el apartado de <strong>Monto solicitado a la Secretaría de Cultura</strong>, que figura en la pestaña de Información Financiera.</p>
              <p>Te invitamos a consultar el apartado de Características de los recursos de la Convocatoria, para conocer los conceptos en los que puede destinarse el recurso PROFEST, según la disciplina de tu proyecto.</p>
              <p>Todos los gastos deberán contemplar el pago de impuestos.</p>
            </div>
          </div>
            <div class="row " id="rowError1" name="rowError1" style="display:none">
              <div class="col-md-12">
                  <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada,<br>
                  * Todos los campos son obligatorios.</div>
              </div>
            </div>
            <div class="row " id="rowBien1" name="rowBien1" style="display:none">
                <div class="col-md-12">
                  <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta.</div>
                </div>
            </div>

          <div class="row">
          <br>
            <div class="col-md-11"><hr class="red small-margin"></div>
          </div>
      </div>

      <!--INICIO CONTENIDO PESTAÑAS-->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
                 <table class="table-responsive">
                       <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>#</td>
                        <!-- 20122024 td>Tipo de gasto<samp id="errConcepto_gasto_aAs" name="errConcepto_gasto_aAs" class="control-label">*</samp>:</td-->
                        <td>Concepto<samp id="errConcepto_gasto_aAs" name="errConcepto_gasto_aAs" class="control-label">*</samp>:</td>
                        <!-- 20122024 td>Unidad<samp id="errFuente_finan_aAs" name="errFuente_finan_aAs" class="control-label">*</samp>:</td-->
                        <td>Monto total con impuestos incluidos (M.N.)<samp id="errPorcentaje_aAs" name="errPorcentaje_aAs" class="control-label">*</samp>:</td>
                      </tr>
                      <tr>
                      <?php
                        $query_user2="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' order by consec;";                          
                        $res_user2 = mysqli_query($con, $query_user2);
                        $cuantos=mysqli_num_rows($res_user2);
                        $h=0;
                        $Concepto_gasto=0;
                        while ($fila2=mysqli_fetch_array($res_user2, MYSQLI_ASSOC)){
                            $h=$h+1;
                            $id     = $fila2['consec'];
                            //$tipogasto = $fila2['tipogasto'];
                            $concepto = $fila2['concepto'];
                            //$unidad   = $fila2['unidad'];
                            $monto_tot_imp_incluidos = $fila2['monto_tot_imp_incluidos'];
                            $monto_tot_imp_incluidos1  =  number_format($monto_tot_imp_incluidos, 2, '.', '');

                            $total_esp_mue_inmue1  =  $monto_tot_imp_incluidos + $total_esp_mue_inmue1;
                            $total_esp_tra_1  =  number_format($total_esp_mue_inmue1, 2, '.', '');
                      ?>
                        <td><?php echo $h; ?><input type="hidden" name="id__<?php echo $h; ?>__<?php echo $id; ?>" id="id__<?php echo $h; ?>__<?php echo $id; ?>" value="<?=$id?>">
                        <input type="hidden" name="cuantos_INSERT" id="cuantos_INSERT" value="<?=$cuantos?>">
                        </td>
                        <td>
                            <input class='form-control honoconceptos' name='conceptos__<?php echo $h; ?>__<?php echo $id; ?>' id='conceptos__<?php echo $h; ?>__<?php echo $id; ?>' value="<?php echo $concepto; ?>" onkeypress="return soloLetras(event)" >
                        </td>
                        <td>
      <input class="form-control honoconceptos" id="monto_tot__<?php echo $h; ?>" name="monto_tot__<?php echo $h; ?>" value="<?php echo $monto_tot_imp_incluidos1; ?>" placeholder="0.00" type="number" onblur="suma_vertical(<?php echo $h; ?>);">
                        </td>
                         <td><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="location.href='elimin_reg_conceptos_v3.php?clave=<?php echo $id; ?>'"></span></td>
                      </tr>
                    <?php
                           }
                    $cuantos = $cuantos+1;
                     /*for($i=$cuantos;$i<=50;$i++){*/

                for($i=$cuantos;$i<=50;$i++){ 
                    $rs = "SELECT MAX(consec) AS id FROM reque_v2_1_2 where clave_usuario='".$cve_user."' order by consec";
                         $rs1= mysqli_query($con, $rs);
                          if ($row = mysqli_fetch_row($rs1)) {
                          $id_OBTENIDO = trim($row[12]);
                          }
                          $seguido = $id_OBTENIDO+$i;
                    ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                          <input class='form-control honoconceptos' name='conceptos__<?php echo $seguido; ?>' id='conceptos__<?php echo $seguido; ?>' onkeypress="return soloLetras(event)">
                        </td>
                        <td>
                        <input class="form-control honoconceptos" id="monto_tot__<?php echo $i; ?>" name="monto_tot__<?php echo $i?>" placeholder="0.00" type="text"  onblur="suma_vertical(<?php echo $i; ?>);">
                        </td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td colspan="2" align="right">Subtotal:</td>
                        <td><input type="text" class="form-control" name="total_esp_tra" id="total_esp_tra" value="<?php echo $total_esp_tra_1; ?>" placeholder="0.00" readonly>
                        </td>
                      </tr>
                    </table>
          </div>
      <?php /*div class="row">
        <div class="col-md-11">
          <div class="form-group clearfix"> 
            <div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>
              <div class="pull-right">
                <input class="btn btn-primary" type="button" value="Guardar" id="submit1" name="submit1" onClick="return validarEnvio_honorarios();" ?>
              </div>
            </div>
          </div>
      </div*/?>

 <input type="hidden" name="sel_disc_artes_vis" id="sel_disc_artes_vis" value="<?php echo $sel_disciplina_artes_visuales_v2; ?>">
 <input type="hidden" name="sel_disc_gastro_v2" id="sel_disc_gastro_v2" value="<?php echo $sel_disciplina_gastronomia_v2; ?>">
 <input type="hidden" name="sel_disc_cinem_v3" id="sel_disc_cinem_v3" value="<?php echo $sel_disciplina_cinematografia_v3; ?>">
<!--/form-->
<!--FIN CONTENIDO PESTAÑAS-->
<script type="text/javascript">
  var set_pc = document.querySelectorAll(".honoconceptos");
     
    for (var i = 0; i < set_pc.length; i++) {
      set_pc[i].onchange = function () {

        var navegador;
        ////////////INICIO VERIFICAR EL NAVEGADOR 
            var es_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
            if(es_chrome){
                      navegador = 6;
            }
            var es_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
            if(es_firefox){
                      navegador = 2;
            }
            var es_opera = navigator.userAgent.toLowerCase().indexOf('opera');
            if(es_opera){
                      navegador = 1;
            }
            var es_ie = navigator.userAgent.indexOf("MSIE") > -1 ;
            if(es_ie){
                      navegador = 4;
            }

     var nombre_var = this.name; 
      //switch(pestania_tipo_elegido){
        //case "Servicios de traducción y subtitulaje":
          //tipo_concepto = 2;
          var sep_variable = nombre_var.split('s__');
          var obt_nom_variable1 = sep_variable[0];
          var obt_nom_variable2 = sep_variable[1];
          var obt_nom_variable3 = sep_variable[2];
          var obt_nom_variable4 = sep_variable[4];
          
         /*27122024 if(typeof obt_nom_variable3 == "undefined" && obt_nom_variable1=="tipogasto"){
            //console.log(`SI ENTRO PORQUE ES ALTA`)
            var variable_this_name1 = "tipogasto"
            var variable_this_comp = variable_this_name1+'__'+ obt_nom_variable2;
            //console.log(`CAMPO variable_this_comp----: ${variable_this_comp}`)
          }*/
          if(typeof obt_nom_variable3 == "undefined" && obt_nom_variable1=="concepto"){
            //console.log(`SI ENTRO PORQUE ES ALTA`)
            var variable_this_name1 = "concepto"
            var variable_this_comp = variable_this_name1+'__'+ obt_nom_variable2;
            //console.log(`CAMPO variable_this_comp----: ${variable_this_comp}`)
          }
          /*27122024
          if(typeof obt_nom_variable3 == "undefined" && obt_nom_variable1=="unidad"){
            //console.log(`SI ENTRO PORQUE ES ALTA`)
            var variable_this_name1 = "unidad"
            var variable_this_comp = variable_this_name1+'__'+ obt_nom_variable2;
            //console.log(`CAMPO variable_this_comp----: ${variable_this_comp}`)
          }
          if(typeof obt_nom_variable3 == "undefined" && obt_nom_variable1=="costo_unitario_imp_incluidos"){
            //console.log(`SI ENTRO PORQUE ES ALTA de costo_unitario_imp_incluidos`)
            var variable_this_name1 = "costo_unitario_imp_incluidos"
            var variable_this_comp = variable_this_name1+'__'+ obt_nom_variable2;
            //console.log(`CAMPO variable_this_comp----: ${variable_this_comp}`)
          }*/
          //+'&tipo_concepto='+tipo_concepto
          //"monto_tot__
          var sep_variable_monto = nombre_var.split('t__');
          var obt_nom_variable1_monto = sep_variable_monto[0];
          var obt_nom_variable2_monto = sep_variable_monto[1];
          var obt_nom_variable3_monto = sep_variable_monto[2];
         // console.log(`CAMPO variable_this_comp----: ${nombre_var} ---> ${obt_nom_variable1_monto} uno: ${obt_nom_variable2_monto} tres: ${obt_nom_variable3_monto}`)
          if(typeof obt_nom_variable3_monto == "undefined" && obt_nom_variable1_monto=="monto_to"){
            //console.log(`SI ENTRO PORQUE ES ALTA`)
            var variable_this_name1 = "monto_tot";
            var variable_this_comp = variable_this_name1+'__'+ obt_nom_variable2_monto;
           // console.log(`CAMPO variable_this_comp----: ${variable_this_comp}`)
          }

      var url_z='receptor_conceptos_v3.php?variable='+variable_this_comp+'&valor='+this.value+'&navegador='+navegador;
         
    hacerPeticion(url_z);
      }
    }
//fin honoconceptos alta y modificación de conceptos 2

/* 20012023 se quito function suma_todos_conceptos(){

        var sumaTconceptos=0;
        var a = document.getElementById("total_esp_tra").value;//#2 suma de concepto de Traducción
        var total_esp_tra1;
          if(a>0){
          var total_esp_tra=eval ('document.apInf.total_esp_tra.value');
           
           alert(total_esp_tra);

            if(total_esp_tra=="")
                {
                  total_esp_tra1 = 0;
                } else {
                  total_esp_tra1=parseFloat(total_esp_tra.replace(/[$,\s]/g, '')); //#2 suma de concepto de Traducción
                }
          } else { 
            total_esp_tra1=0;
          }

          //convocatoria 2022: var sumhono=eval ('document.apInf.sumhono.value');
          var campov=eval ('document.apInf.suma_pestanas');
          //var apoyo_fin_sol_sc=document.apInf.apoyo_fin_sol_sc.value;

          var Infor_finan_apoyo_monto=document.apInf.Infor_finan_apoyo_monto.value; 
          var total_2 =document.apInf.total_2;
          var calcula_total = total_esp_tra1;
            //  campov.value=calcula_total; se quito porque imprimia el total de las sumas con la pestaña qe se quito

         // var ve_sumando=parseFloat(sumhono.replace(/[$,\s]/g, '')) +calcula_total;
         // total_2.value=ve_sumando;
          
          var imp_suma_concepto = document.getElementById('suma_pestanas');
          imp_suma_concepto.value = calcula_total;

              var fin_suma_1 = document.apInf.fin_suma;
              fin_suma_1.value=ve_sumando;//actualiza el monto final(suma) de honorarios  + pestaña

//if(ve_sumando<=Infor_finan_apoyo_monto){ 19/01/2022 asi es como estaba la validación menor o igual al 23000 total pedido a SC
        
          var total_otros_concep = document.apInf.total_2.value;
          console.log(`total_otros_concep= ${total_otros_concep}`); 
          console.log(`Infor_finan_apoyo_monto= ${Infor_finan_apoyo_monto}`);
               
              if(total_otros_concep==Infor_finan_apoyo_monto){ 
               console.log('SI ES CORRECTO EL MONTO');
                document.getElementById("suma_pestanas").style.borderColor="";
                //document.getElementById("sumhono").style.borderColor="";
                document.getElementById("total_2").style.borderColor="";
                document.getElementById("errmayormontoSC").style.display = 'none';
              } else { 
                console.log('ES ALTO EL MONTO');
                document.getElementById("suma_pestanas").style.borderColor="#D0021B";
                //document.getElementById("sumhono").style.borderColor="#D0021B";
                document.getElementById("total_2").style.borderColor="#D0021B";
                document.getElementById("errmayormontoSC").style.display = 'block';                
              } 
            } */
        //}

//inicio honocampo alta y modificación de honorarios

</script>