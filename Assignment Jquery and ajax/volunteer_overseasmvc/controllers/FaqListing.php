<?php


class FaqListing extends BaseController {
 
    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {   
       
        $this->load_model('FaqModel');
  
    
        // if (isset($_SESSION['role'])) {
        //     if ($_SESSION['role'] == "superadmin") {
    
        //     if(isset($_GET["add"]))
        //     { 
        //         if ($_GET["add"]==1) {
        //             $_SESSION["add2"]=$_GET["add"];
        //            header('Location: ../admin/adminfaq.php');   
        //         }
        //     }
        //         else
        //         {
        //             $_SESSION["add2"]="";
        //         }
        //         if(isset($_GET["id"]))
        //          {
        //             if($_GET["id"]==1){
        //                 $_SESSION["edit2"]="edit";
        //                 $_SESSION["projectid"]=$_GET["edit"];
        //             header('Location: ../admin/adminfaq.php');
                        
        //             }
        //         }
        //         else
        //         {
        //             $_SESSION["edit2"]="";
        //             $_SESSION["projectid"]="";
        //         }
              
      
        //   if (empty($_GET["del_id"])==false) {
        //       $id=$_GET["del_id"];
            
        //       $faq_get_details=new faq();
        //     $result_faq=$faq_get_details->delete($id);       
                    
        //             if(mysqli_affected_rows($result_faq))
        //             {
        //                 echo '<script language="javascript">';
        //                 echo 'alert("Faq Deleted successfully")';
        //                 echo '</script>';
                      
        //             }else
        //             {
        //                 echo '<script language="javascript">';
        //                 echo 'alert("Faq is already deleted")';
        //                 echo '</script>';
        //             }        
        //   }             
        // }
        // else
        // {
        //     header('Location: ../admin/login.php');
        // }
        // }
        // else {
        //     header('Location: ../admin/login.php');
        // } 
    
        $data=$this->faqmodel->allfaqdetails();
        $faqPageData = array();        
        $faqPageData['faqdetails'] = $data;
        $json_format = json_encode($faqPageData);
        $this->load_view('admin/faqlisting',array('faqPageData'=>$json_format));
      
   
   
    }




    public function edit($var1,$var2)
    {  
       $this->load_model("FaqModel");      
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
               
                $_SESSION["add2"]="add2";
                $_SESSION["edit2"]="";
                $_SESSION["projectid"]="";
                // header('Location: ../admin/projectpage.php');

                   // $this->load_view('admin/AddOrganization');
                 header('Location: ../../../AddFaq');
      
               }
               else{
                   $_SESSION["add2"]="";
               }
          
              }
              
               if(isset($id) && $id!="" && $id==1)
                {   
                   
                   if($id==1){
                       $_SESSION["edit2"]="edit2";
                       $_SESSION["projectid"]=$edit;
                      // $this->load_view('admin/AddOrganization');
                   header('Location: ../../../AddFaq');
                       
                   }
                   else
                   {
                     $_SESSION["add2"]="";
                       $_SESSION["edit2"]="";
                       $_SESSION["projectid"]="";
                   }
                  
               }
             
               if(isset($id) && $id!="" && $id==3)
               {   
                       $projectid= $delete;                  
                      $result=$this->faqmodel->delete($projectid);   
                           if(mysqli_affected_rows($result)>=1)
                           {
                               echo '<script language="javascript">';
                               echo 'alert("Project Deleted successfully")';
                               echo '</script>';  
                               $_SESSION["status"]="deleted";
                                header('Location: ../../../FaqListing'); 
                                           
                           }else
                           {
                               echo '<script language="javascript">';
                               echo 'alert("Project already deleted")';
                               echo '</script>';
                                header('Location: ../../../FaqListing');
                               
                           
                           }


                           $this->load_view("FaqListing"); 
                   }       
       
       }







    }
}
?>