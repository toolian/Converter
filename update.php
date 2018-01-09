<?php  
require_once 'courses.php';
    if(isset($_GET['sbmt'])){
	   $upd = new WorkCourses();
	   $update = $upd->UpdateRow();
	   $currency = array(
	   '0'=>array('name'=>'USD'),
	   '1'=>array('name'=>'EUR'),
	   '2'=>array('name'=>'GBP'),
	   '3'=>array('name'=>'CAD'));
       $work = new ModulCurrency();
		$usd = $work->getByName($currency['0']);
		$result_usd = current($usd);
		
		$eur = $work->getByName($currency['1']);
		$result_eur = current($eur);
		
		$gbp = $work->getByName($currency['2']);
		$result_gbp = current($gbp);
		
		$cad = $work->getByName($currency['3']);
		$result_cad = current($cad);
		
		header("Location: index.php?usd=$result_usd&eur=$result_eur&gbp=$result_gbp&cad=$result_cad");
	}
		


?>
