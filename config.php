<?php
$ip_sql = "127.0.0.1";
$sql_user = "root";
$sql_pass = "alvaro1";
$sql_db = "chat";


$conec = @mysql_connect($ip_sql, $sql_user, $sql_pass);
@mysql_select_db($sql_db, $conec);

session_start();
if(!isset($_SESSION)){
$_SESSION['login'] = 0;
}

?>
