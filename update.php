<?php  
require_once 'courses.php';
if(isset($_GET['sbmt'])){
	$upd = new WorkCourses();
	$update = $upd->UpdateRow();

        $db =  new DataBase();
		$usd = $db->selectOne('USD');
		$result_usd = current($usd);
		
		$eur = $db->selectOne('EUR');
		$result_eur = current($eur);
		
		$gbp = $db->selectOne('GBP');
		$result_gbp = current($gbp);
		
		$cad = $db->selectOne('CAD');
		$result_cad = current($cad);
		
		header("Location: index.php?usd=$result_usd&eur=$result_eur&gbp=$result_gbp&cad=$result_cad");
		}
		


?>
