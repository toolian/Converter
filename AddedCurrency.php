<?php
require_once 'Modelcurrency.php';
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
$Value = array("USD"=>$usd, "EUR"=>$eur, "CAD"=>$cad, "RON"=>$ron, "PLN"=>$pln, "NOK"=>$nok, 
				"CNY"=>$cny, "KGS"=>$kgs, "KZT"=>$kzt, "DDK"=>$ddk, "HKD"=>$hkd, "HUF"=>$huf, "BRL"=>$brl,
				"BGN"=>$bgn, "BYN"=>$byn, "AZN"=>$azn, "JPY"=>$jpy
				);

?>
<html>
<head>
<meta charset="utf-8">
<title>Онлайн коневертер валют</title>
</head>
<body>
<form action="" method="get">
	<select name="kurs">
				<option value="USD">USD</option>
				<option value="EUR">EUR</option>
				<option value="GBP">GBP</option>
				<option value="CAD">CAD</option>
				<option value="JPY">JPY</option>
				<option value="AZN">AZN</option>
				<option value="BYN">BYN</option>
				<option value="BGN">BGN</option>
				<option value="BRL">BRL</option>
				<option value="HUF">HUF</option>
				<option value="NKD">NKD</option>
				<option value="DDK">DDK</option>
				<option value="KZT">KZT</option>
				<option value="KGS">KGS</option>
				<option value="CNY">CNY</option>
				<option value="NOK">NOK</option>
				<option value="PLN">PLN</option>
				<option value="RON">RON</option>
			</select>
			<input type="submit" name="sbmt" value="Добавить">
</form>
</body>
</html>
<?php
$test = new Modelcurrency();
$currency="";
if(isset($_GET['kurs'])){
	$currency = $_GET['kurs'];
}
if(isset($_GET['sbmt'])){
$audUpdate = $test->save($currency, $Value[$currency]);
}


?>