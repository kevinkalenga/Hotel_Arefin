<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Mail\Websitemail;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function login()
    {
        return view('login');
    }
    public function registration()
    {
        return view('registration');
    }
    
    public function registration_submit(Request $request)
    {
        //echo $request->name;
        
        $token = hash('sha256', time());
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'Pending';
        $user->token = $token;
        $user->save();
        $verification_link = url('registration/verify/'.$token.'/'.$request->email);

        // Send email
        $subject = 'Registration Verification';
        $message  = 'Please click on the link below to confirm the registration process: <br>';
        $message .= '<a href="'.$verification_link.'">';
        $message .= $verification_link;
        $message .= '</a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        echo 'Email is sent';


    }

    public function registration_verify()
    {

    }
    
    
    public function forget_password()
    {
        return view('forget_password');
    }


}
