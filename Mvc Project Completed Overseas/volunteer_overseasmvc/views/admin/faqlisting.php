<?php
    $assets_url = ASSETS_URL;
    $faqPageData = json_decode($faqPageData);
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
if (!empty($faqPageData->total_result)) {
    $total_records = $faqPageData->total_result;
 
}
 ?>   
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>FAQ Lists</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_URL;?>css/main.css">
    </head>
    <body>
        <div class="wrapper admin-wrapper  small-header">
        <?php  include 'header-admin.php'; ?> 
            <main>
            <div id="loading" style="display:none;  background: url('<?php echo IMAGES; ?>/loading.gif') 50% 50% no-repeat rgb(249,249,249);">
	        </div>
            <div id="ajax_part">
                <section class="admin-section">
                    <div class="container">
                        <div class="with-box-shadow ">
                         <!-- code start for alert -->
                         <?php if($_SESSION["status"]=="updated"){ 
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-success update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                Faq updated sucessfully
                            </div>
                            <?php }?>
                            <?php if($_SESSION["status"]=="added"){
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-success update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                Faq added sucessfully
                            </div>
                            <?php }?>
                            <?php if($_SESSION["status"]=="deleted"){
                                $_SESSION["status"]="";
                                ?>
                                <div class="alert alert-success update_success" role="alert" >
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                Faq deleted sucessfully
                            </div>
                            <?php }?>
                        <!-- code ends for alert -->
                            <div class="section-title text-center">
                                <h5>FAQ list</h5>
                                <div class="button-outer">
                                <a href="FaqListing/edit/2/2">  <button type="button" class="btn btn-fill">Add FAQ</button></a>
                                </div>
                            </div>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="table-responsive">
                                <table class="table admin-table table-bordered table-striped">
                                    <tr>
                                        <th>Sequence Number</th>
                                        <th>Question</th>
                                        
                                        <th>Answer</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                    <?php
                                         $limit = 3; // Number of entries to show in a page.
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
                                         
                                     
                                                if(!empty($faqPageData->faqdetails)){
                                                    foreach($faqPageData->faqdetails as $row){
                                        ?>
                                    <tr>
                                      
                                        <td><?php echo $row->sequence_number;?></td>
                                        <td><?php echo $row->question;?></td>
                                        <td><?php echo $row->answer;?></td>
                                       
                                       
                                        <td>
                                            <div class="button-outer">
                                            <a class="text-light" href="FaqListing/edit/1/<?php  echo $row->id;?>" >  <button type="button"class="btn btn-fill" id="" >Edit</button></a>
                                             
                                             
                                                </div> 
                                        </td>
                                        <td>
                                        <a onclick="deleteFaq('<?php echo $row->id; ?>')" href="javascript:void(0);" >  <button type="button" class="btn btn-fill" value="" id="delete">Delete </button></a>
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
                </div>
                
            </main>
        </div>
        <script type="text/javascript" src="<?php echo ADMIN_ASSETS_URL;?>js/main.js"></script>
        <script type="text/javascript" src="<?php echo ASSETS_URL;?>js/commonalert.js"></script>
        <script type="text/javascript" src="<?php echo ASSETS_URL;?>js/config.js"></script>
        <script type="text/javascript" src="<?php echo ASSETS_URL;?>js/faqlist.js"></script>
    </body>
</html>