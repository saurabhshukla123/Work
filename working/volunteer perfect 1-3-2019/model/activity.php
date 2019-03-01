<?php
// include 'connection.php';
require_once($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class activity
{

    function allactivitydetails()
    { 
        //$conn=OpenCon();
        // $query="SELECT id,name FROM activites";
        // $activity_result2 = $conn->query($query);
        // return $activity_result2;
        
    }
    
    function getallactivities()
    {
        $activities = new query();
        $data = array();
        $data['table'] = "activites";
        $data['columns'] = "id,name";
      

        $result = $activities->select($data);
        return $result;
    }


    

}
?>