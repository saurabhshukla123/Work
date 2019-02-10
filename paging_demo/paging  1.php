<?php
mysql_connect("localhost","root","");
mysql_select_db("db_youth_telent")
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>

<body>



<?php 
 include("pagination/function.php");
 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 2; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "db_users"; //you have to pass your query over here

		$res=mysql_query("select * from {$statement} LIMIT {$startpoint} , {$limit}");
		while($row=mysql_fetch_array($res))
		{
		echo $row["user_fname"];
		echo "<br>";
		}

?>

<?php
echo "<div id='pagingg' >";
echo pagination($statement,$limit,$page);
echo "</div>";
?>

<div class="paging text-center justify-content-center  tablet-pagination mobile-pagination pt-3" style="padding-left:465px;font-size: 16px;" >
 <nav aria-label="..." class="text-center">
  <ul class="pagination">
   
    <li class="page-item active"><a class="page-link blue" href="#">1</a></li>
    <li class="page-item ">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">...</a></li>
    <li class="page-item">
      <a class="page-link" href="#">12</a>
    </li>
  </ul>
</nav>
</div>
</body>
</html>
