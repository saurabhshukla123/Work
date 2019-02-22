<?php
require_once 'dynamicquery.php';
include 'connection.php';

  $conn = OpenCon();
// $query = new QueryBuilder($conn);

//  function stringSanitize(string $value){
//     $sanitized_value = filter_var($value, FILTER_SANITIZE_STRING);
//     return $sanitized_value;
// }

// $table = 'cities';
// $data = array('hello','1');
// $col = array('name','country_id');

// $conn = OpenCon();
// $q1=new query($conn);
// $value=$q1->insert($table,  $data,  $col);


$data=array();
                    
$data['table']="project_view_history AS v";
$data['columns']="COUNT(v.project_id) AS number_of_views,v.project_id AS id,p.title AS project_name,c.name as country_name,o.name AS organization_name,p.image AS image";
//echo "<pre>";
//print_r($data);
//die();
//$data['columns']=" COUNT(v.project_id) AS number_of_views,v.project_id AS id,p.title AS project_name,c.name as country_name,o.name AS organization_name,p.image AS image";
$data['WHERE']="v.id=1";
$data['INNER JOIN']="projects as p on p.id=v.project_id
INNER JOIN countries c on c.id=p.country_id
                   INNER JOIN organizations o on o.id=p.organization_id";
$data['GROUP BY']=" project_id";
$data['ORDER BY']="COUNT(v.project_id) DESC";


$view_data_history=new query($conn);

$result=$view_data_history->select($data);
//print_r($result);



// $query->insert($table, $data, $col);
?>