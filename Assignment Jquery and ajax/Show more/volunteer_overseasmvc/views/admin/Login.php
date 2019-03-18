

<?php

$assets_url = ASSETS_URL;
$error = json_decode($error);

if (!empty($error->invalid)) {
    $error_invalid = $error->invalid;
}
if (!empty($error->password)) {
    $error_pwd = $error->password;
}
if (!empty($error->username)) {
    $error_username = $error->username;

}
if (!empty($error->invalid_userandpwd)) {
    $error_invalid = $error->invalid_userandpwd;

}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Volunteer Overseas</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="<?php echo ASSETS_URL; ?>images/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_URL; ?>css/main.css">
	</head>
	<body>
		<div class="wrapper admin-wrapper admin-login">

			<section class="login_wrapper " style="background: url(<?php echo ASSETS_URL; ?>images/banner-img.jpg);">
				<div class="login_outer">
					<h1>Welcome to Volunteer Overseas</h1>
					<span id="invalid_error" style="color:red;" ></span>
					<form method="post">
						<div class="form-group">
							<label>Username</label>
							<input  type="text" id="username" name="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" class="form-control">
							<span id="username_error" style="color:red;" value=""></span>

						</div>

						<div class="form-group">
							<label>Password</label>
							<input  type="password" id="password" name="password" placeholder="Password" class="form-control">
							<span id="pwd-error" class="bg-danger"   style="color:red;" value=""><?php echo $error_pwd; ?></span>
						</div>
						<div class="form-group">
							<a href="#" class="forgot_link" title="Forgot password?">Forgot password?</a>
						</div>
						<div class="button-outer text-center">
							<button type="button" id="submitButton" class="btn btn-fill btn-large" onClick="Login();">Sign In</button>
						</div>
					</form>
				</div>
			</section>
		</div>

		<script type="text/javascript" src="<?php echo ADMIN_ASSETS_URL; ?>js/main.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.search-btn-outer .search-btn').click(function(){
					window.location.href = 'search-result.html';
					return false;
				});

			});
			$(document).on('keypress',function(e) {
				if(e.which == 13) {
					event.preventDefault();
					document.getElementById("submitButton").click();
				}
			});


function Login()
{

	username=$("#username").val();
	password=$("#password").val();
	$("#username_error").html("");
	$("#pwd-error").html("");
	$("#invalid_error").html("");
			
	var data1 = {
		username: username,
		password: password
       };

	$.ajax({

    url : 'Login/loginverify',
    type : 'POST',
    
    data : data1,
   
	success : function(data) {	 
		var result = JSON.parse(data);
		if(result.invalid_userandpwd){
			$("#invalid_error").html(result.invalid_userandpwd);		
			}
			if(result.invalid){
			$("#invalid_error").html(result.invalid);		
			}
			if(result.password){
			$("#pwd-error").html(result.password);			
			}
			if(result.username){
			$("#username_error").html(result.username);				
			}
			if(result.valid){
				if(result.valid=="true")
				{
					window.location.href="OrganizationLists";
				}
			}
   },
    });


}
		</script>

	</body>

</html>
