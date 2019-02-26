<?php
session_start();
session_destroy();
include 'model/activity.php';
include 'model/category.php';
include 'model/project.php';
define('IMAGES', 'images/');

$activity_get=new activity();
$categories_get=new categories();

// project model class 
$p1=new projects();
$result_trending=$p1->get_trending_projects();
$result_feature=$p1->get_feature_projects();
$result_affordable=$p1->get_affordable_projects();

$result=$result_trending; 
$result1=$result_feature;
$result2=$result_affordable;

$activity_result1 = $activity_get->getallactivities();
$activity_result = $activity_get->getallactivities();
$type_result = $categories_get->getallcategories();
$type_result1 = $categories_get->getallcategories(); 

// unset ($_SESSION["colummsfilter"]);
// unset ($_SESSION["tablename_filter"]);
// unset ( $_SESSION["value"]);
// unset ( $_SESSION['popularity']);
// unset ( $_SESSION['relevance']);



	 
?>
<!DOCTYPE html>
<html>
<head>

	<title>Home Page</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/mbr-additional.css" type="text/css">
	<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,700');
	</style>
	<link rel="stylesheet" href="css/dropkick.css" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" href="css/media.css" type="text/css">
</head>
<body>
	<div class="main">
		<header class="headerformat-home">
			<?php include 'header.php';?>
			<div id="imagetext-home">
				<h1 class="font-weight-bold imagetext-home">Discover Yourself, Discover the World</h1>
			</div>
			<div id="imagetext-home-sub1">
				<h1 class="imagetext-home-sub1">Apply to your prefect volunteer,intern, or teach abbroad program.</h1>
			</div>
			<div class="container container-absolute-home">
				<form  method="post" action="search.php" name="bannerform">
				<div class="homepage form">
					<div class="row" style="justify-content: center;">
						<div class="col-lg-9 col-md-12 col-12 font-size-mobile-home d-sm-block d-md-none d-lg-none">
							
							<div class="row no-gutter border-round-homepage">
								<div class="col-3">
									<lable class="border-no-right form-control pink border-round-left " style="display: flex;">Type</lable>
								</div>
								<div class="col-9">
									<select class="form-control border-round-right border-no-left" id="desktop_banner_category">
									<?php while($type_value = $type_result1->fetch_assoc()) { ?>
											<option class="text-black bold"  value="<?php echo $type_value["id"];?>"><?php echo $type_value["name"];?></option> 
										
											<?php }?>	
									
									</select>
								</div>
							</div>
							<div class="row no-gutter border-round-homepage pt-2">
								<div class="col-4">
									<lable class=" border-no-right form-control pink border-round-left" style="display: flex;">Location</lable>
								</div>
								<div class="col-8">
									
										<input type="text" class="form-control border-round-right border-no-left" placeholder="Anything" value="Anything">
									<!-- <select class="form-control border-round-right border-no-left">
										<option class="text-black bold">Anywhere</option>
									</select> -->
								</div>
							</div>
							<div class="row no-gutter border-round-homepage pt-2">
								<div class="col-4">
									<lable class="form-control pink border-round-left border-no-right" style="display: flex;">Activity</lable>
								</div>
								<div class="col-8">
									<select class="form-control border-round-right border-no-left"  id="desktop_banner_activity">
									<?php while($activity_value = $activity_result1->fetch_assoc()) { ?>
											
											<option value="<?php echo $activity_value["id"];?>"><?php echo $activity_value["name"];?></option> 
											<?php }?>
									</select>
								</div>
							</div>
							<div class="row no-gutter border-round-homepage pt-2">
								<div class="col-12">
								</div>
								<button type="submit" class="btn  border-round border-color-none form-control size-21px homepage-search-btn"
								style="padding-top: 0px;padding-bottom: 0px;color: white;width:100%;height: 41px;float:left;margin:0px;margin-top: 2px;font-size: 13px!important;background-color: #e53b51;">Search</button>
							</div>
						</div>
						<div class="col-lg-9 col-md-12 col-12 font-size-mobile-home display-none-home">
							<div class="row no-gutter">
								<div class="col-md-4  text-light text-center display-flex">
									<lable class="form-control bg-transparent border-none size-15px">Type</lable>
									<div class="select2">
										<select id="normal_select1" class="form-control bg-transparent border-no-radius size-21px" name="normal_select1">
										<?php while($type_value = $type_result->fetch_assoc()) { ?>
											<option value="<?php echo $type_value["id"];?>"><?php echo $type_value["name"];?></option> 
										
											<?php }?>	
										
										</select>
									</div>

								</div>
								<div class="col-md-3 text-light text-center display-flex">
									<lable class="form-control bg-transparent border-none size-15px">Location</lable>
									<input type="text" name="anywhere" id="anywhere" placeholder="Anywhere" class="text-center text-light show-border border-right form-control bg-transparent border-no-radius size-21px"
									 style="height: 41px;">
								</div>
								<div class="col-md-3 text-light text-center display-flex">
									<lable class="form-control bg-transparent border-none size-15px">Activity</lable>
									<div class="select1">
										<select class="form-control bg-transparent border-no-radius  size-21px" style="padding-left: 51px;" id="select_id_activity" name="select_id_activity">
										<?php while($activity_row = $activity_result->fetch_assoc()) { ?>
											
											<option value="<?php echo $activity_row["id"];?>"><?php echo $activity_row["name"];?></option> 
											<?php }?>						

										</select>
									</div>
								</div>
								<div class="col-md-2 text-light text-center display-flex">
									<lable class="form-control bg-transparent border-none"> </lable>
									<button type="submit"  class="btn  form-control size-21px homepage-search-btn" style="color: white;width:100%;height: 41px;float:left;margin:0px;margin-top: 2px; background-color: #e53b51;">Search</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
	</div>
	</header>
	<div class="container-fluid   mb-3 remove-margin-mobile-home ml-8" style="padding-left: 31px;">
		<div class="row pb-1 pt-5">
			<div class="col-md-12">
				<h3 class="bluebold">Trending Projects</h3>
			</div>
		</div>

		<div class="row pr-3  pt-2">
			<div class="col-md-12">
				<div class="owl-one owl-carousel owl-theme pb-5" style="position:relative;">
			
				<?php while($row = $result->fetch_assoc()) {
                            ?>
					<div class="item ">
						<div style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, 0)0%, rgba(0, 0, 0, 0.06) 10%, rgba(0, 0, 0, 0.15) 22%,rgba(0, 0, 0, 0.72) 75%, rgba(0, 0, 0, 0.84) 89%, rgba(0, 0, 0, 0.91) 100%),url(<?php echo IMAGES; echo $row["image"]?>); background-repeat: no-repeat; height:320px; background-size:cover;">
							<h3><?php echo $row["country_name"]?></h3>
							<a  href="volunteer.php?id=<?php echo $row['id'];?>">
								<h2><?php echo $row["project_name"]?></h2>
							</a>
							<a href="#">
								<h1><?php echo $row["organization_name"]?></h1>
							</a>
							<a href="#">
								<h4 class="owl-carousel-span"><?php echo $row["number_of_views"]?> people reaching this project</h4>
							</a>
						</div>
					</div>
					<?php }?>
					
				</div>
			</div>
		</div>
		<div class="row pb-1 pt-4">
			<div class="col-md-12">
				<h3 class="bluebold">Features Destinations</h3>
			</div>
		</div>
		<div class="row pr-3 pt-2">
			<div class="col-md-12">
				<div class="owl-two owl-carousel owl-theme pb-5">
					
					<?php while($row1 = $result1->fetch_assoc()) {
                            ?>
					<div class="item" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0)0%, rgba(0, 0, 0, 0.06) 10%, rgba(0, 0, 0, 0.15) 22%,rgba(0, 0, 0, 0.72) 75%, rgba(0, 0, 0, 0.84) 89%, rgba(0, 0, 0, 0.91) 100%),url(<?php echo IMAGES; echo $row1["country_image"]?>);height:200px;  background-size:cover;">
						<a href="#">
							<h5 class="owl-carousel-second-slider-red pink"><?php echo $row1["total_projects"]?> Projects in </h5>
						</a>
						<a href="#">
							<h5 class="owl-carousel-second-slider"><?php echo $row1["country_name"]?></h5>
						</a>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row  pt-4">
			<div class="col-md-12">
				<h3 class="bluebold font-size-24">Most Affordable Projects</h3>
			</div>
		</div>
		<div class="row pr-3 pt-2 ">
			<div class="col-md-12">
				<div class="owl-three owl-carousel owl-theme pb-5">                        					
					<?php while($row2 = $result2->fetch_assoc()) {
                    ?>
					<div class="item">

						<div style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0)0%, rgba(0, 0, 0, 0.06) 10%, rgba(0, 0, 0, 0.15) 22%,rgba(0, 0, 0, 0.72) 75%, rgba(0, 0, 0, 0.84) 89%, rgba(0, 0, 0, 0.91) 100%),url(<?php  echo IMAGES; echo $row2["image"]?>);height:320px;  background-size:cover;">
							<h5 class="owl-carousel-slider-start">Starting at</h5>
							<a href="#">
								<h5 class="owl-carousel-slider-map">$<?php echo $row2["per_week_cost"]?>/week</h5>
							</a>
							<a href="#">
								<h5 class="owl-carousel-slider-for-week">for <?php echo $row2["total_weeks"]?> Weeks</h5>
							</a>
							<a href="#">
								<h5 class="owl-carousel-slider-surf"><?php echo $row2["project_name"]?></h5>
							</a>
						</div>
						<div class="absolute-position">
							<h5 class="owl-carousel-slider-southafrica"><a href="#" class="pink"><?php echo $row2["country_name"]?></h5></a>
							<h5 class="owl-carousel-slider-ghana-volunteer"><a href="#" class="blue"><?php echo $row2["oname"]?></h5></a>
						</div>
					</div>
					<?php }?>
					
				</div>
			</div>
		</div>
	</div>
	<footer class="bg-dark text-light">
		<?php include 'footer.php';?>
	</footer>
	</div>
	<script src="js/jquery-3.3.1.min.js"> </script>
	<script src="js/owl.carousel.js"> </script>
	<script src="js/jquery-ui.js"> </script>
	<script src="js/bootstrap.js"> </script>
	<script src="js/bootstrap.min.js"> </script>
	<script src="js/dropkick.js"> </script>
	<script>
		$(document).ready(function () {
			$("#normal_select1").dropkick({
				mobile: true
			});
		});
		$(document).ready(function () {
			$("#normal_select2").dropkick({
				mobile: true
			});
		});
	</script>
	<!-- 	 <script src="js/owlcarousel/owl.carousel.min.js" > </script>
	 -->
	<script>
		$('.owl-one').owlCarousel({
			loop: false,
			margin: 10,
			nav: true,
			dots: false,
			navText: ["<img src='images/left-arrow.png' >", "<img src='images/right-arrow.png'>"],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 4
				}
			}
		})
		$('.owl-two').owlCarousel({
			loop: false,
			margin: 10,
			nav: true,
			dots: false,
			navText: ["<img src='images/left-arrow.png'  >", "<img src='images/right-arrow.png'>"],

			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 6
				}
			}
		})
		$('.owl-three').owlCarousel({
			loop: false,
			margin: 10,
			nav: true,
			dots: false,
			navText: ["<img src='images/left-arrow.png' >", "<img src='images/right-arrow.png'>"],

			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 5
				}
			}
		})
	</script>
</body>
</html>