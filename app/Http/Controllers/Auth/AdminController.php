<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = "admin/dashbord";
    public function __construct()
    {
        $this->middleware('guest:admin,admin/dashbord')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }
    
    protected function guard()
    {
        return Auth::guard("admin");
    }
   
}
