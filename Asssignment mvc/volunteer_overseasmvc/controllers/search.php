<?php

class Search extends BaseController {

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */
   var  $db;
   public $conn;

 public $category;    
   public $activity;
   public $countryid;
    public function index() {
       
        
        $this->load_model('SearchModel');
        $this->load_model('CategoryModel');
        $this->load_model('activity');
        $this->load_model('ProjectModel');
        $this->load_model('categories');
        $this->load_model('Pagination');

        $p=new projects ();
        $searchPageData = array();  
           
    
        if(isset($_POST["normal_select1"]))
{

$category=$_POST["normal_select1"];
$activity=$_POST["select_id_activity"];
$anywhere=$_POST["anywhere"];

$_SESSION['category']=$category;
$_SESSION['activity']=$activity;
$country_name=$_POST["anywhere"];
}
else
{
	if(isset($_SESSION['category']))
	{
		$category=$_SESSION['category'];

	}
	else
	{
	$category="";
	}
	
	if(isset($_SESSION['activity']))
	{
		$activity=$_SESSION['activity'];

	}
	else
	{
	$activity="";
	}
	
}
 
        $anywhere="";        
        if(isset($_POST["anywhere"]))
        {
          $anywhere=  $_POST["anywhere"];
        $fields="id,name";
        $tablename="countries";
        $_SESSION['country_name']=$_POST["anywhere"];
        $searchPageData['countryname']=$_POST["anywhere"];
        $conditions="name LIKE '%$anywhere%'";
        
        
      
          
         

   
        $countries=$p->select_query($fields,$tablename,$conditions);
        $countryid=$countries[0]['id'];
            $_SESSION['countries']=$countryid;
     
        }
        else
        {
            
            $_SESSION['countries']="1";
            $countryid=$_SESSION['countries'];

        }	
        //filters code 
        if(isset( $_SESSION["value"]))
            {	
            $value=$_SESSION["value"];
            }
            else
            {
                $value="";
            }
            
            
            
            if(isset( $_SESSION["colummsfilter"]))
            {	
            $columns_filter=$_SESSION["colummsfilter"];
            }
            else
            {
                $columns_filter="";
            }
            
            if(isset( $_SESSION["tablename_filter"]))
            {	
            $tablename_filter=$_SESSION["tablename_filter"];
            }
            else
            {
                $tablename_filter="";
            }
        
           

        $searchPageData['countryname']="india";
        
        $searchPageData['result_activities'] =$this->activity->getallactivities();
        $searchPageData['result_category'] =$this->categories->getallcategories();
    
    //code  for pagination

    $limit = 1; // Number of entries to show in a page.
    //Look for a GET variable page if not found default is 1.
    $page=new Pagination();
    if (isset($_GET["page"])) {
    $pn = $_GET["page"];
        if($pn<0)
        {
        $pn=1;
        }
    } 
    else {
    $pn = 1;
    }
    
     $start_from= $page->setdata($limit,$pn);

    $i=0;

        $searchPageData['result_project_data'] =$p->getDataSearch($columns_filter,$category,$countryid,$activity,$value,$start_from,$limit,$tablename_filter);
        $searchPageData['total_result'] =$p->count_records($category,$countryid,$activity,$value,$tablename_filter,$columns_filter);
       	
        $json_format = json_encode($searchPageData);
         $this->load_view('search',array('searchPageData'=>$json_format));
       
      

    }


    public function ajax()
    {
        session_start();
    
    $columns="";
    $fields="";
    $value="";
   $value=  $_POST["query"];
   
   
   if($value=="relevance")
   {
      $columns="";
      $fields="";
      $value=" ORDER BY title DESC ";
      $_SESSION['relevance']="SET";
      $_SESSION['popularity']=null;
   
   }
   else if($value=="popularity")
   
   {
      $_SESSION['popularity']="SET";
      $_SESSION['relevance']=null;
      $columns=" INNER JOIN project_view_history pvh on p.id=pvh.project_id";
      $fields=" ,count(pvh.id) as count1 ";
      
      $value=" GROUP BY p.id ORDER by count(pvh.id) DESC ";
   }
   else
   {
      $_SESSION['popularity']=null;
      $_SESSION['relevance']=null;
      $columns="";
      $fields="";
      $value="";
   }

   $_SESSION["colummsfilter"]= $fields;
   $_SESSION["tablename_filter"]=$columns;
  
   $_SESSION["value"]=$value;


  



    echo json_encode($value);exit;
    }
   
}