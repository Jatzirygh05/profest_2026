// JavaScript Document
function validarEnvio_honorarios(){

var cuenta_error_totales_hono=0;
var todoscampos = document.querySelectorAll(".honocampo");
//var total_apoyo_suma = document.getElementById('total_apoyo_suma').value;
      todoscampos.forEach((h)=>{  
      
      var nombre_campo = h.name;
	  var porciones = nombre_campo.split('__');
                
            var nombre_x = porciones[1];
            var nombre_y = porciones[2];
            
      if(h.value=='' && !nombre_x=='' && !nombre_y==''){
      	//console.log(`campo vacio: ${nombre_campo}`)
		document.getElementById(nombre_campo).style.borderColor="#D0021B";
      	cuenta_error_totales_hono+=1; 
      } else {
      	//console.log(`campo lleno: ${porciones[0]}`)
      	cuenta_error_totales_hono==0;
      }
    })
	//console.log(`errores: ${cuenta_error_totales}`)
    
	if(cuenta_error_totales_hono==0){
		//console.log('SI se puede guardar');
		//window.document.formul.submit();
		document.getElementById("rowError1").style.display = 'none';
		//INICIO Probar agregar funion de los conceptos//////////////////////////
		validarEnvio_conceptos();
			function validarEnvio_conceptos(){
				//console.log(`entro a la segunda funion de los conceptos`)
				var cuenta_error_totales=0;
				var todoscamposp = document.querySelectorAll(".honoconceptos");

				var apoyo_fin_sol_sc = document.getElementById('apoyo_fin_sol_sc').value; //Solicitado a la SC
				var sumhono = document.getElementById('sumhono').value; //Honorarios
				var suma_pestanas = document.getElementById('suma_pestanas').value; //Suma pestañas

			      todoscamposp.forEach((j)=>{  
			      
			      var nombre_campo = j.name;
				  var porciones = nombre_campo.split('__');
			            var nombre_x1 = porciones[1];
			            var nombre_y1 = porciones[2];
			            
			      if(j.value=='' && !nombre_x1=='' && !nombre_y1==''){
			        //console.log(`campo vacio: ${nombre_campo}`)
					document.getElementById(nombre_campo).style.borderColor="#D0021B";
			      	cuenta_error_totales+=1; 
			      } else {
			      	//console.log(`campo lleno: ${porciones[0]}`)
			      	cuenta_error_totales==0;
			      }

			    })
				//console.log(`errores: ${cuenta_error_totales}`)
			    /// INICIO TOTAL DE PESTAÑAS
				if(cuenta_error_totales==0){
				var sumando_1er_2da_montos = parseFloat(suma_pestanas) + parseFloat(sumhono);

					if(sumando_1er_2da_montos==apoyo_fin_sol_sc){
					//console.log('SI se puede guardar');
					window.document.formul.submit();	
					} else {
						$(window).scrollTop(300);
						document.getElementById("suma_pestanas").style.borderColor="#D0021B";
			            document.getElementById("sumhono").style.borderColor="#D0021B";
			            document.getElementById("total_2").style.borderColor="#D0021B";
						document.getElementById("errmayormontoSC").style.display = 'block';
					}	
			 	} else {
					//console.log('error en la captura');
					$(window).scrollTop(300);
					document.getElementById("rowError1").style.display = 'block';
					document.getElementById("rowBien1").style.display = 'none';
					cuenta_error_totales=1;
					}
			}
		//Fin Probar agregar funcion de los conceptos//////////////////////////
		} else {
			//console.log('NO se puede guardar');
			$(window).scrollTop(300);
			document.getElementById("rowError1").style.display = 'block';
			return false;
	}	
}