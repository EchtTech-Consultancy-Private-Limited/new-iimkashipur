<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Support\Str;
use App\Models\password_reset;

class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
        //dd('hello');
         return view('auth.reset-password');
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => ['required','string','email','max:50','exists:users','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
              //'captcha'  => 'required|captcha',
            ]);

          $token = Str::random(64);
          User::where('email', $request->email)->update(['remember_token' => $token]);
          DB::table('password_resets')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now()
            ]);

          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });

          return back()->with('message', 'Kindly check your registered ID for reset the password!!!!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) {
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
        
          $request->validate([
              'email' => ['required','string','email','max:50','exists:users','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
              'password'  => 'required|min:8|max:15|string',
              'passwordconfirmation'  => 'required|same:password',
              //'captcha'  => 'required|captcha',
          ]);

          //dd(base64_decode(strrev($request->password)));
          $updatePassword = DB::table('password_resets')->where(['email' => $request->email,'token' => $request->token ])->first();
          //dd($updatePassword);
          if(!$updatePassword){
              return response()->json(['message' => "Invalid Email ID!!!!",'status'=>201],201);
          }
            $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
           // $data=DB::table('password_resets')->where(['email'=> $request->email])->get('id');
            DB::table('password_resets')->where(['email'=> $request->email])->delete();
            //dd($data[0]->id);
            //$e = password_reset::find($data[0]->id);
            //$data[0]->id->delete();
            return response()->json(['message' => "Your password has been changed!",'status'=>200],200);
          //return redirect('/')->with('success', 'Your password has been changed!');
      }
}
