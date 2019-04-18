
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
$startdate=array();
if(!empty($ProjectsData->projectstartdates)){
    foreach($ProjectsData->projectstartdates as $row){

		$startdate[]= $row->start_date;
		//$startdate=$row->start_date;

	}
	
}
$startdates=implode(', ', $startdate);





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
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
							
                            </span>
							
							
                        </a>
					
						
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>
					<li role="presentation" class="disabled">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Step 1</h3>
                        <p>This is step 1</p>
	

     
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
			<ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Step 2</h3>
                        <p>This is step 2</p>
						<h3 class="text-primary text-bold">Select Gallery images</h1>
						<input type="file" name="file[]" id="file" multiple>
							<input type="file" name="galleryimage[]" id="galleryimage"  multiple> 
							<input type="button" class="btn btn-primary"  id="uploadimage" value="Upload" />


							
							<div class="row pt-5">
							<?php if(!empty($ProjectsData->projectgallery)){
							foreach($ProjectsData->projectgallery as $row){?>
						

								<div class="col-md-6 pt-2">
									<img src="<?php echo UPLOAD_IMAGE_URL; echo $row->image;?>" width="500px" height="500px" alt=" No image" >
								</div>
							<?php }}?>		
							</div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
				
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Step 3</h3>
                        <p>This is step 3</p>
						
						<input type="text" placeholder="YYYY/MM/DD" class="form-control" id="startdates" name="startdates"
								 autocomplete="off" value="<?php echo $startdates;?>">
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>


						<div class="tab-pane" role="tabpanel" id="step4">
                        <h3>Step 4</h3>
                        <p>This is step 4</p>
						
						<input type="button"  onclick="addMoreIncludes();" value="AddMore"/>
						<?php if(!empty($ProjectsData->projectincludes)){
							foreach($ProjectsData->projectincludes as $row){
								?>
								<DIV class="product-item float-clear" style="clear:both;" id="includes">
								<DIV class="float-left"><input type="checkbox" name="item_index1[]" /></DIV>
								<!-- <DIV class=""><input type="radio"   placeholder="Enter Weeks" name="item_name_radio[]"  value="yes" /> <input type="radio"   placeholder="Enter Weeks" value="no" name="item_name_radio[]"  /></DIV> -->
								<DIV class="float-left"><input type="text"  placeholder="Enter Description" name="item_description[]"  value="<?php echo $row->description;?>" /></DIV>
								<DIV class="float-left"><select  name="item_name_radio[]" id="item_name_radio[]"> <option value="yes"  <?php if($row->is_included=="yes"){echo "selected";}else{echo "";}?> >Yes</option> <option  value="no"  <?php if($row->is_included=="no"){echo "selected";}else{echo "";}?> >No</option></select></DIV>
								
							</DIV>
							<?php
						

							}
							
						}else{?>
							<DIV class="" style="" id="includes"> <DIV class="float-left"><input type="checkbox" name="item_index1[]" /></DIV><DIV class=""><input type="text"  class="float-left" placeholder="Enter Description" name="item_description[]"  /></DIV> <DIV class=""><select name="item_name_radio[]" id="item_name_radio[]" class="float-left"> <option value="yes" >Yes</option> <option  value="no" >No</option></select></DIV></DIV>
							
								<!-- <DIV class="" style="clear:both;" id="includes">
								<DIV class="float-left"><input type="checkbox" name="item_index1[]" /></DIV>
								<DIV class="float-left"><input type="radio"   checked   placeholder="Enter Weeks" name="item_name_radio[]"  value="yes" /> <input type="radio"   placeholder="Enter Weeks" value="no" name="item_name_radio[]"  /></DIV>
								<DIV class="float-left"><input type="text"    placeholder="Enter Description" name="item_description[]"  /></DIV>
						  -->
						<?php } ?>

			
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
						<input type="button"  onclick="addMore();" value="AddMore"/>
						<?php if(!empty($ProjectsData->projectcosts)){
							foreach($ProjectsData->projectcosts as $row){
								?>
								<DIV class="product-item float-clear" style="clear:both;" id="product">
								<DIV class="float-left"><input type="checkbox" name="item_index[]" /></DIV>
								<DIV class="float-left"><input type="Number"  placeholder="Enter Weeks" name="item_name[]"  value="<?php echo $row->number_of_weeks;?>"/></DIV>
								<DIV class="float-left"><input type="number"  placeholder="Enter Costs" name="item_price[]" value="<?php echo $row->cost;?>" /></DIV>
						    </DIV>
							<?php
								//$startdate[]= $row->start_date;
								//$startdate=$row->start_date;

							}
							
						}else{?>


							<DIV class="product-item float-clear" style="clear:both;" id="product">
									<DIV class="float-left"><input type="checkbox" name="item_index[]" /></DIV>
									<DIV class="float-left"><input type="Number"  placeholder="Enter Weeks" name="item_name[]" /></DIV>
									<DIV class="float-left"><input type="number"  placeholder="Enter Costs" name="item_price[]" /></DIV>
							</DIV>
						<?php } ?>


                        <p>You have successfully completed all steps.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            
        </div>
    </section>
   </div>
 
</div>
	<!-- Wizard close -->
			
			

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
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}



function addMore() {
      $("#product").append('<DIV class="product-item float-clear" style="clear:both;"><DIV class="float-left"><input type="checkbox" name="item_index[]" /></DIV><DIV class="float-left"><input type="number" placeholder="Enter Weeks" name="item_name[]" /></DIV><DIV class="float-left"><input type="number" placeholder="Enter Costs" name="item_price[]" /></DIV></DIV>');

}


function addMoreIncludes() {
      $("#includes").append('<DIV class="product-item float-clear" style="clear:both;" id="includes"> <DIV class="float-left"><input type="checkbox" name="item_index1[]" /></DIV><DIV class="float-left"><input type="text"   placeholder="Enter Description" name="item_description[]"  /></DIV> <DIV class="float-left"><select name="item_name_radio[]"   id="item_name_radio[]" > <option value="yes" >Yes</option> <option  value="no" >No</option></select></DIV></DIV>');
}

		</script>
	</body>
</html>