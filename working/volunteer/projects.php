<?php

include 'connection.php';
// include($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");


class project extends config
{  public $conn;      
   function __construct() {
      $con = parent::OpenCon();
      
      $this->conn = $con;
          }
     

   function getcityname($id)
   {

   }
   function count($fields,$tablename,$conditions)
   { 
      //$conn = OpenCon();
      $total="";
      $sql_activity="SELECT  ".$fields." FROM ".$tablename." WHERE ".$conditions;
      $activity_result2 = $conn->query($sql_activity);
     
      $total=mysqli_num_rows($activity_result2);
      
      return $total;
   }
   function select($fields,$tablename,$conditions)
    { if($conditions=="")
      {
         $sql_activity="SELECT ".$fields." FROM ".$tablename;
         
      }
      else{

       $sql_activity="SELECT ".$fields." FROM ".$tablename." WHERE ".$conditions;
      }
     // $conn = OpenCon();
     //  echo $sql_activity."<br>";
     $value=$sql_activity;
    
      $activity_result2 = $this->conn->query($sql_activity);
     
      return $activity_result2;
      
   }
   function get_details_activity()
   {

      $sql_activity="SELECT name,id FROM activites";
      $activity_result1 = $this->conn->query($sql_activity);
      return $activity_result1;
   }

   function get_details_project($id)
   {
      //$conn = OpenCon(); 
      $sql_activity="SELECT title,id,country_id,city_id,overview_description FROM projects WHERE id='$id'";
      $activity_result1 = $this->conn->query($sql_activity);
      return $activity_result1;
   }
   function get_details_country($id)
   {  $countryname="";
      //$conn = OpenCon(); 
      $sql_activity="SELECT id,name FROM countries WHERE id='$id'";
      $activity_result1 = $this->conn->query($sql_activity);
      while ($result = $activity_result1->fetch_assoc()) {
         $countryname=$result['name'];
      }
      return $countryname;
   }
   function get_details_city($id)
   {  $city="";
      //$conn = OpenCon(); 
      $sql_activity="SELECT id,name FROM cities WHERE id='$id'";
      $activity_result1 = $this->conn->query($sql_activity);
      while ($result = $activity_result1->fetch_assoc()) {
         $city=$result['name'];
      }
      return $city;
   }

   function getDataSearch($columns_filter,$category,$countryid,$activity,$value,$start_from,$limit,$tablename_filter)
   { 
                  $fields3="pc.cost DIV pc.number_of_weeks AS per_week_cost,pc.number_of_weeks AS total_weeks,o.name AS orgname,p.id AS id,p.title AS title,p.image AS image".$columns_filter;
						$tablename3="projects AS p INNER JOIN organizations AS o on p.organization_id=o.id  INNER JOIN project_costs AS pc  ON pc.project_id=p.id".$tablename_filter;
						$conditions3="category_id='$category' AND country_id='$countryid' AND activity_id='$activity'".$value." LIMIT {$start_from} , {$limit}";
					 
      return $city;
   }
   

}

?>