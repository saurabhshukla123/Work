<?php

class HomeModel extends BaseModel {  

    public function getprojectdetails($projectid)
    {        
        $view_data_history = new BaseModel();
        $data = array();        
        $data['table'] = " projects";
        $data['columns'] = "`id`, `organization_id`, `activity_id`, `category_id`, `title`, `image`, `min_age`, `max_age`, `overview_description`, `accommodation_description`, `impact_description`, `project_video_url`, `city_id`, `country_id`, `volunteer_house_address`, `volunteer_house_description`, `volunteer_work_address`, `volunteer_work_description`, `nearest_airport_address`, `cost_description`, `project_startdate_description`, `is_affordable`, `status`, `created_at`, `updated_at`";
        $data['WHERE'] = " id= ".$projectid;
        $result = $view_data_history->select($data);

        return $result;
    }

    public function select($query)
    {
        $conn = OpenCon();
        $sql_activity = $query;

        $activity_result1 = $conn->query($sql_activity);

        return $activity_result1;
    }
    public function getprojectdetailsvolunteer()
    { 
        $conn = OpenCon();
        $sql_activity = $query;
        $activity_result1 = $conn->query($sql_activity);

    }
    public function get_trending_projects()
    {
        $view_data_history = new BaseModel();
        $data = array();
        $merge_array_str = "";
        $merge_array[0] = array('projects as p', 'id', 'project_id', 'INNER', 'project_view_history AS pvh', 'p', 'pvh');
        $merge_array[1] = array('countries  AS c', 'id', 'country_id', 'INNER', 'projects as p', 'c', 'p');
        $merge_array[2] = array('organizations AS o', 'id', 'organization_id', 'INNER', 'projects as p', 'o', 'p');
        $merge_array_str = $view_data_history->join($merge_array);
        $data['table'] = "project_view_history AS pvh";
        $data['columns'] = "COUNT(pvh.project_id) AS number_of_views,pvh.project_id,p.id AS id,p.title AS project_name,c.name AS country_name,o.name AS organization_name,p.image AS image";
        $data['INNER JOIN'] = $merge_array_str;
        $data['GROUP BY'] = " project_id";
        $data['ORDER BY'] = "COUNT(pvh.project_id) DESC";
        $result = $view_data_history->select($data);
        
        return $result;

    }
    public function get_feature_projects()
    {
        $view_data_history = new BaseModel();
        $data = array();
        $merge_array_str = "";
        $merge_array[0] = array('countries AS c', 'country_id', 'id', 'INNER', 'projects as p', 'p', 'c');
        $merge_array_str = $view_data_history->join($merge_array);
        $data['table'] = "projects AS p";
        $data['columns'] = "COUNT(p.id) AS total_projects,c.name AS country_name,c.image AS country_image";
        $data['INNER JOIN'] = $merge_array_str;
        $data['GROUP BY'] = " c.id";

        $result = $view_data_history->select($data);
        return $result;

    }

    public function get_affordable_projects()
    {
        $view_data_history = new BaseModel();
        $data = array();
        $merge_array_str = "";
        $merge_array[0] = array('project_costs AS pc', 'project_id', 'id', 'INNER', 'projects AS p', 'pc', 'p');
        $merge_array[1] = array('organizations AS o', 'id', 'organization_id', 'INNER', 'projects AS p', 'o', 'p');
        $merge_array[2] = array('countries AS c ', 'id', 'country_id', 'INNER', 'projects AS p', 'c', 'p');
        $merge_array_str = $view_data_history->join($merge_array);
        $data['table'] = "projects AS p";
        $data['columns'] = "MIN(pc.cost DIV pc.number_of_weeks) AS per_week_cost ,pc.number_of_weeks AS total_weeks,p.title AS project_name,pc.project_id,c.name AS country_name,p.image AS image,o.name AS oname";
        $data['INNER JOIN'] = $merge_array_str;
        $data['GROUP BY'] = " p.title";
        $data['ORDER BY'] = "per_week_cost asc";
        $data['WHERE'] = "P.is_affordable='YES'";
        $result = $view_data_history->select($data);
        return $result;

    }

