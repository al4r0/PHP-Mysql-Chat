<html>
<head>
<title>Chat - Login</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<center>

<?php
include("config.php");

if (($_SESSION['login']) != 0){
header("Location: chat.php");
} else {

}

if (isset($_POST['usuario'],$_POST['password'])){
$pass = mysql_real_escape_string($_POST['password']);
$user = mysql_real_escape_string($_POST['usuario']);
$pass = md5($pass);

$sql="SELECT * FROM usuarios WHERE user='$user' and pass='$pass'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

if($count==1)
{
$sql2="SELECT pass FROM usuarios WHERE user='$user'";
$result2=mysql_query($sql2);
$result2=mysql_fetch_array($result2);
$result2=$result2['pass'];
if($result2 == $pass){
$sql3="SELECT id FROM usuarios WHERE user='$user' and pass='$pass'";
$result3=mysql_query($sql3);
$result3=mysql_fetch_array($result3);
$usuarioid=$result3['id'];
$_SESSION['login'] = $usuarioid;
header("Location: chat.php");
exit();
}
}
else {
echo '<div id="error">Usuario y contraseña no coinciden</div>';
}
}

?>

<div id="login">

<form action="" method="post">
<p align="right">Usuario: </p><input type="text" name="usuario"><br><br>
<p align="right">Contraseña: </p><input type="password" name="password"><br><br>
<input type="submit" value="Entrar">
<input type="button" value="Registrarse" onClick="window.location.href='register.php'">

</div>

</center>
</body>
</html>
