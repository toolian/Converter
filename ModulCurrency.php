<?php
require_once 'DataBase.php';
class ModulCurrency
{

    public function getByName($name){
        $sql = "SELECT value FROM currency WHERE name=?";
        $select = new DataBase();
        $result = $select->getOneBySql($sql ,$name);
		return $result;
		}
		
	public function getAll($param){
        $sql = "SELECT ".$param." FROM currency";
        $select = new DataBase();
        $result = $select->getBySql($sql, $param);
		return $result;
	    }
	
	public function UpdateByName($name){
        $sql = "UPDATE currency set value= ? where name= ?";
        $update= new DataBase();
        $result = $update->executeSql($sql,$name);
        }
    public function deleteById($id){
        $sql = "DELETE FROM currency WHERE id=?";
        $del = new DataBase();
        $result = $del->executeSql($sql,$id);
        }
	
	public function deleteByName($name){
        $sql = "DELETE FROM currency WHERE name=?";
        $del = new DataBase();
        $result = $del->executeSql($sql,$name);
        }
	public function save($value){
        $sql = "INSERT INTO currency SET name=?, value=?";
        $del = new DataBase();
        $result = $del->executeSql($sql,$value);
        }
		
		
      }


?>