<?php
  function arraysuma_resumenpresup($con, $cve_user){
    $query_imp_2022="SELECT monto_unidad_total, porcentaje_total FROM mas_presupuesto 
                    WHERE clave_usuario='".$cve_user."'";
    $res_query_imp_2022 = mysqli_query($con, $query_imp_2022);
        while($row_query_imp_2022=mysqli_fetch_array($res_query_imp_2022, MYSQLI_ASSOC)){
              $monto_unidad_total=$row_query_imp_2022['monto_unidad_total'];
              $porcentaje_total=$row_query_imp_2022['porcentaje_total'];
    } 
        return array($monto_unidad_total, $porcentaje_total);
}
$result_resumenpresup = arraysuma_resumenpresup($con, $cve_user);
//echo $result_resumenpresup[0];
//echo $result_resumenpresup[1];
//var_dump($result_resumenpresup); 
?>