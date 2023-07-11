<?php

include_once 'config.php';

class Database{

	public $host = HOST;
	public $userName = USER;
	public $password = PASSWORD;
	public $dbName = DATABASE;

	public $link;
	public $error;

	public function __construct(){
		$this->dbConnect();
	}

	//connect database function

	public function dbConnect(){

	$this->link = mysqli_connect($this->host, $this->userName, $this->password, $this->	dbName);

	if(!$this->link){
		$this->error = "DATABASE CONNECTION FAILED";
		return false;
		}
	}

	//insert data into database function
	public function insert($sql){

	$result =  mysqli_query($this->link, $sql) or die($this->link->error.__LINE__);

	if($result){
		return $result;
		}else{
		return false;
		}
	}

	//select data from database function
	public function select($sql){

	$result = mysqli_query($this->link, $sql) or die($this->link->error.__LINE__);

	if($result){

		return $result;
		}else{
		return false;
		}
	}

	//update data of database function
	public function update($sql){

	$result = mysqli_query($this->link, $sql) or die($this->link->error.__LINE__);

		if($result){
		return $result;
		}else{ 
		return false;
		}
	}

    //update data of database function
	public function delete($sql){

	$result = mysqli_query($this->link, $sql) or die($this->link->error.__LINE__);

		if($result){
		return $result;
		}else{ 
		return false;
		}
	}

}

?>