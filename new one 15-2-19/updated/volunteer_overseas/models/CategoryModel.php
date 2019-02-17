<?php

class CategoryModel extends BaseModel {
    /* Table which is mapped to current model */
    protected $_table = 'categories';

    public function fetchAllCategories(){
        $sql = "SELECT * FROM $this->_table";
        $result = $this->_db->query($sql);
        if ($result->num_rows > 0) {
            // if data is available use fetch_all() method to fetch all the records.
            // (int) $resulttype = MYSQLI_ASSOC --- parameter will fetch array of values with non-indexed keys
            $resultData = $result->fetch_all( (int) $resulttype = MYSQLI_ASSOC );
            return($resultData);
        } else {
            // if data is not available
            return '';
        }
    }   
}