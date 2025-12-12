
// Declaro los selects que componen el documento HTML. Su atributo ID debe figurar aqui.
var listadoSelects3=new Array();
listadoSelects3[0]="ColoniaRepLeg";
listadoSelects3[1]="PostCodRepLeg";

var listadoSelects3_segundo=new Array();
listadoSelects3_segundo[0]="ColoniaEspCult";
listadoSelects3_segundo[1]="Codigo_postalEspCult";

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
	
function cargaContenido3(idselectOrigen3)
{
	if( idselectOrigen3 == "ColoniaRepLeg" ){
		// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
		var posicionselectDestino3=buscarEnArray(listadoSelects3, idselectOrigen3)+1;
		// Obtengo el select que el usuario modifico
		var selectOrigen3=document.getElementById(idselectOrigen3);
		// Obtengo la opcion que el usuario selecciono
		var opcionSeleccionada3=selectOrigen3.options[selectOrigen3.selectedIndex].value;
		// Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."
		if(opcionSeleccionada3==0)
		{
			var x=posicionselectDestino3, selectActual3=null;
			// Busco todos los selects siguientes al que inicio el evento onChange y les cambio el pc y deshabilito
			while(listadoSelects3[x])
			{
				selectActual3=document.getElementById(listadoSelects3[x]);
				selectActual3.length=0;
				
				var nuevaOpcion3=document.createElement("option"); nuevaOpcion3.value=0; 
				nuevaOpcion3.innerHTML="Selecciona";
				selectActual3.appendChild(nuevaOpcion3);	
				selectActual3.disabled=true;
				x++;
			}
		}
		// Compruebo que el select modificado no sea el ultimo de la cadena
		else if(idselectOrigen3!=listadoSelects3[listadoSelects3.length-1])
		{
			// Obtengo el elemento del select que debo cargar
			var idselectDestino3=listadoSelects3[posicionselectDestino3];
			var selectDestino3=document.getElementById(idselectDestino3);
		
			// Creo el nuevo objeto ajax3 y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
			var ajax3=prueba_cp();
			//console.log('ultimo para obtener CP');
		
			var cp_pasa = document.getElementById('PostCodRepLeg').value;
			var EstadoRepLeg_pasa = document.getElementById('EstadoRepLeg').value;
			var Municipio_AlcRepLeg_pasa = document.getElementById('Municipio_AlcRepLeg').value;
			
	ajax3.open("GET", "js/select_dependientes_proceso_cp.php?select3="+idselectDestino3+"&opcion3="+opcionSeleccionada3+"&opcionSeleccionada3="+opcionSeleccionada3+"&cp_pasa="+cp_pasa+"&EstadoRepLeg_pasa="+EstadoRepLeg_pasa+"&Municipio_AlcRepLeg_pasa="+Municipio_AlcRepLeg_pasa, true);
			ajax3.onreadystatechange=function() 
			{ 
				if (ajax3.readyState==1)
				{
					// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
					selectDestino3.length=0;
					var nuevaOpcion3=document.createElement("option"); 
					nuevaOpcion3.value=0; 
					nuevaOpcion3.innerHTML="Cargando...";
					selectDestino3.appendChild(nuevaOpcion3); 
					selectDestino3.disabled=true;	
				}
				if (ajax3.readyState==4)
				{
					selectDestino3.parentNode.innerHTML=ajax3.responseText;
					document.getElementById('EstadoRepLeg').readOnly = 'true';
					document.getElementById('Municipio_AlcRepLeg').readOnly = 'true';
					document.getElementById('ColoniaRepLeg').readOnly = 'true';
				} 
			}
			ajax3.send(null);
		}
	}//fin de if externo
	else{
		
		// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
		var posicionselectDestino3=buscarEnArray(listadoSelects3_segundo, idselectOrigen3)+1;
		// Obtengo el select que el usuario modifico
		var selectOrigen3=document.getElementById(idselectOrigen3);
		// Obtengo la opcion que el usuario selecciono
		var opcionSeleccionada3=selectOrigen3.options[selectOrigen3.selectedIndex].value;
		// Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."
		if(opcionSeleccionada3==0)
		{
			var x=posicionselectDestino3, selectActual3=null;
			// Busco todos los selects siguientes al que inicio el evento onChange y les cambio el pc y deshabilito
			while(listadoSelects3_segundo[x])
			{
				selectActual3=document.getElementById(listadoSelects3_segundo[x]);
				selectActual3.length=0;
				
				var nuevaOpcion3=document.createElement("option"); nuevaOpcion3.value=0; 
				nuevaOpcion3.innerHTML="Selecciona";
				selectActual3.appendChild(nuevaOpcion3);	
				selectActual3.disabled=true;
				x++;
			}
		}
		// Compruebo que el select modificado no sea el ultimo de la cadena
		else if(idselectOrigen3!=listadoSelects3_segundo[listadoSelects3_segundo.length-1])
		{
			// Obtengo el elemento del select que debo cargar
			var idselectDestino3=listadoSelects3_segundo[posicionselectDestino3];
			var selectDestino3=document.getElementById(idselectDestino3);
			
			// Creo el nuevo objeto ajax3 y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
			var ajax3=prueba();
		
			var cp_pasa = document.getElementById('Codigo_postalEspCult').value;
			var EstadoEspCult_pasa = document.getElementById('EstadoEspCult').value;
			var Municipio_AlcaldiaEspCult_pasa = document.getElementById('Municipio_AlcaldiaEspCult').value;
			
	ajax3.open("GET", "js/select_dependientes_proceso_cp.php?select3="+idselectDestino3+"&opcion3="+opcionSeleccionada3+"&opcionSeleccionada3="+opcionSeleccionada3+"&cp_pasa="+cp_pasa+"&EstadoEspCult_pasa="+EstadoEspCult_pasa+"&Municipio_AlcaldiaEspCult_pasa="+Municipio_AlcaldiaEspCult_pasa, true);

			ajax3.onreadystatechange=function() 
			{ 
				if (ajax3.readyState==1)
				{
					// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
					selectDestino3.length=0;
					var nuevaOpcion3=document.createElement("option"); 
					nuevaOpcion3.value=0; 
					nuevaOpcion3.innerHTML="Cargando...";
					selectDestino3.appendChild(nuevaOpcion3); 
					selectDestino3.disabled=true;	
				}
				if (ajax3.readyState==4)
				{
					selectDestino3.parentNode.innerHTML=ajax3.responseText;
					document.getElementById('EstadoEspCult').readOnly = 'true';
					document.getElementById('Municipio_AlcaldiaEspCult').readOnly = 'true';
					document.getElementById('ColoniaEspCult').readOnly = 'true';
				} 
			}
			ajax3.send(null);
		}
	}
}

function prueba_cp(){ 


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
