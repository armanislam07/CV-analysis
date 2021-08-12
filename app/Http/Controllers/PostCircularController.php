<?php

namespace App\Http\Controllers;

use Auth;
// use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\JobCircular;
use App\JobResponsibilitie;
use App\JobExperienceArea;
use App\JobRequirement;
use App\JobOtherBenefit;
use App\Experience;
use App\UserExpArea;
use App\Education;
use DateTime;
use GetDate;
use DB;

class PostCircularController extends Controller
{
    public function index(){
        $date = Carbon::now()->format('m-d-y');
            
    	$jobs = DB::table('job_circulars')
    			->join('com_profiles', 'job_circulars.com_id', '=', 'com_profiles.com_id')
    			->select('job_circulars.*', 'com_profiles.com_name', 'com_profiles.com_logo')
                ->where('job_circulars.job_deadline', '>', $date)
    			->get();
    	return view('categories')->with('jobs', $jobs);
    }

    public function jobCircularDetails($id){
    	// $circular_id = JobCircular::find($id)->get()->first();
    	$circular_details = DB::table('job_circulars')
    			->join('com_profiles', 'job_circulars.com_id', '=', 'com_profiles.com_id')
    			->select('job_circulars.*', 'com_profiles.com_name', 'com_profiles.com_logo','com_profiles.com_Haddress')
    			->where('job_circulars.id', '=', $id)
    			->get();
        $responsibilities = JobResponsibilitie::where('circuler_id', '=', $id)->get();
        $experienceArea = JobExperienceArea::where('circuler_id', '=', $id)->get();
        $requirements = JobRequirement::where('circuler_id', '=', $id)->get();
        $otherBenifits = JobOtherBenefit::where('circuler_id', '=', $id)->get();
    			// dd($circular_details);
    	return view('single', compact('circular_details','responsibilities','experienceArea','requirements','otherBenifits'));
    }
    
    public function circulerMatchView()
    {
        $user_id = Auth::user()->id;

        $check_exp = Experience::where('user_id','=',$user_id)->count();
        if ($check_exp <= 0) {
            return redirect()->route('edit.cv')->with('error', 'update your cv');
            // return $check_exp;
        }
        $resume_exp = Experience::select('user_exp_keyword')
                    ->where('user_id','=',$user_id)
                    ->get();

        $exp_keyword = JobCircular::pluck('job_exp_keyword');

        $user_experience_keyword = Experience::select('user_exp_keyword')
                                    ->where('user_id','=',$user_id)
                                    ->where('user_exp_keyword','=',$exp_keyword)
                                    ->count();

        if ($user_experience_keyword > 0) {
            $from_date = Experience::where('user_id','=',$user_id)
                    ->where('user_exp_keyword', '=', $exp_keyword[0])
                    ->orderBy('exp_from_date','desc')
                    ->take(1)
                    ->pluck('exp_from_date')[0];
            $to_date = Experience::where('user_id','=',$user_id)
                    ->where('user_exp_keyword', '=', $exp_keyword[0])
                    ->orderBy('exp_from_date','desc')
                    ->take(1)
                    ->pluck('exp_to_date')[0];
            
            if (is_null($to_date)) {
                $to = Carbon::now();
                $total_date = $to->diff($from_date)->format('%y'.'.'.'%m');
            }else{
                $from = new Carbon($from_date);
                $to = new Carbon($to_date); 
                // $realAge = Carbon::parse($to)->diff(Carbon::parse($from))->format('%y'.'.'.'%m');
                $total_date = $to->diff($from)->format('%y'.'.'.'%m');
            }
            $examination = Education::select('exam_title')->where('user_id','=',$user_id)->get();
            $subject = Education::where('user_id','=',$user_id)->orderBy('id','desc')->pluck('subject');
            $exp_area = JobExperienceArea::pluck('job_exp_area');
            // echo "<pre>";
            // print_r($exp_area);
        
            foreach ($resume_exp as $keyword => $k) {
            
                    $date = Carbon::now()->format('m-d-y');    
                    $jobs = DB::table('job_circulars')
                    ->join('com_profiles', 'job_circulars.com_id', '=', 'com_profiles.com_id')              
                    ->join('experiences','job_circulars.job_exp_keyword', '=', 'experiences.user_exp_keyword')
                    // ->join('user_exp_areas','experiences.user_id','=','user_exp_areas.user_id')                
                    ->select('job_circulars.*', 'com_profiles.com_name', 'com_profiles.com_logo')
                    ->where('job_circulars.job_deadline', '>', $date)
                    ->where('experiences.user_id','=', $user_id)
                    ->where('job_circulars.job_exp_keyword','=', $keyword)
                    ->where('job_circulars.experience','<=', $total_date)
                    ->where('job_circulars.education_requirements','LIKE', '%'.$subject[0].'%')
                    // ->where('experiences.exp_area','LIKE', '%'.$exp_area[0].'%')
                    ->get();

                    
                     
            }

            $jobs_count = $jobs->count();
            
            $i = 0;
            foreach ($exp_area as $area => $exp) {
                $check_exp_area = UserExpArea::where('user_id','=',$user_id)
                            ->where('user_exp_area','=',$exp)->count();
                
                if ($check_exp_area > 0) {
                    $i++;
                }
                
            }

            if ($jobs_count > 0 && $i > 0) {
                return view('users.jobmatch')->with('jobs', $jobs);
            }else{
                $error = "No Match Job Circular <a href='{{route('home')}}'>Home</a>";
                return $error;
            }
            // echo "<pre>";
                   
            //         print_r ($jobs_count);
        }

        // return view('users.jobmatch')->with('jobs', $jobs);
  
    }
}
