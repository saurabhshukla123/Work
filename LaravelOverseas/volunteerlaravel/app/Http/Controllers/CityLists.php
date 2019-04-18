<?php


class CityLists extends BaseController {
 
    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {   
        $this->load_model('Pagination');
        $this->load_model('CityModel');
        
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
   
       
      
        $cityPageData = array();        
        $cityPageData['citydetails'] = $this->citymodel->getallcityAndCountry($start_from,$limit);
        $cityPageData['total_result']=$this->citymodel->count_records();
        $json_format = json_encode($cityPageData);
        $this->load_view('admin/CityLists',array('cityPageData'=>$json_format));
    }

    public function ajaxData()
    {
        $this->load_model('Pagination');
        $this->load_model('CityModel');
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

      
          
        $cityPageData = array();        
        $cityPageData['citydetails'] = $this->citymodel->getallcityAndCountry($start_from,$limit);
        $cityPageData['total_result']=$this->citymodel->count_records();
        $json_format = json_encode($cityPageData);
        $this->load_view('admin/CityListsAjax',array('cityPageData'=>$json_format));
      
    }




    public function edit($var1,$var2)
    {  
        $site_url = SITE_URL;
      
        $this->load_model('CityModel');
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
                $_SESSION["cityid"]="";            
               header('Location: '.$site_url.'AddCity');   
            }
               else{
                   $_SESSION["add2"]="";
               }
          
              }
              
               if(isset($id) && $id!="" && $id==1)
                {   
                   
                   if($id==1){
                       $_SESSION["edit2"]="edit2";
                       $_SESSION["cityid"]=$edit;
                       header('Location: '.$site_url.'AddCity');
                       
                   }
                   else
                   {
                     $_SESSION["add2"]="";
                       $_SESSION["edit2"]="";
                       $_SESSION["cityid"]="";
                   }
                  
               }
             
               if(isset($id) && $id!="" && $id==3)
               {   
                       $cityid= $delete;                  
                       $result=$this->citymodel->delete($cityid);   
                           if(mysqli_affected_rows($result)>=1)
                           {
                               echo '<script language="javascript">';
                               echo 'alert("City Deleted successfully")';
                               echo '</script>';  
                               $_SESSION["status"]="deleted";
                               header('Location: '.$site_url.'CityLists'); 
                           }else
                           {
                               echo '<script language="javascript">';
                               echo 'alert("City already deleted")';
                               echo '</script>';
                               header('Location: '.$site_url.'CityLists');
                           }
                           $this->load_view("CityLists"); 
                   }       
       
       }







    }
}
?>