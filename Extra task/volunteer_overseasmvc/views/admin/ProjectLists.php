    
<?php
 $assets_url = ASSETS_URL;
 $ProjectData = json_decode($ProjectData);
 if (isset($_SESSION["role"])) {
	if ($_SESSION["role"] == "superadmin") {
	   
	} 
	else if ($_SESSION["role"] == "organization") {
	   
	}
	else {
		header('Location: Login');
	}
}else
{
	header('Location: Login');
}

$page = new Pagination();
if (!empty($ProjectData->count_total)) {
    $total_records = $ProjectData->count_total;
}
 ?>   
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Projects List</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="<?php echo ASSETS_URL;?>images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_URL;?>css/main.css">
    </head>
    <body>
        <div class="wrapper admin-wrapper small-header">
        <?php  include 'header-admin.php'?> 
    
            <main>
                         <div id="loading" style="display:none;  background: url('<?php echo IMAGES; ?>/loading.gif') 50% 50% no-repeat rgb(249,249,249);">
                        </div>
            <div id="ajax1">
                <section class="admin-section">
                    <div class="container">                       
                        <div class="with-box-shadow ">
                        <!-- code start for alert -->
                                <?php if($_SESSION["status"]=="updated"){ 
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-success update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                Project updated sucessfully
                            </div>
                            <?php }?>
                            <?php if($_SESSION["status"]=="added"){
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-success update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                Project added sucessfully
                            </div>
                            <?php }?>
                            <?php if($_SESSION["status"]=="deleted"){
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-success update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                Project deleted sucessfully
                            </div>
                            <?php }?>
                        <!-- code ends for alert -->
                            <div class="section-title text-center">
                                <h5>Projects list</h5>
                                <div class="button-outer">
                                <a href="ProjectLists/edit/2/2" > <button type="button" class="btn btn-fill">Add Projects</button></a>
                                </div>
                            </div>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="table-responsive">
                                <table class="table admin-table table-bordered table-striped">
                                    <tr>
                                        <th>Projects</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                         
                                          $limit = 6; // Number of entries to show in a page.
                                          //Look for a GET variable page if not found default is 1.
                                          if (isset($_GET["page"])) {
                                              $pn = $_GET["page"];
                                              if ($pn < 0) {
                                                  $pn = 1;
                                              }
                                          } else {
                                              $pn = 1;
                                          }
                                          $start_from = $page->setdata($limit, $pn);
                                     
                                                if(!empty($ProjectData->projectdetails)){
                                                    foreach($ProjectData->projectdetails as $row){
                                                
                                             
                                        ?>
                                    <tr>
                                       
                                        <td><?php echo $row->title;?></td>
                                        <td><?php echo $row->countryname;?></td>
                                        <td>
                                            <div class="button-outer">
                                            <a class="text-light" href="ProjectLists/edit/1/<?php  echo $row->id;?>" >   <button type="button"class="btn btn-fill" id="" >Edit</button></a>
                                              <a onclick="deleterecord('<?php echo $row->id; ?>')" href="javascript:void(0);"  >  <button type="button" class="btn btn-fill" value="" id="delete">Delete </button></a>
                                             
                                                </div> 
                                        </td>
                                       
                                    </tr>
                                    <?php } }
                                    else{
                                        echo "<tr><td colspan='2' style='color:red; font-size:15px;'>"."Sorry No records available"."<td></tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </form>
                        <div class="paging text-center justify-content-center  tablet-pagination mobile-pagination pt-3" style="font-size: 16px;">
                            <nav aria-label="..." class="text-center" style="align-items:center;">
								<ul class="pagination" >
                                    <?php
                                        $pageLink = $page->setpagination($total_records);
                                        echo $pageLink;
                                    ?>
								</ul>
							</nav>
                        </div>
                        </div>
                    </div>
                </section>                
                </div>
            </main>            
            
        </div>
        <script type="text/javascript" src="<?php echo ADMIN_ASSETS_URL;?>js/main.js"></script>
        <script type="text/javascript" src="<?php echo ASSETS_URL;?>js/projectList.js"></script>
        <script type="text/javascript" src="<?php echo ASSETS_URL;?>js/commonalert.js"></script>
    </body>
</html>