
<?php 

$nameErr = $emailErr = $genderErr = $websiteErr = "";
//$name = test_input($_POST["name"]);
//if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 // $nameErr = "Only letters and white space allowed"; 
//}

if (!isset($_POST["name"])) {
    $nameErr = "Name is required";
  
  }

  ?>
<html>

<fieldset>
<legend>Details are 
Here</legend>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<h1>Enter Login details</h1>
<table border=1 style="margin-top:0px;">
<tr>
<td>Enter name</td>
<td><input type="text" name="name" autocomplete="off"></td>
<?php echo $nameErr; ?>
<br>
</tr>


<tr>

<td> Email</td><td><input type="email" name="name"></td>
<?php echo $nameErr; ?>
<br>
</tr>
<tr>
<td>
Phone no</td><td> 
<input type="number" name="name">
<?php echo $nameErr; ?></td>
<br>
</tr>
<tr>
<td>
Date of birth</td>
<td>
<input type="Date" name="name">
<?php echo $nameErr; ?></td>
<br>
</tr>

<tr>

<td colspan="2" align="center">

<input type="submit" name="Click" value="login">
</td>
</tr>
</table>

<form>
</fieldset>
<html>

