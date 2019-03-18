<?php
// include 'connection.php';
//require_once($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class ActivitiesModel  extends BaseModel
{

    function getallactivities()
    {
        $activities = new BaseModel();
        $data = array();
        $data['table'] = "activites";
        $data['columns'] = "id,name";    

        $result = $activities->select($data);
        
        return $result;
    }


    

}
?>