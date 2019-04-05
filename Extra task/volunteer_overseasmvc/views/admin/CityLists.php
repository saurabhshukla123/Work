<?php
    $assets_url = ASSETS_URL;

    $cityPageData = json_decode($cityPageData);
    if (isset($_SESSION["role"])) {
        if ($_SESSION["role"] == "superadmin") {
           
        }
        else {
            header('Location: Login');
        }
    }else
    {
        header('Location: Login');
    }


    $page = new Pagination();
if (!empty($cityPageData->total_result)) {
    $total_records = $cityPageData->total_result;
 
	$_SESSION['totalrecords'] = $total_records;
}
 ?>   
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>City Lists</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_URL;?>css/main.css">
    </head>
    <body>
   
        <div class="wrapper admin-wrapper  small-header">
        <?php  include 'header-admin.php'; ?> 
        <div id="loading" style="display:none;  background: url('<?php echo IMAGES; ?>/loading.gif') 50% 50% no-repeat rgb(249,249,249);">
	    </div>
        <div class="" id="ajax">
            <main>
                <section class="admin-section">
                    <div class="container">
                        <div class="with-box-shadow ">
                            <!-- code start for alert -->
                            <?php if($_SESSION["status"]=="updated"){ 
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-success update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                City updated sucessfully
                            </div>
                            <?php }?>
                            <?php if($_SESSION["status"]=="added"){
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-success update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                City added sucessfully
                            </div>
                            <?php }?>
                            <?php if($_SESSION["status"]=="deleted"){
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-success update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                City deleted sucessfully
                            </div>
                            <?php }?>
                        <!-- code ends for alert -->
                            <div class="section-title text-center">
                                <h5>City Lists</h5>
                                <div class="button-outer">
                                <a href="CityLists/edit/2/2">  <button type="button" class="btn btn-fill">Add City</button></a>
                                </div>
                            </div>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="table-responsive">
                            
                                <table class="table admin-table table-bordered table-striped">
                                    <tr>
                                        <!-- <th>Sr.No</th> -->
                                        <th>Name</th>  
                                        <th>Country Name</th>  
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                    <?php
                                        $limit = 2; // Number of entries to show in a page.
                                        //Look for a GET variable page if not found default is 1.
                                        if (isset($_POST["page"])) {
                                            $pn = $_POST["page"];
                                            if ($pn < 0) {
                                                $pn = 1;
                                            }
                                        } else {
                                            $pn = 1;
                                        }
                                        
                                        $start_from = $page->setdata($limit, $pn);
                                        
                                        $i = 0;


                                    
                                                if(!empty($cityPageData->citydetails)){
                                                    foreach($cityPageData->citydetails as $row){

                                          $i++;
                                        ?>
                                    <tr>
                                      
                                        <!-- <td><?php echo $i;?></td> -->
                                        <td><?php echo $row->name;?></td>
                                        <td><?php echo $row->countryname;?></td>
                                        
                                        <td>
                                            <div class="button-outer">
                                            <a class="text-light" href="CityLists/edit/1/<?php  echo $row->id;?>" >  <button type="button"class="btn btn-fill" id="" >Edit</button></a>
                                             
                                             
                                                </div> 
                                        </td>
                                        <td>
                                        <a onclick="deletecountry('<?php echo $row->id; ?>')" href="javascript:void(0);" >  <button type="button" class="btn btn-fill" value="" id="delete">Delete </button></a>
                                      </td>
                                       
                                    </tr>
                                    <?php } }
                                    else{
                                            echo "<tr><td>"."Sorry No records available"."<td></tr>";
                                        
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
                
            </main>
            
            </div>
        </div>
        <script type="text/javascript" src="<?php echo ADMIN_ASSETS_URL;?>js/main.js"></script>
        <script type="text/javascript" src="<?php echo ASSETS_URL;?>js/commonalert.js"></script>        
        <script type="text/javascript" src="<?php echo ASSETS_URL;?>js/config.js"></script>
        <script type="text/javascript" src="<?php echo ASSETS_URL;?>js/cityLists.js"></script>
    </body>
</html>