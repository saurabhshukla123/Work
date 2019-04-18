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

        $startdates= $_POST['startdates'];
        $volunteerhouseaddress=$_POST['volunteerhouseaddress'];$volunteerhousedescription=$_POST['volunteerhousedescription'];$nearestairport=$_POST['nearestairport'];$costdescription=$_POST['costdescription'];
        $startdatedescription=$_POST['startdatedescription'];$impactdescription=$_POST['impactdescription'];
        $affordable=$_POST['affordable'];
        $status=$_POST['status'];
     
        $volunteer_work_description=$_POST['volunteerworkdescription'];
        $volunteer_work_address=$_POST['volunteerworkaddress'];
        $date1 = date_create(date("Y/m/d"));       
        $time =$date1; 
        $c_date=date("Y-m-d")." ".date("h:i:s");
        // $video="";
        // $imgpath="";

        $path = UPLOAD_IMAGE_URL; 
        //image upload


        $time =$date1;
        $time = time();
            
            //code for video 
        
            $target_dir = UPLOAD_VIDEO_URL;
            $projectvideodir= $target_dir.$time.basename($_FILES["projectvideo"]["name"]);
            $projectvideo=$time.basename($_FILES["projectvideo"]["name"]);
            
            
            $uploadOk = 1;
                 
            if (move_uploaded_file($_FILES["projectvideo"]["tmp_name"], $projectvideodir)) {	
                //echo "<script>alert('uploaded');</script>";				
            } else {
                //echo "<script>alert(' not uploaded');</script>";
                // "Sorry, there was an error uploading your file.";
            }
            
            
            //code end for video
            //image code
            $target_dir = UPLOAD_IMAGE_URL;
            $target_fileimgdir = $target_dir .$time.basename($_FILES["projectimage"]["name"]);
            $target_fileimg=$time.basename($_FILES["projectimage"]["name"]);
            
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_fileimgdir,PATHINFO_EXTENSION));					
                
            if (move_uploaded_file($_FILES["projectimage"]["tmp_name"], $target_fileimgdir)) {
              
            } else {
                
            }

            if(empty($_FILES["projectvideo"] ['name']))
            {
                $projectvideo=$videourl;
            }
            if(empty($_FILES["projectimage"] ['name']))
            {
                $target_fileimg=$imageurl;
            }

            //image code ends


       
        $countfiles = count($_FILES['file']['name']);
        $value=$this->projectmodel->insert_records($organization,$activity,$category,$title,$target_fileimg,$min_age,$max_age,$overview_description,$accommodation_description,$impactdescription,$projectvideo,$city,$country,$volunteerhouseaddress,$volunteerhousedescription,$nearestairport,$costdescription,$startdatedescription,$affordable,$status,$c_date,$volunteer_work_description,$volunteer_work_address);
          //code for carasoul
             for($i=0;$i<$countfiles;$i++){
                $filename = $_FILES['file']['name'][$i];
                
                // Upload file
                
                if (move_uploaded_file($_FILES['file']['tmp_name'][$i],$path.$filename)) {
                   
                    $result=$this->projectmodel->insert_project_gallery($value,$filename);
                } else {
              
                }
                 
              }
            //code ends

            //code for startdates
               
            $startdatescount=explode(",",$startdates);
            $countrecords=count($startdatescount);
            //code for carasoul
            for($i=0;$i<$countrecords;$i++){
                $startdatevalue = $startdatescount[$i];
                $startdate  = date("Y/m/d", strtotime($startdatevalue) );
            // insert records
                $result=$this->projectmodel->insert_project_startdates($value,$startdate);
                
            }
            //code ends for start dates

        //Code for costs
        $itemCount = count($_POST["item_name"]);
        $queryValue = "";
        for($i=0;$i<$itemCount;$i++) {
            if(!empty($_POST["item_name"][$i]) && !empty($_POST["item_price"][$i])) {
                $itemValues++;
                if($queryValue!="") {
                    $queryValue .= ",";
                }
                $result=$this->projectmodel->insert_project_costs($value,$_POST["item_name"][$i],$_POST["item_price"][$i] );
                
            }
        }
            
    //code ends for cost

            //code for include
            $itemCount = count($_POST["item_description"]);
            $queryValue = "";
            $itemValues=0;
            for($i=0;$i<$itemCount;$i++) {
                if(!empty($_POST["item_description"][$i]) && !empty($_POST["item_name_radio"][$i])) {
                    $itemValues++;
                    if($queryValue!="") {
                        $queryValue .= ",";
                    }
                 //   echo "Description=".$_POST["item_description"][$i]."yes or no=".$_POST["item_name_radio"][$i];
                    $result=$this->projectmodel->insert_project_includes($value,$_POST["item_description"][$i],$_POST["item_name_radio"][$i]);
                    
                }
            }
    
            //code ends for include


        if($value==true)
            {
                echo '<script language="javascript">';
                echo 'alert("Project added successfully")';
                echo '</script>';
                $_SESSION["status"]="added";
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
 $result['projectstartdates']=$this->projectmodel->getProjectStartDates($projectid);
$result['projectcosts']=$this->projectmodel->getProjectCosts($projectid);
$result['projectgallery']=$this->projectmodel->getProjectGallery($projectid);
$result['projectincludes']=$this->projectmodel->getProjectChecks($projectid);
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
        $videourl=$row->project_video_url;
        $imageurl=$row->image;
        
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
    $startdates= $_POST['startdates']; 
    
    $city = $_POST['city'];
    $country = $_POST['country'];
    $overview_description = $_POST['description'];
    $accommodation_description= $_POST['acc_description'];
    $volunteerhouseaddress=$_POST['volunteerhouseaddress'];$volunteerhousedescription=$_POST['volunteerhousedescription'];$nearestairport=$_POST['nearestairport'];$costdescription=$_POST['costdescription'];
    $startdatedescription=$_POST['startdatedescription'];$impactdescription=$_POST['impactdescription'];
    $affordable=$_POST['affordable'];
    $status=$_POST['status'];
 
    $volunteer_work_description=$_POST['volunteerworkdescription'];
    $volunteer_work_address=$_POST['volunteerworkaddress'];

    $date1 = date_create(date("Y/m/d"));
    $c_date=date("Y-m-d")." ".date("h:i:s");
    $time =$date1; 
    // $img="imgpath";    


    
    $path = UPLOAD_IMAGE_URL; 
    //image upload


    $time =$date1;  
    $time = time();
        
        //code for video 
    
        $target_dir = UPLOAD_VIDEO_URL;
        $projectvideodir= $target_dir.$time.basename($_FILES["projectvideo"]["name"]);
        $projectvideo=$time.basename($_FILES["projectvideo"]["name"]);
        
        
        $uploadOk = 1;
             
        if (move_uploaded_file($_FILES["projectvideo"]["tmp_name"], $projectvideodir)) {	
            //echo "<script>alert('uploaded');</script>";				
        } else {
            //echo "<script>alert(' not uploaded');</script>";
            // "Sorry, there was an error uploading your file.";
        }
        
        
        //code end for video
        //image code
        $target_dir = UPLOAD_IMAGE_URL;
        $target_fileimgdir = $target_dir .$time.basename($_FILES["projectimage"]["name"]);
        $target_fileimg=$time.basename($_FILES["projectimage"]["name"]);
        
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_fileimgdir,PATHINFO_EXTENSION));					
            
        if (move_uploaded_file($_FILES["projectimage"]["tmp_name"], $target_fileimgdir)) {
          
        } else {
            
        }

        if(empty($_FILES["projectvideo"] ['name']))
        {
            $projectvideo=$videourl;
        }
        if(empty($_FILES["projectimage"] ['name']))
        {
            $target_fileimg=$imageurl;
        }

        //image code ends
    $updateorg_project=$this->projectmodel->updateProjects($organization,$activity,$category,$title,$target_fileimg,$min_age,$max_age,$overview_description,$accommodation_description,$city,$country,$c_date,$projectid, $volunteerhouseaddress,$volunteerhousedescription,$nearestairport,$costdescription,$startdatedescription,$impactdescription, $affordable,$status, $volunteer_work_description, $volunteer_work_address,$projectvideo);
    if (isset($_FILES["file"]) && $_FILES["file"]["error"][0] == 0) {
    $deleted=$this->projectmodel->delete_project_carousel($projectid);
    $path = UPLOAD_IMAGE_URL; 
    $countfiles = count($_FILES['file']['name']);
    for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['file']['name'][$i];
        
        // Upload file
        
        if (move_uploaded_file($_FILES['file']['tmp_name'][$i],$path.$filename)) {
           
            $result=$this->projectmodel->insert_project_gallery($projectid,$filename);
        } else {
            //  "<alert>";
        }
         
      }
 

    }


       //code for startdates
       $deletestartdate=$this->projectmodel->delete_project_startdates($projectid);   
       $startdatescount=explode(",",$startdates);
       $countrecords=count($startdatescount);
      
       for($i=0;$i<$countrecords;$i++){
           $startdatevalue = $startdatescount[$i];
           $startdate  = date("Y/m/d", strtotime($startdatevalue) );

       // insert records
           $result=$this->projectmodel->insert_project_startdates($projectid,$startdate);
       
           
       }
       //code ends for start dates





       //code for costs
        $deletecost=$this->projectmodel->delete_project_costs($projectid);   
        $itemCount = count($_POST["item_name"]);
        $queryValue = "";
        for($i=0;$i<$itemCount;$i++) {
            if(!empty($_POST["item_name"][$i])  &&  !empty($_POST["item_price"][$i])) {
                $itemValues++;
                if($queryValue!="") {
                    $queryValue .= ",";
                }
                $result=$this->projectmodel->insert_project_costs($projectid,$_POST["item_name"][$i],$_POST["item_price"][$i] );
                
            }
        }

       //code ends for costs 


       ///code for includes checks
 $deleteincludes=$this->projectmodel->delete_project_includes($projectid); 
 $itemCount = count($_POST["item_description"]);
 $queryValue = "";
 $itemValues=0;
 for($i=0;$i<$itemCount;$i++) {
     if(!empty($_POST["item_description"][$i])  &&  !empty($_POST["item_name_radio"][$i])) {
         $itemValues++;
         if($queryValue!="") {
             $queryValue .= ",";
         }
      //   echo "Description=".$_POST["item_description"][$i]."yes or no=".$_POST["item_name_radio"][$i];
         $result=$this->projectmodel->insert_project_includes($projectid,$_POST["item_description"][$i],$_POST["item_name_radio"][$i]);
         
     }
 }

