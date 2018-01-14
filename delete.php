<?php
require_once 'Modelcurrency.php';
$db =  new ModelCurrency();
$result = $db->getAll();
$name = array();
$value = array();
?>
<html>
<head>
<meta charset="utf-8">
<title>Удалит Валюту</title>
</head>
<body>
<form action="" method="get">
			<select name="kurs">
<?php
foreach($result as $key=>$courses){
	$name[] = $courses['name'];
	$value[] = $courses['name'];
	printf('<option value="%s">%s</option>', $courses['name'], $courses['name']);
	}
?>
			</select>
			<input type="submit" name="sbmt" value="Удалить">
</form>
</body>
</html>
<?php
$currency = array_combine($name, $value);
$kurs="";
if(isset($_GET['kurs'])){
	$kurs = $_GET['kurs'];
}
if(!empty($_GET['sbmt'])){
$result = $db->deleteByName($kurs);
header("Location: index.php");
}
?>





