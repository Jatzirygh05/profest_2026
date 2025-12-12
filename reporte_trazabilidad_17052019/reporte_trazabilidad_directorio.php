<?php require_once('../Connections/conexion.php');
$consulta="SELECT  f.id_solicitud, 
s.grado_academico,
s.nombre_titular,
s.primer_apellido,
s.segundo_apellido,
s.cargo,
s.lada,
s.telefono_fijo,
s.extension,
s.correo_electronico,
s.calle,
s.no_ext,
s.colonia,
s.cp,
s.estado,
s.municio_alcaldia,
u.responsable_adm_nombre,	
u.primer_apellido_adm,
u.segundo_apellido_adm,
u.cargo_adm,	
u.lada_adm,	
u.telefono_fijo_adm,
u.extension_adm,
u.telefono_movil_adm,	
u.correo_electronico_adm,	
u.responsable_op_nombre,
u.primer_apellido_op,
u.segundo_apellido_op,
u.cargo_op,	
u.lada_op,
u.telefono_fijo_op,
u.extension_op,
u.telefono_movil_op,
u.Correo_electronico_op,
f.pagina_web_festival, 
f.facebook_festival,	
f.twitter_festival
FROM solicitud AS f
INNER JOIN usuarios AS s
    ON f.clave_usuario = s.clave_usuario
INNER JOIN proyecto AS u
    ON f.clave_usuario = u.clave_usuario
    WHERE f.cerrrado=1
ORDER BY f.id_solicitud";
	$result = mysqli_query($con,$consulta);
?>
<table width="200" border="1">
  <tr>
    <td># PY.</td>
    <td>Estatus General</td>
    <td>Nombre del Festival</td>
    <td>	Nombre legal de la Instancia</td>
    <td>	Entidad</td>
    <td>	Municipio</td>
    <td>	Tipo de Instancia</td>
    <td>	Proyecto Propio o Respaldado</td>
    <td>	Tipo de beneficiario indirecto	</td>
    <td>Grado académico del titular	</td>
    <td>Nombre del titular</td>
    <td>			Cargo del titular</td>
    <td>	Teléfono titular</td>
    <td>		Correo titular</td>
    <td>	Calle	</td>
    <td>Número	</td>
    <td>Colonia	</td>
    <td>Código Postal</td>
    <td>	Delegación o Municipio	</td>
    <td>Entidad	</td>
    <td>Nombre del enlace administrativo</td>
    <td>	Cargo del enlace administrativo</td>
    <td>	Teléfono</td>
    <td>	Correo</td>
    <td>	Nombre del responsable operativo</td>
    <td>	Cargo del responsable operativo del Festival</td>
    <td>	Teléfono del responsable operativo	</td>
    <td>Correo del responsable operativo</td>
    <td>	Página Web	</td>
    <td>Facebook	</td>
    <td>Twitter	</td>
    <td>RFC de la instancia	</td>
    <td>Fecha de constitución	</td>
    <td>Dirección fiscal y para envío de paquetería	</td>
    <td>"Grado académico del titular
(Mayúsculas)"</td>
    <td>	"Cargo del Titular
(Mayúsculas)"</td>
    <td>	"Instancia para correspondencia
