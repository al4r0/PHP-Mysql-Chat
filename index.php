<html>
<head>
<title>Chat - Login</title>
</head>
<body>
<center>

<?php
include("config.php");

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
echo "Usuario y contraseña no coinciden";
}
}

?>

<form action="" method="post">
Usuario: <input type="text" name="usuario">
Contraseña: <input type="password" name="password"><br><br>
<input type="submit" value="Enviar">
<input type="button" value="Registrar" onClick="window.location.href='register.php'">

</center>
</body>
</html>