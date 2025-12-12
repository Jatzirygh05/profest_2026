//INICIO Función de los campos guardados en la tabla
  function obtenmontomodb(h, cosa){
        var monto_total_op = 0;
        var costov=eval('document.formul.costo_unitario_imp_incluidosb__'+h+'__'+cosa+'.value');
        var unidadv=eval('document.formul.unidadb__'+h+'__'+cosa+'.value');

       // var total_proyecto=eval('document.formul.total_proyecto.value');
       // var suma_pestanas_var=eval('document.formul.suma_pestanas_var.value');   
              if(unidadv.length==0 || costov.lenght==0){
               // console.log('entro 1')
                monto_v = eval('document.formul.monto_totb__'+h);
                monto_v.value = '';         
              } else {
                var monto_total_op = parseFloat(unidadv) * parseFloat(costov);
               
                var monto_total_renglon = eval('document.formul.monto_totb__'+h);
                    monto_total_renglon.value = monto_total_op.toFixed(2);
              }
      } 
  //FIN Función de los campos guardados en la tabla

  //INICIO Función de los campos nuevos de la tabla
     function obtenmontob(id, consecutivo){
       
        /*var unidadv=eval('document.formul.unidad__'+id+'.value');
        var costov=eval('document.formul.costo_unitario_imp_incluidos__'+id+'.value');*/
        var unidadv= document.getElementById('unidadb__'+id).value;
        var costov= document.getElementById('costo_unitario_imp_incluidosb__'+id).value;

        /*console.log(`unidadv:${unidadv}`);
        console.log(`costov:${costov}`);*/

               if(unidadv.length==0 || costov.lenght==0){
               //console.log(`VACIS:`);
                var monto_v = eval('document.formul.monto_totb__'+consecutivo);
                monto_v.value = ''; 
                return;
              } else { 
                var monto_total_op = parseFloat(unidadv) * parseFloat(costov);
                //console.log(`NULTIPLICA: ${monto_total_op}`);

                if(isNaN(monto_total_op)){
                 //console.log(`UNO DE LOS DOS VALORES FALTAN:`); 
                   } else {
                     //console.log(`LLENO:`);
                      var monto_total_renglon = eval('document.formul.monto_totb__'+consecutivo);
                       monto_total_renglon.value = monto_total_op.toFixed(2);
                  }  
              }

      } 
      function suma_verticalb(id){
        var sumaT=0;
        var cuantos = 50
        
        for(var i=1;i<=cuantos;i++){
         
          var campov=eval ('document.formul.monto_totb__'+i+'.value');

           if(campov.length==0){ 
                var calcula_total = 0 
            } else { 
                var calcula_total = parseFloat(campov.replace(/[$,\s]/g, ''));
                sumaT=sumaT+calcula_total;
            } 
        }
              var obtsuma= document.formul.total_espb;
                  obtsuma.value=sumaT.toFixed(2);

             /* var suma_pestanas_imp=document.formul.suma_pestanas;
                  suma_pestanas_imp.value = sumaT;

              var suma_pestanas_valor=document.formul.suma_pestanas.value;
              var sumhono1=document.formul.sumhono.value;
              var apoyo_fin_sol_sc=document.formul.apoyo_fin_sol_sc.value;

              var  sumando_1er_2da_montos = parseFloat(suma_pestanas_valor) + parseFloat(sumhono1);

              document.formul.total_2.value=sumando_1er_2da_montos.toFixed(2);

              if(sumando_1er_2da_montos<=apoyo_fin_sol_sc){ 
                //console.log('SI ES CORRECTO EL MONTO');
                //document.getElementById("suma_pestanas").style.borderColor="";
                document.getElementById("sumhono").style.borderColor="";
                document.getElementById("total_2").style.borderColor="";
                document.getElementById("errmayormontoSC").style.display = 'none';

              } else { 
                //console.log('ES ALTO EL MONTO');
                //document.getElementById("suma_pestanas").style.borderColor="#D0021B";
                document.getElementById("sumhono").style.borderColor="#D0021B";
                document.getElementById("total_2").style.borderColor="#D0021B";
                document.getElementById("errmayormontoSC").style.display = 'block';                
              } 
            */
      }
  //FIN Función de los campos nuevos de la tabla