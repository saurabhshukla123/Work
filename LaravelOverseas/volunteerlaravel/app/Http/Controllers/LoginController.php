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
class LoginController extends Controller
{

    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     *
     */

    public function index(Request $request)
    {
        if($request->session()->has('role'))
        {
            $role= $request->session()->get('role');
            if($role=="superadmin")
            {  
                return redirect('/FaqLists'); 
            }
            else if($role=="organization")
            {
                return redirect('/ApplicationLists');
            }
            else
            {
                // return redirect('/Login'); 
            }
        }
        else
        {
            // return redirect('/Login'); 
        }

        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "superadmin") {
                header('Location: OrganizationLists');
            } elseif ($_SESSION["role"] == "organization") {
                header('Location: OrganizationLists');
            } else {

            }
        }
        return view('admin/Login');
    }

    public function loginverify(Request $request){
    $flag=0;
        $error="";
        $encrypt_pwd=request('password');
        $password = md5($encrypt_pwd);
        $emailid=request('username');
        $result=DB::table('users')->select('email','password','role','status','id')
                  
                    ->where([
                        ['email', '=', $emailid],
                        ['password', '=', $password]
                        ])
                    ->get();
        foreach($result as $row)
        {
            $flag=1;                     
            if ($row->status == 1) {
                if ($row->role == "superadmin") {
                   // $_SESSION["id"] = $row->id;
                   $request->session()->put('id', $row->id);
                   $request->session()->put('email', $row->email);
                   
                   $request->session()->put('role', $row->role);
                    $error="true";
                    return redirect('/FaqLists');
                } else if ($row->role == "organization") {
                   // $_SESSION["id"] = $row->id;
                   $request->session()->put('id', $row->id);
                   $request->session()->put('email', $row->email);
                   
                   $request->session()->put('role', $row->role);
                    $error="true";
                    return redirect('/ApplicationLists');
                   
                } else {

                }
            }
            else if($row->status == 0) {
                $error_invalid = "Sorry you are not Active user";
                $error=$error_invalid;
            }
        }

        if($flag==0)
        {
            $error="Invalid Username or Password";
            

        }
        else
        {

        }
    //  $error="sdsd";
    
        return view('admin/Login',compact('error'));
    //    / return view('index',compact('error'));
        }  


    public function loginverify1()
    {   
       // $this->load_model("LoginModel");
        echo "hello";
        die();
        // $error_pwd = "";
        // $error_username = "";
        // $error_invalid = "";
        // $error=array();
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $username = $_POST['username'];
        //     $encrypt_pwd = $_POST['password'];
        //     $password = md5($encrypt_pwd);

        //     if (empty($username)) {
        //         $error_username = "Username is required";
        //         $error["username"]=$error_username;
        //     } else {
        //         $error_username = "";
        //         $error["username"]=$error_username;
        //     }

        //     if (empty($encrypt_pwd)) {
        //         $error_pwd = "Password is required";
        //         $error["password"]=$error_pwd;

        //     } else {
        //         $error_pwd = "";
        //         $error["password"]=$error_pwd;

        //     }
        //     if ($error_username == "" && $error_pwd == "") {

        //         $result=array();              
        //         $result['result_data'] = $this->loginmodel->validate($username, $password);  
        //         $json_format = json_encode($result); 
        //         $result = json_decode($json_format);           
        //         $flag=0;            
        //             foreach ($result->result_data as $row ) {
        //                 $flag=1;                     
        //                  if ($row->status == 1) {
        //                     if ($row->role == "superadmin") {
        //                         $_SESSION["id"] = $row->id;
        //                         $_SESSION["email"] = $row->email;
        //                         $_SESSION["role"] = $row->role;
        //                         $error['valid']="true";
        //                     } else if ($row->role == "organization") {
        //                         $_SESSION["id"] = $row->id;
        //                         $_SESSION["email"] = $row->email;
        //                         $_SESSION["role"] = $row->role;
        //                         $error['valid']="true";
        //                     } else {

        //                     }
        //                 }
        //                  else if($row->status == 0) {
        //                     $error_invalid = "Sorry you are not Active user";
        //                     $error["invalid"]=$error_invalid;
        //                 }
        //                 else
        //                 {
        //                     $error_invalid = "Invalid username or password";
        //                     $error["invalid_userandpwd"]=$error_invalid;
        //                 }

        //             }

        //             if($flag!=1)
        //             {
        //             $error_invalid = "Invalid username or password";
        //             $error["invalid_userandpwd"]=$error_invalid;
        //             }
        //             else
        //             { $error_invalid = "";
        //                 $error["invalid_userandpwd"]=$error_invalid;

        //             }

        //     }

        // }
        // $json_format = json_encode($error);
        // echo $json_format;

    
    }

}
