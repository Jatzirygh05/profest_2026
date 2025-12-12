 $( function() {
		    $("#tipo_lugar_a").change( function() {
		        switch ($(this).val()) {
					case "1":
						$("#Nombreforo_a").prop("disabled", false);
		        		$("#Descripcionlug_a").prop("disabled", false);
						$("#cpforo_a").prop("disabled", false);
			        	$("#estadoforo_a").prop("disabled", false);
			        	$("#mun_alcforo_a").prop("disabled", false);
			        	$("#coloniaforo_a").prop("disabled", false);
			        	$("#calleforo_a").prop("disabled", false);
			        	$("#no_extforo_a").prop("disabled", false);
			        	$("#no_intforo_a").prop("disabled", false);

		        	break;
		        	case "2":
		        	$("#Nombreforo_a").prop("disabled", false);
		        	$("#Descripcionlug_a").prop("disabled", false);
		        	$("#cpforo_a").prop("disabled", true);
		        	$("#estadoforo_a").prop("disabled", true);
		        	$("#mun_alcforo_a").prop("disabled", true);
		        	$("#coloniaforo_a").prop("disabled", true);
		        	$("#calleforo_a").prop("disabled", true);
		        	$("#no_extforo_a").prop("disabled", true);
		        	$("#no_intforo_a").prop("disabled", true);
		        	
		        	document.getElementById('cpforo_a').value ='';
		        	document.getElementById('estadoforo_a').value ='';
		        	document.getElementById('mun_alcforo_a').value ='';
		        	document.getElementById('coloniaforo_a').value ='';
		        	document.getElementById('calleforo_a').value ='';
		        	document.getElementById('no_extforo_a').value ='';
		        	document.getElementById('no_intforo_a').value ='';
		        	break;
		        	case '':
		        	document.getElementById('Nombreforo_a').value ='';
		        	document.getElementById('Descripcionlug_a').value ='';
		        	document.getElementById('cpforo_a').value ='';
		        	document.getElementById('estadoforo_a').value ='';
		        	document.getElementById('mun_alcforo_a').value ='';
		        	document.getElementById('coloniaforo_a').value ='';
		        	document.getElementById('calleforo_a').value ='';
		        	document.getElementById('no_extforo_a').value ='';
		        	document.getElementById('no_intforo_a').value ='';

		        	$("#Nombreforo_a").prop("disabled", true);
		        	$("#Descripcionlug_a").prop("disabled", true);
		        	$("#cpforo_a").prop("disabled", true);
		        	$("#estadoforo_a").prop("disabled", true);
		        	$("#mun_alcforo_a").prop("disabled", true);
		        	$("#coloniaforo_a").prop("disabled", true);
		        	$("#calleforo_a").prop("disabled", true);
		        	$("#no_extforo_a").prop("disabled", true);
		        	$("#no_intforo_a").prop("disabled", true);

		        	break;
		        }
		    });
		    $("#tipo_lugar_b").change( function() {
		         switch ($(this).val()) {
					case "1":
		        	$("#Nombreforo_b").prop("disabled", false);
		        	$("#Descripcionlug_b").prop("disabled", false);
		        	$("#cpforo_b").prop("disabled", false);
		        	$("#estadoforo_b").prop("disabled", false);
		        	$("#mun_alcforo_b").prop("disabled", false);
		        	$("#coloniaforo_b").prop("disabled", false);
		        	$("#calleforo_b").prop("disabled", false);
		        	$("#no_extforo_b").prop("disabled", false);
		        	$("#no_intforo_b").prop("disabled", false);
		        	/*$("#Linklug_b").prop("disabled", true);
		        	document.getElementById('Linklug_b').value ='';*/
		       break;
		       case "2":
		        	$("#Nombreforo_b").prop("disabled", false);
		        	$("#Descripcionlug_b").prop("disabled", false);
		        	$("#cpforo_b").prop("disabled", true);
		        	$("#estadoforo_b").prop("disabled", true);
		        	$("#mun_alcforo_b").prop("disabled", true);
		        	$("#coloniaforo_b").prop("disabled", true);
		        	$("#calleforo_b").prop("disabled", true);
		        	$("#no_extforo_b").prop("disabled", true);
		        	$("#no_intforo_b").prop("disabled", true);
		        	//$("#Linklug_b").prop("disabled", false);

		        	document.getElementById('cpforo_b').value ='';
		        	document.getElementById('estadoforo_b').value ='';
		        	document.getElementById('mun_alcforo_b').value ='';
		        	document.getElementById('coloniaforo_b').value ='';
		        	document.getElementById('calleforo_b').value ='';
		        	document.getElementById('no_extforo_b').value ='';
		        	document.getElementById('no_intforo_b').value  ='';
		        	break;
		        case '':
		        	$("#Nombreforo_b").prop("disabled", true);
		        	$("#Descripcionlug_b").prop("disabled", true);
		        	$("#cpforo_b").prop("disabled", true);
		        	$("#estadoforo_b").prop("disabled", true);
		        	$("#mun_alcforo_b").prop("disabled", true);
		        	$("#coloniaforo_b").prop("disabled", true);
		        	$("#calleforo_b").prop("disabled", true);
		        	$("#no_extforo_b").prop("disabled", true);
		        	$("#no_intforo_b").prop("disabled", true);
		        	//$("#Linklug_b").prop("disabled", false);

		        	document.getElementById('Nombreforo_b').value ='';
		        	document.getElementById('Descripcionlug_b').value ='';
		        	document.getElementById('cpforo_b').value ='';
		        	document.getElementById('estadoforo_b').value ='';
		        	document.getElementById('mun_alcforo_b').value ='';
		        	document.getElementById('coloniaforo_b').value ='';
		        	document.getElementById('calleforo_b').value ='';
		        	document.getElementById('no_extforo_b').value ='';
		        	document.getElementById('no_intforo_b').value  ='';
		        break;		        
		        }
		    });
		     $("#tipo_lugar_c").change( function() {
		          switch ($(this).val()) {
					case "1":
					$("#Nombreforo_c").prop("disabled", false);
		        	$("#Descripcionlug_c").prop("disabled", false);
		        	$("#cpforo_c").prop("disabled", false);
		        	$("#estadoforo_c").prop("disabled", false);
		        	$("#mun_alcforo_c").prop("disabled", false);
		        	$("#coloniaforo_c").prop("disabled", false);
		        	$("#calleforo_c").prop("disabled", false);
		        	$("#no_extforo_c").prop("disabled", false);
		        	$("#no_intforo_c").prop("disabled", false);
		        	/*$("#Linklug_c").prop("disabled", true);
		        	document.getElementById('Linklug_c').value ='';*/
 				break;
		       case "2":
		        	$("#Nombreforo_c").prop("disabled", false);
		        	$("#Descripcionlug_c").prop("disabled", false);
		        	$("#cpforo_c").prop("disabled", true);
		        	$("#estadoforo_c").prop("disabled", true);
		        	$("#mun_alcforo_c").prop("disabled", true);
		        	$("#coloniaforo_c").prop("disabled", true);
		        	$("#calleforo_c").prop("disabled", true);
		        	$("#no_extforo_c").prop("disabled", true);
		        	$("#no_intforo_c").prop("disabled", true);
		        	//$("#Linklug_b").prop("disabled", false);

		        	document.getElementById('cpforo_c').value ='';
		        	document.getElementById('estadoforo_c').value ='';
		        	document.getElementById('mun_alcforo_c').value ='';
		        	document.getElementById('coloniaforo_c').value ='';
		        	document.getElementById('calleforo_c').value ='';
		        	document.getElementById('no_extforo_c').value ='';
		        	document.getElementById('no_intforo_c').value =''; 
		        	break;
		        case '':
		        	$("#Nombreforo_c").prop("disabled", true);
		        	$("#Descripcionlug_c").prop("disabled", true);
		        	$("#cpforo_c").prop("disabled", true);
		        	$("#estadoforo_c").prop("disabled", true);
		        	$("#mun_alcforo_c").prop("disabled", true);
		        	$("#coloniaforo_c").prop("disabled", true);
		        	$("#calleforo_c").prop("disabled", true);
		        	$("#no_extforo_c").prop("disabled", true);
		        	$("#no_intforo_c").prop("disabled", true);
		        	//$("#Linklug_b").prop("disabled", false);

		        	document.getElementById('Nombreforo_c').value ='';
		        	document.getElementById('Descripcionlug_c').value ='';
		        	document.getElementById('cpforo_c').value ='';
		        	document.getElementById('estadoforo_c').value ='';
		        	document.getElementById('mun_alcforo_c').value ='';
		        	document.getElementById('coloniaforo_c').value ='';
		        	document.getElementById('calleforo_c').value ='';
		        	document.getElementById('no_extforo_c').value ='';
		        	document.getElementById('no_intforo_c').value  ='';
		        break;		        
		        }
		    });

			$("#tipo_lugar").change( function() {
		        if ($(this).val() === "1") {
		        	$("#cpforo").prop("disabled", false);
		        	$("#estadoforo").prop("disabled", false);
		        	$("#mun_alcforo").prop("disabled", false);
		        	$("#coloniaforo").prop("disabled", false);
		        	$("#calleforo").prop("disabled", false);
		        	$("#no_extforo").prop("disabled", false);
		        	$("#no_intforo").prop("disabled", false);

		        } else {
		        	$("#cpforo").prop("disabled", true);
		        	$("#estadoforo").prop("disabled", true);
		        	$("#mun_alcforo").prop("disabled", true);
		        	$("#coloniaforo").prop("disabled", true);
		        	$("#calleforo").prop("disabled", true);
		        	$("#no_extforo").prop("disabled", true);
		        	$("#no_intforo").prop("disabled", true);

		        	document.getElementById('cpforo').value ='';
		        	document.getElementById('estadoforo').value ='';
		        	document.getElementById('mun_alcforo').value ='';
		        	document.getElementById('coloniaforo').value ='';
		        	document.getElementById('calleforo').value ='';
		        	document.getElementById('no_extforo').value ='';
		        	document.getElementById('no_intforo').value ='';
		        }
		    });
		});