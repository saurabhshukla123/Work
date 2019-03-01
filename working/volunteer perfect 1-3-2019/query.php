
<?php
// require_once 'connection.php';

class QueryBuilder{

private $db = "volunteeroverseas";
private $stmt;
private $table;
private $param;
private $cols, $columns;
private $holders, $placehold;
private $fields, $field;

public $data;
public $results;

public function __construct($db){
    $this->db = $db;
}

public function insert($table, array $data, array $columns){
    $holders = $this->setHolders($columns);
    $cols = $this->setColumns($columns);

    $stmt = $this->db->query("INSERT INTO $table ($cols) VALUES ($holders)");
  
    // $activity_result2 = $conn->query($stmt);
    return $activity_result2;
    //$var= $conn->execute();
    //echo $var;
    //die();
}

public function select($table, array $columns, $field, $param){
    $cols = $this->setColumns($columns);
    $stmt = $this->db->prepare("SELECT $cols FROM $table WHERE $field = ?");
    $stmt->execute(array($param));
    $result = $stmt->fetch();
    return json_encode($result);
}

public function edit($table, array $columns, array $data, $param){
    $fields = $this->setFields($columns);
    $stmt = $this->db->prepare("UPDATE $table SET $fields WHERE $param = ?");
    return $stmt->execute($data);
}

public function delete($table, array $data, $param){
    $stmt = $this->db->prepare("DELETE FROM $table WHERE $param = ?");
    return $stmt->execute($data);
}

private function setColumns(array $columns){
    $cols = implode(', ', array_values($columns));
    return $cols;
}

private function setFields(array $columns){
    $fields = implode(' = ?, ', array_values($columns));
    return $fields.' = ?';
}

private function setHolders(array $columns){
    $holders = array_fill(1 ,count($columns),'?');
    return implode(', ',array_values($holders));
}


}

?>