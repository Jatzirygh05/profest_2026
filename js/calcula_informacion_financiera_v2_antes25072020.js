function suma_cantidades(){	
	var m1 = document.getElementById("Infor_finan_costo_monto").value; //Costo total de realización del festival
	var m2 = document.getElementById("Infor_finan_apoyo_monto").value; //Apoyo financiero solicitado a la Secretaría de Cultura
	
	var categoria = document.getElementById("info_financiera_categoria").value;
	
	var as_mal= document.getElementById('errInfor_finan_apoyo_montoAs');
	var campo_mal = document.getElementById('Infor_finan_apoyo_monto');
	var campo_porcentaje = document.getElementById('Infor_finan_apoyo_costo_total');
	var campo_porcentaje_rep = document.getElementById('Infor_finan_apoyo_costo_total_paso');

	var costo_total = document.getElementById("Infor_finan_apoyo_costo_total"); //% de apoyo financiero sobre el costo total del Proyecto
	
	if(!isNaN(m1) && !isNaN(m2) && categoria!=''){
	
		var total_meno_o_igual = m1*0.85;
		cost_tot = parseInt(total_meno_o_igual);

		switch(categoria)
		{
			case 'A':
				//console.log('ENTRO A CATEGORIA a')
				
				if(m2<=total_meno_o_igual && m2<=500000) { 
				//console.log('menor o igual A MENOR A 500,000')
				errCosto_mayor3.style.display = "none";
				as_mal.className = 'form-text';
	            campo_mal.className = 'form-control';
				var porc_apoyo_fin_sobre_cost_tot = (m2 / m1)*100
	            campo_porcentaje.value = porc_apoyo_fin_sobre_cost_tot;
	            campo_porcentaje_rep.value = porc_apoyo_fin_sobre_cost_tot;
						
				var url_z='receptor_Apoyo_financiero.php?Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2+'&Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot;
				hacerPeticion(url_z);
				
				} else {
					//console.log('mayor')
					errCosto_mayor3.style.display = "block";

					as_mal.className = 'form-text form-text-error';
		            campo_mal.className = 'form-control form-control-error';
					
					campo_mal.value = '';
					campo_porcentaje.value = '';
				}
			break;
			case 'B':
			//console.log('ENTRO A CATEGORIA B')

				if(m2<=total_meno_o_igual && m2<=1500000) { 
				console.log('menor o igual A MENOR A 1,500,000')
				errCosto_mayor3.style.display = "none";
				as_mal.className = 'form-text';
	            campo_mal.className = 'form-control';
				var porc_apoyo_fin_sobre_cost_tot = (m2 / m1)*100
	            campo_porcentaje.value = porc_apoyo_fin_sobre_cost_tot;
	            campo_porcentaje_rep.value = porc_apoyo_fin_sobre_cost_tot;
				
				document.getElementById('errInfor_finan_apoyo_monto').style.display = "none";		
				campo_porcentaje.value.className = 'form-control form-control';

				document.getElementById('errInfor_finan_apoyo_costo_total').style.display = "none";		
				document.getElementById('errInfor_finan_apoyo_costo_totalAs').className = 'control-label';
				document.getElementById('Infor_finan_apoyo_costo_total').className = 'form-control';

				var url_z='receptor_Apoyo_financiero.php?Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2+'&Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot;
				hacerPeticion(url_z);

				
				} else {
					console.log('mayor')
					errCosto_mayor3.style.display = "block";

					as_mal.className = 'form-text form-text-error';
		            campo_mal.className = 'form-control form-control-error';
					
					campo_mal.value = '';
					campo_porcentaje.value = '';
				}
			break;
			case 'C':
			//console.log('ENTRO A CATEGORIA C')
				if(m2<=total_meno_o_igual && m2<=3000000) { 
				//console.log('menor o igual A MENOR A 4,000,000')
				errCosto_mayor3.style.display = "none";
				as_mal.className = 'form-text';
	            campo_mal.className = 'form-control';
				var porc_apoyo_fin_sobre_cost_tot = (m2 / m1)*100
	            campo_porcentaje.value = porc_apoyo_fin_sobre_cost_tot;
	            campo_porcentaje_rep.value = porc_apoyo_fin_sobre_cost_tot;
						
				var url_z='receptor_Apoyo_financiero.php?Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2+'&Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot;
				hacerPeticion(url_z);
				
				} else {
					//console.log('mayor')
					errCosto_mayor3.style.display = "block";

					as_mal.className = 'form-text form-text-error';
		            campo_mal.className = 'form-control form-control-error';
					
					campo_mal.value = '';
					campo_porcentaje.value = '';
				}
			break;
			case 'D':
			//console.log('ENTRO A CATEGORIA D')
				if(m2<=total_meno_o_igual && m2<=5000000) { 
				//console.log('menor o igual A MENOR A 5,000,000')
				errCosto_mayor3.style.display = "none";
				as_mal.className = 'form-text';
	            campo_mal.className = 'form-control';
				var porc_apoyo_fin_sobre_cost_tot = (m2 / m1)*100
	            campo_porcentaje.value = porc_apoyo_fin_sobre_cost_tot;
	            campo_porcentaje_rep.value = porc_apoyo_fin_sobre_cost_tot;
						
				var url_z='receptor_Apoyo_financiero.php?Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2+'&Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot;
				hacerPeticion(url_z);
				
				} else {
					//console.log('mayor')
					errCosto_mayor3.style.display = "block";

					as_mal.className = 'form-text form-text-error';
		            campo_mal.className = 'form-control form-control-error';
					
					campo_mal.value = '';
					campo_porcentaje.value = '';
				}
			break;
		}
	} 
}//fin de la funcion



