//  //code include checks ends



    if($updateorg_project)
    {
        echo '<script language="javascript">';
        echo 'alert("Project Updated successfully")';
        echo '</script>';
        $_SESSION["status"]="updated";
        header('Location: ProjectLists');	
    
    }
    else{
        
        echo '<script language="javascript">';
        echo 'alert("Please fill details properly")';
        echo '</script>';
        // header('Location: AddProjects');
        header("Refresh:0; url=AddProjects");
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
        $startdates= $_POST['startdates'];  
        $date1 = date_create(date("Y/m/d"));       
        $time =$date1; 
        $c_date=date("Y-m-d")." ".date("h:i:s");
        $volunteerhouseaddress=$_POST['volunteerhouseaddress'];$volunteerhousedescription=$_POST['volunteerhousedescription'];$nearestairport=$_POST['nearestairport'];$costdescription=$_POST['costdescription'];
        $startdatedescription=$_POST['startdatedescription'];$impactdescription=$_POST['impactdescription'];
        $affordable=$_POST['affordable'];
        $status=$_POST['status'];
     
        $volunteer_work_description=$_POST['volunteerworkdescription'];
        $volunteer_work_address=$_POST['volunteerworkaddress'];
        // $video="";
        // $imgpath="";

        $path = UPLOAD_IMAGE_URL; 
        //image upload


        $time =$date1;
        $time = time();
            
            //code for video 
        
            $target_dir = UPLOAD_VIDEO_URL;
            $projectvideodir= $target_dir.$time.basename($_FILES["projectvideo"]["name"]);
            $projectvideo=$time.basename($_FILES["projectvideo"]["name"]);
            
            
            $uploadOk = 1;
                 
            if (move_uploaded_file($_FILES["projectvideo"]["tmp_name"], $projectvideodir)) {	
                //echo "<script>alert('uploaded');</script>";				
            } else {
                //echo "<script>alert(' not uploaded');</script>";
                // "Sorry, there was an error uploading your file.";
            }
            
            
            //code end for video
            //image code
            $target_dir = UPLOAD_IMAGE_URL;
            $target_fileimgdir = $target_dir .$time.basename($_FILES["projectimage"]["name"]);
            $target_fileimg=$time.basename($_FILES["projectimage"]["name"]);
            
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_fileimgdir,PATHINFO_EXTENSION));					
                
            if (move_uploaded_file($_FILES["projectimage"]["tmp_name"], $target_fileimgdir)) {
              
            } else {
                
            }

            if(empty($_FILES["projectvideo"] ['name']))
            {
                $projectvideo=$videourl;
            }
            if(empty($_FILES["projectimage"] ['name']))
            {
                $target_fileimg=$imageurl;
            }

            //image code ends


       
        $countfiles = count($_FILES['file']['name']);
        $value=$this->projectmodel->insert_records($organization,$activity,$category,$title,$target_fileimg,$min_age,$max_age,$overview_description,$accommodation_description,$impactdescription,$projectvideo,$city,$country,$volunteerhouseaddress,$volunteerhousedescription,$nearestairport,$costdescription,$startdatedescription,$affordable,$status,$c_date,$volunteer_work_description,$volunteer_work_address);
       
        //code for carasoul
     
        for($i=0;$i<$countfiles;$i++){
            $filename = $_FILES['file']['name'][$i];
            
            // Upload file
            
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i],$path.$filename)) {
               
                $result=$this->projectmodel->insert_project_gallery($value,$filename);
            } else {
                //  "<alert>";
            }
             
          }
        //code ends
                //code for startdates
                            
                $startdatescount=explode(",",$startdates);
                $countrecords=count($startdatescount);
                //code for carasoul
                for($i=0;$i<$countrecords;$i++){
                    $startdatevalue = $startdatescount[$i];
                    


                $startdate  = date("Y/m/d", strtotime($startdatevalue) );

                // insert records
                    $result=$this->projectmodel->insert_project_startdates($value,$startdate);
                
                    
                }
                //code ends for start dates

        //Code for costs
            $itemCount = count($_POST["item_name"]);
            $queryValue = "";
            for($i=0;$i<$itemCount;$i++) {
                if(!empty($_POST["item_name"][$i])  &&  !empty($_POST["item_price"][$i])) {
                    $itemValues++;
                    if($queryValue!="") {
                        $queryValue .= ",";
                    }
                    $result=$this->projectmodel->insert_project_costs($value,$_POST["item_name"][$i],$_POST["item_price"][$i] );
                    
                }
            }
                
        //code ends for cost



        //code for include
        $itemCount = count($_POST["item_description"]);
        $queryValue = "";
        $itemValues=0;
        for($i=0;$i<$itemCount;$i++) {
            if(!empty($_POST["item_description"][$i])  &&  !empty($_POST["item_name_radio"][$i])) {
                $itemValues++;
                if($queryValue!="") {
                    $queryValue .= ",";
                }
             //   echo "Description=".$_POST["item_description"][$i]."yes or no=".$_POST["item_name_radio"][$i];
                $result=$this->projectmodel->insert_project_includes($value,$_POST["item_description"][$i],$_POST["item_name_radio"][$i]);
                
            }
        }

        //code ends for include

        
    if($value==true)
        {
            echo '<script language="javascript">';
            echo 'alert("Project added successfully")';
            echo '</script>';
            $_SESSION["status"]="added";
            header('Location: ProjectLists');	
        
        }
        else{
            
            echo '<script language="javascript">';
            echo 'alert("Please fill details properly")';
            echo '</script>';
            header("Refresh:0; url=AddProjects");
        }
  
        

        
    }

}

