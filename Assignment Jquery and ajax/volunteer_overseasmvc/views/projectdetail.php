<?php
// include "function.php";
//  include 'model/project.php';

$assets_url = ASSETS_URL;
$projectPageData = json_decode($projectPageData);
$total_views="";
if (!empty($projectPageData->project_details)) {
    foreach ($projectPageData->project_details as $value) {

        $projectname = $value->title;
        $countryname = $value->country_name;
        $cityname = $value->city_name;
        $impact_description = $value->impact_description;
        $accomodation_description = $value->accomodation_description;
        $overview_description = $value->overview_description;

        $min_age = $value->min_age;
        $video_url = $value->video_url;
        $project_description = $value->project_description;
        $project_startdate_description = $value->startdatedescription;

        $organization_description = $value->organization_description;
        $orgname = $value->organization_name;
		$org_logo = $value->org_logo;
		$projectimage=$value->image;
		$costdesc = $value->cost_desc;
		$maxcost=$value->maxcost;
		$mincost=$value->mincost;
        $project_cost = $value->projectcost;
        $no_of_weeks = $value->weeks;
        // $costdesc=$value->cost_desc;

    }
}

if (!empty($projectPageData->project_view)) {
	$total_views=$projectPageData->project_view;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ghana Medical Volunteer</title>
	<meta charset="UTF-8">
	<meta name="description" content="Free Web tutorials" />
	<meta name="keywords" content="Ghana,Medical,Volunteer,Kumasi" />
	<meta name="author" content="TatvaSoft" />
	<link rel="stylesheet" href="public/css/bootstrap.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="public/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="public/css/style.css" type="text/css" />
		<link rel="stylesheet" href="public/css/jquery-ui.css" type="text/css" />

	<link rel="stylesheet" href="public/css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="public/css/owl.theme.default.min.css" type="text/css">
	<link rel="stylesheet" href="public/css/dropkick.css" type="text/css" />
	<link rel="stylesheet" href="public/css/media.css" type="text/css" />
	<link href="public/4/thumbnail-slider.css" rel="stylesheet" type="text/css" />
	<link href="public/4/ninja-slider.css" rel="stylesheet" type="text/css" />
	<script src="public/4/thumbnail-slider.js" type="text/javascript"></script>
	<script src="public/4/ninja-slider.js" type="text/javascript"></script>
	<style type="text/css">
		html {
			scroll-behavior: smooth;
		}

		#myScrollspy a.active {
			background-color: #e53b51 !important;
			color: white !important;
		}

		#myScrollspy a.active:hover {
			background-color: #e53b51 !important;
			color: white !important;
		}
	</style>
	</head>
