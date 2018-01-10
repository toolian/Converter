<?php
class DataBase
{
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
	public function getBySql($sql){
		
		$sth = $this->datab->prepare($sql);
		$sth->execute();
		$courses = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $courses;
		
	}
	
	public function paramcycle($param, $sth){
		$i='0';
		foreach($param as $key=>$value){
			$i++;
			$sth->bindValue($i, $value, PDO::PARAM_STR);
		}
		return $sth;
	}
	
	public function getOneBySql($sql, $param){
		$sth = $this->datab->prepare($sql);
		$sth = $this->paramcycle($param, $sth);
		$sth->execute();
		$courses = $sth->fetch(PDO::FETCH_ASSOC);
		return $courses;
		}

	public function executeSql($sql, $param){
		$sth = $this->datab->prepare($sql);
		$sth = $this->paramcycle($param, $sth);
		$sth->execute();
	}

	
}
?>