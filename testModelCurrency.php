<?php
require_once 'Modelcurrency.php';


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
if(count($getByUSD)=='2'){
	echo "getByName: USD OK";
}else{
	echo "USD ошибка";
	}
$getByEUR = $test->getByName('EUR');
if(count($getByEUR)=='2'){
	echo ", EUR OK";
}else{
	echo ", EUR ошибка";
	}
$getByGBP = $test->getByName('GBP');
if(count($getByGBP)=='2'){
	echo ", GBP OK";
}else{
	echo ", GBP ошибка";
	}
$getByCAD = $test->getByName('CAD');
if(count($getByCAD)=='2'){
	echo ", CAD OK";
}else{
	echo ", CAD ошибка";
	}
$getByRUB = $test->getByName('RUB');
if(count($getByRUB)=='2'){
	echo ", RUB OK<br>";
}else{
	echo ", RUB ошибка<br>";
	}
//UpdateByName	 
$eur = $test->Update(65, 'EUR');
$usd = $test->Update(55, 'USD');
$cad = $test->Update(45, 'CAD');
$gbp = $test->Update(70, 'GBP');
if(array_pop($getByUSD) == '55'){
	echo "UpdateByName : USD OK";
}else{
	echo " UpdateByName : USD ошибка";
	}
if(array_pop($getByEUR) == '65'){
	echo ", EUR OK";
}else{
	echo ", EUR ошибка";
	}
if(array_pop($getByGBP) == '70'){
	echo ", GBP OK";
}else{
	echo " UpdateByName : GBP ошибка";
	}
if(array_pop($getByCAD) == '45'){
	echo ", CAD OK";
}else{
	echo ", CAD ошибка";
	}
	
	


?>