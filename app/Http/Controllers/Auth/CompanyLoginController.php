<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CompanyLoginController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest:company');
    }

    public function showLoginForm()
    {
    	return view('auth.company-login');
    }
    
    public function login(Request $request)
    {
    	//validate the form data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);
    	//attempt to log the user in
    	if(Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
    		//if successful, then redirect to their intended location
    		return redirect()->intended(route('company.dashboard'));
    	}
    	//if unsuccessful, then redirect back to the login with the form data
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
