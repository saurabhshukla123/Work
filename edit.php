
<?php 
$name="";
$username="";

$password="";
$id="";



$yourname="";
$pwd="";
$query="";
if(isset($_GET['id']))
{

$id=$_GET['id'];
 
}
$con=mysqli_connect("localhost","root","","registration");
$query=" select  id,name,username,password from reg";
$result=mysqli_query($con,$query);

echo "<h1>All records are as follows</h1>";




$projects = array();
    while ($project =  mysqli_fetch_assoc($result))
    {
        $projects[] = $project;
    }


	
	foreach($projects as $arrays ){


 $id=$arrays['id'];
$name=$arrays['name'];
$username=$arrays['username'];

$password=$arrays['password'];


}


	
	
	
	
	
	
?>















<html>
<head><title>Insert demo</title></head>
<fieldset>
<legend style="background-color:black;color:white;">CRUD demo</legend>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<h1>Update details</h1>
<table border=1 style="margin-top:0px;">

<tr>
<td>ID</td>
<td><input type="text" name="name" autocomplete="off" disabled value="<?php echo $id;?>" title="Enter id"></td>
</tr>


<tr>
<td>Enter Name</td>
<td><input type="text" name="name" autocomplete="off" value="<?php echo $name;?>"  title="Enter id"></td>
</tr>

<p>
<tr>
<td>Enter  User Name</td>
<td><input type="text" name="username" autocomplete="off" value="<?php echo $username;?>"  title="Enter id"></td>
</tr>
<tr><td>
Password:</td></p>
<td><input name="password" required="required" type="password" value="<?php echo $password;?>" id="password" />
</td>
</tr>
<tr><td><p>Confirm Password:</p></td><td>
<input name="password_confirm" required="required" type="password" value="<?php echo $password;?>" id="password_confirm" oninput="check(this)" />
<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>

</td>
</tr>
<td  align="center">

<input type="submit" name="Click" value="Update">
</td>

<td  align="center">

<input type="button" name="goback" value="go Back">
</td>
</tr>
</table>

<form>
</fieldset>
<html>









