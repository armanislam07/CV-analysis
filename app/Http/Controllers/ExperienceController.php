<?php

namespace App\Http\Controllers;

use App\Experience;
use App\UserExpArea;
use Illuminate\Http\Request;
use Auth;

class ExperienceController extends Controller
{
    public function storeExperiences(Request $request)
    {
    	// $this->validate($request,[
    	// 	'comany_name' => 'required',
    	// 	'company_business' => 'required',
    	// 	'designation' => 'required',
    	// 	'company_location' => 'required',
    	// 	'form_experience' => 'required',
    	// 	'area_experiences' => 'required',
    	// 	'responsibilities' => 'required',
    	// 	'experience_keyword' => 'required',
    	// ]);
    	$user_id = Auth::user()->id;
    	// $user_exp = new Experience;
    	$experiences = array(
    		'user_id' => $user_id,
    		'exp_com_name' => $request->company_name,
    		'exp_com_business' => $request->company_business,
    		'exp_com_designation' => $request->designation,
    		'exp_com_department' => $request->department,
    		'exp_com_location' => $request->company_location,
    		'exp_from_date' => \Carbon\Carbon::createFromFormat('d/m/Y H:i A', $request->input('form_experience')),
    		// 'exp_to_date' => \Carbon\Carbon::createFromFormat('d/m/Y H:i A', $request->input('to_experience')),
            'exp_to_date' => $request->input('to_experience'),
    		'exp_com_responsibilities' => $request->responsibilities,
    		// 'exp_area' => $request->area_experiences,
    		'user_exp_keyword' => $request->experience_keyword,
    	);
    	Experience::insert($experiences);

        if ($request->area_experiences > 0) {
                    foreach ($request->area_experiences as $area => $exp) {
                        $data = array(
                            'user_id' => $user_id,
                            'user_exp_area' => $request->area_experiences[$area],
                        );
                        UserExpArea::insert($data);
                    }
                }
    	// echo "<pre>";
    	// print_r($user_id);

    	return redirect()->back()->with('message', 'Experience save successfully');
    }
}
