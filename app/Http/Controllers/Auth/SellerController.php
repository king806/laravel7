<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class SellerController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = "seller/dashbord";

    public function __construct()
    {
        $this->middleware('guest:seller,seller/dashbord')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.seller.login');
    }
    
    protected function guard()
    {
        return Auth::guard("seller");
    }
   
}
