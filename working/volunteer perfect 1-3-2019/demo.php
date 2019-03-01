<?php
require_once 'dynamicquery.php';
//include 'connection.php';

//  / $conn = OpenCon();

// $join=array();
// $table = 'cities';
// $data = array('hello','1');
// $col = array('name','country_id');


$view_data_history=new query($conn);
 $data=array();
 echo  $sql = "SELECT  o.email ,u.password,u.role,u.id ,o.name,o.id as oid FROM users as u INNER JOIN organizations as o on u.id=o.user_id  WHERE role='organization'    and  o.user_id= 1 <br>  " ;
					
 $merge_array_str = "";
 
 $merge_array[0] = array('organizations AS o', 'id', 'user_id', 'INNER', 'users as u', 'u', 'o');

 $merge_array_str = $view_data_history->join($merge_array);
 print_r($merge_array_str);
 die();
 $getorgusers = new query();
 
                                      
// $data['INNER JOIN']=$merge_array_str;
// $data['GROUP BY']=" p.title";
// $data['ORDER BY']="per_week_cost asc";
// $data['WHERE'] ="P.is_affordable='YES'";
// $view_data_history=new query();

// $result=$view_data_history->select($data);
// print_r($result);
// exit();

// $query->insert($table, $data, $col);
?>