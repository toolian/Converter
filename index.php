<?php  
$value = isset($_GET['result'])? $_GET['result']:"Ошибка";


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
<form action="AddedCurrency.php" method="get">
<input type="submit" name="save" value="Добавить новый курс">
</form>
<?php 
if(isset($_GET['usd'])){
	echo "USD = ".$_GET['usd']. "РУБ<br>";
}
if(isset($_GET['eur'])){
	echo "EUR = ".$_GET['eur']. "РУБ<br>";
}
if(isset($_GET['gbp'])){
	echo "GBP = ".$_GET['gbp']." РУБ<br>";
}
if(isset($_GET['cad'])){
	echo "CAD = ".$_GET['cad']. "РУБ";
}
	
?>
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