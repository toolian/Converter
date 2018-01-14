<?php  
$value = isset($_GET['result'])? $_GET['result']:"Ошибка";
require_once 'Modelcurrency.php';
$db =  new ModelCurrency();
$result = $db->getAll();

?>

<DOCTYPE html!>
<html>
<head>
<meta charset="utf-8">
<title>Онлайн коневертер валют</title>
</head>
<body>
<form action="update.php" method="get">
<input type="submit" name="sbmt" value="Обновить курс валют">
</form>
<?php
$sbmt = "";
if(isset($_GET['upd'])){
	$sbmt = $_GET['upd'];
}

foreach($result as $key=>$courses){
	
	$cur = $courses['name']." = ".$courses['value']."<br>";
	if($sbmt == 'cur'){
	echo $cur;
	}
}

?>
<form action="delete.php" method="get">
<input type="submit" name="del" value="Удалить валюту">
</form>
<form action="AddedCurrency.php" method="get">
<input type="submit" name="save" value="Добавить новый курс">
</form>

<form action="form.php" method="get">
			<input type="text" name="input" placeholder="Введиет значение">
			<select name="kurs">
				<option value="0">USD</option>
				<option value="1">EUR</option>
				<option value="2">GBP</option>
				<option value="3">CAD</option>
				<option value="4">RUB</option>
			</select>
			<select name="kurs2">
				<option value="0">USD</option>
				<option value="1">EUR</option>
				<option value="2">GBP</option>
				<option value="3">CAD</option>
				<option value="4">RUB</option>
			</select>
			<input type="text" name="hidden" value="<?php echo $value; ?>">
			<br />
			<input type="submit" name="sbmt" value="Коневертировать">
</form>
</body>
</html>