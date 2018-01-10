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
       $work = new ModelCurrency();
		$usd = $work->getByName('USD');
		$result_usd = array_pop($usd);
		
		$eur = $work->getByName('EUR');
		$result_eur = array_pop($eur);
		
		$gbp = $work->getByName('GBP');
		$result_gbp = array_pop($gbp);
		
		$cad = $work->getByName('CAD');
		$result_cad = array_pop($cad);
		
		header("Location: index.php?usd=$result_usd&eur=$result_eur&gbp=$result_gbp&cad=$result_cad");
	}
		


?>
