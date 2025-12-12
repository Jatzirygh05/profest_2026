<?php
$phpVar = "Hello";
/*$Correo_sist = "$Correo_sist";
$constr_pass = "$Pass";
$nombre      = "$nombre_usuario_reg_proyecto"; 
$usuario     = "$cual_usu";
$cons_cual_primero = "$cons_cual_primero";*/
$Correo_sist = "1";
$constr_pass = "2";
$nombre      = "3"; 
$usuario     = "4";
$cons_cual_primero = "5";
?>
<script type="text/javascript" src="js/hacer_peticion_y_altera.js"></script>
<script type="text/javascript">
    var jsVar = "<?php echo $phpVar; ?>";
    var jsVar1 = "<?php echo $Correo_sist; ?>";
    var jsVar2 = "<?php echo $constr_pass; ?>";
    var jsVar3 = "<?php echo $nombre; ?>";
    var jsVar4 = "<?php echo $usuario; ?>";
    var jsVar5 = "<?php echo $cons_cual_primero; ?>";
    alert('jsVar: ' + jsVar + 'jsVar1: ' + jsVar1 + 'jsVar2: ' + jsVar2 + 'jsVar3: ' + jsVar3 + 'jsVar4: ' + jsVar4 + 'jsVar5: ' + jsVar5);
    //+'&valor='+this.value
    var url_p_mail='mail/conf_correo_activacion.php?variable='+jsVar;
	hacerPeticion(url_p_mail);
</script>