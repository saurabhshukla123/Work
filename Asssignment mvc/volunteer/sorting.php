
<?php
    session_start();
    // include 'connection.php';
       // exit;
    // $conn = OpenCon();
    $columns="";
    $fields="";
    $value="";
   $value=  $_POST["query"];
   //$city=$_POST["city"];
   
   if($value=="relevance")
   {
      $columns="";
      $fields="";
      $value=" ORDER BY title DESC ";
      $_SESSION['relevance']="SET";
      $_SESSION['popularity']=null;
   
   }
   else if($value=="popularity")
   
   {
      $_SESSION['popularity']="SET";
      $_SESSION['relevance']=null;
      $columns=" INNER JOIN project_view_history pvh on p.id=pvh.project_id";
      $fields=" ,count(pvh.id) as count1 ";
      
      $value=" GROUP BY p.id ORDER by count(pvh.id) DESC ";
   }
   else
   {
      $_SESSION['popularity']=null;
      $_SESSION['relevance']=null;
      $columns="";
      $fields="";
      $value="";
   }

   $_SESSION["colummsfilter"]= $fields;
   $_SESSION["tablename_filter"]=$columns;
  
   $_SESSION["value"]=$value;


  



    echo json_encode($value);exit;

?>