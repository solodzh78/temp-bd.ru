<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");

require_once './functions/functions.php';	

$id=$_POST['id'];
$gruppa=$_POST['gruppa'];

// выполняем операции с базой данных
$query = "SELECT * FROM $gruppa WHERE globalId = $id";
$card = getQuery ($query);
// Отправка билета в формате JSON
echo json_encode($card);
exit; // - обязательно	
?>