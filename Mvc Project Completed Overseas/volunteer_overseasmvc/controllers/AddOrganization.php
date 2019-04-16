<?php
class AddOrganization extends BaseController {

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {  
        $this->load_model("OrganizationModel"); 
        $this->load_model("UserModel"); 
        
        //code start

        $userselect="";
$organizationname="";
$Organizationemail="";
$contactname="";
$description="";
$website="";
$editfile=0;
$orgid="";
$logo="";
$new_email="";
$video="";

$id="";
$logourl="";
$videourl="";
if(isset($_SESSION["add"]))
{


}
elseif(isset($_SESSION["edit"]))
{

}
else{
	header( "Location: Login" );
}

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "organization") {	
		$error_pwd = "";
		$error_username = "";
		$error_invalid = "";
		 if ($_SESSION["edit"]=="edit"){			 
			$orgid=$_SESSION["orgid"];
			$user_id=$_SESSION["id"];
		//	$org=new Organizations();
		$result["organization_details"]=$this->organizationmodel->getOrganizationDetail($orgid);
		$resultdata = json_encode($result);
		$resultorg = json_decode($resultdata);
		  $flag=0;
			foreach($resultorg->organization_details as $row){
					if($row->user_id==$user_id)
					{
						$flag=1;
						
						$_SESSION["organizationemail"]=$row->email;
					  $userselect=$row->user_id;	
					  $logo=$row->logo;
	
					  $video=$row->video;
					  $logourl=$row->logo;
					  $videourl=$row->video;				
					}
				}
		
		
		if($flag==0)
		{
			header( "Location: OrganizationLists" );
		}
		else
		{

		}

			
			
		}
			if($_SESSION["edit"]=="edit")
			{
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				$organizationname = $_POST['organizationname'];
				$Organizationemail= $_POST['organizationemail'];
				$contactname = $_POST['contactname'];
				$description = $_POST['description1'];
				$website = $_POST['website'];
				
			
				// $time=date();
				$date1 = date_create(date("Y/m/d"));
				
				$time =$date1;
				$time = time();
					
					//code for video 
				
					$target_dir = UPLOAD_VIDEO_URL;
					$organizationvideodir= $target_dir.$time.basename($_FILES["organizationvideo"]["name"]);
					$organizationvideo=$time.basename($_FILES["organizationvideo"]["name"]);
					
					
					$uploadOk = 1;
					     
					if (move_uploaded_file($_FILES["organizationvideo"]["tmp_name"], $organizationvideodir)) {	
						//echo "<script>alert('uploaded');</script>";				
					} else {
						//echo "<script>alert(' not uploaded');</script>";
						// "Sorry, there was an error uploading your file.";
					}
					
					
					//code end for video
					//image code
					$target_dir = UPLOAD_IMAGE_URL;
					$target_fileimgdir = $target_dir .$time.basename($_FILES["organizationimage"]["name"]);
					$target_fileimg=$time.basename($_FILES["organizationimage"]["name"]);
					
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_fileimgdir,PATHINFO_EXTENSION));					
                        
					if (move_uploaded_file($_FILES["organizationimage"]["tmp_name"], $target_fileimgdir)) {
						//  "The file ". basename( $_FILES["organizationimage"]["name"]). " has been uploaded.";
					} else {
						//  "<alert>";
					}

					if(empty($_FILES["organizationvideo"] ['name']))
					{
						$organizationvideo=$videourl;
					}
					if(empty($_FILES["organizationimage"] ['name']))
					{
						$target_fileimg=$logourl;
					}
					
				
					
