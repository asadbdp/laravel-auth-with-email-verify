<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;

use App\Mail\RegisterMail;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function registerIndex(){
        if(Auth::check()){
            return redirect()->route('login');
        }
        return view('auth.register');
    }

    public function registerStore(Request $request){
        //create token
        $token = Str::random(64);

        $user = User::create([
            'role_id' => 2,
            'name' => $request->name,
            'email' => $request->email,
            'token' => $token,
            'password' => Hash::make($request->password),
            
        ]);

        $MailContent = ['subject' => 'New User Register', 'name'=>$request->name, 'email'=>$request->email, 'token'=>$token];

        Mail::to($request->email)->send(new RegisterMail($MailContent));

        Auth::login($user, true);

        return redirect()->route('user.dashboard');

    }

    public function emailVerify($token){
        $user = User::where('token', '=', $token)->firstOrFail();
        if($user == true){
            $user->update([
                'email_verified_at'=>Carbon::now()->format('Y-m-d h:i:s')

            ]);

            return redirect()->route('login')->with('success', 'Your E-mail Verified');

        }
        else{
            return redirect()->route('login')->with('error', 'Your E-mail is not Verify');
        }

    }
}
