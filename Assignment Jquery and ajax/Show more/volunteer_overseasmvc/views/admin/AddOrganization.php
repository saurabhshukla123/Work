<?php

if (isset($_SESSION["role"])) {
	if ($_SESSION["role"] == "superadmin") {
	   
	} 
	else if ($_SESSION["role"] == "organization") {
	   
	}
	else {
		header('Location: Login');
	}
}else
{
	header('Location: Login');
}

//include '../connection.php';
$assets_url = ASSETS_URL;
$UserData = json_decode($UserData);




if(!empty($UserData->organization_details)){
    foreach($UserData->organization_details as $row){
        
        $userselect=$row->user_id;
        $organizationname=$row->name;
        $website=$row->website;
        $Organizationemail=$row->email;
        $new_email=$Organizationemail;
        $contactname=$row->contact_name;
        $description=$row->description;
        $logo=$row->logo;
        
        $video=$row->video;
        $logourl=$row->logo;
        $videourl=$row->video;					
    }
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<title>Add Organization</title>
			<meta charset="utf-8">
			<link rel="shortcut icon" href="<?php echo ASSETS_URL;?>images/favicon.ico"/>
			<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_URL;?>css/main.css">
			<meta charset="UTF-8">
			<meta name="description" content="Free Web tutorials"/>
			<meta name="keywords" content="Ghana,Medical,Volunteer,Kumasi"/>
			<meta name="author" content="TatvaSoft"/>
			<link rel="stylesheet"  href="<?php echo ASSETS_URL;?>css/bootstrap.css" type="text/css" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<link rel="stylesheet"  href="<?php echo ADMIN_ASSETS_URL;?>css/bootstrap.min.css" type="text/css"/>
			<link rel="stylesheet"  href="<?php echo ADMIN_ASSETS_URL;?>css/style.css" type="text/css"/>
			<link rel="stylesheet"  href="<?php echo ASSETS_URL;?>css/jquery-ui.css" type="text/css"/>
			<link rel="stylesheet"  href="<?php echo ASSETS_URL;?>css/dropkick.css" type="text/css"/>
			<link rel="stylesheet"  href="<?php echo ASSETS_URL;?>css/media.css" type="text/css"/>
	</head>
	<body>
		<div class="wrapper admin-wrapper admin-login y-scroll small-header">
		<?php  include 'header-admin.php'?> 
	<main style="background-color:#f8f9fa;">

		<div class="container" style="background-color:white;">
			<form name="admin-addorganization" onsubmit="return validateForm()"  method="post" action="AddOrganization"  enctype="multipart/form-data">
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
				          if(!empty($UserData->userdetails)){
                                    foreach($UserData->userdetails as $row){

								if($_SESSION['role']=="organization")
								{$orgid=$_SESSION["orgid"];
									?>
								<option value="<?php echo $row->oid; ?>" id="<?php $row->oid;?>"  <?php echo ($row->oid == $orgid) ? "selected" : ""; ?> ><?php echo $row->email; ?></option>
								<?php }
								else
								{		$orgid=$_SESSION["orgid"];
									 ?>
									<option value="<?php echo $row->id; ?>" id="<?php $row->id;?>" <?php echo ($row->id == $userselect) ? "selected" : ""; ?>><?php echo $row->email; ?></option>
									<?php }
														
														}
																			}
					
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
			 		<input type="text" class="form-control" name="organizationemail" onblur="verifyEmail();" id="organizationemail" placeholder="Enter Email" value="<?php echo $Organizationemail;?>">
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
				            <input type="submit" class="btn pinkbg text-light bg-danger height-31px"   value="SUBMIT" name="submit" width="10px">
							<input type="button" class="btn pinkbg text-light bg-danger height-31px"  onClick="document.location.href='OrganizationLists'" name="cancel" value="CANCEL"/>
				 	      </div>
				 	    </div>
			 	</div>
			</div>

</form>
		</div>
	</main>
</div>

		</div>
        <script src="<?php echo ASSETS_URL;?>js/jquery-3.3.1.min.js" ></script>
		<script src="<?php echo ASSETS_URL;?>js/bootstrap.js" > </script>
		<script src="<?php echo ASSETS_URL;?>js/bootstrap.min.js" ></script>
		<script src="<?php echo ASSETS_URL;?>js/dropkick.js" > </script>
		<script src="<?php echo ASSETS_URL;?>js/jquery-ui.js" > </script>
		<script type="text/javascript" src="<?php echo ADMIN_ASSETS_URL;?>js/main.js"></script>

		<script type="text/javascript" src="<?php echo ASSETS_URL;?>js/admin-addorganization.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.search-btn-outer .search-btn').click(function(){
					window.location.href = 'search-result.html';
					return false;
				});


				

			});



function verifyEmail()
{
    // alert("errew");
    var organizationEmail = $("#organizationemail").val() ;
    var oid = $("#oid").val() ;
    $.ajax({
        url : 'AddOrganization/checkmail',
        type : 'POST',
        data : {
            'email' : organizationEmail
        },
        success: function(response){    
            if(response == 'exists'){            
                $("#organization-email-error").html("Email Already Exists");               
                return false;
            }
            if(response == 'not exists'){
                $("#organization-email-error").html("");               
                return true;
			}
			

        },
        error: function(xhr){
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
                return false;
        }
    });
    return false;
}

//new code



//code endfs






		</script>
	
	</body>
</html>