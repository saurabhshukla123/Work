<?php
// include 'connection.php';
require_once($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class countries
{

    function allactivitydetails()
    { 
        //$conn=OpenCon();
        // $query="SELECT id,name FROM activites";
        // $activity_result2 = $conn->query($query);
        // return $activity_result2;
        
    }
    
    function getallcountries()
    {
        $activities = new query();
        $data = array();
        $data['table'] = "countries";
        $data['columns'] = "id,name";
      

        $result = $activities->select($data);
        return $result;
    }


    

}
?>