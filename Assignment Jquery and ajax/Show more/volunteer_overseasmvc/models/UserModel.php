<?php

// require_once($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class UserModel extends BaseModel
{

    function allusersdetails()
    {
        $user1 = new BaseModel();
        $data = array();
        $data['table'] = "users";
        $data['columns'] = "id,name,password,role,status,created_at,updated_at ";
        $result = $user1->select($data);
        return $result;
        
    }
    function allOrganizationsUsers()
    {
        $getorgusers = new BaseModel();
        $data = array();
        $data['table'] = " users  AS u";
        $data['WHERE']="role='organization' AND status = '1'";
        $data['columns'] = "u.email AS email,u.password AS password,u.role AS role,u.id AS id  ";  
        $result = $getorgusers->select($data);
        return $result; 
     
    }

    function organizationsUsers($user)
    {
        $getorgusers = new BaseModel();
        $merge_array_str = "";
        $merge_array[0] = array('organizations AS o', 'id', 'user_id', 'INNER', 'users as u', 'u', 'o');
        $merge_array_str = $getorgusers->join($merge_array);        
        
        $data = array();
        $data['table'] = " users  AS u";
        $data['WHERE']="role='organization'    and  o.user_id= '$user'";
        $data['columns'] = "o.email ,u.password,u.role,u.id ,o.name,o.id as oid";  
        $data['INNER JOIN']=$merge_array_str;
        $result = $getorgusers->select($data);
        return $result; 
     
    }
    


    

    

}
?>