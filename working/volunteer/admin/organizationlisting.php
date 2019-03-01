    
<?php
    session_start();
   // include '../connection.php';
    include '../model/organization.php';
    //$conn = OpenCon();   
    
    if($_SESSION["role"]=="superadmin")
    {            if(isset($_GET["add"]))
        { 
            if ($_GET["add"]==1) {
                $_SESSION["add"]=$_GET["add"];
               header('Location: ../admin/addorganization.php');
   
            }
        }
            else
            {
                $_SESSION["add"]="";
            }
            if(isset($_GET["id"]))
             {
                if($_GET["id"]==1){
                    $_SESSION["edit"]="edit";
                    $_SESSION["orgid"]=$_GET["edit"];
                header('Location: ../admin/addorganization.php');
                    
                }
            }
            else
            {
                $_SESSION["edit"]="";
                $_SESSION["orgid"]="";
            }


             

                if (empty($_GET["del_id"])==false) {
                    $id=$_GET["del_id"];
                

                    $org=new Organizations();
                   $result=$org->delete_organization($id);

                   // $sql="DELETE  FROM organizations WHERE id='$id' ";
                
                    
                  //  $result = $conn->query($sql);
                        
                        if(mysqli_affected_rows($result))
                        {
                            echo '<script language="javascript">';
                            echo 'alert("Organization Deleted successfully")';
                            echo '</script>';
                            // echo $sql;
                        }else
                        {
                            echo '<script language="javascript">';
                            echo 'alert("Organization already deleted")';
                            echo '</script>'; 
                            
                        }
                }
              //  $conn = OpenCon();   


    
    }
    else if($_SESSION["role"]=="organization")
    {
        if(isset($_GET["id"]))
        {
           if($_GET["id"]==1){
               $_SESSION["edit"]="edit";
               $_SESSION["orgid"]=$_GET["edit"];
           header('Location: ../admin/addorganization.php');
               
           }
       }
       else
       {
           $_SESSION["edit"]="";
           $_SESSION["orgid"]="";
       }
    }
    else
    {
        header('Location: ../admin/login.php');
    }
                    

 ?>   
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Volunteer Overseas</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <div class="wrapper admin-wrapper ">
        <?php  include 'header-admin.php'?> 
            <main>
                <section class="admin-section">
                    <div class="container">
                        <div class="with-box-shadow ">
                            <div class="section-title text-center">
                                <h5>Organization list</h5>
                                <div class="button-outer">
                                <?php if($_SESSION['role']=="superadmin") {?><a href="?add=1" >  <button type="submit" class="btn btn-fill"> Add Organization</button></a><?php } else {}?>
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
                                                 <th>Description</th>
                                        <th>Website</th>
                                        <th>Contact Name</th>
                                        <th>Video</th>
                                        <th>Logo</th>
                                                
                                            <?php }
                                        ?>
                                           <th>Actions</th>
                                    </tr>
                                    <?php
                                          // $conn = OpenCon(); 
                                           $org_details_orgusers=new Organizations();
                                           if($_SESSION['role']=="superadmin")
                                           { 
                                            
                                            $result=$org_details_orgusers->getAllOrganizationDetails();

                                           // $sql = "SELECT  name,id,email FROM organizations";
                                           }
                                           else if($_SESSION['role']=="organization")
                                           {
                                           $user=$_SESSION['id'];

                                          
                                           $result=$org_details_orgusers-> getAllOrganizationDetailUser($user);

                                           
                                           //$sql = "SELECT  name,id,email,logo,description,website,contact_name,video FROM organizations WHERE user_id='$user'";
                                           }
                                           
                                         //  $result = $conn->query($sql);
                                   
                                           if ($result->num_rows > 0) {
                                   
                                               while ($row = $result->fetch_assoc()) {
                                                
                                             
                                        ?>
                                    <tr>
                                       
                                        <td><?php echo $row["name"];?></td>
                                        <td><?php echo $row["email"];?></td>
                                        <?php if($_SESSION["role"]=="organization") {?>
                                            <td><?php echo $row["description"];?></td>
                                            <td><?php echo $row["website"];?></td>
                                            <td><?php echo $row["contact_name"];?></td>
                                            <td>
                                            <video width="150" height="100" controls>
                                                <source src="../uploadsvideo/<?php echo $row["video"];?>" type="video/mp4">
                                            </video>
                                            </td>
                                            <td><img src="../uploadsimage/<?php echo $row["logo"];?>" width="50px" height="50px"></td>

                                        <?php }
                                        ?>
                                        <td>
                                            <div class="button-outer">
                                            <a class="text-light" href="?id=1&edit=<?php  echo $row['id'];?>" > <button type="button"class="btn btn-fill" id="" >Edit</button></a>
                                                <?php if($_SESSION["role"]!="organization") {?> <a onclick="deleterecord('<?php echo $row['id']; ?>')" href="javascript:void(0);" >  <button type="button" class="btn btn-fill" value="" id="delete">Delete </button></a> <?php }
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
                if(confirm("Are you sure you want to delete Organization?")){
                    window.location.href = '?del_id='+id;
                }
            }
        </script>
        <script type="text/javascript" src="js/main.js"></script>
        
    </body>
</html>