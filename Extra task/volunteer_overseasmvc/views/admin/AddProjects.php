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
		
		$impactdescription=$row->impact_description;
		$startdatedescription=$row->project_startdate_description;
		$costdescription=$row->cost_description;
		$nearestairport=$row->nearest_airport_address;
		$volunteerworkdescription=$row->volunteer_work_description;
		$volunteerworkaddress=$row->volunteer_work_address;
		$volunteerhouseaddress=$row->volunteer_house_address;
		$volunteerhousedescription=$row->volunteer_house_description;
		$projectvideo=$row->project_video_url;
		$projectimage=$row->image;
		$isaffordable=$row->is_affordable;
		$status=$row->status;
		




        $_SESSION["city"]=$row->city_id;
    
    }
}
$startdate=array();
$startdatez=array();
if(!empty($ProjectsData->projectstartdates)){
    foreach($ProjectsData->projectstartdates as $row){

		//$startdatez[]=str_replace("-","/",$row->start_date);
		$startdate[]= $row->start_date;
		$startdatez[] = date("m/d/Y", strtotime(str_replace("-","/",$row->start_date)) );
		//$startdate=$row->start_date;

	}
	
}
$startdates2=implode(', ', $startdate);
$startdates=implode(', ', $startdatez);
//$startdates1=implode('-', $startdates);
// print_r($startdates1);
// die();



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
			
			<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		
			<style>
			.wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 20%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
			</style>

	</head>
	<body>
		<div class="wrapper admin-wrapper admin-login y-scroll">

		<?php  include 'header-admin.php'?> 
	<main style="background-color:#f8f9fa;">
			
		<div class="container" style="background-color:white;">
			<!-- <form name="projectpage"  onsubmit="return validateForm()" method="post" action="AddProjects">
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
			</div>	 -->
