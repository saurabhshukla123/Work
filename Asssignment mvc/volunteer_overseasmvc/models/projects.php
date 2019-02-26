<?php

include 'include/connection.php';
$conn="";

class project
{  public $conn;      
   function __construct() {
          $conn = OpenCon();
          }
    
      
     

   function getcityname($id)
   {

   }
   function count($fields,$tablename,$conditions)
   { 
      $conn = OpenCon();
      $total="";
      $sql_activity="SELECT count(*) AS records, ".$fields." FROM ".$tablename." WHERE ".$conditions;
      $activity_result2 = $conn->query($sql_activity);
      while ($result = $activity_result2->fetch_assoc()) {
         $total=$result['records'];
      }
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
      $conn = OpenCon();
     //  echo $sql_activity."<br>";
      $activity_result2 = $conn->query($sql_activity);
      return $activity_result2;
      
   }
   function get_details_activity()
   {

      $sql_activity="SELECT name,id FROM activites";
      $activity_result1 = $conn->query($sql_activity);
      return $activity_result1;
   }
   function get_details_project($id)
   {
      $conn = OpenCon(); 
      $sql_activity="SELECT title,id,country_id,city_id FROM projects WHERE id='$id'";
      $activity_result1 = $conn->query($sql_activity);
      return $activity_result1;
   }
   function get_details_country($id)
   {  $countryname="";
      $conn = OpenCon(); 
      $sql_activity="SELECT id,name FROM countries WHERE id='$id'";
      $activity_result1 = $conn->query($sql_activity);
      while ($result = $activity_result1->fetch_assoc()) {
         $countryname=$result['name'];
      }
      return $countryname;
   }
   function get_details_city($id)
   {  $city="";
      $conn = OpenCon(); 
      $sql_activity="SELECT id,name FROM cities WHERE id='$id'";
      $activity_result1 = $conn->query($sql_activity);
      while ($result = $activity_result1->fetch_assoc()) {
         $city=$result['name'];
      }
      return $city;
   }
   

}

?>