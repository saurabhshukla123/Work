<?php
session_start();
//include '../connection.php';
include '../model/organization.php';
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
	header( "Location:login.php" );
}

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "organization") {
		$conn = OpenCon();
		$error_pwd = "";
		$error_username = "";
		$error_invalid = "";
		 if ($_SESSION["edit"]=="edit"){			 
			$orgid=$_SESSION["orgid"];
			$user_id=$_SESSION["id"];
			$org=new Organizations();
			$getdetailsorg=$org->getOrganizationDetail($orgid);
	
			if ($getdetailsorg->num_rows > 0) {
	
				while ($row = $getdetailsorg->fetch_assoc()) {
					if($row['user_id']==$user_id)
					{
					$userselect=$row['user_id'];
					$organizationname=$row['name'];
					$website=$row['website'];
					$Organizationemail=$row['email'];
					$new_email=$Organizationemail;
					$contactname=$row['contact_name'];
					$description=$row['description'];
					$logo=$row['logo'];
					$video=$row['video'];
					$logourl=$row['logo'];
					$videourl=$row['video'];
					}
					else
					{
						header( "Location:organizationlisting.php" );
					}
				}
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
				
					$target_dir = "../uploadsvideo/";
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
					$target_dir = "../uploadsimage/";
					$target_fileimgdir = $target_dir .$time.basename($_FILES["organizationimage"]["name"]);
					$target_fileimg=$time.basename($_FILES["organizationimage"]["name"]);
					
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_fileimgdir,PATHINFO_EXTENSION));					
                        
					if (move_uploaded_file($_FILES["organizationimage"]["tmp_name"], $target_fileimgdir)) {
						// echo "The file ". basename( $_FILES["organizationimage"]["name"]). " has been uploaded.";
					} else {
						// echo "<alert>";
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
						$org1=new Organizations();
			            $updateorg=$org1->updateOrganization($organizationname,$target_fileimg,$Organizationemail,$description,$organizationvideo,$website,$contactname,$c_date,$orgid);
					
					
						if (mysqli_errno($updateorg) == 1062) {
							echo '<script language="javascript">';
							echo 'alert("Email is already Exist")';
							echo '</script>';
						}
						else{

						if(mysqli_affected_rows($updateorg))
						{
							echo '<script language="javascript">';
							echo 'alert("Organization Updated successfully")';
							echo '</script>';
							header('Location: organizationlisting.php');
							
						}
						else{
							
							echo '<script language="javascript">';
							echo 'alert("Email is already Exist")';
							echo '</script>';
						}
					}
				

				
				 
					
				
				
			
		}		
			
		}


        // header('Location: ../error.php');
	} 
	elseif ($_SESSION['role'] == "superadmin") {
        // header('Location:../admin/login.php');
		//code for dropdown
	//	$conn = OpenCon();
		$error_pwd = "";
		$error_username = "";
		$error_invalid = "";
		// echo "Connected Successfully";
		
		
		if($_SESSION["add"]==1)
		{		
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$userselect = $_POST['userselect'];			
					$organizationname = $_POST['organizationname'];
					$Organizationemail= $_POST['organizationemail'];
					$contactname = $_POST['contactname'];
					$description = $_POST['description1'];
					$website = $_POST['website'];
					
					
					
					// $time=date();
					$date1 = date_create(date("Y/m/d"));
					$time = time();
					
					//code for video 				
					$target_dir = "../uploadsvideo/";
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
					$target_dir = "../uploadsimage/";
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
					//$sql2="SELECT email FROM organizations WHERE email='$Organizationemail'";
					
					$org2=new Organizations();
					$getdetailsorg2=$org2->validateExistingMail($Organizationemail);


					//$result1 = $conn->query($sql2);
					if($getdetailsorg2->num_rows > 0)
					{
						echo '<script language="javascript">';
						echo 'alert("Email already exists")';
						echo '</script>';
					} 
					else
					{
					$c_date=date("Y-m-d")." ".date("h:i:s");
					//$sql ="INSERT INTO `organizations` (`id`, `user_id`, `name`, `logo`, `email`, `description`, `video`, `website`, `contact_name`, `created_at`,`updated_at`) VALUES (NULL, '$userselect', '$organizationname', '$target_fileimg', '$Organizationemail', '$description', '$organizationvideo', '$website', '$contactname','$c_date', NULL)";
					$q2=new Organizations();
					$value=$q2->insert($userselect, $organizationname, $target_fileimg, $Organizationemail,$description, $organizationvideo, $website, $contactname,$c_date);
					//$result = $conn->query($sql);
					
					if($value==1)
					{
						echo '<script language="javascript">';
						echo 'alert("Organization added successfully")';
						echo '</script>';
						header('Location: organizationlisting.php');	
						//header( "refresh:1;url=organizationlisting.php" );
					//	$_SESSION['id']=0;
					}
					else{
						
						echo '<script language="javascript">';
						echo 'alert("please fill details properly")';
						echo '</script>';
					}
			  
					// echo  "User selected".$_POST['userselect'];
		
					
				}
			}
		
		}

		else if ($_SESSION["edit"]=="edit"){			 
			$orgid=$_SESSION["orgid"];
			
			//$sql1="SELECT * FROM organizations where id='$orgid'";
			 
			$org1=new Organizations();
			$getdetailsorg1=$org1->getOrganizationDetail($orgid);
			//$conn = OpenCon(); 
			// $sql = "SELECT  name,id FROM organizations";
		//	$result = $conn->query($sql1);
	
			if ($getdetailsorg1->num_rows > 0) {
	
				while ($row = $getdetailsorg1->fetch_assoc()) {
					
					$userselect=$row['user_id'];
					$organizationname=$row['name'];
					$website=$row['website'];
					$Organizationemail=$row['email'];
					$new_email=$Organizationemail;
					$contactname=$row['contact_name'];
					$description=$row['description'];
					$logo=$row['logo'];
					
					$video=$row['video'];
					$logourl=$row['logo'];
					$videourl=$row['video'];
					
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
				
			
				// $time=date();
				$date1 = date_create(date("Y/m/d"));
				
				$time =$date1;
				$time = time();
					
					//code for video 
					$target_dir = "../uploadsvideo/";
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
					$target_dir = "../uploadsimage/";
					$target_fileimgdir = $target_dir .$time.basename($_FILES["organizationimage"]["name"]);
					$target_fileimg=$time.basename($_FILES["organizationimage"]["name"]);
					
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_fileimgdir,PATHINFO_EXTENSION));					
                        
					if (move_uploaded_file($_FILES["organizationimage"]["tmp_name"], $target_fileimgdir)) {
						// echo "The file ". basename( $_FILES["organizationimage"]["name"]). " has been uploaded.";
					} else {
						// echo "<alert>";
					}
					
				
						$c_date=date("Y-m-d")." ".date("h:i:s");
					//	echo "organizationvideo=".$organizationvideo;
					//	 echo "organizationvideo dir=".$organizationvideodir;
						 if(empty($_FILES["organizationvideo"] ['name']))
							{
								$organizationvideo=$videourl;
							}
							if(empty($_FILES["organizationimage"] ['name']))
							{
								$target_fileimg=$logourl;
							}
							$admin_update_org=new Organizations();
							$updateorg1=$admin_update_org->updateOrganizationAdmin($userselect,$organizationname,$target_fileimg,$Organizationemail,$description,$organizationvideo,$website,$contactname,$c_date,$orgid);
						if (mysqli_errno($updateorg1) == 1062) {
							echo '<script language="javascript">';
							echo 'alert("Email is already Exists")';
							echo '</script>';
						}
						else{

						if(mysqli_affected_rows($updateorg1))
						{
							echo '<script language="javascript">';
							echo 'alert("Organization Updated successfully")';
							echo '</script>';
							header('Location: organizationlisting.php');
							//header( "refresh:1;url=organizationlisting.php" );
							//$_SESSION['id']=1;
						}
						else{
							
							echo '<script language="javascript">';
							echo 'alert("Email is already Exists")';
							echo '</script>';
						}
					}
					// }

				
				 
					
					
			
		  
				// echo  "User selected".$_POST['userselect'];
	
				
			
		}		
			
		}
	

	}

}
 else {
    header('Location: ../admin/login.php');
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<title>Add Organization</title>
			<meta charset="utf-8">
			<link rel="shortcut icon" href="images/favicon.ico"/>
			<link rel="stylesheet" type="text/css" href="css/main.css">
			<meta charset="UTF-8">
			<meta name="description" content="Free Web tutorials"/>
			<meta name="keywords" content="Ghana,Medical,Volunteer,Kumasi"/>
			<meta name="author" content="TatvaSoft"/>
			<link rel="stylesheet"  href="../css/bootstrap.css" type="text/css" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<link rel="stylesheet"  href="../css/bootstrap.min.css" type="text/css"/>
			<link rel="stylesheet"  href="../css/style.css" type="text/css"/><!--
			<link rel="stylesheet"  href="css/jquery-ui.min.css" type="text/css"/> -->
			<link rel="stylesheet"  href="../css/jquery-ui.css" type="text/css"/>
			<link rel="stylesheet"  href="../css/dropkick.css" type="text/css"/>
			<link rel="stylesheet"  href="../css/media.css" type="text/css"/>
	</head>
	<body>
		<div class="wrapper admin-wrapper admin-login y-scroll">
		<?php  include 'header-admin.php'?> 
	<main style="background-color:#f8f9fa;">

		<div class="container" style="background-color:white;">
			<form name="admin-addorganization" onsubmit="return validateForm() "  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  enctype="multipart/form-data">
			 <div class="row pt-3">
			 	<div class="col-lg-12">
					 <h1 class="text-muted">Add Organization</h1>
				</div>
			 </div>							
			 <div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Select User</span>
			 	</div>
			 	<div class="col-lg-6">
					 <span class="blue font-14px">Organization Name</span>
				</div>
			</div>
			 <div class="row pt-1">
			 	<div class="col-lg-6">
			 		<select class="form-control" name="userselect" id="userselect" <?php if($_SESSION['role']=="organization"){echo "disabled";} else{}?>>
					 <?php
						$conn = OpenCon();
						if($_SESSION['role']=="superadmin")
						{ 
							$sql = "SELECT  u.email AS email,u.password AS password,u.role AS role,u.id AS id  FROM users  AS u WHERE role='organization' AND status = '1'  ";
							
						}
						else if($_SESSION['role']=="organization")
						{
						 $user=$_SESSION['id'];
						 $sql = "SELECT  o.email ,u.password,u.role,u.id ,o.name,o.id as oid FROM users as u INNER JOIN organizations as o on u.id=o.user_id  WHERE role='organization'    and  o.user_id= $user  " ;
						}
						
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {

							while ($row = $result->fetch_assoc()) {
								
								if($_SESSION['role']=="organization")
								{$orgid=$_SESSION["orgid"];
									?>
								<option value="<?php echo $row['oid']; ?>" id="<?php $row['oid'];?>"  <?php echo ($row['oid'] == $orgid) ? "selected" : ""; ?> ><?php echo $row['email']; ?></option>
								<?php }
								else
								{		$orgid=$_SESSION["orgid"];
									 ?>
									<option value="<?php echo $row['id']; ?>" id="<?php $row['id'];?>" <?php echo ($row['id'] == $userselect) ? "selected" : ""; ?>><?php echo $row['email']; ?></option>
									<?php }
														
														}
						}
						CloseCon($conn);
						?>

			 		</select>
			 	</div>
			 	<div class="col-lg-6">
			 		<input type="text" class="form-control" name="organizationname" id="organizationname" placeholder="Organization Name" value="<?php echo $organizationname;?>">
			 	</div>
			</div>

			 <div class="row">
			 	<div class="col-lg-6">
			 		<label class="pink" id="userselect-error" value=""></label>
			 	</div>
			 	<div class="col-lg-6">
			 		<label class="pink" id="organization-name-error" value=""></label>
			 	</div>
			</div>
			 <div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Organization Website</span>
			 	</div>
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Organization Email</span>
			 	</div>
			</div>
			 <div class="row pt-1">
			 	<div class="col-lg-6">
			 		<input type="text" class="form-control" name="website" id="website" placeholder="Enter Website" value="<?php echo $website;?>">
			 	</div>
			 	<div class="col-lg-6">
			 		<input type="text" class="form-control" name="organizationemail" id="organizationemail" placeholder="Enter Email" value="<?php echo $Organizationemail;?>">
			 	</div>
			</div>

			 <div class="row">
			 	<div class="col-lg-6">
			 		<label class="pink" id="website-error" value=""></label>
			 	</div>
			 	<div class="col-lg-6">
			 		<label class="pink" id="organization-email-error" value=""></label>
			 	</div>
			</div>
			 <div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Contact Name</span>
			 	</div>
			 	<div class="col-lg-6">
			 	</div>
			</div>
			<div class="row pt-1">
			 	<div class="col-lg-6">
			 		<input type="text" class="form-control" name="contactname" id="contactname" placeholder="Enter Contact Name" value="<?php echo $contactname;?>">
			 	</div>
			 	<div class="col-lg-6">

			 	</div>
			</div>
			 <div class="row">
			 	<div class="col-lg-6">
			 		<label class="pink" id="contactno-error" value=""></label>
			 	</div>
			</div>
			 <div class="row pt-3">
			 	<div class="col-lg-12">
			 		<span class="blue font-14px">Organization Description</span>
			 	</div>
			</div>
			<div class="row pt-1">
			 	<div class="col-lg-12">
			 		<textarea cols="20" class="form-control" id="description1" name="description1" value=""><?php echo $description;?></textarea>
			 	</div>

			</div>
			 <div class="row">
			 	<div class="col-lg-12">
			 		<label class="pink" id="description-error" value=""></label>
			 	</div>
			</div>
			 <div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Organization Image</span>
			 	</div>
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Organization Video</span>
			 	</div>
			</div>
			 <div class="row pt-1">
			 	<div class="col-lg-6">
			 		<input type="file"  class="form-control" name="organizationimage" id="organizationimage">
			 	</div>
			 	<div class="col-lg-6">
			 		<input type="file" class="form-control" name="organizationvideo" id="organizationvideo">
			 	</div>
			</div>
			 <div class="row">
			 	<div class="col-lg-6">
				<!-- <img src="<?php echo $logo;?>" alt="noimage " height="50px" width="50px">
			-->	<?php echo $logo;?> 
			 		<label class="pink" id="org-img-error" value=""></label>
			 	</div>
			 	<div class="col-lg-6">
			 		<label class="pink" id="org-video-error" value=""></label>
					 <?php echo $video;?>
			 	</div>
			</div>

			 <div class="row pt-3">
			 	<div class="col-lg-12 row justify-content-center">
				 		<div class="row">
				 			<div class="col-lg-12">
				            <input type="submit" class="btn pinkbg text-light bg-danger height-31px" value="SUBMIT" name="submit" width="10px">
							<input type="button" class="btn  text-light pinkbg height-31px"  onClick="document.location.href='organizationlisting.php'" name="cancel" value="CANCEL"/>
				 	    
				          <!-- <button class="btn  text-light pinkbg height-31px"   onclick="location.href='organizationlisting.php';" name="cancel" value="CANCEL"> CANCEL </button> -->
				 	    	</div>
				 	    </div>
			 	</div>
			</div>

</form>
		</div>
	</main>
</div>

		</div>




        <script src="../js/jquery-3.3.1.min.js" ></script>
		<script src="../js/bootstrap.js" > </script>
		<script src="../js/bootstrap.min.js" ></script>
		<script src="../js/dropkick.js" > </script>
		<script src="../js/jquery-ui.js" > </script>
		<script type="text/javascript" src="js/main.js"></script>

		<script type="text/javascript" src="../js/admin-addorganization.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.search-btn-outer .search-btn').click(function(){
					window.location.href = 'search-result.html';
					return false;
				});

			});
		</script>
		<script language="javascript">

						function pasuser(form) {
						if (form.username.value=="saurabh") {
						if (form.password.value=="tatva123") {
						// location=".. /index.html"
						 alert("welcome "+form.username.value)
						} else {
						alert("Invalid Password")
						}
						} else {  alert("Invalid UserID or Password")
						}
						}

</script>
	</body>
</html>