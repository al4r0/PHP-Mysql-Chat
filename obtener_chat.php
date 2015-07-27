<textarea name="chat" readonly>
<?php
include("config.php");
if (($_SESSION['login']) != 0){
} else {
header("Location: index.php");
exit();
}


$sql="SELECT id,id_usuario,texto FROM chats ORDER BY id DESC LIMIT 200";
$result=mysql_query($sql);
$rows = array();
while($r = mysql_fetch_assoc($result)) {
    $rows[$r['id']] = $r['id'];
	$rows[$r['id_usuario']] = $r['id_usuario'];
	$rows[$r['texto']] = $r['texto'];
	
	$id_u =$r['id_usuario'];
	$sql2="SELECT user FROM usuarios WHERE id='$id_u'";
	$result2=mysql_query($sql2);
	$result2=mysql_fetch_array($result2);
	$result2=$result2['user'];
    echo htmlspecialchars($result2.': '.$r['texto']);
	echo "\n";
}

?>
</textarea>