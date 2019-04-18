<?php

class UserModel extends BaseModel
{

    function allusersdetails()
    {
        $user1 = new BaseModel();
        $data = array();
        $data['table'] = "users";
        $data['columns'] = "id,email,password,role,status,created_at,updated_at,tokenNumber,tokenDate ";
        $result = $user1->select($data);
        return $result;
        
    }
    function getdetails($id)
    {
        $user1 = new BaseModel();
        $data = array();
        $data['table'] = "users";
        $data['columns'] = "id,email,password,role,status,created_at,updated_at,tokenNumber,tokenDate ";
        $data['WHERE']=" email='$id' ";
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

    
    public function updateTokenDetail($id, $tokenNumber,$tokenDate)
    {
        $update= new BaseModel();
        $table="users";
        $data = array(
            "tokenNumber" => $tokenNumber,
            "tokenDate" => $tokenDate
            
        );
        $where = "email = '$id'";
        $update_data=$update->updateData($table, $data, $where);
        return $update_data;
    }

    function getTokenDetails($tokennumber)
    {
        $user1 = new BaseModel();
        $data = array();
        $data['table'] = "users";
        $data['columns'] = "id,email,password,role,status,created_at,updated_at,tokenNumber,tokenDate ";
        $data['WHERE']=" tokenNumber ='$tokennumber' ";
        $result = $user1->select($data);
        return $result;
        
    }

    public function updatePassword($emailid, $password)
    {
        $update= new BaseModel();
        $table="users";
        $data = array(
            "  `password`" => $password,
            " `tokenNumber`" => "XXXXXXXXX",
            " `tokenDate`" =>"2010-01-01",
        );
        $where = " `email` = '$emailid'";
        $update_data=$update->updateData($table, $data, $where);
        return $update_data;
    }


    

    

}
?>