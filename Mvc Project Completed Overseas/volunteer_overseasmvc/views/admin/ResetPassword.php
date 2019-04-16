<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reset Password</title>
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
			
					<h1>Welcome to Volunteer Overseas</h1>
					<span id="invalid_error" style="color:red;" value="" ></span>
					<form method="post" onsubmit="return validateFormData()" action="ResetPassword"> 
						<div class="form-group">
							<label>Enter New Password</label>
							<input  type="password" id="newpassword" name="newpassword"  class="form-control">
							<span id="newpwd_error" style="color:red;" value=""></span>

						</div>
						<div class="form-group">
							<label>Re-Enter Password</label>
							<input  type="password" id="password" name="password" placeholder="Password" class="form-control">
							<span id="pwd_error" name="pwd_error" class="bg-danger"   style="color:red;" value=""></span>
						</div>
					
						<div class="text-center">
							<div id="loading" style="display:none;  background: url('<?php echo IMAGES; ?>/loading.gif') 50% 50% no-repeat rgb(249,249,249);">
							</div>
							<div class="form-group">
							Already Signed Up? Click Log In to login your account <a href="Login" class="forgot_link" title="Login">Log In</a>
					      	</div>
						</div>
						<div class="button-outer text-center">
                            <input type="submit" value="Reset Password" class="btn btn-fill btn-large"/>							
						</div>
						
					</form>
				</div>
			</section>
		</div>

		<script type="text/javascript" src="<?php echo ADMIN_ASSETS_URL; ?>js/main.js"></script>
		<script src="<?php echo ASSETS_URL;?>js/jquery-3.3.1.min.js"> </script>
		<script type="text/javascript" src="<?php echo ASSETS_URL; ?>js/ResetPassword.js"></script>
	</body>
</html>
