<?php
// include 'connection.php';
// require_once($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class CategoriesModel extends BaseModel
{

    function getallcategories()
    {
        $categories = new BaseModel();
        $data = array();
        $data['table'] = "categories";
        $data['columns'] = "id,name";  
        $result = $categories->select($data);
        return $result;
    }
    

    

}
?>