<!-- wizard code start -->
<form name="projectpage"  onsubmit="return validateForm()" method="post" action="AddProjects" enctype="multipart/form-data">		
<div class="container">

	<div class="row">
		<section style="width:100%;">
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line" style="width:100%;"></div>
                <ul class="nav nav-tabs" role="tablist" style="border-bottom: none;">

                    <li role="presentation" class="active" id="rolestep1">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i>1</i>
							
                            </span>
                        </a>
					
						<span style="padding-left: 81px;    padding-bottom: 15px;">Project Detail</span>
                    </li>

                    <li role="presentation" class="disabled" id="rolestep2">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"    title="Step 2">
                            <span class="round-tab">
							<i>2</i>
                            </span>
                        </a>
						<span style="padding-left: 81px;    padding-bottom: 15px;">Project Gallery</span>
						
                    </li>
                    <li role="presentation" class="disabled" id="rolestep3">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"    title="Step 3">
                            <span class="round-tab">
							<i>3</i>
                            </span>
                        </a>
						<span style="padding-left: 81px;    padding-bottom: 15px;">Project Dates</span>
                    </li>
					<li role="presentation" class="disabled" id="rolestep4">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"    title="Step 4">
                            <span class="round-tab">
							<i>4</i>
                            </span>
                        </a>
						<span class="text-bold" style="padding-left: 81px; padding-bottom: 15px;">Project Includes</span>
                    </li>

                    <li role="presentation" class="disabled" id="rolestep5">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
								
                            </span>
                        </a>
						<span style="padding-left: 81px;    padding-bottom: 15px;">Project Costs</span>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
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
					<div class="col-lg-12">
						<span class="blue font-14px">Impact Description</span>
					</div>
					
				</div> 
				<div class="row pt-1">
					<div class="col-lg-12">
						<textarea cols="20" class="form-control" id="impactdescription" name="impactdescription"> <?php echo $impactdescription;?></textarea>
					</div>
					
					
				</div>

			
			<div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Cost Description</span>
			 	</div>
				 <div class="col-lg-6">
			 		<span class="blue font-14px">StartDate Description</span>
			 	</div>
			</div> 
			<div class="row pt-1">
			 	<div class="col-lg-6">
			 		<textarea cols="20" class="form-control" id="costdescription" name="costdescription"  maxlength="250"> <?php echo $costdescription;?></textarea>
			 	</div>
			 	
			 	<div class="col-lg-6">
			 		<textarea cols="20" class="form-control" id="startdatedescription" name="startdatedescription"   maxlength="250"> <?php echo $startdatedescription;?></textarea>
			 	</div>
			</div>

			

				<div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Volunteer House Description</span>
			 	</div>
				 <div class="col-lg-6">
			 		<span class="blue font-14px">Volunteer Work Description</span>
			 	</div>
			</div> 
			<div class="row pt-1">
			 	<div class="col-lg-6">
			 		<textarea cols="20" class="form-control" id="volunteerhousedescription" name="volunteerhousedescription"  maxlength="250"> <?php echo $volunteerhousedescription;?></textarea>
			 	</div>
			 	
			 	<div class="col-lg-6">
			 		<textarea cols="20" class="form-control" id="volunteerworkdescription" name="volunteerworkdescription"  maxlength="250"> <?php echo $volunteerworkdescription;?></textarea>
			 	</div>
			</div>

		



			<div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Project Image</span>
			 	</div>
				 <div class="col-lg-6">
			 		<span class="blue font-14px">Project Video</span>
			 	</div>
			</div> 
			<div class="row pt-1">
			 	<div class="col-lg-6">
			 		<input type="file" class="form-control" id="projectimage" name="projectimage"> 
					 <?php echo $projectimage;?>
			 	</div>
			 	
			 	<div class="col-lg-6">
				 <input type="file" class="form-control" id="projectvideo" name="projectvideo"> 
					 <?php echo $projectvideo;?>
				</div>
			</div>






				<div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Is Affordable</span>
			 	</div>
				 <div class="col-lg-6">
			 		<span class="blue font-14px">Status</span>
			 	</div>
			</div> 
			<div class="row pt-1">
			 	<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-2">
							<input type="radio"  name="affordable" value="yes" checked <?php if($isaffordable=="yes"){echo "checked";}else{echo "";}?> > Yes<br>
						</div>
						<div class="col-lg-3">
							<input type="radio"  name="affordable" value="no"   <?php if($isaffordable=="no"){echo "checked";}else{echo "";}?>> No<br>
						</div>
					
					</div>
			 	</div>
			 	
			 	<div class="col-lg-6">
				 <div class="row">
						<div class="col-lg-2">
							<input type="radio"  name="status" value="1" checked  <?php if($status=="1"){echo "checked";}else{echo "";}?>> Activate<br>
						</div>
						<div class="col-lg-3">
							<input type="radio"  name="status" value="0"  <?php if($status=="0"){echo "checked";}else{echo "";}?>> Deactivate<br>
						</div>
					
					</div>
				 </div>
			</div>

			
			<div class="row pt-3">
					<div class="col-lg-6">
						<span class="blue font-14px">Volunteer House Address</span>
					</div>
					<div class="col-lg-6">
						<span class="blue font-14px">Volunteer Work Address</span>
					</div>
				</div> 
				<div class="row pt-1">			
				<div class="col-lg-6">
						<input type="text" class="form-control" id="volunteerhouseaddress" name="volunteerhouseaddress"  maxlength="250"  value="<?php echo $volunteerhouseaddress;?>"> 
					</div>
					<div class="col-lg-6">
						<input type="text" class="form-control" id="volunteerworkaddress" name="volunteerworkaddress"   maxlength="250" value="<?php echo $volunteerworkaddress;?>"> 
					</div>
				</div>

			<div class="row pt-3">
				<div class="col-lg-6">
					
					
						<span class="blue font-14px">Nearest Airport</span>
							</div> 
							</div>
				<div class="row pt-1">
					<div class="col-lg-6">
						<input type="text" class="form-control" id="nearestairport" name="nearestairport"   maxlength="250" value="<?php echo $nearestairport;?>"> 
					</div>
				</div>
								

			<ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Next</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h1 class="">Select Gallery images</h1>
						<input type="file" name="file[]" id="file" multiple>
							


							
							<div class="row pt-5">
							<?php if(!empty($ProjectsData->projectgallery)){
							foreach($ProjectsData->projectgallery as $row){?>
						

								<div class="col-md-6 pt-2">
									<img src="<?php echo UPLOAD_IMAGE_URL; echo $row->image;?>" width="500px" height="500px" alt=" No image" >
								</div>
							<?php }}?>		
							</div>
                        <ul class="list-inline pull-right pt-4">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Next</button></li>
                        </ul>
                    </div>
				
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h2>Select Start Dates</h2>
                  
						
						<input type="text" placeholder="YYYY/MM/DD" class="form-control" id="startdates" name="startdates"
								 autocomplete="off" value="<?php echo $startdates;?>">
                        <ul class="list-inline pull-right pt-4">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                          
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Next</button></li>
                        </ul>
                    </div>


						<div class="tab-pane" role="tabpanel" id="step4">
						<h2>Select Includes:-</h2>
						
						<input type="button" class="btn btn-primary mt-1 mb-3"  onclick="addMoreIncludes();" value="AddMore"/>
						<input type="button" class="btn btn-danger mt-1 mb-3"  onclick=" deleteRow();" value="Delete"/>
						
						<?php if(!empty($ProjectsData->projectincludes)){
							echo '<DIV  id="includes">';
							foreach($ProjectsData->projectincludes as $row){
								?>
								<DIV class="product-item float-clear pt-3" style="clear:both;">
								<DIV class="float-left"><input type="checkbox" name="item_index1[]" /></DIV>
								<!-- <DIV class=""><input type="radio"   placeholder="Enter Weeks" name="item_name_radio[]"  value="yes" /> <input type="radio"   placeholder="Enter Weeks" value="no" name="item_name_radio[]"  /></DIV> -->
								<DIV class="float-left"><input type="text"  placeholder="Enter Description" name="item_description[]"  value="<?php echo $row->description;?>" /></DIV>
								<DIV class="float-left"> <span style="color:black;font-size:20px; padding-left:10px;padding-right:10px;font-weight:bold;"> Is Included:- </span><select  name="item_name_radio[]" id="item_name_radio[]"> <option value="yes"  <?php if($row->is_included=="yes"){echo "selected";}else{echo "";}?> >Yes</option> <option  value="no"  <?php if($row->is_included=="no"){echo "selected";}else{echo "";}?> >No</option></select></DIV>
								</DIV>
						
							<?php
						

							}
							echo "</DIV>";
						} 
						
						
						else  { ?>
							
							<DIV class=" pt-3" style="" id="includes"> <DIV class="float-left"><input type="checkbox" name="item_index1[]" /></DIV><DIV class="float-left"><input type="text"  class="float-left" placeholder="Enter Description" name="item_description[]"  /></DIV><DIV class="float-left"> <span style="color:black;font-size:20px; padding-left:10px;padding-right:10px;font-weight:bold;"> Is Included:- </span><select name="item_name_radio[]" id="item_name_radio[]" > <option value="yes" >Yes</option> <option  value="no" >No</option></select></DIV></DIV>
							
									


								<!-- <DIV class="" style="clear:both;" id="includes">
								<DIV class="float-left"><input type="checkbox" name="item_index1[]" /></DIV>
								<DIV class="float-left"><input type="radio"   checked   placeholder="Enter Weeks" name="item_name_radio[]"  value="yes" /> <input type="radio"   placeholder="Enter Weeks" value="no" name="item_name_radio[]"  /></DIV>
								<DIV class="float-left"><input type="text"    placeholder="Enter Description" name="item_description[]"  /></DIV>
						  -->
						<?php } ?>

			
                        <ul class="list-inline pull-right pt-4">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
             
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Next</button></li>
                        </ul>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="complete">
					<div >
					<fieldset><legend> <h3>Project Costs</h3></legend>
                       
						<input type="button"  class="btn btn-primary mt-1 mb-3" onclick="addMore();" value="AddMore"/>
						<input type="button"  class="btn btn-danger mt-1 mb-3" onclick="deletecost();" value="delete"/>
						<?php if(!empty($ProjectsData->projectcosts)){
							echo '<DIV  id="product">';
							foreach($ProjectsData->projectcosts as $row){
								?>
								<DIV class="product-item1 float-clear pt-3" style="clear:both;">
								<DIV class="float-left"><input type="checkbox" name="item_index[]" /></DIV>
								<DIV class="float-left"><input type="Number"  class="form-control"   placeholder="Enter Weeks" name="item_name[]"  value="<?php echo $row->number_of_weeks;?>"/></DIV>
								<DIV class="float-left"><input type="number"  class="form-control"  placeholder="Enter Costs" name="item_price[]" value="<?php echo $row->cost;?>" /></DIV>
						    </DIV>
							<?php
								//$startdate[]= $row->start_date;
								//$startdate=$row->start_date;

							}
							echo "</DIV>";
							
						}else{?>

						<DIV  id="product">
							<DIV class="product-item1 float-clear pt-3" style="clear:both;" >
									<DIV class="float-left"><input type="checkbox" name="item_index[]" /></DIV>
									<DIV class="float-left"><input type="Number" class="form-control"  placeholder="Enter Weeks" name="item_name[]" /></DIV>
									<DIV class="float-left"><input type="number"  class="form-control"  placeholder="Enter Costs" name="item_price[]" /></DIV>
							</DIV>
							</Div>
						<?php } ?>

						</div>
						<div>
								<ul class="list-inline pt-4">
									<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
					
								</ul>
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
							</fieldset>
                    </div>
                    <div class="clearfix"></div>
                </div>
            
        </div>
    </section>
   </div>
 
