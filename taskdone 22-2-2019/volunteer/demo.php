<?php
require_once 'dynamicquery.php';
//include 'connection.php';

  $conn = OpenCon();

// $join=array();
// $table = 'cities';
// $data = array('hello','1');
// $col = array('name','country_id');


$view_data_history=new query($conn);
 $data=array();

$data=array();
$merge_array_str="";
$merge_array[0]=array('project_costs AS pc','project_id','id','INNER','projects AS p','pc','p');
$merge_array[1]=array('organizations AS o','id','organization_id','INNER','projects AS p','o','p');
$merge_array[2]=array('countries AS c ','id','country_id','INNER','projects AS p','c','p');
$merge_array_str=$view_data_history->join($merge_array);
$data['table']="projects AS p";
$data['columns']="MIN(pc.cost DIV pc.number_of_weeks) AS per_week_cost ,pc.number_of_weeks AS total_weeks,p.title AS project_name,pc.project_id,c.name AS country_name,p.image AS image,o.name AS oname";
$data['INNER JOIN']=$merge_array_str;
$data['GROUP BY']=" p.title";
$data['ORDER BY']="per_week_cost asc";
$data['WHERE'] ="P.is_affordable='YES'";
$view_data_history=new query();

$result=$view_data_history->select($data);
print_r($result);
exit();

// $query->insert($table, $data, $col);
?>