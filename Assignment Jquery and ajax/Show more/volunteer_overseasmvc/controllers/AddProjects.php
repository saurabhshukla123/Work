<?php
class AddProjects extends BaseController {

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {  

        $this->load_model("ProjectModel");
        $this->load_model("CategoriesModel");
        $this->load_model("OrganizationModel");
        $this->load_model("ActivitiesModel");
        $this->load_model("CountriesModel");
        $organization = "";			
        $category ="";
        $activity= "";
        $min_age = "";
        $title = "";
        $max_age = "";
        
        $city ="";
        $country ="";
        $overview_description = "";
        $accommodation_description="";
        $video="";
$id="";

if(isset($_SESSION["add1"]))
{


}
elseif(isset($_SESSION["edit1"]))
{

}
else{
header( "Location: Login" );
}



if (isset($_SESSION['role'])) {
if ($_SESSION['role'] == "organization") {

$user_id=$_SESSION["id"];
$error_pwd = "";
$error_username = "";
$error_invalid = "";			
if($_SESSION["add1"]=="add1")
{	$_SESSION["city"]="";	

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $organization = $_POST['organization'];			
        $category = $_POST['category'];
        $activity= $_POST['activity'];
        $min_age = $_POST['min-age'];
        $title = $_POST['title'];
        $max_age = $_POST['max-age'];
        
        $city = $_POST['city'];
        $country = $_POST['country'];
        $overview_description = $_POST['description'];
        $accommodation_description= $_POST['acc_description'];

        
        // $time=date();
        $date1 = date_create(date("Y/m/d"));
        $video="";
        $time =$date1; 
        $c_date=date("Y-m-d")." ".date("h:i:s");

        //x`$q2=new projects();
        $NULL="";$NULL1="";$NULL2="";$NULL3="";$NULL4="";
        $NULL5="";$NULL6="";
        $null="";
        $imgpath="";
        $status="yes";
        $value=$this->projectmodel->insert_records($organization,$activity,$category,$title,$imgpath,$min_age,$max_age,$overview_description,$accommodation_description,$NULL6,$video,$city,$country,$NULL1,$NULL2,$NULL3,$NULL4,$NULL5,$status,$null,$c_date);
       // $value=$this->projectmodel->insert_records($organization,$activity,$category,$title,$imgpath,$min_age,$max_age,$overview_description,$accommodation_description,$NULL6,$video,$city,$country,$NULL1,$NULL2,$NULL3,$NULL4,$NULL5,$status,$null,$c_date);

        if($value==true)
            {
                echo '<script language="javascript">';
                echo 'alert("Project added successfully")';
                echo '</script>';
                header('Location: ProjectLists');	
            
            }
            else{
                
                echo '<script language="javascript">';
                echo 'alert("please fill details properly")';
                echo '</script>';
            }
        

        
    }

}

else if ($_SESSION["edit1"]=="edit"){			 
$projectid=$_SESSION["projectid"];
 $result["projectdetails"]=$this->projectmodel->getprojectdetails($projectid);
 $user_id=$_SESSION["id"];

 $result_user["user_details"]=$this->projectmodel->verifyUser($user_id,$projectid);
 $resultuser= json_encode($result_user);

  $UserData = json_decode($resultuser);
 if(!empty($UserData->user_details)){
     foreach($UserData->user_details as $row){
        if($row->id==$user_id)
        {
    
        }else
        {
            header( "Location: ProjectLists" );
        }
    
    }
}
else
{
    header( "Location: ProjectLists" );
}
$resultdataProject = json_encode($result);
$ProjectData = json_decode($resultdataProject);

if(!empty($ProjectData->projectdetails)){
    foreach($ProjectData->projectdetails as $row){
        
        $organization=$row->organization_id;
        $activity=$row->activity_id;
        $category=$row->category_id;
        $title=$row->title;
        $min_age=$row->min_age;
        $max_age=$row->max_age;
        $city=$row->city_id;
        $country = $row->country_id;
        $overview_description = $row->overview_description;
        $accommodation_description= $row->accommodation_description;
        $_SESSION["city"]=$row->city_id;
    
    }
}
}
if($_SESSION["edit1"]=="edit")
{
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectid=$_SESSION["projectid"];
    $organization = $_POST['organization'];			
    $category = $_POST['category'];
    $activity= $_POST['activity'];
    $min_age = $_POST['min-age'];
    $title = $_POST['title'];
    $max_age = $_POST['max-age'];
    
    $city = $_POST['city'];
    $country = $_POST['country'];
    $overview_description = $_POST['description'];
    $accommodation_description= $_POST['acc_description'];

    $date1 = date_create(date("Y/m/d"));
    $c_date=date("Y-m-d")." ".date("h:i:s");
    $time =$date1; 
    $img="imgpath";
    //$update_org_projects=new projects();
    $updateorg_project=$this->projectmodel->updateProjects($organization,$activity,$category,$title,$img,$min_age,$max_age,$overview_description,$accommodation_description,$city,$country,$c_date,$projectid);

    if(mysqli_affected_rows($updateorg_project))
    {
        echo '<script language="javascript">';
        echo 'alert("Project Updated successfully")';
        echo '</script>';
        $_SESSION["status"]="updated";
        header('Location: ProjectLists');	
    
    }
    else{
        
        echo '<script language="javascript">';
        echo 'alert("please fill details properly")';
        echo '</script>';
    }

    

    
}		

}




} 
elseif ($_SESSION['role'] == "superadmin") {

$error_pwd = "";
$error_username = "";
$error_invalid = "";



if($_SESSION["add1"]=="add1")
{		
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $organization = $_POST['organization'];			
        $category = $_POST['category'];
        $activity= $_POST['activity'];
        $min_age = $_POST['min-age'];
        $title = $_POST['title'];
        $max_age = $_POST['max-age'];        
        $city = $_POST['city'];
        $country = $_POST['country'];
        $overview_description = $_POST['description'];
        $accommodation_description= $_POST['acc_description'];			

        $date1 = date_create(date("Y/m/d"));
        
        $video="";
        $time =$date1; 
        $c_date=date("Y-m-d")." ".date("h:i:s");
        $NULL="";$NULL1="";$NULL2="";$NULL3="";$NULL4="";
        $NULL5="";$NULL6="";
        $null="";
        $imgpath="";
        $status="yes";
        $value=$this->projectmodel->insert_records($organization,$activity,$category,$title,$imgpath,$min_age,$max_age,$overview_description,$accommodation_description,$NULL6,$video,$city,$country,$NULL1,$NULL2,$NULL3,$NULL4,$NULL5,$status,$null,$c_date);

    if($value==true)
        {
            echo '<script language="javascript">';
            echo 'alert("Project added successfully")';
            echo '</script>';
            header('Location: ProjectLists');	
        
        }
        else{
            
            echo '<script language="javascript">';
            echo 'alert("please fill details properly")';
            echo '</script>';
        }
  
        

        
    }

}

else if ($_SESSION["edit1"]=="edit"){			 
$projectid=$_SESSION["projectid"];
$result1['projectdetails1']=$this->projectmodel->getprojectdetails($projectid);
$result['projectdetails']=$this->projectmodel->getprojectdetails($projectid);
$resultdataProject = json_encode($result1);
$ProjectDataDetails = json_decode($resultdataProject);

if(!empty($ProjectDataDetails->projectdetails1)){
    foreach($ProjectDataDetails->projectdetails1 as $row){
        
        $organization=$row->organization_id;
        $activity=$row->activity_id;
        $category=$row->category_id;
        $title=$row->title;
        $min_age=$row->min_age;
        $max_age=$row->max_age;
        $city=$row->city_id;
        $country = $row->country_id;
        $overview_description = $row->overview_description;
        $accommodation_description= $row->accommodation_description;
        $_SESSION["city"]=$row->city_id;
    
    }
}
}
if($_SESSION["edit1"]=="edit")
{
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectid=$_SESSION["projectid"];
    $organization = $_POST['organization'];			
    $category = $_POST['category'];
    $activity= $_POST['activity'];
    $min_age = $_POST['min-age'];
    $title = $_POST['title'];
    $max_age = $_POST['max-age'];
    
    $city = $_POST['city'];
    $country = $_POST['country'];
    $overview_description = $_POST['description'];
    $accommodation_description= $_POST['acc_description'];		

    $date1 = date_create(date("Y/m/d"));
    $c_date=date("Y-m-d")." ".date("h:i:s");
    $time =$date1; 
    $img="imgpath";
   
    $updateorg_project_admin=$this->projectmodel->updateProjects($organization,$activity,$category,$title,$img,$min_age,$max_age,$overview_description,$accommodation_description,$city,$country,$c_date,$projectid);

    if(mysqli_affected_rows($updateorg_project_admin))
    {
        echo '<script language="javascript">';
        echo 'alert("Project Updated successfully")';
        echo '</script>';
        header('Location: ProjectLists');	
				
    }
    else{
        
        echo '<script language="javascript">';
        echo 'alert("Please fill details properly")';
        echo '</script>';
    }

    

    
}		

}


}

}
else {
header('Location: ../admin/login.php');
}


