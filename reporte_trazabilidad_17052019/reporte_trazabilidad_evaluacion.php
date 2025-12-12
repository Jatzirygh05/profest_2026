<?php require_once('../Connections/conexion.php');
$consulta="select id_solicitud,objetivo_general  from solicitud where  cerrrado=1 order by id_solicitud";
	$result = mysqli_query($con,$consulta);	
?>
<table width="200" border="1">
  <tr>
    <td># PY.</td>
    <td>Estatus General</td>
    <td>Nombre del Festival</td>
    <td>Institución Solicitante	</td>
    <td>Entidad	</td>
    <td>Disciplina</td>
    <td>Costo total del Festival	</td>
    <td>Monto solicitado a la Secretaría de Cultura	"</td>
    <td>Monto de la Inversión 
interna
(recursos propios)"</td>
    <td>"Monto de la Inversión 
externa
(Iniciativa privada)"</td>
    <td>Objetivo </td>
    <td>"Contribuye a la conservación del patrimonio cultural material e inmaterial de la región.
(Valor de 0 a 100)"</td>
    <td>	"Promueve la itinerancia de artistas, grupos artísticos y/o obras artísticas y culturales en circuitos artísticos locales, regionales o nacionales.
(Valor de 0 a 100)"</td>
    <td>	"Enriquece la oferta cultural
(Valor de 0 a 100)"</td>
    <td>"Promueve la participación de creadores o especialistas de la región.
(Valor de 0 a 100)"</td>
    <td>"Incluye actividades de divulgación o talleres de formación y capacitación que vinculan a los creadores o especialistas que participan en los eventos y festivales con sus audiencias.
(Valor de 0 a 100)"</td>
    <td>"Impulsa el desarrollo económico y el turismo cultural.
(Valor de 0 a 100)"</td>
    <td>"Fomenta la conservación del medio ambiente
(Valor de 0 a 100)"</td>
    <td>	"Fomenta la creación, el aprovechamiento o fortalecimiento de circuitos
culturales
(Valor de 0 a 100)"	</td>
    <td>	"Ofrece programas y actividades para sectores vulnerables de la población, tales como: adultos mayores, pueblos indígenas, comunidad LGBTT, personas conalgún tipo de discapacidad y jóvenes, entre otros.
(Valor de 0 a 100)"	</td>
    <td>	"Se realiza en comunidades con altos niveles de marginación
(Valor de 0 a 100)"</td>
    <td>			"Promueve, a través de actividades de formación y promoción, la equidad de género.
(Valor de 0 a 100)"</td>
    <td>
  						"Fomenta la participación y asistencia de integrantes de los pueblos indígenas.
(Valor de 0 a 100)"</td>
    <td>"Programa actividades culturales especialmente dirigidas a las niñas y niños.
(Valor de 0 a 100)"</td>
    <td>"Acompaña los objetivos de la Agenda 2030 para el desarrollo sostenible.
(Valor de 0 a 100)"	</td>
    <td>"Tiene el personal debidamente capacitado y suficiente para cumplir con las necesidades y alcance del festival.
(Valor de 0 a 100)"	</td>
    <td>"Comprueba la relevancia del festival y, de ser el caso, evidencia la trayectoria del festival
(Valor de 0 a 100)"</td>
    <td>"Cuenta con la capacidad de financiamiento para llevar a cabo la propuesta planteada.
(Valor de 0 a 100)"</td>
    <td>"Muestra el porcentaje de avance de la programación confirmada, además de que especifica que el destino de los recursos solicitados está contemplado, mayoritariamente, para el pago de servicios artísticos profesionales.
(Valor de 0 a 100)"</td>
<td>"Demuestra que el festival forma parte de una planeación a largo plazo (i. e. plan estatal, municipal o institucional de cultura oficial).
(Valor de 0 a 100)"</td>
<td>"Evaluación del proyecto de acuerdo a los criterios de selección
(0-50 Insuficiente, 51-80 Regular, 81-100 Satisfactorio)"</td>
<td>Observaciones para el Comité</td>
<td>"Calidad general y consistencia de la programación
INBA"</td>
<td>"Pertinencia general de costos por presentación
INBA"</td>
<td>"Observaciones Generales
INBA"</td>
<td>Monto máximo a otorgar</td>
<td>Monto sugerido por la DGPFC</td>
<td>No. Actividades Programadas sugeridas	</td>
<td>Monto sugerido por el INBA</td>
<td>Monto autorizado por el Comité</td>
<td>Responsable de Revisión</td>
  </tr>			
  	<?php while($renglon = mysqli_fetch_array($result))
			{
				
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
<td></td>
 <td><?=utf8_encode($renglon['objetivo_general'])?></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
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


