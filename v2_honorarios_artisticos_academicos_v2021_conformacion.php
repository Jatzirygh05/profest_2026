<?php echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index_cierre.php'>";
    $sql_sum_cant = "SELECT * FROM `reque_v2_1_2` 
    WHERE reque_v2_1_2.clave_usuario LIKE '".$cve_user."'"; 
      $resultado_sql_sum_cant = mysqli_query($con, $sql_sum_cant);
      $num_sql_sum_cant = mysqli_num_rows($resultado_sql_sum_cant);
        for ($z=0; $z <$num_sql_sum_cant; $z++)
        {
          $row_sql_sum_cant = mysqli_fetch_array($resultado_sql_sum_cant);
          $costo_unitario_imp_incluidos = $row_sql_sum_cant["costo_unitario_imp_incluidos"];
          $unidad = $row_sql_sum_cant["unidad"];
          $multiplica = $costo_unitario_imp_incluidos * $unidad;
          $sumando = $multiplica + $sumando;          
        } 
        $oper2=$sumando;
        if($oper2==""){
         $oper3 = 0;
        } else {
         $oper3 = $oper2;
        }

       $suma_pestanas = $oper3;
       $suma_pestanas_imp = $oper3;
?>
<!--script type="text/javascript" src="js/Validacion_honorarios_v3_unoxuno.js"></script-->
      <script>
        function ctext(num){
         stext = "";
        var i=0;
          for(i=1;i<=num;i++){
            document.getElementById("jat"+i).style.display = 'block';
          }
          for(var j=i;j<=150;j++){
            var midiv=document.getElementById("jat"+j);
            midiv.style.display="none";
          }
        }
      </script>
<style>
      .honocampo{
      }
