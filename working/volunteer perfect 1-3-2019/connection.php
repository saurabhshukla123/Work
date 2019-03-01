<?php
 
 class config
 {
        function OpenCon()
        {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "volunteeroverseas";
        
        
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        
        
        return $conn;
        }
        
        function CloseCon($conn)
        {
        $conn -> close();
        }
}
   
?>