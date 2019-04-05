
<?php
// if(isset($_SESSION["status"]))
// {
// 	if($_SESSION["status"]=="not exists")
// 	{
// 		$_SESSION["status"]="";
// 		echo "<script> alert('Email dosen\'t exists'); </script>";
// 	}
// 	if($_SESSION["status"]=="sent")
// 	{
// 		$_SESSION["status"]="";
// 		echo "<script> alert('Password reset link has been sent to your Email id'); </script>";
// 	}
// 	if($_SESSION["status"]=="failed")
// 	{
// 		$_SESSION["status"]="";
// 		echo "<script> alert('Something went wrong!!'); </script>";
// 	}
// }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forgot Password</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="<?php echo ASSETS_URL; ?>images/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_URL; ?>css/main.css">
		<style type="text/css">
	</style>
	</head>
	<body>
		<div class="wrapper admin-wrapper admin-login">
			<section class="login_wrapper " style="background: url(<?php echo ASSETS_URL; ?>images/banner-img.jpg);">
				<div class="login_outer">
				 <!-- code start for alert -->
				 <?php if($_SESSION["status"]=="not exists"){ 
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-danger update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                Sorry Email dosen't exists
                            </div>
                            <?php }?>
                            <?php if($_SESSION["status"]=="sent"){
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-info update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
								Password reset link has been sent to your Email id
                            </div>
                            <?php }?>
                            <?php if($_SESSION["status"]=="failed"){
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-info update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
								Something went wrong!!
                            </div>
                            <?php }?>
                        <!-- code ends for alert -->			
					<h1>Welcome to Volunteer Overseas</h1>
					<span id="invalid_error" style="color:red;" value="" ></span>
					<form method="POST" name="forgotpassword" onsubmit="return validateFormData()" action="ForgotPassword"> 
						<div class="form-group">
							<label>Enter Email</label>
							<input  type="text" id="email" name="email"  class="form-control">
							<span id="email_error" style="color:red;" value=""></span>
						</div>
						<div class="form-group">
							Already Signed Up? Click Log In to login your account <a href="Login" class="forgot_link" title="Login">Log In</a>
						</div>					
						<div class="text-center">
							<div id="loading" style="display:none;  background: url('<?php echo IMAGES; ?>/loading.gif') 50% 50% no-repeat rgb(249,249,249);">
							</div>
						</div>
						<div class="button-outer text-center">
                            <input type="submit" value="Submit" class="btn btn-fill btn-large"/>
						</div>						
					</form>
				</div>
			</section>
		</div>
		<script type="text/javascript" src="<?php echo ADMIN_ASSETS_URL; ?>js/main.js"></script>
		<script type="text/javascript" src="<?php echo ASSETS_URL; ?>js/ForgotPassword.js"></script>
		<script type="text/javascript" src="<?php echo ASSETS_URL;?>js/commonalert.js"></script>
	</body>
</html>
