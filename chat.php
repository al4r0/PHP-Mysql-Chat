<html>
<?php
include("config.php");

if (($_SESSION['login']) != 0){
$user_id = $_SESSION['login'];
$sql="SELECT user FROM usuarios WHERE id='$user_id'";
$result=mysql_query($sql);
$result=mysql_fetch_array($result);
$result=htmlspecialchars($result['user']);
echo "Estas logeado como $result <a href='logout.php'>cerrar sesión</a>";
} else {
header("Location: index.php");
exit();
}

if (isset($_POST['texto'])){
if(!empty($_POST['texto'])){
$user_id = $_SESSION['login'];
$texto = mysql_real_escape_string($_POST['texto']);
mysql_query("INSERT INTO chats (id, id_usuario, texto) VALUES (NULL, '$user_id', '$texto')");
}
}
?>
<head>
<title>Chat</title>


<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({
'beforeSend' : function(xhr) {
xhr.overrideMimeType('text/html; charset=iso-8859-1');
}
});

function verChat() {
$('#chat').load('obtener_chat.php');
}
setInterval(function() {
     $('#chat').load('obtener_chat.php');
}, 3 * 1000);
</script>


<script language="javascript"> 

function iSubmitEnter(oEvento, oFormulario){ 
    var iAscii; 
     
    if (oEvento.keyCode) 
        iAscii = oEvento.keyCode; 
    else if (oEvento.which) 
        iAscii = oEvento.which; 
    else 
        return false; 
         
    if (iAscii == 13) oFormulario.submit(); 

    return true; 
} 

</script>

<style type="text/css">
#chat
{
    float: top;
    margin: 5px;
}
#chat textarea
{
    width:100%;
    height:85%;
    resize: none;
}
#enviar
{
    float: top;
    margin: 5px;
}
#enviar textarea
{
    float: left;
    width:80%;
    height:10%;
    resize: none;
}
#enviar input
{
    float: left;
    width:10%;
    height:10%;
}
</style>
</head>
<body onload="verChat()">
<center>
<div id="chat">

</div>
<div id="enviar">
<form action="" method="post" id="form1" name="form1">
<textarea name="texto" onkeypress="iSubmitEnter(event, document.form1)"></textarea>
<input type="submit" value="Enviar">
<input type="button" value="Recargar" onClick="window.location.href=window.location.href">
</form>
</div>
</center>
</body>
</html>