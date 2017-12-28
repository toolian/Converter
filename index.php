<?php  

$input = '';
if(isset($_GET['input'])){
	$input = $_GET['input'];
	}
	
$currency = '';
if(isset($_GET['kurs'])){
	$currency = $_GET['kurs'];
	}
	
$currency2 = '';
if(isset($_GET['kurs2'])){
	$currency2 = $_GET['kurs2'];
	}
		
try {
    $dbh = new PDO('mysql:dbname=courses;host=localhost', 'root', '');
} catch (PDOException $e) {
    die($e->getMessage());
}

$sth = $dbh->prepare("SELECT `name` FROM `currency`");
$sth->execute();
$array = $sth->fetchAll(PDO::FETCH_COLUMN);

$sth = $dbh->prepare("SELECT `value` FROM `currency`");
$sth->execute();
$array2 = $sth->fetchAll(PDO::FETCH_COLUMN);

$courses =array_combine($array, $array2);
		
    function gerKurs($input, $currency, $currency2, $courses)
    {	
        $result = $courses[$currency] * $input/ $courses[$currency2];
        return $result;	
    }

?>

<DOCTYPE html!>
<html>
<head>
<meta charset="utf-8">
<title>Онлайн коневертер валют</title>
</head>
<body>
<form action="" method="get">
            <input type="text" name="input" placeholder="Введиет значение">
            <select name="kurs">
				<option value="RUB">RUB</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
				<option value="GBP">GBP</option>
				<option value="CAD">CAD</option>
            </select>
			<select name="kurs2">
                <option value="RUB">RUB</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
				<option value="GBP">GBP</option>
				<option value="CAD">CAD</option>
            </select>
			<input type="text" name="hidden" value="<?php echo gerKurs($input, $currency, $currency2, $courses); ?>">
            <br />
            <input type="submit" name="sbmt" value="Коневертировать">
</form>
</body>
</html>