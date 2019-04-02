<?php 
      $assets_url = ASSETS_URL;
      $faqPageData = json_decode($faqPageData);
   
    
      $page = new Pagination();
      if (!empty($faqPageData->total_result)) {
          $total_records = $faqPageData->total_result;
       
          //$_SESSION['totalrecords'] = $total_records;
      }

?>

  <section class="admin-section">
                    <div class="container">
                        <div class="with-box-shadow ">
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