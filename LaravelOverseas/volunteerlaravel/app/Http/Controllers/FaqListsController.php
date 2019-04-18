<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Blogs;
use App\LoginModel;
use DB;

class FaqListsController extends Controller {
 
    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index() {   
       

        $result=DB::table('faq')->get();
        return view('admin/faqlisting',compact('result'));
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
    }

 






    public function editFaq($var1,$var2,Request $request)
    {

      
       
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
       
       if($request->session()->has('role'))
       {
       $role= $request->session()->get('role');
   

       if($role=="superadmin")
       {   
         
            if(isset($id))
            { 
               if ($id==0) {
               
                $request->session()->put('add2', "add2");
                $request->session()->put('edit2', "");
                $request->session()->put('eid', "");
                         
                return redirect('/AddFaq');
      
               }
               else{
                $request->session()->put('add2', "");
               }
          
              }
              
               if(isset($id) && $id!="" && $id==1)
                {   
                   
                   if($id==1){
                    $request->session()->put('edit2', "edit2");
                    $request->session()->put('eid', $edit);
                    $request->session()->put('add2', "");
                      return redirect('/AddFaq');
                   }
                   else
                   {
                 
                       $request->session()->put('add2', "");
                       $request->session()->put('edit2', "");
                       $request->session()->put('eid', "");

                   }
                  
               }
             
               if(isset($id) && $id!="" && $id==3)
               {   
                       $projectid= $delete;   
                       $result =DB::table('faq')->where('id', $projectid)->delete();    
                           if($result>=1)
                           { $request->session()->put('status', "deleted");       
                               return redirect('/FaqLists');
                                           
                           }else
                           {
                               return redirect('/FaqLists');
                               
                           }


                           return redirect('/FaqLists');
                   }       
       
       }
    }
    else
    {
    echo 'No data in the session';
    }







    }



}
?>