<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");

require_once './functions/functions.php';	
$gruppa = $_POST['gruppa'];
// Получение массива всех id таблицы
$all_id = getQueryId (stripcslashes("SELECT id FROM $gruppa"));
// Получение массива из 10 уникальных id, выбранных случайным образом
$questions_id = getQuestions($all_id, 10);
// Преобразование массива в строку, состоящую из элементов массива, разделенных запятой 
$questions_id_to_string = implode(',',$questions_id);
// Формирование строки запроса
$query = "SELECT * FROM $gruppa WHERE id IN ($questions_id_to_string)";
// Выполнение запроса для получения билета
$card = getQuery ($query);
// Отправка билета в формате JSON
echo json_encode($card);

exit; // - обязательно	
?>