<?php
/**
* Database class
*/
class Database{
	
	public $host = HOST;
	public $user = USER;
	public $password =PASS;
	public $name = NAME;
	public $link;
	public $error;


	public function __construct(){
		
		$this->connector();
	}

	/*
	*  Connector
	*/	
	private function connector(){
		$this->link = new mysqli($this->host, $this->user, $this->password, $this->name);
		if (!$this->link) {
			$this->error = "This connection failed".$this->link->connect_error;
		}

	}

	/*
	*	Select query
	*/
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if ($result->num_rows > 0){	
			return $result;
		}else{
			return false;
		}
	}

	/*
	*	Insert query
	*/

	public function insert($query){
		$insert_row =$this->link->query($query) or die($this->link->error.__LINE__);
		// Validate insert
		if ($insert_row) {
			header("Location:index.php?msg=".urlencode('Record added')."");
			exit();
		}else{

			die('Error : ('.$this->link->errno.')'.$this->link->error);
		}
	}

	public function update($query){
		$update_row =$this->link->query($query) or die($this->link->error.__LINE__);
		if ($update_row) {
			header("Location:index.php?msg=".urlencode('Record updated')."");
			exit();
		}else
			die('Error :('.$this->link->errno.')'.$this->link->error); 
	  }

	/*
	*	Delete
	*/
	public function delete($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if ($delete_row) {
			header("Location:index.php?msg=".urlencode('Record deleted')."");
			exit();
		}else{
			die('Error :('.$this->link->errno.')'.$this->link->error);
		}
	}

}


?>`