<?php


class query
{

    public $stmt;
    public $table;
    public $param;
    public $cols, $columns;
    public $columnsstr;
    public $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insert($table, array $data, array $columns)
    {

        $data = $this->setdata($data);
        $cols = $this->setColumns($columns);
        $quer = "INSERT INTO $table ($cols) VALUES ('$data')";
        echo $quer;
        $stmt = $this->conn->query($quer);
      
        return $stmt;
    }

    public function select($data)
    {

        $select_query = " SELECT " . $data['columns'] . " FROM " . $data['table'];
        if (array_key_exists("INNER JOIN", $data)) {

            if ($data['INNER JOIN'] != "") {
                $select_query .= " INNER JOIN " . $data['INNER JOIN'];
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
     ///print_r($select_query);

        $values = $this->conn->query($select_query);
        print_r($values);
        die();
        
        return $values;

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
        echo $columnsstr;
        return $columnsstr;

    }
}
