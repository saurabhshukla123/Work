<?php
class OrganizationLists extends BaseController
{

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     *
     */

    public function index()
    {
        $this->load_model("OrganizationModel"); 
           
        $this->load_model("Pagination"); 
      
      $page = new Pagination();
        $limit = 5; // Number of entries to show in a page.
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
            $result['organizationdetails']=$this->organizationmodel->getAllOrganizationDetails($start_from,$limit);
            $result['count_total']=$this->organizationmodel->count_total();
        }
        else if($_SESSION['role']=="organization")
        {
        $user=$_SESSION['id'];
        $result['organizationdetails']=$this->organizationmodel-> getAllOrganizationDetailUser($user,$start_from,$limit);
        $result['count_total']=$this->organizationmodel->count_total_org($user);    
    }


        
        $json_format = json_encode($result);
        $indexPageData = json_decode($indexPageData);
        
        $this->load_view('admin/OrganizationLists',array('OrganizationData' => $json_format));
    }


    public function ajaxData()
    {
        $this->load_model("OrganizationModel"); 
           
        $this->load_model("Pagination"); 
      
      $page = new Pagination();
        $limit = 5; // Number of entries to show in a page.
        //Look for a GET variable page if not found default is 1.
        if (isset($_POST["page"])) {
            $pn = $_POST["page"];
            if ($pn < 0) {
                $pn = 1;
            }
        } else {
            $pn = 1;
        }
        $start_from = $page->setdata($limit, $pn);
   
        if($_SESSION['role']=="superadmin")
        {                                             
            $result['organizationdetails']=$this->organizationmodel->getAllOrganizationDetails($start_from,$limit);
            $result['count_total']=$this->organizationmodel->count_total();
        }
        else if($_SESSION['role']=="organization")
        {
        $user=$_SESSION['id'];
        $result['organizationdetails']=$this->organizationmodel-> getAllOrganizationDetailUser($user,$start_from,$limit);
        $result['count_total']=$this->organizationmodel->count_total_org($user);    
    }


        
        $json_format = json_encode($result);
        $indexPageData = json_decode($indexPageData);
        
        $this->load_view('admin/OrganizationListsAjax',array('OrganizationData' => $json_format));
    }


    public function edit($var1,$var2)
     {  
        $this->load_model("OrganizationModel");    
      

        // $uri = $this->uri_to_assoc();
        // echo $uri['id'];
        // echo $uri['edit'];
     //   print_r($var1);
   //     print_r($var2);
   
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
                    $_SESSION["add"]="add";
                    $_SESSION["edit"]="";
                    $_SESSION["orgid"]="";

                    // $this->load_view('admin/AddOrganization');
                  header('Location: ../../../AddOrganization');
       
                }
                else{
                    $_SESSION["add"]="";
                }
           
               }
               
                if(isset($id) && $id!="" && $id==1)
                 {   
                    
                    if($id==1){
                        $_SESSION["edit"]="edit";
                        $_SESSION["orgid"]=$edit;
                        $_SESSION["add"]="";
                       // $this->load_view('admin/AddOrganization');
                    header('Location: ../../../AddOrganization');
                        
                    }
                    else
                    {
                        
                        $_SESSION["edit"]="";
                        $_SESSION["orgid"]="";
                    }
                   
                }
              
                if(isset($id) && $id!="" && $id==3)
                {   
                        $orgid= $delete;
                        // $org=new Organizations();
                     
                       $result=$this->organizationmodel->delete_organization($orgid);
                            if(mysqli_affected_rows($result)>=1)
                            {
                                echo '<script language="javascript">';
                                echo 'alert("Organization Deleted successfully")';
                                echo '</script>';  
                                $_SESSION["status"]="deleted";
                                 header('Location: ../../../OrganizationLists'); 
                                            
                            }else
                            {
                                echo '<script language="javascript">';
                                echo 'alert("Organization already deleted")';
                               
                                 header('Location: ../../../OrganizationLists');
                                
                            
                            }


                            $this->load_view("OrganizationLists"); 
                    }       
        
        }
        else if($_SESSION["role"]=="organization")
        {
    
            if(isset($id) && $id!="" && $id==1)
            {   
               
               if($id==1){
                   $_SESSION["edit"]="edit";
                   $_SESSION["orgid"]=$edit;
                  // $this->load_view('admin/AddOrganization');
               header('Location: ../../../AddOrganization');
                   
               }
               else
               {
                   $_SESSION["edit"]="";
                   $_SESSION["orgid"]="";
               }
              
           }

        }
        else
        {
            header('Location: Login');
        }
    }

}
