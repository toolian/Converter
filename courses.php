<?php
require_once 'ModelCurrency.php';
class WorkCourses
{	
	public function UpdateRow(){
		$date = date("d/m/Y");
		$content = simplexml_load_file("https://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date);
		$value=array();
		$name=array();
		foreach($content as $cur){ 
		$value[]= str_replace(",", ".", $cur->Value);
		$name[] = str_replace(",", ".", $cur->CharCode);
		}
		$currency = array_combine($name, $value); 
		$upd = new ModelCurrency();
		$getAll = $upd->getAll();
		
		foreach($getAll as $key=>$DbName){
			$courses = $DbName['name'];
			$update = $upd->Update($currency[$courses], $courses);
			if($currency[$courses]="RUB"){
				$update = $upd->Update(1, 'RUB');
			}
		}
		
	}

}



