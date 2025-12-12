<?php
require_once('Connections/conexion.php');
/*SELECT * FROM solicitud WHERE cerrrado=1 
and fecha_hora_cierre_total<='2022-03-02 18:00:00'
order by id_solicitud*/
$sql_consulta = "select * from solicitud order by clave_usuario;";                          
 $resultado_consulta = mysqli_query($con, $sql_consulta);
 $num_resultados_solicitud = mysqli_num_rows($resultado_consulta);
 echo "<table>
 <tr>
    <td>id_solicitud</td>
    <td>clave_usuario</td>
    <td>nombre festival</td>
    <td>ver reporte1</td>
    <td>ver reporte2</td>
    <td>ver reporte3</td>
    </tr>";
 for ($j=0; $j <$num_resultados_solicitud; $j++){
	 $row_sol = mysqli_fetch_array($resultado_consulta, MYSQLI_ASSOC);
     $id_solicitud = $row_sol['id_solicitud'];
     $cve_user_imp = $row_sol['clave_usuario'];
?>
    <tr>
        <td><?=$j.'-'.$id_solicitud?></td>
        <td><?=$cve_user_imp?></td>
        <td><?=$row_sol['nombre_festival'];?></td>
        <td><a href="PRESUPUESTO_PROGRAMACION_generar_interno.php?cve_user_imp=<?=$cve_user_imp?>&id_solicitud=<?=$id_solicitud?>" target='blank'>Programación y Presupuesto</a></td>
        <td>|<a href="Solicitud_generar_interno.php?cve_user_imp=<?=$cve_user_imp?>&id_solicitud=<?=$id_solicitud?>" target='blank'>Solicitud</a></td>
        <td>|<a href="reporte/Formato_proyecto_generar_interno/Formato_proyecto.php?cve_user_imp=<?=$cve_user_imp?>&id_solicitud=<?=$id_solicitud?>" target='blank'>Proyecto</a></td>
    </tr>
<?php
 }
?>
</table>
