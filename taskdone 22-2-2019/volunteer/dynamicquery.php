<?php
include 'connection.php';
class query
{

    public $stmt;
    public $table;
    public $param;
    public $cols, $columns;
    public $columnsstr;
    public $conn;

    public function __construct()
    {$conn = OpenCon();
        $this->conn = $conn;

    }
    public function delete($table, $id, $columns)
    {

        // $data = $this->setdata($data);
        // $cols = $this->setColumns($columns);
        $quer = "DELETE FROM $table WHERE ($columns) = ('$id')";
        $stmt = $this->conn->query($quer);

        return $this->conn;
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

        $values = $this->conn->query($select_query);
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
}
