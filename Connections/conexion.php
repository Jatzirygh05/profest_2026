<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
    // DB credentials.
	define('DB_HOST','10.11.255.14');
	define('DB_USER','jatziry');
	define('DB_PASS','jat0905');
	define('DB_NAME','profest_cultura');
	# conectare la base de datos
    $con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

    mysqli_set_charset($con, 'utf8');
