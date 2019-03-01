
<?php
    session_start();
    // include 'connection.php';
       // exit;
    // $conn = OpenCon();
    $columns="";
    $fields="";
    $value="";
    $category="";
    $flag=0;
   $value=  $_POST["query"];
   //$city=$_POST["city"];
    $checkbox2=  $_POST["checkbox2"];
    $checkbox1=  $_POST["checkbox1"];
    $checkbox3=  $_POST["checkbox3"];
    //code fro checkbox   
    if(isset($checkbox2)  || isset($checkbox2) || isset($checkbox3))
    {
    if($checkbox1 =="1")
         {
         $category.="1";
         
         $_SESSION["checkbox1"]="checked";
         
         }
         else
         {
            $flag=1;
            unset($_SESSION["checkbox1"]);
         }
         if($checkbox2 =="2")
         {
             if($category=="")
             {

               $category.="2";
             }
             else
             {
                
           $category.=",2";
             }

             $_SESSION["checkbox2"]="checked";
           
         }
         else
         {  $flag=2;
            unset($_SESSION["checkbox2"]);
         }
         if($checkbox3 =="3")
         {
            if($category=="")
            {

              $category.="3";
            }
            else
            {
         $category.=",3";
            }
            $_SESSION["checkbox3"]="checked";
            
         }
         else
         {
            $flag=3;
            unset($_SESSION["checkbox3"]);

         }

   
        
       
      $_SESSION["category"]=$category;

      }
      else
      {

      }

         
         //$_SESSION["category"]=$category;
         // code ends for checkbox; 
    //     echo json_encode($category);exit;
   
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


  
//   echo json_encode($category);exit;


     echo json_encode($value);exit;

?>