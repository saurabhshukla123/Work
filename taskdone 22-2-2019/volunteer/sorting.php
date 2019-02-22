
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


  


//  $_SESSION["query"]=$value;
 // echo "<script>alert('hello');</script>";
  //exit;
    // $sql = "SELECT id AS city_id,name as city_name,country_id as city_country_id FROM cities where country_id='$country_id'" ;
    // $result = $conn->query($sql);
    // $result_row = [];
    // $response = '';
    // $flag="";
    // while($row = $result->fetch_assoc()) {
    //     // .echo ($row['id'] == $organization) ? "selected" : "".
    //     //$response = $response."<option value='".$row['city_id']."'".$value.">".$row['city_name']."</option>";
   
    //         if(isset($_SESSION["city"]))
    //         {
    //             if($_SESSION["city"]==$row['city_id'])
    //             {
    //             $flag="selected";
    //             }
    //             else
    //             {
    //                 $flag="";
                    
    //             }
    //         }
    //     $response = $response."<option value='".$row['city_id']."'".$flag.">".$row['city_name']."</option>";
    //  }
    echo json_encode($value);exit;

?>