</div>
	<!-- Wizard close -->
			
			

		




</form>
		</div>
	</main>
</div>

		</div>


		<div id="loading" style="display:none;  background: url('<?php echo IMAGES; ?>/loading.gif') 50% 50% no-repeat rgb(249,249,249);">
		</div>

        <script src="<?php echo ASSETS_URL;?>js/jquery-3.3.1.min.js" ></script>
		<script src="<?php echo ASSETS_URL;?>js/bootstrap.js" > </script>
		<script src="<?php echo ASSETS_URL;?>js/bootstrap.min.js" ></script>
		<script src="<?php echo ASSETS_URL;?>js/dropkick.js" > </script>
		<script src="<?php echo ASSETS_URL;?>js/jquery-ui.js" > </script>
		<script type="text/javascript" src="<?php echo ADMIN_ASSETS_URL;?>js/main.js"></script>
     
		<script type="text/javascript" src="<?php echo ASSETS_URL;?>js/projectpage.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>        

<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>

		<script type="text/javascript">
			$(document).ready(function(){
				$('.search-btn-outer .search-btn').click(function(){
					window.location.href = 'search-result.html';
					return false;
				});

			

			});


$(document).ready(function(){  
    $('#uploadimage').click(function () {  
  
        // Checking whether FormData is available in browser  
        if (window.FormData !== undefined) {  
  
            var fileUpload = $("#galleryimage").get(0);  
            var files = fileUpload.files;  
              
            // Create FormData object  
            var fileData = new FormData();  
  
            // Looping over all files and add it to FormData object  
            for (var i = 0; i < files.length; i++) {  
				fileData.append(files[i].name, files[i]); 
				 alert(files[i].name);
            }  
              
            // Adding one more key to FormData object  
        //    / fileData.append('username', ‘Manas’);  
		var data1 = 'data='+ fileData;
            $.ajax({  
                url: 'AddProjects/uploadImages',  
                type: "POST",  
                contentType: false, // Not to set any content header  
				processData: false, 
				
				// Not to process data  
                data:data1,  
                success: function (result) {  
                    alert(result);  
                },  
                error: function (err) {  
                    alert(err.statusText);  
                }  
            });  
        } else {  
            alert("FormData is not supported.");  
        }  
    });  
});  







			$(document).ready(function () {
				$('#galleryimage').bind('fileuploadcompleted', function (e, data) {
     var filess= data.result.files[0];
        var filenam = filess.name;
       alert(filenam);
});
				
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });

