<?php
// include 'connection.php';
class activity
{

    function allactivitydetails()
    { 
        $conn=OpenCon();
        $query="SELECT id,name FROM activites";
        $activity_result2 = $conn->query($query);
        return $activity_result2;
        
    }
    

    

}
?>