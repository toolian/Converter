<?php
require_once 'DataBase.php';
class WorkCourses{



function UpdateRow(){
$date = date("d/m/Y");
$content = simplexml_load_file("https://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date);
	
foreach($content->Valute as $cur){ 
	if($cur->NumCode == 826){
       $gbp = str_replace(",", ".", $cur->Value);
       } 
	if($cur->NumCode == 840){
	   $usd = str_replace(",", ".", $cur->Value);
	   } 
	if($cur->NumCode == 978){
	   $eur = str_replace(",", ".", $cur->Value);
	   } 
    if($cur->NumCode == 124){
	   $cad = str_replace(",", ".", $cur->Value);
	   } 
	}
	
$db =  new DataBase();
$updateCad = $db->Update('CAD', $cad);
$updateEur = $db->Update('EUR', $eur);
$updateUsd = $db->Update('USD', $usd);
$updateGbp = $db->Update('GBP', $gbp);
}

}



?>