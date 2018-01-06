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
	public function getBySql($sql){
		
		$sth = $this->datab->prepare($sql);
		
		$sth->execute();
        $courses = $sth->fetchAll(PDO::FETCH_COLUMN);
		return $courses;
		
	}
	
	public function getOneBySql($sql, $param){
        $sth = $this->datab->prepare($sql);
		$sth->bindValue(1, $param, PDO::PARAM_STR);
        $sth->execute();
        $courses = $sth->fetch(PDO::FETCH_ASSOC);
		return $courses;
		}
		
	public function executeSql($sql, $param){
        $sth = $this->datab->prepare($sql);
        $sth->bindParam(1, $param);
        $sth->execute();
}

	
}
?>