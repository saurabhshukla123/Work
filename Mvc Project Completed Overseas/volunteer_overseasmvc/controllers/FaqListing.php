<?php


class FaqListing extends BaseController {
 
    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {   
       
        $this->load_model('FaqModel');
        $this->load_model('Pagination');
       
        $page = new Pagination();
        $limit = 3; // Number of entries to show in a page.
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
        $faqPageData = array(); 
        $faqPageData['faqdetails']=$this->faqmodel->allfaqdetails($start_from,$limit);
        $faqPageData['total_result']=$this->faqmodel->count_records();
              
        // $faqPageData['faqdetails'] = $data;
        $json_format = json_encode($faqPageData);
        $this->load_view('admin/faqlisting',array('faqPageData'=>$json_format));
      
   
   
    }


    public function ajaxData()
    {
        $this->load_model('Pagination');
        $this->load_model('FaqModel');
        
        $page2 = new Pagination();
        $limit = 3; // Number of entries to show in a page.
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

        $faqPageData = array(); 
        $faqPageData['faqdetails']=$this->faqmodel->allfaqdetails($start_from,$limit);
        $faqPageData['total_result']=$this->faqmodel->count_records();
              
        // $faqPageData['faqdetails'] = $data;
        $json_format = json_encode($faqPageData);
        $this->load_view('admin/faqAjax',array('faqPageData'=>$json_format));
        //$this->load_view('admin/CountryAjax',array('countryPageData'=>$json_format));
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