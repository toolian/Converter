<?php
require_once 'Modelcurrency.php';
$date = date("d/m/Y");
$content = simplexml_load_file("https://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date);

$value=array();
$name=array();
foreach($content as $cur){ 

		$value[]= str_replace(",", ".", $cur->Value);
		$name[] = str_replace(",", ".", $cur->CharCode);
}
//var_dump($value);

$currency = array_combine($name, $value); 
//var_dump($currency);

?>
<html>
<head>
<meta charset="utf-8">
<title>Онлайн коневертер валют</title>
</head>
<body>
<form action="" method="get">
			<select name="kurs">
<?php
foreach($content as $cur){ 


		printf('<option value="%s">%s</option>', str_replace(",", ".", $cur->CharCode), str_replace(",", ".", $cur->CharCode));
		echo $key;
}
?>
			</select>
			<input type="submit" name="sbmt" value="Добавить">
</form>
</body>
</html>
<?php
$test = new Modelcurrency();
$value="";
if(isset($_GET['kurs'])){
	$value = $_GET['kurs'];
}
if(isset($_GET['sbmt'])){
$audUpdate = $test->save($value, $currency[$value]);
}


?>