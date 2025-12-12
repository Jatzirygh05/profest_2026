//INICIO Función de los campos guardados en la tabla
  function obtenmontomode(h, cosa){
        var monto_total_op = 0;
        var costov=eval('document.formul.costo_unitario_imp_incluidosf__'+h+'__'+cosa+'.value');
        var unidadv=eval('document.formul.unidadf__'+h+'__'+cosa+'.value');

       // var total_proyecto=eval('document.formul.total_proyecto.value');
       // var suma_pestanas_var=eval('document.formul.suma_pestanas_var.value');   
              if(unidadv.length==0 || costov.lenght==0){
                console.log('entro 1')
                monto_v = eval('document.formul.monto_totf__'+h);
                monto_v.value = '';         
              } else {
                var monto_total_op = parseFloat(unidadv) * parseFloat(costov);
               
                var monto_total_renglon = eval('document.formul.monto_totf__'+h);
                    monto_total_renglon.value = monto_total_op.toFixed(2);
              }
      } 
  //FIN Función de los campos guardados en la tabla

  //INICIO Función de los campos nuevos de la tabla
     function obtenmontoe(id, consecutivo){
       // console.log('entro obtenmonto');
        var unidadv=eval('document.formul.unidadf__'+id+'.value');
        var costov=eval('document.formul.costo_unitario_imp_incluidosf__'+id+'.value');

       /*var unidadv= document.getElementById('unidad__'+id).value;
        var costov= document.getElementById('costo_unitario_imp_incluidos__'+id).value;*/

     //// console.log(`unidadv:${unidadv}`);
              if(unidadv.length==0 || costov.lenght==0){
               //console.log(`VACIS:`);
                var monto_v = eval('document.formul.monto_totf__'+consecutivo);
                monto_v.value = ''; 
                return;
              } else { 
                var monto_total_op = parseFloat(unidadv) * parseFloat(costov);
                //console.log(`NULTIPLICA: ${monto_total_op}`);

              if(isNaN(monto_total_op)){
                 //console.log(`UNO DE LOS DOS VALORES FALTAN:`); 
                   } else {
                     //console.log(`LLENO:`);
                      var monto_total_renglon = eval('document.formul.monto_totf__'+consecutivo);
                       monto_total_renglon.value = monto_total_op.toFixed(2);
                  }  
               }    

      } 
      function suma_verticale(id){
        var sumaT=0;
        var cuantos = 50
        
        for(var i=1;i<=cuantos;i++){
         
          var campov=eval('document.formul.monto_totf__'+i+'.value');

          if(campov.length==0){ 
                var calcula_total = 0 
            } else { 
                var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
                sumaT=sumaT+calcula_total;
            } 
        }
              var obtsuma= document.formul.total_espe;
                  obtsuma.value=sumaT.toFixed(2);
      }
  //FIN Función de los campos nuevos de la tabla
