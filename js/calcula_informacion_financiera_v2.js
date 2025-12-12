function suma_cantidades(){	//es la función que se esta usando en el apartado Información financiera campo Monto solicitado a la Secretaría de Cultura*:

	var m1 = eval(document.getElementById("Infor_finan_costo_monto").value); //Costo total de realización del festival
	//18/12/2024 var m2 = eval(document.getElementById("Infor_finan_apoyo_monto").value); //Apoyo financiero solicitado a la Secretaría de Cultura
	
	var categoria = document.getElementById("info_financiera_categoria").value;

	var campo_porcentaje = document.getElementById('Infor_finan_apoyo_costo_total');
	var campo_porcentaje_rep = document.getElementById('Infor_finan_apoyo_costo_total_paso');

	var costo_total = document.getElementById("Infor_finan_apoyo_costo_total"); //% de apoyo financiero sobre el costo total del Proyecto

	
	//(INICIO) 20012023 Impresion en pantalla de en la pestaña Presupuesto PROFEST en el campo Monto solicitado a la Secretaría de Cultura:
	
	switch (categoria){
		case 'A':
		var m2=300000;                                
		break;
		case 'B':
		var m2=500000;
		break;
		case 'C':
		var m2=1000000;
		break;
		case 'D': 
		var m2=1500000;
		break;
		case 'E': 
		var m2=2000000;
		console.log(m2);
		break;
	  }
			   muestra_monto_presup_PROFEST = document.apInf.total_2;
              muestra_monto_presup_PROFEST.value=m2; 


	//(FIN) 20012023 Impresion en pantalla de en la pestaña Presupuesto PROFEST en el campo Monto solicitado a la Secretaría de Cultura:

//&& !isNaN(m2) 
	if(!isNaN(m1) && categoria!=''){
	
		/*var total_meno_o_igual = m1*0.85;
		cost_tot = parseInt(total_meno_o_igual);*/
		
		var mont_coinversion= parseFloat(m1)-parseFloat(m2);
		//console.log(mont_coinversion);
			
				var monto_coinversion = document.getElementById('monto_coinversion');
				monto_coinversion.value=mont_coinversion; 

				var monto_coinversion2 = document.getElementById('monto_coinversion2');
				monto_coinversion2.value=mont_coinversion; 

		switch(categoria)
		{
			case 'A':
				//console.log('ENTRO A CATEGORIA a')
			
					  var m2=300000;                                
				
				/*A) Festivales de segunda y tercera emisión, hasta $500,000.00 (quinientos mil pesos 00/100 M.N.).*/
	
				if(m2<m1) { 
				var porc_apoyo_fin_sobre_cost_tot = 100*parseFloat(m2)/parseFloat(m1);
				campo_porcentaje.value = porc_apoyo_fin_sobre_cost_tot;
				
				
				errInfor_finan_costo_monto.style.display = "none";
				errInfor_finan_costo_montoAs.className = 'form-text';
				Infor_finan_costo_monto.className = 'form-control';

				var url_z='receptor_Apoyo_financiero.php?Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2+'&Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot;
				hacerPeticion(url_z);
				
				} else {
					//console.log('es menor');
					errInfor_finan_costo_monto.style.display = "block";
					errInfor_finan_costo_montoAs.className = 'form-text form-text-error';
					Infor_finan_costo_monto.className = 'form-control form-control-error';
					campo_porcentaje.value = '';
					porc_apoyo_fin_sobre_cost_tot='';
					var url_z='receptor_Apoyo_financiero.php?Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot;
					hacerPeticion(url_z);	
				}
			break;
			case 'B':
				var m2=500000;
				
				//console.log('ENTRO A CATEGORIA B')
				/* 	B) Festivales de cuarta a séptima emisión, hasta $700,000.00 (setecientos mil pesos 00/100 M.N.).*/
				if(m2<m1) { 			
			
				var porc_apoyo_fin_sobre_cost_tot = 100*parseFloat(m2)/parseFloat(m1);
				campo_porcentaje.value = porc_apoyo_fin_sobre_cost_tot;	

					errInfor_finan_costo_monto.style.display = "none";
					errInfor_finan_costo_montoAs.className = 'form-text';
					Infor_finan_costo_monto.className = 'form-control';

				var url_z='receptor_Apoyo_financiero.php?Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2+'&Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot+'&monto_coinversion='+mont_coinversion;
				hacerPeticion(url_z);				
				} else {
					//console.log('es menor');
					errInfor_finan_costo_monto.style.display = "block";
					errInfor_finan_costo_montoAs.className = 'form-text form-text-error';
					Infor_finan_costo_monto.className = 'form-control form-control-error';
					campo_porcentaje.value = '';
					porc_apoyo_fin_sobre_cost_tot='';
					var url_z='receptor_Apoyo_financiero.php?Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot;
				hacerPeticion(url_z);	
					
				}
			break;
			case 'C':
				var m2=1000000;
				
						//console.log('ENTRO A CATEGORIA C')
			/* 	C) Festivales de octava a decimoprimera emisión, hasta $1,250,000.00 (un millón doscientos cincuenta mil pesos 00/100 M.N.).*/
			if(m2<m1) { 			
			
				var porc_apoyo_fin_sobre_cost_tot = 100*parseFloat(m2)/parseFloat(m1);
				campo_porcentaje.value = porc_apoyo_fin_sobre_cost_tot;	

					errInfor_finan_costo_monto.style.display = "none";
					errInfor_finan_costo_montoAs.className = 'form-text';
					Infor_finan_costo_monto.className = 'form-control';

				var url_z='receptor_Apoyo_financiero.php?Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2+'&Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot+'&monto_coinversion='+mont_coinversion;
				hacerPeticion(url_z);				
				} else {
					//console.log('es menor');
					errInfor_finan_costo_monto.style.display = "block";
					errInfor_finan_costo_montoAs.className = 'form-text form-text-error';
					Infor_finan_costo_monto.className = 'form-control form-control-error';
					campo_porcentaje.value = '';
					porc_apoyo_fin_sobre_cost_tot='';
					var url_z='receptor_Apoyo_financiero.php?Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot;
				hacerPeticion(url_z);	
					
				}
			break;
			case 'D':
				var m2=1500000;
				
			//console.log('ENTRO A CATEGORIA D')
			/* 	D) Festivales de decimosegunda emisión en adelante, hasta $2,500,000.00 (dos millones quinientos mil pesos 00/100 M.N.).*/
			if(m2<m1) { 			
			
				var porc_apoyo_fin_sobre_cost_tot = 100*parseFloat(m2)/parseFloat(m1);
				campo_porcentaje.value = porc_apoyo_fin_sobre_cost_tot;	

					errInfor_finan_costo_monto.style.display = "none";
					errInfor_finan_costo_montoAs.className = 'form-text';
					Infor_finan_costo_monto.className = 'form-control';

				var url_z='receptor_Apoyo_financiero.php?Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2+'&Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot+'&monto_coinversion='+mont_coinversion;
				hacerPeticion(url_z);				
				} else {
					//console.log('es menor');
					errInfor_finan_costo_monto.style.display = "block";
					errInfor_finan_costo_montoAs.className = 'form-text form-text-error';
					Infor_finan_costo_monto.className = 'form-control form-control-error';
					campo_porcentaje.value = '';
					porc_apoyo_fin_sobre_cost_tot='';
					var url_z='receptor_Apoyo_financiero.php?Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot;
				hacerPeticion(url_z);	
					
				}
			break;
			case 'E':
				var m2=2000000;
				
			console.log('ENTRO A CATEGORIA E');
			/* 	E) */
			if(m2<m1) { 			
			
				var porc_apoyo_fin_sobre_cost_tot = 100*parseFloat(m2)/parseFloat(m1);
				campo_porcentaje.value = porc_apoyo_fin_sobre_cost_tot;	

					errInfor_finan_costo_monto.style.display = "none";
					errInfor_finan_costo_montoAs.className = 'form-text';
					Infor_finan_costo_monto.className = 'form-control';

				var url_z='receptor_Apoyo_financiero.php?Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2+'&Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot+'&monto_coinversion='+mont_coinversion;
				hacerPeticion(url_z);				
				} else {
					//console.log('es menor');
					errInfor_finan_costo_monto.style.display = "block";
					errInfor_finan_costo_montoAs.className = 'form-text form-text-error';
					Infor_finan_costo_monto.className = 'form-control form-control-error';
					campo_porcentaje.value = '';
					porc_apoyo_fin_sobre_cost_tot='';
					var url_z='receptor_Apoyo_financiero.php?Infor_finan_apoyo_costo_total_paso='+porc_apoyo_fin_sobre_cost_tot;
				hacerPeticion(url_z);	
					
				}
			break;
		}
	} 

}//fin de la funcion



















