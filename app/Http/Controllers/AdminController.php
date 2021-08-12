<?php

namespace App\Http\Controllers;

use App\AdminCat;
use App\AdminDiv;
use Illuminate\Http\Request;
use App\User;
use App\comProfile;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }
    public function allusers()
    {
        $allusers = User::select('*')->get();
        return view('admin.allusers', compact('allusers',$allusers));
    }
    public function allcomps()
    {
        $allcomps = comProfile::select('*')->get();
        return view('admin.allcomps', compact('allcomps',$allcomps));
    }
    public function categories()
    {
        $categories = AdminCat::select('categories')->get();
        $divisions = AdminDiv::select('division')->get();
        return view('admin.categories', compact('categories',$categories, 'divisions', $divisions));
        // echo "<pre>";
        // print_r($admincat);
        
    }
    public function categoriesAdd(Request $request)
    {
        $adminId = Auth::guard('admin')->user()->id;
        
        $categories = new AdminCat;
        $categories->categories = $request->input('categorie');
        $categories->save();
        return redirect()->back();
        
    }
    public function divisionAdd(Request $request)
    {
        $adminId = Auth::guard('admin')->user()->id;
        
        $divisions = new AdminDiv;
        $divisions->division = $request->input('division');
        $divisions->save();
        return redirect()->back();
        // echo "Division";
        // print_r($divisions);
        
    }
    
    
    
    
}
