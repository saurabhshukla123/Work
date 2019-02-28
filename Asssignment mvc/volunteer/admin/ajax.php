
<?php
    session_start();
    include '../connection.php';
     
     $con=new config();

    $conn =$con->OpenCon();
    $country_id = $_POST['country_id'];
    $sql = "SELECT id AS city_id,name as city_name,country_id as city_country_id FROM cities where country_id='$country_id'" ;
    $result = $conn->query($sql);
  //  $result_row = [];
    $response = '';
    $flag="";
    while($row = $result->fetch_assoc()) {
        // .echo ($row['id'] == $organization) ? "selected" : "".
        //$response = $response."<option value='".$row['city_id']."'".$value.">".$row['city_name']."</option>";
   
            if(isset($_SESSION["city"]))
            {
                if($_SESSION["city"]==$row['city_id'])
                {
                $flag="selected";
                }
                else
                {
                    $flag="";
                    
                }
            }
        $response = $response."<option value='".$row['city_id']."'".$flag.">".$row['city_name']."</option>";
     }
    echo json_encode($response);exit;

?>