<body>
	<div>
		<header class="headerformat" style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, 0)0%, rgba(0, 0, 0, 0.06) 10%, rgba(0, 0, 0, 0.15) 22%,rgba(0, 0, 0, 0.72) 75%, rgba(0, 0, 0, 0.84) 89%, rgba(0, 0, 0, 0.91) 100%),url('<?php echo IMAGES; echo  $projectimage;?>');">

 

			<?php include 'header.php';?>
			<div id="imagetext">
				<h1 class="font-weight-bold"><?php echo $projectname; ?></h1>
			</div>
			<div class="bg-light button-radius p-2">
				<a href="gallery.html" class="bluebold" data-toggle="modal" data-target="#viewphotos">
					<img src="<?php echo IMAGES; ?>photos-icon.png" alt="View Photos" title="view Photos" /> View Photos
				</a>
			</div>
		</header>
	</div>

	<div class="container pt-3 margin-top-index">
		<div class="row">
			<div class="col-lg-8 col-md  col-sm-12">
				<div class="row bottom-padding">
					<div class="col-lg-8 col-md-12 col-sm-12">
						<div class="pb-2">
							<h2 class="bluebold36px pb-2"><?php echo $projectname; ?></h2>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="row padding-bottom-index">
							<div class="col-md-2 col-2 div1-gutters1-index">
								<img src="<?php echo IMAGES; ?>map.png " class="pl-4" height="26px" alt="Kumasi Gana" title="Khumasi Gana" style="padding-top: 5px;padding-left: 7px;">
							</div>
							<div class="col-md-2 col-10">
								<h3 class="pink inline"> <?php echo $cityname; ?>,<?php echo $countryname; ?></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-12" style="padding-bottom: 15px;margin-top: -10px;">
							<div class="d-md-block d-sm-block d-lg-none">
									<label class="text-muted">
										<span class="blue"><?php echo $total_views;?> People</span> are viewing this program
									</label>
								</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 gutter-plan-gap col-2">
						<img src="<?php echo UPLOAD_URL;
                echo $org_logo; ?>" alt="<?php echo $orgname; ?>" title="<?php echo $orgname; ?>" width="69px" height="70px" class="border border-secondary">
					</div>
					<div class="col-md-10 pt-3 col-8">
						<h3 class="bluebold  gap-mobile-sm"><?php echo $orgname; ?></h3>
					</div>
				</div>
				<div class="row pt-4 bottom-padding">
					<div class="col-md-5 col-6">
						<div class="row">
							<div class="col-md-1 col-12 index-mobile-padding">
								<img src="<?php echo IMAGES; ?>icon1.png" class="img-ico-height">
							</div>
							<div class="col-md-10 col-12 index-mobile-padding">
								<span class="text-muted"> From $<?php echo $project_cost; ?> for <?php echo $no_of_weeks; ?> Weeks
								</span>
							</div>
						</div>
					</div>

					<div class="col-md-4 div1-gutters-top col-6">
						<div class="row">
							<div class="col-md-1 col-12 index-mobile-padding">
								<img src="<?php echo IMAGES; ?>icon2.png">
							</div>
							<div class="col-md-10 col-12">
								<span class=" text-muted"><?php echo $mincost;?>-<?php echo $maxcost;?> Weeks</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-12">
						<div class="row">
							<div class="col-md-1 col-sm-1 col-12 index-mobile-padding">
								<img src="<?php echo IMAGES; ?>icon4.png" class="img-ico-height" alt="18 and older" title="18 and older">
							</div>
							<div class="col-md-10 col-sm-10 col-12 index-mobile-padding">
								<span class=" text-muted"> <?php echo $min_age; ?> And Older</span>
							</div>
						</div>
					</div>
				</div>
				<div class="borderbottom"></div>
				<div class="row">
					<div class="col-md-12 col-12">
						<div class="row">
							<div class="horizontal col-md-12 col-12 sticky">
								<nav id="myScrollspy" class="remove-border" style="margin-left:0px;">
									<ul>
										<li class="blue active"><a href="#Description">DESCRIPTION</a></li>
										<li><a href="#Location" class="blue">LOCATION</a></li>
										<li class="width-15-tablet"><a href="#COST" class="blue">COST</a></li>
										<li class="width-15-tablet w-13-pr"><a href="#DATES" class="blue">DATES</a></li>
										<li class="w-13-pr"><a href="#ORGANIZATION" class="blue">ORGANIZATION</a></li>
									</ul>
								</nav>
							</div>

						</div>
					</div>
				</div>
				<section id="Description">
					<div class="row">
						<div class="col-md-12 pt-4">
							<h2 class="bluebold paddingtop10px">Description</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h4 class="pink paddingtop10px size25px">Overview</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p class="paragraph">
								<?php
echo $overview_description;
?>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h4 class="pink paddingtop10px size25px">Field Conditions</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p class="paragraph text-justify">
								<?php echo $accomodation_description; ?>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h4 class="pink paddingtop10px size25px">Your Impact</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p class="paragraph text-justify">
						<?php echo $impact_description; ?>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 pt-2">
							<video width="730" height="540" controls>
								<source src="<?php echo UPLOAD_VIDEO_URL;
     echo $video_url; ?>" type="video/mp4">
								<source src="<?php echo UPLOAD_VIDEO_URL;
