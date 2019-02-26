<?php

class BaseModel
{

	public $validationError = array();
	public $data;
	public $stmt;
    public $table;
    public $param;
    public $cols, $columns;
    public $columnsstr;
    public $conn;
	
	public function __construct()
	{
		global $conn;
		$this->conn = $conn;
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
	
	

   
    public function delete($table, $id, $columns)
    {
        $quer = "DELETE FROM $table WHERE ($columns) = ('$id')";
        $stmt = $this->conn->query($quer);
        return $this->conn;
    }

    function count($fields,$tablename,$conditions)
    { 
     
       $total="";
       $sql_activity="SELECT  ".$fields." FROM ".$tablename." WHERE ".$conditions;
       $activity_result2 = $this->conn->query($sql_activity);
      
       $total=mysqli_num_rows($activity_result2);
       
       return $total;
    }

    public function insert($table, array $data, array $columns)
    {

        $data = $this->setdata($data);
        $cols = $this->setColumns($columns);
        $quer = "INSERT INTO $table ($cols) VALUES ('$data')";
        $stmt = $this->conn->query($quer);

        return $stmt;
    }
    //update data query
    public function updateData($table, $data, $where)
    {
        $cols = array();
        foreach ($data as $key => $val) {
            $cols[] = "$key = '$val'";
        }
        $query = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";
        $result = mysqli_query($this->conn, $query);
        return  $this->conn;
    }
//fetch records query
    public function select($data)
    {

        $select_query = " SELECT " . $data['columns'] . " FROM " . $data['table'];
        if (array_key_exists("INNER JOIN", $data)) {

            if ($data['INNER JOIN'] != "") {
                $select_query .= "  " . $data['INNER JOIN'];
            }
        }
        if (array_key_exists("WHERE", $data)) {

            if ($data['WHERE'] != "") {
                $select_query .= " WHERE " . $data['WHERE'];
            }
        }
        if (array_key_exists("GROUP BY", $data)) {

            if ($data['GROUP BY'] != "") {
                $select_query .= " GROUP BY " . $data['GROUP BY'];
            }
        }
        if (array_key_exists("ORDER BY", $data)) {

            if ($data['ORDER BY'] != "") {
                $select_query .= " ORDER BY " . $data['ORDER BY'];
            }
        }
        if (array_key_exists("LIMIT", $data)) {

            if ($data['LIMIT'] != "") {
                $select_query .= " LIMIT " . $data['LIMIT'];
            }
        }

        // print_r($select_query);
        $values = $this->conn->query($select_query);
        $resultArray = array();
        if ($values->num_rows > 0) {
            while($row = mysqli_fetch_array($values,MYSQLI_ASSOC)){
                $resultArray[] = $row;
            }
           
        }
        return $resultArray;

    }

    private function setFields(array $columns)
    {
        $fields = implode(' = ?, ', array_values($columns));
        return $fields . ' = ?';
    }
    private function setdata(array $data)
    {
        $datastr = implode("','", $data);
        //$fields = implode(' = ?, ', array_values($columns));
        echo $datastr;
        return $datastr;

    }
    private function setColumns(array $columns)
    {

        $columnsstr = implode(",", $columns);
        return $columnsstr;

    }
    public function join(array $merge_array)
    {
        $merge_array_str = "";
        foreach ($merge_array as $arr) {
            $merge_array_str .= " " . $arr[3] . " JOIN " . $arr[0] . " ON " . $arr[5] . "." . $arr[1] . " = " . $arr[6] . "." . $arr[2];
        }
        return $merge_array_str;

    }

    function get_country_records($fields,$tablename,$conditions)
    {      
       $total="";
       $sql_activity="SELECT  ".$fields." FROM ".$tablename." WHERE ".$conditions;
       $activity_result2 = $this->conn->query($sql_activity);
      
       return $activity_result2;
    }

}

?>