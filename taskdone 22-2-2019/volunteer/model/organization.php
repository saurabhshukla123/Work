<?php
// include '../connection.php';
include($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class Organizations
{

    function allorganizationdetails()
    {
        $query="SELECT 'id', 'user_id', 'name', 'logo', 'email', 'description', 'video', 'website', 'contact_name', 'created_at', 'updated_at' FROM organizations";
        $activity_result2 = $conn->query($query);
        return $activity_result2;
        
    }
    function getorganizationdetails($id)
    {
        $query="SELECT 'id', 'user_id', 'name', 'logo', 'email', 'description', 'video', 'website', 'contact_name', 'created_at', 'updated_at' FROM organizations WHERE id='$id'";
        $activity_result2 = $conn->query($query);
        return $activity_result2;
        
    }


    function getOrganizationDetail($id)
    {
        $getorganization = new query();
        $data = array();
        $data['table'] = "organizations";
        $data['WHERE']="id=".$id;
        $data['columns'] = " * ";  
        $result = $getorganization->select($data);
        return $result; 
     
    }

    function updateOrganization($organizationname,$target_fileimg,$Organizationemail,$description,$organizationvideo,$website,$contactname,$c_date,$orgid)
    {
        $update= new query();
        $table="organizations";
        $data = array(
            "name" => $organizationname,
            "logo" => $target_fileimg,
            "email" => $Organizationemail,
            "description" => $description,
            "video" => $organizationvideo,
            "website" => $website,
            "contact_name" => $contactname,            
            "updated_at" => $c_date
         
        );
        $where = "id = '$orgid'";
        $update_faq=$update->updateData($table, $data, $where);
        return $update_faq;

    }

    function validateExistingMail($email)
    {
        $getorganization = new query();
        $data = array();
        $data['table'] = "organizations";
        $data['WHERE']=" email= '".$email."'";
        $data['columns'] = " email ";  
        $result = $getorganization->select($data);
        return $result; 
        //$sql2="SELECT email FROM organizations WHERE email='$Organizationemail'";
    }

    function insert($userselect, $organizationname, $target_fileimg, $Organizationemail,$description, $organizationvideo, $website, $contactname,$c_date)
    {
        $table = 'organizations';
        $data = array ($userselect, $organizationname, $target_fileimg, $Organizationemail,$description, $organizationvideo, $website, $contactname,$c_date);
        $col = array('user_id', 'name', 'logo', 'email', 'description', 'video', 'website', 'contact_name', 'created_at');
        $q1=new query();
        $value=$q1->insert($table,  $data,  $col);
        return $value;
    }
    function updateOrganizationAdmin($userselect,$organizationname,$target_fileimg,$Organizationemail,$description,$organizationvideo,$website,$contactname,$c_date,$orgid)
    {
        $update= new query();
        $table="organizations";
        $data = array(
            "user_id"=> $userselect,
            "name" => $organizationname,
            "logo" => $target_fileimg,
            "email" => $Organizationemail,
            "description" => $description,
            "video" => $organizationvideo,
            "website" => $website,
            "contact_name" => $contactname,            
            "updated_at" => $c_date
         
        );
        $where = "id = '$orgid'";
        $update_faq=$update->updateData($table, $data, $where);
        return $update_faq;

    }
    

    

}

?>