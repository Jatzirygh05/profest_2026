<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_automaa = "10.11.255.14";
$database_automaa = "profest_cultura";
$username_automaa = "jatziry";
$password_automaa = "jat0905";
$automaa = mysql_pconnect($hostname_automaa, $username_automaa, $password_automaa) or trigger_error(mysql_error(),E_USER_ERROR); 
?>