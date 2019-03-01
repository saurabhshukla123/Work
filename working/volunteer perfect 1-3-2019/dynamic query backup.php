<?php  
// $colors = array("red", "green", "blue", "yellow"); 

// foreach ($colors as $value) {
//   echo "$value <br>";
// }


class query
{
    
    public $stmt;
public $table;
public $param;
public $cols, $columns;
public $columnsstr;
public $conn;

    function __construct($db) {
        $this->conn=$db;
        
       
    }


    public function insert($table, array $data, array $columns){
      
        $data = $this->setdata($data);
        $cols = $this->setColumns($columns);
        $quer="INSERT INTO $table ($cols) VALUES ('$data')";
        echo $quer;
        $stmt = $this->conn->query($quer);
       echo $stmt;
    }

    function select($data){
        
        $select_query = " SELECT ".$data['columns']." FROM ".$data['table'];
        if($data['INNER JOIN']!=""){
            $select_query .= " INNER JOIN ".$data['INNER JOIN'];
        }
        if($data['WHERE']!=""){
            $select_query .= " WHERE ".$data['WHERE'];
        }
       if($data['GROUP BY']!=""){
        $select_query .= " GROUP BY ".$data['GROUP BY'];
        }
     if($data['ORDER BY']!=""){
           $select_query .= " ORDER BY ".$data['ORDER BY'];
        }    
        if($data['LIMIT']!=""){
            $select_query .= " LIMIT ".$data['LIMIT'];
         }     
        echo "".$select_query;
       die();
        $values = $this->conn->query($select_query);        
        return $values;


     }












private function setFields(array $columns){
    $fields = implode(' = ?, ', array_values($columns));
    return $fields.' = ?';
}
private function setdata(array $data){
    $datastr=implode("','",$data);
    //$fields = implode(' = ?, ', array_values($columns));
    echo $datastr;
    return $datastr;
    
}
private function setColumns(array $columns){
   
      $columnsstr=implode(",",$columns);
      echo $columnsstr;
      return $columnsstr;
   
}
}

?>  