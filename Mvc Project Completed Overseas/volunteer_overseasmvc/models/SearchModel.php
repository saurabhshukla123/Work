<?php

class SearchModel extends BaseModel {
 
    protected $_table = 'categories';

    
    public function fetchAllCategories(){
        $sql = "SELECT * FROM $this->_table";
        $result = $this->_db->query($sql);
        if ($result->num_rows > 0) {
             $resultData = $result->fetch_all( (int) $resulttype = MYSQLI_ASSOC );
            return($resultData);
        } else {
           
            return '';
        }
    } 
    
    public function fetch()
    {

        
    }
}