<html>
<head>
<title>Chat - Registro</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<center>
<?php
include("config.php");


if(isset ($_POST["usuario"],$_POST['password2'],$_POST['password'],$_POST['email'])){
$pass = mysql_real_escape_string($_POST['password']);
$pass2 = mysql_real_escape_string($_POST['password2']);
$user = mysql_real_escape_string($_POST['usuario']);
$email = mysql_real_escape_string($_POST['email']);
$pass = md5($pass);
$pass2 = md5($pass2);

if(!empty($_POST['password'])){
if(!empty($_POST['password2'])){
if(!empty($_POST['usuario'])){
if(!empty($_POST['email'])){

if ($pass == $pass2) { 
if (preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}',$email)){
$consulta="SELECT user FROM usuarios WHERE user='$user'";
$resultado=mysql_query($consulta);
if (mysql_num_rows($resultado)>0)
{
echo "Ese usuario ya exisite<br>";
} else {
$consulta="SELECT email FROM usuarios WHERE user='$email'";
$resultado=mysql_query($consulta);
if (mysql_num_rows($resultado)>0)
{
echo "El correo ya esta en uso<br>";
} else {
	mysql_query("INSERT INTO usuarios (user, pass, email) VALUES ('$user', '$pass', '$email')");
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
}

}
} else {
echo '<div id="error">Ese correo no es válido</div>';
}
} else {
echo '<div id="error">Las contraseñas no coinciden<br></div>';
}
}else {
echo '<div id="error">No dejes campos en blanco<br></div>';
}
}else {
echo '<div id="error">No dejes campos en blanco<br></div>';
}
}else {
echo '<div id="error">No dejes campos en blanco<br></div>';
}
}else {
echo '<div id="error">No dejes campos en blanco<br></div>';
}
}


?>
<div id="login">
<form action="" method="post">
<p>Usuario: </p><input type="text" name="usuario"><br>
<p>Contraseña: </p><input type="password" name="password"><br>
<p>Repetir contraseña: </p><input type="password" name="password2"><br>
<p>Correo: </p><input type="text" name="email"><br>
<input type="submit" value="Registrar">
</form>
</div>
</center>
</body>
</html>
