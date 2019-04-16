<?php


class ProjectLists extends BaseController {
 
    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {   
        $this->load_model('ProjectModel');
        $this->load_model('Pagination');

        $page = new Pagination();
        $limit = 6; // Number of entries to show in a page.
        //Look for a GET variable page if not found default is 1.
        if (isset($_GET["page"])) {
            $pn = $_GET["page"];
            if ($pn < 0) {
                $pn = 1;
            }
        } else {
            $pn = 1;
        }
        $start_from = $page->setdata($limit, $pn);
   
       

        if($_SESSION['role']=="superadmin")
        {                                             
            $result['projectdetails']=$this->projectmodel->getprojectlistingAll($start_from,$limit);
            $result['count_total']=$this->projectmodel->count_total();
         
           
        }
        else if($_SESSION['role']=="organization")
        {
            $user=$_SESSION['id'];
            $result['projectdetails']=$this->projectmodel->getprojectlistingAllOrg($user,$start_from,$limit);
            $result['count_total']=$this->projectmodel->count_total_Org($user);                  
        }

        $json_format = json_encode($result);
        
        $this->load_view('admin/ProjectLists',array('ProjectData' => $json_format));
   
   
    }
    public function ajaxData()
    {

        $this->load_model('Pagination');
        
        $this->load_model('ProjectModel');
        $page2 = new Pagination();
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
        
        $start_from = $page2->setdata($limit, $pn);
        
        $i = 0;
        if($_SESSION['role']=="superadmin")
        {                                             
            $result['projectdetails']=$this->projectmodel->getprojectlistingAll($start_from,$limit);
            $result['count_total']=$this->projectmodel->count_total();
         
           
        }
        else if($_SESSION['role']=="organization")
        {
            $user=$_SESSION['id'];
            $result['projectdetails']=$this->projectmodel->getprojectlistingAllOrg($user,$start_from,$limit);
            $result['count_total']=$this->projectmodel->count_total_Org($user);                  
        }



        $json_format = json_encode($result);
        
        $this->load_view('admin/ProjectListAjax',array('ProjectData' => $json_format));
   
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