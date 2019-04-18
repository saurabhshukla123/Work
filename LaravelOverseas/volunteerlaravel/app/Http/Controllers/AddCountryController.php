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
class AddCountryController extends Controller
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
                            $result=DB::table('countries')->where("id","=",$id)->get();
                            
            }
        }
        return view('admin/AddCountry',compact('result'));     
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


        // $this->load_model("CountriesModel");
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
        //                // $image = $_POST['image'];
        //                $date1 = date_create(date("Y/m/d"));				
        //                 $time =$date1;
        //                 $time = time();
        //                 $target_dir = UPLOAD_IMAGE_URL;
        //                 $target_fileimgdir = $target_dir .$time.basename($_FILES["image"]["name"]);
        //                 $target_fileimg=$time.basename($_FILES["image"]["name"]);                        
        //                 $uploadOk = 1;
        //                 $imageFileType = strtolower(pathinfo($target_fileimgdir,PATHINFO_EXTENSION));	
        //                 if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_fileimgdir)) {
        //                     //  "The file ". basename( $_FILES["organizationimage"]["name"]). " has been uploaded.";
        //                 } else {
        //                     //  "<alert>";
        //                 }                       
        //                 if(empty($_FILES["image"] ['name']))
        //                 {
        //                     $target_fileimg=$image;
        //                 }




                   
        //                 $value = $this->countriesmodel->insert($name, $target_fileimg);

        //                 if ($value == true) {
        //                     echo '<script language="javascript">';
        //                     echo 'alert("Country added successfully")';
        //                     echo '</script>';
        //                     $_SESSION["status"]="added";
        //                     header('Location: CountryLists');

        //                 } else {
        //                     echo '<script language="javascript">';
        //                     echo 'alert("Please fill details properly")';
        //                     echo '</script>';
        //                 }
        //             }
        //         } else if ($_SESSION["edit2"] == "edit2") {
        //             $countryid = $_SESSION["countryid"];
        //             $result["countriesdetails"] = $this->countriesmodel->getcountries($countryid);                 
        //             $resultdata = json_encode($result);
        //             $resultorg = json_decode($resultdata);
                
        //             $flag=0;
                    
        //             if(!empty($resultorg->countriesdetails)){ 
        //                 foreach($resultorg->countriesdetails as $row){
        //                     $name = $row->name;
        //                     $image = $row->image;
                       
        //                 }
        //             }
        //         }
        //         if ($_SESSION["edit2"] == "edit2") {
        //             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //                 $countryid = $_SESSION["countryid"];
        //                 $name = $_POST['name'];
        //                 // $image = $_POST['image'];
        //                 $date1 = date_create(date("Y/m/d"));				
        //                 $time =$date1;
        //                 $time = time();
        //                 $target_dir = UPLOAD_IMAGE_URL;
        //                 $target_fileimgdir = $target_dir .$time.basename($_FILES["image"]["name"]);
        //                 $target_fileimg=$time.basename($_FILES["image"]["name"]);                        
        //                 $uploadOk = 1;
        //                 $imageFileType = strtolower(pathinfo($target_fileimgdir,PATHINFO_EXTENSION));	
        //                 if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_fileimgdir)) {
        //                     //  "The file ". basename( $_FILES["organizationimage"]["name"]). " has been uploaded.";
        //                 } else {
        //                     //  "<alert>";
        //                 }                       
        //                 if(empty($_FILES["image"] ['name']))
        //                 {
        //                     $target_fileimg=$image;
        //                 }


        //                 // print_r($target_fileimgdir);


        //                 $result_faq_update = $this->countriesmodel->updateCountry($countryid,$name,$target_fileimg);
        //                 if ($result_faq_update) {
        //                     echo '<script language="javascript">';
        //                     echo 'alert("Country Updated successfully")';
        //                     echo '</script>';
        //                     $_SESSION["status"]="updated";
        //                     header('Location:CountryLists');
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
        
        // $this->load_view('admin/AddCountry',array('CountryData' => $json_format));
      
    }


    public function addEditData(Request $request)
    {
        $name =strip_tags(request('name'));
        $image = strip_tags(request('image'));
        $imageName="";
        if ($request->hasFile('image')) {
           
            // $filename =request()->image->getClientOrginalName();
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploadsimage'), $imageName);
        }
        else
        {
           if($request->session()->has('imageurl'))
           {
            $imageName=$request->session()->get('imageurl');
           }
           else
           {
            $imageName="No image";   
           }
        }
        $operationadd=$request->session()->has('add2');
        $add=$request->session()->get('add2');
        if ($add == "add2") {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $value = DB::table('countries')->insertGetId(
                ['name' => $name, 'image' => $imageName]
                );
               
            if ($value == true) {
                $request->session()->put('status', "added");                
                $request->session()->put('imageurl', null);
                return redirect('/CountryList');

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
                $inputs = ['name' => $name, 'image' => $imageName];            
                $value = DB::table('countries')->where('id', '=', $request->session()->get('eid'))->update($inputs);  
                $request->session()->put('status', "updated");
                $request->session()->put('imageurl',  null);
                return redirect('/CountryList');
        }
      }
       return view('admin/AddCountry');
    }
}
