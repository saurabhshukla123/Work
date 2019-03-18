<?php


class ProjectLists extends BaseController {
 
    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {   
        // if (isset($_SESSION['role'])) {
        //     if ($_SESSION['role'] == "organization") {
    
        //         if(isset($_GET["add"]))
        //   { 
        //       if ($_GET["add"]==1) {
        //           $_SESSION["add1"]=$_GET["add"];
        //          header('Location: ../admin/projectpage.php');
     
        //       }
        //   }
        //       else
        //       {
        //           $_SESSION["add1"]="";
        //       }
        //       if(isset($_GET["id"]))
        //        {
        //           if($_GET["id"]==1){
        //               $_SESSION["edit1"]="edit";
        //               $_SESSION["projectid"]=$_GET["edit"];
        //           header('Location: ../admin/projectpage.php');
                      
        //           }
        //       }
        //       else
        //       {
        //           $_SESSION["edit1"]="";
        //           $_SESSION["projectid"]="";
        //       }
        // if (empty($_GET["del_id"])==false) {
        //     $id=$_GET["del_id"];
        //     $user_id=$_SESSION["id"];        
            
        //     $project_data=new projects();
        //    $result3=$project_data->getprojectlisting($user_id,$id);      
        //     if ($result3->num_rows > 0) {
    
        //         while ($row = $result3->fetch_assoc()) {
    
        //             if($row['userid']==$user_id)
        //             {
        //                       $project_get_details=new projects();
        //                         $result_project=$project_get_details->delete_project($id);       
                                        
        //                         if(mysqli_affected_rows($result_project))
        //                         {
        //                         echo '<script language="javascript">';
        //                         echo 'alert("Projects Deleted successfully")';
        //                         echo '</script>';
                           
        //                     }else
        //                     {
        //                         echo '<script language="javascript">';
        //                         echo 'alert("Project is already deleted")';
        //                         echo '</script>';
        //                     }
        //             }else
        //             {
                      
               
        //             }
                
        //     }
        //    }
        //    else
        //    {
           
        //          echo '<script language="javascript">';
        //            echo 'alert("Sorry you are trying unauthorize access")';
        //            echo '</script>';
        //    }
    
    
    
        // }
          
        //     }
        //    else if ($_SESSION['role'] == "superadmin") {
    
        //     if(isset($_GET["add"]))
        //     { 
        //         if ($_GET["add"]==1) {
        //             $_SESSION["add1"]=$_GET["add"];
        //            header('Location: ../admin/projectpage.php');
       
        //         }
        //     }
        //         else
        //         {
        //             $_SESSION["add1"]="";
        //         }
        //         if(isset($_GET["id"]))
        //          {
        //             if($_GET["id"]==1){
        //                 $_SESSION["edit1"]="edit";
        //                 $_SESSION["projectid"]=$_GET["edit"];
        //             header('Location: ../admin/projectpage.php');
                        
        //             }
        //         }
        //         else
        //         {
        //             $_SESSION["edit1"]="";
        //             $_SESSION["projectid"]="";
        //         }
      
      
      
      
      
      
      
        //   if (empty($_GET["del_id"])==false) {
        //       $id=$_GET["del_id"];
        //       $project_get_details1=new projects();
        //       $result_project1=$project_get_details1->delete_project($id);       
                      
        //       if(mysqli_affected_rows($result_project1))
        //           {
        //               echo '<script language="javascript">';
        //               echo 'alert("Projects Deleted successfully")';
        //               echo '</script>';
                     
        //           }else
        //           {
        //               echo '<script language="javascript">';
        //               echo 'alert("Project is already deleted")';
        //               echo '</script>';
        //           }
        //   }
            
        // }
        // }
        // else {
        //     header('Location: ../admin/login.php');
        // } 
      
         
       
        $this->load_model('ProjectModel');

        if($_SESSION['role']=="superadmin")
        {                                             
            $result['projectdetails']=$this->projectmodel->getprojectlistingAll();
        }
        else if($_SESSION['role']=="organization")
        {
            $user=$_SESSION['id'];
            $result['projectdetails']=$this->projectmodel->getprojectlistingAllOrg($user);;
        }





        
        $json_format = json_encode($result);
        
        $this->load_view('admin/ProjectLists',array('ProjectData' => $json_format));
   
   
    }