echo $video_url; ?>" type="video/ogg">
								Your browser does not support the video tag.
							</video>
						</div>
					</div>
				</section>
				<div class="borderbottom borderbottom1 pt-5 pb-1"></div>
				<section id="Location">
					<div class="row pt-3">
						<div class="col-md-12 pt-3">
							<h2 class="bluebold">Location</h2>
						</div>
					</div>
					<div class="row pt-3">
						<div class="col-md-12 float-left">
							<div class="row">
								<div class="col-md-1 col-1" style="margin-top: 4px;">
									<img src="<?php echo IMAGES; ?>map.png " height="20px" alt="kumasi ghana" title="khumasi gana">
								</div>

								<div class="col-md-11 div2-gutters-index col-11">
									<h4 class="inline pink"> <?php echo $cityname; ?>,<?php echo $countryname; ?> </h4>
								</div>
							</div>

						</div>
					</div>
					<div class="row pt-4">
						<div class="col-md-12 float-left">
							<div>
			<!-- <new code> -->

		<?php $address = "$cityname,  $countryname"; /* Insert address Here */
		echo '<iframe  width="730" height="450"  frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';
			?>


            <!-- new code ends -->
			<!-- "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14686.79265707489!2d72.500458!3d23.0348522!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdc9d4dae36889fb9!2sTatvaSoft!5e0!3m2!1sen!2sin!4v1546928041774" -->
								<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14686.79265707489!2d72.500458!3d23.0348522!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdc9d4dae36889fb9!2sTatvaSoft!5e0!3m2!1sen!2sin!4v1546928041774"
								 width="730" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
							</div>
						</div>
					</div>
				</section>
				<div class="pt-4 borderbottom borderbottom1">
				</div>

				<section id="COST">
					<div class="row pt-3">
						<div class="col-md-12 ">
							<h2 class="bluebold pb-5">Cost</h2>
						</div>
					</div>
					<div class="row pt-3">
						<div class="col-md-12 ">
							<p class="paragraph text-justify">
							<?php echo $costdesc; ?>
                            </p>
						</div>
					</div>
					<div class="row pt-3 box-cost-duration p-3 pt-1">
						<div class="col-md-6 col-6">
							<div class="row" style="padding-top: 10px;">
								<div class=" col-md-2 gutter-fr-clock">
									<img src="<?php echo IMAGES; ?>ico4.png " height="25px">
								</div>
								<div class="col-md-4 gutter-fr-duration">
									<h4 class="bluebold">Duration</h4>
								</div>
								<div class="col-md-6 gutter-fr-week">
									<select id="normal_select" onchange="cost_update(this.value)">

									<?php

								if (!empty($projectPageData->project_week)) {
									foreach ($projectPageData->project_week as $value) {
										?>
												<option value="<?php echo $value->number_of_weeks; ?>"><?php echo $value->number_of_weeks . " Weeks"; ?></option>

										<?php
										}}
										?>

									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-6 show-border" style="margin-top: 8px;margin-bottom: 24px;">
							<div class="row">
								<div class=" col-md-3 gutter-fr-clock">
									<img src="<?php echo IMAGES; ?>ico5.png" height="25px" alt="cost" title="cost">
								</div>
								<div class="col-md-3 gutter-fr-cost">
									<h4 class="bluebold  inline">Cost:</h4>
								</div>
								<div class="col-md-2 gutter-fr-74">
									<span class="pink">$<label id="cost_value" style="display: initial !important;"></label></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row pb-3 pt-4">
						<div class="col-md-6" style="padding-right: 3px;">
							<div class="blueback  align-items-center blueback-style">
								<h3 class="text-light font-weight-bold"><span class="pt-2 mr-3"> What's Included</span>
								</h3>
							</div>
							<div class="pt-3">
								<ul class="pt-1 text-muted " style="padding-left: 40px; padding-left: 42px;">
                                <?php if (!empty($projectPageData->project_checkin)) {?>
                                <?php foreach ($projectPageData->project_checkin as $value) {
							if ($value->is_included == "yes") {
								?>
									<li class="pt-1"><img src="<?php echo IMAGES; ?>new-tick.png" height="18px" alt="check" title="check"><span class="pl-2"><?php echo $value->description; ?></span></li>

                                <?php }}
													}
													?>

                                    </ul>
							</div>
						</div>
						<div class="col-md-6" style="padding-left: 1px;">
							<div class="pinkbg pinkbg-style">
								<h3 class="text-light  font-weight-bold">What's Not Included</h3>
							</div>
							<div class="pt-3 ">
								<ul class="pt-1 show-border text-muted" style="padding-left: 40px; padding-left:58px;">
                                <?php if (!empty($projectPageData->project_checkin)) {?>
                                <?php foreach ($projectPageData->project_checkin as $value) {
								if ($value->is_included == "no") {
									?>
                                    <li class="pt-2"><img src="<?php echo IMAGES; ?>check.png" height="18px" alt="check" title="check"><span class="pl-2"><?php echo $value->description; ?></span></li>
									<?php }}
								}
								?>
									</ul>
							</div>
						</div>
					</div>
				</section>
				<div class="borderbottom borderbottom1"></div>
				<section id="DATES">
					<div class="row pt-3">
						<div class="col-md-12">
							<h2 class="bluebold">Project Start Dates</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 pt-4">
							<p class="paragraph text-justify">
							<?php echo $project_startdate_description; ?>
							</p>
						</div>
					</div>
					<div class="pt-4 pb-4 owl6">
						<!-- //owl carousel -->
						<div class="owl-carousel owl-theme d-md-block d-sm-block d-lg-block">
						<?php 
							// echo '<pre>';print_r($projectPageData);exit;
							if (!empty($projectPageData->project_start_dates)) {
								$data[]= array(); 
								?>
								<?php
								$i=0;
								foreach ($projectPageData->project_start_dates as $value) {	
										$date=date('d', strtotime($value->start_date));
										$monthandyear=date('F Y', strtotime($value->start_date));
										$day=date('l', strtotime($value->start_date));
										// $month=date('F', strtotime($value->start_date));
									    // $prev_month=date('F', strtotime($value->start_date+1));
											
										// array_push($data[$month]=array($i++,array($date,$monthandyear,$day)));
										
										




								?>
								<div class="item">
										<table class="table-header-blue text-light bordercolor" border="1" width="100%">
												<tr style="text-align: center;">
													<th><?php echo  $monthandyear;?></th>
												</tr>
												<tr>
													<td><span class="pink font-weight-bold font-sizexl"><?php echo $date;?></span><span class="blue "><?php  echo $day?></span></td>

												</tr>
										</table>
								
								</div>
								<?php 
								
							}
							// print_r("<pre>");
							// 	print_r($data);	
							// 	die();
								}
								
								?>
							</div>

						<!--Owl carousel ends-->

						<div class="table table-responsive-sm table-wrapper  d-lg-none d-md-none d-sm-none display-none-index" width="100%">
							<table class="table-header-blue text-light bordercolor" border="1" width="100%">
								<tr style="text-align: center;">
									<th>January 2018</th>
									<th> February 2018</th>
									<th>March 2018</th>
									<th>April 2018<img class="float-right th-img right" src="<?php echo IMAGES; ?>right-white-arrow.png"
										 alt="next" title="next" style="position: absolute;right:18px; "></th>
								</tr>
								<tr>
									<td><span class="pink font-weight-bold font-sizexl">07</span><span class="blue ">Sunday</span></td>
									<td><span class="pink font-weight-bold font-sizexl">04</span> <span class="blue">Sunday</span></td>
									<td><span class="pink font-weight-bold font-sizexl">07</span> <span class="blue ">Sunday</span></td>
									<td><span class="pink font-weight-bold font-sizexl">07</span> <span class="blue">Sunday</span></td>
								</tr>
								<tr>
									<td><span class="pink font-weight-bold font-sizexl">07</span> <span class="blue">Sunday</span></td>
									<td><span class="pink font-weight-bold font-sizexl">04</span> <span class="blue">Sunday</span></td>
									<td><span class="pink font-weight-bold font-sizexl">07</span> <span class="blue">Sunday</span></td>
									<td><span class="pink font-weight-bold font-sizexl">07</span> <span class="blue">Sunday</span></td>
								</tr>
							</table>
						</div>
					</div>
				</section>
				<div class="borderbottom1 borderbottom "></div>
				<section id="ORGANIZATION">
					<div class="row pt-4">
						<div class="col-md-12">
							<h2 class="bluebold pt-5">Organization</h2>
						</div>
					</div>
					<div class="row pt-4 text-muted">
						<div class="col-md-12">
							<p class="paragraph text-justify">
								<?php echo $organization_description; ?>
							</p>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-4 display-none apply-form-side">
				<div class="container blueback pl-4 pr-4 pt-3">
					<form class="text-light pt-1 pb-1">
						<div>
							<lable class="text-light box-format"><b><?php echo $total_views;?> people</b> are researching this project</lable>
						</div>
						<div class="pt-2">
							<lable class="pt-3">Project start date</lable>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<img src="<?php echo IMAGES; ?>icon3.png" alt="date" title="date">
								</div>
							</div>
							<input type="text" placeholder="mm/dd/yyyy" class="form-control" id="datepicker">
						</div>
						<ul class="padding-left-0px">
							<li id="date-picker-error" class="pink" val=""></li>
						</ul>
						<div>
							<lable>Duration</lable>
						</div>
						<div class="apply_now pb-2">
							<select name="week" id="normal_select1">
								<option value="0"> Please Select</option>
								<?php

							if (!empty($projectPageData->project_week)) {
								foreach ($projectPageData->project_week as $value) {
									?>
										<option value="<?php echo $value->number_of_weeks; ?>" ><?php echo $value->number_of_weeks . " Weeks"; ?></option>

								<?php
								}}
								?>
							</select>
						</div>
						<ul class="padding-left-0px">
							<li id="select-error" class="pink" val=""></li>
						</ul>
						<div>

							<input type="button" value="Apply Now" id="apply_now" class="form-control bg-danger text-white mt-2" style="border-color: #e53b51;"
							 data-toggle="modal" data-target="#myModal">
							<!-- <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal"> -->
						</div>
						<div class="pt-2">
							<p class="text-light" style="font-size:13px;">
								Applying through Volunteer Overseas gets you access. exclusive <u>travel scholarship</u> and a no-fee <u>fundraising
									platfam </u>
							</p>
						</div>
					</form>
				</div>
			</div>
		</div>

	<div class="row pt-4 d-sm-block d-md-block d-lg-none"  style="align-items: cenblock d-md-block d-lg-noneter;">
		<div class="col-12">
					<button class="btn btn-danger text-light tablet-applynow" id="applynowmobile" style="margin-left:31%;position:relative;padding-left:15px;padding-right:40px">Apply Now<img src="<?php echo IMAGES;?>right-white-arrow.png" style=" transform: rotate(-90deg); position: absolute; right:14px;"></button>
		</div>

	</div>
	</div>
	<footer class="bg-dark text-light  display-none-index d-md-none d-lg-block">
		<?php include 'footer.php';?>
	</footer>
	<script src="public/js/jquery-3.3.1.min.js"></script>
	<script src="public/js/owl.carousel.js"> </script>
	<script src="public/js/bootstrap.js"> </script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/dropkick.js"> </script>
	<script src="public/js/jquery-ui.js"> </script>
	<script src="public/js/index-popup.js"></script>
	<script type="text/javascript" src="public/js/indexpagejs.js"></script>
	<script type="text/javascript">
	function cost_update(normal_select)
			{
				cost_change(normal_select);
			}
			$(document).ready(function(){
				var normal_select = $("#normal_select").val();
				cost_change(normal_select);
			});


	 function cost_change(normal_select)
	 {
		$.ajax({

		url : 'projectdetail/ajax_cost',
		type : 'POST',
		dataType:'json',
		data : {
			'week' : normal_select
		},
		success : function(data) {
		$('#cost_value').html(data);
		console.log(data)
		//window.location.href = "search?page=1";

		//location.reload();
		},


		});
	 }


	 


	</script>
	<!--MOdal open for image-->

	<div class="modal fade" id="viewphotos" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content" style="background: transparent;border: none;">
				<div class="modal-header" style="border: none;">
					<button type="button" class="close" data-dismiss="modal" style="right: 18px;margin-right: -160px;"><img src="<?php echo IMAGES; ?>cross.png"
						 style="height:25px;"> </button>
				</div>
				<div class="modal-body">
					<img src="<?php echo IMAGES; ?>right-arrow-big.png" id="ninja-slider-next" style="left: 118%;top: 164px;width: auto;height: 43px;position:absolute;">
					<img src="<?php echo IMAGES; ?>left-arrow-big.png" id="ninja-slider-prev" style="left: -24%;top: 164px;width: auto;height: 43px;position:absolute;">

					<div id='ninja-slider'>
						<div>
							<div class="slider-inner">
								<ul>
                             <?php if (!empty($projectPageData->project_images)) {
    foreach ($projectPageData->project_images as $value) {?>
									<li><a class="ns-img" href="<?php echo PROJECT_GALLERY;
        echo $value->image; ?>"></a></li>
                                    <?php }
}?>
								</ul>
								<div class="fs-icon" title="Expand/Close"></div>
							</div>
							<div id="thumbnail-slider">
								<div class="inner">
									<ul>

                             <?php if (!empty($projectPageData->project_images)) {
   							 foreach ($projectPageData->project_images as $value) {?>

										<li>
											<a class="thumb" href="<?php echo PROJECT_GALLERY;
       						 echo $value->image; ?>"></a>
											<span>0</span>
										</li>
								    <?php }
									}?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" style="border:none;">
				</div>
			</div>
		</div>
	</div>
	<!--Modal close for image-->
	<!--  Popup for sign up-->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header justify-content-center">
					<h4 class="modal-title text-center">
						<center><span style="text-align: center;">SIGN UP</span></center>
						<button type="button" class="close d-sm-block d-lg-none d-md-block" data-dismiss="modal" style=" position:absolute;right: 18px;margin-right: 0px; background:#ada7a7; top:19px;"><img src="<?php echo IMAGES;?>cross.png"
							style="height:25px;"> </button>

					</h4>

				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<form action="projectdetail/addproject" method="post"  name="popupform" onsubmit="return validateForm()">
						<div class="form-group">
							<label for="fname">Full Name</label>
							<input type="text" class="form-control" id="fname" name="fname">
							<ul class="padding-left-0px">
								<li id="fname-error" class="pink" val=""></li>
							</ul>
						</div>
						<div class="form-group">
							<label class="mt-2">Date</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<img src="<?php echo IMAGES; ?>icon3.png" alt="date" title="date">
									</div>
								</div>
								<input type="text" placeholder="YYYY/MM/DD" class="form-control" id="datepicker3" name="datepicker3"
								 autocomplete="off">
							</div>
							<ul class="padding-left-0px">
								<li id="date-error" class="pink" val=""></li>
							</ul>
						</div>
						<div class="form-group">
							<label for="duration">Duration</label>
							<select class="form-control" id="selectduration" name="selectduration">
								<option value="0">Please select</option>
							<?php

								if (!empty($projectPageData->project_week)) {
									foreach ($projectPageData->project_week as $value) {
										?>
										<option value="<?php echo $value->number_of_weeks; ?>"><?php echo $value->number_of_weeks . " Weeks"; ?></option>

							<?php
							}}
							?>





							</select>
							<ul class="padding-left-0px">
								<li id="duration-error" class="pink" val=""></li>
							</ul>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" name="email">
						</div>
						<ul class="padding-left-0px">
							<li id="email-error" class="pink" val=""></li>
						</ul>
						<div class="form-group">
							<label for="phone_number">Phone</label>
							<input type="text" class="form-control" id="phonenumber" name="phonenumber">
							<ul class="padding-left-0px">
								<li id="phonenumber-error" class="pink" val=""></li>
							</ul>
						</div>
						<input type="submit" class="btn btn-default form-control text-light pb-3" style="background-color:#e53b51;" value="Sign Up">
					</form>
				</div>
			</div>
		</div>
</body>
</html>