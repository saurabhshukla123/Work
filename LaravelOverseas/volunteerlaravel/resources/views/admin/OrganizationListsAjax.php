<?php 
$assets_url = ASSETS_URL;
       $OrganizationData = json_decode($OrganizationData);
   
       $page = new Pagination();
       if (!empty($OrganizationData->count_total)) {
           $total_records = $OrganizationData->count_total;
        
           // $_SESSION['totalrecords'] = $total_records;
       }



       
       

?>
       <section class="admin-section">
                    <div class="container">
                        <div class="with-box-shadow ">
                            <div class="section-title text-center">
                                <h5>Organization list</h5>
                                <div class="button-outer">
                                <?php if($_SESSION['role']=="superadmin") {?><a href="OrganizationLists/edit/2/2" >  <button type="submit" class="btn btn-fill"> Add Organization</button></a><?php } else {}?>
                                </div>
                            </div>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="table-responsive">
                                <table class="table admin-table table-bordered table-striped">
                                    <tr>
                                        <th>Organization</th>
                                        <th>Email</th>
                                                 
                                       
                                        <?php
                                            if($_SESSION['role']=="organization")
                                            {?>
                                                 
                                        <th>Website</th>
                                        <th>Contact Name</th>
                                        
                                        <th>Logo</th>
                                                
                                            <?php }
                                        ?>
                                           <th>Actions</th>
                                    </tr>
                                    <?php     
                                                     $limit = 5; // Number of entries to show in a page.
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
                                             if(!empty($OrganizationData->organizationdetails)){
                                                     foreach($OrganizationData->organizationdetails as $row){
                                             
                                        ?>
                                    <tr>
                                       
                                        <td><?php echo $row->name;?></td>
                                        <td><?php echo $row->email;?></td>
                                        <?php if($_SESSION["role"]=="organization") {?>
                                           
                                            <td><?php echo $row->website;?></td>
                                            <td><?php echo $row->contact_name;?></td>
                                            <td><img src="<?php echo UPLOAD_IMAGE_URL; echo $row->logo;?>" width="50px" height="50px" alt="No image"></td>

                                        <?php }
                                        ?>
                                        <td>
                                            <div class="button-outer">
                                            <a class="text-light" href="OrganizationLists/edit/1/<?php  echo $row->id;?>" > <button type="button"class="btn btn-fill" id="" >Edit</button></a>
                                                <?php if($_SESSION["role"]!="organization") {?> <a onclick="deleterecord('<?php echo $row->id; ?>')" href="javascript:void(0);" >  <button type="button" class="btn btn-fill" value="" id="delete">Delete </button></a> <?php }
                                        ?>
                                             
                                                </div> 
                                        </td>
                                       
                                    </tr>
                                    <?php } }?>
                                    
                                   
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