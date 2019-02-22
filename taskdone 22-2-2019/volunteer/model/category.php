<?php
// include 'connection.php';
class category
{

    function allcategorydetails()
    {
        $conn=OpenCon();
        $query="SELECT id,name FROM categories";
        $activity_result2 = $conn->query($query);
        return $activity_result2;
        
    }
    

    

}
?>