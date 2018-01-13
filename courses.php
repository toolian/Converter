<?php
require_once 'ModelCurrency.php';
class WorkCourses
{	public function UpdateRow(){
		$date = date("d/m/Y");
		$content = simplexml_load_file("https://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date);
		$NumCode = array( 'jpyID'=>392, 'aznId'=>944, 'amdId'=>051, 'bynId'=>933, 'bgnId'=>975, 'brlId'=>986, 
						'hufId'=>348, 'hkdId'=>344, 'ddkId'=>208, 'inrId'=>100,'kztId'=>398, 'kgsId'=>417, 'cnyId'=> 156,
						'nokId'=>578, 'plnId'=>985, 'ronId'=>946, 'funtId'=>826, 'usdId'=>840, 'eurId'=>978, 'cadId'=>124
						);
		
		foreach($content->Valute as $cur){ 
			if($cur->NumCode == $NumCode['funtId']){
				$gbp = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['usdId']){
				$usd = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['eurId']){
				$eur = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['cadId']){
				$cad = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['jpyID']){
				$jpy = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['aznId']){
				$azn = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['bynId']){
				$byn = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['bgnId']){
				$bgn = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['brlId']){
				$brl = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['hufId']){
				$huf = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['hkdId']){
				$hkd = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['ddkId']){
				$ddk = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['kztId']){
				$kzt = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['kgsId']){
				$kgs = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['cnyId']){
				$cny = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['nokId']){
				$nok = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['plnId']){
				$pln = str_replace(",", ".", $cur->Value);
			}
			if($cur->NumCode == $NumCode['ronId']){
				$ron = str_replace(",", ".", $cur->Value);
			}
		}
	
		$upd = new ModelCurrency();
		$getAll = $upd->getAll();
		$courses = array();
		foreach($getAll as $key=>$value){
			$courses[] = $value['name'];
		}
		if(in_array("USD", $courses)) {
			$Update = $upd->Update($usd, 'USD');
		}
		if(in_array("EUR", $courses)) {
			$Update = $upd->Update($eur, 'EUR');
		}
		if(in_array("CAD", $courses)) {
			$Update = $upd->Update($cad, 'CAD');
		}
		if(in_array("GBP", $courses)) {
			$Update = $upd->Update($gbp, 'GBP');
		}
		
		
	}

}



