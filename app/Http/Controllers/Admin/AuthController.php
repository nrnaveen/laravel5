<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator, Input, Redirect, Auth;

class AuthController extends Controller {
           public function getIndex() {
                     return view('admin.views.login');
           }
           public function postIndex() {
                     $data = Input::all();
                     $rules = array( 'email' => 'required|email', 'password' => "required|min:8");
                     $validate = Validator::make($data,$rules);
                     if($validate->fails()) {
                                return back()->withErrors($validate)->withInput();
                     }
                     if (Auth::attempt(array('email' => $data['email'], 'password' => $data['password'], 'role' => 'admin'))) {
                                return redirect("admin")->withMessage("You are Logged In Successfully");
                     }
                     return back()->withError("Please Check Email or Password")->withInput();
           }
}