$(".disabled").click(function (e) {
	//console.log($(this));
	 //$('tab-pane').each(function(index, item){

	var id=$(this).attr("id");
    //  alert($(this).attr("id"));
		if(id=="rolestep2")
		{
			$("#step2").addClass("show");
		}
		else
		{
			$("#step2").removeClass("show");
		}
		 if(id=="rolestep3")
		{
			$("#step3").addClass("show");
		}
		else
		{
			$("#step3").removeClass("show");
		}


		 if(id=="rolestep4")
		{
			$("#step4").addClass("show");
		}
		else
		{
			$("#step4").removeClass("show");
		}

		if(id=="rolestep5")
		{
			$("#complete").addClass("show");
		}
		else
		{
			$("#complete").removeClass("show");
		}
		
		if(id=="rolestep1")
		{
			$("#step1").addClass("show");
		}
		else
		{
			$("#step1").removeClass("show");
		}
	 
});





});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}



function addMore() {
      $("#product").append('<DIV class="product-item1 float-clear pt-3" style="clear:both;"><DIV class="float-left"><input type="checkbox" name="item_index[]" /></DIV><DIV class="float-left"><input type="number" placeholder="Enter Weeks" name="item_name[]"  class="form-control"  /></DIV><DIV class="float-left"><input type="number" placeholder="Enter Costs" name="item_price[]" class="form-control"  /></DIV></DIV>');

}


function addMoreIncludes() {
      $("#includes").append('<DIV class="product-item float-clear pt-3" style="clear:both;" id="includes">  <DIV class="float-left"><input type="checkbox" name="item_index1[]" /></DIV><DIV class="float-left"><input type="text"   placeholder="Enter Description" name="item_description[]"  /></DIV> <DIV class="float-left"><span style="color:black;font-size:20px; padding-left:10px;padding-right:10px;font-weight:bold;"> Is Included:- </span> <select name="item_name_radio[]"   id="item_name_radio[]" > <option value="yes" >Yes</option> <option  value="no" >No</option></select></DIV></DIV>');
}

function deleteRow() {
   $('DIV.product-item').each(function(index, item){
      jQuery(':checkbox', this).each(function () {
         if ($(this).is(':checked')) {
	    $(item).remove();
         }
      });
   });
}



function deletecost() {
   $('DIV.product-item1').each(function(index, item){
      jQuery(':checkbox', this).each(function () {
         if ($(this).is(':checked')) {
	    $(item).remove();
         }
      });
   });
}
		</script>
	</body>
</html>