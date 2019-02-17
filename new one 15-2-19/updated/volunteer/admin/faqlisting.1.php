
    
    <?php
    session_start();
    include '../connection.php';
    include 'projects.php';
    $conn = OpenCon();   
    
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "superadmin") {

        if(isset($_GET["add"]))
        { 
            if ($_GET["add"]==1) {
                $_SESSION["add2"]=$_GET["add"];
               header('Location: ../admin/adminfaq.php');   
            }
        }
            else
            {
                $_SESSION["add2"]="";
            }
            if(isset($_GET["id"]))
             {
                if($_GET["id"]==1){
                    $_SESSION["edit2"]="edit";
                    $_SESSION["projectid"]=$_GET["edit"];
                header('Location: ../admin/adminfaq.php');
                    
                }
            }
            else
            {
                $_SESSION["edit2"]="";
                $_SESSION["projectid"]="";
            }
          
  
      if (empty($_GET["del_id"])==false) {
          $id=$_GET["del_id"];
     
            $sql="DELETE  FROM faq WHERE id='$id'";              
            $result = $conn->query($sql);
                
                if(mysqli_affected_rows($conn))
                {
                    echo '<script language="javascript">';
                    echo 'alert("faq Deleted successfully")';
                    echo '</script>';
                    
                    // echo $sql;
                }else
                {
                    echo '<script language="javascript">';
                    echo 'alert("faq is already deleted")';
                    echo '</script>';
                }        
      }
      $conn = OpenCon();          
    }
    }
    else {
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
                                <h5>FAQ list</h5>
                                <div class="button-outer">
                                    <button type="button" class="btn btn-fill"><a href="?add=1" >Add FAQ</a></button>
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
                                           $conn = OpenCon();
                                           if($_SESSION['role']=="superadmin")
                                           { 
                                           $sql = "SELECT  question,answer,sequence_number,id,id FROM faq";
                                           }
                                           
                                           $result = $conn->query($sql);
                                   
                                           if ($result->num_rows > 0) {
                                   
                                               while ($row = $result->fetch_assoc()) {
                                                
                                             
                                        ?>
                                    <tr>
                                      
                                        <td><?php echo $row["sequence_number"];?></td>
                                        <td><?php echo $row["question"];?></td>
                                        <td><?php echo $row["answer"];?></td>
                                       
                                       
                                        <td>
                                            <div class="button-outer">
                                                <button type="button"class="btn btn-fill" id="" ><a class="text-light" href="?id=1&edit=<?php  echo $row['id'];?>" >Edit</a></button>
                                             
                                             
                                                </div> 
                                        </td>
                                        <td>
                                        <a onclick="deleteFaq('<?php echo $row['id']; ?>')" href="javascript:void(0);" >  <button type="button" class="btn btn-fill" value="" id="delete">Delete </button></a>
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
        <script type="text/javascript" src="js/main.js"></script>
        <script>
            function deleteFaq(id){
                if(confirm("Are you sure you want to delete faq?")){
                    window.location.href = '?del_id='+id;
                }
            }
        </script>
    </body>
</html>