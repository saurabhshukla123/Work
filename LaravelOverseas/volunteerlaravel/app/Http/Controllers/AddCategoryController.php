<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
class AddCategoryController extends Controller
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
                            $result=DB::table('categories')->where("id","=",$id)->get();
                            
            }
        }
       
        return view('admin/AddCategory',compact('result')); 
        // if (isset($_SESSION["role"])) {
        //     if ($_SESSION["role"] == "superadmin") {
               
        //     } 
        //     else {
        //         header('Location: Login');
        //     }
        // }else
        // {
        //     header('Location: Login');
        // }


        // $this->load_model("CategoriesModel");
        // $question = "";
        // $answer = "";
        // $sequencenumber = "";
        // $id = "";
        // if (isset($_SESSION["add2"])) {

        // } 
        // elseif (isset($_SESSION["edit2"])) {
        // } else {
        //     header("Location: Login");
        // }

        // if (isset($_SESSION['role'])) {

        //     if ($_SESSION['role'] == "superadmin") {
        //         if ($_SESSION["add2"] == "add2") {
        //             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //                 $name = $_POST['name'];
        //                 $value = $this->categoriesmodel->insert($name);

        //                 if ($value == true) {
        //                     echo '<script language="javascript">';
        //                     echo 'alert("Category added successfully")';
        //                     echo '</script>';
        //                     $_SESSION["status"]="added";
        //                     header('Location: CategoryLists');

        //                 } else {
        //                     echo '<script language="javascript">';
        //                     echo 'alert("Please fill details properly")';
        //                     echo '</script>';
        //                 }
        //             }
        //         } else if ($_SESSION["edit2"] == "edit2") {
        //             $categoryid = $_SESSION["categoryid"];
        //             $result["categorydetails"] = $this->categoriesmodel->getcategories($categoryid);       
        //             $resultdata = json_encode($result);
        //             $resultorg = json_decode($resultdata);
                
        //             $flag=0;
                    
        //             if(!empty($resultorg->categorydetails)){ 
        //                 foreach($resultorg->categorydetails as $row){
        //                     $name = $row->name;
                          
                       
        //                 }
        //             }
        //         }
        //         if ($_SESSION["edit2"] == "edit2") {
        //             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //                 $categoryid = $_SESSION["categoryid"];
        //                 $name = $_POST['name'];
        //                 $result_faq_update = $this->categoriesmodel->updateCategory($categoryid,$name);
        //                 if ($result_faq_update) {
        //                     echo '<script language="javascript">';
        //                     echo 'alert("Category Updated successfully")';
        //                     echo '</script>';
        //                     $_SESSION["status"]="updated";
        //                     header('Location:CategoryLists');
        //                 } else {
        //                     echo '<script language="javascript">';
        //                     echo 'alert("Please fill details properly")';
        //                     echo '</script>';
        //                 }
        //             }

        //         }

        //     }

        // } else {
        //     header('Location: Login');
        // }

        // $json_format = json_encode($result);
        
        // $this->load_view('admin/AddCategory',array('categoriesPageData' => $json_format));
      
    }

    public function addEditData(Request $request)
    {
        $name =strip_tags(request('name'));
   
        $operationadd=$request->session()->has('add2');
        $add=$request->session()->get('add2');
        if ($add == "add2") {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $value = DB::table('categories')->insertGetId(
                ['name' => $name]
                );
               
            if ($value == true) {
                $request->session()->put('status', "added");
                // $_SESSION["status"]="added";
                $request->session()->put('imageurl',  null);
                return redirect('/CategoryList');

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
                $inputs =    ['name' => $name];            
                $value = DB::table('categories')->where('id', '=', $request->session()->get('eid'))->update($inputs);  
                // $_SESSION["status"]="Updated";
                $request->session()->put('status', "updated");
                // $request->session()->put('imageurl',  null);
                return redirect('/CategoryList');
        }
      }
       return view('admin/AddCategory');
    }
}
