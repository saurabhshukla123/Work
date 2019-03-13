<?php
class Applications extends BaseController {

public function insert_applications($name, $phone, $project_id, $project_startdate, $email, $duration)
    {
        $table = 'applications';
        $c_date=date("Y-m-d")." ".date("h:i:s");
        $data = array($name, $phone, $project_id, $project_startdate, $email, $duration,$c_date);
        $col = array('name', 'phone', 'project_id', 'project_startdate', 'email', 'duration', 'created_at');
        $q1 = new BaseModel();
        $value = $q1->insert($table, $data, $col);
        return $value;
    }
}

?>