$result['categories']=$this->categoriesmodel->getallcategories();
$result['activities']=$this->activitiesmodel->getallactivities();
$result['countries'] = $this->countriesmodel->getallcountries();


                   if($_SESSION['role']=="superadmin")
						{
							$result['organization_data']=$this->organizationmodel->getAllOrganizationDetail();
						
						}
						else{
						$id=$_SESSION['id'];						
						$result['organization_data']=$this->organizationmodel->getAllOrganizationDetailUser($id);					
						
						
                        }
                        $json_format = json_encode($result);
                        $this->load_view('admin/AddProjects',array('ProjectsData' => $json_format));



     
   
    }
public function getCity()
{
$this->load_model("CountriesModel");
$country_id = $_POST['country_id'];
$result['getCities']=$this->countriesmodel->getallCities($country_id);
$json_format = json_encode($result);
$citiesResult = json_decode($json_format);
$response = '';
$flag="";
foreach ($citiesResult->getCities as $row) {
    
        if(isset($_SESSION["city"]))
        {
            if($_SESSION["city"]==$row->city_id)
            {
            $flag="selected";
            }
            else
            {
                $flag="";
                
            }
        }
    $response = $response."<option value='".$row->city_id."'".$flag.">".$row->city_name."</option>";
 }
echo json_encode($response);exit;
}
}
