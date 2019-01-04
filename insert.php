
<?php 

$yourname="";
$pwd="";
$query="";
if(isset($_POST['name']))
{

$name=$_POST['name'];
$pwd=$_POST['password'];

$id=$_POST['id'];
$username=$_POST['username'];
$con=mysqli_connect("localhost","root","","registration");
$querystring=" insert into  reg(name,username,password,id)  values('$name','$username','$pwd','$id')";


 
 
 
 $query=mysqli_query($con,$querystring);
 if($query==1){
 echo "<script> alert ('Data inserted');</script>";
 }
 else{
 echo "<script> alert ('Data not inserted');</script>";
 
 }
 
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


	
	echo "<table border=1 ><tr><td>Id</td>
	<td>name</td>

	<td>username</td>
	<td>password</td>
	<td>Delete</td>
	
	</tr>";
	
foreach($projects as $arrays ){

echo "<tr>";


echo "\n<h1><td>".$arrays['id']."</td></h1>";
echo "\n<h1><td>".$arrays['name']."</td></h1>";
echo "\n<h1><td>".$arrays['username']."</td></h1>";

echo "\n<h1><td>".$arrays['password']."</td></h1>";
echo "\n<h1><td><a href=edit.php?id=".$arrays['id'].">Delete</a></td></h1>";


echo "</tr>";
}
echo "</table>";













?>

<html>
<head><title>Insert demo</title></head>
<fieldset>
<legend style="background-color:black;color:white;">CRUD demo</legend>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<h1>Enter Login details</h1>
<table border=1 style="margin-top:0px;">

<tr>
<td>Enter ID</td>
<td><input type="text" name="id" autocomplete="off" placeholder="Enter id to see demo" title="Enter id"></td>
</tr>


<tr>
<td>Enter Name</td>
<td><input type="text" name="name" autocomplete="off"  title="Enter id"></td>
</tr>

<p>
<tr>
<td>Enter  User Name</td>
<td><input type="text" name="username" autocomplete="off"  title="Enter id"></td>
</tr>
<tr><td>
Password:</td></p>
<td><input name="password" required="required" type="password" id="password" />
</td>
</tr>
<tr><td><p>Confirm Password:</p></td><td>
<input name="password_confirm" required="required" type="password" id="password_confirm" oninput="check(this)" />
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
<td colspan="2" align="center">

<input type="submit" name="Click" value="Insert">
</td>
</tr>
</table>

<form>
</fieldset>
<html>









