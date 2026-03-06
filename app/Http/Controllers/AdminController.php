<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\Admin;
use Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    
     /* -------------------- Soummision de formulaire lors de l'inscription -------------------- */
    public function login_submit(Request $request)
    {
       $credentials = [
          'email' => $request->email,
          'password' => $request->password,
        
        ];
        
        // if the credential match
        if(Auth::guard('admin')->attempt($credentials)) {
             return redirect()->route('admin_dashboard');
        } else {
            return redirect()->route('admin_login');
        }

    }

    /* -------------------- Deconnexion -------------------- */
    public function logout() 
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin_login');
    }
    
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function settings()
    {
        return view('admin.settings');
    }

    
}
