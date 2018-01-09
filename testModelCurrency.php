<?php
require_once 'Modulcurrency.php';
//массив для UpdateByName
$currency = array(
	    'USD'=>array('value'=>'55', 'name'=>'USD'),
	    'EUR'=>array('value'=>'65', 'name'=>'EUR'),
	    'GBP'=>array('value'=>'70', 'name'=>'GBP'),
	    'CAD'=>array('value'=>'45', 'name'=>'CAD'));
//массив для GetByName
$ByName = array(
				'0'=>array('name'=>'USD'),
	            '1'=>array('name'=>'EUR'),
	            '2'=>array('name'=>'GBP'),
	            '3'=>array('name'=>'CAD'),
				'4'=>array('name'=>'RUB'));

$test = new Modulcurrency();
$getAll = $test->getAll('value');
//GetAll
if(count($getAll)=='5'){
	echo "GETALL OK<br>";
}else{
	echo "ошибка";
     }
//GetByName	 
$getByUSD = $test->getByName($ByName['0']);
if(count($getByUSD)=='1'){
	echo "getByName: USD OK";
}else{
	echo "USD ошибка";
     }
$getByEUR = $test->getByName($ByName['1']);
if(count($getByEUR)=='1'){
	echo ", EUR OK";
}else{
	echo ", EUR ошибка";
     }
$getByGBP = $test->getByName($ByName['2']);
if(count($getByGBP)=='1'){
	echo ", GBP OK";
}else{
	echo ", GBP ошибка";
     }
$getByCAD = $test->getByName($ByName['3']);
if(count($getByCAD)=='1'){
	echo ", CAD OK";
}else{
	echo ", CAD ошибка";
     }
$getByRUB = $test->getByName($ByName['4']);
if(count($getByRUB)=='1'){
	echo ", RUB OK<br>";
}else{
	echo ", RUB ошибка<br>";
     }
//UpdateByName	 
$eur = $test->UpdateByName($currency['EUR']);
$usd = $test->UpdateByName($currency['USD']);
$cad = $test->UpdateByName($currency['CAD']);
$gbp = $test->UpdateByName($currency['GBP']);
if(current($getByUSD) == '55'){
	echo "UpdateByName : USD OK";
}else{
    echo " UpdateByName : USD ошибка";
     }
if(current($getByEUR) == '65'){
	echo ", EUR OK";
}else{
    echo ", EUR ошибка";
     }
if(current($getByGBP) == '70'){
	echo ", GBP OK";
}else{
    echo " UpdateByName : GBP ошибка";
     }
if(current($getByCAD) == '45'){
	echo ", CAD OK";
}else{
    echo ", CAD ошибка";
     }
	 
	


?>