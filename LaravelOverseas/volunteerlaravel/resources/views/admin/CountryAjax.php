      <?php
       $assets_url = ASSETS_URL;
       $countryPageData = json_decode($countryPageData);
       $page = new Pagination();
       if (!empty($countryPageData->total_result)) {
           $total_records = $countryPageData->total_result;
        
           $_SESSION['totalrecords'] = $total_records;
       }
      ?>
      
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