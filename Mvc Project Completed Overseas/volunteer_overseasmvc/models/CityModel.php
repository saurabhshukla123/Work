<?php
// include 'connection.php';
// require_once($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class CityModel extends BaseModel
{

    function allactivitydetails()
    { 
       
        
    }
    
    function getallcityAndCountry($startfrom=0,$offset=12,$condition="")
    {
        $activities = new BaseModel();
        $data = array();
        $data['table'] = "cities as c";
        $data['columns'] = "c.id as id,c.name as name,country.name as countryname";
        if(isset($startfrom) && isset($offset))
        {
            $data['LIMIT']=" $startfrom,$offset ";
        }
        
        if(isset($condition) && $condition!="")
        {
            $data['WHERE']=" c.id='$condition' ";
        }
        
        
        $merge_array_str = "";
        $merge_array[0] = array('countries as country', 'id', ' country_id', 'INNER', 'city as c', 'country', 'c');
        $merge_array_str = $activities->join($merge_array);
     
     
        $data['INNER JOIN'] = $merge_array_str;
  
        $result = $activities->select($data);
    //   print_r("<pre>");
    //     print_r($result);
        
    //   die();
          return $result;
        
       }

    
    function getcountries($id)
    {
        $activities = new BaseModel();
        $data = array();
        $data['table'] = "cities";
        $data['columns'] = "id,name,country_id";
      
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
    function insert($name,$country_id)
    {
        $table = 'cities';
        $data = array($name,$country_id);
        $col = array('name','country_id');
        $q1=new BaseModel();
        $value=$q1->insert($table,  $data,  $col);
        return $value;
    }

    public function updateCountry($id, $name,$country_id)
 {
     $update= new BaseModel();
     $table="cities";
     $data = array(
         "name" => $name,
         "country_id" => $country_id
        
     );
     $where = "id = '$id'";
     $update_data=$update->updateData($table, $data, $where);
     return $update_data;
 }

 function delete($id)
 {  
    $view_data_history = new BaseModel();         
    $result = $view_data_history->delete("cities",$id,"id");
    return $result;  
}


function deleteCountrybyid($id)
{  
   $view_data_history = new BaseModel();         
   $result = $view_data_history->delete("cities",$id,"country_id");
   return $result;  
}
    function count_records()
    {
        
        $view_data_history2 = new BaseModel();

           
        $merge_array_str = "";
        $merge_array[0] = array('countries as country', 'id', ' country_id', 'INNER', 'city as c', 'country', 'c');
        $merge_array_str = $view_data_history2->join($merge_array);
        $fields = "c.id as id,c.name as name,country.name as countryname";
        $tablename = "cities as c";
        $conditions="";
        $activity_result2 = $view_data_history2->count_no_of_records($fields,$tablename,$merge_array_str);
        return $activity_result2;

        
        
     
     
        $data['INNER JOIN'] = $merge_array_str;
        
    }
   

    

}
?>