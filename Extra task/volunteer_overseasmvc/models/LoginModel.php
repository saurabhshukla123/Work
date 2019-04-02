<?php
// include 'connection.php';

class LoginModel extends BaseModel 
{

    function validate($username,$password)
    { 
        $view_data_history = new BaseModel();
        $data = array();
        $data['table'] = "users";
        $data['columns'] = "email,password,role,id,status";
        $data['WHERE'] = "email='$username' AND password='$password'";       
        $result = $view_data_history->select($data);
        return $result;
        
    }
    

    

}
?>