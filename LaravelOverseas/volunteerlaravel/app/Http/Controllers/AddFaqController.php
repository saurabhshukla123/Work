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
class AddFaqController extends Controller
{

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     *
     */

    public function index(Request $request)
    {
     
        $result="";
        $edit2="";
        if($request->session()->has('edit2'))
        {
            $edit2= $request->session()->get('edit2');
           
            if ($edit2== "edit2") {
                            $id= $request->session()->get('eid');
                            $result=DB::table('faq')->where("id","=",$id)->get();
                            
            }
        } 
      

    return view('admin/AddFaqs',compact('result'));        
    
    }

    public function addFaq(Request $request)
    {
        $question =strip_tags(request('question'));
        $answer = strip_tags(request('answer'));
        $sequencenumber = strip_tags(request('sequencenumber'));
        $operationadd=$request->session()->has('add2');
       $add=$request->session()->get('add2');
        if ($add == "add2") {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $value = DB::table('faq')->insertGetId(
                ['question' => $question, 'answer' => $answer,'sequence_number'=>$sequencenumber]
                );
               
            if ($value == true) {
                $request->session()->put('status', "added");       
                return redirect('/FaqLists');

            } else {
                echo '<script language="javascript">';
                echo 'alert("Please fill details properly")';
                echo '</script>';
            }
        }

        }
        
        $operationedit=$request->session()->has('edit2');
        $edit=$request->session()->get('edit2');
        if ($edit == "edit2") {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
                $inputs = ['question' => $question, 'answer' => $answer,'sequence_number'=>$sequencenumber];            
                $value = DB::table('faq')->where('id', '=', $request->session()->get('eid'))->update($inputs);  
                $request->session()->put('status', "updated");       
                return redirect('/FaqLists');
        }
      }
       return view('admin/AddFaqs');
    }
}
