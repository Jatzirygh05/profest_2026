		////// INICIO 1
		function obtenmonto(id){
						var unidadv=eval('document.formul.unidad'+id+'.value');
						var diasv=eval('document.formul.dias_a_utilizar'+id+'.value');
						var costov=eval('document.formul.costo_unitario_imp_incluidos'+id+'.value');
								
						if(unidadv.length==0 || diasv.length==0 || costov.lenght==0){
							var monto_v = eval('document.formul.monto_tot_imp_incluidos'+id);
							monto_v.value = '';					
						} else { 
							var monto_total_op = unidadv * diasv * costov;
							var monto_total_renglon = eval('document.formul.monto_tot_imp_incluidos'+id);
							monto_total_renglon.value = monto_total_op.toFixed(2);
						}
		}
		
		function suma_vertical(id, clave1, clave2, clave3, clave4, clave5, clave6, clave7, clave9){
			var sumaT=0;
			var cuantos = 30
			for(var i=1;i<=cuantos;i++){
			
				var campov=eval('document.formul.monto_tot_imp_incluidos'+i+'.value');
				
					if(campov.length==0){ 
						var calcula_total = 0 
					} else { 
						var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
						sumaT=sumaT+calcula_total;
					}
			}
				var obtsuma= document.formul.total_esp_mue_inmue_n;
				obtsuma.value=sumaT;

							///(INICIO) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO

							var total_esp_mue_inmuea_col;
							var uno;
							var total_esp_mue_inmueb_col;
							var dos;
							var total_esp_mue_inmuec_col;
							var tres;
							var total_esp_mue_inmued_col;
							var cuatro;
							var total_esp_mue_inmuee_col;
							var cinco;
							var total_esp_mue_inmueg_col;
							var seis;
							var total_esp_mue_inmuez_col;
							var siete;
							var total_esp_mue_inmue_n_col;
							var ocho;
							
							if(clave2!=''){
								total_esp_mue_inmuea_col = document.getElementById('total_esp_mue_inmuea').value;
								uno = parseFloat(total_esp_mue_inmuea_col.replace(/[$,\s]/g, '')); 
								if(uno>0){
									uno = uno
								} else {
									uno = 0									
								}
							} else { uno = 0; } 
							
							if(clave3!=''){
								total_esp_mue_inmueb_col = document.getElementById('total_esp_mue_inmueb').value;
								dos = parseFloat(total_esp_mue_inmueb_col.replace(/[$,\s]/g, '')); 
								if(dos>0){
									dos = dos
								} else {
									dos = 0									
								}
							} else { dos = 0; }

							if(clave4!=''){
								total_esp_mue_inmuec_col = document.getElementById('total_esp_mue_inmuec').value;
								tres = parseFloat(total_esp_mue_inmuec_col.replace(/[$,\s]/g, '')); 
								if(tres>0){
									tres = tres
								} else {
									tres = 0									
								}
							} else { tres = 0; }

							if(clave5!=''){
								total_esp_mue_inmued_col = document.getElementById('total_esp_mue_inmued').value;
								cuatro = parseFloat(total_esp_mue_inmued_col.replace(/[$,\s]/g, '')); 
								if(cuatro>0){
									cuatro = cuatro
								} else {
									cuatro = 0									
								}
							} else { cuatro = 0; }

							if(clave6!=''){
								total_esp_mue_inmuee_col = document.getElementById('total_esp_mue_inmuee').value;
								cinco = parseFloat(total_esp_mue_inmuee_col.replace(/[$,\s]/g, '')); 
								if(cinco>0){
									cinco = cinco
								} else {
									cinco = 0									
								}
							} else { cinco = 0; }

							if(clave7!=''){
								total_esp_mue_inmueg_col = document.getElementById('total_esp_mue_inmueg').value;
								
								seis = parseFloat(total_esp_mue_inmueg_col.replace(/[$,\s]/g, '')); 
								if(seis>0){
									seis = seis
								} else {
									seis = 0									
								}
							} else { 
								seis = 0; }

							if(clave9!=''){ 
								total_esp_mue_inmuez_col = document.getElementById('total_esp_mue_inmue_z').value;
								siete = parseFloat(total_esp_mue_inmuez_col.replace(/[$,\s]/g, '')); 
								if(siete>0){
									siete = siete
								} else {
									siete = 0									
								}
							} else { siete = 0; }

							if(clave1!=''){ 
								total_esp_mue_inmue_n_col = document.getElementById('total_esp_mue_inmue_n').value;
								ocho = parseFloat(total_esp_mue_inmue_n_col.replace(/[$,\s]/g, '')); 
								if(ocho>0){
									ocho = ocho
								} else {
									ocho = 0									
								}
							} else { ocho = 0; }

							var suma_pestanas_tot = uno + dos + tres + cuatro + cinco + seis + siete + ocho;
								
							var suma_honorar;
							var suma_honorario=document.getElementById('suma_honorario').value;

							if(suma_honorario!=''){	suma_honorar = parseFloat(suma_honorario.replace(/[$,\s]/g, '')); } else { suma_honorar = 0; }
													
							var suma_total_pest_hono = suma_pestanas_tot + suma_honorar;
							var obt_suma_pest_hono= document.formul.total_conceptos;
								obt_suma_pest_hono.value=suma_total_pest_hono; 

							console.log(seis)

						///(FIN) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO
		}
		////// FIN 1
		////// INICIO 2
		function obtenmontoa(id){
						var unidadava=eval('document.formul.unidada'+id+'.value');
						var diasva=eval('document.formul.dias_a_utilizara'+id+'.value');
						var costova=eval('document.formul.costo_unitario_imp_incluidosa'+id+'.value');
						
						if(unidadava.length==0 || diasva.length==0 || costova.lenght==0){
							var monto_v = eval('document.formul.monto_tot_imp_incluidosa'+id);
							monto_v.value = '';					
						} else { 
							var monto_total_op = unidadava * diasva * costova;
							var monto_total_renglon = eval('document.formul.monto_tot_imp_incluidosa'+id);
							monto_total_renglon.value = monto_total_op.toFixed(2);
						}
		}
		
		function suma_verticala(id, clave1, clave2, clave3, clave4, clave5, clave6, clave7, clave9){
			var sumaTa=0;
			var cuantos = 30			
			for(var i=1;i<=cuantos;i++){
				var campov=eval ('document.formul.monto_tot_imp_incluidosa'+i+'.value');
					if(campov.length==0){ 
						var calcula_total = 0 
					} else { 
						var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
						sumaTa=sumaTa+calcula_total;
					} 
			}
					  var obtsumaa= document.formul.total_esp_mue_inmuea;
						obtsumaa.value=sumaTa; 


						///(INICIO) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO

							var total_esp_mue_inmuea_col;
							var uno;
							var total_esp_mue_inmueb_col;
							var dos;
							var total_esp_mue_inmuec_col;
							var tres;
							var total_esp_mue_inmued_col;
							var cuatro;
							var total_esp_mue_inmuee_col;
							var cinco;
							var total_esp_mue_inmueg_col;
							var seis;
							var total_esp_mue_inmuez_col;
							var siete;
							var total_esp_mue_inmue_n_col;
							var ocho;

							if(clave2!=''){
								total_esp_mue_inmuea_col = document.getElementById('total_esp_mue_inmuea').value;
								uno = parseFloat(total_esp_mue_inmuea_col.replace(/[$,\s]/g, '')); 
								if(uno>0){
									uno = uno
								} else {
									uno = 0									
								}
							} else { uno = 0; } 
							
							if(clave3!=''){
								total_esp_mue_inmueb_col = document.getElementById('total_esp_mue_inmueb').value;
								dos = parseFloat(total_esp_mue_inmueb_col.replace(/[$,\s]/g, '')); 
								if(dos>0){
									dos = dos
								} else {
									dos = 0									
								}
							} else { dos = 0; }

							if(clave4!=''){
								total_esp_mue_inmuec_col = document.getElementById('total_esp_mue_inmuec').value;
								tres = parseFloat(total_esp_mue_inmuec_col.replace(/[$,\s]/g, '')); 
								if(tres>0){
									tres = tres
								} else {
									tres = 0									
								}
							} else { tres = 0; }

							if(clave5!=''){
								total_esp_mue_inmued_col = document.getElementById('total_esp_mue_inmued').value;
								cuatro = parseFloat(total_esp_mue_inmued_col.replace(/[$,\s]/g, '')); 
								if(cuatro>0){
									cuatro = cuatro
								} else {
									cuatro = 0									
								}
							} else { cuatro = 0; }

							if(clave6!=''){
								total_esp_mue_inmuee_col = document.getElementById('total_esp_mue_inmuee').value;
								cinco = parseFloat(total_esp_mue_inmuee_col.replace(/[$,\s]/g, '')); 
								if(cinco>0){
									cinco = cinco
								} else {
									cinco = 0									
								}
							} else { cinco = 0; }

							if(clave7!=''){
								total_esp_mue_inmueg_col = document.getElementById('total_esp_mue_inmueg').value;
								seis = parseFloat(total_esp_mue_inmueg_col.replace(/[$,\s]/g, '')); 
								if(seis>0){
									seis = seis
								} else {
									seis = 0									
								}
							} else { seis = 0; }

							if(clave9!=''){ 
								total_esp_mue_inmuez_col = document.getElementById('total_esp_mue_inmue_z').value;
								siete = parseFloat(total_esp_mue_inmuez_col.replace(/[$,\s]/g, '')); 
								if(siete>0){
									siete = siete
								} else {
									siete = 0									
								}
							} else { siete = 0; }

							if(clave1!=''){ 
								total_esp_mue_inmue_n_col = document.getElementById('total_esp_mue_inmue_n').value;
								ocho = parseFloat(total_esp_mue_inmue_n_col.replace(/[$,\s]/g, '')); 
								if(ocho>0){
									ocho = ocho
								} else {
									ocho = 0									
								}
							} else { ocho = 0; }

							var suma_pestanas_tot = uno + dos + tres + cuatro + cinco + seis + siete + ocho;
							console.log(dos)

							var suma_honorar;
							var suma_honorario=document.getElementById('suma_honorario').value;

							if(suma_honorario!=''){	suma_honorar = parseFloat(suma_honorario.replace(/[$,\s]/g, '')); } else { suma_honorar = 0; }
							

							
console.log(suma_honorar)

							var suma_total_pest_hono = suma_pestanas_tot + suma_honorar;
							var obt_suma_pest_hono= document.formul.total_conceptos;
								obt_suma_pest_hono.value=suma_total_pest_hono; 

								console.log(suma_total_pest_hono)

						///(FIN) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO


		}
		///// FIN 2
		///// INICIO 3
		function obtenmontob(id){
						var unidadbvb=eval('document.formul.unidadb'+id+'.value');
						var costovb=eval('document.formul.costo_unitario_imp_incluidosb'+id+'.value');
						if(unidadbvb.length==0 || costovb.lenght==0){
							var monto_v = eval('document.formul.monto_tot_imp_incluidos'+id);
							monto_v.value = '';					
						} else { 
							var monto_total_op = unidadbvb * costovb;
							var monto_total_renglon = eval('document.formul.monto_tot_imp_incluidosb'+id);
							monto_total_renglon.value = monto_total_op.toFixed(2);
						}
		}
		
		function suma_verticalb(id, clave1, clave2, clave3, clave4, clave5, clave6, clave7, clave9){
			var sumaTb=0;
			var cuantos = 30
			
			for(var i=1;i<=cuantos;i++){
				
				var campov=eval ('document.formul.monto_tot_imp_incluidosb'+i+'.value');
					if(campov.length==0){ 
						var calcula_total = 0 
					} else { 
						var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
						sumaTb=sumaTb+calcula_total;
					} 
			}
					  var obtsumab= document.formul.total_esp_mue_inmueb;
						obtsumab.value=sumaTb; 
		
			///(INICIO) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO

							var total_esp_mue_inmuea_col;
							var uno;
							var total_esp_mue_inmueb_col;
							var dos;
							var total_esp_mue_inmuec_col;
							var tres;
							var total_esp_mue_inmued_col;
							var cuatro;
							var total_esp_mue_inmuee_col;
							var cinco;
							var total_esp_mue_inmueg_col;
							var seis;
							var total_esp_mue_inmuez_col;
							var siete;
							var total_esp_mue_inmue_n_col;
							var ocho;
							
							if(clave2!=''){
								total_esp_mue_inmuea_col = document.getElementById('total_esp_mue_inmuea').value;
								uno = parseFloat(total_esp_mue_inmuea_col.replace(/[$,\s]/g, '')); 
								if(uno>0){
									uno = uno
								} else {
									uno = 0									
								}
							} else { uno = 0; } 
							
							if(clave3!=''){
								total_esp_mue_inmueb_col = document.getElementById('total_esp_mue_inmueb').value;
								dos = parseFloat(total_esp_mue_inmueb_col.replace(/[$,\s]/g, '')); 
								if(dos>0){
									dos = dos
								} else {
									dos = 0									
								}
							} else { dos = 0; }

							if(clave4!=''){
								total_esp_mue_inmuec_col = document.getElementById('total_esp_mue_inmuec').value;
								tres = parseFloat(total_esp_mue_inmuec_col.replace(/[$,\s]/g, ''));
								if(tres>0){
									tres = tres
								} else {
									tres = 0									
								} 
							} else { tres = 0; }

							if(clave5!=''){
								total_esp_mue_inmued_col = document.getElementById('total_esp_mue_inmued').value;
								cuatro = parseFloat(total_esp_mue_inmued_col.replace(/[$,\s]/g, '')); 
								if(cuatro>0){
									cuatro = cuatro
								} else {
									cuatro = 0									
								} 
							} else { cuatro = 0; }

							if(clave6!=''){
								total_esp_mue_inmuee_col = document.getElementById('total_esp_mue_inmuee').value;
								cinco = parseFloat(total_esp_mue_inmuee_col.replace(/[$,\s]/g, '')); 
								if(cinco>0){
									cinco = cinco
								} else {
									cinco = 0									
								} 
							} else { cinco = 0; }

							if(clave7!=''){
								total_esp_mue_inmueg_col = document.getElementById('total_esp_mue_inmueg').value;
								seis = parseFloat(total_esp_mue_inmueg_col.replace(/[$,\s]/g, '')); 
								if(seis>0){
									seis = seis
								} else {
									seis = 0									
								} 
							} else { seis = 0; }

							if(clave9!=''){ 
								total_esp_mue_inmuez_col = document.getElementById('total_esp_mue_inmue_z').value;
								siete = parseFloat(total_esp_mue_inmuez_col.replace(/[$,\s]/g, '')); 
								if(siete>0){
									siete = siete
								} else {
									siete = 0									
								} 
							} else { siete = 0; }

							if(clave1!=''){ 
								total_esp_mue_inmue_n_col = document.getElementById('total_esp_mue_inmue_n').value;
								ocho = parseFloat(total_esp_mue_inmue_n_col.replace(/[$,\s]/g, ''));
								if(ocho>0){
									ocho = ocho
								} else {
									ocho = 0									
								}  
							} else { ocho = 0; }

							var suma_pestanas_tot = uno + dos + tres + cuatro + cinco + seis + siete + ocho;

							var suma_honorar;
							var suma_honorario=document.getElementById('suma_honorario').value;

							if(suma_honorario!=''){	suma_honorar = parseFloat(suma_honorario.replace(/[$,\s]/g, '')); } else { suma_honorar = 0; }

							var suma_total_pest_hono = suma_pestanas_tot + suma_honorar;
							var obt_suma_pest_hono= document.formul.total_conceptos;
								obt_suma_pest_hono.value=suma_total_pest_hono; 

						///(FIN) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO
		}
		///// FIN 3
		///// INICIO 4
		function obtenmontoc(id){
						var unidadcvc=eval('document.formul.unidadc'+id+'.value');
						var costovc=eval('document.formul.costo_unitario_imp_incluidosc'+id+'.value');
						if(unidadcvc.length==0 || costovc.lenght==0){
							var monto_v = eval('document.formul.monto_tot_imp_incluidos'+id);
							monto_v.value = '';					
						} else { 
							var monto_total_op = unidadcvc * costovc;
							var monto_total_renglon = eval('document.formul.monto_tot_imp_incluidosc'+id);
							monto_total_renglon.value = monto_total_op.toFixed(2);
						}
		}
		
		function suma_verticalc(id, clave1, clave2, clave3, clave4, clave5, clave6, clave7, clave9){
			var sumaTc=0;
			var cuantos = 30
			
			for(var i=1;i<=cuantos;i++){
				
				var campov=eval ('document.formul.monto_tot_imp_incluidosc'+i+'.value');
					if(campov.length==0){ 
						var calcula_total = 0 
					} else { 
						var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
						sumaTc=sumaTc+calcula_total;
					} 
			}
					  var obtsumac= document.formul.total_esp_mue_inmuec;
						obtsumac.value=sumaTc; 

									///(INICIO) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO

							var total_esp_mue_inmuea_col;
							var uno;
							var total_esp_mue_inmueb_col;
							var dos;
							var total_esp_mue_inmuec_col;
							var tres;
							var total_esp_mue_inmued_col;
							var cuatro;
							var total_esp_mue_inmuee_col;
							var cinco;
							var total_esp_mue_inmueg_col;
							var seis;
							var total_esp_mue_inmuez_col;
							var siete;
							var total_esp_mue_inmue_n_col;
							var ocho;
							
							if(clave2!=''){
								total_esp_mue_inmuea_col = document.getElementById('total_esp_mue_inmuea').value;
								uno = parseFloat(total_esp_mue_inmuea_col.replace(/[$,\s]/g, '')); 
								if(uno>0){
									uno = uno
								} else {
									uno = 0									
								} 
							} else { uno = 0; } 
							
							if(clave3!=''){
								total_esp_mue_inmueb_col = document.getElementById('total_esp_mue_inmueb').value;
								dos = parseFloat(total_esp_mue_inmueb_col.replace(/[$,\s]/g, '')); 
								if(dos>0){
									dos = dos
								} else {
									dos = 0									
								} 
							} else { dos = 0; }

							if(clave4!=''){
								total_esp_mue_inmuec_col = document.getElementById('total_esp_mue_inmuec').value;
								tres = parseFloat(total_esp_mue_inmuec_col.replace(/[$,\s]/g, '')); 
								if(tres>0){
									tres = tres
								} else {
									tres = 0									
								} 
							} else { tres = 0; }

							if(clave5!=''){
								total_esp_mue_inmued_col = document.getElementById('total_esp_mue_inmued').value;
								cuatro = parseFloat(total_esp_mue_inmued_col.replace(/[$,\s]/g, '')); 
								if(cuatro>0){
									cuatro = cuatro
								} else {
									cuatro = 0									
								} 
							} else { cuatro = 0; }

							if(clave6!=''){
								total_esp_mue_inmuee_col = document.getElementById('total_esp_mue_inmuee').value;
								cinco = parseFloat(total_esp_mue_inmuee_col.replace(/[$,\s]/g, '')); 
								if(cinco>0){
									cinco = cinco
								} else {
									cinco = 0									
								} 
							} else { cinco = 0; }

							if(clave7!=''){
								total_esp_mue_inmueg_col = document.getElementById('total_esp_mue_inmueg').value;
								seis = parseFloat(total_esp_mue_inmueg_col.replace(/[$,\s]/g, '')); 
								if(seis>0){
									seis = seis
								} else {
									seis = 0									
								}
							} else { seis = 0; }

							if(clave9!=''){ 
								total_esp_mue_inmuez_col = document.getElementById('total_esp_mue_inmue_z').value;
								siete = parseFloat(total_esp_mue_inmuez_col.replace(/[$,\s]/g, ''));
								if(siete>0){
									siete = siete
								} else {
									siete = 0									
								} 
							} else { siete = 0; }

							if(clave1!=''){ 
								total_esp_mue_inmue_n_col = document.getElementById('total_esp_mue_inmue_n').value;
								ocho = parseFloat(total_esp_mue_inmue_n_col.replace(/[$,\s]/g, '')); 
								if(ocho>0){
									ocho = ocho
								} else {
									ocho = 0									
								} 
							} else { ocho = 0; }

							var suma_pestanas_tot = uno + dos + tres + cuatro + cinco + seis + siete + ocho;
								
							var suma_honorar;
							var suma_honorario=document.getElementById('suma_honorario').value;

							if(suma_honorario!=''){	suma_honorar = parseFloat(suma_honorario.replace(/[$,\s]/g, '')); } else { suma_honorar = 0; }
													
							var suma_total_pest_hono = suma_pestanas_tot + suma_honorar;
							var obt_suma_pest_hono= document.formul.total_conceptos;
								obt_suma_pest_hono.value=suma_total_pest_hono; 

						///(FIN) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO
		}
		///// FIN 4
		///// INICIO 5
		function suma_verticald(id, clave1, clave2, clave3, clave4, clave5, clave6, clave7, clave9){
			var sumaTd=0;
			var cuantos = 30
			
			for(var i=1;i<=cuantos;i++){
				
				var campov=eval ('document.formul.monto_tot_imp_incluidosd'+i+'.value');
					if(campov.length==0){ 
						var calcula_total = 0 
					} else { 
						var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
						sumaTd=sumaTd+calcula_total;
					} 
			}
					  var obtsumad= document.formul.total_esp_mue_inmued;
						obtsumad.value=sumaTd; 

								///(INICIO) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO

							var total_esp_mue_inmuea_col;
							var uno;
							var total_esp_mue_inmueb_col;
							var dos;
							var total_esp_mue_inmuec_col;
							var tres;
							var total_esp_mue_inmued_col;
							var cuatro;
							var total_esp_mue_inmuee_col;
							var cinco;
							var total_esp_mue_inmueg_col;
							var seis;
							var total_esp_mue_inmuez_col;
							var siete;
							var total_esp_mue_inmue_n_col;
							var ocho;
							
							if(clave2!=''){
								total_esp_mue_inmuea_col = document.getElementById('total_esp_mue_inmuea').value;
								uno = parseFloat(total_esp_mue_inmuea_col.replace(/[$,\s]/g, ''));
								if(uno>0){
									uno = uno
								} else {
									uno = 0									
								}  
							} else { uno = 0; } 
							
							if(clave3!=''){
								total_esp_mue_inmueb_col = document.getElementById('total_esp_mue_inmueb').value;
								dos = parseFloat(total_esp_mue_inmueb_col.replace(/[$,\s]/g, '')); 
								if(dos>0){
									dos = dos
								} else {
									dos = 0									
								}  
							} else { dos = 0; }

							if(clave4!=''){
								total_esp_mue_inmuec_col = document.getElementById('total_esp_mue_inmuec').value;
								tres = parseFloat(total_esp_mue_inmuec_col.replace(/[$,\s]/g, ''));
								if(tres>0){
									tres = tres
								} else {
									tres = 0									
								} 
							} else { tres = 0; }

							if(clave5!=''){
								total_esp_mue_inmued_col = document.getElementById('total_esp_mue_inmued').value;
								cuatro = parseFloat(total_esp_mue_inmued_col.replace(/[$,\s]/g, '')); 
								if(cuatro>0){
									cuatro = cuatro
								} else {
									cuatro = 0									
								} 
							} else { cuatro = 0; }

							if(clave6!=''){
								total_esp_mue_inmuee_col = document.getElementById('total_esp_mue_inmuee').value;
								cinco = parseFloat(total_esp_mue_inmuee_col.replace(/[$,\s]/g, '')); 
								if(cinco>0){
									cinco = cinco
								} else {
									cinco = 0									
								} 
							} else { cinco = 0; }

							if(clave7!=''){
								total_esp_mue_inmueg_col = document.getElementById('total_esp_mue_inmueg').value;
								seis = parseFloat(total_esp_mue_inmueg_col.replace(/[$,\s]/g, '')); 
								if(seis>0){
									seis = seis
								} else {
									seis = 0									
								}
							} else { seis = 0; }

							if(clave9!=''){ 
								total_esp_mue_inmuez_col = document.getElementById('total_esp_mue_inmue_z').value;
								siete = parseFloat(total_esp_mue_inmuez_col.replace(/[$,\s]/g, '')); 
								if(siete>0){
									siete = siete
								} else {
									siete = 0									
								}
							} else { siete = 0; }

							if(clave1!=''){ 
								total_esp_mue_inmue_n_col = document.getElementById('total_esp_mue_inmue_n').value;
								ocho = parseFloat(total_esp_mue_inmue_n_col.replace(/[$,\s]/g, '')); 
								if(ocho>0){
									ocho = ocho
								} else {
									ocho = 0									
								}
							} else { ocho = 0; }

							var suma_pestanas_tot = uno + dos + tres + cuatro + cinco + seis + siete + ocho;
								
								console.log(suma_pestanas_tot)


							var suma_honorar;
							var suma_honorario=document.getElementById('suma_honorario').value;

							if(suma_honorario!=''){	suma_honorar = parseFloat(suma_honorario.replace(/[$,\s]/g, '')); } else { suma_honorar = 0; }
													
							var suma_total_pest_hono = suma_pestanas_tot + suma_honorar;
							var obt_suma_pest_hono= document.formul.total_conceptos;
								obt_suma_pest_hono.value=suma_total_pest_hono; 

						///(FIN) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO
		}
		
		/*function suma_vertical_tot_general(){
			var tot1=eval('document.formul.total_esp_mue_inmued.value');
			var tot2=eval('document.formul.total_esp_mue_inmuee.value');
		
				if(tot1.length=='' || tot2.lenght==''){
					var monto_v = eval('document.formul.total_esp_mue_inmued');
					monto_v.value = '';
					var monto_d = eval('document.formul.total_esp_mue_inmuee');
					monto_d.value = '';
				} else {
					
					var t1 = parseFloat(tot1.replace(/[$,\s]/g, ''));
					var t2 = parseFloat(tot2.replace(/[$,\s]/g, ''));
					
					var monto_total_op = t1 + t2;
					
					var monto_total_renglon = eval('document.formul.total_general_5_6');
					
					monto_total_renglon.value = monto_total_op;
				}
		}*/
		///// FIN 5
		///// INICIO 6
		function obtenmontoe(id){
			var unidadbvb=eval('document.formul.unidade'+id+'.value');
			var costovb=eval('document.formul.costo_unitario_imp_incluidose'+id+'.value');
						
						if(unidadbvb.length==0 || costovb.lenght==0){
							var monto_v = eval('document.formul.monto_tot_imp_incluidos_dos'+id);
							monto_v.value = '';					
						} else { 
							var monto_total_op = unidadbvb * costovb;
							var monto_total_renglon = eval('document.formul.monto_tot_imp_incluidos_dos'+id);
							monto_total_renglon.value = monto_total_op.toFixed(2);
						}
		}
		function suma_verticale(id, clave1, clave2, clave3, clave4, clave5, clave6, clave7, clave9){
			var sumaTd=0;
			var cuantos = 30
			
			for(var i=1;i<=cuantos;i++){
				
				var campov=eval ('document.formul.monto_tot_imp_incluidos_dos'+i+'.value');
					if(campov.length==0){ 
						var calcula_total = 0 
					} else { 
						var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
						sumaTd=sumaTd+calcula_total;
					} 
			}
					  var obtsumad= document.formul.total_esp_mue_inmuee;
						obtsumad.value=sumaTd; 

									///(INICIO) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO

							var total_esp_mue_inmuea_col;
							var uno;
							var total_esp_mue_inmueb_col;
							var dos;
							var total_esp_mue_inmuec_col;
							var tres;
							var total_esp_mue_inmued_col;
							var cuatro;
							var total_esp_mue_inmuee_col;
							var cinco;
							var total_esp_mue_inmueg_col;
							var seis;
							var total_esp_mue_inmuez_col;
							var siete;
							var total_esp_mue_inmue_n_col;
							var ocho;
							
							if(clave2!=''){
								total_esp_mue_inmuea_col = document.getElementById('total_esp_mue_inmuea').value;
								uno = parseFloat(total_esp_mue_inmuea_col.replace(/[$,\s]/g, ''));
								if(uno>0){
									uno = uno
								} else {
									uno = 0									
								}  
							} else { uno = 0; } 
							
							if(clave3!=''){
								total_esp_mue_inmueb_col = document.getElementById('total_esp_mue_inmueb').value;
								dos = parseFloat(total_esp_mue_inmueb_col.replace(/[$,\s]/g, '')); 
								if(dos>0){
									dos = dos
								} else {
									dos = 0									
								}  
							} else { dos = 0; }

							if(clave4!=''){
								total_esp_mue_inmuec_col = document.getElementById('total_esp_mue_inmuec').value;
								tres = parseFloat(total_esp_mue_inmuec_col.replace(/[$,\s]/g, ''));
								if(tres>0){
									tres = tres
								} else {
									tres = 0									
								} 
							} else { tres = 0; }

							if(clave5!=''){
								total_esp_mue_inmued_col = document.getElementById('total_esp_mue_inmued').value;
								cuatro = parseFloat(total_esp_mue_inmued_col.replace(/[$,\s]/g, '')); 
								if(cuatro>0){
									cuatro = cuatro
								} else {
									cuatro = 0									
								} 
							} else { cuatro = 0; }

							if(clave6!=''){
								total_esp_mue_inmuee_col = document.getElementById('total_esp_mue_inmuee').value;
								cinco = parseFloat(total_esp_mue_inmuee_col.replace(/[$,\s]/g, '')); 
								if(cinco>0){
									cinco = cinco
								} else {
									cinco = 0									
								} 
							} else { cinco = 0; }

							if(clave7!=''){
								total_esp_mue_inmueg_col = document.getElementById('total_esp_mue_inmueg').value;
								seis = parseFloat(total_esp_mue_inmueg_col.replace(/[$,\s]/g, '')); 
								if(seis>0){
									seis = seis
								} else {
									seis = 0									
								}
							} else { seis = 0; }

							if(clave9!=''){ 
								total_esp_mue_inmuez_col = document.getElementById('total_esp_mue_inmue_z').value;
								siete = parseFloat(total_esp_mue_inmuez_col.replace(/[$,\s]/g, '')); 
								if(siete>0){
									siete = siete
								} else {
									siete = 0									
								}
							} else { siete = 0; }

							if(clave1!=''){ 
								total_esp_mue_inmue_n_col = document.getElementById('total_esp_mue_inmue_n').value;
								ocho = parseFloat(total_esp_mue_inmue_n_col.replace(/[$,\s]/g, '')); 
								if(ocho>0){
									ocho = ocho
								} else {
									ocho = 0									
								}
							} else { ocho = 0; }

							var suma_pestanas_tot = uno + dos + tres + cuatro + cinco + seis + siete + ocho;
								
							var suma_honorar;
							var suma_honorario=document.getElementById('suma_honorario').value;

							if(suma_honorario!=''){	suma_honorar = parseFloat(suma_honorario.replace(/[$,\s]/g, '')); } else { suma_honorar = 0; }
													
							var suma_total_pest_hono = suma_pestanas_tot + suma_honorar;
							var obt_suma_pest_hono= document.formul.total_conceptos;
								obt_suma_pest_hono.value=suma_total_pest_hono; 

						///(FIN) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO
		}
		///// FIN 6
		///// INICIO 7
		function obtenmontog(id){
			var unidadbvb=eval('document.formul.unidadg'+id+'.value');
			var costovb=eval('document.formul.costo_unitario_imp_incluidosg'+id+'.value');
						
						if(unidadbvb.length==0 || costovb.lenght==0){
							var monto_v = eval('document.formul.monto_tot_imp_incluidosg'+id);
							monto_v.value = '';					
						} else { 
							var monto_total_op = unidadbvb * costovb;
							var monto_total_renglon = eval('document.formul.monto_tot_imp_incluidosg'+id);
							monto_total_renglon.value = monto_total_op.toFixed(2);
						}
		}
		function suma_verticalg(id, clave1, clave2, clave3, clave4, clave5, clave6, clave7, clave9){
			var sumaTd=0;
			var cuantos = 30
			
			for(var i=1;i<=cuantos;i++){
				
				var campov=eval ('document.formul.monto_tot_imp_incluidosg'+i+'.value');
					if(campov.length==0){ 
						var calcula_total = 0 
					} else { 
						var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
						sumaTd=sumaTd+calcula_total;
					} 
			}
					  var obtsumad= document.formul.total_esp_mue_inmueg;
						obtsumad.value=sumaTd; 

									///(INICIO) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO

							var total_esp_mue_inmuea_col;
							var uno;
							var total_esp_mue_inmueb_col;
							var dos;
							var total_esp_mue_inmuec_col;
							var tres;
							var total_esp_mue_inmued_col;
							var cuatro;
							var total_esp_mue_inmuee_col;
							var cinco;
							var total_esp_mue_inmueg_col;
							var seis;
							var total_esp_mue_inmuez_col;
							var siete;
							var total_esp_mue_inmue_n_col;
							var ocho;
							
							if(clave2!=''){
								total_esp_mue_inmuea_col = document.getElementById('total_esp_mue_inmuea').value;
								uno = parseFloat(total_esp_mue_inmuea_col.replace(/[$,\s]/g, ''));
								if(uno>0){
									uno = uno
								} else {
									uno = 0									
								}  
							} else { uno = 0; } 
							
							if(clave3!=''){
								total_esp_mue_inmueb_col = document.getElementById('total_esp_mue_inmueb').value;
								dos = parseFloat(total_esp_mue_inmueb_col.replace(/[$,\s]/g, '')); 
								if(dos>0){
									dos = dos
								} else {
									dos = 0									
								}  
							} else { dos = 0; }

							if(clave4!=''){
								total_esp_mue_inmuec_col = document.getElementById('total_esp_mue_inmuec').value;
								tres = parseFloat(total_esp_mue_inmuec_col.replace(/[$,\s]/g, ''));
								if(tres>0){
									tres = tres
								} else {
									tres = 0									
								} 
							} else { tres = 0; }

							if(clave5!=''){
								total_esp_mue_inmued_col = document.getElementById('total_esp_mue_inmued').value;
								cuatro = parseFloat(total_esp_mue_inmued_col.replace(/[$,\s]/g, '')); 
								if(cuatro>0){
									cuatro = cuatro
								} else {
									cuatro = 0									
								} 
							} else { cuatro = 0; }

							if(clave6!=''){
								total_esp_mue_inmuee_col = document.getElementById('total_esp_mue_inmuee').value;
								cinco = parseFloat(total_esp_mue_inmuee_col.replace(/[$,\s]/g, '')); 
								if(cinco>0){
									cinco = cinco
								} else {
									cinco = 0									
								} 
							} else { cinco = 0; }

							if(clave7!=''){
								total_esp_mue_inmueg_col = document.getElementById('total_esp_mue_inmueg').value;
								seis = parseFloat(total_esp_mue_inmueg_col.replace(/[$,\s]/g, '')); 
								if(seis>0){
									seis = seis
								} else {
									seis = 0									
								}
							} else { seis = 0; }

							if(clave9!=''){ 
								total_esp_mue_inmuez_col = document.getElementById('total_esp_mue_inmue_z').value;
								siete = parseFloat(total_esp_mue_inmuez_col.replace(/[$,\s]/g, '')); 
								if(siete>0){
									siete = siete
								} else {
									siete = 0									
								}
							} else { siete = 0; }

							if(clave1!=''){ 
								total_esp_mue_inmue_n_col = document.getElementById('total_esp_mue_inmue_n').value;
								ocho = parseFloat(total_esp_mue_inmue_n_col.replace(/[$,\s]/g, '')); 
								if(ocho>0){
									ocho = ocho
								} else {
									ocho = 0									
								}
							} else { ocho = 0; }

							var suma_pestanas_tot = uno + dos + tres + cuatro + cinco + seis + siete + ocho;
								
							var suma_honorar;
							var suma_honorario=document.getElementById('suma_honorario').value;

							if(suma_honorario!=''){	suma_honorar = parseFloat(suma_honorario.replace(/[$,\s]/g, '')); } else { suma_honorar = 0; }
													
							var suma_total_pest_hono = suma_pestanas_tot + suma_honorar;
							var obt_suma_pest_hono= document.formul.total_conceptos;
								obt_suma_pest_hono.value=suma_total_pest_hono; 

						///(FIN) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO
		}
		///// FIN 7

		///// INICIO 8
		function obtenmontoh(id){
			var unidadbvb=eval('document.formul.unidadh'+id+'.value');
			var costovb=eval('document.formul.costo_unitario_imp_incluidosh'+id+'.value');
						
						if(unidadbvb.length==0 || costovb.lenght==0){
							var monto_v = eval('document.formul.monto_tot_imp_incluidosh'+id);
							monto_v.value = '';					
						} else { 
							var monto_total_op = unidadbvb * costovb;
							var monto_total_renglon = eval('document.formul.monto_tot_imp_incluidosh'+id);
							monto_total_renglon.value = monto_total_op.toFixed(2);
						}
		}
		function suma_verticalh(id, clave1, clave2, clave3, clave4, clave5, clave6, clave7, clave9){
			var sumaTd=0;
			var cuantos = 30
			
			for(var i=1;i<=cuantos;i++){
				
				var campov=eval ('document.formul.monto_tot_imp_incluidosh'+i+'.value');
					if(campov.length==0){ 
						var calcula_total = 0 
					} else { 
						var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
						sumaTd=sumaTd+calcula_total;
					} 
			}
					  var obtsumad= document.formul.total_esp_mue_inmueh;
						obtsumad.value=sumaTd; 
									///(INICIO) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO

							var total_esp_mue_inmuea_col;
							var uno;
							var total_esp_mue_inmueb_col;
							var dos;
							var total_esp_mue_inmuec_col;
							var tres;
							var total_esp_mue_inmued_col;
							var cuatro;
							var total_esp_mue_inmuee_col;
							var cinco;
							var total_esp_mue_inmueg_col;
							var seis;
							var total_esp_mue_inmuez_col;
							var siete;
							var total_esp_mue_inmue_n_col;
							var ocho;
							
							if(clave2!=''){
								total_esp_mue_inmuea_col = document.getElementById('total_esp_mue_inmuea').value;
								uno = parseFloat(total_esp_mue_inmuea_col.replace(/[$,\s]/g, ''));
								if(uno>0){
									uno = uno
								} else {
									uno = 0									
								}  
							} else { uno = 0; } 
							
							if(clave3!=''){
								total_esp_mue_inmueb_col = document.getElementById('total_esp_mue_inmueb').value;
								dos = parseFloat(total_esp_mue_inmueb_col.replace(/[$,\s]/g, '')); 
								if(dos>0){
									dos = dos
								} else {
									dos = 0									
								}  
							} else { dos = 0; }

							if(clave4!=''){
								total_esp_mue_inmuec_col = document.getElementById('total_esp_mue_inmuec').value;
								tres = parseFloat(total_esp_mue_inmuec_col.replace(/[$,\s]/g, ''));
								if(tres>0){
									tres = tres
								} else {
									tres = 0									
								} 
							} else { tres = 0; }

							if(clave5!=''){
								total_esp_mue_inmued_col = document.getElementById('total_esp_mue_inmued').value;
								cuatro = parseFloat(total_esp_mue_inmued_col.replace(/[$,\s]/g, '')); 
								if(cuatro>0){
									cuatro = cuatro
								} else {
									cuatro = 0									
								} 
							} else { cuatro = 0; }

							if(clave6!=''){
								total_esp_mue_inmuee_col = document.getElementById('total_esp_mue_inmuee').value;
								cinco = parseFloat(total_esp_mue_inmuee_col.replace(/[$,\s]/g, '')); 
								if(cinco>0){
									cinco = cinco
								} else {
									cinco = 0									
								} 
							} else { cinco = 0; }

							if(clave7!=''){
								total_esp_mue_inmueg_col = document.getElementById('total_esp_mue_inmueg').value;
								seis = parseFloat(total_esp_mue_inmueg_col.replace(/[$,\s]/g, '')); 
								if(seis>0){
									seis = seis
								} else {
									seis = 0									
								}
							} else { seis = 0; }

							if(clave9!=''){ 
								total_esp_mue_inmuez_col = document.getElementById('total_esp_mue_inmue_z').value;
								siete = parseFloat(total_esp_mue_inmuez_col.replace(/[$,\s]/g, '')); 
								if(siete>0){
									siete = siete
								} else {
									siete = 0									
								}
							} else { siete = 0; }

							if(clave1!=''){ 
								total_esp_mue_inmue_n_col = document.getElementById('total_esp_mue_inmue_n').value;
								ocho = parseFloat(total_esp_mue_inmue_n_col.replace(/[$,\s]/g, '')); 
								if(ocho>0){
									ocho = ocho
								} else {
									ocho = 0									
								}
							} else { ocho = 0; }

							var suma_pestanas_tot = uno + dos + tres + cuatro + cinco + seis + siete + ocho;
								
							var suma_honorar;
							var suma_honorario=document.getElementById('suma_honorario').value;

							if(suma_honorario!=''){	suma_honorar = parseFloat(suma_honorario.replace(/[$,\s]/g, '')); } else { suma_honorar = 0; }
													
							var suma_total_pest_hono = suma_pestanas_tot + suma_honorar;
							var obt_suma_pest_hono= document.formul.total_conceptos;
								obt_suma_pest_hono.value=suma_total_pest_hono; 


						///(FIN) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO
		}
		///// FIN 8

		///// INICIO 9
		function obtenmontoi(id){
			var unidadbvb=eval('document.formul.unidadz'+id+'.value');
			var costovb=eval('document.formul.costo_unitario_imp_incluidosz'+id+'.value');
						
						if(unidadbvb.length==0 || costovb.lenght==0){
							var monto_v = eval('document.formul.monto_tot_imp_incluidosz'+id);
							monto_v.value = '';					
						} else { 
							var monto_total_op = unidadbvb * costovb;
							var monto_total_renglon = eval('document.formul.monto_tot_imp_incluidosz'+id);
							monto_total_renglon.value = monto_total_op.toFixed(2);
						}
		}
		function suma_verticali(id, clave1, clave2, clave3, clave4, clave5, clave6, clave7, clave9){
			var sumaTd=0;
			var cuantos = 30
			
			for(var i=1;i<=cuantos;i++){
				
				var campov=eval ('document.formul.monto_tot_imp_incluidosz'+i+'.value');
					if(campov.length==0){ 
						var calcula_total = 0 
					} else { 
						var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
						sumaTd=sumaTd+calcula_total;
					} 
			}
					  var obtsumad= document.formul.total_esp_mue_inmue_z;
						obtsumad.value=sumaTd;
									///(INICIO) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO

							var total_esp_mue_inmuea_col;
							var uno;
							var total_esp_mue_inmueb_col;
							var dos;
							var total_esp_mue_inmuec_col;
							var tres;
							var total_esp_mue_inmued_col;
							var cuatro;
							var total_esp_mue_inmuee_col;
							var cinco;
							var total_esp_mue_inmueg_col;
							var seis;
							var total_esp_mue_inmuez_col;
							var siete;
							var total_esp_mue_inmue_n_col;
							var ocho;
							
							if(clave2!=''){
								total_esp_mue_inmuea_col = document.getElementById('total_esp_mue_inmuea').value;
								uno = parseFloat(total_esp_mue_inmuea_col.replace(/[$,\s]/g, ''));
								if(uno>0){
									uno = uno
								} else {
									uno = 0									
								}  
							} else { uno = 0; } 
							
							if(clave3!=''){
								total_esp_mue_inmueb_col = document.getElementById('total_esp_mue_inmueb').value;
								dos = parseFloat(total_esp_mue_inmueb_col.replace(/[$,\s]/g, '')); 
								if(dos>0){
									dos = dos
								} else {
									dos = 0									
								}  
							} else { dos = 0; }

							if(clave4!=''){
								total_esp_mue_inmuec_col = document.getElementById('total_esp_mue_inmuec').value;
								tres = parseFloat(total_esp_mue_inmuec_col.replace(/[$,\s]/g, ''));
								if(tres>0){
									tres = tres
								} else {
									tres = 0									
								} 
							} else { tres = 0; }

							if(clave5!=''){
								total_esp_mue_inmued_col = document.getElementById('total_esp_mue_inmued').value;
								cuatro = parseFloat(total_esp_mue_inmued_col.replace(/[$,\s]/g, '')); 
								if(cuatro>0){
									cuatro = cuatro
								} else {
									cuatro = 0									
								} 
							} else { cuatro = 0; }

							if(clave6!=''){
								total_esp_mue_inmuee_col = document.getElementById('total_esp_mue_inmuee').value;
								cinco = parseFloat(total_esp_mue_inmuee_col.replace(/[$,\s]/g, '')); 
								if(cinco>0){
									cinco = cinco
								} else {
									cinco = 0									
								} 
							} else { cinco = 0; }

							if(clave7!=''){
								total_esp_mue_inmueg_col = document.getElementById('total_esp_mue_inmueg').value;
								seis = parseFloat(total_esp_mue_inmueg_col.replace(/[$,\s]/g, '')); 
								if(seis>0){
									seis = seis
								} else {
									seis = 0									
								}
							} else { seis = 0; }

							if(clave9!=''){ 
								total_esp_mue_inmuez_col = document.getElementById('total_esp_mue_inmue_z').value;
								siete = parseFloat(total_esp_mue_inmuez_col.replace(/[$,\s]/g, '')); 
								if(siete>0){
									siete = siete
								} else {
									siete = 0									
								}
							} else { siete = 0; }

							if(clave1!=''){ 
								total_esp_mue_inmue_n_col = document.getElementById('total_esp_mue_inmue_n').value;
								ocho = parseFloat(total_esp_mue_inmue_n_col.replace(/[$,\s]/g, '')); 
								if(ocho>0){
									ocho = ocho
								} else {
									ocho = 0									
								}
							} else { ocho = 0; }

							var suma_pestanas_tot = uno + dos + tres + cuatro + cinco + seis + siete + ocho;
								
							var suma_honorar;
							var suma_honorario=document.getElementById('suma_honorario').value;


							if(suma_honorario!=''){	suma_honorar = parseFloat(suma_honorario.replace(/[$,\s]/g, '')); } else { suma_honorar = 0; }
													
							var suma_total_pest_hono = suma_pestanas_tot + suma_honorar;

								var obt_suma_pest_hono= document.formul.total_conceptos;
								obt_suma_pest_hono.value=suma_total_pest_hono; 

						///(FIN) PONER CODIGO PARA IMPRESION DE CANTIDAD DEBAJO
		}
		///// FIN 9