</style>
<style>
.es{
    -webkit-transform: rotate(-70deg); 
    -moz-transform: rotate(-70deg);
    -o-transform: rotate(-70deg);
    transform: rotate(-70deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    height:25px;
    width:95px;
    font-size: 12px;
}
.inline-block{
    display:-moz-inline-stack;
    display:inline-block;
    zoom:1;
    *display:inline; 
}
</style>
    <!--form name="formul" action="v2_honorarios_artisticos_academicos_v2021_conformacion2daparte1.php" method="post"-->
     <div class="container">
            <div class="row">
              <div class="col-md-8"> 
                <h3>Presupuesto y Programación</h3>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12">
                <p>A partir de este momento, usa este apartado únicamente para detallar la distribución del recurso solicitado a la Secretaría de Cultura. La suma total de todos los conceptos llenados en las distintas pestañas deberá ser igual a la cantidad registrada en <strong>Monto solicitado a la Secretaría de Cultura</strong>. Podrás navegar entre los distintos campos para su llenado.</p>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12">
                <p>
                <strong>Nota importantes:</strong></p>
               </div>
              </div> 
              <!--div class="row">
                <div class="col-md-12">  
                  <p>1. Te invitamos a iniciar en esta primera pestaña de Programación y Presupuesto, dado que la información que aquí se registre, servirá para el prellenado del apartado <i>Datos de los participantes</i>.</p>
                </div>
              </div-->
                <div class="row">
                  <div class="col-md-12"><p>1. Para los festivales de las disciplinas de cinematografía y de artes visuales y diseño, se recomienda únicamente relacionar, en esta primera pestaña, la participación o prestación de servicios profesionales correspondientes a curadores, programadores, museógrafos, talleristas, conferencistas o participantes artísticos en el marco del festival y que su pago se pretende cubrir con el recurso PROFEST.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12"><p>2. Para aquellas prestaciones de servicio artístico como museografía, programación o curaduría que no tienen un día particular de presentación, se deberá seleccionar <strong>En todas las anteriores</strong> en la columna de <strong>Lugar de presentación</strong>; en  <strong>Fecha de presentación</strong> deberá registrarse la fecha inicio del festival o la fecha de inauguración de la exposición, muestra, etc.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12"><p>3. Si requieres salir de tu sesión y continuar en otro momento, es importante que se complete la información de la fila donde continuarás más adelante la captura de datos.</p>
                  </div>
                </div>
                <!--div class="row">
                  <div class="col-md-12">
                    <p>Te recordamos que la sábana de programación que resulte del recurso otorgado, será entregada un mes antes de iniciar el festival, de acuerdo con lo establecido en Obligaciones de los Beneficiarios de la Convocatoria PROFEST 2021.</p>
                  </div> 
                </div-->
          <?php $total_proyecto=$Infor_finan_apoyo_monto; //Apoyo financiero solicitado a la Secretaría de Cultura ?>
          <div class="row">
            <div class="col-sm-4">
              <strong>Monto solicitado a la Secretaría de Cultura:</strong>
            </div>
            <div class="col-sm-4">
<input type="text" class="form-control" name="apoyo_fin_sol_sc" id="apoyo_fin_sol_sc" value="<?php echo $total_proyecto; ?>" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <strong>Suma de otros conceptos PROFEST:</strong>
            </div>
            <div class="col-sm-4">
<input type="text" class="form-control" name="suma_pestanas" id="suma_pestanas" value="<?php echo $suma_pestanas_imp; ?>" readonly>
            </div>
          </div>

          <div class="row"></div>
            <div class="row " id="rowError1" name="rowError1" style="display:none">
              <div class="col-md-12">
                  <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica la captura realizada,<br>
                  * Todos los campos son obligatorios.</div>
              </div>
            </div>
            <?php /*div class="row " id="rowError2" name="rowError2" style="display:none">
            <div class="col-md-12">
                <div id="lblMensaje" class="alert alert-danger"><strong>¡Atención!</strong> Verifica los montos de honorarios con impuestos incluidos (M.N.) y conceptos * ya que la suma de estos debe coincidir con el Monto solicitado a la Secretaría de Cultura.</div>
            </div>
            </div*/?>
            <div class="row " id="rowBien1" name="rowBien1" style="display:none">
                <div class="col-md-12">
                  <div class="alert alert-success"><strong>¡Felicidades!</strong> la información es correcta.</div>
                </div>
            </div>
          <div class="row">
          <br>
            <div class="col-md-12"><hr class="red small-margin"></div>
          </div>
      </div>

      <div class="row">
          <div class="col-md-8"> 
            <table border="0">
            <tr bgcolor="#F6F6F6">
              <td>#</td>
              <td width="534" height="150"><span class="es inline-block">Confirmado/tentativo*</span></td>
              <td><span class="es inline-block">Disciplina*</span></td>
              <?php //td><span class="es inline-block">Categoría*</span></td?>
              <td><span class="es inline-block">Nombre del participante o prestador del servicio profesional*</span></td>
              <td><span class="es inline-block">Estado/País origen*</span></td>
              <td><span class="es inline-block">Nombre de la presentación o del servicio*</span></td>
              <td><span class="es inline-block">Lugar de presentación</span></td>
              <td><span class="es inline-block">Fecha presentación (dd/mm/aaaa)*</span></td>
              <td><span class="es inline-block">Horario<br>(HH:MM:SS a.m/p.m)*</span></td>
              <td><span class="es inline-block">#Participantes*</span></td>
              <td><span class="es inline-block">#Mujeres*</span></td>
              <td><span class="es inline-block">#Hombres*</span></td>
              <td><span class="es inline-block">Duración del espectáculo propuesto*</span></td>
              <td><span class="es inline-block">Monto de honorarios con impuestos incluidos (M.N.)*</span></td>
            </tr>
            <tr>
              <?php //honorarios_artisticos_academicos_v2_unoxuno
                $query_user10 = "SELECT * FROM honorarios_artisticos_academicos_v2 WHERE clave_usuario='".$cve_user."' order by id;";                          
                $res_user10 =  mysqli_query($con, $query_user10);
                $cuantos10 = mysqli_num_rows($res_user10);
              ?>
              <input type="hidden" name="cuantos_INSERT10" id="cuantos_INSERT10" value="<?php echo $cuantos10; ?>">
              <?php
                $h=0;
                while($fila10=mysqli_fetch_array($res_user10, MYSQLI_ASSOC)){
                $h=$h+1;
                $total_apoyo = $total_apoyo+$fila10['monto_honorarios_con_impuestos_incluidos_mn'];
                $id = $fila10['id'];
                $consec = $fila10['consec'];                      
                ?>
      <td><?php echo $h; ?>
        <input type="hidden" name="idhaa__<?php echo $id; ?>" id="idhaa__<?php echo $id; ?>" value="<?php echo $fila10['id']; ?>">
        <br><br><br>
      </td>
      <td>
      <select name="confirmado_tentativo__<?php echo $consec; ?>__<?php echo $id; ?>" id="confirmado_tentativo__<?php echo $consec; ?>__<?php echo $id; ?>" class="form-control honocampo">
          <option value="" selected>Selecciona una opción</option>
          <option value="Confirmado" <?php if($fila10['confirmado_tentativo']=='Confirmado'){?> selected <?php } ?>>Confirmado</option>
          <option value="Tentativo" <?php if($fila10['confirmado_tentativo']=='Tentativo'){?> selected <?php } ?>>Tentativo</option>
        </select></td>
        <td>
          <?php $disciplina = utf8_encode($fila10['disciplina']); ?>
          <select name="disciplina__<?php echo $consec; ?>__<?php echo $id; ?>" id="disciplina__<?php echo $consec; ?>__<?php echo $id; ?>" class="form-control honocampo">
            <option value="" selected>Selecciona una opción</option>
            <option value="Musica" <?php if ($disciplina=='Musica'){?> selected <?php } ?>>Música</option>
            <option value="Teatro" <?php if ($disciplina=='Teatro'){?> selected <?php } ?>>Teatro</option>
            <option value="Danza" <?php if ($disciplina=='Danza'){?> selected <?php } ?>>Danza</option>
            <option value="Artes visuales" <?php if ($disciplina=='Artes visuales'){?> selected <?php } ?>>Artes visuales</option>
            <option value="Cultura Alimentaria" <?php if ($disciplina=='Cultura Alimentaria'){?> selected <?php } ?>>Cultura Alimentaria</option>
            <option value="Literatura" <?php if ($disciplina=='Literatura'){?> selected <?php } ?>>Literatura</option>
            <option value="Diseno" <?php if ($disciplina=='Diseno'){?> selected <?php } ?>>Diseño</option>
            <option value="Cine" <?php if ($disciplina=='Cine'){?> selected <?php } ?>>Cine</option>
          </select></td>
          <td><input type="text" class="form-control honocampo" name="nombre_artista_grupo__<?php echo $consec; ?>__<?php echo $id; ?>" id="nombre_artista_grupo__<?php echo $consec; ?>__<?php echo $id; ?>" value="<?php echo utf8_decode($fila10['nombre_artista_grupo']); ?>" placeholder="Ingresa" /></td>
          <td><input type="text" class="form-control honocampo" name="estado_origen_artista_grupo__<?php echo $consec; ?>__<?php echo $id; ?>" id="estado_origen_artista_grupo__<?php echo $consec; ?>__<?php echo $id; ?>" value="<?php echo utf8_decode($fila10['estado_origen_artista_grupo']); ?>" placeholder="Ingresa" /></td>
          <td><input type="text" class="form-control honocampo" name="nombre_present_o_servicio__<?php echo $consec; ?>__<?php echo $id; ?>" id="nombre_present_o_servicio__<?php echo $consec; ?>__<?php echo $id; ?>" value="<?php echo utf8_decode($fila10['nombre_present_o_servicio']); ?>" placeholder="Ingresa" /></td>
          <td>
            <?php
              $lugar_sel = $fila10['lugar_sel'];
            ?>
            <select class='form-control honocampo' name='lugar_sel__<?php echo $consec; ?>__<?php echo $id; ?>' id='lugar_sel__<?php echo $consec; ?>__<?php echo $id; ?>'>
            
            <option value="" <?php if (empty($lugar_sel)){ ?> selected <?php } ?>>Selecciona una opción</option>
            <?php
            //(INICIO) muestre la opción que seleccionaron
              $query_ini="SELECT id_lugares, Nombreforo FROM `mas_lugares` where 
              clave_usuario='".$cve_user."' AND id_lugares=$lugar_sel";
                $result_ini = mysqli_query($con, $query_ini);
                $cuantos_lug = mysqli_num_rows($result_ini);
                $renglon_ini = mysqli_fetch_row($result_ini);
                $valor_en=$renglon_ini[0];
            //(FIN) muestre la opción que seleccionaron

            //(INICIO) muestre las opciones si quiere elegir otra
          
               $query="SELECT id_lugares, Nombreforo FROM `mas_lugares` where clave_usuario='".$cve_user."'";
               $result = mysqli_query($con, $query);
                     while($renglon = mysqli_fetch_array($result))
                     { 
                           $valor=$renglon['id_lugares'];
                           $imp_texto=$renglon['Nombreforo'];
                        ?>
                       <option value="<?php echo $valor; ?>" <?php if($lugar_sel==$valor){?> selected <?php } ?>><?php echo $imp_texto; ?></option>
                 <?php    }
               
                 //(INICIO) imprime los valoes de la tabla de 'proyecto'
                      //A (INICIO) 
                        $query_lug="SELECT Nombreforo_a 
                        FROM `proyecto` where clave_usuario='".$cve_user."'";
                        $result_lug = mysqli_query($con, $query_lug);
                        $renglon_luga = mysqli_fetch_array($result_lug);
                        $Nombreforo_a=utf8_encode($renglon_luga["Nombreforo_a"]);
                        if (!empty($Nombreforo_a)){?>
                                <option value="100" <?php if ($lugar_sel==100){?> selected <?php } ?>><?php echo $Nombreforo_a; ?></option>
                         <?php }

                          //A (FIN)
                          
                          //B (INICIO)
                          $query_lugb="SELECT Nombreforo_b
                          FROM `proyecto` where clave_usuario='".$cve_user."'";
                          $result_lugb = mysqli_query($con, $query_lugb);
                          $renglon_lugb = mysqli_fetch_array($result_lugb);
                               $Nombreforo_b=utf8_encode($renglon_lugb["Nombreforo_b"]);
                           if (!empty($Nombreforo_b)){?>
                               <option value="200" <?php if ($lugar_sel==200){?> selected <?php } ?>><?php echo $Nombreforo_b; ?></option>;
                         <?php
                                }
                          //B (FIN)

                          //C (INICIO)
                          $query_lugc="SELECT Nombreforo_c
                          FROM `proyecto` where clave_usuario='".$cve_user."'";
                          $result_lugc = mysqli_query($con, $query_lugc);
                          $renglon_lugc = mysqli_fetch_array($result_lugc);
                               $Nombreforo_c=utf8_encode($renglon_lugc["Nombreforo_c"]);
                          if (!empty($Nombreforo_c)){?>
                               <option value="300" <?php if ($lugar_sel==300){?> selected <?php } ?>><?php echo $Nombreforo_c; ?></option>;
                         <?php
                                }
                          //C (FIN)
              //(FIN) muestre las opciones si quiere elegir otra               
              //(FIN) imprime los valoes de la tabla de 'proyecto'
                ?>
                <option value="500" <?php if ($lugar_sel==500){?> selected <?php } ?>>En todas las anteriores</option>
            </select>
          </td>
          <td>
                <input type="text" class="form-control honocampo honofecha" name="fecha_presentacion__<?php echo $consec; ?>__<?php echo $id; ?>" id="fecha_presentacion__<?php echo $consec; ?>__<?php echo $id; ?>" value="<?php echo $fila10['fecha_presentacion']; ?>" placeholder="Ingresa" maxlength="10">
                <!--span class="glyphicon glyphicon-calendar" aria-hidden="true"></span-->
            </div>
          </td>
          <td>
  <input type="time" class="form-control honocampo" name="horario__<?php echo $consec; ?>__<?php echo $id; ?>" id="horario__<?php echo $consec; ?>__<?php echo $id; ?>" value="<?php echo $fila10['horario']; ?>" placeholder="Ingres el horario" step="1" size="5" class="form-control" />
                  </td>
                  <td><input type="number" class="form-control honocampo" name="num_participantes_por_grupo__<?php echo $consec; ?>__<?php echo $id; ?>" id="num_participantes_por_grupo__<?php echo $consec; ?>__<?php echo $id; ?>" value="<?php echo $fila10['num_participantes_por_grupo']; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><input type="number" class="form-control honocampo" name="num_Mujeres__<?php echo $consec; ?>__<?php echo $id; ?>" id="num_Mujeres__<?php echo $consec; ?>__<?php echo $id; ?>" value="<?php echo $fila10['num_Mujeres']; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><input type="number" class="form-control honocampo" name="num_Hombres__<?php echo $consec; ?>__<?php echo $id; ?>" id="num_Hombres__<?php echo $consec; ?>__<?php echo $id; ?>" value="<?php echo $fila10['num_Hombres']; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><?php /*input type="text" class="form-control" name="duracion_espec_prop__<?php echo $id; ?>" id="duracion_espec_prop__<?php echo $id; ?>" value="<?php echo $fila10['duracion']; ?>" placeholder="Ingresa" /*/
                        $duracion_espectaculo_propuesto = utf8_encode($fila10['duracion_espectaculo_propuesto']);
                  ?>
                <select name="duracion_espectaculo_propuesto__<?php echo $consec; ?>__<?php echo $id; ?>" id="duracion_espectaculo_propuesto__<?php echo $consec; ?>__<?php echo $id; ?>" class="form-control honocampo">
                    <option value="">Selecciona una opción</option>
                    <option value="15 minutos" <?php if ($duracion_espectaculo_propuesto=='15 minutos'){?> selected <?php } ?>>15 minutos</option>
                    <option value="30 minutos" <?php if ($duracion_espectaculo_propuesto=='30 minutos'){?> selected <?php } ?>>30 minutos</option>
                    <option value="45 minutos" <?php if ($duracion_espectaculo_propuesto=='45 minutos'){?> selected <?php } ?>>45 minutos</option>
                    <option value="60 minutos" <?php if ($duracion_espectaculo_propuesto=='60 minutos'){?> selected <?php } ?>>60 minutos</option>
                    <option value="80 minutos" <?php if ($duracion_espectaculo_propuesto=='80 minutos'){?> selected <?php } ?>>80 minutos</option>
                    <option value="90 minutos" <?php if ($duracion_espectaculo_propuesto=='90 minutos'){?> selected <?php } ?>>90 minutos</option>
                    <option value="100 minutos" <?php if ($duracion_espectaculo_propuesto=='100 minutos'){?> selected <?php } ?>>100 minutos</option>
                    <option value="120 minutos" <?php if ($duracion_espectaculo_propuesto=='120 minutos'){?> selected <?php } ?>>120 minutos</option>
                    <option value="2:30 horas" <?php if ($duracion_espectaculo_propuesto=='2:30 horas'){?> selected <?php } ?>>2:30 horas</option>
                    <option value="3:00 horas" <?php if ($duracion_espectaculo_propuesto=='3:00 horas'){?> selected <?php } ?>>3:00 horas</option>
                    <option value="3:30 horas" <?php if ($duracion_espectaculo_propuesto=='3:30 horas'){?> selected <?php } ?>>3:30 horas</option>
                    <option value="4:00 horas" <?php if ($duracion_espectaculo_propuesto=='4:00 horas'){?> selected <?php } ?>>4:00 horas</option>
                    <option value="1 dia" <?php if ($duracion_espectaculo_propuesto=='1 dia'){?> selected <?php } ?>>1 día</option>
                    <option value="2 dias" <?php if ($duracion_espectaculo_propuesto=='2 dias'){?> selected <?php } ?>>2 días</option>
                    <option value="1 semana" <?php if ($duracion_espectaculo_propuesto=='1 semana'){?> selected <?php } ?>>1 semana</option>
                    <option value="2 semanas" <?php if ($duracion_espectaculo_propuesto=='2 semanas'){?> selected <?php } ?>>2 semanas</option>
                    <option value="mas 2 semanas" <?php if ($duracion_espectaculo_propuesto=='mas 2 semanas'){?> selected <?php } ?>>+2 semanas</option>
                  </select>
                  </td>
                  <td>
  <input type="text" class="form-control honocampomonto honocampo" name="monto_honorarios_con_impuestos_incluidos_mn__<?php echo $consec; ?>__<?php echo $id; ?>" id="monto_honorarios_con_impuestos_incluidos_mn__<?php echo $consec; ?>__<?php echo $id; ?>" value="<?php echo $fila10['monto_honorarios_con_impuestos_incluidos_mn']; ?>" placeholder="Ingresa" onKeyPress="return evita_comas(event)" /></td>
                  <td><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="location.href='elimin_reg_hono_v2.php?clave=<?php echo $id; ?>'"></span></td>
                </tr>
                <?php  }
                  $cuantos_cuenta = $cuantos10+1;
                for($i=$cuantos_cuenta;$i<=150;$i++){ 
                    $rs = "SELECT MAX(id) AS id FROM honorarios_artisticos_academicos_v2";
                         $rs1= mysqli_query($con, $rs);
                          if ($row = mysqli_fetch_row($rs1)) {
                          $id_OBTENIDO = trim($row[0]);
                          }
               $seguido = $id_OBTENIDO+$i;
                  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><select name="confirmado_tentativo__<?php echo $seguido; ?>" id="confirmado_tentativo__<?php echo $seguido; ?>" class="form-control honocampo">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Confirmado">Confirmado</option>
                      <option value="Tentativo">Tentativo</option>
                      </select></td>
                  <td><select name="disciplina__<?php echo $seguido; ?>" id="disciplina__<?php echo $seguido; ?>" class="form-control honocampo">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Musica">Música</option>
                      <option value="Teatrcontrolo">Teatro</option>
                      <option value="Danza">Danza</option>
                      <option value="Artes visuales">Artes visuales</option>
                      <option value="Gastronomia">Gastronomia</option>
                      <option value="Literatura">Literatura</option>
                      <option value="Diseno">Diseño</option>
                      <option value="Cinematografia">Cinematografía</option>
                      </select></td>
                  <td><input type="text" class="form-control honocampo" name="nombre_artista_grupo__<?php echo $seguido; ?>" id="nombre_artista_grupo__<?php echo $seguido; ?>" placeholder="Ingresa" /></td>
                  <td>
                    <input type="text" class="form-control honocampo" name="estado_origen_artista_grupo__<?php echo $seguido; ?>" id="estado_origen_artista_grupo__<?php echo $seguido; ?>" placeholder="Ingresa" />
                  </td>
                   <td>
                    <input type="text" class="form-control honocampo" name="nombre_present_o_servicio__<?php echo $seguido; ?>" id="nombre_present_o_servicio__<?php echo $seguido; ?>" placeholder="Ingresa" />
                  </td>
                  <td>
                  <select class='form-control honocampo' name='lugar_sel__<?php echo $seguido; ?>' id='lugar_sel__<?php echo $seguido; ?>'>
                  <option value="" selected>Selecciona una opción</option>
                  <?php
                    $query="SELECT id_lugares, Nombreforo FROM `mas_lugares` where clave_usuario='".$cve_user."'";
                    $result = mysqli_query($con, $query);
                         while($renglon = mysqli_fetch_row($result))
                         { 
                               $valor=$renglon[0];
                               $imp_texto=$renglon[1];
                               echo "<option value=".$valor.">".$imp_texto."</option>";
                         }
                    //imprime las primera opciones del los lugares en la tabla 'mas_lugares'
                    //(INICIO) imprime los valoes de la tabla de 'proyecto'
                        $query_lug="SELECT Nombreforo_a 
                        FROM `proyecto` where clave_usuario='".$cve_user."'";
                        $result_lug = mysqli_query($con, $query_lug);     
                          //A (INICIO)
                             while($renglon_luga = mysqli_fetch_array($result_lug))
                             {
                               $Nombreforo_a=$renglon_luga["Nombreforo_a"];
                              if (!empty($Nombreforo_a)) { 
                               echo $opcion_sel_a =  "<option value=100>".$Nombreforo_a."</option>\n";
                               }
                          }
                          //A (FIN)
                          
                          //B (INICIO)
                          $query_lugb="SELECT Nombreforo_b
                          FROM `proyecto` where clave_usuario='".$cve_user."'";
                          $result_lugb = mysqli_query($con, $query_lugb);
                          
                             while($renglon_lugb = mysqli_fetch_array($result_lugb))
                             { 
                               $Nombreforo_b=$renglon_lugb["Nombreforo_b"];
                               if (!empty($Nombreforo_b)) { 
                               echo $opcion_sel_b =  "<option value=200>".$Nombreforo_b."</option>\n";
                               }
                          }
                          //B (FIN)

                          //C (INICIO)
                        $query_lugc="SELECT Nombreforo_c
                        FROM `proyecto` where clave_usuario='".$cve_user."'";
                        $result_lugc = mysqli_query($con, $query_lugc);
                     
                             while($renglon_lugc = mysqli_fetch_array($result_lugc))
                             { 
                               $Nombreforo_c=$renglon_lugc["Nombreforo_c"];
                               if (!empty($Nombreforo_c)) { 
                               echo $opcion_sel_c =  "<option value=300>".$Nombreforo_c."</option>\n";
                               }
                           }
                          //C (FIN)                 
              //(FIN) imprime los valoes de la tabla de 'proyecto'
                    echo "<option value=500>En todas las anteriores</option>\n";
                 ?>
            </select>
                  </td>
                  <td>
                    <input type="text" class="form-control honocampo honofecha" name="fecha_presentacion__<?php echo $seguido; ?>" id="fecha_presentacion__<?php echo $seguido; ?>" placeholder="dd/mm/aaaa" maxlength="10" /><!--span class="glyphicon glyphicon-calendar" aria-hidden="true"></span-->
                  </td>
                  <td><input type="time" class="form-control honocampo" name="horario__<?php echo $seguido; ?>" id="horario__<?php echo $seguido; ?>"placeholder="Ingres el horario" size="5" step="1"  class="form-control" /></td>
                  <td><input class="form-control honocampo" type="number" name="num_participantes_por_grupo__<?php echo $seguido; ?>" id="num_participantes_por_grupo__<?php echo $seguido; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><input class="form-control honocampo" type="number" name="num_Mujeres__<?php echo $seguido; ?>" id="num_Mujeres__<?php echo $seguido; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><input class="form-control honocampo" type="number" name="num_Hombres__<?php echo $seguido; ?>" id="num_Hombres__<?php echo $seguido; ?>" placeholder="Ingresa" onKeyPress="return soloNumeros(event)" /></td>
                  <td><?php /*input type="text" class="form-control" name="duracion_espec_prop__<?php echo $i; ?>" id="duracion_espec_prop__<?php echo $i; ?>" placeholder="Ingresa" /*/?>
                    <select name="duracion_espectaculo_propuesto__<?php echo $seguido; ?>" id="duracion_espectaculo_propuesto__<?php echo $seguido; ?>" class="form-control honocampo">
                      <option value="">Selecciona una opción</option>
                      <option value="15 minutos">15 minutos</option>
                      <option value="30 minutos">30 minutos</option>
                      <option value="45 minutos">45 minutos</option>
                      <option value="60 minutos">60 minutos</option>
                      <option value="80 minutos">80 minutos</option>
                      <option value="90 minutos">90 minutos</option>
                      <option value="100 minutos">100 minutos</option>
                      <option value="120 minutos">120 minutos</option>
                      <option value="2:30 horas">2:30 horas</option>
                      <option value="3:00 horas">3:00 horas</option>
                      <option value="3:30 horas">3:30 horas</option>
                      <option value="4:00 horas">4:00 horas</option>
                      <option value="1 dia">1 día</option>
                      <option value="2 dias">2 días</option>
                      <option value="1 semana">1 semana</option>
                      <option value="2 semanas">2 semanas</option>
                      <option value="mas 2 semanas">+2 semanas</option>
                    </select>
                  </td>
                  <td><input class="form-control honocampomonto honocampo" type="text" name="monto_honorarios_con_impuestos_incluidos_mn__<?php echo $seguido; ?>" id="monto_honorarios_con_impuestos_incluidos_mn__<?php echo $seguido; ?>" placeholder="Ingresa" /></td>
                 <td></td>
                 </tr>
                <?php } ?>
                 <tr> 
                  <td colspan="13" align="right">Total de honorarios artísticos y académicos: </td>
                  <td>
                    <input class="form-control" type="text" name="total_apoyo_suma" id="total_apoyo_suma" placeholder="0.00" value="<?php echo $total_apoyo; ?>" readonly>
                  </td> 
                </tr>
                <tr> 
                  <td colspan="35" align="right"></td>
                  <td><?php 
                  if($num_sql_sum_cant==0){
                    $sumando_todo = 0;
                  } else {
                    $sumando_todo = $suma_pestanas; 
                  }
                  ?>
                    <input type="hidden" class="form-control" name="apoyo_general_paso" id="apoyo_general_paso" value="<?php echo $suma_pestanas; ?>">
                  </td> 
                </tr>
                <tr> 
                  <td colspan="13" align="right">Suma total de conceptos y honorarios: </td>
                  <td><?php $sumando_todo = $suma_pestanas + $total_apoyo; ?>
                  <input type="text" class="form-control" name="fin_suma" id="fin_suma" value="<?php echo $sumando_todo; ?>" readonly>
                  </td> 
                </tr>                
              </table>
          </div>
        </div>        
<!--/form-->

<script type="text/javascript">
//inicio honocampo alta y modificación de honorarios

  var set_pc = document.querySelectorAll(".honocampo");
     
    for (var i = 0; i < set_pc.length; i++) {
      set_pc[i].onchange = function () {

///////////////INICIO QUITAR LA VALIDACION DE LOS MONTOS AL MOMENTO DE ESCRIBIR
        //INICIO DE suma de montos
        var sumaT=0.0;
        var amonto = document.querySelectorAll(".honocampomonto");

        amonto.forEach((x)=>{
          //console.log(x.value)  
         sumaT += parseFloat(+x.value);            
        })
  
        var obtsuma= document.apInf.total_apoyo_suma;        
            obtsuma.value=sumaT;

         var obtsuma_imp_sumhono= document.apInf.sumhono;        
            obtsuma_imp_sumhono.value=sumaT;
            
        //FIN DE suma de montos

        //INICIO DE suma de honorarios y pestañas
          var suma_general = 0;

          var total_apoyo_suma = document.apInf.total_apoyo_suma.value; //suma de honorarios
          var apoyo_general_paso = document.apInf.apoyo_general_paso.value;//suma_pestanas
          var total_proyecto = document.apInf.apoyo_fin_sol_sc.value;

if(apoyo_general_paso=="")
  {
  var apoyo_general_paso2 = 0;
  } else {
  var apoyo_general_paso2 = parseFloat(apoyo_general_paso.replace(/[$,\s]/g, ''));
  }

          suma_general = parseFloat(total_apoyo_suma.replace(/[$,\s]/g, '')) + apoyo_general_paso2;
          
          //console.log(`suma_general: ${suma_general}`);

          var fin_suma = document.apInf.fin_suma;
              fin_suma.value=suma_general;

          var fin_suma_total_2 = document.apInf.total_2;
              fin_suma_total_2.value=suma_general;

 //console.log(total_proyecto) 

        if(total_apoyo_suma>0 && suma_general<=total_proyecto)
            {
              //console.log('Entro 1 el importe de honorarios y conceptos es MENOR (BIEN) o igual al Apoyo financiero solicitado a la Secretaría de Cultura');
              /*document.getElementById("apoyo_general_paso").style.borderColor="";
                document.getElementById("total_apoyo_suma").style.borderColor="";
                document.getElementById("fin_suma").style.borderColor="";
                document.getElementById("rowError2").style.display = 'none';*/
             // var obtsuma= document.formul.fin_suma;
             // obtsuma.value=suma_general;
            } else {
              //console.log('Entro 1 el importe de honorarios y conceptos es MAYOR (MAL) o igual al Apoyo financiero solicitado a la Secretaría de Cultura');
             // var obtsuma_A= document.formul.fin_suma;
             // obtsuma_A.value=suma_general;
                /*document.getElementById("apoyo_general_paso").style.borderColor="#D0021B";
                document.getElementById("total_apoyo_suma").style.borderColor="#D0021B";
                document.getElementById("fin_suma").style.borderColor="#D0021B";
                document.getElementById("rowError2").style.display = 'block';  
                $(window).scrollTop(300);
                $(window).scrollLeft(10);*/
            }
        //FIN DE suma de honorarios y pestañas
//////////////FIN QUITAR LA VALIDACION DE LOS MONTOS AL MOMENTO DE ESCRIBIR
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
          var url_z='receptor_honorarios_v2.php?variable='+this.name+'&valor='+this.value+'&navegador='+navegador;
	 //console.log(`URL: ${url_z}`)      
    hacerPeticion(url_z);
      }
    }
//fin honocampo alta y modificación de honorarios  
</script>