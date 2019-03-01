<?php
session_start();
if($_SESSION["role"]=="organization")
{

}
else{
    header('Location: ../admin/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<title>Add Organization</title>
			<meta charset="utf-8">
			<link rel="shortcut icon" href="images/favicon.ico"/>
			<link rel="stylesheet" type="text/css" href="css/main.css">
			<meta charset="UTF-8">
			<meta name="description" content="Free Web tutorials"/>
			<meta name="keywords" content="Ghana,Medical,Volunteer,Kumasi"/>
			<meta name="author" content="TatvaSoft"/>
			<link rel="stylesheet"  href="../css/bootstrap.css" type="text/css" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<link rel="stylesheet"  href="../css/bootstrap.min.css" type="text/css"/>
			<link rel="stylesheet"  href="../css/style.css" type="text/css"/><!--
			<link rel="stylesheet"  href="css/jquery-ui.min.css" type="text/css"/> -->
			<link rel="stylesheet"  href="../css/jquery-ui.css" type="text/css"/>
			<link rel="stylesheet"  href="../css/dropkick.css" type="text/css"/>
			<link rel="stylesheet"  href="../css/media.css" type="text/css"/>
	</head>
	<body>
		<div class="wrapper admin-wrapper admin-login y-scroll">
		<?php  include 'header-admin.php'?> 
	<main style="background-color:#f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <label class="blue">Welcome</label>
              </div>
            <div class="col-md-11">
	          <label class="bluebold" ><?php echo $_SESSION["email"]; ?></label>
            </div>
  
    </div>
    </div>
	</main>
</div>

		</div>




        <script src="../js/jquery-3.3.1.min.js" ></script>
		<script src="../js/bootstrap.js" > </script>
		<script src="../js/bootstrap.min.js" ></script>
		<script src="../js/dropkick.js" > </script>
		<script src="../js/jquery-ui.js" > </script>
		<script type="text/javascript" src="js/main.js"></script>

		<script type="text/javascript" src="../js/projectpage.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.search-btn-outer .search-btn').click(function(){
					window.location.href = 'search-result.html';
					return false;
				});

			});
		</script>

	</body>
</html>