else if ($_SESSION["edit1"]=="edit"){			 
$projectid=$_SESSION["projectid"];
$result1['projectdetails1']=$this->projectmodel->getprojectdetails($projectid);
$result['projectdetails']=$this->projectmodel->getprojectdetails($projectid);
$result['projectstartdates']=$this->projectmodel->getProjectStartDates($projectid);
$result['projectcosts']=$this->projectmodel->getProjectCosts($projectid);
$result['projectgallery']=$this->projectmodel->getProjectGallery($projectid);
$result['projectincludes']=$this->projectmodel->getProjectChecks($projectid);


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
        $videourl=$row->project_video_url;
        $imageurl=$row->image;
    
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
    $startdates= $_POST['startdates'];
    
    $city = $_POST['city'];
    $country = $_POST['country'];
    $overview_description = $_POST['description'];
    $accommodation_description= $_POST['acc_description'];		




    $volunteerhouseaddress=$_POST['volunteerhouseaddress'];$volunteerhousedescription=$_POST['volunteerhousedescription'];$nearestairport=$_POST['nearestairport'];$costdescription=$_POST['costdescription'];
    $startdatedescription=$_POST['startdatedescription'];$impactdescription=$_POST['impactdescription'];
    $affordable=$_POST['affordable'];
    $status=$_POST['status'];
 
    $volunteer_work_description=$_POST['volunteerworkdescription'];
    $volunteer_work_address=$_POST['volunteerworkaddress'];


    $date1 = date_create(date("Y/m/d"));
    $c_date=date("Y-m-d")." ".date("h:i:s");
    $time =$date1; 
            //code for video 

            
    $time =$date1;  
    $time = time();
        
    
            $target_dir = UPLOAD_VIDEO_URL;
            $projectvideodir= $target_dir.$time.basename($_FILES["projectvideo"]["name"]);
            $projectvideo=$time.basename($_FILES["projectvideo"]["name"]);
            
            
            $uploadOk = 1;
                 
            if (move_uploaded_file($_FILES["projectvideo"]["tmp_name"], $projectvideodir)) {	
                //echo "<script>alert('uploaded');</script>";				
            } else {
                //echo "<script>alert(' not uploaded');</script>";
                // "Sorry, there was an error uploading your file.";
            }
            
            
            //code end for video
            //image code
            $target_dir = UPLOAD_IMAGE_URL;
            $target_fileimgdir = $target_dir .$time.basename($_FILES["projectimage"]["name"]);
            $target_fileimg=$time.basename($_FILES["projectimage"]["name"]);
            
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_fileimgdir,PATHINFO_EXTENSION));					
                
            if (move_uploaded_file($_FILES["projectimage"]["tmp_name"], $target_fileimgdir)) {
              
            } else {
                
            }
    
            if(empty($_FILES["projectvideo"] ['name']))
            {
                $projectvideo=$videourl;
            }
            if(empty($_FILES["projectimage"] ['name']))
            {
                $target_fileimg=$imageurl;
            }
    
            //image code ends
    
    
    
    
    
        $updateorg_project_admin=$this->projectmodel->updateProjects($organization,$activity,$category,$title,$target_fileimg,$min_age,$max_age,$overview_description,$accommodation_description,$city,$country,$c_date,$projectid, $volunteerhouseaddress,$volunteerhousedescription,$nearestairport,$costdescription,$startdatedescription,$impactdescription, $affordable,$status, $volunteer_work_description, $volunteer_work_address,$projectvideo);
        if (isset($_FILES["file"]) && $_FILES["file"]["error"][0] == 0) {
        $deleted=$this->projectmodel->delete_project_carousel($projectid);
        $path = UPLOAD_IMAGE_URL; 
        $countfiles = count($_FILES['file']['name']);
        for($i=0;$i<$countfiles;$i++){
            $filename = $_FILES['file']['name'][$i];
            
            // Upload file
            
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i],$path.$filename)) {
               
                $result=$this->projectmodel->insert_project_gallery($projectid,$filename);
            } else {
                //  "<alert>";
            }
             
          }
     
    }

   
        //code for startdates
        $deletestartdate=$this->projectmodel->delete_project_startdates($projectid);   
        $startdatescount=explode(",",$startdates);
        $countrecords=count($startdatescount);
       
        for($i=0;$i<$countrecords;$i++){
            $startdatevalue = $startdatescount[$i];
            $startdate  = date("Y/m/d", strtotime($startdatevalue) );

        // insert records
            $result=$this->projectmodel->insert_project_startdates($projectid,$startdate);
        
            
        }
        //code ends for start dates





        //code for costs
        $deletecost=$this->projectmodel->delete_project_costs($projectid);   
        $itemCount = count($_POST["item_name"]);
        $queryValue = "";
        for($i=0;$i<$itemCount;$i++) {
            if(!empty($_POST["item_name"][$i]) && !empty($_POST["item_price"][$i])) {
                $itemValues++;
                if($queryValue!="") {
                    $queryValue .= ",";
                }
                $result=$this->projectmodel->insert_project_costs($projectid,$_POST["item_name"][$i],$_POST["item_price"][$i] );
                
            }
        }

        //code ends for costs 

         ///code for includes checks
         
                $deleteincludes=$this->projectmodel->delete_project_includes($projectid); 
                $itemCount = count($_POST["item_description"]);
                $queryValue = "";
                $itemValues=0;
                for($i=0;$i<$itemCount;$i++) {
                    if(!empty($_POST["item_description"][$i]) && !empty($_POST["item_name_radio"][$i])) {
                        $itemValues++;
                        if($queryValue!="") {
                            $queryValue .= ",";
                        }
                    //   echo "Description=".$_POST["item_description"][$i]."yes or no=".$_POST["item_name_radio"][$i];
                        $result=$this->projectmodel->insert_project_includes($projectid,$_POST["item_description"][$i],$_POST["item_name_radio"][$i]);
                        
                    }
                }

 //code include checks ends
    
    if($updateorg_project_admin)
    {
        echo '<script language="javascript">';
        echo 'alert("Project Updated successfully")';
        echo '</script>';
        $_SESSION["status"]="updated";
        header('Location: ProjectLists');	
				
    }
    else{
        
        echo '<script language="javascript">';
        echo 'alert("Please fill details properly")';
        echo '</script>';
        header("Refresh:0; url=AddProjects");
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


public function uploadImages()
 {
//     if(isset($_SESSION["projectid"]))
//     {
//     $projectid=$_SESSION["projectid"];
//     }
//     else{

//     }
$qty = $_POST['data'];
foreach($qty as $value) {

    $qtyOut = $value . "<br>";
 
 }
 echo $qtyOut;

    if(isset($_FILES['galleryimage']['name']))
    {
        
        $file_name_all="";
        for($i=0; $i<count($_FILES['galleryimage']['name']); $i++) 
        {
               $tmpFilePath = $_FILES['galleryimage']['tmp_name'][$i];    
               if ($tmpFilePath != "")
               {    
                   $path = UPLOAD_IMAGE_URL; // create folder 
                   $name = $_FILES['galleryimage']['name'][$i];
                  $size = $_FILES['galleryimage']['size'][$i];

                   list($txt, $ext) = explode(".", $name);
                   $file= time().substr(str_replace(" ", "_", $txt), 0);
                   $info = pathinfo($file);
                   $filename = $file.".".$ext;
                   if(move_uploaded_file($_FILES['galleryimage']['tmp_name'][$i], $path.$filename)) 
                   { 
                      $file_name_all.=$filename."*";
                   }
             }
      
             $filepath = rtrim($file_name_all, '*').$path; 
            echo  $filepath;   
       //  $query=mysqli_query($con,"INSERT into propertyimages (`propertyimage`) VALUES('".addslashes($filepath)."'); ");
        }

    }
    else
    {
        $filepath="";
    }
}



}
