
// Declaro los selects que componen el documento HTML. Su atributo ID debe figurar aqui.
var listadoSelects4=new Array();
listadoSelects4[0]="PostCodRepLeg";
listadoSelects4[1]="EstadoRepLeg";

var listadoSelects4_dos=new Array();
listadoSelects4_dos[0]="Codigo_postalEspCult";
listadoSelects4_dos[1]="EstadoEspCult";

function buscarEnArray(array, dato)
{
	// Retorna el indice de la posicion donde se encuentra el elemento en el array o null si no se encuentra
	var x=0;
	while(array[x])
	{
		if(array[x]==dato) return x;
		x++;
	}
	return null;
}

function cargaContenido4(idselectOrigen4)
{
	if (idselectOrigen4=="PostCodRepLeg"){
		// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
		var posicionselectDestino4=buscarEnArray(listadoSelects4, idselectOrigen4)+1;//1
		
		//alert(posicionselectDestino4);
		// Obtengo el id del campo que el usuario modifico
		var campoOrigen4=document.getElementById(idselectOrigen4);//PostCodRepLeg
	
		// Obtengo el contenido el usuario escribio
		var opcionSeleccionada4=campoOrigen4.value;//El codigo postal escrito
	
		// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
		var indiceCampoOrigen4 = buscarEnArray(listadoSelects4, idselectOrigen4);
		
		// Obtengo el elemento del select que debo cargar
		var idselectDestino4=listadoSelects4[posicionselectDestino4];//EstadoRepLeg
		var selectDestino4=document.getElementById(idselectDestino4);//El campo de EstadoRepLeg
			
		// Creo el nuevo objeto ajax2 y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
		var ajax4=prueba_estado();
		
		if(opcionSeleccionada4!=""){
		 
			//console.log('con CP');
			
		} else {
			//console.log('SIN CP');
			
			
			document.getElementById('Municipio_AlcRepLeg').options.selectedIndex = 0;
			document.getElementById('ColoniaRepLeg').options.selectedIndex = 0;
			
			  /*var sel = document.getElementById("Municipio_AlcRepLeg");
  			  sel.remove(sel.selectedIndex);
			 	
		  	  var sel = document.getElementById("ColoniaRepLeg");
  			  sel.remove(sel.selectedIndex);*/
			}
		
	ajax4.open("GET", "js/select_dependientes_proceso_estado.php?select4="+idselectDestino4+"&opcion4="+opcionSeleccionada4+"&opcionSeleccionada4="+opcionSeleccionada4, true);
	
			ajax4.onreadystatechange=function() 
			{ 
				if (ajax4.readyState==1)
				{
					/*var activo = document.getElementById('Municipio_AlcRepLeg');
    				activo.innerHTML = "Selecciona";*/			
					// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
					selectDestino4.length=0;
					var nuevaOpcion4=document.createElement("option"); 
					nuevaOpcion4.value=0; 
					nuevaOpcion4.innerHTML="Cargando...";
					selectDestino4.appendChild(nuevaOpcion4); 
					selectDestino4.disabled=true;	
				}
				if (ajax4.readyState==4)
				{
					selectDestino4.parentNode.innerHTML=ajax4.responseText;
				} 
			}
			ajax4.send(null);
	}//fin de if externo
	else{
		// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
		var posicionselectDestino4=buscarEnArray(listadoSelects4_dos, idselectOrigen4)+1;//1
		
		//alert(posicionselectDestino4);
		// Obtengo el id del campo que el usuario modifico
		var campoOrigen4=document.getElementById(idselectOrigen4);//PostCodRepLeg
	
		// Obtengo el contenido el usuario escribio
		var opcionSeleccionada4=campoOrigen4.value;//El codigo postal escrito
	
		// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
		var indiceCampoOrigen4 = buscarEnArray(listadoSelects4_dos, idselectOrigen4);
		
		// Obtengo el elemento del select que debo cargar
		var idselectDestino4=listadoSelects4_dos[posicionselectDestino4];//EstadoRepLeg
		var selectDestino4=document.getElementById(idselectDestino4);//El campo de EstadoRepLeg
		
		// Creo el nuevo objeto ajax2 y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
		var ajax4=prueba_estado();
		
		if(opcionSeleccionada4!=""){
		 
			//console.log('con CP2');
			document.getElementById('Municipio_AlcaldiaEspCult').options.selectedIndex = 0;
			document.getElementById('ColoniaEspCult').options.selectedIndex = 0;
			
		} else {
			//console.log('SIN CP2');
			  
			document.getElementById('Municipio_AlcaldiaEspCult').options.selectedIndex = 0;
			document.getElementById('ColoniaEspCult').options.selectedIndex = 0;
			
			}
					
ajax4.open("GET", "js/select_dependientes_proceso_estado.php?select4="+idselectDestino4+"&opcion4="+opcionSeleccionada4+"&opcionSeleccionada4="+opcionSeleccionada4, true);

			ajax4.onreadystatechange=function() 
			{ 
				if (ajax4.readyState==1)
				{
					// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
					selectDestino4.length=0;
					var nuevaOpcion4=document.createElement("option"); 
					nuevaOpcion4.value=0; 
					nuevaOpcion4.innerHTML="Cargando...";
					selectDestino4.appendChild(nuevaOpcion4); 
					selectDestino4.disabled=true;	
				}
				if (ajax4.readyState==4)
				{
					selectDestino4.parentNode.innerHTML=ajax4.responseText;
				} 
			}
			ajax4.send(null);
	}
}

function prueba_estado(){ 


	//Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	//lo que se puede copiar tal como esta aqui 
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}
