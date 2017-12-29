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
	
$date = date("d/m/Y");
$content = simplexml_load_file("https://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date);
	
foreach($content->Valute as $cur){ 
	if($cur->NumCode == 826){
       $gbp = str_replace(",", ".", $cur->Value);
       } 
	if($cur->NumCode == 840){
	   $usd = str_replace(",", ".", $cur->Value);
	   } 
	if($cur->NumCode == 978){
	   $eur = str_replace(",", ".", $cur->Value);
	   } 
    if($cur->NumCode == 124){
	   $cad = str_replace(",", ".", $cur->Value);
	   } 
	} 
		
try {
    $dbh = new PDO('mysql:dbname=courses;host=localhost', 'root', '');
} catch (PDOException $e) {
    die($e->getMessage());
}

$sth = $dbh->prepare("UPDATE currency set value = :value where name=:name");
$sth->bindParam(':name', $name);
$sth->bindParam(':value', $value_usd);
$name = "USD";
$value_usd = $usd;
$sth->execute();

$sth = $dbh->prepare("UPDATE currency set value = :value where name=:name");
$sth->bindParam(':name', $name);
$sth->bindParam(':value', $value_eur);
$name = "EUR";
$value_eur = $eur;
$sth->execute();

$sth = $dbh->prepare("UPDATE currency set value = :value where name=:name");
$sth->bindParam(':name', $name);
$sth->bindParam(':value', $value_gbp);
$name = "GBP";
$value_gbp = $gbp;
$sth->execute();

$sth = $dbh->prepare("UPDATE currency set value = :value where name=:name");
$sth->bindParam(':name', $name);
$sth->bindParam(':value', $value_cad);
$name = "CAD";
$value_cad = $cad;
$sth->execute();

$sth = $dbh->prepare("SELECT `value` FROM `currency`");
$sth->execute();
$courses = $sth->fetchAll(PDO::FETCH_COLUMN);

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
			<input type="text" name="hidden" value="<?php echo gerKurs($input, $currency, $currency2, $courses); ?>">
            <br />
            <input type="submit" name="sbmt" value="Коневертировать">
</form>
</body>
</html>