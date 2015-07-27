<?php
$ip_sql = "IP_MYSQL";
$sql_user = "USUARIO";
$sql_pass = "CONTRASEÑA";
$sql_db = "NOMBRE_DB";


$conec = @mysql_connect($ip_sql, $sql_user, $sql_pass);
@mysql_select_db($sql_db, $conec);

session_start();
if(!isset($_SESSION)){
$_SESSION['login'] = 0;
}

?>