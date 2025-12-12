//INICIO .segunampo Alta y Modificación Solicitud
var http_request = false;
/////// INICIO funcion cat_categoria
var set_pcat = document.querySelectorAll(".cat_categoria");
			
	for (var c = 0; c < set_pcat.length; c++) {
		set_pcat[c].onchange = function () {

		/*console.log(`variable: ${this.name}`);
		console.log(`valor: ${this.value}`);*/
				   						
		document.getElementById('Infor_finan_costo_monto').value = '';
		//document.getElementById('Infor_finan_apoyo_monto').value = '';
		document.getElementById('Infor_finan_apoyo_costo_total').value = '';
					
		//document.getElementById('Infor_finan_apoyo_monto_paso').value = '';
		//document.getElementById('Infor_finan_apoyo_costo_total_paso').value = '';
		//document.getElementById('Infor_finan_costo_monto_paso').value = '';

		document.getElementById('Infor_finan_apoyo_costo_total').value = '';
		
		var m1 = parseFloat(document.getElementById("Infor_finan_costo_monto").value);
		//var m2 = parseFloat(document.getElementById("Infor_finan_apoyo_monto").value);
		var m_total = parseFloat(document.getElementById("Infor_finan_apoyo_costo_total").value);
	
		if(m1==''){
			m1 = '';
		} else {
			m1 = m1;
		}
		/*18/12/2024
		if(m2==''){
			m2 = '';
		} else {
			m2 = m2;
		}*/
		if(m_total==''){
			m_total = '';
		} else {
			m_total = m_total;
		}
		/*console.log(`m1: ${m1}`);
		console.log(`m2: ${m2}`);
		console.log(`m_total: ${m_total}`);*/
		var url_zcat='receptor_categoria.php?variable='+this.name+'&valor='+this.value+'&Infor_finan_costo_monto='+m1+'&Infor_finan_apoyo_costo_total='+m_total;
			hacerPeticion(url_zcat);
		}
	}