    function insert_project($organization,$activity,$category,$title,$imgpath,$min_age,$max_age,$overview_description,$accommodation_description,$NULL6,$video,$city,$country,$NULL1,$NULL2,$NULL3,$NULL4,$NULL5,$status,$null,$c_date)
    {
        $table = 'projects';
        $data = array ($organization,$activity,$category,$title,$imgpath,$min_age,$max_age,$overview_description,$accommodation_description,$NULL6,$video,$city,$country,$NULL1,$NULL2,$NULL3,$NULL4,$NULL5,'yes','1',$c_date);
        $col = array('organization_id','activity_id','category_id','title','image','min_age','max_age','overview_description','accommodation_description','impact_description','project_video_url','city_id','country_id','volunteer_house_address','volunteer_house_description','nearest_airport_address','cost_description','project_startdate_description','is_affordable','status','created_at');
        $q1=new query();
        $value=$q1->insert($table,  $data,  $col);
        return $value;
    }


   function updateProjects($organization,$activity,$category,$title,$img,$min_age,$max_age,$overview_description,$accommodation_description,$city,$country,$c_date,$id)
   {
    $update= new BaseModel();
    $table="projects";
    $data = array(
        "organization_id" => $organization,
        "activity_id" => $activity,
        "category_id" => $category,
        "title" => $title,
        "image" => $img,
        "min_age" => $min_age,
        "max_age" => $max_age,
        "overview_description" => $overview_description,
        
        "accommodation_description" => $accommodation_description,
        "city_id" => $city,
        "country_id" => $country,
        "updated_at" => $c_date  
    );
    $where = "id = '$id'";
    $update_faq=$update->updateData($table, $data, $where,$sequencenumber);
    return $update_faq;

   }
   function delete_project($id)
    {  
       $view_data_history = new BaseModel();         
       $result = $view_data_history->delete("projects",$id,"id");
       return $result;  
   }


   function getDataSearch($columns_filter,$category,$countryid,$activity,$value,$start_from,$limit,$tablename_filter)
   { 
                       $fields3="pc.cost DIV pc.number_of_weeks AS per_week_cost,pc.number_of_weeks AS total_weeks,o.name AS orgname,p.id AS id,p.title AS title,p.image AS image".$columns_filter;
						$join="INNER JOIN organizations AS o on p.organization_id=o.id  INNER JOIN project_costs AS pc  ON pc.project_id=p.id".$tablename_filter;
						$conditions="category_id='$category' AND country_id='$countryid' AND activity_id='$activity'".$value." LIMIT {$start_from} , {$limit}";
                
                        $view_data_history1 = new query();
                        $data = array();
                        $data['table'] = "projects AS p";
                        $data['columns'] = "pc.cost DIV pc.number_of_weeks AS per_week_cost,pc.number_of_weeks AS total_weeks,o.name AS orgname,p.id AS id,p.title AS title,p.image AS image".$columns_filter;
                        $data['INNER JOIN'] = $join;
                        $data['WHERE'] =$conditions;
                       
                        $result = $view_data_history1->select($data);
                        return $result;

   }
   
   function count_records($category,$countryid,$activity1,$value,$tablename_filter,$columns_filter)
   { 
    //  $conn = OpenCon();
     // $total="";
   //   $sql_activity="SELECT  ".$fields." FROM ".$tablename." WHERE ".$conditions;


      $fields3="pc.cost DIV pc.number_of_weeks AS per_week_cost,pc.number_of_weeks AS total_weeks,o.name AS orgname,p.id AS id,p.title AS title,p.image AS image".$columns_filter;
      $tablename3="projects AS p INNER JOIN organizations AS o on p.organization_id=o.id  INNER JOIN project_costs AS pc  ON pc.project_id=p.id".$tablename_filter;
      $conditions4count="category_id='$category' AND country_id='$countryid' AND activity_id='$activity1'".$value;
    

      $view_data_history2 = new BaseModel();
      $activity_result2 = $view_data_history2->count($fields3,$tablename3,$conditions4count);
     
      //$total=mysqli_num_rows($activity_result2);
      
      return $activity_result2;
   }
   function getcountry($anywhere)
   { 
        $fields="id,name";
        $tablename="countries";     
        
        $conditions="name LIKE '%$anywhere%'";
      $get_data= new BaseModel();
      $activity_result2 = $get_data->get_country_records($fields,$tablename,$conditions);
      return $activity_result2;
   }


