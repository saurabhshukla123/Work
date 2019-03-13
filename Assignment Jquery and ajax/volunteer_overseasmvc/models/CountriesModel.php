<?php
// include 'connection.php';
// require_once($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class CountriesModel extends BaseModel
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
        $activities = new BaseModel();
        $data = array();
        $data['table'] = "countries";
        $data['columns'] = "id,name";
      

        $result = $activities->select($data);
        return $result;
    }

    function getallCities($id)
    {
        $activities = new BaseModel();
        $data = array();
        $data['table'] = "cities";
        $data['columns'] = " id AS city_id,name as city_name,country_id as city_country_id";
        $data['WHERE']=" country_id= '$id'";

        $result = $activities->select($data);
        return $result;
    }

    

}
?>