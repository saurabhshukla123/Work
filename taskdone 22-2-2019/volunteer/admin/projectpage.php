<?php
session_start();
// include '../connection.php';

include '../model/project.php';

					$organization = "";			
					$category ="";
					$activity= "";
					$min_age = "";
					$title = "";
					$max_age = "";
					
					$city ="";
					$country ="";
					$overview_description = "";
					$accommodation_description="";
					$video="";
$id="";

if(isset($_SESSION["add1"]))
{


}
elseif(isset($_SESSION["edit1"]))
{

}
else{
	header( "Location:login.php" );
}



if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "organization") {
		// 
		$user_id=$_SESSION["id"];
		$conn = OpenCon();
		$error_pwd = "";
		$error_username = "";
		$error_invalid = "";			
		if($_SESSION["add1"]==1)
		{	$_SESSION["city"]="";	

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$organization = $_POST['organization'];			
					$category = $_POST['category'];
					$activity= $_POST['activity'];
					$min_age = $_POST['min-age'];
					$title = $_POST['title'];
					$max_age = $_POST['max-age'];
					
					$city = $_POST['city'];
					$country = $_POST['country'];
					$overview_description = $_POST['description'];
				    $accommodation_description= $_POST['acc_description'];
			
					
					// $time=date();
					$date1 = date_create(date("Y/m/d"));
					$video="";
					$time =$date1; 
					$c_date=date("Y-m-d")." ".date("h:i:s");

					$q2=new projects();
					$NULL="";$NULL1="";$NULL2="";$NULL3="";$NULL4="";
					$NULL5="";$NULL6="";
					$null="";
					$imgpath="";
					$status="yes";
					$value=$q2-> insert($organization,$activity,$category,$title,$imgpath,$min_age,$max_age,$overview_description,$accommodation_description,$NULL6,$video,$city,$country,$NULL1,$NULL2,$NULL3,$NULL4,$NULL5,$status,$null,$c_date);
			
					if($value==1)
					{
						echo '<script language="javascript">';
						echo 'alert("Project added successfully")';
						echo '</script>';
						header('Location: projectlisting.php');	
						//header( "refresh:1;url=projectlisting.php" );
						//$_SESSION['id']=0;
						// echo "sql query=".$sql ;
					}
					else{
						
						echo '<script language="javascript">';
						echo 'alert("please fill details properly")';
						echo '</script>';
					}
			  
					
		
					
				}
		
		}

		else if ($_SESSION["edit1"]=="edit"){			 
			$projectid=$_SESSION["projectid"];
		
			$sql1="SELECT * FROM projects where id='$projectid' ";
			$user_id=$_SESSION["id"];


			$conn = OpenCon();
			
			$sql2="SELECT  o.user_id as id FROM organizations as o inner join projects as p on o.id=p.organization_id where o.user_id='$user_id' and p.id='$projectid'";
				
			$result3 = $conn->query($sql2);
	
			if ($result3->num_rows > 0) {
	
				while ($row = $result3->fetch_assoc()) {

					if($row['id']==$user_id)
					{
					// $organization=$row['user_id'];
					}else
					{
						header( "Location:projectlisting.php" );
					}
				
			}
		   }
		   else
		   {
			header( "Location:projectlisting.php" );
		   }


			// $sql = "SELECT  name,id FROM organizations";
			$result = $conn->query($sql1);
	
			if ($result->num_rows > 0) {
	
				while ($row = $result->fetch_assoc()) {
				
					
					$organization=$row['organization_id'];
					$activity=$row['activity_id'];
					$category=$row['category_id'];
					$title=$row['title'];
					$min_age=$row['min_age'];
					$max_age=$row['max_age'];
					$city=$row['city_id'];
					$country = $row['country_id'];
					$overview_description = $row['overview_description'];
					$accommodation_description= $row['accommodation_description'];
					$_SESSION["city"]=$row['city_id'];
					
					
				}
			}
		}
			if($_SESSION["edit1"]=="edit")
			{
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$projectid=$_SESSION["projectid"];
				$organization = $_POST['organization'];			
				$category = $_POST['category'];
				$activity= $_POST['activity'];
				$min_age = $_POST['min-age'];
				$title = $_POST['title'];
				$max_age = $_POST['max-age'];
				
				$city = $_POST['city'];
				$country = $_POST['country'];
				$overview_description = $_POST['description'];
				$accommodation_description= $_POST['acc_description'];
			
				
				// $time=date();
				$date1 = date_create(date("Y/m/d"));
				$c_date=date("Y-m-d")." ".date("h:i:s");
				$time =$date1; 
				$img="imgpath";
				$update_org_projects=new projects();
				$updateorg_project=$update_org_projects->updateProjects($organization,$activity,$category,$title,$img,$min_age,$max_age,$overview_description,$accommodation_description,$city,$country,$c_date,$projectid);
			
				if(mysqli_affected_rows($updateorg_project))
				{
					echo '<script language="javascript">';
					echo 'alert("Project Updated successfully")';
					echo '</script>';
					header('Location: projectlisting.php');	
					//header( "refresh:1;url=projectlisting.php" );
				//	$_SESSION['id']=1;
				}
				else{
					
					echo '<script language="javascript">';
					echo 'alert("please fill details properly")';
					echo '</script>';
				}
		  
				
	
				
			}		
			
		}




	} 
	elseif ($_SESSION['role'] == "superadmin") {
        // header('Location:../admin/login.php');
		//code for dropdown
		$conn = OpenCon();
		$error_pwd = "";
		$error_username = "";
		$error_invalid = "";
		//echo "Connected Successfully";
		
		
		if($_SESSION["add1"]==1)
		{		
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$organization = $_POST['organization'];			
					$category = $_POST['category'];
					$activity= $_POST['activity'];
					$min_age = $_POST['min-age'];
					$title = $_POST['title'];
					$max_age = $_POST['max-age'];
					
					$city = $_POST['city'];
					$country = $_POST['country'];
					$overview_description = $_POST['description'];
				    $accommodation_description= $_POST['acc_description'];
			
					
					// $time=date();
					$date1 = date_create(date("Y/m/d"));
					
					$video="";
					$time =$date1; 
					$c_date=date("Y-m-d")." ".date("h:i:s");
					$q3=new projects();
					$NULL="";$NULL1="";$NULL2="";$NULL3="";$NULL4="";
					$NULL5="";$NULL6="";
					$null="";
					$imgpath="";
					$status="yes";
					$value=$q3-> insert($organization,$activity,$category,$title,$imgpath,$min_age,$max_age,$overview_description,$accommodation_description,$NULL6,$video,$city,$country,$NULL1,$NULL2,$NULL3,$NULL4,$NULL5,$status,$null,$c_date);
			
			
				if($value==1)
					{
						echo '<script language="javascript">';
						echo 'alert("Project added successfully")';
						echo '</script>';
						// header( "refresh:1;url=projectlisting.php" );
						
						header('Location: projectlisting.php');	//$_SESSION['id']=0;
						//echo "sql query=".$sql ;
					}
					else{
						
						echo '<script language="javascript">';
						echo 'alert("please fill details properly")';
						echo '</script>';
					}
			  
					
		
					
				}
		
		}

		else if ($_SESSION["edit1"]=="edit"){			 
			$projectid=$_SESSION["projectid"];
		
			$sql1="SELECT * FROM projects where id='$projectid'";
			 
			$conn = OpenCon(); 
			// $sql = "SELECT  name,id FROM organizations";
			$result = $conn->query($sql1);
	
			if ($result->num_rows > 0) {
	
				while ($row = $result->fetch_assoc()) {
					
					$organization=$row['organization_id'];
					$activity=$row['activity_id'];
					$category=$row['category_id'];
					$title=$row['title'];
					$min_age=$row['min_age'];
					$max_age=$row['max_age'];
					$city=$row['city_id'];
					$country = $row['country_id'];
					$overview_description = $row['overview_description'];
					$accommodation_description= $row['accommodation_description'];
					$_SESSION["city"]=$row['city_id'];
				
				}
			}
		}
			if($_SESSION["edit1"]=="edit")
			{
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$projectid=$_SESSION["projectid"];
				$organization = $_POST['organization'];			
				$category = $_POST['category'];
				$activity= $_POST['activity'];
				$min_age = $_POST['min-age'];
				$title = $_POST['title'];
				$max_age = $_POST['max-age'];
				
				$city = $_POST['city'];
				$country = $_POST['country'];
				$overview_description = $_POST['description'];
				$accommodation_description= $_POST['acc_description'];		
				
				// $time=date();
				$date1 = date_create(date("Y/m/d"));
				$c_date=date("Y-m-d")." ".date("h:i:s");
				$time =$date1; 
				$img="imgpath";
				$update_org_projects_admin=new projects();
				$updateorg_project_admin=$update_org_projects_admin->updateProjects($organization,$activity,$category,$title,$img,$min_age,$max_age,$overview_description,$accommodation_description,$city,$country,$c_date,$projectid);
			
				
				
			
				if(mysqli_affected_rows($updateorg_project_admin))
				{
					echo '<script language="javascript">';
					echo 'alert("Project Updated successfully")';
					echo '</script>';
					header('Location: projectlisting.php');	
					//header( "refresh:1;url=projectlisting.php" );
				//	$_SESSION['id']=1;
				}
				else{
					
					echo '<script language="javascript">';
					echo 'alert("please fill details properly")';
					echo '</script>';
				}
		  
				
	
				
			}		
			
		}
	

	}

}
 else {
    header('Location: ../admin/login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
	<head>  
			<title>Add Projects</title>
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
			
		<div class="container" style="background-color:white;">
			<form name="projectpage"  onsubmit="return validateForm()" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
			 				<option value="0">please select</option>
                             <?php
							 
						$conn = OpenCon();
						if($_SESSION['role']=="superadmin")
						{
							$sql = "SELECT  id,name FROM organizations";
						}
						else{
						$id=$_SESSION['id'];
							$sql = "SELECT  id,name FROM organizations WHERE user_id='$id'";
						
						}
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {

							while ($row = $result->fetch_assoc()) {
								?>
									<option value="<?php echo $row['id']; ?>" id="<?php $row['id'];?>" <?php echo ($row['id'] == $organization) ? "selected" : ""; ?>><?php echo $row['name']; ?></option>
														<?php
														}
						}
						CloseCon($conn);
						?>
			 		</select>
			 	</div>
			 	<div class="col-lg-6">
			 	
			 		<select class="form-control" name="category" id="category">
			 				<option value="0">please select</option>
                             <?php
						$conn = OpenCon();
						$sql = "SELECT  id,name FROM categories ";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {

							while ($row = $result->fetch_assoc()) {
								?>
									<option value="<?php echo $row['id']; ?>" id="<?php $row['id'];?>" <?php echo ($row['id'] == $category) ? "selected" : ""; ?>><?php echo $row['name']; ?></option>
														<?php
														}
						}
						CloseCon($conn);
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
			 				<option value="0">please select</option>
                             <?php
						$conn = OpenCon();
						$sql = "SELECT  id,name FROM activites ";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {

							while ($row = $result->fetch_assoc()) {
								?>
									<option value="<?php echo $row['id']; ?>" id="<?php $row['id'];?>" <?php echo ($row['id'] == $activity) ? "selected" : ""; ?>><?php echo $row['name']; ?></option>
														<?php
														}
						}
						CloseCon($conn);
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
			 		<input type="text" class="form-control" name="min-age" id="min-age" placeholder="min-age" autocomplete="off" value="<?php echo $min_age;?>"> 
			 	</div>
			 	<div class="col-lg-6">
			 		<input type="text" class="form-control" name="max-age" id="max-age" placeholder="max-age" autocomplete="off" value="<?php echo $max_age;?>"> 
			 		
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
			 				<!-- <option value="0"></option> -->
			 			
			 		</select>
			 	</div>
			 	<div class="col-lg-6">
			 	
			 		<select class="form-control" name="country" id="country"  onChange="showCity(this.value);">
					 <!-- <option value="0">please select</option> -->
                             <?php
						$conn = OpenCon();
						$sql = "SELECT  id,name FROM countries ";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {

							while ($row = $result->fetch_assoc()) {
								?>
									<option value="<?php echo $row['id']; ?>" id="<?php $row['id'];?>"  <?php echo ($row['id'] == $country) ? "selected" : ""; ?>><?php echo $row['name']; ?></option>
														<?php
														}
						}
						CloseCon($conn);
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

			
			
			

			 <div class="row pt-3">
			 	<div class="col-lg-12 row justify-content-center">
				 		<div class="row">
				 			<div class="col-lg-12">
				            <input type="submit" class="btn pinkbg text-light bg-danger height-31px" value="SUBMIT" name="submit" width="10px">
							
				          <input type="button" class="btn  text-light pinkbg height-31px"  onClick="document.location.href='projectlisting.php'" name="cancel" value="CANCEL"/>
				 	    	</div>
				 	    </div>
			 	</div>
			</div>




</form>
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
		<script language="javascript" type="text/javascript">
function showCity(adminproject_country)
{
    $('#city').empty();
    $.ajax({

    url : 'ajax.php',
    type : 'POST',
    dataType:'json',
    data : {
        'country_id' : adminproject_country
    },
    success : function(data) {console.log(data)
        $('#city').append(data );
    },
    });
}
$(document).ready(function(){
	$('#city').empty();
    var adminproject_country = $("#country").val() ;
    $.ajax({

    url : 'ajax.php',
    type : 'POST',
    dataType:'json',
    data : {
        'country_id' : adminproject_country
    },
    success : function(data) {
        $('#city').append(data);
    },
    });

});
</script>
		<script language="javascript">
		
					
						function pasuser(form) {
						if (form.username.value=="saurabh") { 
						if (form.password.value=="tatva123") {              
						// location=".. /index.html" 
						 alert("welcome "+form.username.value)
						} else {
						alert("Invalid Password")
						}
						} else {  alert("Invalid UserID or Password")
						}
						}	
						
</script>
	</body>
</html>