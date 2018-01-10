<?php
require_once 'DataBase.php';
class ModelCurrency
{
	public function ClassDB(){
		$db = new DataBase();
		return $db;
	}
    public function getByName($name){
		$param = array('name'=>$name);
        $sql = "SELECT name, value FROM currency WHERE name=?";
        $select = $this->ClassDB();
        $result = $select->getOneBySql($sql ,$param);
		return $result;
		}
		
	public function getAll(){
        $sql = "SELECT name, value FROM currency";
        $select = $this->ClassDB();
        $result = $select->getBySql($sql);
		return $result;
	    }
	
	public function Update($param){
        $sql = "UPDATE currency set value= ? where name= ?";
        $update= $this->ClassDB();
        $result = $update->executeSql($sql,$param);
        }
    public function deleteById($id){
        $sql = "DELETE FROM currency WHERE id=?";
        $del = $this->ClassDB();
        $result = $del->executeSql($sql,$id);
        }
	
	public function deleteByName($name){
        $sql = "DELETE FROM currency WHERE name=?";
        $del = $this->ClassDB();
        $result = $del->executeSql($sql,$name);
        }
	public function save($value){
        $sql = "INSERT INTO currency SET name=?, value=?";
        $del = $this->ClassDB();
        $result = $del->executeSql($sql,$value);
        }
		
		
      }


