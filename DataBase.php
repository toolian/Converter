<?php
class DataBase{
	public $isConn;
	protected $datab;
	//подключение

	public function __construct($username = "root", $password = "", $host = "localhost", $dbname = "courses", $options = []){
        $this->isConn = TRUE;
        try {
            $this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        
    }
	//отключение бд
	/*public function Disconnect(){
        $this->datab = NULL;
        $this->isConn = FALSE;
	*/
	//вывод даных
	function selectOne($name){
        $sth = $this->datab->prepare("SELECT value FROM currency where name=:name");
		$sth->bindValue(':name', $name, PDO::PARAM_STR);
        $sth->execute();
        $courses = $sth->fetch(PDO::FETCH_ASSOC);
		return $courses;
		}
		
	public function Select(){
        $sth = $this->datab->prepare("SELECT `value` FROM `currency`");
		$sth->execute();
        $courses = $sth->fetchAll(PDO::FETCH_COLUMN);
		return $courses;
	}
	
	//обновленние даных
	public function Update($name, $value){
 
        $sth = $this->datab->prepare("UPDATE currency set value = :value where name=:name");
        $sth->bindParam(':name', $name);
        $sth->bindParam(':value', $value);
        $sth->execute();
}
	
}
?>