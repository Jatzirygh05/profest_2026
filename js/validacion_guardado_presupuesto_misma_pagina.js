function validaForm(Infor_finan_costo_monto){

var Infor_finan_costo_monto = Infor_finan_costo_monto
var m1_fuente = Infor_finan_costo_monto
var m1_fuente2 = document.getElementById('Infor_finan_costo_monto').value
//20122024 var Infor_finan_apoyo_monto = Infor_finan_apoyo_monto
var m2_fuente = Infor_finan_apoyo_monto 
//20122024 var m3_fuente = document.getElementById('Infor_finan_apoyo_monto').value


var categoria = document.getElementById("info_financiera_categoria").value;
switch (categoria){
    case 'A':
    var Infor_finan_apoyo_monto=300000; 
    var m3_fuente=300000;                               
    break;
    case 'B':
    var Infor_finan_apoyo_monto=500000;
    var m3_fuente=500000;
    break;
    case 'C':
    var Infor_finan_apoyo_monto=1000000;
    var m3_fuente=1000000;
    break;
    case 'D': 
    var Infor_finan_apoyo_monto=1500000;
    var m3_fuente=1500000;
    break;
    case 'E': 
    var Infor_finan_apoyo_monto=2000000;
    var m3_fuente=2000000;
    break;
  }

//console.log('ENTRO');

var cuenta_error=0;
var cuenta_error_fin=0;
var cuenta_error_falta_infor = 0
var cuenta_error_profest = 0;
var sumaT=0;        

for(var p=1; p<=50; p++){

    var errConcepto_gasto = document.getElementById('Concepto_gasto'+p).value;
    var errFuente_finan = document.getElementById('Fuente_finan'+p).value;
    var errMonto_unidad = document.getElementById('Monto_unidad'+p).value;
    //2025 ya no se va a usar var errPorcentaje = document.getElementById('Porcentaje'+p).value;
    

    if(errConcepto_gasto!='' && errFuente_finan!='' && errMonto_unidad!=''){
                var fuente_finan_nombre = 'Fuente_finan'+p;
                var fuente_finan = document.getElementById(fuente_finan_nombre).value;
                var Monto_unidad_nombre = 'Monto_unidad'+p;
                var calcula_monto_profest_sin = document.getElementById(Monto_unidad_nombre).value;
                if(calcula_monto_profest_sin.length==0 ){ 
                    calcula_monto_profest = 0 
                } else { 
                    calcula_monto_profest = parseFloat(calcula_monto_profest_sin.replace(/[$,\s]/g, ''));
                }
                /*2025 se quita valida PROFEST porque sera el monto de coinversion el que se debe obtener
                if(fuente_finan == "3"){
                    
                sumaT=sumaT+calcula_monto_profest;
                
                }  */      
    } //fin if
    else if(errConcepto_gasto!='' || errFuente_finan!='' || errMonto_unidad!='') {
        alert ('Verifica tu captura ya que no tiene la información necesaria');
        document.getElementById("rowErrora").style.display = 'block';
        //cuenta_error_falta_infor=1;
         return false;
        }   
} //fin for

/*2025 se quita valida PROFEST porque sera el monto de coinversion el que se debe obtener
if(sumaT!=m3_fuente){
        //console.log("entro aqui")
        alert ("Verifica los montos ingresados para la fuente de financiamiento Institucional PROFEST");
        document.getElementById("rowErrora").style.display = 'block';
        //cuenta_error_profest=1;
         return false;
    }*/

var cuenta_error_fin=0;

for(var i=1; i<=3; i++){
    
    var errConcepto_gasto = document.getElementById('Concepto_gasto'+i).value;
    var errFuente_finan = document.getElementById('Fuente_finan'+i).value;
    var errMonto_unidad = document.getElementById('Monto_unidad'+i).value;
    //2025 ya no se va a usar  var errPorcentaje = document.getElementById('Porcentaje'+i).value;
    
    if(errConcepto_gasto=='' || errFuente_finan=='' || errMonto_unidad==''){
       // cuenta_error_fin = 1
        return false;
    }
}
//FIN PRESUPUESTO se valido que los campos sean correctos

//INICIO PRESUPUESTO VALIDAR porcentaje total
var pres_anual_tot_2010 = document.getElementById('pres_anual_tot_2010').value;
//var ene_suma = document.getElementById('textod').value;   
//console.log(" pres_anual_tot_2010: " + pres_anual_tot_2010 + "\n");
var monto_coinversion2 = document.getElementById('monto_coinversion2').value;
//console.log(" monto_coinversion2: " + monto_coinversion2 + "\n");
//console.log(" ene_suma: " + ene_suma + "\n");
//2025 ya no se usara ----> console.log(" m1_fuente2: " + m1_fuente2 + "\n");
//2025 ya no se usara ----> Math.round(ene_suma)==100  &&
    if(pres_anual_tot_2010 == monto_coinversion2 ){
        //console.log('ya son el 100%');
        //cuenta_error=0;
         document.getElementById("rowErrora").style.display = 'none';
         return true; 
    } else {
    //console.log('aun no son 100%');
        alert ('Verifica los montos');
        document.getElementById("rowErrora").style.display = 'block';
        //cuenta_error=1;
         return false;
        }  //console.log('todo es correcto3');   
         return true;
}
/*if(cuenta_error == 0 && cuenta_error_fin == 0 && cuenta_error_falta_infor==0 && cuenta_error_profest==0){   
        //console.log('SI se puede guardar');
        //window.document.apInf.submit();
        // Si todo está correcto
        console.log('todo esta completo');
    } else {
        console.log('error en la captura');
        //document.getElementById("rowError").style.display = 'block';
         //return false; // Si todo está correcto

        }*/
    $(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonenviar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        if(validaForm(Infor_finan_costo_monto)){//20122024  , Infor_finan_apoyo_monto Primero validará el formulario.
            console.log('ya podemos tomar los datos');
            //console.log($("#formdata").serialize());
            //enviar_ejemplopresupuesto.php probe antes con esta pagina

            /* var url_zcat='enviar_ejemplopresupuesto.php?'+$("#apInf").serialize();
                
                 hacerPeticion(url_zcat);*/
          
            $.post("enviar_ejemplopresupuesto.php",$("#apInf").serialize(),function(res_paso){
               // $("#formulario").fadeOut("slow");   // Hacemos desaparecer el div "formulario" con un efecto fadeOut lento.
               //alert(res_paso);
               if(res_paso == 1){
                    //console.log('si entro');
                    alert('Información guardada');
                    //$("#exito").delay(500).fadeIn("slow");      
                    // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
                } else {
                    //console.log('no entro');
                    alert('Verfica la información ingresada');
                    //$("#fracaso").delay(500).fadeIn("slow");    }
                    // Si no, lo mismo, pero haremos aparecer el div "fracaso"
                }
            });
     

        }
    });    
});