<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator, Input, Redirect, Auth;
use App\User;

class AdminController extends Controller {

           // get Dashboard 
           public function getIndex() {
                     return view('admin.views.index');
           }

           // admin user logout
           public function getLogout() {
                     Auth::logout();
                     return redirect('admin/login')->withMessage("You are Logged Out Successfully");;
           }

           // admin user's change password view
           public function getChangepwd() {
                     return view('admin.views.changepwd');
           }

           // admin user's change password
           public function postChangepwd(){

                     $data = Input::all();
                     $id = Auth::user()->id;
                     $change = User::changePassword($id,$data);
                     if($change['wrong']){
                                return back()->with('error',trans('message.EnterCorrectly'));
                     }elseif($change['error']) {
                                return back()->with('error',trans('message.UnabletoChangepassword'));
                     }else{
                                return redirect('admin')->withMessage(trans('message.YourPasswordhasbeenChanged'));
                     }
           }
}