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
class AddCityController extends Controller
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
        // $result;
        if($request->session()->has('edit2'))
        {
            $edit2= $request->session()->get('edit2');
           
            if ($edit2== "edit2") {
                            $id= $request->session()->get('eid');
                            $result=DB::table('cities')->where("id","=",$id)->get();
                            
            }
        }
        $country=DB::table('countries')->get();
        return view('admin/AddCity',compact('result','country')); 
    }
    public function addEditData(Request $request)
    {
        $name =strip_tags(request('name'));
        $country =strip_tags(request('country'));
   
        $operationadd=$request->session()->has('add2');
        $add=$request->session()->get('add2');
        if ($add == "add2") {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $value = DB::table('cities')->insertGetId(
                ['name' => $name, 'country_id' => $country]
                );
               
            if ($value == true) {
                $request->session()->put('status', "added");
               
                $request->session()->put('imageurl',  null);
                return redirect('/CityList');

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
                $inputs =  ['name' => $name, 'country_id' => $country];            
                $value = DB::table('cities')->where('id', '=', $request->session()->get('eid'))->update($inputs);  
           
                $request->session()->put('status', "updated");
                // $request->session()->put('imageurl',  null);
                return redirect('/CityList');
        }
      }
       return view('admin/AddCity');
    }
}
