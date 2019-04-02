<?php


class ApplicationLists extends BaseController {
 
    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {   
       
    
        $this->load_model('Applications');
        $this->load_model('Pagination');       
        $page = new Pagination();
        $userid="";
        $limit = 12; // Number of entries to show in a page.
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
        $i=0;

        $ApplicationPageData = array(); 
        if ($_SESSION["role"] == "superadmin") {
           $userid="";
        }
       else if ($_SESSION["role"] == "organization") {
         $userid=  $_SESSION["id"];  
        }
        $ApplicationPageData['applicationdetail']=$this->applications->allApplicationDetails($start_from,$limit,$userid);
        $ApplicationPageData['total_result']=$this->applications->count_records($userid);     
        $json_format = json_encode($ApplicationPageData);
        $this->load_view('admin/ApplicationLists',array('ApplicationPageData'=>$json_format));
      
   
   
    }


    public function ajaxData()
    {
        $this->load_model('Pagination');
  
        $this->load_model('Applications');
        
        $page2 = new Pagination();
        $limit = 12; // Number of entries to show in a page.
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
        if ($_SESSION["role"] == "superadmin") {
            $userid="";
         }
        else if ($_SESSION["role"] == "organization") {
          $userid=  $_SESSION["id"];  
         }
        $ApplicationPageData = array();         
        $ApplicationPageData['applicationdetail']=$this->applications->allApplicationDetails($start_from,$limit,$userid);
        $ApplicationPageData['total_result']=$this->applications->count_records($userid);       
        $json_format = json_encode($ApplicationPageData);
        $this->load_view('admin/ApplicationListsAjax',array('ApplicationPageData'=>$json_format));
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