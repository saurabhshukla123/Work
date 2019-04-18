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
class LogoutController extends Controller {
 
    /**
     * @author Tatvasoft
     * Default method of Home controller and load header,main content,footer view.
     * 	 
     */

    public function index(Request $request) { 
        // session_destroy();
        request()->session()->flush();
        return redirect('/Login');
    }
}
?>