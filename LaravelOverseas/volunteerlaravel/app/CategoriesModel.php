<?php
// include 'connection.php';
// require_once($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class CategoriesModel extends BaseModel
{

    function getallcategories($startfrom=0,$offset=12)
    {
        $categories = new BaseModel();
        $data = array();
        $data['table'] = "categories";
        $data['columns'] = "id,name";  
        if(isset($startfrom) && isset($offset))
        {
            $data['LIMIT']=" $startfrom,$offset ";
        }
        $result = $categories->select($data);
        return $result;
    }
    
    function count_records()
    {
        $view_data_history2 = new BaseModel();
        $fields = "id,name";
        $tablename = "categories";
       $conditions="";
        $activity_result2 = $view_data_history2->count($fields,$tablename,$conditions);
        return $activity_result2;
        
    }
    function getcategories($categoryid)
    {
        $categories = new BaseModel();
        $data = array();
        $data['table'] = "categories";
        $data['columns'] = "id,name";  
        $data['WHERE']=" id= '$categoryid' ";
        $result = $categories->select($data);
        return $result;
    }
    
    public function  updateCategory($countryid,$name)
    {
        $update= new BaseModel();
        $table="categories";
        $data = array(
            "name" => $name
           
        );
        $where = "id = '$countryid'";
        $update_data=$update->updateData($table, $data, $where);
        return $update_data;
    }


    function insert($name)
    {
        $table = 'categories';
        $data = array($name);
        $col = array('name');
        $q1=new BaseModel();
        $value=$q1->insert($table,  $data,  $col);
        return $value;
    }
    function delete($id)
    {  
       $view_data_history = new BaseModel();         
       $result = $view_data_history->delete("categories",$id,"id");
       return $result;  
   }

    

}
?>