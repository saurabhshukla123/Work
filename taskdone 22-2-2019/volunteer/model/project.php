<?php
// require_once 'dynamicquery.php';
include($_SERVER['DOCUMENT_ROOT']."/volunteer/dynamicquery.php");
class projects
{

    public function allprojectdetails()
    {
        $query = "SELECT `id`, `organization_id`, `activity_id`, `category_id`, `title`, `image`, `min_age`, `max_age`, `overview_description`, `accommodation_description`, `impact_description`, `project_video_url`, `city_id`, `country_id`, `volunteer_house_address`, `volunteer_house_description`, `volunteer_work_address`, `volunteer_work_description`, `nearest_airport_address`, `cost_description`, `project_startdate_description`, `is_affordable`, `status`, `created_at`, `updated_at` FROM projects";
        $activity_result2 = $conn->query($query);
        return $activity_result2;
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
        $view_data_history = new query();
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
        $view_data_history = new query();
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
        $view_data_history = new query();
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

    function insert($organization,$activity,$category,$title,$imgpath,$min_age,$max_age,$overview_description,$accommodation_description,$NULL6,$video,$city,$country,$NULL1,$NULL2,$NULL3,$NULL4,$NULL5,$status,$null,$c_date)
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
    $update= new query();
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
       $view_data_history = new query();         
       $result = $view_data_history->delete("projects",$id,"id");
       return $result;  
   }
   

}