(Mayúsculas)"</td>
  </tr>
  	<?php while($renglon = mysqli_fetch_array($result))
			{
				
				$grado_academico = utf8_encode($renglon['grado_academico']);
				$colonia = $renglon['colonia'];
				$cp = $renglon['cp'];
				$estado = $renglon['estado'];
			 	$municio_alcaldia = $renglon['municio_alcaldia'];	
					// ******************************(INICIO)validar grado academico******************************
		if($grado_academico=="Doctor" || $grado_academico=="DOCTOR" || $grado_academico=="Dr."){
			$nombre_grado_academico = "Dr.";
		}
		if($grado_academico=="Dra." || $grado_academico=="Doctora" || $grado_academico=="DOCTORA"){
			$nombre_grado_academico = "Dra.";
		}
		if($grado_academico=="Maestro" || $grado_academico=="Profesor" || $grado_academico=="MAESTRO" || $grado_academico=="Mtro."){
			$nombre_grado_academico = "Mtro.";
		}
		if($grado_academico=="Maestra" || $grado_academico=="MAESTRA" || $grado_academico=="Mtra."){
			$nombre_grado_academico = "Mtra.";
		}
		if($grado_academico=="C.P." || $grado_academico=="lic" || $grado_academico=="Lic en Pedagogía" || 
		$grado_academico=="Licenciada" || $grado_academico=="Licenciada en Arquitectura" || $grado_academico=="Licenciado" || $grado_academico=="Licenciado en Economía"
		|| $grado_academico=="Licenciado en Informatica" || $grado_academico=="Licenciatura" || $grado_academico=="LICENCIATURA EN CIENCIAS DE LA EDUCACION" 
		|| $grado_academico=="LICENCIATURA EN DISEÑO PARA LA COMUNICACIÓN GRÁFICA" || $grado_academico=="Licenciaturas" || $grado_academico=="Lic en Pedagogía" 
		|| $grado_academico=="licenciado" || $grado_academico=="LICENCIADO" || $grado_academico=="LICENCIATURA" || $grado_academico=="Licenciatura" || $grado_academico=="C.P." || $grado_academico=="Lic."){
			$nombre_grado_academico = "Lic.";
		}
		if($grado_academico=="Ingeneniero" || $grado_academico=="INGENIERÍA" || $grado_academico=="Ingeniero" || 
		$grado_academico=="INGENIERO EN SISTEMAS" || $grado_academico=="INGENIERO INDUSTRIAL" || $grado_academico=="INGENIERIA" || $grado_academico=="Ing."){

			$nombre_grado_academico = "Ing.";
		}
		
		if($grado_academico=="Bachillerato" || $grado_academico=="CARRERA TECNICA" || $grado_academico=="Ciudadano" || $grado_academico=="ciudadano" ||
		$grado_academico=="MEDIO SUPERIOR" || $grado_academico=="Preparatoria" || $grado_academico=="Secundaria" || 
		$grado_academico=="Técnico" || $grado_academico=="Universitario" || $grado_academico=="Preparatoria" || $grado_academico=="EGRESADO" || $grado_academico=="C."){
			$nombre_grado_academico = "C.";
		}
		// ******************************(FIN)validar grado academico******************************	
		?>
  <tr>
    <td><?=utf8_encode($renglon['id_solicitud'])?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?=$nombre_grado_academico?></td>
    <td><?=utf8_encode($renglon['nombre_titular']).'&nbsp;'.utf8_encode($renglon['primer_apellido']).'&nbsp;'.utf8_encode($renglon['segundo_apellido'])?></td>
    <td><?=utf8_encode($renglon['cargo'])?></td>
    <td><?='('.utf8_encode($renglon['lada']).') '.$renglon['telefono_fijo'].' Ext. '.utf8_encode($renglon['extension'])?></td>
    <td><?=utf8_encode($renglon['correo_electronico'])?></td>
    <td><?=utf8_encode($renglon['calle'])?></td>
    <td><?=utf8_encode($renglon['no_ext'])?></td>
    <?php
	$colonia_tam=strlen($colonia);
	
	if($colonia_tam==4){
		 $parametro="and id_asenta_cpcons='$colonia'";
		
	
		 $consulta_p2="SELECT cp, c_estado, d_estado, c_mnpio, D_mnpio, d_asenta FROM codigos_postales 
		  WHERE cp='$cp' and c_estado='$estado' and c_mnpio='$municio_alcaldia' $parametro;";
		  $eject2=mysqli_query($con,$consulta_p2);

		  while($registro2=mysqli_fetch_array($eject2)){
                
					$c_estado	=	$registro2['c_estado']; 
					$c_mnpio	=	$registro2['c_mnpio'];
					$D_mnpio	=	$registro2['D_mnpio']; 
					$estado_imp =	$registro2['d_estado'];
					
					if($cp=='85000' && $c_estado=='26' && $c_mnpio=='018' && $colonia=="0858"){ 
						$d_asenta	= "Ciudad Obregón Centro (Fundo Legal)";
					} else {
						$d_asenta	=	$registro2['d_asenta'];
						}
		  }
		  } else {
			 $parametro="";
			 $d_asenta="";
			}
	?>
    <td><?=$colonia.'-'.utf8_encode($d_asenta)?></td>
    <td><?=$cp?></td>
    <td><?=$municio_alcaldia.'-'.utf8_encode($D_mnpio)?></td>
    <td><?=$estado.'-'.utf8_encode($estado_imp)?></td>
    <td><?=utf8_encode($renglon['responsable_adm_nombre']).'&nbsp;'.utf8_encode($renglon['primer_apellido_adm']).'&nbsp;'.utf8_encode($renglon['segundo_apellido_adm'])?></td>
    <td><?=utf8_encode($renglon['cargo_adm'])?></td>	
    <td><?='('.utf8_encode($renglon['lada_adm']).') '.$renglon['telefono_fijo_adm'].' Ext. '.utf8_encode($renglon['extension_adm'])?></td>	
    <td><?=utf8_encode($renglon['correo_electronico_adm'])?></td>	
    <td><?=utf8_encode($renglon['responsable_op_nombre']).'&nbsp;'.utf8_encode($renglon['primer_apellido_op']).'&nbsp;'.utf8_encode($renglon['segundo_apellido_op'])?></td>
    <td><?=utf8_encode($renglon['cargo_op'])?></td>	
    <td><?='('.utf8_encode($renglon['lada_op']).') '.$renglon['telefono_fijo_op'].' Ext. '.utf8_encode($renglon['extension_op'])?></td>
    <td><?=utf8_encode($renglon['Correo_electronico_op'])?></td>
    <td><?=utf8_encode($renglon['pagina_web_festival'])?></td> 
    <td><?=utf8_encode($renglon['facebook_festival'])?></td>	
    <td><?=utf8_encode($renglon['twitter_festival'])?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <?php } ?>
  </tr>
</table>


