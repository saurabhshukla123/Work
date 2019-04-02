<?php

if (isset($_SESSION["role"])) {
	if ($_SESSION["role"] == "superadmin") {
	   
	} 
	else {
		header('Location: Login');
	}
}else
{
	header('Location: Login');
}


$assets_url = ASSETS_URL;
$CountryData = json_decode($CountryData);
if(!empty($CountryData->countriesdetails)){ 
	foreach($CountryData->countriesdetails as $row){
		$name = $row->name;
		$image = $row->image;

	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>  
			<title>Add Country</title>
			<meta charset="utf-8">
			<link rel="shortcut icon" href="images/favicon.ico"/>
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
		<div class="wrapper admin-wrapper admin-login y-scroll">
		<?php  include 'header-admin.php'?>
	<main style="background-color:#f8f9fa;">
			
		<div class="container" style="background-color:white;">
			<form name="admin_addcountry"  onsubmit="return validateForm()" method="post" action="AddCountry"  enctype="multipart/form-data">
			 <div class="row pt-3">
			 	<div class="col-lg-12">
					 <h1 class="text-muted">Country</h1>
				</div>
			 </div>
			 <div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Name</span>
			 	</div>
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Image</span>
			 	</div>
			</div>
			 <div class="row pt-1">
			 	<div class="col-lg-6">
				 <input type="text"  name="name" class="form-control" id="name"  value="<?php echo $name; ?>"  required >
              	</div>
			 	<div class="col-lg-6">
                
				 <input type="file"  class="form-control" name="image" id="image">
                 <?php echo $image;?>
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
	
            
			
			 <div class="row pt-5">
			 	<div class="col-lg-12 row justify-content-center">
				 		<div class="row">
				 			<div class="col-lg-12">
				            <input type="submit" class="btn pinkbg text-light bg-danger height-31px" value="SUBMIT" name="submit" width="10px">
							
				        	<input type="button" class="btn pinkbg text-light bg-danger height-31px"  onClick="document.location.href='CountryLists'" name="cancel" value="CANCEL" />
				 	    
						 	</div>
				 	    </div>
			 	</div>
			</div>




</form>
		</div>
	</main>
</div>

		</div>
        <script src="<?php echo ADMIN_ASSETS_URL;?>js/jquery-3.3.1.min.js" ></script>
		<script src="<?php echo ADMIN_ASSETS_URL;?>js/bootstrap.js" > </script>
		<script src="<?php echo ADMIN_ASSETS_URL;?>js/bootstrap.min.js" ></script>
		<script src="<?php echo ADMIN_ASSETS_URL;?>js/dropkick.js" > </script>
		<script src="<?php echo ADMIN_ASSETS_URL;?>js/jquery-ui.js" > </script>
		<script type="text/javascript" src="<?php echo ADMIN_ASSETS_URL;?>js/main.js"></script>

		<script type="text/javascript" src="<?php echo ASSETS_URL;?>js/admin-addorganization.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.search-btn-outer .search-btn').click(function(){
					window.location.href = 'search-result.html';
					return false;
				});

			});
		</script>
	</body>
</html>