/////// FIN funcion cat_categoria
		  	    
		  var set_pc = document.querySelectorAll(".segunampo");
			
		  for (var i = 0; i < set_pc.length; i++) {
			   set_pc[i].onchange = function () {
				   
				var seleccion_categoria=this.name;

				/*var cuantas_ediciones=this.value
				if(seleccion_categoria=='numero_ediciones_previas' && cuantas_ediciones==0){
					document.getElementById('numero_ediciones_previas').value = '';
					document.getElementById("rowError_num_ediciones").style.display = 'block';
				}*/
				//if(seleccion_categoria=='info_financiera_categoria'){		
					
					/*document.getElementById('Infor_finan_costo_monto').value = '';
					document.getElementById('Infor_finan_apoyo_monto').value = '';
					document.getElementById('Infor_finan_apoyo_costo_total').value = '';*/
					
					var m1 = parseFloat(document.getElementById("Infor_finan_costo_monto").value);
					//var m2 = parseFloat(document.getElementById("Infor_finan_apoyo_monto").value);
					var m_total = parseFloat(document.getElementById("Infor_finan_apoyo_costo_total").value);
					
					//console.log('----------------------------entra----------------------------------');
				//}	
				////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
						var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
					 
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
					 
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
					 
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.documentMode;
					 
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
					 
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
					 
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					 
					 var navegador;					 
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;					 
					//console.log(this.name);
					//console.log(this.value);					 
					////////////FIN VERIFICAR EL NAVEGADOR					
					var url_z='receptor_segcampo.php?variable='+this.name+'&valor='+this.value+'&navegador='+navegador;
					hacerPeticion(url_z);
					
			/*var campos_text_area=this.name;
			   var datos_campos_text_area=this.value;
				   
				   if(campos_text_area=='objetivo_general'){
					   
					var valor1=datos_campos_text_area.replace(new RegExp("	","g"), " ");
					var valor2=valor1.replace(new RegExp("	","g"), "- ");
					var valor=valor2.replace(new RegExp("\n","g"), "<br>");

					} else {
						valor=this.value;
						}			 
				var url='receptor.php?variable='+this.name+'&valor='+valor+'&navegador='+navegador;
					//fetch(url)	
					hacerPeticion(url);*/
			  }
          }
		  //FIN .segunampo Alta y Modificación Solicitud
		  
		  /////////////***********************************
		  
		  var set_pc_obj_gen = document.querySelectorAll(".objetivo_gen_texto");
			
		  for (var ii = 0; ii < set_pc_obj_gen.length; ii++) {
			   set_pc_obj_gen[ii].onchange = function () {
			
				////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
						var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.documentMode;
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					 var navegador;
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;
					////////////FIN VERIFICAR EL NAVEGADOR	
			   var campos_text_area=this.name;
			   var datos_campos_text_area=this.value;
			   
					var valor1=datos_campos_text_area.replace(new RegExp("	","g"), " ");
					var valor2=valor1.replace(new RegExp("	","g"), "- ");
					var valor=valor2.replace(new RegExp("\n","g"), "<br>");
	 
				var url_obj_gen='receptor_obj_gen.php?variable='+this.name+'&valor='+valor+'&navegador='+navegador;
					//fetch(url)	
					hacerPeticion(url_obj_gen);
			  }
          }
		  ////////////************************************
		  //INICIO .proyectocampo Alta y Modificación Proyecto 1er. pestaña
		  var set_pcX = document.querySelectorAll(".proyectocampo");
		
		  for (var i = 0; i < set_pcX.length; i++) {
			   set_pcX[i].onchange = function () {
			  				   
				 var valor=this.value;
						
					////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
						var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
					 
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
					 
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
					 
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.documenttMode;
					 
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
					 
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
					 
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					 
					 var navegador;
					 
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;
					 
					////////////FIN VERIFICAR EL NAVEGADOR	
				var url_X='receptor2_Proyecto.php?variable='+this.name+'&valor='+valor+'&navegador='+navegador;
				hacerPeticion(url_X);
			  }
          }		  
		  //FIN .proyectocampo Alta y Modificación Proyecto 1er. pestaña

		  //INICIO .proyectocampodir Alta y Modificación Proyecto director del festival
		  var set_pcQ = document.querySelectorAll(".proyectocampodir");
		
		  for (var q = 0; q < set_pcQ.length; q++) {
			   set_pcQ[q].onchange = function () {
			  				   
				 var valor=this.value;
						
					////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
					var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
					 
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
					 
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
					 
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.documenttMode;
					 
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
					 
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
					 
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					 
					 var navegador;
					 
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;
					 
					////////////FIN VERIFICAR EL NAVEGADOR	
					/*console.log(this.value);
					console.log(this.name);*/
				var url_Q='receptor2_Proyecto_director.php?variable='+this.name+'&valor='+valor+'&navegador='+navegador;
				hacerPeticion(url_Q);	
			  }
          }		  
		  //FIN .proyectocampodir Alta y Modificación Proyecto director del festival

		  //INICIO ¿Por qué medios se dará difusión al festival?
		  var set_pcz = document.querySelectorAll(".checkcampo");
			
		  for (var i = 0; i < set_pcz.length; i++) {
			   set_pcz[i].onchange = function () {
				
				if(this.checked == true ){
					//console.log(`Checado ${this.name}`)
					var seleccion_medio=this.value;
				}else{
					//console.log(`No checado ${this.name}`)
					var seleccion_medio=contenido=0;
				}
				//console.log(`valor final= ${seleccion_medio}`) 
				var url_z='receptor2_Proyecto.php?variable='+this.name+'&valor='+seleccion_medio;
				hacerPeticion(url_z);
			  }
          }
		  //FIN ¿Por qué medios se dará difusión al festival?

//16/07/2020 INICIO

//INICIO Alta y Modificación lugares por tipo 
		  var set_pcX = document.querySelectorAll(".tipolugcampo");
		
		  for (var i = 0; i < set_pcX.length; i++) {
			   set_pcX[i].onchange = function () {
			  				   
				 var valor=this.value;
						
					////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
						var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
					 
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
					 
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
					 
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.documenttMode;
					 
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
					 
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
					 
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					 
					 var navegador;
					 
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;
					 
					////////////FIN VERIFICAR EL NAVEGADOR	
				var url_X='receptor2_lugares_tipo_v2.php?variable='+this.name+'&valor='+valor+'&navegador='+navegador;
				hacerPeticion(url_X);
			  }
          }	
