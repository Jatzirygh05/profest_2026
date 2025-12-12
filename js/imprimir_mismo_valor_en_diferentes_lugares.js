$(document).ready(function () {
	/*$("#objetivo_general").keyup(function () {
		var value = $(this).val();
		$("#Objetivo_genereral_proyecto").val(value);
	});*/
			  
	$("#Infor_finan_apoyo_monto").keyup(function () {
		var value = $(this).val();
		$("#Infor_finan_apoyo_monto_paso").val(value);
	});
			  
	$("#Infor_finan_apoyo_costo_total").keyup(function () {
		var value = $(this).val();
		$("#Infor_finan_apoyo_costo_total_paso").val(value);
	});
			  
	$("#Infor_finan_costo_monto").keyup(function () {
		var value = $(this).val();
		$("#Infor_finan_costo_monto_paso").val(value);
	});
});