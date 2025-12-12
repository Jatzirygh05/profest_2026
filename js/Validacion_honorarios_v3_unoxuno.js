// JavaScript Document
function validarEnvio_honorarios(){
var cuenta_error_totales=0;
var todoscampos = document.querySelectorAll(".honocampo");
var total_apoyo_suma = document.getElementById('total_apoyo_suma');
      todoscampos.forEach((h)=>{  
      
      var nombre_campo = h.name;
	  var porciones = nombre_campo.split('__');
                
            var nombre_x = porciones[1];
            var nombre_y = porciones[2];
            
      if(h.value=='' && !nombre_x=='' && !nombre_y==''){
      	//console.log(`campo vacio: ${nombre_campo}`)
		document.getElementById(nombre_campo).style.borderColor="#D0021B";
      	cuenta_error_totales+=1; 
      } else {
      	//console.log(`campo lleno: ${porciones[0]}`)
      	cuenta_error_totales==0;
      }
    })

	if(cuenta_error_totales==0){

        //FIN DE suma de montos

        //INICIO DE suma de honorarios y pestañas
          var suma_general = 0;

          var total_apoyo_suma = document.formul.total_apoyo_suma.value; //suma de honorarios
          var apoyo_general_paso = document.formul.apoyo_general_paso.value;//suma_pestanas

          var total_proyecto = document.formul.total_proyecto.value;

          suma_general = parseFloat(total_apoyo_suma.replace(/[$,\s]/g, '')) + parseFloat(apoyo_general_paso.replace(/[$,\s]/g, ''));
  
          var fin_suma = document.formul.fin_suma;
              fin_suma.value=suma_general;

        if(total_apoyo_suma>0 && suma_general<=total_proyecto)
            {
             console.log('Entro 1 el importe de honorarios y conceptos es MENOR (BIEN) o igual al Apoyo financiero solicitado a la Secretaría de Cultura');
              document.getElementById("apoyo_general_paso").style.borderColor="";
                document.getElementById("total_apoyo_suma").style.borderColor="";
                document.getElementById("fin_suma").style.borderColor="";
                document.getElementById("rowError2").style.display = 'none';
             // var obtsuma= document.formul.fin_suma;
             // obtsuma.value=suma_general;
             //--------BUENO(11012022)-----------window.document.formul.submit();	
            } else {
              console.log('Entro 1 el importe de honorarios y conceptos es MAYOR (MAL) o igual al Apoyo financiero solicitado a la Secretaría de Cultura');
             // var obtsuma_A= document.formul.fin_suma;
             // obtsuma_A.value=suma_general;
                document.getElementById("apoyo_general_paso").style.borderColor="#D0021B";
                document.getElementById("total_apoyo_suma").style.borderColor="#D0021B";
                document.getElementById("fin_suma").style.borderColor="#D0021B";
                document.getElementById("rowError2").style.display = 'block';  
                $(window).scrollTop(300);
                $(window).scrollLeft(10);
            }
        //FIN DE suma de honorarios y pestañas
 	} else {
		//console.log('error en la captura');
		$(window).scrollTop(300);
		document.getElementById("rowError1").style.display = 'block';
		document.getElementById("rowBien1").style.display = 'none';
		cuenta_error_totales=1;
		}
	/// FIN TOTAL DE PESTAÑAS
}