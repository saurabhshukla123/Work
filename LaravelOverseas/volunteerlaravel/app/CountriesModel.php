<?php
// include 'connection.php';
// require_once($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class CountriesModel extends BaseModel
{

    function allactivitydetails()
    { 
       
        
    }
    
    function getallcountries($startfrom=0,$offset=12)
    {
        $activities = new BaseModel();
        $data = array();
        $data['table'] = "countries";
        $data['columns'] = "id,name,image";
        if(isset($startfrom) && isset($offset))
        {
            $data['LIMIT']=" $startfrom,$offset ";
        }
        $result = $activities->select($data);
        return $result;
    }
     
    function allCountries()
    {
        $activities = new BaseModel();
        $data = array();
        $data['table'] = "countries";
        $data['columns'] = "id,name,image";
      
       
      

        $result = $activities->select($data);
        return $result;
    }

    
    function getcountries($id)
    {
        $activities = new BaseModel();
        $data = array();
        $data['table'] = "countries";
        $data['columns'] = "id,name,image";
      
        $data['WHERE'] =" id= '$id' ";
      

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
    function insert($name,$image)
    {
        $table = 'countries';
        $data = array($name,$image);
        $col = array('name','image');
        $q1=new BaseModel();
        $value=$q1->insert($table,  $data,  $col);
        return $value;
    }

    public function updateCountry($id, $name,$image)
 {
     $update= new BaseModel();
     $table="countries";
     $data = array(
         "name" => $name,
         "image" => $image
        
     );
     $where = "id = '$id'";
     $update_data=$update->updateData($table, $data, $where);
     return $update_data;
 }

 function delete($id)
 {  
    $view_data_history = new BaseModel();         
    $result = $view_data_history->delete("countries",$id,"id");
    return $result;  
}

    function count_records()
    {
        $view_data_history2 = new BaseModel();
        $fields = "id,name,image";
        $tablename = "countries";
       $conditions="";
        $activity_result2 = $view_data_history2->count($fields,$tablename,$conditions);
        return $activity_result2;
        
    }
   

    

}
?>