						$c_date=date("Y-m-d")." ".date("h:i:s");
					//	$org1=new Organizations();
			            $updateorg=$this->organizationmodel->updateOrganization($organizationname,$target_fileimg,$Organizationemail,$description,$organizationvideo,$website,$contactname,$c_date,$orgid);
					
					
						if (mysqli_errno($updateorg) == 1062) {
							echo '<script language="javascript">';
							echo 'alert("Email is already Exist")';
							echo '</script>';
						}
						else{

						if($updateorg)
						{
							echo '<script language="javascript">';
							echo 'alert("Organization Updated successfully")';
							echo '</script>';
							$_SESSION["status"]="updated";
							header('Location: OrganizationLists');
							
						}
						else{
							
							echo '<script language="javascript">';
							echo 'alert("Email is already Exist")';
							echo '</script>';
						}
					}
				

				
				 
					
				
				
			
		}		
			
		}


	} 
	elseif ($_SESSION['role'] == "superadmin") {
    	//code for dropdown
		$error_pwd = "";
		$error_username = "";
		$error_invalid = "";
		if($_SESSION["add"]=="add")
		{		
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$userselect = $_POST['userselect'];			
					$organizationname = $_POST['organizationname'];
					$Organizationemail= $_POST['organizationemail'];
					$contactname = $_POST['contactname'];
					$description = $_POST['description1'];
					$website = $_POST['website'];					
					$date1 = date_create(date("Y/m/d"));
					$time = time();
					
					//code for video 				
					$target_dir = UPLOAD_VIDEO_URL;
					$organizationvideodir= $target_dir.$time.basename($_FILES["organizationvideo"]["name"]);
					$organizationvideo=$time.basename($_FILES["organizationvideo"]["name"]);
					
					$uploadOk = 1;
					     
					if (move_uploaded_file($_FILES["organizationvideo"]["tmp_name"], $organizationvideodir)) {
						// echo "The file ". basename( $_FILES["organizationvideo"]["name"]). " has been uploaded.";
					} else {
						// echo "Sorry, there was an error uploading your file.";
					}
					//code end for video
					//image code
					$target_dir = UPLOAD_IMAGE_URL;
					$target_fileimgdir = $target_dir .$time.basename($_FILES["organizationimage"]["name"]);
					$target_fileimg=$time.basename($_FILES["organizationimage"]["name"]);
					
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_fileimgdir,PATHINFO_EXTENSION));					
                        
					if (move_uploaded_file($_FILES["organizationimage"]["tmp_name"], $target_fileimgdir)) {
						// echo "The file ". basename( $_FILES["organizationimage"]["name"]). " has been uploaded.";
					} else {
						// echo "<alert>";
					}
					//image code ened here
					$time =$date1;
                
                    $flag=0;
					$getdetailsorg2['getemail']=$this->organizationmodel->validateExistingMail($Organizationemail);
					$json_format = json_encode($getdetailsorg2);
			         $getdetailsorg2 = json_decode($json_format);

                    if(!empty($getdetailsorg2->getemail)){
                        foreach($getdetailsorg2->getemail as $row){
                            $flag=1;
                        }
                    }

                 
					if($flag==1)
					{
						echo '<script language="javascript">';
						echo 'alert("Email already exists")';
						echo '</script>';
					} 
					else
					{
					$c_date=date("Y-m-d")." ".date("h:i:s");
	
					$value=$this->organizationmodel->insert1($userselect, $organizationname, $target_fileimg, $Organizationemail,$description, $organizationvideo, $website, $contactname,$c_date);
					if($value==true)
					{
						echo '<script language="javascript">';
						echo 'alert("Organization added successfully")';
						echo '</script>';
						$_SESSION["status"]="added";
                        header('Location: OrganizationLists');
						
			     	}
					else{
						
						echo '<script language="javascript">';
						echo 'alert("Please fill details Properly")';
						echo '</script>';
					}
				}
			}
		
		}

		else if ($_SESSION["edit"]=="edit"){			 
			$orgid=$_SESSION["orgid"];
			$result["organization_details"]=$this->organizationmodel->getOrganizationDetail($orgid);
			$resultdataOrg = json_encode($result);
	     	$UserDataorg = json_decode($resultdataOrg);
            if(!empty($UserDataorg->organization_details)){
                foreach($UserDataorg->organization_details as $row){
					$organizationemail=$row->email;
					$_SESSION["organizationemail"]=$organizationemail;
                   	$logo=$row->logo;
                    $video=$row->video;
                    $logourl=$row->logo;
                    $videourl=$row->video;	
                }
            }
			
		}
			if($_SESSION["edit"]=="edit")
			{
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$userselect = $_POST['userselect'];			
				$organizationname = $_POST['organizationname'];
				$Organizationemail= $_POST['organizationemail'];
				$contactname = $_POST['contactname'];
				$description = $_POST['description1'];
				$website = $_POST['website'];				
				$date1 = date_create(date("Y/m/d"));				
				$time =$date1;
				$time = time();
					
					//code for video 
                    $target_dir =UPLOAD_VIDEO_URL;
                  
					$organizationvideodir= $target_dir.$time.basename($_FILES["organizationvideo"]["name"]);
					$organizationvideo=$time.basename($_FILES["organizationvideo"]["name"]);
					
					$uploadOk = 1;
                    // print_r($organizationvideodir);
                    // die();
					if (move_uploaded_file($_FILES["organizationvideo"]["tmp_name"], $organizationvideodir)) {
						// echo "The file ". basename( $_FILES["organizationvideo"]["name"]). " has been uploaded.";
					} else {
						// echo "Sorry, there was an error uploading your file.";
					}
					//code end for video
					//image code
					$target_dir = UPLOAD_IMAGE_URL;
					$target_fileimgdir = $target_dir .$time.basename($_FILES["organizationimage"]["name"]);
					$target_fileimg=$time.basename($_FILES["organizationimage"]["name"]);
					
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_fileimgdir,PATHINFO_EXTENSION));					
                        
					if (move_uploaded_file($_FILES["organizationimage"]["tmp_name"], $target_fileimgdir)) {
						// echo "The file ". basename( $_FILES["organizationimage"]["name"]). " has been uploaded.";
					} else {
						
					}
						$c_date=date("Y-m-d")." ".date("h:i:s");
					
						 if(empty($_FILES["organizationvideo"] ['name']))
							{
								$organizationvideo=$videourl;
							}
							if(empty($_FILES["organizationimage"] ['name']))
							{
								$target_fileimg=$logourl;
							}
						//	$admin_update_org=new Organizations();
							$updateorg1=$this->organizationmodel->updateOrganizationAdmin($userselect,$organizationname,$target_fileimg,$Organizationemail,$description,$organizationvideo,$website,$contactname,$c_date,$orgid);
						if (mysqli_errno($updateorg1) == 1062) {
							echo '<script language="javascript">';
							echo 'alert("Email is already Exists")';
							echo '</script>';
						}
						else{

						if($updateorg1)
						{
							echo '<script language="javascript">';
							echo 'alert("Organization Updated successfully")';
							echo '</script>';
							$_SESSION["status"]="updated";
							header('Location: OrganizationLists');		

						}
						else{
							
							echo '<script language="javascript">';
							echo 'alert("Email is already Exists")';
							echo '</script>';
						}
					}				
		}		
			
		}
	

	}

}
 else {
    header('Location: Login');
}

   

