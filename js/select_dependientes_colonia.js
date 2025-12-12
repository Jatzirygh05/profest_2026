// Declaro los selects que componen el documento HTML. Su atributo ID debe figurar aqui.
var listadoSelects2=new Array();
listadoSelects2[0]="Municipio_AlcRepLeg";
listadoSelects2[1]="ColoniaRepLeg";

var listadoSelects2_segundo=new Array();
listadoSelects2_segundo[0]="Municipio_AlcaldiaEspCult";
listadoSelects2_segundo[1]="ColoniaEspCult";

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

function cargaContenido2(idselectOrigen2)
{
	if(idselectOrigen2 == "Municipio_AlcRepLeg"){
		// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
		var posicionselectDestino2=buscarEnArray(listadoSelects2, idselectOrigen2)+1;
		// Obtengo el select que el usuario modifico
		var selectOrigen2=document.getElementById(idselectOrigen2);
		// Obtengo la opcion que el usuario selecciono
		var opcionSeleccionada2=selectOrigen2.options[selectOrigen2.selectedIndex].value;
		// Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."
		if(opcionSeleccionada2==0)
		{
			var x=posicionselectDestino2, selectActual2=null;
			// Busco todos los selects siguientes al que inicio el evento onChange y les cambio el pc y deshabilito
			while(listadoSelects2[x])
			{
				selectActual2=document.getElementById(listadoSelects2[x]);
				selectActual2.length=0;
				
				var nuevaOpcion2=document.createElement("option"); nuevaOpcion2.value=0; 
				nuevaOpcion2.innerHTML="Selecciona";
				selectActual2.appendChild(nuevaOpcion2);	
				selectActual2.disabled=true;
				x++;
			}
		}
		// Compruebo que el select modificado no sea el ultimo de la cadena
		else if(idselectOrigen2!=listadoSelects2[listadoSelects2.length-1])
		{
			// Obtengo el elemento del select que debo cargar
			var idselectDestino2=listadoSelects2[posicionselectDestino2];
			var selectDestino2=document.getElementById(idselectDestino2);
			
			// Creo el nuevo objeto ajax2 y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
			var ajax2=prueba();
		
			var cp_pasa = document.getElementById('PostCodRepLeg').value;
			var EstadoRepLeg_pasa = document.getElementById('EstadoRepLeg').value;
		
	ajax2.open("GET", "js/select_dependientes_proceso_colonia.php?select2="+idselectDestino2+"&opcion2="+opcionSeleccionada2+"&opcionSeleccionada2="+opcionSeleccionada2+"&cp_pasa="+cp_pasa+"&EstadoRepLeg_pasa="+EstadoRepLeg_pasa, true);

			ajax2.onreadystatechange=function() 
			{ 
				if (ajax2.readyState==1)
				{
					// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
					selectDestino2.length=0;
					var nuevaOpcion2=document.createElement("option"); 
					nuevaOpcion2.value=0; 
					nuevaOpcion2.innerHTML="Cargando...";
					selectDestino2.appendChild(nuevaOpcion2); 
					selectDestino2.disabled=true;	
				}
				if (ajax2.readyState==4)
				{
					selectDestino2.parentNode.innerHTML=ajax2.responseText;
				} 
			}
			ajax2.send(null);
		}
	}//fin de if externo
	else{
		// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
		var posicionselectDestino2=buscarEnArray(listadoSelects2_segundo, idselectOrigen2)+1;
		// Obtengo el select que el usuario modifico
		var selectOrigen2=document.getElementById(idselectOrigen2);
		// Obtengo la opcion que el usuario selecciono
		var opcionSeleccionada2=selectOrigen2.options[selectOrigen2.selectedIndex].value;
		// Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."
		if(opcionSeleccionada2==0)
		{
			var x=posicionselectDestino2, selectActual2=null;
			// Busco todos los selects siguientes al que inicio el evento onChange y les cambio el pc y deshabilito
			while(listadoSelects2_segundo[x])
			{
				selectActual2=document.getElementById(listadoSelects2_segundo[x]);
				selectActual2.length=0;
				
				var nuevaOpcion2=document.createElement("option"); nuevaOpcion2.value=0; 
				nuevaOpcion2.innerHTML="Selecciona";
				selectActual2.appendChild(nuevaOpcion2);	
				selectActual2.disabled=true;
				x++;
			}
		}
		// Compruebo que el select modificado no sea el ultimo de la cadena
		else if(idselectOrigen2!=listadoSelects2_segundo[listadoSelects2_segundo.length-1])
		{
			// Obtengo el elemento del select que debo cargar
			var idselectDestino2=listadoSelects2_segundo[posicionselectDestino2];
			var selectDestino2=document.getElementById(idselectDestino2);
			
			// Creo el nuevo objeto ajax2 y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
			var ajax2=prueba();
			
			var cp_pasa = document.getElementById('Codigo_postalEspCult').value;
			var EstadoEspCult_pasa = document.getElementById('EstadoEspCult').value;
		
			/*console.log(cp_pasa);
			console.log(EstadoRepLeg_pasa);*/
		
	ajax2.open("GET", "js/select_dependientes_proceso_colonia.php?select2="+idselectDestino2+"&opcion2="+opcionSeleccionada2+"&opcionSeleccionada2="+opcionSeleccionada2+"&cp_pasa="+cp_pasa+"&EstadoEspCult_pasa="+EstadoEspCult_pasa, true);

			ajax2.onreadystatechange=function() 
			{ 
				if (ajax2.readyState==1)
				{
					// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
					selectDestino2.length=0;
					var nuevaOpcion2=document.createElement("option"); 
					nuevaOpcion2.value=0; 
					nuevaOpcion2.innerHTML="Cargando...";
					selectDestino2.appendChild(nuevaOpcion2); 
					selectDestino2.disabled=true;	
				}
				if (ajax2.readyState==4)
				{
					selectDestino2.parentNode.innerHTML=ajax2.responseText;
				} 
			}
			ajax2.send(null);
		}
	}
}

function prueba(){ 


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
