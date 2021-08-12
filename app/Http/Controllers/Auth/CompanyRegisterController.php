<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class CompanyRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/comany';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:company');
    }

    public function companyRegisterForm()
    {
        return view('auth.companyRegister');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function registerCompany(Request $request)
    {
        $this->Validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        
        // $companyReg = new Organize;
        // $companyReg->name = $request->input('name');
        // $companyReg->email = $request->input('email');
        // $companyReg->job_title = $request->input('usertype');
        // $companyReg->password = $request->input(Hash::make($request['password']));

        // $companyReg->save();

        // return redirect()->route('company.login');

        $company = Company::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('company.login')->with('message', 'Registration Successfully ! Please login !');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return Company::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'job_title' => $data['usertype'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
