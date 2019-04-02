<?php
class Applications extends BaseController {

public function insert_applications($name, $phone, $project_id, $project_startdate, $email, $duration)
    {
        $table = 'applications';
        $c_date=date("Y-m-d")." ".date("h:i:s");
        $data = array($name, $phone, $project_id, $project_startdate, $email, $duration,$c_date);
        $col = array('name', 'phone', 'project_id', 'project_startdate', 'email', 'duration', 'created_at');
        $q1 = new BaseModel();
        $value = $q1->insert($table, $data, $col);
        return $value;
    }



    function allApplicationDetails($startfrom=0,$offset=12,$userid="")
    {  
       $view_data_history = new BaseModel();
       $data = array();
       $merge_array_str = "";
       $merge_array[0] = array('projects as p', 'id', 'project_id ', 'INNER', 'applications as a','p','a');
       $merge_array[1] = array('organizations as o', 'id', 'organization_id ', 'INNER', 'organizations as o','o','p');
       $merge_array_str = $view_data_history->join($merge_array);

       

       $data['table'] = "applications as a";
       $data['columns'] = "a.name as 'name', a.phone as 'phone',a.project_id as 'project_id',a.project_startdate as 'project_startdate',a.email as 'email',a.created_at as 'created_at',a.duration as 'duration',a.id as 'id',p.title as title";
       $data['ORDER BY'] = "created_at";
       $data['INNER JOIN'] = $merge_array_str;
       if(isset($userid) && $userid!="")
       {
        $data['WHERE']="o.user_id='$userid'";
       }


       if(isset($startfrom) && isset($offset))
       {
           $data['LIMIT']=" $startfrom,$offset ";
       }
       $result = $view_data_history->select($data);

    //     echo "Userid=".$userid;
    //     echo "<pre>";
    //    print_r($result);
    //    die();
       return $result;  
   }


   function count_records($userid="")
   {
    $view_data_history = new BaseModel();
    $data = array();
    $merge_array_str = "";
    $merge_array[0] = array('projects as p', 'id', 'project_id ', 'INNER', 'applications as a','p','a');
    $merge_array[1] = array('organizations as o', 'id', 'organization_id ', 'INNER', 'organizations as o','o','p');
    $merge_array_str = $view_data_history->join($merge_array);
    $datafield = "a.name as 'name', a.phone as 'phone',a.project_id as 'project_id',a.project_startdate as 'project_startdate',a.email as 'email',a.created_at as 'created_at',a.duration as 'duration',a.id as 'id',p.title as title";
 
    if(isset($userid) && $userid!="")
       {
        $conditions=" WHERE o.user_id='$userid'";
       }
       else
       {
           $conditions="";
       }

    $innerjoin=$merge_array_str;
    $view_data_history2 = new BaseModel();
    $fields = $datafield;
    $tablename = "applications as a";
   
    $activity_result2 = $view_data_history2->count_no_of_records($fields,$tablename,$conditions,$innerjoin);
    return $activity_result2;
       
   }
}

?>