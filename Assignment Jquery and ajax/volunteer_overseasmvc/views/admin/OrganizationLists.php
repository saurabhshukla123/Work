    
<?php
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
    $assets_url = ASSETS_URL;
    $OrganizationData = json_decode($OrganizationData);

    if(isset($_SESSION["organizationemail"]) && $_SESSION["organizationemail"]!="")
    {
        $_SESSION["organizationemail"]="";
    }


  if(isset($_SESSION["status"]))
  {
    if($_SESSION["status"]=="added")
    {
        $_SESSION["status"]="";
        echo "<script> alert('Organization added sucessfully');</script>";
    }
    else if($_SESSION["status"]=="updated")
    {
        $_SESSION["status"]="";
        echo "<script> alert('Organization updated sucessfully');</script>";
    }
    else if($_SESSION["status"]=="deleted")
    {
        $_SESSION["status"]="";
        echo "<script> alert('Organization deleted sucessfully');</script>";
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
        <title>Organization Lists</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="<?php echo ASSETS_URL;?>images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_URL;?>css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_URL;?>css/style.css">
    </head>
    <body>
        <div class="wrapper admin-wrapper small-header ">
        <?php  include 'header-admin.php'?> 
            <main>
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
        <script>
            function deleterecord(id){
                if(confirm("Are you sure you want to delete this Organization?")){
                    window.location.href = 'OrganizationLists/edit/3/'+id;
                }
            }
        </script>
        <script type="text/javascript" src="<?php echo ADMIN_ASSETS_URL;?>js/main.js"></script>
        
    </body>
</html>