function suma_cantidades(){	
	console.log('entro 2');
	var m1 = document.getElementById("Infor_finan_costo_monto").value;
	var m2 = document.getElementById("Infor_finan_apoyo_monto").value;
	
	var categoria = document.getElementById("info_financiera_categoria").value;
		
	var x = document.getElementById('errCALCULO');
	var y = document.getElementById('errCosto_mayor5');
	var z = document.getElementById('errCosto_mayor10');
	var e = document.getElementById('errCosto_mayor3');

	var costo_total = document.getElementById("Infor_finan_apoyo_costo_total");

	/*document.getElementById("Infor_finan_costo_monto").value=MASK(this,m1,'-$##,###,##0.00',1)
	document.getElementById("Infor_finan_apoyo_monto").value=MASK(this,m2,'-$##,###,##0.00',1)*/
	
	if(!isNaN(m1) && !isNaN(m2) && categoria!=''){
		var subt = (m2/m1)*100;
		cost_tot = parseInt(subt);
		/*console.log(cost_tot);
		console.log(categoria);*/
		if(categoria==5){
			 				
		  if (cost_tot<=60 && m1<=20000000 && m2<=5000000) { 
		  
		  console.log('en 5');
		  
			x.style.display = "none";
			y.style.display = "none";
			z.style.display = "none";
			e.style.display = "none";
			
			costo_total.value = cost_tot;
			
			var variable = 'Infor_finan_apoyo_costo_total';
			
			var valor = cost_tot;
			/*console.log(`m1= ${m1}`)
			 console.log(`m2= ${m2}`)
			 console.log(`valor= ${valor}`)
			 */
			 document.getElementById("Infor_finan_apoyo_costo_total_paso").value = cost_tot;
						 
			var url_z='receptor_Apoyo_financiero.php?variable='+variable+'&valor='+valor+'&Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2;
			hacerPeticion(url_z);
			
		  } else {
			 console.log('entro b');
			x.style.display = "block";
			y.style.display = "block";
			e.style.display = "none";
			z.style.display = "none";
			costo_total.value = '';
			
			var variable = 'Infor_finan_apoyo_costo_total';
			var valor = '';
			
			m1='';
			m2='';
			
			document.getElementById("Infor_finan_apoyo_costo_total_paso").value = '';
					
			var url_z='receptor_Apoyo_financiero.php?variable='+variable+'&valor='+valor+'&Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2;
			hacerPeticion(url_z);
			
		  }
		 } 
		 
		 if(categoria==10){
			 //console.log(cost_tot);
					if (cost_tot<=50 && m1<=120000000 && m2<=10000000) { 
					//console.log('es menor o igual a 10 millones');
					x.style.display = "none";
					y.style.display = "none";
					z.style.display = "none";
					e.style.display = "none";
					costo_total.value = cost_tot;
					
					var variable = 'Infor_finan_apoyo_costo_total';
					var valor = cost_tot;
					
					document.getElementById("Infor_finan_apoyo_costo_total_paso").value = cost_tot;
					
					var url_z='receptor_Apoyo_financiero.php?variable='+variable+'&valor='+cost_tot+'&Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2;
					hacerPeticion(url_z);
					
				  } else { 
					 //console.log('entro c');
					/*  
					 console.log(`m1= ${m1}`)
					 console.log(`m2= ${m2}`)
					*/			  
					x.style.display = "block";
					y.style.display = "none";
					z.style.display = "block";
					e.style.display = "none";
					costo_total.value = '';
					var variable = 'Infor_finan_apoyo_costo_total';
					var valor = '';
					m1='';
					m2='';
					document.getElementById("Infor_finan_apoyo_costo_total_paso").value = '';
							
					var url_z='receptor_Apoyo_financiero.php?variable='+variable+'&valor='+valor+'&Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2;
					hacerPeticion(url_z);
				   }
		 	}
			
			if(categoria==3){
				//console.log('entro a la categoria nueva');
				/*m1 = m1.replace(/[$,\s]/g, '')
				m2 = m2.replace(/[$,\s]/g, '')*/
				if (cost_tot<=90 && m1<=20000000 && m2<=500000) { 
					x.style.display = "none";
					y.style.display = "none";
					z.style.display = "none";
					e.style.display = "none";
					costo_total.value = cost_tot;
					var variable = 'Infor_finan_apoyo_costo_total';
					var valor = cost_tot;
					
					document.getElementById("Infor_finan_apoyo_costo_total_paso").value = cost_tot;
					
					/* m1_p = MASK(this,m1,'-$##,###,##0.00',1)
					 m2_p = MASK(this,m2,'-$##,###,##0.00',1)
					*/ 			 
					 
					var url_z='receptor_Apoyo_financiero.php?variable='+variable+'&valor='+cost_tot+'&Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2;
					hacerPeticion(url_z);				
				} else {		 
				//console.log('hola'); 
					x.style.display = "none";
					y.style.display = "none";
					z.style.display = "none";
					e.style.display = "block";
					costo_total.value = '';
					var variable = 'Infor_finan_apoyo_costo_total';
					var valor = '';
					m1='';
					m2='';
					document.getElementById("Infor_finan_apoyo_costo_total_paso").value = '';
							
					var url_z='receptor_Apoyo_financiero.php?variable='+variable+'&valor='+valor+'&Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_monto='+m2;
					hacerPeticion(url_z);
				   }
				
			}
	}//fin del if
}//fin de la funcion



















