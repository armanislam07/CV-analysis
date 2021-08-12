<?php

namespace App\Http\Controllers;

use App\UserPersonalinfo;
use App\UserCareerInfo;
use App\Education;
use App\Experience;
use App\Training;
use App\Proquality;
use App\Language;
use App\Reference;
use Illuminate\Http\Request;
use Auth;
use DB;
use PDF;

class UserPersonalinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cv()
    {
        $userId = Auth::user()->id;
        $resumes = DB::table('users')
                    ->join('user_personalinfos', 'users.id', '=', 'user_personalinfos.user_id')
                    ->join('user_career_infos', 'users.id', '=', 'user_career_infos.user_id')                    
                    ->select('users.name','users.avatar', 'user_personalinfos.*', 'user_career_infos.*')
                    ->where('users.id', '=', $userId)
                    ->get();
        $educations = Education::where('user_id', '=', $userId)->get();
        $experiences = Experience::where('user_id', '=', $userId)->get();
        $training = Training::where('user_id', '=', $userId)->get();
        $proquality = Proquality::where('user_id', '=', $userId)->get();
        $languages = Language::where('user_id', '=', $userId)->get();
        $references = Reference::where('user_id', '=', $userId)->get();
        //dd($education);
        return view('users.cv', compact('resumes', 'educations','experiences','training','proquality','languages','references'));
    }
    
    public function cvedit()
    {
        $userId = Auth::user()->id;
        $userPersonnel = UserPersonalinfo::where('user_id', '=', $userId)->get();
        $userCareer = UserCareerInfo::where('user_id', '=', $userId)->get();
        $userEducation = Education::select('*')->where('user_id', '=', $userId)->get();
        $userTraining = Training::select('*')->where('user_id', '=', $userId)->get();
        $userProfessional = Proquality::select('*')->where('user_id', '=', $userId)->get();
        $userLanguage = Language::select('*')->where('user_id', '=', $userId)->get();
        //echo $userPersonnel; 
        return view('users.editCV', compact('userPersonnel', $userPersonnel, 'userCareer', $userCareer, 'userEducation', $userEducation, 'userTraining', $userTraining, 'userProfessional', $userProfessional,'userLanguage',$userLanguage));
    }
    public function cveditstore(Request $request, $id)
    {
        
            $this->validate($request,[                
                'email' => 'email',                
            ]);

        $userResume = UserPersonalinfo::find($id);
        $userResume->first_name = $request->input('first_name');
        $userResume->last_name = $request->input('last_name');
        $userResume->last_name = $request->input('last_name');
        $userResume->father_name = $request->input('fathers_name');
        $userResume->mother_name = $request->input('mothers_name');
        $userResume->dob = $request->input('date_of_birth');
        $userResume->gender = $request->input('gender');
        $userResume->religion = $request->input('religion');
        $userResume->marital_status = $request->input('marital_status');
        $userResume->nationality = $request->input('nationality');
        $userResume->user_email = $request->input('email');
        $userResume->user_email2 = $request->input('email2');
        $userResume->nid_no = $request->input('national_ID');
        $userResume->mobile_number = $request->input('mobile_number');
        $userResume->mobile_number2 = $request->input('mobile_number2');
        $userResume->save();
        // echo "<pre>";
        // print_r($userResume);
        return redirect()->route('view.cv')->with('message', 'Your resume update successfully');
    }
    public function cvaddresseditstore(Request $request, $id)
    {        
        $this->validate($request,[
            'paresent_address' => 'max:150',
            'parmanent_address' => 'max:150',  
        ]);

        $userResume = UserPersonalinfo::find($id);
        
        $userResume->paresent_address = $request->input('paresent_address');
        $userResume->parmanent_address = $request->input('parmanent_address');
        $userResume->save();
        // echo "<pre>";
        // print_r($userResume);
        return redirect()->route('view.cv')->with('message', 'Your resume update successfully');
    }
    public function careerInfo(Request $request, $id)
    {
        $this->validate($request,[
            'objective' => 'max:250', 
        ]);

        $userId = Auth::user()->id;
        $userResume = UserCareerInfo::find($id);
        $userResume->objective = $request->input('objective');
        $userResume->present_salary = $request->input('present_salary');
        $userResume->expected_salary = $request->input('expected_salary');
        $userResume->job_lavel = $request->input('job_lavel');
        $userResume->career_summary = $request->input('career_summary');
        $userResume->special_quality = $request->input('special_quality');
        $userResume->save();
        // echo $userId;
        return redirect()->back()->with('message', 'Career information update successfully');
    }
    public function education(Request $request)
    {
        $this->validate($request,[
            'objective' => 'max:250', 
        ]);
        $userId = Auth::user()->id;
        $education = new Education;
        $education->user_id = $userId;
        $education->exam_title = $request->input('exam_title');
        $education->education_type = $request->input('education_type');
        $education->subject = $request->input('subject');
        $education->institute = $request->input('institute');
        $education->board = $request->input('board');
        $education->result = $request->input('result');
        $education->pass_year = $request->input('pass_year');
        $education->duration = $request->input('duration');
        $education->save();
        // echo $education;
        return redirect()->back()->with('message', 'Education save successfully');

    }
    public function educationEditShow($id)
    {
        $eduShow = Education::find($id);

        dd($eduShow);
        // echo $eduShow;
    }
    public function educationEdit(Request $request, $id)
    {
        $this->validate($request,[
            'objective' => 'max:250', 
        ]);
        $education = Education::find($id);
        $education->exam_title = $request->input('exam_title');
        // $education->education_type = $request->input('education_type');
        $education->subject = $request->input('subject');
        $education->institute = $request->input('institute');
        $education->board = $request->input('board');
        $education->result = $request->input('result');
        $education->pass_year = $request->input('pass_year');
        $education->duration = $request->input('duration');
        $education->save();
        // echo $education;
        return redirect()->back()->with('message', 'Education Update successfully');

    }
    public function training(Request $request)
    {
        
        $userId = Auth::user()->id;
        $training = new Training;
        $training->user_id = $userId;
        $training->traning_title = $request->input('traning_title');
        $training->topic = $request->input('topic');
        $training->institute = $request->input('institute');
        $training->country = $request->input('country');
        $training->location = $request->input('location');
        $training->pass_year = $request->input('pass_year');
        $training->duration = $request->input('duration');
        $training->save();
        // echo $training;
        return redirect()->back()->with('message', 'Training save successfully');

    }
    public function trainingEditShow($id)
    {
        $traShow = Training::find($id);

        dd($traShow);
        // echo $eduShow;
    }
    public function trainingEdit(Request $request, $id)
    {
        
        $training = Training::find($id);
        $training->traning_title = $request->input('traning_title');
        $training->topic = $request->input('topic');
        $training->institute = $request->input('institute');
        $training->country = $request->input('country');
        $training->location = $request->input('location');
        $training->pass_year = $request->input('pass_year');
        $training->duration = $request->input('duration');
        $training->save();
        // echo $education;
        return redirect()->back()->with('message', 'Training Update successfully');

    }
    public function proquality(Request $request)
    {
        
        $userId = Auth::user()->id;
        $proquality = new Proquality;
        $proquality->user_id = $userId;
        $proquality->certificat = $request->input('certificat');
        $proquality->institute = $request->input('institute');
        $proquality->location = $request->input('location');
        $proquality->pass_year = $request->input('pass_year');
        $proquality->duration = $request->input('duration');
        $proquality->save();
        // echo $training;
        return redirect()->back()->with('message', 'Profactional Qualification save successfully');

    }
    public function proqualityEditShow($id)
    {
        $proShow = Proquality::find($id);

        dd($proShow);
        // echo $eduShow;
    }
    public function proqualityEdit(Request $request, $id)
    {
        
        $proquality = Proquality::find($id);
        $proquality->certificat = $request->input('certificat');
        $proquality->institute = $request->input('institute');
        $proquality->location = $request->input('location');
        $proquality->pass_year = $request->input('pass_year');
        $proquality->duration = $request->input('duration');
        $proquality->save();
        // echo $education;
        return redirect()->back()->with('message', 'Profactional Qualification Update successfully');

    }
    public function language(Request $request)
    {
        
        $userId = Auth::user()->id;
        $language = new Language;
        $language->user_id = $userId;
        $language->language = $request->input('language');
        $language->reading = $request->input('reading');
        $language->writing = $request->input('writing');
        $language->speaking = $request->input('speaking');
        $language->save();
        // echo $training;
        return redirect()->back()->with('message', 'Language Proficiency save successfully');

    }
    public function languageEditShow($id)
    {
        $lanShow = Language::find($id);

        dd($lanShow);
        // echo $eduShow;
    }
    public function languageEdit(Request $request, $id)
    {
        
        $language = Language::find($id);
        $language->language = $request->input('language');
        $language->reading = $request->input('reading');
        $language->writing = $request->input('writing');
        $language->speaking = $request->input('speaking');
        $language->save();
        // echo $education;
        return redirect()->back()->with('message', 'Language Proficiency Update successfully');

    }
    public function reference(Request $request)
    {
        
        $userId = Auth::user()->id;
        $reference = new Reference;
        $reference->user_id = $userId;
        $reference->name = $request->input('name');
        $reference->organization = $request->input('organization');
        $reference->designation = $request->input('designation');
        $reference->mobile = $request->input('mobile');
        $reference->email = $request->input('email');
        $reference->relation = $request->input('relation');
        $reference->save();
        // echo $reference;
        return redirect()->back()->with('message', 'Reference save successfully');

    }

    public function userPersonalinfo(Request $request)
    {
        $userId = Auth::user()->id;
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'nationality' => 'required',
            'national_ID' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'mobile_number' => 'required',
            'date_of_birth' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
        ]);
        $personalinfo = new UserPersonalinfo;
        $personalinfo->user_id = $userId;
        $personalinfo->first_name = $request->input('first_name');
        $personalinfo->last_name = $request->input('last_name');
        $personalinfo->last_name = $request->input('last_name');
        $personalinfo->father_name = $request->input('fathers_name');
        $personalinfo->mother_name = $request->input('mothers_name');
        $personalinfo->dob = $request->input('date_of_birth');
        $personalinfo->gender = $request->input('gender');
        $personalinfo->religion = $request->input('religion');
        $personalinfo->marital_status = $request->input('marital_status');
        $personalinfo->nationality = $request->input('nationality');
        $personalinfo->user_email = $request->input('email');
        $personalinfo->user_email2 = $request->input('email2');
        $personalinfo->nid_no = $request->input('national_ID');
        $personalinfo->mobile_number = $request->input('mobile_number');
        $personalinfo->mobile_number2 = $request->input('mobile_number2');
        $personalinfo->save();
        // echo "<pre>";
        // print_r($personalinfo);
        return redirect()->back();
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\userPersonalinfo  $userPersonalinfo
     * @return \Illuminate\Http\Response
     */
    public function show(userPersonalinfo $userPersonalinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\userPersonalinfo  $userPersonalinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(userPersonalinfo $userPersonalinfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\userPersonalinfo  $userPersonalinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userPersonalinfo $userPersonalinfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userPersonalinfo  $userPersonalinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(userPersonalinfo $userPersonalinfo)
    {
        //
    }
}
