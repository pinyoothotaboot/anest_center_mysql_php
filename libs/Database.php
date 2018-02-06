<?php
class Database extends PDO{
	
	public function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_LANG,$DB_USER,$DB_PASS){
		/* Connect to an ODBC database using driver invocation */
		parent::__construct($DB_TYPE.":host=".$DB_HOST.";dbname=".$DB_NAME.';charset='.$DB_LANG,$DB_USER,$DB_PASS,
							array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	}
	//; SET CHARACTER SET UTF8; SET character_set_connection=UTF8; SET character_set_client=UTF8; SET character_set_results=utf8
	public function __destruct(){
		
	}
	
	/**
	 * select
	 * @param string $sql An SQL string
	 * @param array $array Parameters to bind
	 * @param constant $fetchMode A PDO Fetch mode
	 * @return mixed
	*/
	
	public function select($sql,$array=array(),$fetchMode=PDO::FETCH_ASSOC){
		$sth = $this->prepare($sql);
		$sth->execute($array);
		$data = $sth->fetchAll($fetchMode);
		return $data;
	}
	
	
	/**
	 * counter
	 * @param string $sql An SQL string
	 * @param array $array Parameters to bind
	 * @return integer count
	*/
	public function counter($sql,$array=array()){
		$sth = $this->prepare($sql);
		$sth->execute($array);
		$count = $sth->rowCount();
		return (int)$count;
	}
	
	/**
	 * insert 
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 * @return bool $msg if TRUE then Saved else FALSE then error to saving
	*/
	public function insert($table,$data){
		ksort($data);
		$fieldNames  = implode(",",array_keys($data));
		$fieldValues = ':'.implode(', :',array_keys($data));
		$sth = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)"); 
		try{
				$this->beginTransaction();
				foreach($data as $key=>$value){
					$sth->bindValue(":$key",$value);
				}
				$this->commit();
				$sth->execute();
				$msg =true;
			}
		catch(PDOException $e){
				$this->rollBack();
				$msg =false;
		}
		return $msg;
	}
	
	/**
	 * update
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 * @param string $where the WHERE query part
	 * @return bool $msg if TRUE then Updated else FALSE then error to updating
	*/
	public function update($table,$data,$where){
		ksort($data);
		
		$fieldDetails = NULL;
		foreach($data as $key=>$value){
			$fieldDetails .= "$key=:$key,";
		}
		$fieldDetails =rtrim($fieldDetails,',');
		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		try{
				$this->beginTransaction();
				foreach($data as $key =>$value){
					$sth->bindValue("$key",$value);
				}
				$sth->execute();
				$this->commit();
				$msg =true;
		}
		catch(PDOException $e){
				$this->rollBack();
				$msg =false;
		}
		return $msg;
	}
}
?>