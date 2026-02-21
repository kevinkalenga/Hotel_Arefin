<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function forget_password()
    {
        return view('forget_password');
    }
}
