<?php
// include '../connection.php';

class OrganizationModel extends BaseModel
{

    function getAllOrganizationDetail()
    {
        $getorganization = new  BaseModel();
        $data = array();
        $data['table'] = "organizations";
        $data['columns'] = " * ";  
        $result = $getorganization->select($data);
        return $result; 
     
    }
    public function count_total()
    {
        $view_data_history2 = new  BaseModel();
        $fields = " name,id,email ";
         $tablename = " organizations ";
     
      
        $activity_result2 = $view_data_history2->count_no_of_records($fields,$tablename,$conditions="");
        return $activity_result2;
    }

    public function count_total_org($id)
    {
        $view_data_history2 = new BaseModel();
        $fields = " name,id,email,logo,description,website,contact_name,video  ";
         $tablename = "organizations";
         $conditions = " WHERE user_id='$id '" ;
      
        $activity_result2 = $view_data_history2->count_no_of_records($fields,$tablename,$conditions);
        return $activity_result2;
    }

    function getOrganizationDetailsUser($user)
    {
        $getorganization = new  BaseModel();
        $data = array();
        $data['table'] = "organizations";
        $data['columns'] = "name,id,email,logo,description,website,contact_name,video ";  
        $data['WHERE']="user_id=";
        $result = $getorganization->select($data);
        return $result; 
     
    }
    function getAllOrganizationDetails($startfrom=0,$offset=12)
    {
        $getorganization = new  BaseModel();
        $data = array();
        $data['table'] = "organizations";
        $data['columns'] = "name,id,email";  
        $data['LIMIT']=" $startfrom , $offset ";
        $result = $getorganization->select($data);
        return $result; 
     
    }
    
    function getAllOrganizationDetailUser($id,$startfrom=0,$offset=12)
    {
        $getorganization = new  BaseModel();
        $data = array();
        $data['table'] = "organizations";
        $data['columns'] = " * ";  
        $data['WHERE']="user_id=".$id;
        $data['LIMIT']=" $startfrom , $offset ";
        $result = $getorganization->select($data);
        return $result; 
     
    }
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
        $getorganization = new  BaseModel();
        $data = array();
        $data['table'] = "organizations";
        $data['WHERE']="id=".$id;
        $data['columns'] = " * ";  
        $result = $getorganization->select($data);
        return $result; 
     
    }
  

    function updateOrganization($organizationname,$target_fileimg,$Organizationemail,$description,$organizationvideo,$website,$contactname,$c_date,$orgid)
    {
        $update= new  BaseModel();
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
        $getorganization = new  BaseModel();
        $data = array();
        $data['table'] = "organizations";
        $data['WHERE']=" email= '".$email."'";
        $data['columns'] = " email ";  
        $result = $getorganization->select($data);
        return $result; 
        //$sql2="SELECT email FROM organizations WHERE email='$Organizationemail'";
    }

    function insert1($userselect, $organizationname, $target_fileimg, $Organizationemail,$description, $organizationvideo, $website, $contactname,$c_date)
    {
        $table = 'organizations';
        $data = array ($userselect, $organizationname, $target_fileimg, $Organizationemail,$description, $organizationvideo, $website, $contactname,$c_date);
        $col = array('user_id', 'name', 'logo', 'email', 'description', 'video', 'website', 'contact_name', 'created_at');
        $q1=new  BaseModel();
        $value=$q1->insert($table,  $data,  $col);
        return $value;
    }
    function updateOrganizationAdmin($userselect,$organizationname,$target_fileimg,$Organizationemail,$description,$organizationvideo,$website,$contactname,$c_date,$orgid)
    {
        $update= new  BaseModel();
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

    function delete_organization($id)
    {  
       $view_data_history = new  BaseModel();         
       $result = $view_data_history->delete("organizations",$id,"id");
       return $result;  
   }


   
   function organizationstatus($id)
   {
       $getorganization = new  BaseModel();
       $data = array();
       $data['table'] = "organizations";
       $data['WHERE']="id=".$id;
       $data['columns'] = "u.email AS email,u.password AS password,u.role AS role,u.id AS id  ";  
       $result = $getorganization->select($data);
       return $result; 
    
   }
   
  
    

    

}

?>