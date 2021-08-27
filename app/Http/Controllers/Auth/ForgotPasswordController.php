<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
// use DB; 
// use Carbon\Carbon; 
// use Mail; 

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
//     public function getEmail()
//   {

//      return view('customauth.passwords.email');
//   }

//  public function postEmail(Request $request)
//   {
//     $request->validate([
//         'email' => 'required|email|exists:users',
//     ]);

//     $token = str_random(64);

//       DB::table('password_resets')->insert(
//           ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
//       );

//       Mail::send('customauth.verify', ['token' => $token], function($message) use($request){
//           $message->to($request->email);
//           $message->subject('Reset Password Notification');
//       });

//       return back()->with('message', 'We have e-mailed your password reset link!');
//   }
   

    use SendsPasswordResetEmails;
}
