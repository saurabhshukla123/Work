<?php
 
include "function.php";
include 'projects.php'; 
session_start();
$anywhere="";
$category="";
$activity="";






if(isset($_POST["normal_select1"]))
{

$category=$_POST["normal_select1"];
$activity=$_POST["select_id_activity"];
$anywhere=$_POST["anywhere"];
$_SESSION['category']=$category;
$_SESSION['activity']=$activity;
}
else
{
	$category=$_SESSION['category'];
	$activity=$_SESSION['activity'];
}
 

	   

// echo "category ".$category."anywhere".$anywhere."Activity".$activity;
$countryid="";
if(isset($_POST["anywhere"]))
{
$p=new project();
$fields="id,name";
$tablename="countries";

$conditions="name LIKE '%$anywhere%'";

// $row=$p->select($fields,$tablename,$conditions);

//$sql1="SELECT id,name FROM  where name LIKE '%$anywhere%'";
// $cities = $conn->query($sql1);
$countries=$p->select($fields,$tablename,$conditions);
 while($valuecity = $countries->fetch_assoc()) 
 {
	// echo "id".$valuecity['id']."name".$valuecity['name'];
	$countryid=$valuecity['id'];
	$_SESSION['countries']=$countryid;
 } 
}
else
{
	$countryid=$_SESSION['countries'];
}								
 //$sql="SELECT pc.cost DIV pc.number_of_weeks AS per_week_cost,pc.number_of_weeks AS total_weeks,o.name AS orgname,p.title AS title,p.image AS image FROM projects AS p INNER JOIN organizations AS o  on p.organization_id=o.id  INNER JOIN project_costs AS pc ON pc.project_id=p.id where category_id='$category' AND city_id='$cityid' AND activity_id='$activity'";
	
	//  $sql="SELECT pc.cost DIV pc.number_of_weeks AS per_week_cost,pc.number_of_weeks AS total_weeks,o.name AS orgname,p.title AS title,p.image AS image FROM projects AS p INNER JOIN organizations AS o on p.organization_id=o.id  INNER JOIN project_costs AS pc  ON pc.project_id=p.id ";
	// $project = $conn->query($sql);
	// $value=$project->num_rows;
	//$_SESSION["totalrecords"]="";
		
		//echo "id".$valueproject['id']."name".$valueproject['title'];
	//} 

	//$_SESSION["totalrecords"]=$res->num_rows;


	$p1=new project();
	$fields1="name,id";
	$tablename1="activites";
	
	$conditions1="";
	
	// $row=$p->select($fields,$tablename,$conditions);
	
	//$sql1="SELECT id,name FROM  where name LIKE '%$anywhere%'";
	// $cities = $conn->query($sql1);
	//$countries=$p->select($fields1,$tablename1,$conditions1);
//	$sql_activity="SELECT name,id FROM activites";
	$activity_result1 = $p1->select($fields1,$tablename1,$conditions1);

	$p2=new project();
	$fields2="name,id";
	$tablename2="categories";
	
	$conditions2="";
	// $sql_activity1="SELECT name,id FROM categories";
	// $activity_result2 = $conn->query($sql_activity1);

	$activity_result2 = $p2->select($fields2,$tablename2,$conditions2);
	
						$p2=new project();
						$fields3="pc.cost DIV pc.number_of_weeks AS per_week_cost,pc.number_of_weeks AS total_weeks,o.name AS orgname,p.id AS id,p.title AS title,p.image AS image";
						$tablename3="projects AS p INNER JOIN organizations AS o on p.organization_id=o.id  INNER JOIN project_costs AS pc  ON pc.project_id=p.id";
						
						$conditions4count="category_id='$category' AND country_id='$countryid' AND activity_id='$activity' ";
						
						$re1 = $p2->count($fields3,$tablename3,$conditions4count);
						$_SESSION["totalrecords"]=$re1;


