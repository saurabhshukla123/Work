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
$assets_url = ASSETS_URL;

$ProjectsData = json_decode($ProjectsData);

$organization="";

if(!empty($ProjectsData->projectdetails)){
    foreach($ProjectsData->projectdetails as $row){


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

?>

<!DOCTYPE html>
<html lang="en">
	<head>  
			<title>Add Projects</title>
			<meta charset="utf-8">
			<link rel="shortcut icon" href="<?php echo ADMIN_ASSETS_URL;?>images/favicon.ico"/>
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
			<form name="projectpage"  onsubmit="return validateForm()" method="post" action="AddProjects">
			 <div class="row pt-3">
			 	<div class="col-lg-12">
					 <h1 class="blue">Project Details</h1>
				</div>
			 </div>
			 <div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Organization</span>
			 	</div>
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Category</span>
			 	</div>
			</div>
			 <div class="row pt-1">
			 	<div class="col-lg-6">
			 		<select class="form-control" name="organization" id="organization">
			 				<option value="0">Please select</option>
                             <?php

                            if(!empty($ProjectsData->organization_data)){
                              foreach($ProjectsData->organization_data as $row){ 
								?>
									<option value="<?php echo $row->id; ?>" id="<?php $row->id;?>" <?php echo ($row->id == $organization) ? "selected" : ""; ?>><?php echo $row->name; ?></option>
														<?php
														}
						}
			
						?>
			 		</select>
			 	</div>
			 	<div class="col-lg-6">
			 	
			 		<select class="form-control" name="category" id="category">
			 				<option value="0">Please select</option>
                             <?php					
					
                            if(!empty($ProjectsData->categories)){
                                foreach($ProjectsData->categories as $row){  
                                
                                ?>
									<option value="<?php echo $row->id; ?>" id="<?php $row->id;?>" <?php echo ($row->id == $category) ? "selected" : ""; ?>><?php echo $row->name; ?></option>
														<?php
														}
						}
										?>
			 		</select>
			 	</div>
			</div>

			 <div class="row">
			 	<div class="col-lg-6">
			 		
			 		<label class="pink" id="organization-error" value=""></label>
			 	</div>
			 	<div class="col-lg-6">
			 		<label class="pink" id="category-error" value=""></label>
			 	</div>
			</div>
			 <div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Activity</span>
			 	</div>
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Title</span>
			 	</div>
			</div>
			 <div class="row pt-1">
			 	<div class="col-lg-6">
			 			<select class="form-control" name="activity" id="activity">
			 				<option value="0">Please select</option>
                             <?php
						
                            if(!empty($ProjectsData->activities)){
                                foreach($ProjectsData->activities as $row){ 


								?>
									<option value="<?php echo $row->id; ?>" id="<?php $row->id;?>" <?php echo ($row->id == $activity) ? "selected" : ""; ?>><?php echo $row->name; ?></option>
														<?php
														}
						}
				
						?>
			 				</select>
			 	</div>
			 	<div class="col-lg-6">
			 		<input type="text" class="form-control" name="title" id="title"  value="<?php echo $title;?>"> 
			 	</div>
			</div>

			 <div class="row">
			 	<div class="col-lg-6">
			 		<label class="pink" id="activity-error" value=""></label>
			 	</div>
			 	<div class="col-lg-6">
			 		<label class="pink" id="title-error" value=""></label>
			 	</div>
			</div>
			 <div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Minimum age</span>
			 	</div>
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Maximum age</span>
			 	</div>
			</div> 
			<div class="row pt-1">
			 	<div class="col-lg-6">
			 		<input type="text" class="form-control" name="min-age" id="min-age"  autocomplete="off" value="<?php echo $min_age;?>"> 
			 	</div>
			 	<div class="col-lg-6">
			 		<input type="text" class="form-control" name="max-age" id="max-age"  autocomplete="off" value="<?php echo $max_age;?>"> 
			 		
			 	</div>
			</div>
			 <div class="row">
			 	<div class="col-lg-6">
			 		<label class="pink" id="min-age-error" value=""></label>
					<label class="pink" id="min-max-error" value=""></label>
			 	</div>

			 	<div class="col-lg-6">
			 		<label class="pink" id="max-age-error" value=""></label>
			 	</div>
			</div>
			<div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">City</span>
			 	</div>
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Country</span>
			 	</div>
			</div>
			 <div class="row pt-1">
			 	<div class="col-lg-6">
			 		<select class="form-control" name="city" id="city">
			 		</select>
			 	</div>
			 	<div class="col-lg-6">
			 	
			 		<select class="form-control" name="country" id="country"  onChange="showCity(this.value);">
					
                             <?php
								
                                        if(!empty($ProjectsData->countries)){
                                            foreach($ProjectsData->countries as $row){ 
                                            
											?>
																		<option value="<?php echo $row->id; ?>" id="<?php $row->id;?>"  <?php echo ($row->id == $country) ? "selected" : ""; ?>><?php echo $row->name; ?></option>
																							<?php
									}
									}

							?>
			 		</select>
			 	</div>
			</div>

			 <div class="row">
			 	<div class="col-lg-6">
			 		<label class="pink" id="city-error" value=""></label>
			 	</div>
			 	<div class="col-lg-6">
			 		<label class="pink" id="country-error" value=""></label>
			 	</div>
			</div>
			 <div class="row pt-3">
			 	<div class="col-lg-12">
			 		<span class="blue font-14px">Overview Description</span>
			 	</div>
			</div> 
			<div class="row pt-1">
			 	<div class="col-lg-12">
			 		<textarea cols="20" class="form-control" id="description" name="description"> <?php echo $overview_description;?></textarea>
			 	</div>
			 	
			</div>
			 <div class="row">
			 	<div class="col-lg-12">
			 		<label class="pink" id="description-error" value=""></label>
			 	</div>
			</div>
			<div class="row pt-3">
			 	<div class="col-lg-12">
			 		<span class="blue font-14px">Accomodation Description</span>
			 	</div>
			</div> 
			<div class="row pt-1">
			 	<div class="col-lg-12">
			 		<textarea cols="20" class="form-control" id="acc_description" name="acc_description"> <?php echo $accommodation_description;?></textarea>
			 	</div>
			 	
			</div>
			 <div class="row">
			 	<div class="col-lg-12">
			 		<label class="pink" id="acc-description-error" value=""></label>
			 	</div>
			</div>	

			
			
			

			 <div class="row pt-3">
			 	<div class="col-lg-12 row justify-content-center">
				 		<div class="row">
				 			<div class="col-lg-12">
				            <input type="submit" class="btn pinkbg text-light bg-danger height-31px" value="SUBMIT" name="submit" width="10px">
							
				          <input type="button" class="btn pinkbg text-light bg-danger height-31px"  onClick="document.location.href='ProjectLists'" name="cancel" value="CANCEL"/>
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
     
		<script type="text/javascript" src="<?php echo ASSETS_URL;?>js/projectpage.js"></script>
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