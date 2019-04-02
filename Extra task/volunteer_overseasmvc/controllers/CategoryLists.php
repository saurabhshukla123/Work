<?php


class CategoryLists extends BaseController {
 
    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {   
        $this->load_model('Pagination');
        $this->load_model('CategoriesModel');
        
        // print_r("hello");
        // die();
        $page2 = new Pagination();
        $limit = 2; // Number of entries to show in a page.
        //Look for a GET variable page if not found default is 1.
        if (isset($_GET["page"])) {
            $pn = $_GET["page"];
            if ($pn < 0) {
                $pn = 1;
            }
        } else {
            $pn = 1;
        }
        $start_from = $page2->setdata($limit, $pn);
             $i=0;
   
       
      
        $categoriesPageData = array();        
        $categoriesPageData['categoriesdetails'] = $this->categoriesmodel->getallcategories($start_from,$limit);
        $categoriesPageData['total_result']=$this->categoriesmodel->count_records();
        $json_format = json_encode($categoriesPageData);
        $this->load_view('admin/CategoryLists',array('categoriesPageData'=>$json_format));
    }

    public function ajaxData()
    {
        $this->load_model('Pagination');
        
        $this->load_model('CategoriesModel');
        $page2 = new Pagination();
        $limit = 2; // Number of entries to show in a page.
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

      
      
        $categoriesPageData = array();        
        $categoriesPageData['categoriesdetails'] = $this->categoriesmodel->getallcategories($start_from,$limit);
        $categoriesPageData['total_result']=$this->categoriesmodel->count_records();
        $json_format = json_encode($categoriesPageData);
        $this->load_view('admin/CategoryListsAjax',array('categoriesPageData'=>$json_format));

       // $this->load_view('admin/CountryAjax',array('countryPageData'=>$json_format));
    }




    public function edit($var1,$var2)
    {  
        $site_url = SITE_URL;
        $this->load_model('CategoriesModel');     
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
                $_SESSION["categoryid"]="";            
               header('Location: '.$site_url.'AddCategory');   
            }
               else{
                   $_SESSION["add2"]="";
               }
          
              }
              
               if(isset($id) && $id!="" && $id==1)
                {   
                   
                   if($id==1){
                       $_SESSION["edit2"]="edit2";
                       $_SESSION["categoryid"]=$edit;
                       header('Location: '.$site_url.'AddCategory');
                       
                   }
                   else
                   {
                     $_SESSION["add2"]="";
                       $_SESSION["edit2"]="";
                       $_SESSION["categoryid"]="";
                   }
                  
               }
             
               if(isset($id) && $id!="" && $id==3)
               {   
                       $categoryid= $delete;                  
                       $result=$this->categoriesmodel->delete($categoryid);   
                           if(mysqli_affected_rows($result)>=1)
                           {
                               echo '<script language="javascript">';
                               echo 'alert("Category Deleted successfully")';
                               echo '</script>';  
                               $_SESSION["status"]="deleted";
                               header('Location: '.$site_url.'CategoryLists'); 
                           }else
                           {
                               echo '<script language="javascript">';
                               echo 'alert("Category already deleted")';
                               echo '</script>';
                               header('Location: '.$site_url.'CategoryLists');
                           }
                           $this->load_view("CategoryLists"); 
                   }       
       
       }







    }
}
?>