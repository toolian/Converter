<?php
require_once 'courses.php';
require_once 'DataBase.php';

function gerKurs()
    {	
$input = isset($_GET['input'])? $_GET['input']:"Ошибка";
 	
$currency = isset($_GET['kurs'])? $_GET['kurs']:"Ошибка";
 
$currency2 = isset($_GET['kurs2'])? $_GET['kurs2']:"Ошибка"; 
	
$db =  new DataBase();
$courses = $db->Select();
	
$result = $courses[$currency] * $input/ $courses[$currency2];
if(empty($result)){
    echo "Введи значение";
	}else{
	return $result;	
	}
}
	
$result = gerKurs();
$result = empty($result)? "Ошибка":header("Location: index.php?result=$result");


?>