?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<title>Search</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,700');
	</style>
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />
	<link rel="stylesheet" href="css/dropkick.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" href="css/media.css" type="text/css">
	<link href="css/pagination.css" rel="stylesheet" type="text/css" />
	<link href="css/A_green.css" rel="stylesheet" type="text/css" />
</head>

<body class="search">
	<div>
	<header class="headerformatcontact-none" >
				<nav class="navbar navbar-expand-sm" id="navigation">
								<a href="#" class="header-margin"><img  src="images/logo.png" class="headerformatimg" /></a>
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
		    						<span class=" "><img src="images/menu.svg"></span>
		 						</button>
		             	 <div class="collapse navbar-collapse" id="myNavbar">
								<ul class="navbar nav mr-auto text-light ">&nbsp;&nbsp;
									<li class="nav-item headertext"><a href="#" class="nav-link blue">HOW IT WORKS</a></li>
									<li class="nav-item headertext "><a href="#" class="nav-link blue">CONTACT US</a></li>
								</ul>
								<input type="button" class="btn button-border-login" id="loginbtn" value="Login"> 
					            
						</div>
				  
		
				</nav>
				<div id="imagetext-contactus">
					<h1 class="font-weight-bold"></h1>	
				</div>
			</header>
	</div>
	<div class="main" style="background-color:#f8f9fa;">
		<div class="container pt-3">
			<div class="row pb-2 display-none-search">
				<div class="col-lg-12 col-md-12 ">
					<div class="row ">
						<div class="col-lg-4 col-md-4 ">
							<h1 class="blue" style="font-size:14px;">Cause</h1>
						</div>
						<div class="col-lg-4 col-md-4 ">
							<h1 class="blue" style="font-size:14px;">Country</h1>
						</div>
						<div class="col-lg-4 col-md-4 ">
							<h1 class="blue search-activity-page" style="font-size:14px;margin-left: -94px;">Activity</h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row pb-3 display-none-search">
				<div class="col-lg-12 col-md-12">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<div class="row">
								<div class="col-lg-4 col-md-6">
									<label class="check">Volunteer
									
											
											
										<input type="checkbox" <?php if(isset($category) && $category==1){ echo 'checked'; } ?>>
										
										<span class="checkmark"></span>
										
									</label>
								</div>
								<div class="col-lg-4 col-md-6">
									<label class="check">Teach
										<input type="checkbox" <?php if(isset($category) && $category==2){ echo 'checked'; } ?>>
										<span class="checkmark" ></span>
									</label>
								</div>
								<div class="col-lg-4 padding-top-tablet">
									<label class="check">Intern
										<input type="checkbox" <?php if(isset($category) && $category==3){ echo 'checked'; } ?>>
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="search-select">
								<input type="text" name=""  class="form-control" style="height: 47px;" placeholder="country" value="">
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="search-select2">
								<select class="form-control" style="height:47px;">
								<?php while($activity_value = $activity_result1->fetch_assoc()) { ?>
											
											<option value="<?php echo $activity_value["id"];?>"  <?php echo ($activity_value['id'] == $activity) ? "selected" : ""; ?>><?php echo $activity_value["name"];?></option> 
											<?php }?>
								</select>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-12 ">
							<div style="padding-left: inherit;" class="d-sm-none d-none d-md-none d-lg-block">
								<button type="button" id="morefilter" class="btn button-border">
									More filters<span class="badge-text badge">4</span>
								</button>

							</div>
							<div class="d-sm-block d-block d-lg-none d-md-block">

								<button type="button" class="btn btn-info btn-lg button-border text-center" style="width:57%;" data-toggle="modal"
								 data-target="#testModal">...<span class="badge-text badge" style="top:-34px; left:26px;">4</span>
								</button>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container pt-3 ">
		<div class="modal fade d-lg-none d-xs-none" id="testModal" role="dialog">
			<div class="modal-dialog" style="padding-right: 0px;display: block;left: 39%;top: 15%;padding: 9px;height: -webkit-fill-available"
			 ;">
			 <!-- Modal content-->
				<div class="modal-content" style="height: 644px;width: 321px;">
					<!--  <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Modal Header</h4>
		        </div> -->
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<!--  <button type="button" class="close" data-dismiss="modal" id="close">&times;</button> -->
									<div class="col-lg-4 border-right padding-top-mobile">
										<div class="row">
											<div class="col-lg-6 col-6">
												<lable class="blue font-size-14">
													Start date(range)</lable>
											</div>
											<div class="col-lg-6 col-6">
												<label class="float-right font-size-14 pink">Reset</label>
											</div>
										</div>
										<div class="row" style="padding-right: 23px;">
											<div class="col-lg-4 col-4" style="padding-right: 0px;">
												<select class="form-control" style="padding-right: 0px;padding-left: 2px;">

													<option class="selected">Month</option>
													<option></option>
													<option></option>
												</select>
											</div>
											<div class="col-lg-4 col-4">
												<select class="form-control" style="padding-left: 5px;">

													<option class="selected">dd</option>
													<option></option>
													<option></option>
												</select>
											</div>
											<div class="col-lg-4 col-4" style="padding-left: 0px;">
												<select class="form-control">

													<option class="selected">yyyy</option>
													<option></option>
													<option></option>
												</select>
												<lable class="dash">-</lable>
											</div>
										</div>
										<div class="row pt-2" style="padding-right: 23px;">
											<div class="col-lg-4 col-4" style="padding-right: 0px;">
												<select class="form-control" style="padding-right: 0px;padding-left: 2px;">

													<option class="selected">Month</option>
													<option></option>
													<option></option>
												</select>
											</div>
											<div class="col-lg-4 col-4">
												<select class="form-control" style="padding-left: 5px;">

													<option class="selected">dd</option>
													<option></option>
													<option></option>
												</select>
											</div>
											<div class="col-lg-4 col-4" style="padding-left: 0px;">
												<select class="form-control">

													<option class="selected">yyyy</option>
													<option></option>
													<option></option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-4 pt-3">
										<div class="row">
											<div class="col-lg-6 col-6">
												<lable class="blue font-size-14">
													Duration</lable>
											</div>
											<div class="col-lg-6 col-6">
												<label class="float-right font-size-14 pink">Reset</label>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12 col-12">
												<input type="text" id="amounttablet" readonly style="border:0;padding-bottom: 7px;">
												<!-- 	<label for="amount">Price range:</label> -->
											<div id="slider-rangetablet" style="color:black"></div>
											</div>
										</div>
									</div>
									<div class="col-lg-4 padding-top-mobile pb-4 pt-3">
										<div class="row">
											<div class="col-lg-12">
												<lable class="blue font-size-14">
													Minimum Age</lable>
											</div>
										</div>
										<div class="row pt-2 border-left">
											<div class="col-lg-12">
												<select class="form-control">
													<option class="selected">--</option>
													<option></option>
													<option></option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md pt-5" style="justify-content: center;">
										<!-- <div class="col-lg-12 justify-content-center"> -->
										<button class="btn  blueback text-light" style="margin-left: 98px;">See Results </button>
										<!-- </div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--   <div class="modal-footer">		         
		        </div> -->
				</div>
			</div>
		</div>

		<!--Tablet view  style="padding-right: 0px;display: block;left: 55%;top: 17%;padding: 9px;"-->

		<div class="modal fade d-lg-none d-xs-none" id="myModal" role="dialog">
			<div class="modal-dialog" style="padding-right: 0px;display: block;left: 55%;top: 17%;padding: 9px;">
				<div class="modal-content" style="width: 335px;padding-top: inherit;/* left: -25%; */left: 1px;height: 690px;padding: 16px;">
					<div class="modal-header">
						<h4 class="modal-title">Modal Header</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<button type="button" class="close" data-dismiss="modal" id="close">&times;</button>
									<div class="col-lg-4 border-right padding-top-mobile pt-3">
										<div class="row">
											<div class="col-lg-6 col-6">
												<lable class="blue font-size-14">
													Start date(range)</lable>
											</div>
											<div class="col-lg-6 col-6">
												<label class="float-right font-size-14">Reset</label>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4 col-4">
												<select class="form-control">
													<option class="selected">Month</option>
													<option></option>
													<option></option>
												</select>
											</div>
											<div class="col-lg-4 col-4">
												<select class="form-control">

													<option class="selected">dd</option>
													<option></option>
													<option></option>
												</select>
											</div>
											<div class="col-lg-4 col-4">
												<select class="form-control">

													<option class="selected">yyyy</option>
													<option></option>
													<option></option>
												</select>
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-lg-4 col-4">
												<select class="form-control">

													<option class="selected">Month</option>
													<option></option>
													<option></option>
												</select>
											</div>
											<div class="col-lg-4 col-4">
												<select class="form-control">

													<option class="selected">dd</option>
													<option></option>
													<option></option>
												</select>
											</div>
											<div class="col-lg-4 col-4">
												<select class="form-control">

													<option class="selected">yyyy</option>
													<option></option>
													<option></option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-4 pt-3">
										<div class="row">
											<div class="col-lg-6 col-6">
												<lable class="blue font-size-14">
													Duration</lable>
											</div>
											<div class="col-lg-6 col-6">
												<label class="float-right font-size-14">Reset</label>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12 col-12">
												<input type="text" id="amounttablet" readonly style="border:0;padding-bottom: 7px;">
												<!-- 	<label for="amount">Price range:</label> -->
												<div id="slider-rangetablet" style="color:black"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 padding-top-mobile pb-4 pt-3">
									<div class="row">
										<div class="col-lg-12">
											<lable class="blue font-size-14">
												Minimum Age</lable>
										</div>
									</div>
									<div class="row pt-2 border-left">
										<div class="col-lg-12">
											<select class="form-control">
												<option class="selected">--</option>
												<option></option>
												<option></option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md pt-5" style="justify-content: center;">
									<!-- <div class="col-lg-12 justify-content-center"> -->
									<button class="btn  blueback text-light" style="margin-left: 106px;">See Results </button>
									<!-- </div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>

	<!--Tablet View end -->


	<div class="container">
		<!-- Panel for mobile View-->
		<div class="d-sm-block d-block d-md-none d-lg-none bg-search-color">
			<div class="container">
				<div class="row pb-3">
					<div class="col-8">
						<div class="row">
							<div class="col-10 font-size-11">
								<span class="blue">Volunteer</span> in <span class="blue">Combodia</span> for <span class="blue">Animal
									Conversation</span>
							</div>
							<div class="col-2">
								<img class="mobile-edit-search-button" src="images\edit-icon.png">
							</div>
						</div>
					</div>
					<div class="col-4 border-left" style="padding-right: 0px;">
						<button type="button" id="morefilter1" class="btn button-border width-full padding-top-10 border-no-radius" style="width:100%;height: 36px; font-size: 12px;padding: 7px;">
							More filters
							<span class="badge-text badge">4</span>
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Mobile view end-->
    <div class="container d-md-none d-lg-block" style="flex-wrap: wrap;z-index: 20;height: auto;padding-left: 0px; background: white;width: 96%;position: absolute;">
		<div class="panel1" id="panel1">
			<div class="row">
				<div class="col-lg-12 pt-1">
					<div class="row">
						<div class="col-12 text-center" style="height:20px;">
							<label class="display-close-none" id="closemodel">
								<button type="button" class="close display-close-none" data-dismiss="modal" id="close" style="font-size:43px;">&times;</button>
							</label>
															
						</div>
						<div class="col-lg-4 border-right padding-top-mobile">
							<div class="row">
								<div class="col-lg-6 col-6">
									<lable class="blue font-size-14">
										Start date(range)</lable>
								</div>
								<div class="col-lg-6 col-6">
									<label class="float-right font-size-14 remove-pink pink">Reset</label>
								</div>
							</div>
							<div class="row pr-26">
								<div class="col-lg-4 col-4 pr-0">
									<select class="form-control">
										<option class="selected">Month</option>
										<option></option>
										<option></option>
									</select>
								</div>
								<div class="col-lg-4 col-4">
									<select class="form-control">

										<option class="selected">dd</option>
										<option></option>
										<option></option>
									</select>
								</div>
								<div class="col-lg-4 col-4 pl-0" style="position:relative;">
									<select class="form-control">
										<option class="selected">yyyy</option>
										<option></option>
										<option></option>
									</select>
									<lable class="dash">-</lable>
								</div>
							</div>
							<div class="row pt-2 pr-26">
								<div class="col-lg-4 col-4 pr-0">
									<select class="form-control">
										<option class="selected">Month</option>
										<option></option>
										<option></option>
									</select>
								</div>
								<div class="col-lg-4 col-4">
									<select class="form-control">
										<option class="selected">dd</option>
										<option></option>
										<option></option>
									</select>
								</div>
								<div class="col-lg-4 col-4 pl-0">
									<select class="form-control">
										<option class="selected">yyyy</option>
										<option></option>
										<option></option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-4 padding-top-mobile">
							<div class="row">
								<div class="col-lg-6 col-6">
									<lable class="blue font-size-14">
										Duration</lable>
								</div>
								<div class="col-lg-6 col-6">
									<label class="float-right font-size-14 remove-pink pink">Reset</label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-12">
									<input type="text" id="amount" readonly style="border:0;padding-bottom: 7px;">
									<!-- 	<label for="amount">Price range:</label> -->
									<div id="slider-range" style="color:black"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 padding-top-mobile">
							<div class="row">
								<div class="col-lg-12">
									<lable class="blue font-size-14">
										Minimum Age</lable>
								</div>
							</div>
							<div class="row pt-2 border-left">
								<div class="col-lg-12">
									<select class="form-control">
										<option class="selected">--</option>
										<option></option>
										<option></option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
			<div class="row pt-5 pb-4" style="justify-content: center;">
				<!-- <div class="col-lg-12 justify-content-center"> -->
				<button class="btn  blueback text-light btn-search-mobile">See Results</button>
				<!-- </div> -->
			</div>
		</div>
	</div>
	<div class="container opacity-search" style="padding-left:0px;padding-right: 0px;">
		<div class="row pb-3 pt-2">
			<div class="col-lg-8 col-md-8 col-5">
				<span>
					<lable class="font-16px"><?php echo $_SESSION["totalrecords"];?> Result</lable>
				</span>
			</div>
			<div class="col-lg-4 col-md-4 col-7"><span class="float-right" style="font-size:14px;">
					Sort by:
					<select class="search-select" style="font-size:14px;" id="select1">
						<option>Relevance</option>
					</select>
				</span>
			</div>
		</div>
		<div class="row search_page">
			<div class="col-lg-12 col-md-12">
				<div class="row">
					<?php $i=0;
				
						$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
						$limit = 1 ; //if you want to dispaly 10 records per page then you have to change here
						$startpoint = ($page * $limit) - $limit;
					// $statement = "projects AS p INNER JOIN organizations AS o on p.organization_id=o.id  INNER JOIN project_costs AS pc  ON pc.project_id=p.id"; //you have to pass your query over here
						//$statement = "projects AS p INNER JOIN organizations AS o on p.organization_id=o.id  INNER JOIN project_costs AS pc  ON pc.project_id=p.id where category_id='$category' OR city_id='$cityid' OR activity_id='$activity'"; //you have to pass your query over here
						$statement = "projects AS p INNER JOIN organizations AS o on p.organization_id=o.id  INNER JOIN project_costs AS pc  ON pc.project_id=p.id where category_id='$category' AND country_id='$countryid' AND activity_id='$activity'"; //you have to pass your query over here
						
						//$query="SELECT pc.cost DIV pc.number_of_weeks AS per_week_cost,pc.number_of_weeks AS total_weeks,o.name AS orgname,p.id AS id,p.title AS title,p.image AS image FROM {$statement} LIMIT {$startpoint} , {$limit}";
					
						///new code
						$p2=new project();
						$fields3="pc.cost DIV pc.number_of_weeks AS per_week_cost,pc.number_of_weeks AS total_weeks,o.name AS orgname,p.id AS id,p.title AS title,p.image AS image";
						$tablename3="projects AS p INNER JOIN organizations AS o on p.organization_id=o.id  INNER JOIN project_costs AS pc  ON pc.project_id=p.id";
						$conditions3="category_id='$category' AND country_id='$countryid' AND activity_id='$activity' LIMIT {$startpoint} , {$limit}";
						$res = $p2->select($fields3,$tablename3,$conditions3);
						
						$conditions4count="category_id='$category' AND country_id='$countryid' AND activity_id='$activity' ";
						
						$re1 = $p2->count($fields3,$tablename3,$conditions4count);
						$_SESSION["totalrecords"]=$re1;
						//ends
					
					
						//$res=$conn->query($query);//	$valueproject = $project->fetch_assoc()

				while($valueproject=$res->fetch_assoc()) 
					{$i++;
						?>
					<div class="col-lg-4 col-md-4 pt-4">
						<div class="image">
							<div id="carouselExampleControls<?php echo $i;?>" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="<?php echo $valueproject['image'];?>" height="200px" alt="First slide">
									
										<h5 class="search-owl-first"><a href="#" class="pink"><?php echo $valueproject['orgname'];?></a></h5>
									</div>									
								</div>
								<a class="carousel-control-prev" href="#carouselExampleControls<?php echo $i;?>" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleControls<?php echo $i;?>" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<div class="text-search pt-1">
								<h5><a href="volunteer.php?id=<?php echo $valueproject['id'];?>" style="font-size:16px; color:black;"><?php echo $valueproject['title'];?></a>
								</h5>
								<span>
									<img src="images/volunteer-logo01.png" style=" height: 22px;width: 22px; border-radius: 9px">
									<a href="#" class="blue" style="font-size:14px;">Love Volunteer</a>
								</span>
								<a href="#" class="blue" style="font-size:14px; color:black;display:block;">$<?php echo $valueproject["per_week_cost"]?>/week 1-<?php echo $valueproject["total_weeks"]?> Weeks duration</a>
							</div>
						</div>
					</div>
					<?php }?> 				
				</div>
			</div>
		</div>
		

	
		<div class="paging text-center justify-content-center  tablet-pagination mobile-pagination pt-3" style="padding-left:465px;font-size: 16px;padding-bottom:10px;">
		<?php
		echo "<div id='pagingg' >";
		echo pagination($statement,$limit,$page);
		echo "</div>";
		?>	
		
		<!-- <nav aria-label="..." class="text-center">
				<ul class="pagination">
					<li class="page-item active"><a class="page-link blue" href="#">1</a></li>
					<li class="page-item ">
						<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item"><a class="page-link" href="#">...</a></li>
					<li class="page-item">
						<a class="page-link" href="#">12</a>
					</li>
				</ul>
			</nav> -->
		</div>
	</div>
	</div>
	</div>
	</div>
	<footer class="bg-dark text-light">
		<?php include 'footer.php';?>
	</footer>
	<script src="js/jquery-3.3.1.min.js"> </script>
	<script src="js/owl.carousel.js"> </script>
	<script src="js/jquery-ui.js"> </script>
	<script src="js/bootstrap.js"> </script>
	<script src="js/bootstrap.min.js"> </script>
	<script src="js/util.js"> </script>
	<script src="js/dropkick.js"> </script>
	<script type="text/javascript" src="js/searchpage.js">
	</script>
	</body>
</html>