<?php

class Search extends BaseController
{

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     *
     */
    public $db;
    public $conn;

    public $category;
    public $activity;
    public $countryid;
    public function index()
    {
       
        $this->load_model('SearchModel');
        $this->load_model('CategoriesModel');
        $this->load_model('ActivitiesModel');
        $this->load_model('ProjectModel');
        $this->load_model('categories');
        $this->load_model('Pagination');

        $p = new ProjectModel();
        $page2=new Pagination();
        $searchPageData = array();
        $limit = 1; // Number of entries to show in a page.
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
        $searchPageData['result_activities'] = $this->activitiesmodel->getallactivities();
        $searchPageData['minages'] = $p->getAllMinAges();

        if(isset($_SESSION["page"]))
        {
            if($_SESSION["page"]=="home")
            {
                $category = $_POST["normal_select1"];
                $activity = $_POST["select_id_activity"];
                $anywhere = $_POST["anywhere"];
                $searchPageData['result_activities'] = $this->activitiesmodel->getallactivities();
                $searchPageData['result_category'] = $this->categoriesmodel->getallcategories();
                $anywhere = $_POST["anywhere"];
                $fields = "id,name";
                $tablename = "countries";
                $_SESSION['country_name'] = $_POST["anywhere"];
                $searchPageData['countryname'] = $_POST["anywhere"];
                $conditions = "name LIKE '%$anywhere%'";
                
                $_SESSION["category"]= $category;
                $_SESSION["activity"]= $activity;
                
                
                if (isset($_POST["anywhere"]) && $_POST["anywhere"] != null) {
        
                  
                    $countries = $p->select_query($fields, $tablename, $conditions);
                    $countryid = $countries[0]['id'];
                } else {
                    $countryid = "";
                }
            
                if (isset($_GET["countryname"])) {
                    $anywhere = $_GET["countryname"];
                    $conditions = "name LIKE '%$anywhere%'";
                    $countries = $p->select_query($fields, $tablename, $conditions);
                    $countryid = $countries[0]['id'];
                    $searchPageData['result_project_data'] = $p->getDataSearch($columns_filter, $category, $countryid, $activity, $value, $start_from, $limit, $tablename_filter);
                    $searchPageData['total_result'] =$p->count_records($category,$countryid,$activity,$value,$tablename_filter,$columns_filter);
                    $searchPageData['countryname']=$anywhere;
                }
                else {
                    
                    $searchPageData['result_project_data'] = $p->getDataSearch($columns_filter, $category, $countryid, $activity, $value, $start_from, $limit, $tablename_filter);
                    $searchPageData['total_result'] =$p->count_records($category,$countryid,$activity,$value,$tablename_filter,$columns_filter);
                }
               
            }
            
        }
       else {
            $searchPageData['result_project_data'] = $p->getDataSearch($columns_filter, $category, $countryid, $activity, $value, $start_from, $limit, $tablename_filter);
            $searchPageData['total_result'] =$p->count_records($category,$countryid,$activity,$value,$tablename_filter,$columns_filter);
        }

    

        $json_format = json_encode($searchPageData);
        $this->load_view('search', array('searchPageData' => $json_format));
    }

