<?php


class CountryLists extends BaseController {
 
    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {   
        $this->load_model('Pagination');
        $this->load_model('CountriesModel');
        $page2 = new Pagination();
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
        $start_from = $page2->setdata($limit, $pn);
             $i=0;
   
       
      
        $countryPageData = array();        
        $countryPageData['countrydetails'] = $this->countriesmodel->getallcountries($start_from,$limit);
        $countryPageData['total_result']=$this->countriesmodel->count_records();
        $json_format = json_encode($countryPageData);
        $this->load_view('admin/CountryList',array('countryPageData'=>$json_format));
    }

    public function ajaxData()
    {
        $this->load_model('Pagination');
        
        $this->load_model('CountriesModel');
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

        $countryPageData = array();        
      
        $countryPageData['countrydetails'] = $this->countriesmodel->getallcountries($start_from,$limit);
        $countryPageData['total_result']=$this->countriesmodel->count_records();
        $json_format = json_encode($countryPageData);
        
        $this->load_view('admin/CountryAjax',array('countryPageData'=>$json_format));
    }




    public function edit($var1,$var2)
    {  
        $site_url = SITE_URL;
       $this->load_model("CountriesModel");      
       $this->load_model("CityModel");   
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
                $_SESSION["countryid"]="";            
               header('Location: '.$site_url.'AddCountry');   
            }
               else{
                   $_SESSION["add2"]="";
               }
          
              }
              
               if(isset($id) && $id!="" && $id==1)
                {   
                   
                   if($id==1){
                       $_SESSION["edit2"]="edit2";
                       $_SESSION["countryid"]=$edit;
                       header('Location: '.$site_url.'AddCountry');
                       
                   }
                   else
                   {
                     $_SESSION["add2"]="";
                       $_SESSION["edit2"]="";
                       $_SESSION["countryid"]="";
                   }
                  
               }
             
               if(isset($id) && $id!="" && $id==3)
               {   
                       $countryid= $delete;                  
                       $result=$this->countriesmodel->delete($countryid);   
                           if(mysqli_affected_rows($result)>=1)
                           {
                                
                             $result_delete=$this->citymodel->deleteCountrybyid($countryid); 
                             if(mysqli_affected_rows($result_delete)>=1)
                                {

                                     
                                        $_SESSION["status"]="deleted";
                                        header('Location: '.$site_url.'CountryLists'); 
                                }
                                else
                                {
                                      
                                        $_SESSION["status"]="deleted";
                                        header('Location: '.$site_url.'CountryLists'); 
                                }

                           }else
                           {
                            
                               header('Location: '.$site_url.'CountryLists');
                           }
                           $this->load_view("CountryLists"); 
                   }       
       
       }







    }
}
?>