<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Blogs;
class HomeController extends Controller
{
    //
    public function show()
    {
   
        return view('welcome1');
    }
    public function insertBlog(){
        echo 'insert  method called';
        print_r($_POST);
        
        // return view('welcome1');
     }
     public function getVal($id){
        echo 'show value';
     }

     public function storeDevice(){
 
        $device = new Blogs(); 
        $device->title = request('title');
        $device->category = request('category');
        $device->blogdescription= request('description');
        
        $device->author = request('author');
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $device->image =$imageName;
        $device->save();
        return view('welcome1');
        return redirect('/index');
 
    }
 public function index(){
 
   
        $devices = Blogs::all();
 
        return view('index',compact('devices'));
    }
}
