<?php
require_once 'Modelcurrency.php';
//массив для UpdateByName
$currency = array(
	    'USD'=>array('value'=>'55', 'name'=>'USD'),
	    'EUR'=>array('value'=>'65', 'name'=>'EUR'),
	    'GBP'=>array('value'=>'70', 'name'=>'GBP'),
	    'CAD'=>array('value'=>'45', 'name'=>'CAD'));
//массив для GetByName

$test = new Modelcurrency();
$getAll = $test->getAll();

//GetAll
if(count($getAll)=='5'){
	echo "GETALL OK<br>";
}else{
	echo "ошибка";
     }
//GetByName	 
$getByUSD = $test->getByName('USD');
var_dump($getByUSD);
if(count($getByUSD)=='1'){
	echo "getByName: USD OK";
}else{
	echo "USD ошибка";
     }
$getByEUR = $test->getByName('EUR');
if(count($getByEUR)=='1'){
	echo ", EUR OK";
}else{
	echo ", EUR ошибка";
     }
$getByGBP = $test->getByName('GBP');
if(count($getByGBP)=='1'){
	echo ", GBP OK";
}else{
	echo ", GBP ошибка";
     }
$getByCAD = $test->getByName('CAD');
if(count($getByCAD)=='1'){
	echo ", CAD OK";
}else{
	echo ", CAD ошибка";
     }
$getByRUB = $test->getByName('RUB');
if(count($getByRUB)=='1'){
	echo ", RUB OK<br>";
}else{
	echo ", RUB ошибка<br>";
     }
//UpdateByName	 
$eur = $test->Update($currency['EUR']);
$usd = $test->Update($currency['USD']);
$cad = $test->Update($currency['CAD']);
$gbp = $test->Update($currency['GBP']);
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