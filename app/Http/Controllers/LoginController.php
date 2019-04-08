<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Driver;
use App\Models\Helper;
use App\Models\Bus;

class LoginController extends Controller
{
    public function admin_login(Request $request){
      $email=$request->email;
      $password=$request->password;
      $admin_info = DB::table('admin_info')->where('email', $email)->first();
      if ($admin_info === null) {
      	      return redirect()->back()->with('error','Email is not Correct !!');
           }
       elseif($password == $admin_info->password){  
         $request->session()->put('admin_email',$email);
         // return view('admin.index',compact('admin_info'));
          return redirect('admin_home');
         }
         else{ return redirect()->back()->with('error','Password is not Correct !!');}
    }

public function admin_home(Request $request){ 
   $session_email=$request->session()->get('admin_email');
  $admin_info = DB::table('admin_info')->where('email', $session_email)->first();
  $driver = Driver::all();
  $helper = Helper::all();
  $bus = Bus::all();
   return view('admin.index',compact('admin_info','driver','helper','bus'));
}
 public function logout(Request $request){
            $request->session()->flush();
            return redirect('/');
    }
     
}
