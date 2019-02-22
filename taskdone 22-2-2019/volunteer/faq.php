<?php
session_start();
include 'model/faq.php';
// $conn = OpenCon(); 
if(isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "organization") {
        header('Location:error.php');
    }
  

elseif($_SESSION['role'] == "superadmin"){
    // header('Location:../admin/login.php');

}
}
else {
    header('Location: admin/login.php');
}
?>


<!DOCTYPE html>
<html>
<head>

	<title> FAQ </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/media.css" type="text/css">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,700');
</style>
</head>
<body>
	<header class="headerformatfaq">
		<nav class="navbar navbar-expand-sm">
			<a href="#" class="header-margin"><img src="images/logo_1.png	" class="headerformatimg"/></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
				<span class=" "><img src="images/menu.svg"></span>
			</button>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="navbar nav mr-auto text-light ">&nbsp;&nbsp;
					<li class="nav-item headertext"><a href="#" class="nav-link">HOW IT WORKS</a></li>
					<li class="nav-item headertext "><a href="#" class="nav-link">CONTACT US</a></li>
				</ul>
				<input type="button" class="btn button-transparent  text-light  " id="loginbtn" value="Login">
			</div>
		</nav>
		<div id="imagetext-faq">
			<h1 class="font-weight-bold ">FAQ</h1>
		</div>
	</header>	
	<div class="container pt-4 ">
		<div class="row pb-5">
			<div class="col-md-12 ">
				
				<div id="accordion">
					<?php 
					
				
					$i=0;
					$faq_get_details=new faq();
					$result_faq=$faq_get_details->allfaqdetails();
					 while($type_value = $result_faq->fetch_assoc()) { 
						 $i++;
					?>
					<div class="card">
						<div class="card-header" id="headingOne<?php echo $i;?>">
							<h5 class="mb-0">
								<div class="one<?php echo $i;?>">
									<div class="row">
										<div class="col-md-10 col-10 col-2" style="display: flex;">
											<p data-toggle="collapse" class="font-xxl bluebold" data-target="#collapseOne<?php echo $i;?>" aria-expanded="true"
											 aria-controls="collapseOne<?php echo $i;?>"><?php echo $type_value['question'];?>
											</p>
										</div>
										<div class="col-md-2 col-md-2 col-2">
										 <img src="images\arrow-toggle.png" class="float-right faq_arrow_toggle"  data-toggle="collapse" class="font-xxl bluebold"
											 data-target="#collapseOne<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne<?php echo $i;?>" /> 
											 <!-- <img src="images\arrow-toggle.png"  class="float-right faq_arrow_toggle" data-toggle="collapse" class="font-xxl bluebold"
										 data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo" /> -->
											</div>
									</div>
								</div>
						</div>
						</h5>
					</div>
					<div id="collapseOne<?php echo $i;?>" class="collapse " aria-labelledby="headingOne<?php echo $i;?>" data-parent="#accordion">
						<div class="card-body card-text text-muted">
						<?php echo $type_value['answer'];?>
						</div>
					</div>
					<?php } ?>
				</div>
				
		
			</div>
		</div>
	</div>
	</div>
	</div>
	<footer class="bg-dark text-light">
		<nav class="navbar navbar-expand-sm">
			<!-- Links -->
			<img src="images\logo_1.png" class="pl-5 inline nav-brand">
			<ul class="navbar-nav ml-auto pt-5 ">

				<li class="nav-item">
					<a class="nav-link" href="#">FAQ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">CONTACT US</a>
				</li>
			</ul>
		</nav>
	</footer>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/bootstrap.js"> </script>
	<script src="js/bootstrap.min.js"> </script>
	<script>
		$(document).ready(function () {
			$(".panel-heading").click(function () {
				$(this).closest(".panel").find(".panel-body").toggleClass("hide");
			});
			$(".fa.fa-times").click(function () {
				$(".panel-body").addClass("hide");
				$(this).parent(".panel").find(".panel-body").removeClass("hide");
			});
		});

	</script>
	<script>
      $(document).ready(function () {
        $(".card-header").click(function () {
          $(this).find('img').toggleClass("faq_toggel_button");
        });
      });
    </script>
</body>




</html>