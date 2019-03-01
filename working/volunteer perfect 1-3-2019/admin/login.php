

<?php
session_start();
include '../model/login.php';
//include '../connection.php';
if( isset($_SESSION["role"]))
{
if( $_SESSION["role"]=="superadmin")
{
	header('Location: ../admin/admindashboard.php');
}
elseif($_SESSION["role"]=="organization")
{
	header('Location: ../admin/orgdashboard.php');
}
else{

}
}
//$conn = OpenCon();
$error_pwd = "";
$error_username = "";
$error_invalid = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $encrypt_pwd = $_POST['password'];
	$password=md5($encrypt_pwd);

    if (empty($username)) {
        $error_username = "username is required";
    } else {
        $error_username = "";
    }
    if (empty($password)) {
        $error_pwd = "password is required";

    } else {
        $error_pwd = "";

    }
    if ($error_username == "" && $error_pwd == "") {

		$sql_login=new login();
		$result=$sql_login->validate($username,$password);
		//$sql = "SELECT  email,password,role,id,status FROM users WHERE email='$username' AND password='$password'";
		
        //$result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
				if($row["status"]==1)
				{
                if ($row["role"] == "superadmin") {
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["role"] = $row["role"];
                    header('Location: ../admin/admindashboard.php');
                } else if ($row["role"] == "organization") {
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["role"] = $row["role"];
                    header('Location: ../admin/orgdashboard.php');
                } else {

				}
				}
				else
				{
					$error_invalid = "Sorry you are not Active user";
				}

            }
        } else {

            $error_invalid = "Invalid username or password";
        }

    }

}

//CloseCon($conn);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Volunteer Overseas</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="images/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div class="wrapper admin-wrapper admin-login">
		
			<section class="login_wrapper " style="background: url(images/banner-img.jpg);">
				<div class="login_outer">
					<h1>Welcome to Volunteer Overseas</h1>
					<label id="invalid-error" style="color:red;" value=""><?php echo $error_invalid; ?></label>
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<div class="form-group">
							<label>Username</label>
							<input  type="text" name="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ; ?>" class="form-control">
							<label id="username-error" style="color:red;" value=""><?php echo $error_username; ?></label>

						</div>

						<div class="form-group">
							<label>Password</label>
							<input  type="password" name="password" placeholder="Password" class="form-control">
							<span id="pwd-error" class="bg-danger"   style="color:red;" value=""><?php echo $error_pwd; ?></span>
						</div>
						<div class="form-group">
							<a href="#" class="forgot_link" title="Forgot password?">Forgot password?</a>
						</div>
						<div class="button-outer text-center">
							<button type="submit" class="btn btn-fill btn-large" onClick="pasuser(this.form)">Sign In</button>
						</div>
					</form>
				</div>
			</section>
		</div>

		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.search-btn-outer .search-btn').click(function(){
					window.location.href = 'search-result.html';
					return false;
				});

			});
		</script>
		<script language="javascript">

						// function pasuser(form) {
						// if (form.username.value=="saurabh") {
						// if (form.password.value=="tatva123") {
						// // location=".. /index.html"
						//  alert("welcome "+form.username.value)
						// } else {
						// alert("Invalid Password")
						// }
						// } else {  alert("Invalid UserID or Password")
						// }
						// }

</script>
	</body>
</html>