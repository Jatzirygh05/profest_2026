<?PHP
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
//$row = 1;
$adata=[];

if (($handle = fopen("test.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	$adata[]=$data;
    }
    fclose($handle);
}


?>
<html>
<head>

<script>

	var variablesc=<?=json_encode($adata,JSON_NUMERIC_CHECK)?>;

	
	


</script>

</head>
<body>

<input type="text" name="xxx" id="xxx" class="mmmmm">
<br>
<input type="text" name="wwww123" id="wwww123" class="mmmmm">


<script>

	function pierdefoco(objeto){

		var sid=objeto.id
		//console.log(sid)
		
		variablesc.forEach(x => {
			//console.log(x[0])
			if(x[0]==sid){
			//console.log("vamos a checar condiciones para: "+sid)
				if(x[1]=='numeric'){
					var regreso= checaNumero(objeto.value,x[2],x[3]);
					if(!regreso){
						console.log("Error ....")
					} 
				}
				if(x[1] == 'text'){
					var regreso = checaTexto(objeto.value,x[2],x[3]);
					if(!regreso){
						console.log("Errot texto ...")
					}
				}	
			

			}
		})

	}


	function checaNumero(valor,cond,obliga){		
		if(obliga==1 && valor.trim().lenght==0)return false;
		var vaux = parseFloat(valor)		
		if(vaux<0)return false

		return true;
	}


	function checaTexto(valor,cond,obliga){                
                if(obliga==1 && valor.trim().lenght==0)return false;
		return true
	}



	var objachecar = document.querySelectorAll(".mmmmm")
	
	objachecar.forEach(obje =>
                obje.addEventListener('blur', function (event) {
                  //      console.log("perdio el foco "+obje.name)
			pierdefoco(obje)
                })
        )

</script>
</body>
</html>
