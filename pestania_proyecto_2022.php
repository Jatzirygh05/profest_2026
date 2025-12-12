<div class="row">
  <div class="col-sm-12">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#tab-08">Responsables del proyecto</a></li>
      <li><a data-toggle="tab" href="#tab-09">Desarrollo del proyecto</a></li>
      <!--li><a data-toggle="tab" href="#tab-10">Lugares de realización</a></li-->
    </ul>
    <!-- INICIO SUB. PESTAÑAS PROYECTO -->
    <div class="tab-content"> 
      <div class="tab-pane active" id="tab-08">
        <!-- INICIO SUB. PESTAÑAS PROYECTO / director(a) del festival -->
        <div class="row">
          <div class="col-md-8"><h3>Datos del director(a) del festival</h3></div>
          <div class="col-md-12"><hr class="red small-margin"></div>
        </div>                                      
        <div class="row">    
          <div class="col-md-4">
            <div class="form-group"> 
              <label>Nombre(s)<samp id="errnombre_dirAs" name="errnombre_dirAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre de la o el director del festival"></span></label>
              <input type="text" id="nombre_dir" name="nombre_dir" value="<?=$nombre_dir?>" class="form-control proyectocampodir" placeholder="Ingresa el nombre">
              <small id="errnombre_dir" name="errnombre_dir" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group"> 
              <label>Primer apellido<samp id="errprimer_apellido_dirAs" name="errprimer_apellido_dirAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Primer apellido de la o el director del festival"></span></label>
              <input type="text" id="primer_apellido_dir" name="primer_apellido_dir" value="<?=$primer_apellido_dir?>" class="form-control proyectocampodir" placeholder="Ingresa el primer apellido">
              <small id="errprimer_apellido_dir" name="errprimer_apellido_dir" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group"> 
              <label>Segundo apellido:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Segundo apellido de la o el director del festival"></span></label>
              <input type="text" id="segundo_apellido_dir" name="segundo_apellido_dir" value="<?=$segundo_apellido_dir?>" class="form-control proyectocampodir" placeholder="Ingresa el segundo apellido">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group"> 
              <label>Cargo<samp id="errcargo_dirAs" name="errcargo_dirAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Cargo de la o el director del festival"></span></label>
              <input type="text" id="cargo_dir" name="cargo_dir" value="<?=$cargo_dir?>" class="form-control proyectocampodir" placeholder="Ingresa el cargo">
              <small id="errcargo_dir" name="errcargo_dir" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">                 
              <label>Teléfono fijo (10 dígitos)<samp id="errtelefono_fijo_dirAs" name="errtelefono_fijo_dirAs" class="control-label">*</samp>:</label>
              <input type="text" id="telefono_fijo_dir" name="telefono_fijo_dir" value="<?=$telefono_fijo_dir?>" class="form-control proyectocampodir" placeholder="Teléfono fijo" onkeypress="return soloNumeros(event)" maxlength="10">
              <small id="errtelefono_fijo_dir" name="errtelefono_fijo_dir" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Extensión:</label><input type="text" id="extension_dir" name="extension_dir" value="<?=$extension_dir?>" class="form-control proyectocampodir" placeholder="Ingresa la extensión">
            </div>
          </div>
        </div>
        <div class="row">  
          <div class="col-md-4">
            <div class="form-group">
              <label>Teléfono móvil:</label><input type="text" id="telefono_movil_dir" name="telefono_movil_dir" value="<?=$telefono_movil_dir?>" class="form-control proyectocampodir" placeholder="Teléfono móvil" maxlength="10">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Correo electrónico<samp id="errCorreo_electronico_dirAs" name="errCorreo_electronico_dirAs" class="control-label">*</samp>:</label>
              <input type="text" id="Correo_electronico_dir" name="Correo_electronico_dir" class="form-control proyectocampodir" value="<?=$Correo_electronico_dir?>" placeholder="ejemplo@dominio.com" onBlur="validarEmail_dir(this.id);">
              <small id="errCorreo_electronico_dir" name="errCorreo_electronico_dir" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
              <small id="emailOK_dir"></small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Breve descripción de la trayectoria de la/el director(a)<samp id="errbreve_semblanza_directorAs" name="errbreve_semblanza_directorAs" class="control-label">*</samp>:</label> <small>Máximo 1,000 caracteres</small>
              <textarea id="breve_semblanza_director" name="breve_semblanza_director" class="form-control proyectocampodir" placeholder="Ingresa breve semblanza" rows="5" maxlength="1500"><?=$breve_semblanza_director?></textarea>
              <small id="errbreve_semblanza_director" name="errbreve_semblanza_director" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div>                                      
        <!-- FIN SUB. PESTAÑAS PROYECTO / director(a) del festival -->
        <!-- INICIO SUB. PESTAÑAS PROYECTO / responsable operativo -->
        <div class="row">
          <div class="col-md-8"> 
            <h3>Datos del responsable operativo del festival</h3>
          </div>
          <div class="col-md-12"><hr class="red small-margin"></div>
        </div>
        <div class="row">    
          <div class="col-md-4">
            <div class="form-group">
              <label> Nombre(s)<samp id="errresponsable_op_nombreAs" name="errresponsable_op_nombreAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre de la o el responsable operativo del festival"></span></label>
              <input type="text" id="responsable_op_nombre" name="responsable_op_nombre" value="<?php echo $responsable_op_nombre; ?>" class="form-control proyectocampo" placeholder="Ingresa el nombre">
              <small id="errresponsable_op_nombre" name="errresponsable_op_nombre" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label> Primer apellido<samp id="errprimer_apellido_opAs" name="errprimer_apellido_opAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Primer apellido de la o el responsable operativo del festival"></span></label>
              <input type="text" id="primer_apellido_op" name="primer_apellido_op" value="<?=$primer_apellido_op?>" class="form-control proyectocampo" placeholder="Ingresa el primer apellido">
              <small id="errprimer_apellido_op" name="errprimer_apellido_op" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group"> 
              <label> Segundo apellido:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Segundo apellido de la o el responsable operativo del festival"></span></label>
              <input type="text" id="segundo_apellido_op" name="segundo_apellido_op" value="<?=$segundo_apellido_op?>" class="form-control proyectocampo" placeholder="Ingresa el segundo apellido">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group"> 
              <label> Cargo<samp id="errcargo_opAs" name="errcargo_opAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Cargo de la o el responsable operativo del festival"></span></label>
              <input type="text" id="cargo_op" name="cargo_op" value="<?=$cargo_op?>" class="form-control proyectocampo" placeholder="Ingresa el cargo">
              <small id="errcargo_op" name="errcargo_op" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Teléfono fijo (10 dígitos)<samp id="errtelefono_fijo_opAs" name="errtelefono_fijo_opAs" class="control-label">*</samp>:</label>
              <input type="text" id="telefono_fijo_op" name="telefono_fijo_op" value="<?=$telefono_fijo_op?>" class="form-control proyectocampo" placeholder="Ingresa el teléfono fijo" onkeypress="return soloNumeros(event)" maxlength="10">
              <small id="errtelefono_fijo_op" name="errtelefono_fijo_op" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Extensión:</label><input type="text" id="extension_op" name="extension_op" value="<?=$extension_op?>" class="form-control proyectocampo" placeholder="Ingresa la extensión">
            </div>
          </div>
        </div>
        <div class="row">  
          <div class="col-md-4">
            <div class="form-group">
              <label>Teléfono móvil:</label><input type="text" id="telefono_movil_op" name="telefono_movil_op" value="<?=$telefono_movil_op?>" class="form-control proyectocampo" placeholder="Ingresa el teléfono móvil" maxlength="10">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Correo electrónico<samp id="errCorreo_electronico_opAs" name="errCorreo_electronico_opAs" class="control-label">*</samp>:</label>
              <input type="text" id="Correo_electronico_op" name="Correo_electronico_op" value="<?=$Correo_electronico_op?>" class="form-control proyectocampo" placeholder="ejemplo@dominio.com" onBlur="validarEmail(this.id);">
              <small id="errCorreo_electronico_op" name="errCorreo_electronico_op" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
              <small id="emailOK_op"></small>
            </div>
          </div>
        </div>
        <!--div class="row">  
          <div class="col-md-12">
            <div class="form-group">
              <label>Breve semblanza del(a) responsable operativo(a)<samp id="errbreve_semblanza_opAs" name="errbreve_semblanza_opAs" class="control-label">*</samp>:</label> <small>Máximo 1,000 caracteres</small>
              <textarea id="breve_semblanza_op" name="breve_semblanza_op" class="form-control proyectocampodir" placeholder="Ingresa breve semblanza" rows="5" maxlength="1000"><?=$breve_semblanza_op?></textarea>
              <small id="errbreve_semblanza_op" name="errbreve_semblanza_op" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div -->
        <!-- FIN SUB. PESTAÑAS PROYECTO / responsable operativo -->
        <!-- INICIO SUB. PESTAÑAS PROYECTO / responsable administrativo -->
        <div class="row">
          <div class="col-md-8"> 
            <h3>Datos del responsable administrativo del festival</h3>
          </div>
          <div class="col-md-12"><hr class="red small-margin"></div>
        </div>
        <div class="row">    
          <div class="col-md-4">
            <div class="form-group"> 
              <label> Nombre(s)<samp id="errresponsable_adm_nombreAs" name="errresponsable_adm_nombreAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Nombre de la o el responsable administrativo del festival"></span></label>
              <input type="text" id="responsable_adm_nombre" name="responsable_adm_nombre" value="<?=$responsable_adm_nombre?>" class="form-control proyectocampo" placeholder="Ingresa el nombre">
              <small id="errresponsable_adm_nombre" name="errresponsable_adm_nombre" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group"> 
              <label> Primer apellido<samp id="errprimer_apellido_admAs" name="errprimer_apellido_admAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Primer apellido de la o el responsable administrativo del festival"></span></label>
              <input type="text" id="primer_apellido_adm" name="primer_apellido_adm" value="<?=$primer_apellido_adm?>" class="form-control proyectocampo" placeholder="Ingresa el primer apellido">
              <small id="errprimer_apellido_adm" name="errprimer_apellido_adm" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group"> 
              <label> Segundo apellido:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Segundo apellido de la o el responsable administrativo del festival"></span></label>
              <input type="text" id="segundo_apellido_adm" name="segundo_apellido_adm" value="<?=$segundo_apellido_adm?>" class="form-control proyectocampo" placeholder="Ingresa el segundo apellido">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group"> 
              <label> Cargo<samp id="errcargo_admAs" name="errcargo_admAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="Cargo de la o el responsable administrativo del festival"></span></label>
              <input type="text" id="cargo_adm" name="cargo_adm" value="<?=$cargo_adm?>" class="form-control proyectocampo" placeholder="Ingresa el cargo">
              <small id="errcargo_adm" name="errcargo_adm" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">                 
              <label>Teléfono fijo (10 dígitos)<samp id="errtelefono_fijo_admAs" name="errtelefono_fijo_admAs" class="control-label">*</samp>:</label>
              <input type="text" id="telefono_fijo_adm" name="telefono_fijo_adm" value="<?=$telefono_fijo_adm?>" class="form-control proyectocampo" placeholder="Teléfono fijo" onkeypress="return soloNumeros(event)" maxlength="10">
              <small id="errtelefono_fijo_adm" name="errtelefono_fijo_adm" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Extensión:</label><input type="text" id="extension_adm" name="extension_adm" value="<?=$extension_adm?>" class="form-control proyectocampo" placeholder="Ingresa la extensión">
            </div>
          </div>
        </div>
        <div class="row">  
          <div class="col-md-4">
            <div class="form-group">
              <label>Teléfono móvil:</label><input type="text" id="telefono_movil_adm" name="telefono_movil_adm" value="<?=$telefono_movil_adm?>" class="form-control proyectocampo" placeholder="Teléfono móvil" maxlength="10">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Correo electrónico<samp id="errcorreo_electronico_admAs" name="errcorreo_electronico_admAs" class="control-label">*</samp>:</label>
              <input type="text" id="correo_electronico_adm" name="correo_electronico_adm" class="form-control proyectocampo" value="<?=$correo_electronico_adm?>" placeholder="ejemplo@dominio.com" onBlur="validarEmail2(this.id);">
              <small id="errcorreo_electronico_adm" name="errcorreo_electronico_adm" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
              <small id="emailOK3"></small>
              <small id="errCorreocorreo_electronico_adm" name="errcorreo_electronico_adm" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
              <small id="emailOK_adm" class=""></small>
            </div>
          </div>
        </div>
        <!--div class="row">  
          <div class="col-md-12">
            <div class="form-group">
              <label>Breve semblanza de la(el) responsable administrativa(o)<samp id="errbreve_semblanza_admAs" name="errbreve_semblanza_admAs" class="control-label">*</samp>:</label> <small>Máximo 1,000 caracteres</small>
              <textarea id="breve_semblanza_adm" name="breve_semblanza_adm" class="form-control proyectocampodir" placeholder="Ingresa breve semblanza" rows="5" maxlength="1000"><?=$breve_semblanza_adm?></textarea>
              <small id="errbreve_semblanza_adm" name="errbreve_semblanza_adm" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div -->
        <!-- FIN SUB. PESTAÑAS PROYECTO / responsable administrativo -->
        <!-- inicio del Organigrama operativo para la producción del festival -->
        <div class="row">    
          <div class="col-md-12">
            <div class="form-group">
              <div class="col-md-8"> 
                <h3>Organigrama operativo para la producción del festival</h3>
                <p>Usar mayúsculas y minúsculas en los nombres, cargos y funciones.</p>
              </div>
              <div class="col-md-12"><hr class="red small-margin"></div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Funciones</th>
                  </tr>
                </thead>
                <?php for($f=1;$f<=8;$f++){ ?>
                  <tbody>
                    <tr>
                      <th scope="row">
                        <?php
                          echo $f;
                          $organigrama_nombre_a=${'organigrama_nombre'.$f};
                          $organigrama_cargo_a=${'organigrama_cargo'.$f};
                          $organigrama_funciones_a=${'organigrama_funciones'.$f};
                          if($f<=3){ ?>
                            <samp id="errorganigrama_nombre<?=$f?>As" name="errorganigrama_nombre<?=$f?>As" class="control-label">*</samp><?php } ?>
                      </th>
                      <td>
                        <input type="text" id="organigrama_nombre<?=$f?>" name="organigrama_nombre<?=$f?>" value="<?=$organigrama_nombre_a?>" class="form-control proyectocampo" placeholder="Ingresa el nombre">
                        <small id="errorganigrama_nombre<?=$f?>" name="errorganigrama_nombre<?=$f?>" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                      </td>
                      <td>
                        <?php if($f<=3){ ?><samp id="errorganigrama_cargo<?=$f?>As" name="errorganigrama_cargo<?=$f?>As" class="control-label" style="display:none">*</samp><?php } ?>
                        <input type="text" id="organigrama_cargo<?=$f?>" name="organigrama_cargo<?=$f?>" value="<?=$organigrama_cargo_a?>" class="form-control proyectocampo" placeholder="Ingresa el cargo">
                        <small id="errorganigrama_cargo<?=$f?>" name="errorganigrama_cargo<?=$f?>" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                      </td>
                      <td>
                        <?php if($f<=3){ ?><samp id="errorganigrama_funciones<?=$f?>As" name="errorganigrama_funciones<?=$f?>As" class="control-label" style="display:none">*</samp><?php } ?>
                        <input type="text" id="organigrama_funciones<?=$f?>" name="organigrama_funciones<?=$f?>" value="<?=$organigrama_funciones_a?>" class="form-control proyectocampo" placeholder="Ingresa la(s) funcione(s)">
                        <small id="errorganigrama_funciones<?=$f?>" name="errorganigrama_funciones<?=$f?>" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                      </td>
                    </tr>
                  </tbody>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      <!-- fin del Organigrama operativo para la producción del festival -->
    </div>
    <div class="tab-pane" id="tab-09">
    <!-- inicio de la pestaña Desarrollo del Proyecto dentro de Proyecto -->
      <div class="row">
        <div class="col-md-8"> 
          <h3>Desarrollo del Proyecto</h3>
        </div>
        <div class="col-md-12"><hr class="red small-margin">
      </div>
      </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group"> 
              <label>Nombre del festival<samp id="errnombre_festivalAs" name="errnombre_festivalAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="El nombre que se registre, en caso de ser aprobado, será con el que se realizarán todas las actividades sin posibilidad de cambio. Utilizar may&uacute;sculas y min&uacute;sculas, incluir n&uacute;mero de emisión actual, y no cambiar nombre en caso de existir ediciones anteriores."></span></label><input type="text" id="nombre_festival" name="nombre_festival" class="form-control segunampo" value="<?=$nombre_festival?>" placeholder="Ingresa el nombre del festival" maxlength="96"><small id="errnombre_festival" name="errnombre_festival" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group"> 
              <label>Número de ediciones previas comprobables<samp id="errnumero_ediciones_previasAs" name="errnumero_ediciones_previasAs" class="control-label">*</samp>:<span class="glyphicon glyphicon glyphicon-question-sign" aria-hidden="true" data-placement="left" title="N&uacute;mero de ediciones previas comprobables que han mantenido el mismo nombre."></span></label><input name="numero_ediciones_previas" type="text" class="form-control segunampo" id="numero_ediciones_previas" value="<?=$numero_ediciones_previas?>" placeholder="N&uacute;mero de ediciones previas" onKeyPress="return soloNumeros(event)"><small id="errnumero_ediciones_previas" name="errnumero_ediciones_previas" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div>
        <div class="row">    
          <div class="col-md-4">
            <div class="form-group"> 
              
              <label>Disciplina<samp id="errdisciplina_2022As" name="errdisciplina_2022As" class="control-label">*</samp>:</label>
              <select id="disciplina_2022" name="disciplina_2022" class="form-control segunampo">
                <option value="" selected="selected">Selecciona una opción</option>
                <option value=1 <?php if($disciplina_2022==1){ ?> selected="selected" <?php } ?>>Música</option>
                <option value=2 <?php if($disciplina_2022==2){ ?> selected="selected" <?php } ?>>Teatro</option>
                <option value=3 <?php if($disciplina_2022==3){ ?> selected="selected" <?php } ?>>Danza</option>
                <option value=4 <?php if($disciplina_2022==4){ ?> selected="selected" <?php } ?>>Artes visuales y diseño</option>
                <option value=5 <?php if($disciplina_2022==5){ ?> selected="selected" <?php } ?>>Cultura Alimentaria</option>
                <option value=6 <?php if($disciplina_2022==6){ ?> selected="selected" <?php } ?>>Literatura</option>
                <option value=7 <?php if($disciplina_2022==7){ ?> selected="selected" <?php } ?>>Cine</option>
                <option value=8 <?php if($disciplina_2022==8){ ?> selected="selected" <?php } ?>>Multidisciplina</option>
              </select> 
                    <small id="errdisciplina_2022" name="errdisciplina_2022" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                  
              </div>
            </div>
          <div>
        </div>
      </div>
          <div class="row"><!-- 2024: Periodo de realización de festival -->
            <div class="col-md-4"><label class="control-label" for="calendar">Periodo propuesto de realización</label></div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group datepicker-group">
                <label class="control-label" for="calendar">Fecha de inicio<samp id="errperiodo_realizacion_fecha_inicioAs" name="errperiodo_realizacion_fecha_inicioAs" class="control-label">*</samp>:</label>
                <input name="periodo_realizacion_fecha_inicio" type="text" class="form-control fecha_reali_festival" id="periodo_realizacion_fecha_inicio" value="<?=$periodo_realizacion_fecha_inicio?>" placeholder="Ingresa la fecha de inicio">
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                <small id="errperiodo_realizacion_fecha_inicio" name="errperiodo_realizacion_fecha_inicio" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small> 
                <!--errperiodo_realizacion  2022-->
                <small id="errper_proy" name="errper_proy" class="form-text form-text-error" style="display:none">El periodo de realización del proyecto deberá encontrarse entre el 9 de mayo y hasta el 31 de diciembre de 2025.</small> 
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group datepicker-group">
                <label class="control-label" for="calendar">Fecha de término<samp id="errperiodo_realizacion_fecha_terminoAs" name="errperiodo_realizacion_fecha_terminoAs" class="control-label">*</samp>:</label>
                <input name="periodo_realizacion_fecha_termino" type="text" class="form-control fecha_reali_festival" id="periodo_realizacion_fecha_termino" value="<?=$periodo_realizacion_fecha_termino?>" placeholder="Ingresa la fecha de término">
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                <small id="errperiodo_realizacion_fecha_termino" name="errperiodo_realizacion_fecha_termino" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
              </div>
            </div>
          </div>
           
          <div class="row">  
            <div class="col-md-12">
              <div class="form-group">
                <label>Proporciona información acerca de la trayectoria del festival<samp id="errdesarrollo_proyecto_antecedenteAs" name="errdesarrollo_proyecto_antecedenteAs" class="control-label">*</samp>:</label>
                <small>Máximo 2,500 caracteres</small>
                <textarea id="desarrollo_proyecto_antecedente" name="desarrollo_proyecto_antecedente" class="form-control guardar_campostext" placeholder="Ingresa los antecedentes y trayectoria del festival" rows="10" maxlength="2500"><?=$desarrollo_proyecto_antecedente?></textarea>
                <small id="errdesarrollo_proyecto_antecedente" name="errdesarrollo_proyecto_antecedente" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> 
                <label>Describe la población, audiencia y/o público objetivo del festival<samp id="errproy_desc_pob_aud_pubobj_festivalAs" name="errproy_desc_pob_aud_pubobj_festivalAs" class="control-label">*</samp>:</label> <small>Máximo 2,500 caracteres</small>
                <textarea id="proy_desc_pob_aud_pubobj_festival" name="proy_desc_pob_aud_pubobj_festival" class="form-control guardar_campostext" placeholder="Ingresa la Describe la población, audiencia y/o público objetivo del festival" rows="10" maxlength="2500"><?=$proy_desc_pob_aud_pubobj_festival?></textarea>
                <small id="errproy_desc_pob_aud_pubobj_festival" name="errproy_desc_pob_aud_pubobj_festival" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
              </div>
            </div>
          </div>
        <div class="row">    
          <div class="col-md-12">
            <div class="form-group"> 
              <label>¿Cómo o por qué el festival logra ampliar la oferta cultural del lugar donde se planea su realización?<samp id="errdesarrollo_proyecto_justificacionAs" name="errdesarrollo_proyecto_justificacionAs" class="control-label">*</samp>:</label> <small>Máximo 2,500 caracteres</small>
              <textarea id="desarrollo_proyecto_justificacion" name="desarrollo_proyecto_justificacion" class="form-control guardar_campostext" placeholder="Ingresa cómo o por qué el festival logra ampliar la oferta cultural del lugar donde se planea su realización" rows="10" maxlength="2500"><?=$desarrollo_proyecto_justificacion?></textarea>
              <small id="errdesarrollo_proyecto_justificacion" name="errdesarrollo_proyecto_justificacion" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div> 
        <div class="row">    
          <div class="col-md-12">
            <div class="form-group"> 
              <label>Describe la línea curatorial, selección, y/o el perfil de la programación de actividades artísticas, de exhibición y/o formación, del festival<samp id="errdescripcion_linea_curotorialAs" name="errdescripcion_linea_curotorialAs" class="control-label">*</samp>:</label><small>Máximo 2,500 caracteres</small>
              <textarea id="descripcion_linea_curotorial" name="descripcion_linea_curotorial" class="form-control guardar_campostext" placeholder="Ingresa la información correspondiente" rows="10" maxlength="2500"><?=$descripcion_linea_curotorial?></textarea>
              <small id="errdescripcion_linea_curotorial" name="errdescripcion_linea_curotorial" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div> 
        <div class="row">    
          <div class="col-md-12">
            <div class="form-group"> 
              <label>Considerando las anteriores ediciones, ¿cuáles son las novedades para la edición de este 2025? Usa este espacio para describir actividades a destacar, estrategias de impacto o de vinculación con el público<samp id="errproy_noved_ed_2025As" name="errproy_noved_ed_2025As" class="control-label">*</samp>:</label> <small>Máximo 2,500 caracteres</small>
              <textarea id="proy_noved_ed_2025" name="proy_noved_ed_2025" class="form-control guardar_campostext" placeholder="Ingresa la(s) novedades para la edición de este 2025" rows="10" maxlength="2500"><?=$proy_noved_ed_2025?></textarea>
              <small id="errproy_noved_ed_2025" name="errproy_noved_ed_2025" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div>
        <div class="row">    
          <div class="col-md-12">
            <div class="form-group"> 
              <label>¿El proyecto considera actividades dirigidas a grupos en situación de vulnerabilidad?, ¿en los espacios de ejecución consideras la accesibilidad a personas con capacidades diferentes? Usa este espacio para describir aquellas actividades dirigidas a grupos en situación de vulnerabilidad y/o aquellas acciones para contar con un espacio accesible para todas y todos<samp id="errdesarrollo_proyecto_descripcionAs" name="errdesarrollo_proyecto_descripcionAs" class="control-label">*</samp>:</label> <small>Máximo 2,500 caracteres</small>
              <textarea name="desarrollo_proyecto_descripcion" id="desarrollo_proyecto_descripcion" rows="10" class="form-control guardar_campostext" placeholder="Ingresa la información correspondiente" maxlength="2500"><?=$desarrollo_proyecto_descripcion?></textarea>
              <small id="errdesarrollo_proyecto_descripcion" name="errdesarrollo_proyecto_descripcion" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div>
        <div class="row">    
          <div class="col-md-12">
            <div class="form-group"> 
              <label>Describe los espacios y/o la infraestructura de los foros donde se pretenden realizar las actividades y el por qué se seleccionan dichos espacios<samp id="errproy_esp_infra_forosAs" name="errproy_esp_infra_forosAs" class="control-label">*</samp>:</label> <small>Máximo 2,500 caracteres</small>
              <textarea name="proy_esp_infra_foros" id="proy_esp_infra_foros" rows="10" class="form-control guardar_campostext" placeholder="Ingresa la información correspondiente" maxlength="2500"><?=$proy_esp_infra_foros?></textarea>
              <small id="errproy_esp_infra_foros" name="errproy_esp_infra_foros" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div>
        <div class="row">    
          <div class="col-md-12">
            <div class="form-group"> 
              <label>¿Cómo se vincula el festival con otros organismos para la obtención de recursos?, ¿qué organismos se suman a su realización y cómo es su aportación?, ¿por qué se vincula con dichos organismos?<samp id="errproy_vinc_org_obtrecursosAs" name="errproy_vinc_org_obtrecursosAs" class="control-label">*</samp>:</label> <small>Máximo 2,500 caracteres</small>
              <textarea name="proy_vinc_org_obtrecursos" id="proy_vinc_org_obtrecursos" rows="10" class="form-control guardar_campostext" placeholder="Ingresa la información correspondiente" maxlength="2500"><?=$proy_vinc_org_obtrecursos?></textarea>
              <small id="errproy_vinc_org_obtrecursos" name="errproy_vinc_org_obtrecursos" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div>
        <div class="row">    
          <div class="col-md-12">
            <div class="form-group"> 
              <label>¿Cómo logra el festival favorecer a la itinerancia de las actividades programadas?, ¿mantiene vínculos con otros festivales?<samp id="errproy_fav_itineranciaAs" name="errproy_fav_itineranciaAs" class="control-label">*</samp>:</label> <small>Máximo 2,500 caracteres</small>
              <textarea name="proy_fav_itinerancia" id="proy_fav_itinerancia" rows="10" class="form-control guardar_campostext" placeholder="Ingresa la información correspondiente" maxlength="2500"><?=$proy_fav_itinerancia?></textarea>
              <small id="errproy_fav_itinerancia" name="errproy_fav_itinerancia" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div>
        <div class="row">    
          <div class="col-md-12">
            <div class="form-group"> 
              <label>¿Qué acciones se llevarán a cabo para dar a conocer el festival?<samp id="errproy_accionesAs" name="errproy_accionesAs" class="control-label">*</samp>:</label> <small>Máximo 2,500 caracteres</small>
              <textarea name="proy_acciones" id="proy_acciones" rows="10" class="form-control guardar_campostext" placeholder="Ingresa la información correspondiente" maxlength="2500"><?=$proy_acciones?></textarea>
              <small id="errproy_acciones" name="errproy_acciones" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group"> 
              <label>¿Cuáles son las acciones de sustentabilidad emprendidas por el festival que contribuyen el cuidado del medio ambiente?<samp id="erracciones_festival_medio_ambienteAs" name="erracciones_festival_medio_ambienteAs" class="control-label">*</samp>:</label> <small>Máximo 2,500 caracteres</small>
              <textarea name="acciones_festival_medio_ambiente" id="acciones_festival_medio_ambiente" rows="10" class="form-control guardar_campostext" placeholder="Ingresa la información correspondiente" maxlength="2500"><?=$acciones_festival_medio_ambiente?></textarea>
              <small id="erracciones_festival_medio_ambiente" name="erracciones_festival_medio_ambiente" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group"> 
              <label>Usa este espacio para proporcionar cualquier información adicional que se considere pertinente para la evaluación del proyecto, o incluye un link de video para dar a conocer más del festival: (Campo opcional)
                </label> <small>Máximo 2,500 caracteres</small>
              <textarea name="proy_info_adic" id="proy_info_adic" rows="10" class="form-control guardar_campostext" placeholder="Ingresa la información correspondiente" maxlength="2500"><?=$proy_info_adic?></textarea>
          </div>
          </div>
        </div>
        <!-- inicio Entidad(es) -->
        <div class="row">
          <div class="col-md-8"> 
            <h3>Entidad(es) donde se planea la realización del proyecto</h3>
          </div>
            <div class="col-md-12"><hr class="red small-margin"></div>
        </div>
        <div class="form-group">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Entidad</th>
              </tr>
            </thead>
            <?php for($f=1;$f<=10;$f++){ ?>
              <tbody>
                <tr>
                  <th scope="row">
                    <?php
                      echo $f;
                      $entidades_a=${'entidades_a'.$f};
                      if($f<=1){ ?>
                        <samp id="errentidades_a<?=$f?>As" name="errentidades_a<?=$f?>As" class="control-label">*</samp><?php } ?>
                  </th>
                  <td> 
                    <select id="entidades_a<?=$f?>" name="entidades_a<?=$f?>" class="form-control proyectocampo">
                      <option value="" selected="selected">Selecciona una opción</option>
                        <?php 
                            $sql_consulta_ent = "SELECT * FROM `entidades`"; 
                            $resultado_consulta_ent = mysqli_query($con, $sql_consulta_ent);
                            $num_resultado_consulta_ent = mysqli_num_rows($resultado_consulta_ent);
                            for ($m2=0; $m2 <$num_resultado_consulta_ent; $m2++){
                                $row_proy_ent2 = mysqli_fetch_array($resultado_consulta_ent, MYSQLI_ASSOC);
                                $id_entidad_proyecto_origen  = $row_proy_ent2["id_entidad_proyecto"];
                                $nombre_entidad_proyecto  = $row_proy_ent2["nombre_entidad_proyecto"];
                        ?>
                      <option value=<?php echo $id_entidad_proyecto_origen; ?> <?php if($id_entidad_proyecto_origen==$entidades_a){ ?> selected="selected" <?php } ?>><?php echo  $nombre_entidad_proyecto; ?></option>
                    <?php } ?>
                  </select>
                  <small id="errentidades_a<?=$f?>" name="errentidades_a<?=$f?>" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                </td>
              </tr>
            </tbody>
          <?php } ?>
        </table>
      </div>
      <!-- fin Entidad(es) -->

        <!-- inicio Metas numéricas dentro de Desarrollo del Proyecto dentro de Proyecto -->        
        <div class="row">
          <div class="col-md-12"><h3>Metas numéricas</h3><p>Anotar de manera cuantitativa las metas del festival</p></div><div class="col-md-12"><hr class="red small-margin"></div></div>
            <div class="row">
              <div class="col-md-12">
              <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Meta</th>
                        <th>Meta 2025</th>
                        <th>Meta alcanzada 2024 o en el último año de realización</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Número de actividades artísticas y/o culturales-Número de títulos, cortometrajes, largometrajes, entre otros<samp id="errmeta_num_presentacionesAs" name="errmeta_num_presentacionesCAs" class="control-label">*</samp>:</th>
                        <td><input type="text" id="meta_num_presentaciones" name="meta_num_presentaciones" class="form-control segunampo" value="<?=$meta_num_presentaciones?>" placeholder="Ingresa n&uacute;mero" onKeyPress="return soloNumeros(event)">
                            <small id="errmeta_num_presentaciones" name="errmeta_num_presentaciones" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small></td>
                        <td><input type="text" id="meta_num_presentaciones_alcanzada" name="meta_num_presentaciones_alcanzada" class="form-control segunampo" value="<?=$meta_num_presentaciones_alcanzada?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)"></td>
                      </tr>
                      <tr>
                        <th scope="row">Total de público<samp id="errmeta_num_publicoAs" name="errmeta_num_publicoAs" class="control-label">*</samp>:
                           </th>
                        <td> <input type="text" id="meta_num_publico" name="meta_num_publico" class="form-control segunampo" value="<?=$meta_num_publico?>" placeholder="Ingresa la cantidad" onKeyPress="return soloNumeros(event)">
                            <small id="errmeta_num_publico" name="errmeta_num_publico" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                          </td>
                          <td><input type="text" id="meta_num_publico_alcanzada" name="meta_num_publico_alcanzada" class="form-control segunampo" value="<?=$meta_num_publico_alcanzada?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)"></td>
                      </tr>
                      <tr>
                        <th scope="row">Número de municipios a beneficiar<samp id="errmeta_num_municipioAs" name="errmeta_num_municipioAs" class="control-label">*</samp>:
                             </th>
                        <td> <input name="meta_num_municipio" type="text" class="form-control segunampo" id="meta_num_municipio" value="<?=$meta_num_municipio?>" placeholder="Ingresa n&uacute;mero" onKeyPress="return soloNumeros(event)">
                            <small id="errmeta_num_municipio" name="errmeta_num_municipio" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </td>
                       <td><input type="text" id="meta_num_municipio_alcanzada" name="meta_num_municipio_alcanzada" class="form-control segunampo" value="<?=$meta_num_municipio_alcanzada?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)"></td>
                      </tr>
                      <tr>
                        <th scope="row">Número de foros, sedes o medios de transmisión que se utilizarán<samp id="errmeta_num_forosAs" name="errmeta_num_forosAs" class="control-label">*</samp>:
                               </th>
                        <td> <input type="text" id="meta_num_foros" name="meta_num_foros" class="form-control segunampo" value="<?=$meta_num_foros?>" placeholder="Ingresa n&uacute;mero" onKeyPress="return soloNumeros(event)">
                            <small id="errmeta_num_foros" name="errmeta_num_foros" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                     </td>
                     <td><input type="text" id="meta_num_foros_alcanzada" name="meta_num_foros_alcanzada" class="form-control segunampo" value="<?=$meta_num_foros_alcanzada?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)"></td>
                      </tr>
                      <tr>
                        <th scope="row">Número total de participantes artísticos<samp id="errmeta_num_artistasAs" name="errmeta_num_artistasAs" class="control-label">*</samp>:
                                     </th>
                        <td> <input type="text" id="meta_num_artistas" name="meta_num_artistas" class="form-control segunampo" value="<?=$meta_num_artistas?>" placeholder="Ingresa n&uacute;mero" onKeyPress="return soloNumeros(event)">
                            <small id="errmeta_num_artistas" name="errmeta_num_artistas" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        </td>
                        <td><input type="text" id="meta_num_artistas_alcanzada" name="meta_num_artistas_alcanzada" class="form-control segunampo" value="<?=$meta_num_artistas_alcanzada?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)"></td>
                      </tr>
                      <tr>
                        <th scope="row">Total de grupos artísticos/Secciones o categorías de participación para exhibición de películas, cortometrajes, entre otros<samp id="errmeta_cantidad_gruposAs" name="errmeta_cantidad_gruposAs" class="control-label">*</samp>:
                                     </th>
                        <td><input type="text" id="meta_cantidad_grupos" name="meta_cantidad_grupos" class="form-control segunampo" value="<?=$meta_cantidad_grupos?>" placeholder="Ingresa la cantidad" onKeyPress="return soloNumeros(event)">
                            <small id="errmeta_cantidad_grupos" name="errmeta_cantidad_grupos" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        </td>
                        <td><input type="text" id="meta_cantidad_grupos_alcanzada" name="meta_cantidad_grupos_alcanzada" class="form-control segunampo" value="<?=$meta_cantidad_grupos_alcanzada?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)"></td>
                      </tr>
                      <tr>
                        <th scope="row">Número de actividades académicas<samp id="errmeta_num_actividades_academicasAs" name="errmeta_num_actividades_academicasAs" class="control-label">*</samp>:
                           </th>
                        <td>  <input type="text" id="meta_num_actividades_academicas" name="meta_num_actividades_academicas" class="form-control segunampo" value="<?=$meta_num_actividades_academicas?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)">
                            <small id="errmeta_num_actividades_academicas" name="errmeta_num_actividades_academicas" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                       </td>
                        <td><input type="text" id="meta_num_actividades_academicas_alcanzada" name="meta_num_actividades_academicas_alcanzada" class="form-control segunampo" value="<?=$meta_num_actividades_academicas_alcanzada?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)"></td>
                      </tr>
                      <tr>
                        <th scope="row">Número de actividades a cargo de personas participantes locales/ Número de títulos de cine mexicano<samp id="errmeta_act_creadores_num_cine_mexAs" name="errmeta_act_creadores_num_cine_mexAs" class="control-label">*</samp>:</th>
                        <td><input type="text" id="meta_act_creadores_num_cine_mex" name="meta_act_creadores_num_cine_mex" class="form-control segunampo" value="<?=$meta_act_creadores_num_cine_mex?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)">
                            <small id="errmeta_act_creadores_num_cine_mex" name="errmeta_act_creadores_num_cine_mex" class="form-text form-text-error" style="display:none">Este campo es obligatorio</small>
                        </td>
                        <td><input type="text" id="meta_act_creadores_num_cine_mex_alcanzada" name="meta_act_creadores_num_cine_mex_alcanzada" class="form-control segunampo" value="<?=$meta_act_creadores_num_cine_mex_alcanzada?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)"></td>
                      </tr>
                      <?php /*tr>
                        <th scope="row">Otros (especificar):</th>
                        <td><input type="text" id="meta_otro_2025" name="meta_otro_2025" class="form-control segunampo" value="<?=$meta_otro_2025?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)"></td>
                        <td><input type="text" id="meta_otro_alcanzada_2024" name="meta_otro_alcanzada_2024" class="form-control segunampo" value="<?=$meta_otro_alcanzada_2024?>" placeholder="Ingresa el n&uacute;mero" onKeyPress="return soloNumeros(event)"></td>
                      </tr*/ ?>
                    </tbody>
                  </table>
              </div>
            </div>
        
                                                                             
            <!--div class="row">
              <div class="col-md-12">
                <?php $Nro_desh_boton=0; ?>
                <button type="button" class="btn btn btn-primary" data-toggle="modal" data-target="#panel-03" <?php if($Nro_desh_boton>=50){ ?> disabled="disabled" <?php } ?>><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>Agregar meta</button>
              </div>
            </div-->
            <div class="row">    
              <div class="col-md-12">
                <div class="form-group"> 
                  <!--div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div id="contenedorModalalert">
                        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" id="alertModal">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header"><h4 class="modal-title">Alerta</h4></div>
                              <div class="modal-body"><div class="modal-body" id="mensaje_BODY_alert"></div></div>
                              <div class="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal" id="cerrar_mensaje">Cancelar</button><button type="button" class="btn btn-success" id="aceptar_alert">Aceptar</button></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group"><small id="errCALCULO" name="errCALCULO" class="form-text form-text-error" style="display:none">Verifica los montos ya que no corresponden</small></div>
                  </div>
                </div>
                <div id="total_cont_all3">
                  <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="totalcont3">
                    <?php //require_once('catalogo_metas_numericas.php'); ?>
                  <!--div id="totalcont"></div-->
                  </div>
                </div>
                <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="para_Trabajar3"><!--Para trabajar--></div></div>
              </div>
            </div>
          </div>
        </div>      
        <!-- fin Metas numéricas dentro de Desarrollo del Proyecto dentro de Proyecto -->

        <!--div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <small id="errpoblacion_especific" name="errpoblacion_especific" class="form-text form-text-error" style="display:none">Debes ingresar el mismo número de personas (hombre - mujer) </small></div>
            </div>
          </div-->
        <!-- FIN Problación objetivo del festival-->   
        
        <!-- fin de la pestaña Desarrollo del Proyecto dentro de Proyecto -->
        </div>
      </div><!--fin content-->
    </div>
</div>
<!-- FIN SUB. PESTAÑAS PROYECTO -->