<?php
include '../connection.php';
class activity
{

    function allusersdetails()
    {
        $query="SELECT id,email,password,role,status,created_at,updated_at FROM users";
        $activity_result2 = $conn->query($query);
        return $activity_result2;
        
    }
    

    

}
?>