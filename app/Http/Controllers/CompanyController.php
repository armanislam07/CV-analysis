<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\comProfile;
use App\JobCircular;
use App\JobResponsibilitie;
use App\JobExperienceArea;
use App\JobRequirement;
use App\JobOtherBenefit;
use App\Applyer;

use DB;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    public function test()
    {

        return view('test');
        //echo $deadline;
        
    }
    public function testshow(Request $request)
    {
         $request->job_responsibilities;
         $request->name;
        echo "<pre>";
        dd($request);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        // $profile = Auth::guard('company')->check();
        // $profileId = Auth::guard('company')->user()->id;
        if(Auth::guard('company')->check()){
            $profileId = Auth::guard('company')->user()->id;
            $checkcompany = DB::table('com_profiles')
                            ->select('com_id')
                            ->where('com_id', '=', $profileId)
                            ->get();
            if(! $checkcompany == $profileId){
                $updateProfile .= '<a class="btn btn-primay">Update your Company Profile</a>';
                echo $updateProfile;
                //return view('company.index', compact('updateProfile'));
            }else{
            $profileView = DB::table('com_profiles')
                            ->select('*')
                            ->where('com_id', '=', $profileId)
                            ->get();
            $countProfile = comProfile::where('com_id', '=', $profileId)->get()->count();
            $updateProfile = '';
            if($countProfile == null){
                $updateProfile = '<p></p><center><button value="submit" class="btn btn-primay" style="background-color: green; color: white;">Update your profile</button></center><p></p>';
                // return view('company.index')->with('updateProfile', $updateProfile); 
            }
            $date = Carbon::now()->format('m-d-y');
            
                $circulars = JobCircular::where('com_id', '=', $profileId)
                                        ->where('job_deadline', '>', $date)
                                        ->get(); 
                $total_apply = DB::table('job_circulars')
                                ->join('applyers','job_circulars.id','=','applyers.circular_id')
                                ->select('job_circulars.job_title','job_circulars.vacancy')
                                ->where('applyers.com_id','=',$profileId)
                                ->get();  

            
            return view('company.index')->with('profileView', $profileView)->with('updateProfile', $updateProfile)->with('circulars', $circulars)->with('total_apply', $total_apply);
            }          
        }
        
    }
    public function JobCircular()
    {
        return view('company.circular');
    }
    public function JobCircularPost(Request $request)
    {
        
        if(Auth::guard('company')->check()){
            $profileId = Auth::guard('company')->user()->id;
            $companyName = comProfile::select('com_name')->where('com_id', '=', $profileId)->get()->count();
            if($companyName == null){
                return redirect()->back()->with('error', 'Please update Company profile first');
            }else{                
                $this->validate($request,[
                'job_title' => 'required',
                'vacancy' => 'required',
                'job_context' => 'required',
                'job_responsibilities' => 'required',
                'additional_requirements' => 'required',
                'other_benefits' => 'required',
                'employment_status' => 'required',
                'educational_requirements' => 'required',
                'experience' => 'required',                
                'experience_keyword' => 'required',
                'experience_area' => 'required',
                'application_deadline' => 'required',
                'salary' => 'required',
                'job_localtion_area' => 'required',
                'accepted_percentage' => 'required',
                ]);
                
                $circular = new JobCircular;
                $circular->com_id = $profileId;
                $circular->job_title = $request->input('job_title');
                $circular->vacancy = $request->input('vacancy');
                $circular->job_context = $request->input('job_context');
                
                $circular->employment_status = $request->input('employment_status');
                $circular->education_requirements = $request->input('educational_requirements');
                $circular->experience = $request->input('experience');
                $circular->job_exp_keyword = $request->input('experience_keyword');
                $circular->salary = $request->input('salary');
                $circular->accepted_parcent = $request->input('accepted_percentage');
                $circular->job_area = $request->input('job_localtion_area');
                $circular->job_deadline = $request->application_deadline;
                $circular->job_catagories = $request->job_catagories;
                $circular->save();
                // $responsibilities = new JobResponsibilitie;
                if($request->job_responsibilities > 0)
                {
                    foreach ($request->job_responsibilities as $responsibilities => $r) {
                        $data1=array(
                            'com_id' => $profileId,
                            'circuler_id' => $circular->id,
                            'responsibilities' => $request->job_responsibilities[$responsibilities],
                        );
                        JobResponsibilitie::insert($data1);
                    }
                    
                }                
                if($request->experience_area > 0){
                    foreach ($request->experience_area as $exp_area => $area) {
                        $data2 = array(
                            'com_id' => $profileId,
                            'circuler_id' => $circular->id,
                            'job_exp_area' => $request->experience_area[$exp_area],
                        );
                        JobExperienceArea::insert($data2);
                    }
                }
                if ($request->additional_requirements > 0) {
                    foreach ($request->additional_requirements as $addi_requirement => $addi) {
                        $data3 = array(
                            'com_id' => $profileId,
                            'circuler_id' => $circular->id,
                            'requirements' => $request->additional_requirements[$addi_requirement],
                        );
                        JobRequirement::insert($data3);
                    }
                }
                if ($request->other_benefits > 0) {
                    foreach ($request->other_benefits as $benefits => $other) {
                        $data4 = array(
                            'com_id' => $profileId,
                            'circuler_id' => $circular->id,
                            'other_benefits' => $request->other_benefits[$benefits],
                        );
                    }
                    JobOtherBenefit::insert($data4);
                }
                // dd($responsibilities,$additonal, $experience_area);
                return redirect()->back()->with('message', 'Your Company circular is posted successfully');
            }
            
            
            
        }
        // echo $companyName;
        
    }
    public function JobCircularView()
    {
        if(Auth::guard('company')->check()){
            $profileId = Auth::guard('company')->user()->id;
            
            $circulars = JobCircular::where('com_id', '=', $profileId)->get();
            
            return view('company.circularView')->with('circulars', $circulars);
        } 
        
    }
    public function ApplyCircular($id)
    {
        if(Auth::guard('company')->check()){
            $profileId = Auth::guard('company')->user()->id;
            $total_apply = Applyer::where('com_id','=',$profileId)
                                    // ->where('circular_id','=',$id)
                                    ->get();

            echo "<pre>";
            print_r($total_apply);
            $circulars = JobCircular::where('com_id', '=', $profileId)->get();
            
            // return view('company.allapplyed')->with('circulars', $circulars);
        }
    }
    public function SortedCV()
    {
        if(Auth::guard('company')->check()){
            $profileId = Auth::guard('company')->user()->id;
            
            $circulars = JobCircular::where('com_id', '=', $profileId)->get();
            
            return view('company.sortedcv')->with('circulars', $circulars);
        }
    }
    public function UnsortedCV()
    {
        if(Auth::guard('company')->check()){
            $profileId = Auth::guard('company')->user()->id;
            
            $circulars = JobCircular::where('com_id', '=', $profileId)->get();
            
            return view('company.unsortedcv')->with('circulars', $circulars);
        }
    }
    public function companyProfile()
    {
        
        return view('company.create');
    }
    public function viewCompanyProfile()
    {
        // $profile = Auth::guard('company')->check();
        
        if(Auth::guard('company')->check()){
            $profileId = Auth::guard('company')->user()->id;
            $profileView = DB::table('com_profiles')
                            ->select('*')
                            ->where('com_id', '=', $profileId)
                            ->get();
            // echo $profileView;
            $countProfile = comProfile::where('com_id', '=', $profileId)->get()->count();
            $updateProfile = '';
            if($countProfile == null){
                $updateProfile = '<p></p><center><button value="submit" class="btn btn-primay" style="background-color: green; color: white;">Update your profile</button></center><p></p>';
                // return view('company.index')->with('updateProfile', $updateProfile); 
            }
            $date = Carbon::now()->format('m-d-y');
            $circulars = JobCircular::where('com_id', '=', $profileId)
                                        ->where('job_deadline', '>', $date)
                                        ->get();            
            
            return view('company.index')->with('profileView', $profileView)->with('updateProfile', $updateProfile)->with('circulars', $circulars);
            // echo $updateProfile;
        }

    }
    public function editviewCompanyProfile($id)
    {
        $profile_edit = comProfile::find($id)->get();
        return view('company.edit', compact('profile_edit'));
        // return $profile_edit;
    }

    public function editCompanyProfile(Request $request, $id)
    {
        $profileView = comProfile::find($id);
        if($request->file('company_logo')){
                
                $logo = $request->file('company_logo');
                //$new_name = rand() . '.'.$image->getClientOriginalName();
                $logo_name = $logo->getClientOriginalName();
                $filename = $logo->move(public_path("images/company_logo"), $logo_name);
                $profileView->com_logo = $logo_name;
                
            }
        
        $profileView->com_name = $request->input('company_name');
        // $profileView->com_logo = $logo_name;
        $profileView->com_cont_Pname = $request->input('person_name');
        $profileView->com_cont_Pmobile = $request->input('person_number');
        $profileView->com_email = $request->input('company_email');
        $profileView->com_number = $request->input('company_phone');
        $profileView->com_service = $request->input('service_type');
        $profileView->com_Haddress = $request->input('address');
        $profileView->com_sub_address = $request->input('sub_office_address');

        $profileView->save();
        return redirect()->back();
        // return $profileView;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        // return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $check = Auth::guard('company')->check();
        if (Auth::guard('company')->check())
        {            
            $this->validate($request, [
                'company_name' => 'required|string',
                'company_logo' => 'image|mimes:jpg,jpeg,png',                
                'person_name' => 'required|string',
                'person_number' => 'required|digits:11',
                'company_email' => 'required|email',
                'company_phone' => 'required|numeric',
                'service_type' => 'required',
                'address' => 'required',                                
            ]);
            
            if($request->file('company_logo')){
                
                $logo = $request->file('company_logo');
                //$new_name = rand() . '.'.$image->getClientOriginalName();
                $logo_name = $logo->getClientOriginalName();
                $filename = $logo->move(public_path("images/company_logo"), $logo_name);
            }
            $companyId = Auth::guard('company')->user()->id;
            $checkId = comProfile::select('com_id')->where('com_id', '=', $companyId)->first();
            if($checkId == null){
                $profile = new comProfile;
                $profile->com_id = $companyId;
                $profile->com_name = $request->input('company_name');
                $profile->com_logo = $logo_name;
                $profile->com_cont_Pname = $request->input('person_name');
                $profile->com_cont_Pmobile = $request->input('person_number');
                $profile->com_email = $request->input('company_email');
                $profile->com_number = $request->input('company_phone');
                $profile->com_service = $request->input('service_type');
                $profile->com_Haddress = $request->input('address');
                $profile->com_sub_address = $request->input('sub_office_address');

                $profile->save();
                return redirect()->route('company.dashboard')->with('message', 'Profile update successfully');
            }else{
                return redirect()->route('company.dashboard')->with('error', 'Company Profile Already Taken !!');
            }    
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('company.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dailywork $dailywork,$id)
    {

    }
}
