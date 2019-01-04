
<?php 

$yourname="";
$pwd="";
$query="";
if(isset($_POST['name']))
{

//$yourname=$_POST['name'];
$id=$_POST['name'];
$pwd=$_POST['pwd'];

$con=mysqli_connect("localhost","root","","registration");
 
$querystring="select * from reg where id=$id";


 
 
 
 $query=mysqli_query($con,$querystring);
 
 

$projects = array();
    while ($project =  mysqli_fetch_assoc($query))
    {
        $projects[] = $project;
    }


foreach($projects as $arrays ){
echo "\n<h1>Your name is ".$arrays['name']."</h1>";
echo "\n<h1>Your Password is ".$arrays['password']."</h1>";

}
}







?>

<html>
<head><title>Sql Injection demo</title></head>
<fieldset>
<legend style="background-color:black;color:white;">Sql Injection demo</legend>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<h1>Enter Login details</h1>
<table border=1 style="margin-top:0px;">

<tr>
<td>Enter ID</td>
<td><input type="text" name="name" autocomplete="off" placeholder="Enter id to see demo" title="Enter id"></td>
</tr><tr>
<td>Enter password</td>
<td><input type="text" name="pwd" autocomplete="off"></td>
</tr>



<td colspan="2" align="center">

<input type="submit" name="Click" value="login">
</td>
</tr>
</table>

<form>
</fieldset>
<html>









