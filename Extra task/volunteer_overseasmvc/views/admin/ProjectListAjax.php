<?php 
$assets_url = ASSETS_URL;
       $ProjectData = json_decode($ProjectData);
   
       $page = new Pagination();
       if (!empty($ProjectData->count_total)) {
           $total_records = $ProjectData->count_total;
        
           // $_SESSION['totalrecords'] = $total_records;
       }
       

?>

                <section class="admin-section">
                    <div class="container">
                        <div class="with-box-shadow ">
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
                                          if (isset($_POST["page"])) {
                                              $pn = $_POST["page"];
                                              if ($pn < 0) {
                                                  $pn = 1;
                                              }
                                          } else {
                                              $pn = 1;
                                          }
                                          $start_from = $page->setdata($limit, $pn);
                                     $i=0;
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
        