//code ends

                if($_SESSION['role']=="superadmin")
                {                                             
                    $result['userdetails']=$this->usermodel->allOrganizationsUsers();
                }
                else if($_SESSION['role']=="organization")
                {
                $user=$_SESSION['id'];
                $result['userdetails']=$this->usermodel->organizationsUsers($user);
                }
        


      //  $this->load_view('admin/AddOrganization',);
        $json_format = json_encode($result);
        
        $this->load_view('admin/AddOrganization',array('UserData' => $json_format));
   
   
	}
	
	public function checkmail() { 

		$this->load_model("OrganizationModel");
			$Organizationemail = $_POST['email'];
			$flag=0;
			$getdetailsorg2['getemail']=$this->organizationmodel->validateExistingMail($Organizationemail);
			$json_format = json_encode($getdetailsorg2);
			$getdetailsorg2 = json_decode($json_format);
			if(!empty($getdetailsorg2->getemail)){
				foreach($getdetailsorg2->getemail as $row){
					$flag=1;
					$new_email=$row->email;
				}
			}
		
			if($_SESSION["organizationemail"]==$new_email)
					{
						echo "not exists";						
					}
		    
			else if($flag==1)
			{
				echo "exists";
			} 
			else
			{
				echo "not exists";
			}


			
	
	}
}
?>