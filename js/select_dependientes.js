function nuevoAjax2()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
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

// Declaro los selects que componen el documento HTML. Su atributo ID debe figurar aqui.
var listadoSelects_primero=new Array();
listadoSelects_primero[0]="EstadoRepLeg";
listadoSelects_primero[1]="Municipio_AlcRepLeg";

var listadoSelects_segundo=new Array();
listadoSelects_segundo[0]="EstadoEspCult";
listadoSelects_segundo[1]="Municipio_AlcaldiaEspCult";

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

function cargaContenido(idSelectOrigen)
{
	if(idSelectOrigen == "EstadoRepLeg"){
			// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
			var posicionSelectDestino=buscarEnArray(listadoSelects_primero, idSelectOrigen)+1;
			// Obtengo el select que el usuario modifico
			var selectOrigen=document.getElementById(idSelectOrigen);
			// Obtengo la opcion que el usuario selecciono
			var opcionSeleccionada=selectOrigen.options[selectOrigen.selectedIndex].value;
			// Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."
			if(opcionSeleccionada==0)
			{
			var x=posicionSelectDestino, selectActual=null;
			// Busco todos los selects siguientes al que inicio el evento onChange y les cambio el pc y deshabilito
			while(listadoSelects_primero[x])
			{
				selectActual=document.getElementById(listadoSelects_primero[x]);
				selectActual.length=0;
			
				var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Selecciona Opci&oacute;n...";
				selectActual.appendChild(nuevaOpcion);	selectActual.disabled=true;
				x++;
			}
		}
		// Compruebo que el select modificado no sea el ultimo de la cadena
		else if(idSelectOrigen!=listadoSelects_primero[listadoSelects_primero.length-1])
		{
			// Obtengo el elemento del select que debo cargar
			var idSelectDestino=listadoSelects_primero[posicionSelectDestino];
			var selectDestino=document.getElementById(idSelectDestino);
			// Creo el nuevo objeto AJAX y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
			var ajax=nuevoAjax2();
	
			var cp_pasa = document.getElementById('PostCodRepLeg').value;
			
			//console.log(cp_pasa);
			
			ajax.open("GET", "js/select_dependientes_proceso.php?select="+idSelectDestino+"&opcion="+opcionSeleccionada+"&opcionSeleccionada="+opcionSeleccionada+"&cp_pasa="+cp_pasa+"&cp_pasa_dos="+cp_pasa_dos, true);
			ajax.onreadystatechange=function() 
			{ 
				if (ajax.readyState==1)
				{
					// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
					selectDestino.length=0;
					var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
					selectDestino.appendChild(nuevaOpcion); selectDestino.disabled=true;	
				}
				if (ajax.readyState==4)
				{
					selectDestino.parentNode.innerHTML=ajax.responseText;
				} 
			}
			ajax.send(null);
		}
	}//fin del if principal
	else{
		// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
		var posicionSelectDestino=buscarEnArray(listadoSelects_segundo, idSelectOrigen)+1;
		// Obtengo el select que el usuario modifico
		var selectOrigen=document.getElementById(idSelectOrigen);
		// Obtengo la opcion que el usuario selecciono
		var opcionSeleccionada=selectOrigen.options[selectOrigen.selectedIndex].value;
		// Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."
		if(opcionSeleccionada==0)
		{
			var x=posicionSelectDestino, selectActual=null;
			// Busco todos los selects siguientes al que inicio el evento onChange y les cambio el pc y deshabilito
			while(listadoSelects_segundo[x])
			{
				selectActual=document.getElementById(listadoSelects_segundo[x]);
				selectActual.length=0;
		
				var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Selecciona Opci&oacute;n...";
				selectActual.appendChild(nuevaOpcion);	selectActual.disabled=true;
				x++;
			}
		}
		// Compruebo que el select modificado no sea el ultimo de la cadena
		else if(idSelectOrigen!=listadoSelects_segundo[listadoSelects_segundo.length-1])
		{
			// Obtengo el elemento del select que debo cargar
			var idSelectDestino=listadoSelects_segundo[posicionSelectDestino];
			var selectDestino=document.getElementById(idSelectDestino);
			// Creo el nuevo objeto AJAX y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
			var ajax=nuevoAjax2();
			
		var cp_pasa_dos = document.getElementById('Codigo_postalEspCult').value;
		
		//console.log(cp_pasa_dos);	
				
			ajax.open("GET", "js/select_dependientes_proceso.php?select="+idSelectDestino+"&opcion="+opcionSeleccionada+"&opcionSeleccionada="+opcionSeleccionada+"&cp_pasa_dos="+cp_pasa_dos, true);
			ajax.onreadystatechange=function() 
			{ 
				if (ajax.readyState==1)f
				{
					// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
					selectDestino.length=0;
					var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
					selectDestino.appendChild(nuevaOpcion); selectDestino.disabled=true;	
				}
				if (ajax.readyState==4)
				{
					selectDestino.parentNode.innerHTML=ajax.responseText;
				} 
			}
			ajax.send(null);
		}
	}//fin del else
}

function guardarestado(idSelectOrigen)
{
	var http_request = false;
	var selectOrigen=document.getElementById(idSelectOrigen);
	var valor_estado_sel = selectOrigen.options[selectOrigen.selectedIndex].value;
		/*console.log('entro a la funcion guardar estado');
		console.log(idSelectOrigen);
		console.log(valor_estado_sel);*/
			var url_instancia='./receptor_informacion_instancia.php?variable='+idSelectOrigen+'&valor='+valor_estado_sel;
			hacerPeticion(url_instancia);		
}