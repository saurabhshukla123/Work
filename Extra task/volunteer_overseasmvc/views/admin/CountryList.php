<?php
    $assets_url = ASSETS_URL;
    $countryPageData = json_decode($countryPageData);
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
if (!empty($countryPageData->total_result)) {
    $total_records = $countryPageData->total_result;
 
	$_SESSION['totalrecords'] = $total_records;
}




if(isset($_SESSION["status"]))
{
  if($_SESSION["status"]=="added")
  {
      $_SESSION["status"]="";
      echo "<script> alert('Country added sucessfully');</script>";
  }
  else if($_SESSION["status"]=="updated")
  {
      $_SESSION["status"]="";
      echo "<script> alert('Country updated sucessfully');</script>";
  }
  else if($_SESSION["status"]=="deleted")
  {
      $_SESSION["status"]="";
      echo "<script> alert('Country deleted sucessfully');</script>";
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
        <title>Country Lists</title>
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
                                <h5>Country list</h5>
                                <div class="button-outer">
                                <a href="CountryLists/edit/2/2">  <button type="button" class="btn btn-fill">Add Country</button></a>
                                </div>
                            </div>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="table-responsive">
                            
                                <table class="table admin-table table-bordered table-striped">
                                    <tr>
                                        <!-- <th>Sr.No</th> -->
                                        <th>Name</th>                                        
                                        <th>Image</th>
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


                                    
                                                if(!empty($countryPageData->countrydetails)){
                                                    foreach($countryPageData->countrydetails as $row){

                                          $i++;
                                        ?>
                                    <tr>
                                      
                                        <!-- <td><?php echo $i;?></td> -->
                                        <td><?php echo $row->name;?></td>
                                        <td><img src="<?php echo UPLOAD_IMAGE_URL; echo $row->image;?>" width="50px" height="50px" alt="No image"></td>
                                        
                                       
                                       
                                        <td>
                                            <div class="button-outer">
                                            <a class="text-light" href="CountryLists/edit/1/<?php  echo $row->id;?>" >  <button type="button"class="btn btn-fill" id="" >Edit</button></a>
                                             
                                             
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
                if(confirm("Are you sure you want to delete this country?")){
                    window.location.href = 'CountryLists/edit/3/'+id;
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
  var url1= siteurl + 'CountryLists/ajaxData';
 
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