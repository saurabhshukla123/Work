<?php
    $assets_url = ASSETS_URL;

    $activitiesPageData = json_decode($activitiesPageData);
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
if (!empty($activitiesPageData->total_result)) {
    $total_records = $activitiesPageData->total_result;
 
	$_SESSION['totalrecords'] = $total_records;
}




if(isset($_SESSION["status"]))
{
  if($_SESSION["status"]=="added")
  {
      $_SESSION["status"]="";
      echo "<script> alert('Activity added sucessfully');</script>";
  }
  else if($_SESSION["status"]=="updated")
  {
      $_SESSION["status"]="";
      echo "<script> alert('Activity updated sucessfully');</script>";
  }
  else if($_SESSION["status"]=="deleted")
  {
      $_SESSION["status"]="";
      echo "<script> alert('Activity deleted sucessfully');</script>";
  }
  else
  {
      $_SESSION["status"]="";
  }

}
 
 ?>   
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Activity Lists</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_URL;?>css/main.css">
    </head>
    <body>
   
        <div class="wrapper admin-wrapper  small-header">
        <?php  include 'header-admin.php'; ?> 
        <div class="" id="ajax">
            <main>
                <section class="admin-section">
                    <div class="container">
                        <div class="with-box-shadow ">
                            <div class="section-title text-center">
                                <h5>ACTIVITY Lists</h5>
                                <div class="button-outer">
                                <a href="ActivityLists/edit/2/2">  <button type="button" class="btn btn-fill">Add Activity</button></a>
                                </div>
                            </div>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="table-responsive">
                            
                                <table class="table admin-table table-bordered table-striped">
                                    <tr>
                                        <!-- <th>Sr.No</th> -->
                                        <th>Name</th>  
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


                                    
                                                if(!empty($activitiesPageData->activitiesdetails)){
                                                    foreach($activitiesPageData->activitiesdetails as $row){

                                          $i++;
                                        ?>
                                    <tr>
                                      
                                        <!-- <td><?php echo $i;?></td> -->
                                        <td><?php echo $row->name;?></td>
                                        <td>
                                            <div class="button-outer">
                                            <a class="text-light" href="ActivityLists/edit/1/<?php  echo $row->id;?>" >  <button type="button"class="btn btn-fill" id="" >Edit</button></a>
                                             
                                             
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
        <script>
            function deletecountry(id){
                if(confirm("Are you sure you want to delete this Activity?")){
                    window.location.href = 'ActivityLists/edit/3/'+id;
                }
            }
        </script>
        <script>
	$(document).on('click', '.page-link', function(){  
           var page = $(this).attr("id");  
		  
           sort1(page);  
      });


function sort1(page)
{
	var data1 = 'page='+page; 
   var siteurl='<?php echo $siteurl=SITE_URL; ?>';
  var url1= siteurl + 'ActivityLists/ajaxData';
 
	$.ajax({

    url :url1 ,
    type : 'POST',  
    data : data1,
    success : function(data) {
	 
	  $('#ajax').html(data);
	
    },

    });

}



</script>
    </body>
</html>