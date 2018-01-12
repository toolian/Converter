<?php
require_once 'ModelCurrency.php';
class WorkCourses
{	public function UpdateRow(){
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
	
		$upd = new ModelCurrency();
		
		$eurUpdate = $upd->Update($eur, 'EUR');
		$usdUpdate = $upd->Update($usd, 'USD');
		$cadUpdate = $upd->Update($cad, 'CAD');
		$gbpUpdate = $upd->Update($gbp, 'GBP');

	}

}



?>