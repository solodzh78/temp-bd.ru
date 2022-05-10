<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");

require_once './functions/functions.php';

// Вводим переменные из массива $_POST
$id=$_POST['id'];
$globalId=$_POST['globalId'];
$question=$_POST['question'];
$glava=$_POST['glava'];
$gruppa=$_POST['gruppa'];
$correctAnswer=$_POST['correctAnswer'];
$answers=$_POST['answers'];

// Заменяем символы ';\n' на ';XXXXX'
// $ENTER = ';\n';
// $ENTER_REPLACEMENT = ';XXXXX';
// $answers = str_replace($ENTER, $ENTER_REPLACEMENT, $answers);
$answers = addslashes($answers);

// выполняем операции с базой данных
// Формирование строки запроса
$query = "INSERT INTO ".$gruppa."(
        id, 
        globalId, 
        question, 
        answers,
        pravila, 
        correctAnswer, 
        glava
    ) 
    VALUES(
        '$id', 
        '$globalId', 
        '$question', 
        '$answers',
        '$pravila', 
        '$correctAnswer', 
        '$glava'
    )";

load_data_to_SQL ($query);
exit; // - обязательно	
?>