    public function ajax()
    {
       
        $this->load_model('ProjectModel');
        $this->load_model('Pagination');
        $_SESSION["page"]="ajax";
        $page2 = new Pagination();
     
        $p = new ProjectModel();
        $searchPageDataAjax = array();        
        $checkbox2=  $_POST["checkbox2"];
        $startdate=  $_POST["startdate"];
        $enddate=  $_POST["enddate"];

        $checkbox1=  $_POST["checkbox1"];
        $checkbox3=  $_POST["checkbox3"];
        $activities=  $_POST["activities"];
        $minimumage=  $_POST["minimumage"];
        $select1=  $_POST["select1"];
        $weeksminimum=  $_POST["weeksminimum"];
        $weeksmaximum=  $_POST["weeksmaximum"];
        $country= trim($_POST["country"]);

        if(isset($minimumage) && $minimumage!="")
        {
              //  $value=$minimumage;
              if(isset($checkbox1)  && $checkbox1!=""  || isset($checkbox2) && $checkbox2!="" || isset($checkbox3) && $checkbox3!="" || isset($activities) && $activities!=""  || isset($country) && $country!="" )
              {

                $value=" AND min_age >=".$minimumage."";
              }
              else
              {
                $value=" min_age >=".$minimumage."";
              }
        }
        if(isset($weeksmaximum) && $weeksmaximum!=""  && isset($weeksminimum) && $weeksminimum!="")
        {
            if(isset($checkbox1)  && $checkbox1!=""  || isset($checkbox2) && $checkbox2!="" || isset($checkbox3) && $checkbox3!="" || $value!="" || isset($activities) && $activities!="" || isset($country) && $country!="")
            {
                $value.=" AND pc.number_of_weeks BETWEEN ".$weeksminimum." AND ".$weeksmaximum;
            }
            
            else
            {
                $value.=" pc.number_of_weeks BETWEEN ".$weeksminimum." AND ".$weeksmaximum;
                
            }
        }
        //code for start date
        if(isset($startdate) && $startdate!="" && isset($enddate) && $enddate!="" &&  $startdate!="--" && $enddate!="--" )
        {
            if(isset($checkbox1)  && $checkbox1!=""  || isset($checkbox2) && $checkbox2!="" || isset($checkbox3) && $checkbox3!="" || $value!="" || isset($activities) && $activities!="" || isset($country) && $country!="")
            {
                $tablename_filter=" INNER JOIN project_start_dates AS  psd  on p.id=psd.project_id ";


                $value.=" AND  psd.start_date  BETWEEN '".$startdate."' AND '".$enddate."'";
            } 
            else
            {
                $tablename_filter=" INNER JOIN  project_start_dates AS  psd  on p.id=psd.project_id ";
                $value.="  psd.start_date BETWEEN '".$startdate."' AND '".$enddate."'";
            }

        }
        else{
            $tablename_filter="";
        }
    
        //code ends for startdate
        if(isset($activities) && $activities!="")
        {
          $activity=$activities;
          
        } 
        if(isset($country) && $country!="")
        {
            $fields = "id,name";
            $tablename = "countries";
            $conditions = "name LIKE '%$country%'";
            $countries = $p->select_query($fields, $tablename, $conditions);
            $countryid = $countries[0]['id'];
        
        }
        if(isset($checkbox2)  || isset($checkbox2) || isset($checkbox3))
        {
        if($checkbox1 =="1")
             {
             $category.="1";
             
             $_SESSION["checkbox1"]="checked";
             
             }
             else
             {
                $flag=1;
                unset($_SESSION["checkbox1"]);
             }
             if($checkbox2 =="2")
             {
                 if($category=="")
                 {
    
                   $category.="2";
                 }
                 else
                 {
                    
               $category.=",2";
                 }
    
                 $_SESSION["checkbox2"]="checked";
               
             }
             else
             {  $flag=2;
                unset($_SESSION["checkbox2"]);
             }
             if($checkbox3 =="3")
             {
                if($category=="")
                {
    
                  $category.="3";
                }
                else
                {
             $category.=",3";
                }
                $_SESSION["checkbox3"]="checked";
                
             }
             else
             {
                $flag=3;
                unset($_SESSION["checkbox3"]);
    
             }
    
       
            
           
          $_SESSION["category"]=$category;
    
          }
          
          else
          {
    
          }


          //for filter sorting

          
          if($select1=="relevance")
          {
             $columns="";
             $fields="";
             $order_filter="title DESC ";
           //  $groupby_filter=" ";
            
             $checked1=" selected";
          
            }
          else if($select1=="popularity")
          
          {
             $columns=" INNER JOIN project_view_history pvh on p.id=pvh.project_id";
             $fields=" ,count(pvh.id) as count1 ";
             $groupby_filter=" p.id ";
             $order_filter="  count(pvh.id) DESC";
             $checked2=" selected";
          }
          else
          {
             $columns="";
             $fields="";
             $checked1="";
             $checked2="";   
          }
       
         $columns_filter= $fields;
          $tablename_filter.=$columns;
          //filter sorting ends




        //code ends
      
        $limit = 1; // Number of entries to show in a page.
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



        $this->load_model('ProjectModel');
        $p = new ProjectModel();
        $result_array=array();
      
        if(isset($groupby_filter) || isset($order_filter)  )
        {
       // $result_array = $p->getDataSearch($columns_filter, $category, $countryid, $activity, $value, $start_from, $limit, $tablename_filter);
        $searchPageDataAjax['result_project_data2'] = $p->getDataSearchSort($columns_filter, $category, $countryid, $activity, $value, $start_from, $limit, $tablename_filter,$order_filter,$groupby_filter);
        $searchPageDataAjax['total_result'] =$p->count_recordsSort($category,$countryid,$activity,$value,$tablename_filter,$columns_filter,$order_filter,$groupby_filter);
    
        }
        else
        {
        $searchPageDataAjax['result_project_data2'] = $p->getDataSearch($columns_filter, $category, $countryid, $activity, $value, $start_from, $limit, $tablename_filter);
        $searchPageDataAjax['total_result'] =$p->count_records($category,$countryid,$activity,$value,$tablename_filter,$columns_filter);
        }
        
        $json_format = json_encode($searchPageDataAjax);
             $record= array();
     
    $searchPageDataAjax = json_decode($json_format);
    $result = '';
    $i=0;  
if (!empty($searchPageDataAjax->total_result)) {
    $total_records = $searchPageDataAjax->total_result;
      $results=$total_records;
    $_SESSION['totalrecords'] = $total_records;
}
if($results==0||$results=="" || $results=="0")
{
    $results=0;
}



    $pageLink= $page2->setpagination($total_records);
    
      $result .= '     <div class="container opacity-search" style="padding-left:0px;padding-right: 0px;">
      <div class="row pb-3 pt-2">
          <div class="col-lg-8 col-md-8 col-5">
              <span>
                  <lable class="font-16px">'.$results.' Result</lable>
              </span>
          </div>
          <div class="col-lg-4 col-md-4 col-7"><span class="float-right" style="font-size:14px;">
                  Sort by:
                  <select class="search-select" style="font-size:14px;" id="select1" onchange="sort();">
                  <option value="">Please select</option>
                      <option value="relevance"'.$checked1.'>Relevance</option>
                      <option value="popularity"'.$checked2.'>Mostviewed</option>
                  </select>
              </span>
          </div>
      </div>
      <div class="row search_page">
          <div class="col-lg-12 col-md-12">
              <div class="row">';

             





        foreach ($searchPageDataAjax->result_project_data2 as $valueproject) {
        $i++;
         $result .= '<div class="col-lg-4 col-md-4 pt-4">
						 <div class="image">
							 <div id="carouselExampleControls'. $i.'" class="carousel slide" data-ride="carousel">
								 <div class="carousel-inner">
									 <div class="carousel-item active">
										 <img class="d-block w-100" src="'.IMAGES.$valueproject->image.'" height="200px" alt="First slide">

										 <h5 class="search-owl-first"><a href="#" class="pink">'. $valueproject->orgname.'</a></h5>
									 </div>
								 </div>
								 <a class="carousel-control-prev" href="#carouselExampleControls'.$i .'" role="button" data-slide="prev">
									 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
									 <span class="sr-only">Previous</span>
								 </a>
								 <a class="carousel-control-next" href="#carouselExampleControls'. $i.'" role="button" data-slide="next">
									 <span class="carousel-control-next-icon" aria-hidden="true"></span>
									 <span class="sr-only">Next</span>
								 </a>
							 </div>
							 <div class="text-search pt-1">
								 <h5><a href="volunteer.php?id='. $valueproject->id.'" style="font-size:16px; color:black;">'. $valueproject->title.'</a>
								 </h5>
								 <span>
									 <img src="'. IMAGES .'volunteer-logo01.png" style=" height: 22px;width: 22px; border-radius: 9px">
									 <a href="#" class="blue" style="font-size:14px;">Love Volunteer</a>
								 </span>
								 <a href="#" class="blue" style="font-size:14px; color:black;display:block;">$.'. $valueproject->per_week_cost .'/week 1-'. $valueproject->total_weeks.' Weeks duration</a>
							 </div>
						 </div>
                     </div>';
                     
                   
                    }
                    $result .=  ' </div>
 </div>
</div>


<!-- <input type="text" id="query" name="query"> -->

<div class="paging text-center justify-content-center  tablet-pagination mobile-pagination pt-3" style="padding-left:465px;font-size: 16px;" id="pagination">

<nav aria-label="..." class="text-center" style="align-items:center;">
     <ul class="pagination" >
     '.$pageLink.'
     </ul>
 </nav>
 </div>
</div>
<div>
</div>';


                   echo json_encode($result);exit;



    }
}


?>