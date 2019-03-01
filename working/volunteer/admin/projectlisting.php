    
<?php
    session_start();
   // include '../connection.php';
   include '../model/project.php';

  //  $conn = OpenCon();   
    
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "organization") {

            if(isset($_GET["add"]))
      { 
          if ($_GET["add"]==1) {
              $_SESSION["add1"]=$_GET["add"];
             header('Location: ../admin/projectpage.php');
 
          }
      }
          else
          {
              $_SESSION["add1"]="";
          }
          if(isset($_GET["id"]))
           {
              if($_GET["id"]==1){
                  $_SESSION["edit1"]="edit";
                  $_SESSION["projectid"]=$_GET["edit"];
              header('Location: ../admin/projectpage.php');
                  
              }
          }
          else
          {
              $_SESSION["edit1"]="";
              $_SESSION["projectid"]="";
          }
    if (empty($_GET["del_id"])==false) {
        $id=$_GET["del_id"];
        $user_id=$_SESSION["id"];
        
        
        $project_data=new projects();
       $result3=$project_data->getprojectlisting($user_id,$id);
       // $sql2="SELECT  o.user_id as id FROM organizations as o inner join projects as p on o.id=p.organization_id where o.user_id='$user_id' and p.id='$id'";
				
        //$result3 = $conn->query($sql2);

        if ($result3->num_rows > 0) {

            while ($row = $result3->fetch_assoc()) {

                if($row['id']==$user_id)
                {
                // $organization=$row['user_id'];
                
            echo "id==".$id;

            $project_get_details=new projects();
            $result_project=$project_get_details->delete_project($id);       
                    
            if(mysqli_affected_rows($result_project))
               {
               echo '<script language="javascript">';
               echo 'alert("Projects Deleted successfully")';
               echo '</script>';
               // echo $sql;
           }else
           {
               echo '<script language="javascript">';
               echo 'alert("Project is already deleted")';
               echo '</script>';
           }
                }else
                {
                    // header( "Location:projectlisting.php" );
                }
            
        }
       }
       else
       {
        // header( "Location:projectlisting.php" );
             echo '<script language="javascript">';
               echo 'alert("Sorry you are trying unauthorize access")';
               echo '</script>';
       }



    }
   // $conn = OpenCon();   

            
        }
       else if ($_SESSION['role'] == "superadmin") {

        if(isset($_GET["add"]))
        { 
            if ($_GET["add"]==1) {
                $_SESSION["add1"]=$_GET["add"];
               header('Location: ../admin/projectpage.php');
   
            }
        }
            else
            {
                $_SESSION["add1"]="";
            }
            if(isset($_GET["id"]))
             {
                if($_GET["id"]==1){
                    $_SESSION["edit1"]="edit";
                    $_SESSION["projectid"]=$_GET["edit"];
                header('Location: ../admin/projectpage.php');
                    
                }
            }
            else
            {
                $_SESSION["edit1"]="";
                $_SESSION["projectid"]="";
            }
  
  
  
  
  
  
  
      if (empty($_GET["del_id"])==false) {
          $id=$_GET["del_id"];
          $project_get_details1=new projects();
          $result_project1=$project_get_details1->delete_project($id);       
                  
          if(mysqli_affected_rows($result_project1))
              {
                  echo '<script language="javascript">';
                  echo 'alert("Projects Deleted successfully")';
                  echo '</script>';
                  // echo $sql;
              }else
              {
                  echo '<script language="javascript">';
                  echo 'alert("Project is already deleted")';
                  echo '</script>';
              }
      }
      //$conn = OpenCon();          
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
                                <h5>Projects list</h5>
                                <div class="button-outer">
                                <a href="?add=1" > <button type="button" class="btn btn-fill">Add Projects</button></a>
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
                                          // $conn = OpenCon();
                                           if($_SESSION['role']=="superadmin")
                                           { 
                                           $project_list_admin=new projects();
                                           $result=$project_list_admin->getprojectlistingAll();
                                           // $sql = "SELECT  p.title,p.id,countries.name as countryname,p.created_at as created FROM projects as p inner join countries on p.country_id=countries.id  ORDER by p.created_at desc";
                                           }
                                           else if($_SESSION['role']=="organization")
                                           {
                                            $user=$_SESSION['id'];
                                            $project_list_admin=new projects();
                                            $result=$project_list_admin->getprojectlistingAllOrg($user);
                                            //$sql = "SELECT  p.title as title,p.id as id ,countries.name as countryname,p.created_at as created FROM projects as p inner join organizations as o on p.organization_id=o.id inner join countries on p.country_id=countries.id  WHERE  o.user_id= $user  ORDER by p.created_at desc";
                                           
                                           }
                                           //$result = $conn->query($sql);
                                   
                                           if ($result->num_rows > 0) {
                                   
                                               while ($row = $result->fetch_assoc()) {
                                                
                                             
                                        ?>
                                    <tr>
                                       
                                        <td><?php echo $row["title"];?></td>
                                        <td><?php echo $row["countryname"];?></td>
                                        
                                       
                                        <td>
                                            <div class="button-outer">
                                            <a class="text-light" href="?id=1&edit=<?php  echo $row['id'];?>" >   <button type="button"class="btn btn-fill" id="" >Edit</button></a>
                                              <a onclick="deleterecord('<?php echo $row['id']; ?>')" href="javascript:void(0);"  >  <button type="button" class="btn btn-fill" value="" id="delete">Delete </button></a>
                                             
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
                if(confirm("Are you sure you want to delete Project?")){
                    window.location.href = '?del_id='+id;
                }
            }
        </script>
        <script type="text/javascript" src="js/main.js"></script>
        
    </body>
</html>