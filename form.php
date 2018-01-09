<?php
//require_once 'courses.php';
require_once 'ModulCurrency.php';
$input = isset($_GET['input'])? $_GET['input']:"Ошибка";
 	
$currency = isset($_GET['kurs'])? $_GET['kurs']:"Ошибка";
 
$currency2 = isset($_GET['kurs2'])? $_GET['kurs2']:"Ошибка";

    function gerKurs($input, $currency, $currency2){
	    $db =  new ModulCurrency();
        $courses = $db->getAll('value');	
        $result = $courses[$currency] * $input/ $courses[$currency2];
        if(empty($result)){
           echo "Введи значение";
        }else{
           return $result;	
             }
	

}
	
$result = gerKurs($input, $currency, $currency2);
$result = empty($result)? "Ошибка":header("Location: index.php?result=$result");


?>
