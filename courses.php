<?php
require_once 'ModulCurrency.php';
class WorkCourses
{   public function UpdateRow(){
	    $date = date("d/m/Y");
	    $content = simplexml_load_file("https://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date);
	    $funtId = 826;
        $usdId = 840;
	    $eurId = 978;
	    $cadId = 124;
        foreach($content->Valute as $cur){ 
	        if($cur->NumCode == $funtId){
               $gbp = str_replace(",", ".", $cur->Value);
            } 
	        if($cur->NumCode == $usdId){
	           $usd = str_replace(",", ".", $cur->Value);
	        } 
	        if($cur->NumCode == $eurId){
	           $eur = str_replace(",", ".", $cur->Value);
	        } 
            if($cur->NumCode == $cadId){
	           $cad = str_replace(",", ".", $cur->Value);
	        } 
	    }
	
	    $upd = new ModulCurrency();
	    $currency = array(
	    'USD'=>array('value'=>$usd, 'name'=>'USD'),
	    'EUR'=>array('value'=>$eur, 'name'=>'EUR'),
	    'GBP'=>array('value'=>$gbp, 'name'=>'GBP'),
	    'CAD'=>array('value'=>$cad, 'name'=>'CAD'));
	
        $eur = $upd->UpdateByName($currency['EUR']);
	    $usd = $upd->UpdateByName($currency['USD']);
	    $cad = $upd->UpdateByName($currency['CAD']);
	    $gbp = $upd->UpdateByName($currency['GBP']);


    }
	

}



?>