//FIN Alta y Modificación lugares por tipo 
//16/07/2020 FIN
		  
		  //INICIO .calc_poblacion
		  /*inicio para la convocatoria 2023 esta sección se elimina
		  var set_pcXz = document.querySelectorAll(".calc_poblacion");
			
		  for (var i = 0; i < set_pcXz.length; i++) {
			   set_pcXz[i].onchange = function () {
				   
			   //(INICIO) CALCULO Población
			  	var sumTot = parseInt(document.getElementById("poblacion_genero_mujer").value) +  parseInt(document.getElementById("poblacion_genero_hombre").value); 
			  	
			  	var sumaEdad = parseInt(document.getElementById("poblacion_edad_0_12").value) + 
			  			   parseInt(document.getElementById("poblacion_edad_13_17").value) + 
			  			   parseInt(document.getElementById("poblacion_edad_18_29").value) + 
			  			   parseInt(document.getElementById("poblacion_edad_30_59").value) + 
			  			   parseInt(document.getElementById("poblacion_edad_60").value);
			    
			    var sumaNivAca = parseInt(document.getElementById("poblacion_nivel_sin_escolaridad").value) + 
			    		   parseInt(document.getElementById("poblacion_nivel_educ_basica").value) + 
			    		   parseInt(document.getElementById("poblacion_nivel_educ_media").value)	+ 
			    		   parseInt(document.getElementById("poblacion_nivel_educ_superior").value);
			    
			   // var especificosReclusion = parseInt(document.getElementById("poblacion_especific_reclusion").value) + 
			   // 		   parseInt(document.getElementById("poblacion_especific_indigenas").value) + 
			   // 		   parseInt(document.getElementById("poblacion_especific_migrantes").value) + 
			   // 		   parseInt(document.getElementById("poblacion_especific_con_discapacidad").value) + 
			   //		   parseInt(document.getElementById("poblacion_especific_otro_cantidad").value);
						   
			    var poblacionObjetivo = true;

			    var pubABenefic = parseInt(document.getElementById("meta_num_publico").value);

			    if(sumTot != pubABenefic){
			    	document.getElementById("errpoblacion_suma").style.display = 'block';
			    	poblacionObjetivo_edad = false;
			    }else{
			    	document.getElementById("errpoblacion_suma").style.display = 'none';
			    	poblacionObjetivo_edad = true;
			    }

			    if(sumTot > pubABenefic){
			    	document.getElementById("errpoblacion_Sobrepasa_suma").style.display = 'block';
			    	document.getElementById("errpoblacion_suma").style.display = 'none';
			    	poblacionObjetivo_edad = false;
			    	document.getElementById("poblacion_genero_mujer").value  = 0;
			    	document.getElementById("poblacion_genero_hombre").value  = 0;
			    }else{
			    	document.getElementById("errpoblacion_Sobrepasa_suma").style.display = 'none';
			    	poblacionObjetivo_edad = true;
			    }
				
			    if(sumTot != sumaEdad){
			    	document.getElementById("errpoblacion_edad").style.display = 'block';
			    	poblacionObjetivo_edad = false;
			    }else{
			    	document.getElementById("errpoblacion_edad").style.display = 'none';
			    	poblacionObjetivo_edad = true;
			    }

			    if(sumTot != sumaNivAca){
			    	document.getElementById("errpoblacion_nivel").style.display = 'block';
			    	poblacionObjetivo_nivel = false;
			    }else{
			    	document.getElementById("errpoblacion_nivel").style.display = 'none';
			    	poblacionObjetivo_nivel = true;
			    }

			   // if(sumTot != especificosReclusion) {
			   // 	document.getElementById("errpoblacion_especific").style.display = 'block';
			   // 	poblacionObjetivo_especific = false;
			   //	var valor = 0;
			   // }else{
			   // 	document.getElementById("errpoblacion_especific").style.display = 'none';
			   // 	poblacionObjetivo_especific = true;
			   // }
				//(FIN) CALCULO Población
				var url_X='receptor2_Proyecto.php?variable='+this.name+'&valor='+this.value;
				hacerPeticion(url_X);
			  }
          } fin para la convocatoria 2023 esta sección se elimina*/
		  //FIN .calc_poblacion
		  
		       //INICIO fecha cronograma 3 obligatorios
		  var set_pdate = document.querySelectorAll(".validafecha");
			
		  for (var i = 0; i < set_pdate.length; i++) {
			   set_pdate[i].onchange = function () {
				   
			//console.log(this.name, this.value);
				   
			   var fecha_inicial = this.value.split('/');
 			   var fecha_ini = fecha_inicial[2] + '/' + fecha_inicial[1] + '/' + fecha_inicial[0];
			
			   var fecha_final = document.getElementById("crono_fechaacciones_fin_a").value.split('/');
			   var fecha_fin = fecha_final[2] + '/' + fecha_final[1] + '/' + fecha_final[0];
				   
				   var nombre_a='crono_fechaacciones_a'; 
			
					if(document.getElementById("crono_fechaacciones_a").value!='' && document.getElementById("crono_fechaacciones_fin_a").value!='')
					{
						if(new Date(fecha_ini).getTime() <= new Date(fecha_fin).getTime())
						{
							document.getElementById("errfechacrono").style.display = 'none';
							var valor_fech = this.value;
						} else {
							document.getElementById("errfechacrono").style.display = 'block';
							//console.log('Fecha A mal');	
							document.getElementById("crono_fechaacciones_a").value = '';
							var valor_fech = '';
						}	
				   } else {
					   //ument.getElementById("errfechacrono").style.display = 'block';
							//console.log('Fecha A mal vacio');	
							document.getElementById("crono_fechaacciones_a").value = this.value;
							var valor_fech = this.value;
					   }				   
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_a+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }	  

		  var set_pdateb = document.querySelectorAll(".validafechab");
			
		  for (var i = 0; i < set_pdateb.length; i++) {
			   set_pdateb[i].onchange = function () {
				//console.log('entro a crono_fechaacciones_b');

				   var fecha_inicial_b = this.value.split('/');
				   var fecha_ini_b = fecha_inicial_b[2] + '/' + fecha_inicial_b[1] + '/' + fecha_inicial_b[0];
				   
				   var fecha_final_a = document.getElementById("crono_fechaacciones_fin_a").value.split('/');
				   var fecha_fin_a = fecha_final_a[2] + '/' + fecha_final_a[1] + '/' + fecha_final_a[0];

				   var fecha_inicio_antecede_a = document.getElementById("crono_fechaacciones_a").value.split('/');
				   var fecha_inicio_antecede_a_val = fecha_inicio_antecede_a[2] + '/' + fecha_inicio_antecede_a[1] + '/' + fecha_inicio_antecede_a[0];
				   
				   var nombre_b='crono_fechaacciones_b'; 	

				   if(document.getElementById("crono_fechaacciones_b").value!='' && document.getElementById("crono_fechaacciones_fin_a").value!='')
					{
						//console.log(fecha_ini_b);
						//console.log(fecha_inicio_antecede_a_val);

						//if(new Date(fecha_fin_a).getTime() <= new Date(fecha_ini_b).getTime())
						if(new Date(fecha_ini_b).getTime() >= new Date(fecha_inicio_antecede_a_val).getTime())//cambio el 18/03/2020 version 2
						{
							//console.log('si las esta pasando como fechas ');	
							document.getElementById("errfechacrono_b").style.display = 'none';
							//console.log('Fecha B bien');	
							var valor_fech = this.value;
						} else {
							document.getElementById("errfechacrono_b").style.display = 'block';	
							//console.log('Fecha B mal');	
							document.getElementById("crono_fechaacciones_b").value = '';
							var valor_fech = this.value;
						}	
				   } else {
					   //document.getElementById("errfechacrono_b").style.display = 'block';
							//console.log('Fecha A mal vacio');	
							document.getElementById("crono_fechaacciones_b").value = this.value;
							var valor_fech = this.value;
					   }	
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_b+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }
		  
		  var set_pdatec = document.querySelectorAll(".validafechac");
			
		  for (var i = 0; i < set_pdatec.length; i++) {
			   set_pdatec[i].onchange = function () {

				   var fecha_inicial_c = this.value.split('/');
				   var fecha_ini_c = fecha_inicial_c[2] + '/' + fecha_inicial_c[1] + '/' + fecha_inicial_c[0];
				   
				   var fecha_final_b = document.getElementById("crono_fechaacciones_fin_b").value.split('/');
				   var fecha_fin_b = fecha_final_b[2] + '/' + fecha_final_b[1] + '/' + fecha_final_b[0];

 			    var fecha_inicio_antecede_b = document.getElementById("crono_fechaacciones_b").value.split('/');
				var fecha_inicio_antecede_b_val = fecha_inicio_antecede_b[2] + '/' + fecha_inicio_antecede_b[1] + '/' + fecha_inicio_antecede_b[0];
				   
				   var nombre_c='crono_fechaacciones_c'; 
				   
				   if(document.getElementById("crono_fechaacciones_c").value!='' && document.getElementById("crono_fechaacciones_fin_b").value!='')
					{
						//if(new Date(fecha_fin_b).getTime() <= new Date(fecha_ini_c).getTime())
						if(new Date(fecha_ini_c).getTime() >= new Date(fecha_inicio_antecede_b_val).getTime())//cambio el 18/03/2020 version 2
						{							
							document.getElementById("errfechacrono_c").style.display = 'none';
							var valor_fech = this.value;	
						} else {
							document.getElementById("errfechacrono_c").style.display = 'block';	
							//console.log('Fecha C mal');	
							document.getElementById("crono_fechaacciones_c").value = '';
							var valor_fech = '';
						}	
				   } else {
					  // document.getElementById("errfechacrono_c").style.display = 'block';
							//console.log('Fecha A mal vacio');	
							document.getElementById("crono_fechaacciones_c").value = this.value;
							var valor_fech = this.value;
					   }	
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_c+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }
		  
		  
		  var set_pdatefa = document.querySelectorAll(".validafecha_fina");
			
		  for (var i = 0; i < set_pdatefa.length; i++) {
			   set_pdatefa[i].onchange = function () {
				   
			   var fecha_final = this.value.split('/');
 			   var fecha_fin = fecha_final[2] + '/' + fecha_final[1] + '/' + fecha_final[0];
			   			
			   var fecha_inicial = document.getElementById("crono_fechaacciones_a").value.split('/');
			   var fecha_ini = fecha_inicial[2] + '/' + fecha_inicial[1] + '/' + fecha_inicial[0];
			   
			   var nombre_a='crono_fechaacciones_fin_a'; 
			
					if(document.getElementById("crono_fechaacciones_fin_a").value!='')
					{
						//console.log(crono_fechaacciones_fin_a)
						//undefined
						
						if(this.name=="crono_fechaacciones_fin_a" && new Date(fecha_ini).getTime() <= new Date(fecha_fin).getTime())
						{
							document.getElementById("errfechacrono_fin_a").style.display = 'none';
							var valor_fech = this.value;
						} else {
							document.getElementById("errfechacrono_fin_a").style.display = 'block';
							//console.log('Fecha A mal');	
							document.getElementById("crono_fechaacciones_fin_a").value = '';
							var valor_fech = '';
						}
				   }
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_a+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }	  
		  
		  var set_pdatefb = document.querySelectorAll(".validafecha_finb");
			
		  for (var i = 0; i < set_pdatefb.length; i++) {
			   set_pdatefb[i].onchange = function () {
				   
			   var fecha_final_b = this.value.split('/');
 			   var fecha_fin_b = fecha_final_b[2] + '/' + fecha_final_b[1] + '/' + fecha_final_b[0];
			   			
			   var fecha_inicial_b = document.getElementById("crono_fechaacciones_b").value.split('/');
			   var fecha_ini_b = fecha_inicial_b[2] + '/' + fecha_inicial_b[1] + '/' + fecha_inicial_b[0];
			   
			   var nombre_b='crono_fechaacciones_fin_b'; 
			
					if(document.getElementById("crono_fechaacciones_fin_b").value!='')
					{
						//console.log('entro')
						if(this.name=="crono_fechaacciones_fin_b" && new Date(fecha_ini_b).getTime() <= new Date(fecha_fin_b).getTime())
						{
							document.getElementById("errfechacrono_fin_b").style.display = 'none';
							var valor_fech = this.value;
						} else {
							document.getElementById("errfechacrono_fin_b").style.display = 'block';
							//console.log('Fecha B mal');	
							document.getElementById("crono_fechaacciones_fin_b").value = '';
							var valor_fech = '';
						}
				   }
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_b+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }	  
		  
		  var set_pdatefc = document.querySelectorAll(".validafecha_finc");
			
		  for (var i = 0; i < set_pdatefc.length; i++) {
			   set_pdatefc[i].onchange = function () {
			
			   var fecha_final_c = this.value.split('/');
 			   var fecha_fin_c = fecha_final_c[2] + '/' + fecha_final_c[1] + '/' + fecha_final_c[0];
			   
			   var fecha_inicial_c = document.getElementById("crono_fechaacciones_c").value.split('/');
			   var fecha_ini_c = fecha_inicial_c[2] + '/' + fecha_inicial_c[1] + '/' + fecha_inicial_c[0];
			   
			   var nombre_c='crono_fechaacciones_fin_c'; 
			   
					if(document.getElementById("crono_fechaacciones_fin_c").value!='')
					{
						if(document.getElementById("fechaacciones_P1")){
							/*var fechaacciones_P1 = document.getElementById("fechaacciones_P1").value.split('/');
			   				var fechaacciones_PUNO = fechaacciones_P1[2] + '/' + fechaacciones_P1[1] + '/' + fechaacciones_P1[0];
							//&& new Date(fechaacciones_PUNO).getTime() >= new Date(fecha_fin_c).getTime()*/

							if(this.name=="crono_fechaacciones_fin_c" && new Date(fecha_ini_c).getTime() <= new Date(fecha_fin_c).getTime())								
							{
								document.getElementById("errfechacronos_fin_c").style.display = 'none';
								var valor_fech = this.value;
							
							} else {
								document.getElementById("errfechacronos_fin_c").style.display = 'block';
								//console.log('Fecha C mal');	
								document.getElementById("crono_fechaacciones_fin_c").value = '';							
								var valor_fech = '';
							}
						} else {

							//console.log("no hay nuevos registros");
							if(this.name=="crono_fechaacciones_fin_c" && new Date(fecha_ini_c).getTime() <= new Date(fecha_fin_c).getTime())
							{
								document.getElementById("errfechacrono_c").style.display = 'none';
								var valor_fech = this.value;
							
							} else {
								document.getElementById("errfechacrono_c").style.display = 'block';
								//console.log('Fecha C mal');	
								document.getElementById("crono_fechaacciones_fin_c").value = '';
								
								var valor_fech = '';
							}
						}
				   }
				  
				   var url_X='receptor6_Cronograma_inicio_fin.php?variable='+nombre_c+'&valor='+valor_fech;
				   hacerPeticion(url_X);
			   }
		  }
		  ///// FIN cronograma 3 obligatorios
		  
		  //////////////////***************************INICIO Solo textarea
		  
		  //INICIO .proyectocampo Alta y Modificación Proyecto 1er. pestaña
		  var set_pcX = document.querySelectorAll(".guardar_campostext");
		
		  for (var i = 0; i < set_pcX.length; i++) {
			   set_pcX[i].onchange = function () {
				   
			   var campos_text_area=this.name;
			   var datos_campos_text_area=this.value;
			   
					var valor1=datos_campos_text_area.replace(new RegExp("	","g"), " ");
					var valor2=valor1.replace(new RegExp("'","g"), "");
					valor2=valor2.replace(new RegExp("	","g"), "- ");
					var valor=valor2.replace(new RegExp("\n","g"), "<br>");
					
					//console.log(datos_campos_text_area);			
					////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
						var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.umentMode;
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					    var navegador;
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;
					////////////FIN VERIFICAR EL NAVEGADOR							
				var url_Xy='receptor7_textarea.php?variable='+this.name+'&valor='+valor+'&navegador='+navegador;
				hacerPeticion(url_Xy);
			  }
          }		  		  
		  //////////////////***************************FIN Solo textarea

		  ////////////////// 31/08/2020 (INICIO) validacion de fecha de festival inicio y fin //////////////////////////

		  var set_pc_fecha_reali = document.querySelectorAll(".fecha_reali_festival");
			
		  for (var i = 0; i < set_pc_fecha_reali.length; i++) {
			   set_pc_fecha_reali[i].onchange = function () {
				   
			   var fecha_inicial = this.value.split('/');
 			   var fecha_ini = fecha_inicial[2] + '/' + fecha_inicial[1] + '/' + fecha_inicial[0];
			
			   var fecha_final = document.getElementById("periodo_realizacion_fecha_termino").value.split('/');
			   var fecha_fin = fecha_final[2] + '/' + fecha_final[1] + '/' + fecha_final[0];
				
					if(document.getElementById("periodo_realizacion_fecha_inicio").value!='' && document.getElementById("periodo_realizacion_fecha_termino").value!='')
					{
						//10 de julio y hasta el 15 de diciembre de 2021
						//11 de abril y hasta el 15 de diciembre de 2022
						//17 de abril y el 15 de diciembre de 2023
						//9 mayo al 31 de diciembre de 2025
							if((fecha_fin >= '2025/05/09') && (fecha_fin <= '2025/12/31'))
							{
								//console.log('entro y esta bien 1');
								document.getElementById("errper_proy").style.display = 'none';
								var valor_fech = this.value;
							} else {
								//console.log('entro y esta mal 1');
								document.getElementById("errper_proy").style.display = 'block';
								this.value = "";
							}

							if((fecha_ini <= fecha_fin) && (fecha_ini >= '2025/05/09') &&  (fecha_ini <= '2025/12/31'))
							{
								//console.log('entro y esta bien 2');
								document.getElementById("errper_proy").style.display = 'none';
								var valor_fech = this.value;
							} else {
								//console.log('entro y esta mal 2');
								this.value = "";
								document.getElementById("errper_proy").style.display = 'block';
							}
					}
						
				////////////INICIO VERIFICAR EL NAVEGADOR	
						// Opera 8.0+
						var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
					 
						// Firefox 1.0+
						var isFirefox = typeof InstallTrigger !== 'undefined';
					 
						// Safari 3.0+ "[object HTMLElementConstructor]"
						var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0 || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
					 
						// Internet Explorer 6-11
						var isIE = /*@cc_on!@*/false || !!document.documentMode;
					 
						// Edge 20+
						var isEdge = !isIE && !!window.StyleMedia;
					 
						// Chrome 1+
						var isChrome = !!window.chrome && !!window.chrome.webstore;
					 
						// Blink
						var isBlink = (isChrome || isOpera) && !!window.CSS;
					 
					 var navegador;
					 
						if(isOpera) navegador = 1;
						if(isFirefox)navegador = 2;
						if(isSafari)navegador = 3;
						if(isIE)navegador = 4;
						if(isEdge)navegador = 5;
						if(isChrome)navegador = 6;
						if(isBlink)navegador = 7;
					////////////FIN VERIFICAR EL NAVEGADOR	

					var url_z_fech='receptor_segcampo.php?variable='+this.name+'&valor='+this.value+'&navegador='+navegador;
					hacerPeticion(url_z_fech);
			  }
          }
		  ////////////////// 31/08/2020 (FIN) validacion de fecha de festival inicio y fin //////////////////////////

	//INICIO .info_inst_reg Alta y Modificación de Información de la Instancia
	var set_pc_inf_int = document.querySelectorAll(".info_inst_reg");
	for (var h = 0; h < set_pc_inf_int.length; h++)
	{
		set_pc_inf_int[h].onchange = function () {
		//'Organización de la Sociedad Civil'
		if(document.getElementById("tipo_instancia").value==5)
		{
			document.getElementById("CLUNI").disabled=false;
		} else {
			document.getElementById("CLUNI").disabled=true;
			CLUNI.value = "";
		}
			var url_instancia='receptor_informacion_instancia.php?variable='+this.name+'&valor='+this.value;
			hacerPeticion(url_instancia);			
		}
    }
    //FIN .info_inst_reg Alta y Modificación de Información de la Instancia

    function habilitar(form)
	{
		 if($("#poblacion_especific_otros:checked").val()==1) {
			document.getElementById("poblacion_especific_otro_nombre").disabled=false;
			document.getElementById("poblacion_especific_otro_cantidad").disabled=false;
		} else {
			document.getElementById("poblacion_especific_otro_nombre").disabled=true;
			document.getElementById("poblacion_especific_otro_cantidad").disabled=true;
			poblacion_especific_otro_nombre.value = "";
			poblacion_especific_otro_cantidad.value = "";

			var uno_poblacion_especific_otro_nombre="";
			var uno_poblacion_especific_otro_cantidad = "";
			 
				var url_z2='receptor2_check.php?poblacion_especific_otro_nombre='+uno_poblacion_especific_otro_nombre+'&poblacion_especific_otro_cantidad='+uno_poblacion_especific_otro_cantidad;
							
				hacerPeticion(url_z2);
		}
	}
	
	function habilitarV(form)
	{
		if($("#estrategias_medios_otros:checked").val()==1) {
			document.getElementById("estrategias_medios_otros_nombre").disabled=false;
		}
		else {
			document.getElementById("estrategias_medios_otros_nombre").disabled=true;
			estrategias_medios_otros_nombre.value = "";
			
				var uno_poblacion_especific_otro_nombre = "";
			 
				var url_z2='receptor3_check.php?estrategias_medios_otros_nombre='+uno_poblacion_especific_otro_nombre;
							
				hacerPeticion(url_z2);
			
		}
	}