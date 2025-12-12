var set_porcentaje = document.querySelectorAll(".obten_porcentaje");
 for (var j = 0; j < set_porcentaje.length; j++) {
			   set_porcentaje[j].onchange = function () {
				   
				   var formato_cat = MASK(this,this.value,'-$##,###,##0.00',1);
				   
				   console.log(this.name)
				   
				   
				  switch(this.name){
					  case "Monto_unidad_a":
				   		document.getElementById("Monto_unidad_a").value = formato_cat
				  	  break;
					  case "Monto_unidad_b":
				   		document.getElementById("Monto_unidad_b").value = formato_cat
				  	  break;
					  case "Monto_unidad_c":
				   		document.getElementById("Monto_unidad_c").value = formato_cat
				  	  break;
					  default:
				   		document.getElementById("Monto_unidad").value = formato_cat
				  	  break;
				  }
				  
				  console.log(this);
				  
				   
				   obten_porcentaje_tratado(this.name, this.value)
			   }
 }

function obten_porcentaje_tratado(nombre_monto, valor_monto){
	
	var m3_a = document.getElementById("Monto_unidad_a").value;
	var str_m3_a = parseFloat(m3_a.replace(/[$,\s]/g, '')); 
	
	var m3_b = document.getElementById("Monto_unidad_b").value;
	var str_m3_b = parseFloat(m3_b.replace(/[$,\s]/g, '')); 

	var m3_c = document.getElementById("Monto_unidad_c").value;
	var str_m3_c =parseFloat(m3_c.replace(/[$,\s]/g, '')); 
	
	var porcent_a = document.getElementById("Porcentaje_a");
	var porcent_b = document.getElementById("Porcentaje_b");
	var porcent_c = document.getElementById("Porcentaje_c");

	var cuantos = document.getElementById("Nro_desh_boton").value;

	var Fuente_finan_a = document.getElementById("Fuente_finan_a").value;		
	var Fuente_finan_b = document.getElementById("Fuente_finan_b").value;
	var Fuente_finan_c = document.getElementById("Fuente_finan_c").value;
	
	suma_varios = 0
	suma_varios_f = 0
	suma_monto = 0
	
	for(var f=1;f<=cuantos;f++){
		
	var nombre_campo_jat = 'Fuente_finan_P';
	var nombre_campo_f = nombre_campo_jat+f;
	var Fuente_finan_todos_f = document.getElementById(nombre_campo_f).value;	
	
	console.log(obten_porcentaje_tratado);
	
		if(Fuente_finan_todos_f=='Institucional Federal PROFEST'){
			
			var nombre_campo_f = 'Monto_unidad_P';
			var nombre_f = nombre_campo_f.concat(f);
			var Porcentaje_varios_f = document.getElementById(nombre_f).value;
			var str_porcentaje_f = parseFloat(Porcentaje_varios_f.replace(/[$,\s]/g, ''));
			suma_varios_f += str_porcentaje_f;
			
		} else {
			
			var nombre_campo = 'Monto_unidad_P';
			var nombre = nombre_campo.concat(f);
			var Porcentaje_varios = document.getElementById(nombre).value;
			var str_porcentaje = parseFloat(Porcentaje_varios.replace(/[$,\s]/g, ''));
		
			suma_varios += str_porcentaje;
			
		}
		
	}
	
	if(Fuente_finan_a=='Institucional Federal PROFEST'){
		
	 	suma_varios_f = parseFloat(str_m3_a + suma_varios_f);
	 
	} else {
		
		 suma_varios = parseFloat(str_m3_a + suma_varios);
		
	}
		
	if(Fuente_finan_b=='Institucional Federal PROFEST'){
		
	 	suma_varios_f = parseFloat(str_m3_b + suma_varios_f);
	 
	} else {
		
		suma_varios = parseFloat(str_m3_b + suma_varios);
		
	}
		
	if(Fuente_finan_c=='Institucional Federal PROFEST'){
		
	 	suma_varios_f = parseFloat(str_m3_c + suma_varios_f);
	 
	} else {
		
		suma_varios = parseFloat(str_m3_c + suma_varios);
		
	}

	var suma_TOTAL = suma_varios_f + suma_varios;
	
		//var x = document.getElementById('errCALCULO');
		
		//console.log(`suma_varios_f = ${suma_varios_f} suma_varios = ${suma_varios}`) // bien kevin
	
		///////////////////////////////////////////////////////////////// INICIO (1) ////////////////////////////////////////////////////////
				

				//var x = document.getElementById('errCALCULO');

				var bandera = 0;

				var suma_monto = 0;
				var m1_fuente = 0
				
				suma_monto = suma_varios_f;
				
				m1_fuente = parseFloat(document.getElementById("Infor_finan_costo_monto").value);

				if(suma_monto > m1_fuente){
					console.log('mal');
												
					//x.style.display = "block";
					


					for(var i=1;i<=cuantos;i++){
						
						/////////////////////////////(INICIO) Porcentaje varios dejar en blanco///////////////////////////
						var nomber_campo_porcentaje = 'Porcentaje_P';
						var nombre_porcentaje = nomber_campo_porcentaje.concat(i);
						var Porcentaje_varios = document.getElementById(nombre_porcentaje);
						Porcentaje_varios.value = "";
						/////////////////////////////(INICIO) Porcentaje varios dejar en blanco///////////////////////////
					bandera = 1;
					}
							
				} else {
					console.log('bien');
					//x.style.display = "none";
					bandera = 0;
							    
				}	

				suma_monto = suma_varios;	
				m1_fuente = parseFloat(document.getElementById("Infor_finan_apoyo_monto").value);	

				if(suma_monto > m1_fuente){
					
					console.log('mal cuando no son profest');
					
					porcent_a.innerHTML="";
					porcent_b.innerHTML= "";
					porcent_c.value = "";
					
					//x.style.display = "block";
					
					for(var i=1;i<=cuantos;i++){
						
						/////////////////////////////(INICIO) Porcentaje varios dejar en blanco///////////////////////////
						var nomber_campo_porcentaje = 'Porcentaje_P';
						var nombre_porcentaje = nomber_campo_porcentaje.concat(i);
						var Porcentaje_varios = document.getElementById(nombre_porcentaje);
						Porcentaje_varios .value = "";
						/////////////////////////////(INICIO) Porcentaje varios dejar en blanco///////////////////////////
					
					}
							
				} else {
					if(bandera != 1){
						console.log('bien');
						//x.style.display = "none";
						bandera = 0;
					}
				}


				m1_fuente = parseFloat(document.getElementById("Infor_finan_costo_monto").value);

				// INICIO Porcentaje A	
				var subt_a = 100 * str_m3_a / m1_fuente;	
				var m2_a = parseFloat(subt_a);
		
				//console.log(`m2_a = ${m2_a}`)
				
				porcent_a.value = m2_a;
				// FIN Porcentaje A
				
				// INICIO Porcentaje B	
				var subt_b = 100 * str_m3_b / m1_fuente;	
				var m2_b = parseFloat(subt_b);

				//console.log(`m2_b = ${m2_b}`)
				
				porcent_b.value = m2_b;
				// FIN Porcentaje B
				
				// INICIO Porcentaje C	
				var subt_c = 100 * str_m3_c / m1_fuente;	
				var m2_c = parseFloat(subt_c);
				
				//console.log(`m2_c = ${m2_c}`)
				
				porcent_c.value = m2_c;
				// FIN Porcentaje C



				//Inicia Los porcentajes de el conjunto de 
				for(var i=1;i<=cuantos;i++){
						
						/////////////////////////////(INICIO) Montos varios ///////////////////////////
						var nomber_campo = 'Monto_unidad_P';
							
						var nombre = nomber_campo.concat(i);
												
						var monto_unidad_varios = document.getElementById(nombre).value;
						
						var str_monto_unidad_varios = parseFloat(monto_unidad_varios.replace(/[$,\s]/g, '')); 
						/////////////////////////////(INICIO) Montos varios ///////////////////////////
						
				var subt_varios = 100 * str_monto_unidad_varios / m1_fuente;	
				
				var m2_varios = subt_varios;
				
				var nomber_campo_porcentaje = 'Porcentaje_P';
				var nombre_porcentaje = nomber_campo_porcentaje.concat(i);
				var porcent_v = document.getElementById(nombre_porcentaje);

				porcent_v.value = m2_varios;
				
				}


				//Porcentaje de la ventana emergente

				var monto_unidad_var = document.getElementById('Monto_unidad').value;
				var str_monto_unidad_var = parseFloat(monto_unidad_var.replace(/[$,\s]/g, '')); 
				var subt_var = 100 * str_monto_unidad_var / m1_fuente;	
				var m2_var = subt_var;
				var porcent_ve = document.getElementById('Porcentaje');

				porcent_ve.value = m2_var;
			

								
				if(bandera == 1){
					porcent_a.value = "0";
					porcent_b.value = "0";
					porcent_c.value = "0";
				}
		///////////////////////////////////////////////////////////////// FIN (1) ////////////////////////////////////////////////////////
				
	//Verificar los montos totales

	
	var suma_porPROFEST = 0;
	var suma_porOTRO = 0;
	var suma_porTOTAL = 0;
	
	var suma_a = parseFloat(document.getElementById('Porcentaje_a').value);
	var suma_b = parseFloat(document.getElementById('Porcentaje_b').value);
	var suma_c = parseFloat(document.getElementById('Porcentaje_c').value);

	for(var f = 1; f <= cuantos; f++){
		
	var nombre_campo_jat = 'Fuente_finan_P';
	var nombre_campo_f = nombre_campo_jat.concat(f);
	var Fuente_finan_todos_f = document.getElementById(nombre_campo_f).value;	


	var nombre_campo_porc = 'Porcentaje_P';
	var nombre_campo_p = nombre_campo_porc.concat(f);
	var Fuente_finan_todos_p = parseFloat(document.getElementById(nombre_campo_p).value);


	//suma_porTOTAL += suma_a + suma_b + suma_c;

	
		if(Fuente_finan_todos_f=='Institucional Federal PROFEST'){
					

			suma_porPROFEST += Fuente_finan_todos_p;
			
		} else {
			
		
			suma_porOTRO += Fuente_finan_todos_p;
			
		}
		
	}

	suma_porTOTAL = suma_porPROFEST + suma_porOTRO;	

	suma_porTOTAL += suma_a + suma_b + suma_c;

	var tabla_suma  = document.getElementById("tabla_sum_total");

	document.getElementById("suma_invalida").value  = suma_TOTAL;
	document.getElementById("suma_porinvalida").value = suma_porTOTAL;
	
	
	var m1_fuente_apoyo = parseFloat(document.getElementById("Infor_finan_apoyo_monto").value);	
	
	//Verificar si los montos no sobrepasan la cantidad Máxima
	if(suma_TOTAL > m1_fuente){

		document.getElementById('errinfoFinan_Costo_Apoyo').style.display = "block"; 
		document.getElementById("suma_invalida").value  = 0;
		document.getElementById("suma_porinvalida").value = 0;
	
	} else if(suma_monto > m1_fuente_apoyo ){
		
		document.getElementById('errinfoFinan_Costo_Apoyo').style.display = "block"; 
		document.getElementById("suma_invalida").value  = 0;
		document.getElementById("suma_porinvalida").value = 0;
		
	}else{
		
		document.getElementById('errinfoFinan_Costo_Apoyo').style.display = "none"; 
		
		var suma_invalida = document.getElementById("suma_invalida").value;
		
		var suma_porinvalida = document.getElementById("suma_porinvalida").value;
		
		
		var porcent_a = porcent_a.value;
		var porcent_b = porcent_b.value;
		var porcent_c = porcent_c.value;		
					
		
		var separar = nombre_monto.split("_P");
		/*
		if(separar[0] == ""){
			console.log("Kevin");
			separar[0] = 'Monto_unidad';		
		}*/
		
		console.log(separar[0]);
		
		if(separar[0]=='Monto_unidad_a' || separar[0]=='Monto_unidad_b' || separar[0]=='Monto_unidad_c' || separar[0] == ""){
			var id_registro = ''
		} else {	
			var nombre_oculta = 'id_presupuesto'+separar[1]
			var id_registro = document.getElementById(nombre_oculta).value;
			
			var nombre_oculta_porcentaje = 'Porcentaje_P'+separar[1]
			var porcentaje_varios_guardar = document.getElementById(nombre_oculta_porcentaje).value;
			
			
			 var solo_monto_unidad = 'Monto_unidad_P'+separar[1]
			 
			 
			 
			 var valor_monto = MASK(solo_monto_unidad,valor_monto,'-$##,###,##0.00',1);
			 
			 console.log(valor_monto);
			 
			 document.getElementById(solo_monto_unidad).value = valor_monto
			
			
			}
							
				var url_z='receptor5_Proyecto.php?variable='+nombre_monto
				+'&valor='+valor_monto+'&suma_invalida='+suma_invalida+'&suma_porinvalida='+suma_porinvalida+'&porcent_a='+porcent_a+'&porcent_b='+porcent_b+'&porcent_c='+porcent_c
				+'&id_registro='+id_registro+'&porcentaje_varios_guardar='+porcentaje_varios_guardar;
							
					hacerPeticion(url_z);

	}

	//console.log(`Suma TOTAL = ${suma_TOTAL}  \n Porcentaje TOTAL = ${suma_porTOTAL}`)


	


	//filaCelda[1].childNodes[0].value = suma_TOTAL;
	//filaCelda[2].childNodes[0].value = suma_porTOTAL;

	//FIN del calculo


	}//fin de la funcion
