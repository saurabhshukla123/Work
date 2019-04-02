<?php
// include 'connection.php';
//require_once($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class ActivitiesModel  extends BaseModel
{

    function getallactivities($startfrom=0,$offset=12)
    {
        $activities = new BaseModel();
        $data = array();
        $data['table'] = "activites";
        $data['columns'] = "id,name";    
        if(isset($startfrom) && isset($offset))
        {
            $data['LIMIT']=" $startfrom,$offset ";
        }
        $result = $activities->select($data);
        
        return $result;
    }
    function getactivities($id)
    {
        $activities = new BaseModel();
        $data = array();
        $data['table'] = "activites";
        $data['columns'] = "id,name";    
        $data['WHERE']="id= '$id'";
        $result = $activities->select($data);
        
        return $result;
    }

    function count_records()
    {
        $view_data_history2 = new BaseModel();
        $fields = "id,name";
        $tablename = "activites";
       $conditions="";
        $activity_result2 = $view_data_history2->count($fields,$tablename,$conditions);
        return $activity_result2;
        
    }
    public function  updateActivity($activityid,$name)
    {
        $update= new BaseModel();
        $table="activites";
        $data = array(
            "name" => $name
           
        );
        $where = "id = '$activityid'";
        $update_data=$update->updateData($table, $data, $where);
        return $update_data;
    }
    
    function insert($name)
    {
        $table = 'activites';
        $data = array($name);
        $col = array('name');
        $q1=new BaseModel();
        $value=$q1->insert($table,  $data,  $col);
        return $value;
    }
    function delete($id)
    {  
       $view_data_history = new BaseModel();         
       $result = $view_data_history->delete("activites",$id,"id");
       return $result;  
   }

    

}
?>