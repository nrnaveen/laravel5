<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Validator, Input, Redirect, Auth, Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
           use Authenticatable, CanResetPassword;

           /**
           * The database table used by the model.
           *
           * @var string
           */
           protected $table = 'users';

           /**
           * The attributes that are mass assignable.
           *
           * @var array
           */
           protected $fillable = ['first_name', 'last_name', 'email', 'password'];

           /**
           * The attributes excluded from the model's JSON form.
           *
           * @var array
           */
           protected $hidden = ['password', 'remember_token'];

           // Change Password
           public static function changePassword($id,$data) {
                     $rules = array( 'newpassword' => "required|min:8", 'conpassword' => "required|min:8|same:newpassword");
                     $validate = Validator::make($data,$rules);
                     $result = array('error' => true, 'errors' => $validate, 'changed' => false, 'wrong' => false);
                     if(!$validate->fails()) {
                                $result['error'] = false;
                                $user = User::find($id);
                                if(!$user){
                                          $result['wrong'] = true;
                                }else{
                                          $user->update(array('password'=>Hash::make($data['newpassword'])));
                                          $result['changed'] = true;
                                }
                     }
                     return $result;
           }

           // check if login
          public static function Login($role) {
            if(Auth::guest()){
              return false;
            }elseif (Auth::user()->role != $role) {
              return false;
            }else{
              return true;
            }
          }
}
