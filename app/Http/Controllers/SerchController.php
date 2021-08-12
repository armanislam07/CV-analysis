<?php

namespace App\Http\Controllers;

use App\JobCircular;
use Illuminate\Http\Request;
use DB;

class SerchController extends Controller
{
    public function fontPageSerch(Request $request)
    {
    	$keyword = $request->keyword;    	
    	$city = $request->city;
    	$categories = $request->categories;

	    if ($keyword == true && $city == true && $categories == true) {
	    	if (condition) {
	    		$jobs = DB::table('job_circulars')
	    				->join('com_profiles', 'job_circulars.com_id', '=', 'com_profiles.com_id')
	    				->select('job_circulars.*', 'com_profiles.com_name', 'com_profiles.com_logo')
	    				->where('job_circulars.job_title', 'LIKE', "%{$keyword}%")
	    				->orwhere('job_circulars.education_requirements', 'LIKE', "%{$keyword}%")
	    				->orwhere('com_profiles.com_name', 'LIKE', "%{$keyword}%")
	    				->where('job_circulars.job_area', '=', $city)
	    				// ->where('job_circulars.job_categories', '=', $categories)	    				
	    				->get();
	    		return view('categories', compact('jobs'));
	    	}else{
	    		return view('categories')->with('error', 'This word can not find!');
	    	}
	    }
	    elseif ($keyword == true && $city == true) {
	    	if ($keyword == true && $city == true) {
	    		$jobs = DB::table('job_circulars')
	    				->join('com_profiles', 'job_circulars.com_id', '=', 'com_profiles.com_id')
	    				->select('job_circulars.*', 'com_profiles.com_name', 'com_profiles.com_logo')
	    				->where('job_circulars.job_area', '=', $city)
	    				->where('job_circulars.job_title', 'LIKE', "%{$keyword}%")
	    				->orwhere('job_circulars.education_requirements', 'LIKE', "%{$keyword}%")
	    				->orwhere('com_profiles.com_name', 'LIKE', "%{$keyword}%")
	    					    				
	    				->get();
	    		return view('categories', compact('jobs'));
	    	}else{
	    		return view('categories')->with('error', 'This word can not find!');
	    	}
	    }
	    elseif ($keyword == true && $categories == true) {
	    	if ($keyword == true && $categories == true) {
	    		$jobs = DB::table('job_circulars')
	    				->join('com_profiles', 'job_circulars.com_id', '=', 'com_profiles.com_id')
	    				->select('job_circulars.*', 'com_profiles.com_name', 'com_profiles.com_logo')
	    				->where('job_circulars.job_title', 'LIKE', "%{$keyword}%")
	    				->orwhere('job_circulars.education_requirements', 'LIKE', "%{$keyword}%")
	    				->orwhere('com_profiles.com_name', 'LIKE', "%{$keyword}%")
	    				// ->where('job_circulars.job_categories', '=', $categories)	    				
	    				->get();
	    		return view('categories', compact('jobs'));
	    	}else{
	    		return view('categories')->with('error', 'This word can not find!');
	    	}
	    }elseif ($city == true) {
	    	if ($city == true) {
	    		$jobs = DB::table('job_circulars')
	    				->join('com_profiles', 'job_circulars.com_id', '=', 'com_profiles.com_id')
	    				->select('job_circulars.*', 'com_profiles.com_name', 'com_profiles.com_logo')
	    				->where('job_circulars.job_area', '=', $city)	    				
	    				->get();
	    		return view('categories', compact('jobs'));
	    	}else{
	    		return view('categories')->with('error', 'This word can not find!');
	    	}
	    }elseif ($keyword == true) {
	    	if ($keyword == true) {
	    		$jobs = DB::table('job_circulars')
	    				->join('com_profiles', 'job_circulars.com_id', '=', 'com_profiles.com_id')
	    				->select('job_circulars.*', 'com_profiles.com_name', 'com_profiles.com_logo')
	    				->where('job_circulars.job_title', 'LIKE', "%{$keyword}%")
	    				->orwhere('job_circulars.education_requirements', 'LIKE', "%{$keyword}%")
	    				->orwhere('com_profiles.com_name', 'LIKE', "%{$keyword}%")
	    				->get();
	    		return view('categories', compact('jobs'));
	    	}else{
	    		return view('categories')->with('error', 'This word can not find!');
	    	}
	    	
	    }
	    else{
	    	return redirect()->back();
	    }
	    
	    
    }
}
