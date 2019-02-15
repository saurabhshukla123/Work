<?php
session_start();
include '../connection.php';

					$question = "";			
					$answer ="";
					$sequencenumber= "";
					
					$id="";

if (isset($_SESSION['role'])) {
   
	if ($_SESSION['role'] == "superadmin") {     
		$conn = OpenCon();	
			
		if($_SESSION["add2"]==1)
		{		
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$question = $_POST['question'];			
					$answer =$_POST['answer'];
					$sequencenumber= $_POST['sequencenumber'];
					$sql ="INSERT INTO faq(question,answer,sequence_number) VALUES ('$question','$answer','$sequencenumber')"; 
					$result = $conn->query($sql);					
					if(mysqli_affected_rows($conn))
					{
						echo '<script language="javascript">';
						echo 'alert("faq added successfully")';
						echo '</script>';
						 header('Location: ../admin/faqlisting.php');	
						// /header( "refresh:1;url=faqlisting.php" );
						//$_SESSION['id']=0;
						//echo "sql query=".$sql ;
					}
					else{						
						echo '<script language="javascript">';
						echo 'alert("please fill details properly")';
						echo '</script>';
					}
				}
		}

		else if ($_SESSION["edit2"]=="edit"){			 
			$projectid=$_SESSION["projectid"];
			$sql1="SELECT  question,answer,sequence_number,id FROM faq where id='$projectid'";
			$conn = OpenCon(); 
			// $sql = "SELECT  name,id FROM organizations";
			$result = $conn->query($sql1);
	
			if ($result->num_rows > 0) {
	
				while ($row = $result->fetch_assoc()) {					
									
					$question = $row['question'];			
					$answer =$row['answer'];
					$sequencenumber=$row['sequence_number'];
				}
			}
		}
			if($_SESSION["edit2"]=="edit")
			{
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$projectid=$_SESSION["projectid"];
			
				$question = $_POST['question'];			
				$answer =$_POST['answer'];
				$sequencenumber= $_POST['sequencenumber'];
				
				$sql ="UPDATE faq  SET  `question`='$question', `answer`='$answer', `sequence_number`='$sequencenumber' WHERE id='$projectid' ";
				$result = $conn->query($sql);
				
				if(mysqli_affected_rows($conn))
				{
					echo '<script language="javascript">';
					echo 'alert("Faq Updated successfully")';
					echo '</script>';
					header('Location: ../admin/faqlisting.php');
					//header( "refresh:1;url=faqlisting.php" );
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
			<title>Add Faq</title>
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
		<!-- <header>
				<div class="row header-row">
					<div class="col-lg-2 col-sm-3 col-xs-6 logo-outer">
						<a href="index.html" title="Volunteer Overseas" class="logo"><img src="images/logo_1.png" alt=""><img class="color-logo" src="images/logo.png" alt=""></a>
					</div>
					<div class="col-lg-10 col-sm-9 col-xs-6 menu-wrap">
						<nav>
							<ul>
								<li><a href="#" title="Organization">Organization</a></li>
								<li><a href="#" title="Projects">Projects</a></li>
								<li><a href="#" title="Application">Application</a></li>
								<li><a href="#" title="FAQ">FAQ</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<a href="#" title="" class="hamburger-icon"><span></span></a>
			</header> -->
	<main style="background-color:#f8f9fa;">
			
		<div class="container" style="background-color:white;">
			<form name="admin-addorganization"  onsubmit="return validateForm()" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			 <div class="row pt-3">
			 	<div class="col-lg-12">
					 <h1 class="text-muted">FAQ</h1>
				</div>
			 </div>
			 <div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Question</span>
			 	</div>
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Answers</span>
			 	</div>
			</div>
			 <div class="row pt-1">
			 	<div class="col-lg-6">
			 		<input type="text" name="question"  class="form-control" id="question" palceholder="Enter Question here" value="<?php echo $question; ?>">
			 	</div>
			 	<div class="col-lg-6">
                 <input type="text" name="answer" class="form-control" id="answer" palceholder="Enter Question here" value="<?php echo $answer; ?>">
			 </div>
			</div>

			 <div class="row">
			 	<div class="col-lg-6">
			 		<label class="pink" id="userselect-error" value=""></label>
			 	</div>
			 	<div class="col-lg-6">
			 		<label class="pink" id="organization-name-error" value=""></label>
			 	</div>
			</div>
			 <div class="row pt-3">
			 	<div class="col-lg-6">
			 		<span class="blue font-14px">Sequence Number</span>
			 	</div>
			 	
            </div>
            <div class="row pt-3">
             <div class="col-lg-6">
                 <input type="text" class="form-control" name="sequencenumber" id="sequencenumber" palceholder="Entersequence number here" value="<?php echo $sequencenumber; ?>">
             </div>
            </div>
            
			
			 <div class="row pt-5">
			 	<div class="col-lg-12 row justify-content-center">
				 		<div class="row">
				 			<div class="col-lg-12">
				            <input type="submit" class="btn pinkbg text-light bg-danger height-31px" value="SUBMIT" name="submit" width="10px">
							
				        	<input type="button" class="btn  text-light pinkbg height-31px"  onClick="document.location.href='faqlisting.php'" name="cancel" value="CANCEL"/>
				 	    
						  <!-- <button class="btn  text-light pinkbg height-31px"   name="cancel" value="CANCEL">CANCEL</button> -->
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

		<script type="text/javascript" src="../js/admin-addorganization.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.search-btn-outer .search-btn').click(function(){
					window.location.href = 'search-result.html';
					return false;
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