   public function getprojectlisting($user_id,$id)
   {
       $view_data_history = new BaseModel();
       $data = array();
       $merge_array_str = "";
       $merge_array[0] = array('projects as p', 'id', 'organization_id ', 'INNER', 'organizations as o', 'o', 'p');
       $merge_array_str = $view_data_history->join($merge_array);
       $data['table'] = "organizations as o";
       $data['columns'] = " p.title,p.id,countries.name as countryname,p.created_at as created";
       $data['INNER JOIN'] = $merge_array_str;
       $data['WHERE'] = "o.user_id='$user_id' and p.id='$id'";
       $result = $view_data_history->select($data);
       return $result;

   }
   public function getprojectlistingAll()
   {
       $view_data_history = new BaseModel();
       $data = array();
       $merge_array_str="";
       $merge_array[0]=array('organizations AS o','organization_id','id','INNER','projects AS p','p','o');
       $merge_array[1]=array('countries','country_id','id','INNER','projects AS p','p','countries');      
       $merge_array_str=$view_data_history->join($merge_array);
       $data['table'] = "projects as p";
       $data['columns'] = " p.title,p.id,countries.name as countryname,p.created_at as created";
       $data['INNER JOIN'] = $merge_array_str;
       $data['ORDER BY'] = "p.created_at desc";
       $result = $view_data_history->select($data);
       return $result;

   }
   public function getprojectlistingAllOrg($id)
   {
       $view_data_history = new BaseModel();
       $data = array();
       $merge_array_str="";
       $merge_array[0]=array('organizations AS o','organization_id','id','INNER','projects AS p','p','o');      
       $merge_array[1]=array('countries','country_id','id','INNER','projects AS p','p','countries'); 
       $merge_array_str=$view_data_history->join($merge_array);
       $data['table'] = "projects as p";
       $data['columns'] = "  p.title,p.id,countries.name as countryname,p.created_at as created";
       $data['INNER JOIN'] = $merge_array_str;
       $data['ORDER BY'] = "p.created_at desc";
       $data['WHERE']="o.user_id=".$id;
       $result = $view_data_history->select($data);
       return $result;

   }


   public function verifyUser($id,$projectid)
   {
       $view_data_history = new BaseModel();
       $data = array();
       $merge_array_str="";
       $merge_array[0]=array('projects AS p','organization_id','id','INNER','organizations as o','p','o');      
     
       $merge_array_str=$view_data_history->join($merge_array);
       $data['table'] = "organizations as o";
       $data['columns'] = "o.user_id as id";
       $data['INNER JOIN'] = $merge_array_str;
       $data['WHERE']="o.user_id=".$id." and p.id=".$projectid;
       $result = $view_data_history->select($data);
       return $result;

   }
   

    // public function trendingprojects(){
    //     $sql = "SELECT COUNT(v.project_id) AS number_of_views,v.project_id,p.id AS id,p.title AS project_name,c.name as country_name,o.name AS organization_name,p.image AS image FROM project_view_history AS v join projects p on p.id=v.project_id join countries c on c.id=p.country_id JOIN organizations o on o.id=p.organization_id group by project_id ORDER BY COUNT(v.project_id) DESC";

    //     $result = $this->conn->query($sql);
    //     if ($result->num_rows > 0) {
    //         $resultData = $result->fetch_all( (int) $resulttype = MYSQLI_ASSOC );
    //         return($resultData);
    //     } else {
    //         // if data is not available
    //         return '';
    //     }
    // }   
    // public function featuresdestination(){
    //     $sql ="SELECT COUNT(p.id) as total_projects,c.name AS country_name,c.image AS country_image FROM projects AS p INNER JOIN countries AS c ON p.country_id=c.id GROUP by c.id";

    //     $result = $this->conn->query($sql);
    //     if ($result->num_rows > 0) {     
    //         $resultData = $result->fetch_all( (int) $resulttype = MYSQLI_ASSOC ); 
    //         return($resultData);
    //     } else {
    //         // if data is not available
    //         return '';
    //     }
    // }
       
    // public function affordable_project(){
    //     $affordable_query="SELECT MIN(pc.cost DIV pc.number_of_weeks) AS per_week_cost ,pc.number_of_weeks AS total_weeks,p.title AS project_name,pc.project_id,c.name AS country_name,p.image AS image,o.name AS oname FROM projects AS p JOIN project_costs AS pc ON pc.project_id=p.id JOIN organizations AS o ON o.id=p.organization_id JOIN countries AS C ON c.id=p.country_id WHERE P.is_affordable='YES' GROUP BY p.title ORDER BY per_week_cost asc";
    //     $result = $this->conn->query($affordable_query);
    //     if ($result->num_rows > 0) {     
    //         $resultData = $result->fetch_all( (int) $resulttype = MYSQLI_ASSOC ); 
    //         return($resultData);
    //     } else {
    //         // if data is not available
    //         return '';
    //     }
    // }
}