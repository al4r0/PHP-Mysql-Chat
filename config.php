<?php
$ip_sql = "Host";
$sql_user = "Usuario";
$sql_pass = "Contraseña";
$sql_db = "Nombre_DB";


$conec = @mysql_connect($ip_sql, $sql_user, $sql_pass);
@mysql_select_db($sql_db, $conec);

session_start();
if(!isset($_SESSION)){
$_SESSION['login'] = 0;
}

?>
