<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\PasswordReset;
use Input;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller {
           /*
           |--------------------------------------------------------------------------
           | Password Reset Controller
           |--------------------------------------------------------------------------
           |
           | This controller is responsible for handling password reset requests
           | and uses a simple trait to include this behavior. You're free to
           | explore this trait and override any methods you wish to tweak.
           |
           */

           // use ResetsPasswords;
           
           /**
           * Create a new password controller instance.
           *
           * @return void
           */
           public function __construct() {
                     $this->middleware('guest');
           }
           public function getEmail() {
                     return view('auth.password');
           }

           /**
           * Send a reset link to the given user.
           *
           * @param  \Illuminate\Http\Request  $request
           * @return \Illuminate\Http\Response
           */
           public function postEmail(Request $request) {
                     $this->validate($request, ['email' => 'required|email']);
                     $response = Password::sendResetLink($request->only('email'), function (Message $message) {
                                $message->subject($this->getEmailSubject());
                     });
                     switch ($response) {
                                case Password::RESET_LINK_SENT:
                                          return redirect()->back()->with('status', trans($response));
                                case Password::INVALID_USER:
                                          return redirect()->back()->withErrors(['email' => trans($response)]);
                     }
           }

           /**
           * Get the e-mail subject line to be used for the reset link email.
           *
           * @return string
           */

           protected function getEmailSubject() {
                     return isset($this->subject) ? $this->subject : 'Your Password Reset Link';
           }

           /**
           * Display the password reset view for the given token.
           *
           * @param  string  $token
           * @return \Illuminate\Http\Response
           */

           public function getReset($token = null) {
                     if(is_null($token)) {
                                throw new NotFoundHttpException;
                     }
                     $data = PasswordReset::where("token", '=', $token)->first();
                     if(!$data) {
                                return redirect("password/email")->withError("This password reset token is invalid.");
                     }
                     return view('auth.reset')->with('token', $token);
           }

           /**
           * Reset the given user's password.
           *
           * @param  \Illuminate\Http\Request  $request
           * @return \Illuminate\Http\Response
           */

           public function postReset(Request $request) {
                     $token = Input::get('token');
                     if(is_null($token)) {
                                throw new NotFoundHttpException;
                     }
                     $row = PasswordReset::where("token", '=', $token)->first();
                     if(!$row) {
                                return redirect("password/email")->withError("This password reset token is invalid.");
                     }
                     $request->offsetSet("email", $row->email);
                     $this->validate($request, [
                                'token' => 'required',
                                'email' => 'required|email',
                                'password' => 'required|confirmed|min:6',
                     ]);
                     $credentials = $request->only('email', 'password', 'password_confirmation', 'token');
                     $response = Password::reset($credentials, function ($user, $password) {
                                $this->resetPassword($user, $password);
                     });
                     switch ($response) {
                                case Password::PASSWORD_RESET:
                                          return redirect($this->redirectPath())->withMessage("Your Password has been Successfully Changed");
                                default:
                                          return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => trans($response)]);
                     }
           }

           /**
           * Reset the given user's password.
           *
           * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
           * @param  string  $password
           * @return void
           */

           protected function resetPassword($user, $password) {
                     $user->password = bcrypt($password);
                     $user->save();
           }

           /**
           * Get the post register / login redirect path.
           *
           * @return string
           */

           public function redirectPath() {
                     if (property_exists($this, 'redirectPath')) {
                                return $this->redirectPath;
                     }
                     return property_exists($this, 'redirectTo') ? $this->redirectTo : '/auth/login';
           }
}