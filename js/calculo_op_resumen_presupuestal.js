			//, Infor_finan_costo_monto
			function sumaVerticalmonto(id, cuantos){
			var Infor_finan_costo_monto = Infor_finan_costo_monto
			//var m1_fuente = Infor_finan_costo_monto
			var monto_coinversion2 = document.getElementById('monto_coinversion2').value;
			var sumaT=0;
			var cuantos = 50;

				for(var i=1;i<=cuantos;i++){
			      var campov=document.getElementById(`Monto_unidad${i}`).value;
							if(campov.length==0){ 
								campov = 0 
							} else { 
								campov = parseFloat(campov);
							}		
							sumaT=sumaT+campov;
				}
			         /*var valor_immp = document.getElementById("pres_anual_tot_2010").value;
			           valor_immp=sumaT;*/
/*console.log(sumaT);
console.log(monto_coinversion2);*/
					if(sumaT<=monto_coinversion2){
						 var obtsum_vert= document.getElementById('pres_anual_tot_2010');
						 	//obtsum_vert.value=Math.round(sumaT);
							obtsum_vert.value=sumaT;
							//console.log(sumaT);
			         //document.getElementById('imp_var_ejemplo').innerHTML = sumaT;
			          //alert(" sumaT: " + sumaT + "\n");
							} else {
								
								var campov=document.getElementById('Monto_unidad'+id).value;
								var dos=sumaT-parseInt(campov,10);

								
								var obtsuma=document.getElementById("pres_anual_tot_2010");
			              		obtsuma.value=dos;
								var campov_limpia = document.getElementById('Monto_unidad'+id);
							    campov_limpia.value = 0;
								
								//2025 ya no se ultilizará sumaVerticalporcentajes(id, cuantos)
								
								alert('Verifica los montos');
								}
			}

			function calc_presup(id, Infor_finan_apoyo_monto){

			var Infor_finan_apoyo_monto = Infor_finan_apoyo_monto
			var m2_fuente = parseFloat(Infor_finan_apoyo_monto)

			var sumaT=0;
			var cuantos = 50;
			for(var i=1;i<=cuantos;i++){
				
				//var fuente_finan = eval('document.formul.Fuente_finan'+i+'.value');	

				var fuente_finan_nombre = `Fuente_finan${i}`;
				var fuente_finan = parseInt(document.getElementById(fuente_finan_nombre).value);
				var variable_monto = `Monto_unidad${i}`;
				var calcula_monto_profest_sin = document.getElementById(variable_monto).value;

							if(calcula_monto_profest_sin.length==0){ 
								calcula_monto_profest = 0;
							} else { 
								calcula_monto_profest = parseFloat(calcula_monto_profest_sin);
							}
							/*2025 se quita valida PROFEST porque sera el monto de coinversion el que se debe obtener
							if(fuente_finan == "3"){
								sumaT=sumaT+calcula_monto_profest;
								if(sumaT>m2_fuente){
									document.getElementById(fuente_finan_nombre).selectedIndex = "0";
									alert ("Verifica los montos ingresados para la fuente de financiamiento Institucional PROFEST");
								}
							}    */    
				}
			}