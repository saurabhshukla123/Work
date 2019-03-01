<?php
// include 'connection.php';
require_once($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class categories 
{

    function allcategorydetails()
    {
        // $conn=OpenCon();
        // $query="SELECT id,name FROM categories";
        // $activity_result2 = $conn->query($query);
        // return $activity_result2;
        
    }
    function getallcategories()
    {
        $categories = new query();
        $data = array();
        $data['table'] = "categories";
        $data['columns'] = "id,name";  
        $result = $categories->select($data);
        return $result;
    }
    

    

}
?>