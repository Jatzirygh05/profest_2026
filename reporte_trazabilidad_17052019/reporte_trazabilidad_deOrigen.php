<?php require_once('../Connections/conexion.php');
$consulta="SELECT  f.id_solicitud, 
f.fecha_hora_captura_concluida, 
f.fecha_hora_cierre_total,
f.nombre_festival,
s.nombre_instancia_postulante,
s.cp,
s.estado,
s.municio_alcaldia,
s.colonia,
s.tipo_instancia,
f.numero_ediciones_previas,
f.disciplina_artes_escenicas,
f.disciplina_artes_plasticas,
f.disciplina_cinematografia,
f.disciplina_gastronomia,
f.disciplina_literatura,
f.periodo_realizacion_fecha_inicio,
f.periodo_realizacion_fecha_termino,
f.Infor_finan_costo_monto,
f.Infor_finan_apoyo_costo_total
FROM solicitud AS f
INNER JOIN usuarios AS s
    ON f.clave_usuario = s.clave_usuario
    WHERE f.cerrrado=1
ORDER BY f.id_solicitud";
	$result = mysqli_query($con,$consulta);
?>
<table width="200" border="1">
  <tr>
    <td># PY.</td>
    <td>Fecha de registro
</td>
    <td>	Fecha de conclusión	</td>
    <td>Nombre del Festival</td>
    <td>	Nombre legal de la Instancia Solicitante	</td>
    <td>Entidad</td>
    <td>Municipio	</td>
    <td>Zona (Noreste, Noroeste, Sur, Centro-Occidente, Centro)	</td>
    <td>"Tipo de Instancia
(Estatal, Municipal, Cultural Municipal o Educativa)"	</td>
    <td>Proyecto Propio o Respaldado	</td>
    <td>"Tipo de beneficiario indirecto
(Estatal, Municipal, Educativa, AC)"	</td>
    <td>Emisiones previas</td>
    <td>	Emisiones previas validadas	</td>
    <td>Disciplina del proyecto	Duración del Festival (días)</td>
    <td>Duración del Festival (días)</td>
    <td>	Fecha de Inicio del Festival	</td>
    <td>Fecha de Término del Festival	</td>
    <td>
Costo total del Festival	</td>
    <td>Monto solicitado a la Secretaría de Cultura	</td>
    <td>Monto máximo a otorgar	</td>
    <td>Causa de descarte administrativo	</td>
    <td>Agrupado de faltantes y observaciones administrativas	</td>
    <td>
ESTATUS GENERAL	</td>
<td>Monto de Trabajo</td>
    <td>	Monto autorizado	</td>
    <td>Días que se apoyan de la duración total del Festival</td>
    <td>	Verificación para evitar exceso de monto solicitado vs monto sugerido</td>
   
  	<?php while($renglon = mysqli_fetch_array($result))
			{
				
				$cp = $renglon['cp'];
				$estado = $renglon['estado'];
				$municio_alcaldia = $renglon['municio_alcaldia'];	
				$colonia = $renglon['colonia'];
		?>
  <tr>
    <td><?=utf8_encode($renglon['id_solicitud'])?></td>
    <td><?=$renglon['fecha_hora_captura_concluida']?></td>
    <td><?=$renglon['fecha_hora_cierre_total']?></td>
    <td><?=utf8_encode($renglon['nombre_festival'])?></td>
    <td><?=utf8_encode($renglon['nombre_instancia_postulante'])?></td>
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
    <td><?=$estado.'-'.utf8_encode($estado_imp)?></td>
    <td><?=$municio_alcaldia.'-'.utf8_encode($D_mnpio)?></td>
    <td></td>
    <td><?=utf8_encode($renglon['tipo_instancia'])?></td>
    <td></td>
    <td></td>
    <td><?=utf8_encode($renglon['numero_ediciones_previas'])?></td>
    <td></td>
    <td>
    <?php	
	if($renglon['disciplina_artes_escenicas']==1){ echo "Artes escénicas "; }
	if($renglon['disciplina_artes_plasticas']==1){ echo "Artes Visuales "; }
	if($renglon['disciplina_cinematografia']==1){ echo "Cinematografía "; }
	if($renglon['disciplina_gastronomia']==1){ echo "Gastronomía "; }
	if($renglon['disciplina_literatura']==1){ echo "Literatura "; }
	?>
    </td>
    <td></td>
    <td><?=$renglon['periodo_realizacion_fecha_inicio']?></td>
    <td><?=$renglon['periodo_realizacion_fecha_termino']?></td>
    <td><?=$renglon['Infor_finan_costo_monto']?></td>
    <td><?=$renglon['Infor_finan_apoyo_costo_total']?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <?php } ?>
  </tr>
</table>


