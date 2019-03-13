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
                            <ul class="pagination">
                                <li class="disabled">
                                    <a href="#" aria-label="Previous">
                                        <
                                    </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li class="">
                                    <a href="#" aria-label="Next">
                                        >
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                
            </main>
        </div>
        <script type="text/javascript" src="<?php echo ADMIN_ASSETS_URL;?>js/main.js"></script>
        <script>
            function deleteFaq(id){
                if(confirm("Are you sure you want to delete this faq?")){
                    window.location.href = 'FaqListing/edit/3/'+id;
                }
            }
        </script>
    </body>
</html>