    public function edit($var1,$var2)
    {  
       $this->load_model("OrganizationModel");   
       $this->load_model('ProjectModel'); 
       if(isset($var1) && isset($var2) && $var1==1)
       {
           $id=$var1;
           $edit=$var2;

       }  
       else if(isset($var1) && $var1==2) 
       {
           $id=0;
       } 
       else if(isset($var1) && isset($var2) && $var1==3)
       {
           $id=$var1;
           $delete=$var2;
       } 

   
   
       if($_SESSION["role"]=="superadmin")
       {   
         
            if(isset($id))
            { 
               if ($id==0) {
               
                $_SESSION["add1"]="add1";
                $_SESSION["edit1"]="";
                $_SESSION["projectid"]="";
                // header('Location: ../admin/projectpage.php');

                   // $this->load_view('admin/AddOrganization');
                 header('Location: ../../../AddProjects');
      
               }
               else{
                   $_SESSION["add1"]="";
               }
          
              }
              
               if(isset($id) && $id!="" && $id==1)
                {   
                   
                   if($id==1){
                       $_SESSION["edit1"]="edit";
                       $_SESSION["projectid"]=$edit;
                      // $this->load_view('admin/AddOrganization');
                   header('Location: ../../../AddProjects');
                       
                   }
                   else
                   {
                     $_SESSION["add1"]="";
                       $_SESSION["edit1"]="";
                       $_SESSION["projectid"]="";
                   }
                  
               }
             
               if(isset($id) && $id!="" && $id==3)
               {   
                       $projectid= $delete;                  
                      $result=$this->projectmodel->delete_project($projectid);   
                           if(mysqli_affected_rows($result)>=1)
                           {
                               echo '<script language="javascript">';
                               echo 'alert("Project Deleted successfully")';
                               echo '</script>';  
                               $_SESSION["status"]="deleted";
                                header('Location: ../../../ProjectLists'); 
                                           
                           }else
                           {
                               echo '<script language="javascript">';
                               echo 'alert("Project already deleted")';
                               echo '</script>';
                                header('Location: ../../../ProjectLists');
                               
                           
                           }


                           $this->load_view("ProjectLists"); 
                   }       
       
       }
       else if($_SESSION["role"]=="organization")
       {

        if(isset($id))
        { 
           if ($id==0) {
           
            $_SESSION["add1"]="add1";
            $_SESSION["edit1"]="";
            $_SESSION["projectid"]="";
            // header('Location: ../admin/projectpage.php');

               // $this->load_view('admin/AddOrganization');
             header('Location: ../../../AddProjects');
  
           }
           else{
               $_SESSION["add1"]="";
           }
      
          }
   
        if(isset($id) && $id!="" && $id==1)
        {   
           
           if($id==1){
               $_SESSION["edit1"]="edit";
               $_SESSION["projectid"]=$edit;
              // $this->load_view('admin/AddOrganization');
           header('Location: ../../../AddProjects');
               
           }
           else
           {
             $_SESSION["add1"]="";
               $_SESSION["edit1"]="";
               $_SESSION["projectid"]="";
           }
          
       }



       if(isset($id) && $id!="" && $id==3)
       {   
      
                $user_id=$_SESSION["id"];  
                $projectid= $delete;                  
                $result['project_list']=$this->projectmodel->getprojectlisting($user_id,$projectid);
                $resultDataProject = json_encode($result);
                $Projectlist = json_decode($resultDataProject);
               if(!empty($Projectlist->project_list)){
                   foreach($Projectlist->project_list as $row){
                  
        
                        if($row->user_id==$user_id)
                        {
                            $results=$this->projectmodel->delete_project($projectid);   
                            if(mysqli_affected_rows($results)>=1)
                            {
                                echo '<script language="javascript">';
                                echo 'alert("Project Deleted successfully")';
                                echo '</script>';  
                                $_SESSION["status"]="deleted";
                                 header('Location: ../../../ProjectLists'); 
                                            
                            }else
                            {
                                echo '<script language="javascript">';
                                echo 'alert("Project already deleted")';
                                echo '</script>';
                                 header('Location: ../../../ProjectLists');
                                
                            
                            }
                        }
                        else
                        {

                            header('Location: ../../../ProjectLists');
                        }
                    
                }
               }
               else{
                      echo "<script>alert('Sorry you are trying unauthorize Access'); </script>";
                      header('Location: ../../../ProjectLists');
                   }

                   $this->load_view("ProjectLists"); 
           }
       }
       else
       {
           header('Location: Login');
       }
   }
}
?>