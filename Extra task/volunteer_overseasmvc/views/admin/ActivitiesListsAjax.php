<?php 
    $assets_url = ASSETS_URL;
    $activitiesPageData = json_decode($activitiesPageData);
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
if (!empty($activitiesPageData->total_result)) {
    $total_records = $activitiesPageData->total_result;
 
	$_SESSION['totalrecords'] = $total_records;
}

?>
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
                                        <a onclick="deleteActivity('<?php echo $row->id; ?>')" href="javascript:void(0);" >  <button type="button" class="btn btn-fill" value="" id="delete">Delete </button></a>
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