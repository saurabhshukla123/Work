<?php

class BaseModel
{
	protected $_db;
	public $validationError = array();
	public $data;
	
	public function __construct()
	{
		global $conn;
		$this->_db = $conn;
	}
	
	public function getErrors()
	{
		return $this->validationError;
	}
	
	public function processInput($data) 
	{
		foreach($data as $key=>$value)
		{
			$value = trim($value);
			$value = stripslashes($value);
			$value = htmlspecialchars($value);
			$this->data[$key] = $value;
		}
		
	}
	
	public function getResultArray($result) 
	{
		$finfo = $result->fetch_fields();
		$columns = array();
		 foreach ($finfo as $val) {
			 $columns[] = $val->name;
		 }
		 
		$count = $result->num_rows;
		while($row = $result->fetch_assoc()) {
		
			$temp = array();
			
 			foreach($columns as $column) {
				$temp[$column] = $row[$column];
			} 
			
			$result_array[] = $temp;
			
		}
		
		return $result_array;
	}

}

?>